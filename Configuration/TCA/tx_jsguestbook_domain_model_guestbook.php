<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:js_guestbook/Resources/Private/Language/locallang_db.xlf:tx_jsguestbook_domain_model_guestbook',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,first_name,last_name,title,email,phone,www,message,comment,creation_date,receiver_email_subject,user_email_subject,ip,useragent,website_language,website_language_id,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('js_guestbook') . 'Resources/Public/Icons/tx_jsguestbook_domain_model_guestbook.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, first_name, last_name, title, email, phone, www, message, comment, creation_date, receiver_email_subject, user_email_subject, ip, useragent, website_language, website_language_id',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, first_name, last_name, title, email, phone, www, message, comment, creation_date, receiver_email_subject, user_email_subject, ip, useragent, website_language, website_language_id, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_jsguestbook_domain_model_guestbook',
				'foreign_table_where' => 'AND tx_jsguestbook_domain_model_guestbook.pid=###CURRENT_PID### AND tx_jsguestbook_domain_model_guestbook.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_guestbook/Resources/Private/Language/locallang_db.xlf:tx_jsguestbook_domain_model_guestbook.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
				'readOnly' => 'readOnly'
			),
		),
		'first_name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_guestbook/Resources/Private/Language/locallang_db.xlf:tx_jsguestbook_domain_model_guestbook.first_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'last_name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_guestbook/Resources/Private/Language/locallang_db.xlf:tx_jsguestbook_domain_model_guestbook.last_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_guestbook/Resources/Private/Language/locallang_db.xlf:tx_jsguestbook_domain_model_guestbook.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'email' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_guestbook/Resources/Private/Language/locallang_db.xlf:tx_jsguestbook_domain_model_guestbook.email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'phone' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_guestbook/Resources/Private/Language/locallang_db.xlf:tx_jsguestbook_domain_model_guestbook.phone',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'www' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_guestbook/Resources/Private/Language/locallang_db.xlf:tx_jsguestbook_domain_model_guestbook.www',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'message' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_guestbook/Resources/Private/Language/locallang_db.xlf:tx_jsguestbook_domain_model_guestbook.message',
			'config' => array(
				'type' => 'text',
				'cols' => 30,
				'rows' => 5,
				'eval' => 'trim'
			)
		),
		'comment' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_guestbook/Resources/Private/Language/locallang_db.xlf:tx_jsguestbook_domain_model_guestbook.comment',
			'config' => array(
				'type' => 'text',
				'cols' => 30,
				'rows' => 5,
				'eval' => 'trim'
			)
		),
		'creation_date' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_guestbook/Resources/Private/Language/locallang_db.xlf:tx_jsguestbook_domain_model_guestbook.creation_date',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time(),
				'readOnly' => 'readOnly'
			),
		),
		'receiver_email_subject' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_guestbook/Resources/Private/Language/locallang_db.xlf:tx_jsguestbook_domain_model_guestbook.receiver_email_subject',
			'config' => array(
				'type' => 'text',
				'cols' => 30,
				'rows' => 2,
				'eval' => 'trim',
				'readOnly' => 'readOnly'
			)
		),
		'user_email_subject' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_guestbook/Resources/Private/Language/locallang_db.xlf:tx_jsguestbook_domain_model_guestbook.user_email_subject',
			'config' => array(
				'type' => 'text',
				'cols' => 30,
				'rows' => 2,
				'eval' => 'trim',
				'readOnly' => 'readOnly'
			)
		),
		'ip' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_guestbook/Resources/Private/Language/locallang_db.xlf:tx_jsguestbook_domain_model_guestbook.ip',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
				'readOnly' => 'readOnly'
			),
		),
		'useragent' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_guestbook/Resources/Private/Language/locallang_db.xlf:tx_jsguestbook_domain_model_guestbook.useragent',
			'config' => array(
				'type' => 'text',
				'cols' => 30,
				'rows' => 2,
				'eval' => 'trim',
				'readOnly' => 'readOnly'
			)
		),
		'website_language' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_guestbook/Resources/Private/Language/locallang_db.xlf:tx_jsguestbook_domain_model_guestbook.website_language',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
				'readOnly' => 'readOnly'
			),
		),
		'website_language_id' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_guestbook/Resources/Private/Language/locallang_db.xlf:tx_jsguestbook_domain_model_guestbook.website_language_id',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
				'readOnly' => 'readOnly'
			),
		),
		
	),
);## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder