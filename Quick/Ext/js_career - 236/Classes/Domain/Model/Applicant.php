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
 * Applicant
 */
class Applicant extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

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
	 * resume
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $resume = NULL;

	/**
	 * contactDate
	 *
	 * @var \DateTime
	 */
	protected $contactDate = NULL;

	/**
	 * ip
	 *
	 * @var string
	 */
	protected $ip = '';

	/**
	 * useragent
	 *
	 * @var string
	 */
	protected $useragent = '';

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
	 * Returns the resume
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $resume
	 */
	public function getResume() {
		return $this->resume;
	}

	/**
	 * Sets the resume
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $resume
	 * @return void
	 */
	public function setResume(\TYPO3\CMS\Extbase\Domain\Model\FileReference $resume) {
		$this->resume = $resume;
	}

	/**
	 * Returns the contactDate
	 *
	 * @return \DateTime $contactDate
	 */
	public function getContactDate() {
		return $this->contactDate;
	}

	/**
	 * Sets the contactDate
	 *
	 * @param \DateTime $contactDate
	 * @return void
	 */
	public function setContactDate(\DateTime $contactDate) {
		$this->contactDate = $contactDate;
	}

	/**
	 * Returns the ip
	 *
	 * @return string $ip
	 */
	public function getIp() {
		return $this->ip;
	}

	/**
	 * Sets the ip
	 *
	 * @param string $ip
	 * @return void
	 */
	public function setIp($ip) {
		$this->ip = $ip;
	}

	/**
	 * Returns the useragent
	 *
	 * @return string $useragent
	 */
	public function getUseragent() {
		return $this->useragent;
	}

	/**
	 * Sets the useragent
	 *
	 * @param string $useragent
	 * @return void
	 */
	public function setUseragent($useragent) {
		$this->useragent = $useragent;
	}

}