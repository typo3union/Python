<?php
namespace Product\Product\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015
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
 * Category
 */
class Category extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * categoryName
	 *
	 * @var string
	 */
	protected $categoryName = '';

	/**
	 * isSub
	 *
	 * @var boolean
	 */
	protected $isSub = FALSE;

	/**
	 * subCategory
	 *
	 * @var string
	 */
	protected $subCategory = '';

	/**
	 * inMenu
	 *
	 * @var boolean
	 */
	protected $inMenu = FALSE;

	/**
	 * Returns the categoryName
	 *
	 * @return string $categoryName
	 */
	public function getCategoryName() {
		return $this->categoryName;
	}

	/**
	 * Sets the categoryName
	 *
	 * @param string $categoryName
	 * @return void
	 */
	public function setCategoryName($categoryName) {
		$this->categoryName = $categoryName;
	}

	/**
	 * Returns the isSub
	 *
	 * @return boolean $isSub
	 */
	public function getIsSub() {
		return $this->isSub;
	}

	/**
	 * Sets the isSub
	 *
	 * @param boolean $isSub
	 * @return void
	 */
	public function setIsSub($isSub) {
		$this->isSub = $isSub;
	}

	/**
	 * Returns the boolean state of isSub
	 *
	 * @return boolean
	 */
	public function isIsSub() {
		return $this->isSub;
	}

	/**
	 * Returns the subCategory
	 *
	 * @return string $subCategory
	 */
	public function getSubCategory() {
		return $this->subCategory;
	}

	/**
	 * Sets the subCategory
	 *
	 * @param string $subCategory
	 * @return void
	 */
	public function setSubCategory($subCategory) {
		$this->subCategory = $subCategory;
	}

	/**
	 * Returns the inMenu
	 *
	 * @return boolean $inMenu
	 */
	public function getInMenu() {
		return $this->inMenu;
	}

	/**
	 * Sets the inMenu
	 *
	 * @param boolean $inMenu
	 * @return void
	 */
	public function setInMenu($inMenu) {
		$this->inMenu = $inMenu;
	}

	/**
	 * Returns the boolean state of inMenu
	 *
	 * @return boolean
	 */
	public function isInMenu() {
		return $this->inMenu;
	}

}