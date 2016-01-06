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
 * Inquirer
 */
class Inquirer extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * email
	 *
	 * @var string
	 */
	protected $email = '';

	/**
	 * address
	 *
	 * @var string
	 */
	protected $address = '';

	/**
	 * telephone
	 *
	 * @var string
	 */
	protected $telephone = '';

	/**
	 * message
	 *
	 * @var string
	 */
	protected $message = '';

	/**
	 * ip
	 *
	 * @var string
	 */
	protected $ip = '';
	
	/**
	 * property
	 *
	 * @var string
	 */
	protected $property = '';
	
	/**
	 * sorting
	 *
	 * @var string
	 */
	protected $sorting = '';

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
	 * Returns the telephone
	 *
	 * @return string $telephone
	 */
	public function getTelephone() {
		return $this->telephone;
	}

	/**
	 * Sets the telephone
	 *
	 * @param string $telephone
	 * @return void
	 */
	public function setTelephone($telephone) {
		$this->telephone = $telephone;
	}

	/**
	 * Returns the message
	 *
	 * @return string $message
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * Sets the message
	 *
	 * @param string $message
	 * @return void
	 */
	public function setMessage($message) {
		$this->message = $message;
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
	 * Returns the property
	 *
	 * @return string $property
	 */
	public function getProperty() {
		return $this->property;
	}

	/**
	 * Sets the property
	 *
	 * @param string $property
	 * @return void
	 */
	public function setProperty($property) {
		$this->property = $property;
	}
	
	
	/**
	 * Returns the sorting
	 *
	 * @return string $property
	 */
	public function getSorting() {
		return $this->sorting;
	}

	/**
	 * Sets the sorting
	 *
	 * @param string $sorting
	 * @return void
	 */
	public function setSorting($sorting) {
		$this->sorting = $sorting;
	}

}