<?php
namespace TYPO3\NmTouren\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Marco Adomat <m.adomat@netzmagnet.de>, netzmagnet GmbH
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
 * Termine
 */
class Termine extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * datum
	 *
	 * @var \DateTime
	 */
	protected $datum = NULL;

	/**
	 * geblockt
	 *
	 * @var boolean
	 */
	protected $geblockt = FALSE;

	/**
	 * Returns the datum
	 *
	 * @return \DateTime $datum
	 */
	public function getDatum() {
		return $this->datum;
	}

	/**
	 * Sets the datum
	 *
	 * @param \DateTime $datum
	 * @return void
	 */
	public function setDatum(\DateTime $datum) {
		$this->datum = $datum;
	}

	/**
	 * Returns the geblockt
	 *
	 * @return boolean $geblockt
	 */
	public function getGeblockt() {
		return $this->geblockt;
	}

	/**
	 * Sets the geblockt
	 *
	 * @param boolean $geblockt
	 * @return void
	 */
	public function setGeblockt($geblockt) {
		$this->geblockt = $geblockt;
	}

	/**
	 * Returns the boolean state of geblockt
	 *
	 * @return boolean
	 */
	public function isGeblockt() {
		return $this->geblockt;
	}

}