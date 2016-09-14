<?php
namespace JS\JsGuestbook\ViewHelpers\String;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * View helper to explode a list
 *
 * @package TYPO3
 * @subpackage Fluid
 */
class ExplodeViewHelper extends AbstractViewHelper {

	/**
	 * View helper to explode a list
	 *
	 * @param string $string Any list (e.g. "abc, pqr, xyz")
	 * @param string $separator Separator sign (e.g. ",")
	 * @param bool $trim should be trimmed?
	 * @return array
	 */
	public function render($string = '', $separator = ',', $trim = TRUE) {
		return GeneralUtility::trimExplode($separator, $string, $trim);
	}
}