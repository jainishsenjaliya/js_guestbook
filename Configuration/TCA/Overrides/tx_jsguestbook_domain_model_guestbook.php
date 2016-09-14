<?php 
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder


$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['types']['1'] = array(

	'showitem' =>
		'hidden, 
		--palette--;LLL:EXT:js_guestbook/Resources/Private/Language/locallang_tca.xlf:palette.name;name,
		--palette--;LLL:EXT:js_guestbook/Resources/Private/Language/locallang_tca.xlf:palette.contact;contact,
		--palette--;LLL:EXT:js_guestbook/Resources/Private/Language/locallang_tca.xlf:palette.others;others,
		
		--div--; LLL:EXT:js_guestbook/Resources/Private/Language/locallang_tca.xlf:marketing, 
		 	creation_date,receiver_email_subject,user_email_subject,ip,useragent,website_language,website_language_id',
);

$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['palettes'] = array(
	'name' => array(
		'showitem' => 'name, --linebreak--, 
						first_name, last_name, --linebreak--, 
						title',

		'canNotCollapse' => 1
	),
	'contact' => array(
		'showitem' => 'email, --linebreak--,
						phone, fax, --linebreak--,
						www',
		'canNotCollapse' => 1
	),
	'others' => array(
		'showitem' => 'message, --linebreak--,
						comment',
		'canNotCollapse' => 1
	),
);


$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['first_name']['config']['size'] = 20;
$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['last_name']['config']['size'] = 20;
$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['title']['config']['size'] = 50;

$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['www']['config']['wizards'] = array(
					'_PADDING' => 2,
					'link' => array(
						'type' => 'popup',
						'title' => 'LLL:EXT:cms/locallang_ttc.xml:header_link_formlabel',
						'icon' => 'link_popup.gif',
						'module' => array(
							'name' => 'wizard_element_browser',
							'urlParameters' => array(
								'mode' => 'wizard',
								'act' => 'url|page'
							)
						),
						'params' => array(
							'blindLinkOptions' => 'mail,file,spec,folder',
						),
						'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
					),
				);


$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['creation_date']['config']['size'] = 12;

$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['comment']['config']['cols'] = 30;
$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['comment']['config']['rows'] = 7;

$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['message']['config']['cols'] = 30;
$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['message']['config']['rows'] = 7;

$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['receiver_email_subject']['config']['cols'] = 30;
$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['receiver_email_subject']['config']['rows'] = 2;

$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['user_email_subject']['config']['cols'] = 30;
$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['user_email_subject']['config']['rows'] = 2;

$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['useragent']['config']['cols'] = 30;
$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['useragent']['config']['rows'] = 2;

$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['ip']['config']['size'] = 10;

$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['name']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['creation_date']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['receiver_email_subject']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['user_email_subject']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['ip']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['useragent']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['website_language']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jsguestbook_domain_model_guestbook']['columns']['website_language_id']['config']['readOnly'] = 1;