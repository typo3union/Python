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
class Tx_Voucher_Domain_Model_Voucher extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * price
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $price;

	/**
	 * tax
	 *
	 * @var string
	 */
	protected $tax;

	/**
	 * validTillDate
	 *
	 * @var DateTime
	 */
	protected $validTillDate;

	/**
	 * image
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $image;

	/**
	 * shortDescription
	 *
	 * @var string
	 */
	protected $shortDescription;

	/**
	 * longDescption
	 *
	 * @var string
	 */
	protected $longDescption;

	/**
	 * voucherCategory
	 *
	 * @var string
	 */
	protected $voucherCategory;

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
	 * Returns the tax
	 *
	 * @return string $tax
	 */
	public function getTax() {
		return $this->tax;
	}

	/**
	 * Sets the tax
	 *
	 * @param string $tax
	 * @return void
	 */
	public function setTax($tax) {
		$this->tax = $tax;
	}

	/**
	 * Returns the validTillDate
	 *
	 * @return DateTime $validTillDate
	 */
	public function getValidTillDate() {
		return $this->validTillDate;
	}

	/**
	 * Sets the validTillDate
	 *
	 * @param DateTime $validTillDate
	 * @return void
	 */
	public function setValidTillDate($validTillDate) {
		$this->validTillDate = $validTillDate;
	}

	/**
	 * Returns the image
	 *
	 * @return string $image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the image
	 *
	 * @param string $image
	 * @return void
	 */
	public function setImage($image) {
		$this->image = $image;
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
	 * Returns the longDescption
	 *
	 * @return string $longDescption
	 */
	public function getLongDescption() {
		return $this->longDescption;
	}

	/**
	 * Sets the longDescption
	 *
	 * @param string $longDescption
	 * @return void
	 */
	public function setLongDescption($longDescption) {
		$this->longDescption = $longDescption;
	}

	/**
	 * Returns the voucherCategory
	 *
	 * @return string $voucherCategory
	 */
	public function getVoucherCategory() {
		return $this->voucherCategory;
	}

	/**
	 * Sets the voucherCategory
	 *
	 * @param string $voucherCategory
	 * @return void
	 */
	public function setVoucherCategory($voucherCategory) {
		$this->voucherCategory = $voucherCategory;
	}

}
?>