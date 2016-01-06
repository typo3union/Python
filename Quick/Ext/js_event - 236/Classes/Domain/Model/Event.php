<?php
namespace JS\JsEvent\Domain\Model;


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
 * Event
 */
class Event extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 * 
	 * @var string
	 */
	protected $title = '';

	/**
	 * startDate
	 * 
	 * @var \DateTime
	 */
	protected $startDate = NULL;

	/**
	 * endDate
	 * 
	 * @var \DateTime
	 */
	protected $endDate = NULL;

	/**
	 * location
	 * 
	 * @var string
	 */
	protected $location = '';

	/**
	 * description
	 * 
	 * @var string
	 */
	protected $description = '';

	/**
	 * image
	 * 
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $image = NULL;

	/**
	 * category
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsEvent\Domain\Model\Category>
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
	 * Returns the title
	 * 
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 * 
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the startDate
	 * 
	 * @return \DateTime $startDate
	 */
	public function getStartDate() {
		return $this->startDate;
	}

	/**
	 * Sets the startDate
	 * 
	 * @param \DateTime $startDate
	 * @return void
	 */
	public function setStartDate(\DateTime $startDate) {
		$this->startDate = $startDate;
	}

	/**
	 * Returns the endDate
	 * 
	 * @return \DateTime $endDate
	 */
	public function getEndDate() {
		return $this->endDate;
	}

	/**
	 * Sets the endDate
	 * 
	 * @param \DateTime $endDate
	 * @return void
	 */
	public function setEndDate(\DateTime $endDate) {
		$this->endDate = $endDate;
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
	 * Adds a Category
	 * 
	 * @param \JS\JsEvent\Domain\Model\Category $category
	 * @return void
	 */
	public function addCategory(\JS\JsEvent\Domain\Model\Category $category) {
		$this->category->attach($category);
	}

	/**
	 * Removes a Category
	 * 
	 * @param \JS\JsEvent\Domain\Model\Category $categoryToRemove The Category to be removed
	 * @return void
	 */
	public function removeCategory(\JS\JsEvent\Domain\Model\Category $categoryToRemove) {
		$this->category->detach($categoryToRemove);
	}

	/**
	 * Returns the category
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsEvent\Domain\Model\Category> $category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * Sets the category
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsEvent\Domain\Model\Category> $category
	 * @return void
	 */
	public function setCategory(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $category) {
		$this->category = $category;
	}

}