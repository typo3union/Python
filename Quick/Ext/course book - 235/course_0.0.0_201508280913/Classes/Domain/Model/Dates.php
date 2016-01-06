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
 * Dates
 */
class Dates extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * durationinfo
	 * 
	 * @var string
	 */
	protected $durationinfo = '';

	/**
	 * date
	 * 
	 * @var \DateTime
	 */
	protected $date = NULL;

	/**
	 * duration
	 * 
	 * @var \Typo3\Course\Domain\Model\Durations
	 */
	protected $duration = NULL;

	/**
	 * Returns the durationinfo
	 * 
	 * @return string $durationinfo
	 */
	public function getDurationinfo() {
		return $this->durationinfo;
	}

	/**
	 * Sets the durationinfo
	 * 
	 * @param string $durationinfo
	 * @return void
	 */
	public function setDurationinfo($durationinfo) {
		$this->durationinfo = $durationinfo;
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
	 * Returns the duration
	 * 
	 * @return \Typo3\Course\Domain\Model\Durations $duration
	 */
	public function getDuration() {
		return $this->duration;
	}

	/**
	 * Sets the duration
	 * 
	 * @param \Typo3\Course\Domain\Model\Durations $duration
	 * @return void
	 */
	public function setDuration(\Typo3\Course\Domain\Model\Durations $duration) {
		$this->duration = $duration;
	}

}