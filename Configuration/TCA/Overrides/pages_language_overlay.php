<?php
// Also add the new doktype to the page language overlays type selector (so that translations can inherit the same type)

if (version_compare(TYPO3_branch, '6.2.99', '>')) {

	call_user_func(
		function ($extKey, $table) {
			$extRelPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($extKey);
			$customPageIcon = $extRelPath . 'Resources/Public/Icons/doktype_icon.svg';
			$archiveDoktype = \JS\JsGuestbook\Controller\PageControllerInterface::DOKTYPE_RAW;

			// Add new page type as possible select item:
			\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
				$table,
				'doktype',
				[
					'LLL:EXT:js_guestbook/Resources/Private/Language/locallang.xlf:pages.doktype',
					$archiveDoktype,
					$customPageIcon
				],
				'254',
				'after'
			);
		},
		'js_guestbook',
		'pages_language_overlay'
	);
}