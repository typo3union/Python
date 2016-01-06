<?php
namespace Typo3\Course\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Ajay Gohel <shared_user@webofficeindia.com>, WOI
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
 * Subcategory
 */
class Subcategory extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * subcategory
	 *
	 * @var string
	 */
	protected $subcategory = '';

	/**
	 * Returns the subcategory
	 *
	 * @return string $subcategory
	 */
	public function getSubcategory() {
		return $this->subcategory;
	}

	/**
	 * Sets the subcategory
	 *
	 * @param string $subcategory
	 * @return void
	 */
	public function setSubcategory($subcategory) {
		$this->subcategory = $subcategory;
	}

}