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
 * Downloads
 */
class Downloads extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * downloadtitle
	 * 
	 * @var string
	 */
	protected $downloadtitle = '';

	/**
	 * datadownload
	 * 
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $datadownload = NULL;

	/**
	 * Returns the downloadtitle
	 * 
	 * @return string $downloadtitle
	 */
	public function getDownloadtitle() {
		return $this->downloadtitle;
	}

	/**
	 * Sets the downloadtitle
	 * 
	 * @param string $downloadtitle
	 * @return void
	 */
	public function setDownloadtitle($downloadtitle) {
		$this->downloadtitle = $downloadtitle;
	}

	/**
	 * Returns the datadownload
	 * 
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $datadownload
	 */
	public function getDatadownload() {
		return $this->datadownload;
	}

	/**
	 * Sets the datadownload
	 * 
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $datadownload
	 * @return void
	 */
	public function setDatadownload(\TYPO3\CMS\Extbase\Domain\Model\FileReference $datadownload) {
		$this->datadownload = $datadownload;
	}

}