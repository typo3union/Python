<?php
namespace TYPO3\Candle\Domain\Model;


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
 * Candle
 */
class Candle extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * userName
	 *
	 * @var string
	 */
	protected $userName = '';

	/**
	 * active
	 *
	 * @var boolean
	 */
	protected $active = FALSE;

	/**
	 * type
	 *
	 * @var integer
	 */
	protected $type = 0;

	/**
	 * userAddress
	 *
	 * @var string
	 */
	protected $userAddress = '';

	/**
	 * dedicatedName
	 *
	 * @var string
	 */
	protected $dedicatedName = '';

	/**
	 * message
	 *
	 * @var string
	 */
	protected $message = '';

	/**
	 * Returns the userName
	 *
	 * @return string $userName
	 */
	public function getUserName() {
		return $this->userName;
	}

	/**
	 * Sets the userName
	 *
	 * @param string $userName
	 * @return void
	 */
	public function setUserName($userName) {
		$this->userName = $userName;
	}

	/**
	 * Returns the active
	 *
	 * @return boolean $active
	 */
	public function getActive() {
		return $this->active;
	}

	/**
	 * Sets the active
	 *
	 * @param boolean $active
	 * @return void
	 */
	public function setActive($active) {
		$this->active = $active;
	}

	/**
	 * Returns the boolean state of active
	 *
	 * @return boolean
	 */
	public function isActive() {
		return $this->active;
	}

	/**
	 * Returns the type
	 *
	 * @return integer $type
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Sets the type
	 *
	 * @param integer $type
	 * @return void
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * Returns the userAddress
	 *
	 * @return string $userAddress
	 */
	public function getUserAddress() {
		return $this->userAddress;
	}

	/**
	 * Sets the userAddress
	 *
	 * @param string $userAddress
	 * @return void
	 */
	public function setUserAddress($userAddress) {
		$this->userAddress = $userAddress;
	}

	/**
	 * Returns the dedicatedName
	 *
	 * @return string $dedicatedName
	 */
	public function getDedicatedName() {
		return $this->dedicatedName;
	}

	/**
	 * Sets the dedicatedName
	 *
	 * @param string $dedicatedName
	 * @return void
	 */
	public function setDedicatedName($dedicatedName) {
		$this->dedicatedName = $dedicatedName;
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

}