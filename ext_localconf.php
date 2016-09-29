<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'JS.' . $_EXTKEY,
	'Guestbook',
	array(
		'GuestBook' => 'guestBook',
		
	),
	// non-cacheable actions
	array(
		'GuestBook' => 'guestBook',
		
	)
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

require_once( \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY).'Classes/Utility/Hook/typoscript.php');