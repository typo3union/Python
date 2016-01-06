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
 * Category
 */
class Category extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * category
	 * 
	 * @var string
	 */
	protected $category = '';
	
	/**
	 * parentcategory
	 * 
	 * @var string
	 */
	protected $parentcategory = '';
	
	/**
	 * maincategory
	 * 
	 * @var string
	 */
	protected $maincategory = '';

	/**
	 * information
	 * 
	 * @var string
	 */
	protected $information = '';
	
        /**
	 * adword
	 * 
	 * @var string
	 */
	protected $adword = '';
        
	/**
	 * bannerimages
	 * 
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $bannerimages = NULL;
	
	/**
	 * bottomimage
	 * 
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $bottomimage = NULL;

	/**
	 * Returns the category
	 * 
	 * @return string $category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * Sets the category
	 * 
	 * @param string $category
	 * @return void
	 */
	public function setCategory($category) {
		$this->category = $category;
	}

	/**
	 * Returns the parentcategory
	 * 
	 * @return string $parentcategory
	 */
	public function getParentcategory() {
		return $this->parentcategory;
	}

	/**
	 * Sets the parentcategory
	 * 
	 * @param string $parentcategory
	 * @return void
	 */
	public function setParentcategory($parentcategory) {
		$this->parentcategory = $parentcategory;
	}
	
	/**
	 * Returns the information
	 * 
	 * @return string $information
	 */
	public function getInformation() {
		return $this->information;
	}

	/**
	 * Sets the information
	 * 
	 * @param string $information
	 * @return void
	 */
	public function setInformation($information) {
		$this->information = $information;
	}
	
		/**
        /**
	 * Returns the adword
	 * 
	 * @return string $adword
	 */
	public function getadword() {
		return $this->adword;
	}

	/**
	 * Sets the adword
	 * 
	 * @param string $adword
	 * @return void
	 */
	public function setadword($adword) {
		$this->adword = $adword;
	}
	
		/**
	 * Returns the maincategory
	 * 
	 * @return string $maincategory
	 */
	public function getMaincategory() {
		return $this->maincategory;
	}

	/**
	 * Sets the maincategory
	 * 
	 * @param string $maincategory
	 * @return void
	 */
	public function setMaincategory($maincategory) {
		$this->maincategory = $maincategory;
	}
	
	/**
	 * Returns the bannerimages
	 * 
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $bannerimages
	 */
	public function getBannerimages() {
		return $this->bannerimages;
	}

	/**
	 * Sets the bannerimages
	 * 
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $bannerimages
	 * @return void
	 */
	public function setBannerimages(\TYPO3\CMS\Extbase\Domain\Model\FileReference $bannerimages) {
		$this->bannerimages = $bannerimages;
	}


	/**
	 * Returns the bottomimage
	 * 
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $bottomimage
	 */
	public function getBottomimage() {
		return $this->bottomimage;
	}

	/**
	 * Sets the bottomimage
	 * 
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $bottomimage
	 * @return void
	 */
	public function setBottomimage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $bottomimage) {
		$this->bottomimage = $bottomimage;
	}

}