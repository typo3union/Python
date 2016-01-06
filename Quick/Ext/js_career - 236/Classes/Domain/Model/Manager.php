<?php
namespace JS\JsCareer\Domain\Model;

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
 * Manager
 */
class Manager extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * designation
	 *
	 * @var string
	 */
	protected $designation = '';

	/**
	 * voraussetzungen
	 *
	 * @var string
	 */
	protected $voraussetzungen = '';

	/**
	 * phone
	 *
	 * @var string
	 */
	protected $phone = '';

	/**
	 * email
	 *
	 * @var string
	 */
	protected $email = '';

	/**
	 * picture
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $picture = NULL;

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
	 * Returns the designation
	 *
	 * @return string $designation
	 */
	public function getDesignation() {
		return $this->designation;
	}

	/**
	 * Sets the designation
	 *
	 * @param string $designation
	 * @return void
	 */
	public function setDesignation($designation) {
		$this->designation = $designation;
	}

	/**
	 * Returns the phone
	 *
	 * @return string $phone
	 */
	public function getPhone() {
		return $this->phone;
	}

	/**
	 * Sets the phone
	 *
	 * @param string $phone
	 * @return void
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
	}

	/**
	 * Returns the email
	 *
	 * @return string $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Sets the email
	 *
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * Returns the picture
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $picture
	 */
	public function getPicture() {
		return $this->picture;
	}

	/**
	 * Sets the picture
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $picture
	 * @return void
	 */
	public function setPicture(\TYPO3\CMS\Extbase\Domain\Model\FileReference $picture) {
		$this->picture = $picture;
	}

	/**
	 * Returns the voraussetzungen
	 *
	 * @return string $voraussetzungen
	 */
	public function getVoraussetzungen() {
		return $this->voraussetzungen;
	}

	/**
	 * Sets the voraussetzungen
	 *
	 * @param string $voraussetzungen
	 * @return void
	 */
	public function setVoraussetzungen($voraussetzungen) {
		$this->voraussetzungen = $voraussetzungen;
	}

}