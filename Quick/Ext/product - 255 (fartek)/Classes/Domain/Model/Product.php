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
	 * season
	 *
	 * @var string
	 */
	protected $season = '';
    
	/**
	 * image
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $image = NULL;


	/**
	 * featuredImage
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $featuredImage = NULL;

	/**
	 * content
	 *
	 * @var string
	 */
	protected $content = '';

	/**
	 * tableContent
	 *
	 * @var string
	 */
	protected $tableContent = '';

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
	 * Returns the season
	 *
	 * @return string $season
	 */
	public function getSeason() {
		return $this->season;
	}

	/**
	 * Sets the season
	 *
	 * @param string $season
	 * @return void
	 */
	public function setSeason($season) {
		$this->season = $season;
	}
    
	/**
	 * Returns the image
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the image
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 * @return void
	 */
	public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image) {
		$this->image = $image;
	}

	/**
	 * Returns the featuredImage
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $featuredImage
	 */
	public function getFeaturedImage() {
		return $this->featuredImage;
	}

	/**
	 * Sets the featuredImage
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $featuredImage
	 * @return void
	 */
	public function setFeaturedImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $featuredImage) {
		$this->featuredImage = $featuredImage;
	}

	/**
	 * Returns the content
	 *
	 * @return string $content
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * Sets the content
	 *
	 * @param string $content
	 * @return void
	 */
	public function setContent($content) {
		$this->content = $content;
	}

	/**
	 * Returns the tableContent
	 *
	 * @return string $tableContent
	 */
	public function getTableContent() {
		return $this->tableContent;
	}

	/**
	 * Sets the tableContent
	 *
	 * @param string $tableContent
	 * @return void
	 */
	public function setTableContent($tableContent) {
		$this->tableContent = $tableContent;
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