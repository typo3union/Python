<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Georg Ringer <typo3@ringerge.org>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
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
 * Add portfolio extension to the wizard in page module
 *
 * @package TYPO3
 * @subpackage extension
 */
class property_wizicon {

	const KEY = 'property';

	/**
	 * Processing the wizard items array
	 *
	 * @param array $wizardItems The wizard items
	 * @return array array with wizard items
	 */
	public function proc($wizardItems) {
		$wizardItems['plugins_tx_' . self::KEY] = array(
			'icon'			=> \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath(self::KEY) . 'Resources/Public/Icons/home-icon.png',
			'title'			=> 'Property',
			'description'	=> 'Property management',
			'params'		=> '&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=property_property'
		);

		return $wizardItems;
	}
}