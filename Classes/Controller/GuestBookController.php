<?php
namespace JS\JsGuestbook\Controller;

use JS\JsGuestbook\Service\Configuration;
use JS\JsGuestbook\Service\GuestBookService;
use JS\JsGuestbook\Service\Template;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

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
 * GuestBookController
 */
class GuestBookController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

	/**
	 * guestBookRepository
	 *
	 * @var \JS\JsGuestbook\Domain\Repository\GuestBookRepository
	 * @inject
	 */
	protected $guestBookRepository = NULL;
	
	/**
	 * action guestBook
	 *
	 * @return void
	 */
	public function guestBookAction()
	{
		$GLOBALS['TSFE']->set_no_cache();

		$this->fullURL = $this->request->getBaseUri();
		
		$this->contentObj = $this->configurationManager->getContentObject();

		$message = Configuration::getSessionData('message');

		$this->settings['contentID'] = md5($this->contentObj->data['uid']);

		$template = Configuration::template();

		if ($this->request->hasArgument('guestBookSubmit')) {

			$data = $this->request->getArguments();
			
			if($this->settings['contentID'] ==$data['content']){

				$fieldsValue = $this->request->getArguments();
			}
		}

		$formFields = GuestBookService::formFields($fieldsValue);

		if ($this->request->hasArgument('guestBookSubmit')) {

			$data = $this->request->getArguments();
			
			if($this->settings['contentID'] ==$data['content']){
				
				$validate = GuestBookService::validate($data);

				if (count($validate) > 0) {

					foreach ($validate as $key => $value) {
						$formFields[$key]['error'] = 'error';
					}

					$message = array("error"=>$validate);

				}else{

					$userInformation = GuestBookService::userInformation($data,$formFields);

					$mailUserInformation = GuestBookService::mailUserInformation($userInformation, $formFields);

					$arr = array(
						'baseURL'			=> $this->request->getBaseUri(),
						'userName'			=> $userInformation['name'],
						'js_guestbook_all'	=> $mailUserInformation,
						'receiverName'		=> $this->settings['receiver']['name'],
						'current_page'		=> $this->uriBuilder->getRequest()->getRequestUri(),
					);

					$variable = array_merge($userInformation, $arr);

					$userBody = $this->settings['user']['body'];

					if($userBody['default']==1){
						$user_email_body = GuestBookService::userEmailTemplate($variable);
					}else{
						$user_email_body = nl2br(nl2br($userBody['message']));
					}

					$user_email_body = GuestBookService::rewriteVariables($variable, $user_email_body);

					$receiverBody = $this->settings['receiver']['body'];

					if($receiverBody['default']==1){
						$receiver_email_body	= GuestBookService::receiverEmailTemplate($variable);
					}else{
						$receiver_email_body = nl2br(nl2br($receiverBody['message']));
					}

					$receiver_email_body = GuestBookService::rewriteVariables($variable, $receiver_email_body);

					$userMailSent = $receiverMailSent = 0;

					$userSetting = $this->settings['user'];

					$this->settings['receiver']['sender'] = GuestBookService::setReceiverNameandEmail($userInformation);

					if ($userSetting['sendMail'] == 1 && !empty($userSetting['subject']) && 
							!empty($userInformation['email']) && filter_var($userInformation['email'], FILTER_VALIDATE_EMAIL)
							 && filter_var($userSetting['sender']['email'], FILTER_VALIDATE_EMAIL)) {

						$userMailSent = GuestBookService::sentMailToUser($user_email_body, $userInformation, $this->settings);
					}

					$receiverSetting = $this->settings['receiver'];

					if ($receiverSetting['sendMail'] == 1 && !empty($receiverSetting['subject']) && 
						!empty($receiverSetting['email']) && filter_var($receiverSetting['email'], FILTER_VALIDATE_EMAIL)
						 && filter_var($receiverSetting['sender']['email'], FILTER_VALIDATE_EMAIL)) {

						$receiverMailSent = GuestBookService::sentMailToReceiver($receiver_email_body, $userInformation, $this->settings);
					}

					$mailBody = array('receiver_email_body' => $receiver_email_body, 'user_email_body' => $user_email_body,
										'user_email_sent' => $userMailSent, 'receiver_email_sent' => $receiverMailSent,
									 );

					$marketingInformation = GuestBookService::marketingInformation($userInformation, $mailBody);

					$insertArray = array_merge($userInformation, $marketingInformation);

					$suc = $this->guestBookRepository->insertUserData($insertArray);

					if($suc == 1 && ( $userMailSent == 1 || $userInformation['email']=="" || $this->settings['user']['sendMail']==0)){

						$sessionData = array("success"=>array("successfully_contacted"=>"successfully_contacted"));

						Configuration::setSessionData('message',$sessionData);

						$link = $this->settings['thanks']['redirect']!=""?$this->settings['thanks']['redirect']:$GLOBALS['TSFE']->id;

						$this->redirectURL($link);

					}else if($suc==1){

						$sessionData = array("info"=>array("mail_not_sent"));

						Configuration::setSessionData('message',$sessionData);

						$this->redirectURL();

					}else{

						$message = array("error"=>array("data_not_inserted"));
					}

				}
			}
		}


		if ($template == 1) {
			
		}

		$assignedValues = array(
			'message'		=> $message,
			'settings'		=> $this->settings,
			'formFields'	=> $formFields,
			'template'		=> $template,
		);

		$this->view->assignMultiple($assignedValues);

		// Include Additional Data
		Configuration::additionalData();
	}
	
	/**
	 * redirectURL
	 *
	 * @param $pageUid
	 * @param $additionalParams
	 * @return
	 */
	public function redirectURL($pageUid = '', $additionalParams = array())
	{
		$pageUid = $pageUid > 0 ? $pageUid : $GLOBALS['TSFE']->id;
		$baseUri = $this->request->getBaseUri();
		$url = $this->uriBuilder->reset()->setTargetPageUid($pageUid)->setArguments($additionalParams)->buildFrontendUri();
		header('Location:' . $url);
		die;
	}

}