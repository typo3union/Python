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
 * Product
 */
class Product extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * featuredProduct
	 *
	 * @var boolean
	 */
	protected $featuredProduct = FALSE;

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * images
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $images = NULL;

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * machineNo
	 *
	 * @var string
	 */
	protected $machineNo = '';

	/**
	 * location
	 *
	 * @var string
	 */
	protected $location = '';

	/**
	 * year
	 *
	 * @var string
	 */
	protected $year = '';

	/**
	 * rating
	 *
	 * @var integer
	 */
	protected $rating = 0;

	/**
	 * category
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Product\Product\Domain\Model\Category>
	 */
	protected $category = NULL;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->category = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the featuredProduct
	 *
	 * @return boolean $featuredProduct
	 */
	public function getFeaturedProduct() {
		return $this->featuredProduct;
	}

	/**
	 * Sets the featuredProduct
	 *
	 * @param boolean $featuredProduct
	 * @return void
	 */
	public function setFeaturedProduct($featuredProduct) {
		$this->featuredProduct = $featuredProduct;
	}

	/**
	 * Returns the boolean state of featuredProduct
	 *
	 * @return boolean
	 */
	public function isFeaturedProduct() {
		return $this->featuredProduct;
	}

	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the images
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $images
	 */
	public function getImages() {
		return $this->images;
	}

	/**
	 * Sets the images
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $images
	 * @return void
	 */
	public function setImages(\TYPO3\CMS\Extbase\Domain\Model\FileReference $images) {
		$this->images = $images;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the machineNo
	 *
	 * @return string $machineNo
	 */
	public function getMachineNo() {
		return $this->machineNo;
	}

	/**
	 * Sets the machineNo
	 *
	 * @param string $machineNo
	 * @return void
	 */
	public function setMachineNo($machineNo) {
		$this->machineNo = $machineNo;
	}

	/**
	 * Returns the location
	 *
	 * @return string $location
	 */
	public function getLocation() {
		return $this->location;
	}

	/**
	 * Sets the location
	 *
	 * @param string $location
	 * @return void
	 */
	public function setLocation($location) {
		$this->location = $location;
	}

	/**
	 * Returns the year
	 *
	 * @return string $year
	 */
	public function getYear() {
		return $this->year;
	}

	/**
	 * Sets the year
	 *
	 * @param string $year
	 * @return void
	 */
	public function setYear($year) {
		$this->year = $year;
	}

	/**
	 * Returns the rating
	 *
	 * @return integer $rating
	 */
	public function getRating() {
		return $this->rating;
	}

	/**
	 * Sets the rating
	 *
	 * @param integer $rating
	 * @return void
	 */
	public function setRating($rating) {
		$this->rating = $rating;
	}

	/**
	 * Adds a Category
	 *
	 * @param \Product\Product\Domain\Model\Category $category
	 * @return void
	 */
	public function addCategory(\Product\Product\Domain\Model\Category $category) {
		$this->category->attach($category);
	}

	/**
	 * Removes a Category
	 *
	 * @param \Product\Product\Domain\Model\Category $categoryToRemove The Category to be removed
	 * @return void
	 */
	public function removeCategory(\Product\Product\Domain\Model\Category $categoryToRemove) {
		$this->category->detach($categoryToRemove);
	}

	/**
	 * Returns the category
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Product\Product\Domain\Model\Category> $category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * Sets the category
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Product\Product\Domain\Model\Category> $category
	 * @return void
	 */
	public function setCategory(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $category) {
		$this->category = $category;
	}

}