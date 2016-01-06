<?php
namespace JS\JsGreetingcards\Domain\Model;

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
 * Card
 */
class GreetingsWishes extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * image
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $image = NULL;

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * patientName
	 *
	 * @var string
	 */
	protected $patientName = '';

	/**
	 * room
	 *
	 * @var string
	 */
	protected $room = '';

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * generatedPdf
	 *
	 * @var string
	 */
	protected $generatedPdf = '';

	/**
	 * adminName
	 *
	 * @var string
	 */
	protected $adminName = '';

	/**
	 * adminEmail
	 *
	 * @var string
	 */
	protected $adminEmail = '';

	/**
	 * mailSubject
	 *
	 * @var string
	 */
	protected $mailSubject = '';

	/**
	 * creationDate
	 *
	 * @var \DateTime
	 */
	protected $creationDate = '';

	/**
	 * senderIp
	 *
	 * @var string
	 */
	protected $senderIp = '';

	/**
	 * userAgent
	 *
	 * @var string
	 */
	protected $userAgent = '';

	/**
	 * marketingRefererDomain
	 *
	 * @var string
	 */
	protected $marketingRefererDomain = '';

	/**
	 * marketingReferer
	 *
	 * @var string
	 */
	protected $marketingReferer = '';

	/**
	 * page
	 *
	 * @var string
	 */
	protected $page = '';

	/**
	 * marketingMobileDevice
	 *
	 * @var boolean
	 */
	protected $marketingMobileDevice = '';

	/**
	 * marketingFrontendLanguage
	 *
	 * @var string
	 */
	protected $marketingFrontendLanguage = '';

	/**
	 * marketingBrowserLanguage
	 *
	 * @var string
	 */
	protected $marketingBrowserLanguage = '';

	/**
	 * card
	 *
	 * @var \JS\JsGreetingcards\Domain\Model\GreetingCards
	 */
	protected $card = NULL;

	/**
	 * header
	 *
	 * @var string
	 */
	protected $header = '';

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
	 * Returns the image
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the image
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 * @return void
	 */
	public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image) {
		$this->image = $image;
	}

	/**
	 * Returns the generatedPdf
	 *
	 * @return string $generatedPdf
	 */
	public function getGeneratedPdf() {
		return $this->generatedPdf;
	}

	/**
	 * Sets the generatedPdf
	 *
	 * @param string $generatedPdf
	 * @return void
	 */
	public function setGeneratedPdf($generatedPdf) {
		$this->generatedPdf = $generatedPdf;
	}

	/**
	 * Returns the adminName
	 *
	 * @return string $adminName
	 */
	public function getAdminName() {
		return $this->adminName;
	}

	/**
	 * Sets the adminName
	 *
	 * @param string $adminName
	 * @return void
	 */
	public function setAdminName($adminName) {
		$this->adminName = $adminName;
	}

	/**
	 * Returns the header
	 *
	 * @return string $header
	 */
	public function getHeader() {
		return $this->header;
	}

	/**
	 * Sets the header
	 *
	 * @param string $header
	 * @return void
	 */
	public function setHeader($header) {
		$this->header = $header;
	}

}