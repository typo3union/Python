<?php
namespace TYPO3\Events\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 pooja <pooja.patel@webofficeindia.com>, Weboffice
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
 * Event
 */
class Event extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * date
	 *
	 * @var \DateTime
	 */
	protected $date = NULL;

	/**
	 * time
	 *
	 * @var string
	 */
	protected $time = '';

	/**
	 * private
	 *
	 * @var integer
	 */
	protected $private = 0;

	/**
	 * category
	 *
	 * @var \TYPO3\Events\Domain\Model\Category
	 */
	protected $category = NULL;

	/**
	 * location
	 *
	 * @var \TYPO3\Events\Domain\Model\Location
	 */
	protected $location = NULL;
	
	/**
	 * icsFile
	 *
	 * @var string
	 */
	protected $icsFile = '';
		
	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = '';
	

	
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
	 * Returns the date
	 *
	 * @return \DateTime $date
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * Sets the date
	 *
	 * @param \DateTime $date
	 * @return void
	 */
	public function setDate(\DateTime $date) {
		$this->date = $date;
	}

	/**
	 * Returns the time
	 *
	 * @return string $time
	 */
	public function getTime() {
		return $this->time;
	}

	/**
	 * Sets the time
	 *
	 * @param string $time
	 * @return void
	 */
	public function setTime($time) {
		$this->time = $time;
	}

	/**
	 * Returns the private
	 *
	 * @return integer $private
	 */
	public function getPrivate() {
		return $this->private;
	}

	/**
	 * Sets the private
	 *
	 * @param integer $private
	 * @return void
	 */
	public function setPrivate($private) {
		$this->private = $private;
	}

	/**
	 * Returns the category
	 *
	 * @return \TYPO3\Events\Domain\Model\Category $category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * Sets the category
	 *
	 * @param \TYPO3\Events\Domain\Model\Category $category
	 * @return void
	 */
	public function setCategory(\TYPO3\Events\Domain\Model\Category $category) {
		$this->category = $category;
	}

	/**
	 * Returns the location
	 *
	 * @return \TYPO3\Events\Domain\Model\Location $location
	 */
	public function getLocation() {
		return $this->location;
	}

	/**
	 * Sets the location
	 *
	 * @param \TYPO3\Events\Domain\Model\Location $location
	 * @return void
	 */
	public function setLocation(\TYPO3\Events\Domain\Model\Location $location) {
		$this->location = $location;
	}
	
	/**
	 * Returns the icsFile
	 *
	 * @return string $icsFile
	 */
	public function getIcsFile() {
		return $this->icsFile;
	}

	/**
	 * Sets the icsFile
	 *
	 * @param string $icsFile
	 * @return void
	 */
	public function setIcsFile($icsFile) {
		$this->icsFile = $icsFile;
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



}