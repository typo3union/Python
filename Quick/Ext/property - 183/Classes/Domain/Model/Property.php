<?php
namespace TYPO3\Property\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Martin Galler <martin.galler@weboffice.co.at>, Weboffice
 *           Pooja Patel <pooja.patel@webofficeindia.com>, Weboffice
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
 * Property
 */
class Property extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * subtitle
	 *
	 * @var string
	 */
	protected $subtitle = '';

	/**
	 * objectType
	 *
	 * @var boolean
	 */
	protected $objectType = FALSE;

	/**
	 * price
	 *
	 * @var string
	 */
	protected $price = '';

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * images
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $images = NULL;

	/**
	 * pdf
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $pdf = NULL;

	/**
	 * area
	 *
	 * @var string
	 */
	protected $area = '';

	/**
	 * bed
	 *
	 * @var string
	 */
	protected $bed = '';

	/**
	 * bath
	 *
	 * @var string
	 */
	protected $bath = '';

	/**
	 * floor
	 *
	 * @var string
	 */
	protected $floor = '';

	/**
	 * garage
	 *
	 * @var string
	 */
	protected $garage = '';

	/**
	 * room
	 *
	 * @var string
	 */
	protected $room = '';

	/**
	 * floorArea
	 *
	 * @var string
	 */
	protected $floorArea = '';

	/**
	 * available
	 *
	 * @var string
	 */
	protected $available = '';

	/**
	 * heating
	 *
	 * @var string
	 */
	protected $heating = '';

	/**
	 * flooring
	 *
	 * @var string
	 */
	protected $flooring = '';

	/**
	 * expiration
	 *
	 * @var string
	 */
	protected $expiration = '';

	/**
	 * equipped
	 *
	 * @var string
	 */
	protected $equipped = '';

	/**
	 * parking
	 *
	 * @var string
	 */
	protected $parking = '';

	/**
	 * street
	 *
	 * @var string
	 */
	protected $street = '';

	/**
	 * city
	 *
	 * @var string
	 */
	protected $city = '';

	/**
	 * state
	 *
	 * @var string
	 */
	protected $state = '';

	/**
	 * plz
	 *
	 * @var string
	 */
	protected $plz = '';

	/**
	 * country
	 *
	 * @var string
	 */
	protected $country = '';

	/**
	 * propertyType
	 *
	 * @var \TYPO3\Property\Domain\Model\PropertyType
	 */
	protected $propertyType = NULL;

	/**
	 * buildingType
	 *
	 * @var \TYPO3\Property\Domain\Model\BuildingType
	 */
	protected $buildingType = NULL;
	
	/**
	 * sorting
	 *
	 * @var \TYPO3\Property\Domain\Model\BuildingType
	 */
	protected $sorting = NULL;

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
	 * Returns the subtitle
	 *
	 * @return string $subtitle
	 */
	public function getSubtitle() {
		return $this->subtitle;
	}

	/**
	 * Sets the subtitle
	 *
	 * @param string $subtitle
	 * @return void
	 */
	public function setSubtitle($subtitle) {
		$this->subtitle = $subtitle;
	}

	/**
	 * Returns the objectType
	 *
	 * @return boolean $objectType
	 */
	public function getObjectType() {
		return $this->objectType;
	}

	/**
	 * Sets the objectType
	 *
	 * @param boolean $objectType
	 * @return void
	 */
	public function setObjectType($objectType) {
		$this->objectType = $objectType;
	}

	/**
	 * Returns the boolean state of objectType
	 *
	 * @return boolean
	 */
	public function isObjectType() {
		return $this->objectType;
	}

	/**
	 * Returns the price
	 *
	 * @return string $price
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * Sets the price
	 *
	 * @param string $price
	 * @return void
	 */
	public function setPrice($price) {
		$this->price = $price;
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
	 * Returns the pdf
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $pdf
	 */
	public function getPdf() {
		return $this->pdf;
	}

	/**
	 * Sets the pdf
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $pdf
	 * @return void
	 */
	public function setPdf(\TYPO3\CMS\Extbase\Domain\Model\FileReference $pdf) {
		$this->pdf = $pdf;
	}

	/**
	 * Returns the area
	 *
	 * @return string $area
	 */
	public function getArea() {
		return $this->area;
	}

	/**
	 * Sets the area
	 *
	 * @param string $area
	 * @return void
	 */
	public function setArea($area) {
		$this->area = $area;
	}

	/**
	 * Returns the bed
	 *
	 * @return string $bed
	 */
	public function getBed() {
		return $this->bed;
	}

	/**
	 * Sets the bed
	 *
	 * @param string $bed
	 * @return void
	 */
	public function setBed($bed) {
		$this->bed = $bed;
	}

	/**
	 * Returns the bath
	 *
	 * @return string $bath
	 */
	public function getBath() {
		return $this->bath;
	}

	/**
	 * Sets the bath
	 *
	 * @param string $bath
	 * @return void
	 */
	public function setBath($bath) {
		$this->bath = $bath;
	}

	/**
	 * Returns the floor
	 *
	 * @return string $floor
	 */
	public function getFloor() {
		return $this->floor;
	}

	/**
	 * Sets the floor
	 *
	 * @param string $floor
	 * @return void
	 */
	public function setFloor($floor) {
		$this->floor = $floor;
	}

	/**
	 * Returns the garage
	 *
	 * @return string $garage
	 */
	public function getGarage() {
		return $this->garage;
	}

	/**
	 * Sets the garage
	 *
	 * @param string $garage
	 * @return void
	 */
	public function setGarage($garage) {
		$this->garage = $garage;
	}

	/**
	 * Returns the room
	 *
	 * @return string $room
	 */
	public function getRoom() {
		return $this->room;
	}

	/**
	 * Sets the room
	 *
	 * @param string $room
	 * @return void
	 */
	public function setRoom($room) {
		$this->room = $room;
	}

	/**
	 * Returns the floorArea
	 *
	 * @return string $floorArea
	 */
	public function getFloorArea() {
		return $this->floorArea;
	}

	/**
	 * Sets the floorArea
	 *
	 * @param string $floorArea
	 * @return void
	 */
	public function setFloorArea($floorArea) {
		$this->floorArea = $floorArea;
	}

	/**
	 * Returns the available
	 *
	 * @return string $available
	 */
	public function getAvailable() {
		return $this->available;
	}

	/**
	 * Sets the available
	 *
	 * @param string $available
	 * @return void
	 */
	public function setAvailable($available) {
		$this->available = $available;
	}

	/**
	 * Returns the heating
	 *
	 * @return string $heating
	 */
	public function getHeating() {
		return $this->heating;
	}

	/**
	 * Sets the heating
	 *
	 * @param string $heating
	 * @return void
	 */
	public function setHeating($heating) {
		$this->heating = $heating;
	}

	/**
	 * Returns the flooring
	 *
	 * @return string $flooring
	 */
	public function getFlooring() {
		return $this->flooring;
	}

	/**
	 * Sets the flooring
	 *
	 * @param string $flooring
	 * @return void
	 */
	public function setFlooring($flooring) {
		$this->flooring = $flooring;
	}

	/**
	 * Returns the expiration
	 *
	 * @return string $expiration
	 */
	public function getExpiration() {
		return $this->expiration;
	}

	/**
	 * Sets the expiration
	 *
	 * @param string $expiration
	 * @return void
	 */
	public function setExpiration($expiration) {
		$this->expiration = $expiration;
	}

	/**
	 * Returns the equipped
	 *
	 * @return string $equipped
	 */
	public function getEquipped() {
		return $this->equipped;
	}

	/**
	 * Sets the equipped
	 *
	 * @param string $equipped
	 * @return void
	 */
	public function setEquipped($equipped) {
		$this->equipped = $equipped;
	}

	/**
	 * Returns the parking
	 *
	 * @return string $parking
	 */
	public function getParking() {
		return $this->parking;
	}

	/**
	 * Sets the parking
	 *
	 * @param string $parking
	 * @return void
	 */
	public function setParking($parking) {
		$this->parking = $parking;
	}

	/**
	 * Returns the street
	 *
	 * @return string $street
	 */
	public function getStreet() {
		return $this->street;
	}

	/**
	 * Sets the street
	 *
	 * @param string $street
	 * @return void
	 */
	public function setStreet($street) {
		$this->street = $street;
	}

	/**
	 * Returns the city
	 *
	 * @return string $city
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * Sets the city
	 *
	 * @param string $city
	 * @return void
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * Returns the state
	 *
	 * @return string $state
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * Sets the state
	 *
	 * @param string $state
	 * @return void
	 */
	public function setState($state) {
		$this->state = $state;
	}

	/**
	 * Returns the plz
	 *
	 * @return string $plz
	 */
	public function getPlz() {
		return $this->plz;
	}

	/**
	 * Sets the plz
	 *
	 * @param string $plz
	 * @return void
	 */
	public function setPlz($plz) {
		$this->plz = $plz;
	}

	/**
	 * Returns the country
	 *
	 * @return string $country
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * Sets the country
	 *
	 * @param string $country
	 * @return void
	 */
	public function setCountry($country) {
		$this->country = $country;
	}

	/**
	 * Returns the propertyType
	 *
	 * @return \TYPO3\Property\Domain\Model\PropertyType $propertyType
	 */
	public function getPropertyType() {
		return $this->propertyType;
	}

	/**
	 * Sets the propertyType
	 *
	 * @param \TYPO3\Property\Domain\Model\PropertyType $propertyType
	 * @return void
	 */
	public function setPropertyType(\TYPO3\Property\Domain\Model\PropertyType $propertyType) {
		$this->propertyType = $propertyType;
	}

	/**
	 * Returns the buildingType
	 *
	 * @return \TYPO3\Property\Domain\Model\BuildingType $buildingType
	 */
	public function getBuildingType() {
		return $this->buildingType;
	}

	/**
	 * Sets the buildingType
	 *
	 * @param \TYPO3\Property\Domain\Model\BuildingType $buildingType
	 * @return void
	 */
	public function setBuildingType(\TYPO3\Property\Domain\Model\BuildingType $buildingType) {
		$this->buildingType = $buildingType;
	}

	/**
	 * Returns the sorting
	 *
	 * @return \TYPO3\Property\Domain\Model\BuildingType $sorting
	 */
	public function getSorting() {
		return $this->sorting;
	}

	/**
	 * Sets the sorting
	 *
	 * @param \TYPO3\Property\Domain\Model\BuildingType $sorting
	 * @return void
	 */
	public function setSorting(\TYPO3\Property\Domain\Model\BuildingType $sorting) {
		$this->sorting = $sorting;
	}

}