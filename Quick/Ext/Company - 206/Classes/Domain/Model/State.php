<?php
namespace TYPO3\CompanyManagement\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Andreas Predl <andreas.predl@weboffice.co.at >, WEBOFFICE AUSTRIA
 *           Pooja Patel <pooja.patel@webofficeindia.com>, WEBOFFICE
 *           Ghanshyam Gohel <ghanshyam.gohel@webofficeindia.com>, WEBOFFICE
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
 * State
 */
class State extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * mainLogo
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $mainLogo = NULL;

	/**
	 * smallLogo
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $smallLogo = NULL;
	
	/**
	 * secondaryLogo
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $historicalLogo = NULL;

	/**
	 * secondaryLogo
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $secondaryLogo = NULL;
	
	/**
	 * detailLink
	 *
	 * @var string
	 */
	protected $detailLink = '';

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
	 * Returns the mainLogo
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $mainLogo
	 */
	public function getMainLogo() {
		return $this->mainLogo;
	}

	/**
	 * Sets the mainLogo
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $mainLogo
	 * @return void
	 */
	public function setMainLogo(\TYPO3\CMS\Extbase\Domain\Model\FileReference $mainLogo) {
		$this->mainLogo = $mainLogo;
	}

	/**
	 * Returns the smallLogo
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $smallLogo
	 */
	public function getSmallLogo() {
		return $this->smallLogo;
	}

	/**
	 * Sets the smallLogo
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $smallLogo
	 * @return void
	 */
	public function setSmallLogo(\TYPO3\CMS\Extbase\Domain\Model\FileReference $smallLogo) {
		$this->smallLogo = $smallLogo;
	}
	
	
	/**
	 * Returns the historicalLogo
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $historicalLogo
	 */
	public function getHistoricalLogo() {
		return $this->historicalLogo;
	}

	/**
	 * Sets the historicalLogo
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $historicalLogo
	 * @return void
	 */
	public function setHistoricalLogo(\TYPO3\CMS\Extbase\Domain\Model\FileReference $historicalLogo) {
		$this->historicalLogo = $historicalLogo;
	}
	

	/**
	 * Returns the secondaryLogo
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $secondaryLogo
	 */
	public function getSecondaryLogo() {
		return $this->secondaryLogo;
	}

	/**
	 * Sets the secondaryLogo
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $secondaryLogo
	 * @return void
	 */
	public function setSecondaryLogo(\TYPO3\CMS\Extbase\Domain\Model\FileReference $secondaryLogo) {
		$this->secondaryLogo = $secondaryLogo;
	}
	
	/**
	 * Returns the detailLink
	 *
	 * @return string $detailLink
	 */
	public function getDetailLink() {
		return $this->detailLink;
	}

	/**
	 * Sets the detailLink
	 *
	 * @param string $detailLink
	 * @return void
	 */
	public function setDetailLink($detailLink) {
		$this->detailLink = $detailLink;
	}

}