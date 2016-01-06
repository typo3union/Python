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
 * Job
 */
class Job extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * place
	 *
	 * @var string
	 */
	protected $place = '';

	/**
	 * joinCheck
	 *
	 * @var boolean
	 */
	protected $joinCheck = FALSE;

	/**
	 * joinDate
	 *
	 * @var \DateTime
	 */
	protected $joinDate = NULL;

	/**
	 * textCheck
	 *
	 * @var boolean
	 */
	protected $textCheck = FALSE;

	/**
	 * text
	 *
	 * @var string
	 */
	protected $text = '';

	/**
	 * abSofort
	 *
	 * @var boolean
	 */
	protected $abSofort = FALSE;

	/**
	 * timing
	 *
	 * @var integer
	 */
	protected $timing = 0;

	/**
	 * contract
	 *
	 * @var string
	 */
	protected $contract = '';

	/**
	 * shortDescription
	 *
	 * @var string
	 */
	protected $shortDescription = '';

	/**
	 * descriptionHeader
	 *
	 * @var string
	 */
	protected $descriptionHeader = '';

	/**
	 * descriptionPart1
	 *
	 * @var string
	 */
	protected $descriptionPart1 = '';

	/**
	 * descriptionPart2
	 *
	 * @var string
	 */
	protected $descriptionPart2 = '';

	/**
	 * pdf
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $pdf = NULL;

	/**
	 * caetgory
	 *
	 * @var \JS\JsCareer\Domain\Model\Clinik
	 */
	protected $caetgory = NULL;

	/**
	 * contactPerson
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsCareer\Domain\Model\Manager>
	 */
	protected $contactPerson = NULL;

	/**
	 * applicant
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsCareer\Domain\Model\Applicant>
	 * @cascade remove
	 */
	protected $applicant = NULL;

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
		$this->contactPerson = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->applicant = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Returns the place
	 *
	 * @return string $place
	 */
	public function getPlace() {
		return $this->place;
	}

	/**
	 * Sets the place
	 *
	 * @param string $place
	 * @return void
	 */
	public function setPlace($place) {
		$this->place = $place;
	}

	/**
	 * Returns the joinDate
	 *
	 * @return \DateTime $joinDate
	 */
	public function getJoinDate() {
		return $this->joinDate;
	}

	/**
	 * Sets the joinDate
	 *
	 * @param \DateTime $joinDate
	 * @return void
	 */
	public function setJoinDate(\DateTime $joinDate) {
		$this->joinDate = $joinDate;
	}

	/**
	 * Returns the timing
	 *
	 * @return integer $timing
	 */
	public function getTiming() {
		return $this->timing;
	}

	/**
	 * Sets the timing
	 *
	 * @param integer $timing
	 * @return void
	 */
	public function setTiming($timing) {
		$this->timing = $timing;
	}

	/**
	 * Returns the contract
	 *
	 * @return string $contract
	 */
	public function getContract() {
		return $this->contract;
	}

	/**
	 * Sets the contract
	 *
	 * @param string $contract
	 * @return void
	 */
	public function setContract($contract) {
		$this->contract = $contract;
	}

	/**
	 * Returns the shortDescription
	 *
	 * @return string $shortDescription
	 */
	public function getShortDescription() {
		return $this->shortDescription;
	}

	/**
	 * Sets the shortDescription
	 *
	 * @param string $shortDescription
	 * @return void
	 */
	public function setShortDescription($shortDescription) {
		$this->shortDescription = $shortDescription;
	}

	/**
	 * Returns the descriptionHeader
	 *
	 * @return string $descriptionHeader
	 */
	public function getDescriptionHeader() {
		return $this->descriptionHeader;
	}

	/**
	 * Sets the descriptionHeader
	 *
	 * @param string $descriptionHeader
	 * @return void
	 */
	public function setDescriptionHeader($descriptionHeader) {
		$this->descriptionHeader = $descriptionHeader;
	}

	/**
	 * Returns the descriptionPart1
	 *
	 * @return string $descriptionPart1
	 */
	public function getDescriptionPart1() {
		return $this->descriptionPart1;
	}

	/**
	 * Sets the descriptionPart1
	 *
	 * @param string $descriptionPart1
	 * @return void
	 */
	public function setDescriptionPart1($descriptionPart1) {
		$this->descriptionPart1 = $descriptionPart1;
	}

	/**
	 * Returns the descriptionPart2
	 *
	 * @return string $descriptionPart2
	 */
	public function getDescriptionPart2() {
		return $this->descriptionPart2;
	}

	/**
	 * Sets the descriptionPart2
	 *
	 * @param string $descriptionPart2
	 * @return void
	 */
	public function setDescriptionPart2($descriptionPart2) {
		$this->descriptionPart2 = $descriptionPart2;
	}

	/**
	 * Returns the caetgory
	 *
	 * @return \JS\JsCareer\Domain\Model\Clinik $caetgory
	 */
	public function getCaetgory() {
		return $this->caetgory;
	}

	/**
	 * Sets the caetgory
	 *
	 * @param \JS\JsCareer\Domain\Model\Clinik $caetgory
	 * @return void
	 */
	public function setCaetgory(\JS\JsCareer\Domain\Model\Clinik $caetgory) {
		$this->caetgory = $caetgory;
	}

	/**
	 * Adds a Manager
	 *
	 * @param \JS\JsCareer\Domain\Model\Manager $contactPerson
	 * @return void
	 */
	public function addContactPerson(\JS\JsCareer\Domain\Model\Manager $contactPerson) {
		$this->contactPerson->attach($contactPerson);
	}

	/**
	 * Removes a Manager
	 *
	 * @param \JS\JsCareer\Domain\Model\Manager $contactPersonToRemove The Manager to be removed
	 * @return void
	 */
	public function removeContactPerson(\JS\JsCareer\Domain\Model\Manager $contactPersonToRemove) {
		$this->contactPerson->detach($contactPersonToRemove);
	}

	/**
	 * Returns the contactPerson
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsCareer\Domain\Model\Manager> $contactPerson
	 */
	public function getContactPerson() {
		return $this->contactPerson;
	}

	/**
	 * Sets the contactPerson
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsCareer\Domain\Model\Manager> $contactPerson
	 * @return void
	 */
	public function setContactPerson(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $contactPerson) {
		$this->contactPerson = $contactPerson;
	}

	/**
	 * Adds a Applicant
	 *
	 * @param \JS\JsCareer\Domain\Model\Applicant $applicant
	 * @return void
	 */
	public function addApplicant(\JS\JsCareer\Domain\Model\Applicant $applicant) {
		$this->applicant->attach($applicant);
	}

	/**
	 * Removes a Applicant
	 *
	 * @param \JS\JsCareer\Domain\Model\Applicant $applicantToRemove The Applicant to be removed
	 * @return void
	 */
	public function removeApplicant(\JS\JsCareer\Domain\Model\Applicant $applicantToRemove) {
		$this->applicant->detach($applicantToRemove);
	}

	/**
	 * Returns the applicant
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsCareer\Domain\Model\Applicant> $applicant
	 */
	public function getApplicant() {
		return $this->applicant;
	}

	/**
	 * Sets the applicant
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsCareer\Domain\Model\Applicant> $applicant
	 * @return void
	 */
	public function setApplicant(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $applicant) {
		$this->applicant = $applicant;
	}

	/**
	 * Returns the joinCheck
	 *
	 * @return boolean $joinCheck
	 */
	public function getJoinCheck() {
		return $this->joinCheck;
	}

	/**
	 * Sets the joinCheck
	 *
	 * @param boolean $joinCheck
	 * @return void
	 */
	public function setJoinCheck($joinCheck) {
		$this->joinCheck = $joinCheck;
	}

	/**
	 * Returns the boolean state of joinCheck
	 *
	 * @return boolean
	 */
	public function isJoinCheck() {
		return $this->joinCheck;
	}

	/**
	 * Returns the textCheck
	 *
	 * @return boolean $textCheck
	 */
	public function getTextCheck() {
		return $this->textCheck;
	}

	/**
	 * Sets the textCheck
	 *
	 * @param boolean $textCheck
	 * @return void
	 */
	public function setTextCheck($textCheck) {
		$this->textCheck = $textCheck;
	}

	/**
	 * Returns the boolean state of textCheck
	 *
	 * @return boolean
	 */
	public function isTextCheck() {
		return $this->textCheck;
	}

	/**
	 * Returns the text
	 *
	 * @return string $text
	 */
	public function getText() {
		return $this->text;
	}

	/**
	 * Sets the text
	 *
	 * @param string $text
	 * @return void
	 */
	public function setText($text) {
		$this->text = $text;
	}

	/**
	 * Returns the boolean state of abSofortCheck
	 *
	 * @return boolean
	 */
	public function isAbSofortCheck() {
		return $this->abSofortCheck;
	}

	/**
	 * Returns the abSofort
	 *
	 * @return boolean abSofort
	 */
	public function getAbSofort() {
		return $this->abSofort;
	}

	/**
	 * Sets the abSofort
	 *
	 * @param boolean $abSofort
	 * @return boolean abSofort
	 */
	public function setAbSofort($abSofort) {
		$this->abSofort = $abSofort;
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

}