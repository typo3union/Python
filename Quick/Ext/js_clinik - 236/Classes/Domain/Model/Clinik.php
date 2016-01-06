<?php
namespace JS\JsClinik\Domain\Model;

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
 * Clinik
 */
class Clinik extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * location
	 *
	 * @var string
	 */
	protected $location = '';

	/**
	 * logo
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $logo = NULL;

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * link
	 *
	 * @var string
	 */
	protected $link = '';

	/**
	 * clinikId
	 *
	 * @var string
	 */
	protected $clinikId = '';

	/**
	 * image
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $image = NULL;

	/**
	 * latitude
	 *
	 * @var string
	 */
	protected $latitude = '';

	/**
	 * longitude
	 *
	 * @var string
	 */
	protected $longitude = '';

	/**
	 * facilities
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsClinik\Domain\Model\Facilities>
	 */
	protected $facilities = NULL;

	/**
	 * displayMapContent
	 *
	 * @var boolean
	 */
	protected $displayMapContent = FALSE;

	/**
	 * mapContent
	 *
	 * @var string
	 */
	protected $mapContent = '';

	/**
	 * mapIcon
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $mapIcon = NULL;

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
		$this->facilities = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Returns the clinikId
	 *
	 * @return string $clinikId
	 */
	public function getClinikId() {
		return $this->clinikId;
	}

	/**
	 * Sets the clinikId
	 *
	 * @param string $clinikId
	 * @return void
	 */
	public function setClinikId($clinikId) {
		$this->clinikId = $clinikId;
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
	 * Returns the latitude
	 *
	 * @return string $latitude
	 */
	public function getLatitude() {
		return $this->latitude;
	}

	/**
	 * Sets the latitude
	 *
	 * @param string $latitude
	 * @return void
	 */
	public function setLatitude($latitude) {
		$this->latitude = $latitude;
	}

	/**
	 * Returns the longitude
	 *
	 * @return string $longitude
	 */
	public function getLongitude() {
		return $this->longitude;
	}

	/**
	 * Sets the longitude
	 *
	 * @param string $longitude
	 * @return void
	 */
	public function setLongitude($longitude) {
		$this->longitude = $longitude;
	}

	/**
	 * Adds a Facilities
	 *
	 * @param \JS\JsClinik\Domain\Model\Facilities $facility
	 * @return void
	 */
	public function addFacility(\JS\JsClinik\Domain\Model\Facilities $facility) {
		$this->facilities->attach($facility);
	}

	/**
	 * Removes a Facilities
	 *
	 * @param \JS\JsClinik\Domain\Model\Facilities $facilityToRemove The Facilities to be removed
	 * @return void
	 */
	public function removeFacility(\JS\JsClinik\Domain\Model\Facilities $facilityToRemove) {
		$this->facilities->detach($facilityToRemove);
	}

	/**
	 * Returns the facilities
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsClinik\Domain\Model\Facilities> $facilities
	 */
	public function getFacilities() {
		return $this->facilities;
	}

	/**
	 * Sets the facilities
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsClinik\Domain\Model\Facilities> $facilities
	 * @return void
	 */
	public function setFacilities(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $facilities) {
		$this->facilities = $facilities;
	}

	/**
	 * Returns the displayMapContent
	 *
	 * @return boolean $displayMapContent
	 */
	public function getDisplayMapContent() {
		return $this->displayMapContent;
	}

	/**
	 * Sets the displayMapContent
	 *
	 * @param boolean $displayMapContent
	 * @return void
	 */
	public function setDisplayMapContent($displayMapContent) {
		$this->displayMapContent = $displayMapContent;
	}

	/**
	 * Returns the boolean state of displayMapContent
	 *
	 * @return boolean
	 */
	public function isDisplayMapContent() {
		return $this->displayMapContent;
	}

	/**
	 * Returns the mapContent
	 *
	 * @return string $mapContent
	 */
	public function getMapContent() {
		return $this->mapContent;
	}

	/**
	 * Sets the mapContent
	 *
	 * @param string $mapContent
	 * @return void
	 */
	public function setMapContent($mapContent) {
		$this->mapContent = $mapContent;
	}

	/**
	 * Returns the mapIcon
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $mapIcon
	 */
	public function getMapIcon() {
		return $this->mapIcon;
	}

	/**
	 * Sets the mapIcon
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $mapIcon
	 * @return void
	 */
	public function setMapIcon(\TYPO3\CMS\Extbase\Domain\Model\FileReference $mapIcon) {
		$this->mapIcon = $mapIcon;
	}

}