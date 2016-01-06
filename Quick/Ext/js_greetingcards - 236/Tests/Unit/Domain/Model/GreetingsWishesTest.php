<?php

namespace JS\JsGreetingcards\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \JS\JsGreetingcards\Domain\Model\GreetingsWishes.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class GreetingsWishesTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \JS\JsGreetingcards\Domain\Model\GreetingsWishes
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \JS\JsGreetingcards\Domain\Model\GreetingsWishes();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getHeaderReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getHeader()
		);
	}

	/**
	 * @test
	 */
	public function setHeaderForStringSetsHeader() {
		$this->subject->setHeader('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'header',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName() {
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPatientNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getPatientName()
		);
	}

	/**
	 * @test
	 */
	public function setPatientNameForStringSetsPatientName() {
		$this->subject->setPatientName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'patientName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRoomReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getRoom()
		);
	}

	/**
	 * @test
	 */
	public function setRoomForStringSetsRoom() {
		$this->subject->setRoom('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'room',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() {
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getGeneratedPdfReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getGeneratedPdf()
		);
	}

	/**
	 * @test
	 */
	public function setGeneratedPdfForStringSetsGeneratedPdf() {
		$this->subject->setGeneratedPdf('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'generatedPdf',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAdminNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getAdminName()
		);
	}

	/**
	 * @test
	 */
	public function setAdminNameForStringSetsAdminName() {
		$this->subject->setAdminName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'adminName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAdminEmailReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getAdminEmail()
		);
	}

	/**
	 * @test
	 */
	public function setAdminEmailForStringSetsAdminEmail() {
		$this->subject->setAdminEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'adminEmail',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMailSubjectReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getMailSubject()
		);
	}

	/**
	 * @test
	 */
	public function setMailSubjectForStringSetsMailSubject() {
		$this->subject->setMailSubject('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'mailSubject',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCreationDateReturnsInitialValueForDateTime() {
		$this->assertEquals(
			NULL,
			$this->subject->getCreationDate()
		);
	}

	/**
	 * @test
	 */
	public function setCreationDateForDateTimeSetsCreationDate() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setCreationDate($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'creationDate',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSenderIpReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getSenderIp()
		);
	}

	/**
	 * @test
	 */
	public function setSenderIpForStringSetsSenderIp() {
		$this->subject->setSenderIp('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'senderIp',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserAgentReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getUserAgent()
		);
	}

	/**
	 * @test
	 */
	public function setUserAgentForStringSetsUserAgent() {
		$this->subject->setUserAgent('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'userAgent',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMarketingRefererDomainReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getMarketingRefererDomain()
		);
	}

	/**
	 * @test
	 */
	public function setMarketingRefererDomainForStringSetsMarketingRefererDomain() {
		$this->subject->setMarketingRefererDomain('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'marketingRefererDomain',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMarketingRefererReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getMarketingReferer()
		);
	}

	/**
	 * @test
	 */
	public function setMarketingRefererForStringSetsMarketingReferer() {
		$this->subject->setMarketingReferer('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'marketingReferer',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPageReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getPage()
		);
	}

	/**
	 * @test
	 */
	public function setPageForStringSetsPage() {
		$this->subject->setPage('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'page',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMarketingMobileDeviceReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getMarketingMobileDevice()
		);
	}

	/**
	 * @test
	 */
	public function setMarketingMobileDeviceForBooleanSetsMarketingMobileDevice() {
		$this->subject->setMarketingMobileDevice(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'marketingMobileDevice',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMarketingFrontendLanguageReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getMarketingFrontendLanguage()
		);
	}

	/**
	 * @test
	 */
	public function setMarketingFrontendLanguageForStringSetsMarketingFrontendLanguage() {
		$this->subject->setMarketingFrontendLanguage('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'marketingFrontendLanguage',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMarketingBrowserLanguageReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getMarketingBrowserLanguage()
		);
	}

	/**
	 * @test
	 */
	public function setMarketingBrowserLanguageForStringSetsMarketingBrowserLanguage() {
		$this->subject->setMarketingBrowserLanguage('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'marketingBrowserLanguage',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCardReturnsInitialValueForGreetingCards() {
		$this->assertEquals(
			NULL,
			$this->subject->getCard()
		);
	}

	/**
	 * @test
	 */
	public function setCardForGreetingCardsSetsCard() {
		$cardFixture = new \JS\JsGreetingcards\Domain\Model\GreetingCards();
		$this->subject->setCard($cardFixture);

		$this->assertAttributeEquals(
			$cardFixture,
			'card',
			$this->subject
		);
	}
}
