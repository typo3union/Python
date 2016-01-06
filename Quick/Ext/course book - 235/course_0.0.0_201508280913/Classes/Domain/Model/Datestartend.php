<?php
namespace Typo3\Course\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Ajay Gohel <shared_user@webofficeindia.com>, WOI
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
 * Datestartend
 */
class Datestartend extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * titleinfo
	 * 
	 * @var string
	 */
	protected $titleinfo = '';

	/**
	 * startdate
	 * 
	 * @var \DateTime
	 */
	protected $startdate = NULL;

	/**
	 * enddate
	 * 
	 * @var \DateTime
	 */
	protected $enddate = NULL;

	/**
	 * price
	 * 
	 * @var string
	 */
	protected $price = '';

	/**
	 * lastmintuteprice
	 * 
	 * @var string
	 */
	protected $lastmintuteprice = '';
	
	
	/**
	 * actlastmin
	 * 
	 * @var boolean
	 */
	protected $actlastmin = FALSE;
	

	/**
	 * durationtiming
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3\Course\Domain\Model\Dates>
	 */
	protected $durationtiming = NULL;
	
	/**
	 * type
	 *
	 * @var integer
	 */
	protected $type = 0;

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
		$this->durationtiming = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the titleinfo
	 * 
	 * @return string $titleinfo
	 */
	public function getTitleinfo() {
		return $this->titleinfo;
	}

	/**
	 * Sets the titleinfo
	 * 
	 * @param string $titleinfo
	 * @return void
	 */
	public function setTitleinfo($titleinfo) {
		$this->titleinfo = $titleinfo;
	}

	/**
	 * Returns the startdate
	 * 
	 * @return \DateTime $startdate
	 */
	public function getStartdate() {
		return $this->startdate;
	}

	/**
	 * Sets the startdate
	 * 
	 * @param \DateTime $startdate
	 * @return void
	 */
	public function setStartdate(\DateTime $startdate) {
		$this->startdate = $startdate;
	}

	/**
	 * Returns the enddate
	 * 
	 * @return \DateTime $enddate
	 */
	public function getEnddate() {
		return $this->enddate;
	}

	/**
	 * Sets the enddate
	 * 
	 * @param \DateTime $enddate
	 * @return void
	 */
	public function setEnddate(\DateTime $enddate) {
		$this->enddate = $enddate;
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
	 * Returns the lastmintuteprice
	 * 
	 * @return string $lastmintuteprice
	 */
	public function getLastmintuteprice() {
		return $this->lastmintuteprice;
	}

	/**
	 * Sets the lastmintuteprice
	 * 
	 * @param string $lastmintuteprice
	 * @return void
	 */
	public function setLastmintuteprice($lastmintuteprice) {
		$this->lastmintuteprice = $lastmintuteprice;
	}

	/**
	 * Adds a Dates
	 * 
	 * @param \Typo3\Course\Domain\Model\Dates $durationtiming
	 * @return void
	 */
	public function addDurationtiming(\Typo3\Course\Domain\Model\Dates $durationtiming) {
		$this->durationtiming->attach($durationtiming);
	}

	/**
	 * Removes a Dates
	 * 
	 * @param \Typo3\Course\Domain\Model\Dates $durationtimingToRemove The Dates to be removed
	 * @return void
	 */
	public function removeDurationtiming(\Typo3\Course\Domain\Model\Dates $durationtimingToRemove) {
		$this->durationtiming->detach($durationtimingToRemove);
	}

	/**
	 * Returns the durationtiming
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3\Course\Domain\Model\Dates> $durationtiming
	 */
	public function getDurationtiming() {
		return $this->durationtiming;
	}

	/**
	 * Sets the durationtiming
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3\Course\Domain\Model\Dates> $durationtiming
	 * @return void
	 */
	public function setDurationtiming(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $durationtiming) {
		$this->durationtiming = $durationtiming;
	}
	
	/**
	 * Returns the actlastmin
	 * 
	 * @return boolean $actlastmin
	 */
	public function getActlastmin() {
		return $this->actlastmin;
	}

	/**
	 * Sets the actlastmin
	 * 
	 * @param boolean $actlastmin
	 * @return void
	 */
	public function setActlastmin($actlastmin) {
		$this->actlastmin = $actlastmin;
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


}