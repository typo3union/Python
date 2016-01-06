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
class Tx_Voucher_Domain_Model_VoucherOrder extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * deActive
	 *
	 * @var boolean
	 */
	protected $deActive = FALSE;

	/**
	 * voucherName
	 *
	 * @var string
	 */
	protected $voucherName;

	/**
	 * voucherNumber
	 *
	 * @var string
	 */
	protected $voucherNumber;

	/**
	 * paymentType
	 *
	 * @var integer
	 */
	protected $paymentType;

	/**
	 * voucherPrice
	 *
	 * @var string
	 */
	protected $voucherPrice;

	/**
	 * paidPrice
	 *
	 * @var string
	 */
	protected $paidPrice;

	/**
	 * spendAmount
	 *
	 * @var string
	 */
	protected $spendAmount;

	/**
	 * reamingAmount
	 *
	 * @var string
	 */
	protected $reamingAmount;
	/**
	 * customer
	 *
	 * @var string
	 */
	protected $customer;
	/**
	 * customerId
	 *
	 * @var Tx_Voucher_Domain_Model_VoucherCustomer
	 */
	protected $customerId;

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
	 * Returns the voucherName
	 *
	 * @return string $voucherName
	 */
	public function getVoucherName() {
		return $this->voucherName;
	}

	/**
	 * Sets the voucherName
	 *
	 * @param string $voucherName
	 * @return void
	 */
	public function setVoucherName($voucherName) {
		$this->voucherName = $voucherName;
	}

	/**
	 * Returns the voucherNumber
	 *
	 * @return string $voucherNumber
	 */
	public function getVoucherNumber() {
		return $this->voucherNumber;
	}

	/**
	 * Sets the voucherNumber
	 *
	 * @param string $voucherNumber
	 * @return void
	 */
	public function setVoucherNumber($voucherNumber) {
		$this->voucherNumber = $voucherNumber;
	}

	/**
	 * Returns the paymentType
	 *
	 * @return integer $paymentType
	 */
	public function getPaymentType() {
		return $this->paymentType;
	}

	/**
	 * Sets the paymentType
	 *
	 * @param integer $paymentType
	 * @return void
	 */
	public function setPaymentType($paymentType) {
		$this->paymentType = $paymentType;
	}

	/**
	 * Returns the voucherPrice
	 *
	 * @return string $voucherPrice
	 */
	public function getVoucherPrice() {
		return $this->voucherPrice;
	}

	/**
	 * Sets the voucherPrice
	 *
	 * @param string $voucherPrice
	 * @return void
	 */
	public function setVoucherPrice($voucherPrice) {
		$this->voucherPrice = $voucherPrice;
	}

	/**
	 * Returns the paidPrice
	 *
	 * @return string $paidPrice
	 */
	public function getPaidPrice() {
		return $this->paidPrice;
	}

	/**
	 * Sets the paidPrice
	 *
	 * @param string $paidPrice
	 * @return void
	 */
	public function setPaidPrice($paidPrice) {
		$this->paidPrice = $paidPrice;
	}

	/**
	 * Returns the spendAmount
	 *
	 * @return string $spendAmount
	 */
	public function getSpendAmount() {
		return $this->spendAmount;
	}

	/**
	 * Sets the spendAmount
	 *
	 * @param string $spendAmount
	 * @return void
	 */
	public function setSpendAmount($spendAmount) {
		$this->spendAmount = $spendAmount;
	}

	/**
	 * Returns the reamingAmount
	 *
	 * @return string $reamingAmount
	 */
	public function getReamingAmount() {
		return $this->reamingAmount;
	}

	/**
	 * Sets the reamingAmount
	 *
	 * @param string $reamingAmount
	 * @return void
	 */
	public function setReamingAmount($reamingAmount) {
		$this->reamingAmount = $reamingAmount;
	}
	
	
	/**
	 * Returns the customer
	 *
	 * @return string $customer
	 */
	public function getCustomer() {
		return $this->customer;
	}

	/**
	 * Sets the customer
	 *
	 * @param string $customer
	 * @return void
	 */
	public function setCustomer($customer) {
		$this->customer = $customer;
	}



	/**
	 * Returns the customerId
	 *
	 * @return Tx_Voucher_Domain_Model_VoucherCustomer $customerId
	 */
	public function getCustomerId() {
		return $this->customerId;
	}

	/**
	 * Sets the customerId
	 *
	 * @param Tx_Voucher_Domain_Model_VoucherCustomer $customerId
	 * @return void
	 */
	public function setCustomerId(Tx_Voucher_Domain_Model_VoucherCustomer $customerId) {
		$this->customerId = $customerId;
	}

}
?>