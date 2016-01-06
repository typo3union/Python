<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Martin <martin.galler@weboffice.co.at>, Weboffice
 *  Pooja <pooja.patel@webofficeindia.com>, Weboffice
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
 *
 *
 * @package voucher
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Voucher_Domain_Model_VoucherCustomer extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * isAdmin
	 *
	 * @var boolean
	 */
	protected $isAdmin = FALSE;

	/**
	 * deActive
	 *
	 * @var boolean
	 */
	protected $deActive = FALSE;

	/**
	 * gender
	 *
	 * @var integer
	 */
	protected $gender;

	/**
	 * email
	 *
	 * @var string
	 */
	protected $email;

	/**
	 * username
	 *
	 * @var string
	 */
	protected $username;

	/**
	 * password
	 *
	 * @var string
	 */
	protected $password;

	/**
	 * firstname
	 *
	 * @var string
	 */
	protected $firstname;

	/**
	 * lastname
	 *
	 * @var string
	 */
	protected $lastname;

	/**
	 * company
	 *
	 * @var string
	 */
	protected $company;

	/**
	 * address
	 *
	 * @var string
	 */
	protected $address;

	/**
	 * zip
	 *
	 * @var string
	 */
	protected $zip;

	/**
	 * location
	 *
	 * @var string
	 */
	protected $location;

	/**
	 * country
	 *
	 * @var string
	 */
	protected $country;

	/**
	 * phone
	 *
	 * @var string
	 */
	protected $phone;
	
	/**
	 * invoice
	 *
	 * @var string
	 */
	protected $invoice;

	/**
	 * Returns the isAdmin
	 *
	 * @return boolean $isAdmin
	 */
	public function getIsAdmin() {
		return $this->isAdmin;
	}

	/**
	 * Sets the isAdmin
	 *
	 * @param boolean $isAdmin
	 * @return void
	 */
	public function setIsAdmin($isAdmin) {
		$this->isAdmin = $isAdmin;
	}

	/**
	 * Returns the boolean state of isAdmin
	 *
	 * @return boolean
	 */
	public function isIsAdmin() {
		return $this->getIsAdmin();
	}

	/**
	 * Returns the deActive
	 *
	 * @return boolean $deActive
	 */
	public function getDeActive() {
		return $this->deActive;
	}

	/**
	 * Sets the deActive
	 *
	 * @param boolean $deActive
	 * @return void
	 */
	public function setDeActive($deActive) {
		$this->deActive = $deActive;
	}

	/**
	 * Returns the boolean state of deActive
	 *
	 * @return boolean
	 */
	public function isDeActive() {
		return $this->getDeActive();
	}

	/**
	 * Returns the gender
	 *
	 * @return integer $gender
	 */
	public function getGender() {
		return $this->gender;
	}

	/**
	 * Sets the gender
	 *
	 * @param integer $gender
	 * @return void
	 */
	public function setGender($gender) {
		$this->gender = $gender;
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
	 * Returns the username
	 *
	 * @return string $username
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * Sets the username
	 *
	 * @param string $username
	 * @return void
	 */
	public function setUsername($username) {
		$this->username = $username;
	}

	/**
	 * Returns the password
	 *
	 * @return string $password
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * Sets the password
	 *
	 * @param string $password
	 * @return void
	 */
	public function setPassword($password) {
		$this->password = $password;
	}

	/**
	 * Returns the firstname
	 *
	 * @return string $firstname
	 */
	public function getFirstname() {
		return $this->firstname;
	}

	/**
	 * Sets the firstname
	 *
	 * @param string $firstname
	 * @return void
	 */
	public function setFirstname($firstname) {
		$this->firstname = $firstname;
	}

	/**
	 * Returns the lastname
	 *
	 * @return string $lastname
	 */
	public function getLastname() {
		return $this->lastname;
	}

	/**
	 * Sets the lastname
	 *
	 * @param string $lastname
	 * @return void
	 */
	public function setLastname($lastname) {
		$this->lastname = $lastname;
	}

	/**
	 * Returns the company
	 *
	 * @return string $company
	 */
	public function getCompany() {
		return $this->company;
	}

	/**
	 * Sets the company
	 *
	 * @param string $company
	 * @return void
	 */
	public function setCompany($company) {
		$this->company = $company;
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
	 * Returns the zip
	 *
	 * @return string $zip
	 */
	public function getZip() {
		return $this->zip;
	}

	/**
	 * Sets the zip
	 *
	 * @param string $zip
	 * @return void
	 */
	public function setZip($zip) {
		$this->zip = $zip;
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
	 * Returns the invoice
	 *
	 * @return string $invoice
	 */
	public function getInvoice() {
		return $this->invoice;
	}

	/**
	 * Sets the invoice
	 *
	 * @param string $invoice
	 * @return void
	 */
	public function setInvoice($invoice) {
		$this->invoice = $invoice;
	}

}
?>