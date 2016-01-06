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
 * Location
 */
class Location extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * icon
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $icon = NULL;

	/**
	 * hovericon
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $hovericon = NULL;

	/**
	 * tableicon
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $tableicon = NULL;

	/**
	 * user
	 *
	 * @var integer
	 */
	protected $user = 0;

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
	 * Returns the icon
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $icon
	 */
	public function getIcon() {
		return $this->icon;
	}

	/**
	 * Sets the icon
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $icon
	 * @return void
	 */
	public function setIcon(\TYPO3\CMS\Extbase\Domain\Model\FileReference $icon) {
		$this->icon = $icon;
	}

	/**
	 * Returns the hovericon
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $hovericon
	 */
	public function getHovericon() {
		return $this->hovericon;
	}

	/**
	 * Sets the hovericon
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $hovericon
	 * @return void
	 */
	public function setHovericon(\TYPO3\CMS\Extbase\Domain\Model\FileReference $hovericon) {
		$this->hovericon = $hovericon;
	}

	/**
	 * Returns the tableicon
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $tableicon
	 */
	public function getTableicon() {
		return $this->tableicon;
	}

	/**
	 * Sets the tableicon
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $tableicon
	 * @return void
	 */
	public function setTableicon(\TYPO3\CMS\Extbase\Domain\Model\FileReference $tableicon) {
		$this->tableicon = $tableicon;
	}

	/**
	 * Returns the user
	 *
	 * @return integer $user
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * Sets the user
	 *
	 * @param integer $user
	 * @return void
	 */
	public function setUser($user) {
		$this->user = $user;
	}

}