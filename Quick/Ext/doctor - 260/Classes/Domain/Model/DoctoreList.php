<?php
namespace Arzte\Arzte\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014
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
 * list
 */
class DoctoreList extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * image
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $image = NULL;

	/**
	 * shortInformation
	 *
	 * @var string
	 */
	protected $shortInformation = '';

	/**
	 * address
	 *
	 * @var string
	 */
	protected $address = '';

	/**
	 * logo
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $logo = NULL;

	/**
	 * headline
	 *
	 * @var string
	 */
	protected $headline = '';

	/**
	 * detailedinformation
	 *
	 * @var string
	 */
	protected $detailedinformation = '';

	/**
	 * link
	 *
	 * @var string
	 */
	protected $link = '';

	/**
	 * Category Select
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Arzte\Arzte\Domain\Model\Category>
	 */
	protected $categoryselect = NULL;

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
		$this->categoryselect = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Returns the shortInformation
	 *
	 * @return string $shortInformation
	 */
	public function getShortInformation() {
		return $this->shortInformation;
	}

	/**
	 * Sets the shortInformation
	 *
	 * @param string $shortInformation
	 * @return void
	 */
	public function setShortInformation($shortInformation) {
		$this->shortInformation = $shortInformation;
	}

	/**
	 * Returns the address
	 *
	 * @return string $address
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * Sets the address
	 *
	 * @param string $address
	 * @return void
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * Returns the logo
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $logo
	 */
	public function getLogo() {
		return $this->logo;
	}

	/**
	 * Sets the logo
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $logo
	 * @return void
	 */
	public function setLogo(\TYPO3\CMS\Extbase\Domain\Model\FileReference $logo) {
		$this->logo = $logo;
	}

	/**
	 * Returns the headline
	 *
	 * @return string $headline
	 */
	public function getHeadline() {
		return $this->headline;
	}

	/**
	 * Sets the headline
	 *
	 * @param string $headline
	 * @return void
	 */
	public function setHeadline($headline) {
		$this->headline = $headline;
	}

	/**
	 * Returns the detailedinformation
	 *
	 * @return string $detailedinformation
	 */
	public function getDetailedinformation() {
		return $this->detailedinformation;
	}

	/**
	 * Sets the detailedinformation
	 *
	 * @param string $detailedinformation
	 * @return void
	 */
	public function setDetailedinformation($detailedinformation) {
		$this->detailedinformation = $detailedinformation;
	}

	/**
	 * Returns the link
	 *
	 * @return string $link
	 */
	public function getLink() {
		return $this->link;
	}

	/**
	 * Sets the link
	 *
	 * @param string $link
	 * @return void
	 */
	public function setLink($link) {
		$this->link = $link;
	}

	/**
	 * Adds a Category
	 *
	 * @param \Arzte\Arzte\Domain\Model\Category $categoryselect
	 * @return void
	 */
	public function addCategoryselect(\Arzte\Arzte\Domain\Model\Category $categoryselect) {
		$this->categoryselect->attach($categoryselect);
	}

	/**
	 * Removes a Category
	 *
	 * @param \Arzte\Arzte\Domain\Model\Category $categoryselectToRemove The Category to be removed
	 * @return void
	 */
	public function removeCategoryselect(\Arzte\Arzte\Domain\Model\Category $categoryselectToRemove) {
		$this->categoryselect->detach($categoryselectToRemove);
	}

	/**
	 * Returns the categoryselect
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Arzte\Arzte\Domain\Model\Category> $categoryselect
	 */
	public function getCategoryselect() {
		return $this->categoryselect;
	}

	/**
	 * Sets the categoryselect
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Arzte\Arzte\Domain\Model\Category> $categoryselect
	 * @return void
	 */
	public function setCategoryselect(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categoryselect) {
		$this->categoryselect = $categoryselect;
	}

}