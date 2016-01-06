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
 * Tour
 */
class Tour extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * termine
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\NmTouren\Domain\Model\Termine>
	 * @cascade remove
	 */
	protected $termine = NULL;

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
		$this->termine = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

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
	 * Adds a Termine
	 *
	 * @param \TYPO3\NmTouren\Domain\Model\Termine $termine
	 * @return void
	 */
	public function addTermine(\TYPO3\NmTouren\Domain\Model\Termine $termine) {
		$this->termine->attach($termine);
	}

	/**
	 * Removes a Termine
	 *
	 * @param \TYPO3\NmTouren\Domain\Model\Termine $termineToRemove The Termine to be removed
	 * @return void
	 */
	public function removeTermine(\TYPO3\NmTouren\Domain\Model\Termine $termineToRemove) {
		$this->termine->detach($termineToRemove);
	}

	/**
	 * Returns the termine
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\NmTouren\Domain\Model\Termine> $termine
	 */
	public function getTermine() {
		return $this->termine;
	}

	/**
	 * Sets the termine
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\NmTouren\Domain\Model\Termine> $termine
	 * @return void
	 */
	public function setTermine(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $termine) {
		$this->termine = $termine;
	}

}