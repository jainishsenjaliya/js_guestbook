<?php
namespace JS\JsGuestbook\Service;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Jainish Senjaliya <jainishsenjaliya@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Guest Book Service class
 *
 * @package JS
 * @subpackage js_guestbook
 * (c) 2016 Jainish Senjaliya <jainishsenjaliya@gmail.com>
 * @author Jainish Senjaliya <jainishsenjaliya@gmail.com>
 * 
 */

class GuestBookService implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * guestBookRepository
	 *
	 * @var \JS\JsGuestbook\Domain\Repository\GuestBookRepository
	 * @inject
	 */
	protected $guestBookRepository = NULL;

	/**
	 * settingsService
	 *
	 * @var \JS\JsGuestbook\Service\SettingsService
	 * @inject
	 */
	protected $settingsService = NULL;

	/**
	 * configuration
	 *
	 * @var \JS\JsGuestbook\Service\Configuration
	 * @inject
	 */
	protected $configuration = NULL;

	/**
	 * email
	 *
	 * @var \JS\JsGuestbook\Service\Email
	 * @inject
	 */
	protected $email = NULL;

	/**
	 * template
	 *
	 * @var \JS\JsGuestbook\Service\Template
	 * @inject
	 */
	protected $template = NULL;
	
	/**
	 * formFields
	 *
	 * @param $fieldsValue
	 * @return
	 */
	 
	function formFields($fieldsValue = array())
	{
		$settings = $this->settingsService->getSettings();

		$arr = $this->configuration->dataExplode($settings['fields']['form']);

		$requireArr = $this->configuration->dataExplode($settings['fields']['required']);

		$fields = array();

		foreach ($arr as $key => $value) {

			if (trim($value) != '') {

				$validate 		= in_array($value, $requireArr) ? 'validate' : '';

				$type			= $settings['fields']['type'][$value];

				$filedType		= !empty($type)?$type:"Input";

				$data = array();

				if(strtolower($filedType)=="radio"){
					$data = array('data' => $this->configuration->dataExplode($settings['fields'][$value]));
				}

				$arr = array('field' => $value, 'validate' => $validate, 'value' => $fieldsValue[$value], 'type' => ucfirst($filedType));

				$fields[$value] = array_merge($arr, $data);
			}
		}

		return $fields;
	}

	/**
	 * validate
	 *
	 * @param $formFields
	 * @return
	 */
	 
	function validate($formFields)
	{
		$settings = $this->settingsService->getSettings();

		$require = $this->configuration->dataExplode($settings['fields']['required']);

		$error = array();

		foreach ($require as $key => $value) {

			if(array_key_exists($value, $formFields)){

				if($formFields[$value]==""){
					
					$error[$value] = "blank_".$value;
					
				}else if($value=="email"){
					
					if (!filter_var($formFields[$value], FILTER_VALIDATE_EMAIL)) {
						$error[$value] = "valid_".$value;
					}
					
				}else if($value=="zip"){
					
					if(!is_numeric($formFields[$value]) || strlen($formFields[$value])>6 ){
						 $error[$value] = "valid_".$value;
					}
					
				}else if($value=="url"){

					if (!filter_var($formFields[$value], FILTER_VALIDATE_URL)) {
						$error[$value] = "valid_".$value;
					}
				}else if($value=="captcha"){

					if(!$this->captchaService->validCode($formFields[$value])){
						 $error[$value] = "valid_".$value;
					}
				}
			}
		}
		return $error;
	}

	/**
	 * userInformation
	 *
	 * @param $data
	 * @param $formFields
	 * @return
	 */
	
	function userInformation($data, $formFields)
	{
		$userInfo = array();

		foreach ($data as $key => $value) {
			if(array_key_exists($key, $formFields)){
				if($value!="" && $key !="captcha"){
					$userInfo[$key] = $value;
				}
			}
		}

		$format = '%1$s %2$s';

		$combinedName = trim(sprintf(
			$format,
			$formFields['first_name']['value'],
			$formFields['last_name']['value']
		));

		if (!empty($combinedName)) {
			$userInfo['name'] = $combinedName;
		}

		return $userInfo;
	}

	/**
	 * mailUserInformation
	 *
	 * @param $userInformation
	 * @param $formFields
	 * @param $templateRootPath
	 * @return
	 */
	
	function mailUserInformation($userInformation, $formFields)
	{
		foreach ($userInformation as $key => $value)
		{
			if(array_key_exists($key, $formFields)){

				$userInfo[$key]['value']	= $value;
				$userInfo[$key]['type']		= $formFields[$key]['type'];
			}
		}

		$variables['mail'] = $userInfo;

		$templateName = 'Email/UserInformation.html';

		$view = $this->template->getView($templateName);

		$view->assignMultiple($variables);
		
		return $view->render(); 
	}

 	/**
	 * userEmailTemplate
	 *
	 * @param $variables
	 * @return
	 */
	
	function userEmailTemplate($variables)
	{
		$settings = $this->settingsService->getSettings();

		$templateName = $settings['user']['emailTemplate']==""?$settings['user']['emailTemplate']:'Email/User.html';

		$view = $this->template->getView($templateName);

		$view->assignMultiple($variables);
		
		return $view->render(); 
	}

 	/**
	 * receiverEmailTemplate
	 *
	 * @param $variables
	 * @return
	 */
	
	function receiverEmailTemplate($variables)
	{
		$settings = $this->settingsService->getSettings();

		$templateName = $settings['receiver']['emailTemplate']==""?$settings['receiver']['emailTemplate']:'Email/Receiver.html';

		$view = $this->template->getView($templateName);

		$view->assignMultiple($variables);
		
		return $view->render(); 
	}	

	/**
	 * rewriteVariables
	 *
	 * @param $variable
	 * @param $content
	 * @return
	 */
	
	function rewriteVariables($variable, $content)
	{
		foreach ($variable as $key => $value) {
			$content = str_replace("{".$key."}", $value, $content);
		}

		return $content;
	}

 	/**
	 * setReceiverEmailandName
	 *
	 * @param $userInformation
	 * @return
	 */
	
	function setReceiverNameandEmail($userInformation){

		$settings = $this->settingsService->getSettings();

		$sender		= $settings['receiver']['sender'];

		$tempName	= trim($sender['name']);

		foreach ($userInformation as $key => $value) {
			$tempName = str_replace("{".$key."}", $value, $tempName);
		}

		if($tempName == ""){
			$tempName = $userInformation['name'];
		}

		$fromName = $tempName;

		$fromEmail	= trim($sender['email']);

		if($fromEmail=="{email}" || $fromEmail==""){
			$fromEmail = $userInformation['email'];
		}
		
		return array("name"=>$fromName, "email"=>$fromEmail);
	}

	/**
	 * sentMailToUser
	 *
	 * @param $mailContent
	 * @param $userInformation
	 * @param $settings
	 * @return
	 */
	
	public function sentMailToUser($mailContent, $userInformation, $settings){

		/*$variables['mail_content'] = $mailContent;

		$templateName = 'Email/HTMLFormat.html';

		$view = $this->template->getView($templateName);

		$view->assignMultiple($variables);
		
		$mailContent = $view->render();*/
		
		$returnPath = $attachements = $plain = $ccName = $ccEmail = $bccName = $bccEmail = $sentMail = '';

		$to 			= $userInformation['email'];
		
		$subject 		= $settings['user']['subject'];
		
		$fromName		= $settings['user']['sender']['name'];
		$fromEmail		= $settings['user']['sender']['email'];
		
		$replyToEmail	= $settings['user']['noreply']['name'];
		$replyToName	= $settings['user']['noreply']['email'];

		$sendCarbonCopy = $settings['user']['bcc']['sendMail'];

		if ($sendCarbonCopy == 1 && $settings['receiver']['cc']['email'] != '') {
			$ccName 	= $settings['user']['cc']['name'];
			$ccEmail	= $settings['user']['cc']['email'];
		}		

		$sendHiddenCopy = $settings['user']['bcc']['sendMail'];

		if ($sendHiddenCopy == 1 && $settings['user']['bcc']['email'] != '') {
			$bccName 	= $settings['user']['bcc']['name'];
			$bccEmail	= $settings['user']['bcc']['email'];
		}

		if ($to != '') {
			
			$toArr = array(0 => array('name' => $userInformation['name'], 'email' => $to));

			$sentMail = $this->email->sendMail($toArr, $subject, $mailContent, $plain, $fromEmail, $fromName, $replyToEmail, $replyToName, $ccName, $ccEmail, $bccName, $bccEmail, $returnPath, $attachements);

		}
		return $sentMail;
	}

	/**
	 * sentMailToReceiver
	 *
	 * @param $mailContent
	 * @param $userInformation
	 * @param $settings
	 * @return
	 */
	
	public function sentMailToReceiver($mailContent, $userInformation, $settings){

		/*$variables['mail_content'] = $mailContent;

		$templateName = 'Email/HTMLFormat.html';

		$view = $this->template->getView($templateName);

		$view->assignMultiple($variables);
		
		$mailContent = $view->render(); */
		
		$returnPath = $attachements = $plain = $ccName = $ccEmail = $bccName = $bccEmail = $sentMail = '';

		$to 			= $settings['receiver']['email'];

		$subject		= $settings['receiver']['subject'];

		$sender			= $settings['receiver']['sender'];

		$fromName 		= $settings['receiver']['sender']['name'];
		$fromEmail 		= $settings['receiver']['sender']['email'];

		$replyToEmail	= $settings['receiver']['noreply']['name'];
		$replyToName	= $settings['receiver']['noreply']['email'];

		$sendCarbonCopy = $settings['receiver']['bcc']['sendMail'];

		if ($sendCarbonCopy == 1 && $settings['receiver']['cc']['email'] != '') {
			$ccName 	= $settings['receiver']['cc']['name'];
			$ccEmail	= $settings['receiver']['cc']['email'];
		}
		
		$sendHiddenCopy = $settings['receiver']['bcc']['sendMail'];

		if ($sendHiddenCopy == 1 && $settings['receiver']['bcc']['email'] != '') {
			$bccName 	= $settings['receiver']['bcc']['name'];
			$bccEmail	= $settings['receiver']['bcc']['email'];
		}

		if ($to != '') {

			$toArr = array(0 => array('name' => $settings['receiver']['name'], 'email' => $to));
			$sentMail = $this->email->sendMail($toArr, $subject, $mailContent, $plain, $fromEmail,  $fromName, $replyToEmail, $replyToName, $ccName, $ccEmail, $bccName, $bccEmail, $returnPath, $attachements);
		}

		return $sentMail;
	}

	/**
	 * marketingInformation
	 *
	 * @param $settings
	 * @param $userInformation
	 * @param $mailBody
	 * @return
	 */
	
	function marketingInformation($settings, $userInformation, $mailBody){

		$language = isset($GLOBALS['TSFE']->config['config']['language'])?$GLOBALS['TSFE']->config['config']['language']:'';

		$marketingInfo = array(
			
				'pid' 				=> $settings['main']['storagePID']==""?$GLOBALS['TSFE']->id:$settings['main']['storagePID'],
				'tstamp'			=> time(),
				'crdate'			=> time(),
				'creation_date'		=> time(),

				'receiver_email_subject'	=> $settings['receiver']['subject'],
				'user_email_subject'		=> $settings['user']['subject'],
				
				'ip'					=> $this->configuration->geIPAddress(),
				'useragent'	 			=> GeneralUtility::getIndpEnv('HTTP_USER_AGENT'),
				'website_language'		=> $language,
				'website_language_id'	=> $GLOBALS['TSFE']->sys_language_uid,
			);

		return $marketingInfo;
	}

}