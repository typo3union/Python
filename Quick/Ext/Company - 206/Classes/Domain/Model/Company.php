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
 * Company
 */
class Company extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * detailLink
	 *
	 * @var boolean
	 */
	protected $detailLink = FALSE;
	
	/**
	 * accessDate
	 *
	 * @var \DateTime
	 */
	protected $accessDate = NULL;
	
	/**
	 * latestDate
	 *
	 * @var \DateTime
	 */
	protected $latestDate = NULL;
	
	/**
	 * displayMode
	 *
	 * @var integer
	 */
	protected $displayMode = 0;

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * logo
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $logo = NULL;

	/**
	 * mainImage
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $mainImage = NULL;

	/**
	 * sliderImages
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 */
	protected $sliderImages = NULL;

	/**
	 * contact
	 *
	 * @var string
	 */
	protected $contact = '';
	
	/**
	 * address
	 *
	 * @var string
	 */
	protected $address = '';

	/**
	 * location
	 *
	 * @var string
	 */
	protected $location = '';

	/**
	 * zip
	 *
	 * @var string
	 */
	protected $zip = '';

	/**
	 * place
	 *
	 * @var string
	 */
	protected $place = '';

	/**
	 * city
	 *
	 * @var string
	 */
	protected $city = '';

	/**
	 * telephone
	 *
	 * @var string
	 */
	protected $telephone = '';

	/**
	 * fax
	 *
	 * @var string
	 */
	protected $fax = '';

	/**
	 * email
	 *
	 * @var string
	 */
	protected $email = '';

	/**
	 * website
	 *
	 * @var string
	 */
	protected $website = '';

	/**
	 * founded
	 *
	 * @var string
	 */
	protected $founded = '';

	/**
	 * employee
	 *
	 * @var string
	 */
	protected $employee = '';

	/**
	 * share
	 *
	 * @var string
	 */
	protected $share = '';

	/**
	 * expertNotice
	 *
	 * @var string
	 */
	protected $expertNotice = '';

	/**
	 * branch
	 *
	 * @var string
	 */
	protected $branch = '';

	/**
	 * gallery
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 */
	protected $gallery = NULL;

	/**
	 * video
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $video = NULL;
	
	/**
	 * youtubeVideo
	 *
	 * @var string
	 */
	protected $youtubeVideo = '';
	
	/**
	 * awardDate
	 *
	 * @var \DateTime
	 */
	protected $awardDate = NULL;

	/**
	 * awardType
	 *
	 * @var integer
	 */
	protected $awardType = 0;

	/**
	 * stateId
	 *
	 * @var \TYPO3\CompanyManagement\Domain\Model\State
	 */
	protected $stateId = NULL;

	/**
	 * companyContentId
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CompanyManagement\Domain\Model\CompanyContent>
	 * @cascade remove
	 */
	protected $companyContentId = NULL;
	
	/**
	 * companyProfile
	 *
	 * @var string
	 */
	protected $companyProfile = '';
	
	/**
	 * productsAndServices
	 *
	 * @var string
	 */
	protected $productsAndServices = '';
	
	/**
	 * Chronicle
	 *
	 * @var string
	 */
	protected $chronicle = '';
	
	/**
	 * Award
	 *
	 * @var string
	 */
	protected $award = '';
	
	
	/**
	 * title1
	 *
	 * @var string
	 */
	protected $title1 = '';
	
	/**
	 * title2
	 *
	 * @var string
	 */
	protected $title2 = '';
	
	/**
	 * title3
	 *
	 * @var string
	 */
	protected $title3 = '';
	
	/**
	 * title1
	 *
	 * @var string
	 */
	protected $title4 = '';
	
	/**
	 * content1
	 *
	 * @var string
	 */
	protected $content1 = '';
	
	/**
	 * content2
	 *
	 * @var string
	 */
	protected $content2 = '';
	
	/**
	 * content3
	 *
	 * @var string
	 */
	protected $content3 = '';
	
	/**
	 * content4
	 *
	 * @var string
	 */
	protected $content4 = '';
	
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
		$this->companyContentId = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}
	
	/**
	 * Returns the accessDate
	 *
	 * @return \DateTime $accessDate
	 */
	public function getAccessDate() {
		return $this->accessDate;
	}

	/**
	 * Sets the accessDate
	 *
	 * @param \DateTime $accessDate
	 * @return void
	 */
	public function setAccessDate(\DateTime $accessDate) {
		$this->accessDate = $accessDate;
	}
	
	/**
	 * Returns the latestDate
	 *
	 * @return \DateTime $latestDate
	 */
	public function getLatestDate() {
		return $this->accessDate;
	}

	/**
	 * Sets the latestDate
	 *
	 * @param \DateTime $latestDate
	 * @return void
	 */
	public function setLatestDate(\DateTime $latestDate) {
		$this->latestDate = $latestDate;
	}
	
	/**
	 * Returns the displayMode
	 *
	 * @return integer $displayMode
	 */
	public function getDisplayMode() {
		return $this->displayMode;
	}

	/**
	 * Sets the displayMode
	 *
	 * @param integer $displayMode
	 * @return void
	 */
	public function setDisplayMode($displayMode) {
		$this->displayMode = $displayMode;
	}
	
	
	/**
	 * Returns the detailLink
	 *
	 * @return boolean $detailLink
	 */
	public function getDetailLink() {
		return $this->detailLink;
	}

	/**
	 * Sets the detailLink
	 *
	 * @param boolean $detailLink
	 * @return void
	 */
	public function setDetailLink($detailLink) {
		$this->detailLink = $detailLink;
	}

	/**
	 * Returns the boolean state of detailLink
	 *
	 * @return boolean
	 */
	public function isDetailLink() {
		return $this->detailLink;
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
	 * Returns the logo
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $logo
	 */
	public function getLogo() {
		return $this->logo;
	}

	/**
	 * Sets the logo
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $logo
	 * @return void
	 */
	public function setLogo(\TYPO3\CMS\Extbase\Domain\Model\FileReference $logo) {
		$this->logo = $logo;
	}

	/**
	 * Returns the mainImage
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $mainImage
	 */
	public function getMainImage() {
		return $this->mainImage;
	}
	

	/**
	 * get the sliderImages
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	 
	public function getSliderImages() {
		return $this->sliderImages;
	}
	
	/**
	 * Returns the contact
	 *
	 * @return string $contact
	 */
	 
	public function getContact() {
		return $this->contact;
	}

	/**
	 * Sets the contact
	 *
	 * @param string $contact
	 * @return void
	 */
	public function setContact($contact) {
		$this->contact = $contact;
	}
	
	/**
	 * Returns the address
	 *
	 * @return string $address
	 */
	 
	public function getAddress() {
		return $this->address;
	}

	/**
	 * Sets the address
	 *
	 * @param string $address
	 * @return void
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * Returns the location
	 *
	 * @return string $location
	 */
	public function getLocation() {
		return $this->location;
	}

	/**
	 * Sets the location
	 *
	 * @param string $location
	 * @return void
	 */
	public function setLocation($location) {
		$this->location = $location;
	}

	/**
	 * Returns the zip
	 *
	 * @return string $zip
	 */
	public function getZip() {
		return $this->zip;
	}

	/**
	 * Sets the zip
	 *
	 * @param string $zip
	 * @return void
	 */
	public function setZip($zip) {
		$this->zip = $zip;
	}

	/**
	 * Returns the place
	 *
	 * @return string $place
	 */
	public function getPlace() {
		return $this->place;
	}

	/**
	 * Sets the place
	 *
	 * @param string $place
	 * @return void
	 */
	public function setPlace($place) {
		$this->place = $place;
	}

	/**
	 * Returns the city
	 *
	 * @return string $city
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * Sets the city
	 *
	 * @param string $city
	 * @return void
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * Returns the telephone
	 *
	 * @return string $telephone
	 */
	public function getTelephone() {
		return $this->telephone;
	}

	/**
	 * Sets the telephone
	 *
	 * @param string $telephone
	 * @return void
	 */
	public function setTelephone($telephone) {
		$this->telephone = $telephone;
	}

	/**
	 * Returns the fax
	 *
	 * @return string $fax
	 */
	public function getFax() {
		return $this->fax;
	}

	/**
	 * Sets the fax
	 *
	 * @param string $fax
	 * @return void
	 */
	public function setFax($fax) {
		$this->fax = $fax;
	}

	/**
	 * Returns the email
	 *
	 * @return string $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Sets the email
	 *
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * Returns the website
	 *
	 * @return string $website
	 */
	public function getWebsite() {
		return $this->website;
	}

	/**
	 * Sets the website
	 *
	 * @param string $website
	 * @return void
	 */
	public function setWebsite($website) {
		$this->website = $website;
	}

	/**
	 * Returns the founded
	 *
	 * @return string $founded
	 */
	public function getFounded() {
		return $this->founded;
	}

	/**
	 * Sets the founded
	 *
	 * @param string $founded
	 * @return void
	 */
	public function setFounded($founded) {
		$this->founded = $founded;
	}

	/**
	 * Returns the employee
	 *
	 * @return string $employee
	 */
	public function getEmployee() {
		return $this->employee;
	}

	/**
	 * Sets the employee
	 *
	 * @param string $employee
	 * @return void
	 */
	public function setEmployee($employee) {
		$this->employee = $employee;
	}

	/**
	 * Returns the share
	 *
	 * @return string $share
	 */
	public function getShare() {
		return $this->share;
	}

	/**
	 * Sets the share
	 *
	 * @param string $share
	 * @return void
	 */
	public function setShare($share) {
		$this->share = $share;
	}

	/**
	 * Returns the expertNotice
	 *
	 * @return string $expertNotice
	 */
	public function getExpertNotice() {
		return $this->expertNotice;
	}

	/**
	 * Sets the expertNotice
	 *
	 * @param string $expertNotice
	 * @return void
	 */
	public function setExpertNotice($expertNotice) {
		$this->expertNotice = $expertNotice;
	}

	/**
	 * Returns the branch
	 *
	 * @return string $branch
	 */
	public function getBranch() {
		return $this->branch;
	}

	/**
	 * Sets the branch
	 *
	 * @param string $branch
	 * @return void
	 */
	public function setBranch($branch) {
		$this->branch = $branch;
	}

	
	
	/**
	 * get the gallery
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	 
	public function getGallery() {
		return $this->gallery;
	}
	

	/**
	 * Returns the video
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $video
	 */
	public function getVideo() {
		return $this->video;
	}

	/**
	 * Sets the video
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $video
	 * @return void
	 */
	public function setVideo(\TYPO3\CMS\Extbase\Domain\Model\FileReference $video) {
		$this->video = $video;
	}
	
	/**
	 * Returns the youtubeVideo
	 *
	 * @return string $youtubeVideo
	 */
	public function getYoutubeVideo() {
		return $this->youtubeVideo;
	}

	/**
	 * Sets the youtubeVideo
	 *
	 * @param string $youtubeVideo
	 * @return void
	 */
	public function setYoutubeVideo($youtubeVideo) {
		$this->youtubeVideo = $youtubeVideo;
	}
	

	/**
	 * Returns the awardDate
	 *
	 * @return \DateTime $awardDate
	 */
	public function getAwardDate() {
		return $this->awardDate;
	}

	/**
	 * Sets the awardDate
	 *
	 * @param \DateTime $awardDate
	 * @return void
	 */
	public function setAwardDate(\DateTime $awardDate) {
		$this->awardDate = $awardDate;
	}

	/**
	 * Returns the awardType
	 *
	 * @return integer $awardType
	 */
	public function getAwardType() {
		return $this->awardType;
	}

	/**
	 * Sets the awardType
	 *
	 * @param integer $awardType
	 * @return void
	 */
	public function setAwardType($awardType) {
		$this->awardType = $awardType;
	}

	/**
	 * Returns the stateId
	 *
	 * @return \TYPO3\CompanyManagement\Domain\Model\State $stateId
	 */
	public function getStateId() {
		return $this->stateId;
	}

	/**
	 * Sets the stateId
	 *
	 * @param \TYPO3\CompanyManagement\Domain\Model\State $stateId
	 * @return void
	 */
	public function setStateId(\TYPO3\CompanyManagement\Domain\Model\State $stateId) {
		$this->stateId = $stateId;
	}

	/**
	 * Adds a CompanyContent
	 *
	 * @param \TYPO3\CompanyManagement\Domain\Model\CompanyContent $companyContentId
	 * @return void
	 */
	public function addCompanyContentId(\TYPO3\CompanyManagement\Domain\Model\CompanyContent $companyContentId) {
		$this->companyContentId->attach($companyContentId);
	}

	/**
	 * Removes a CompanyContent
	 *
	 * @param \TYPO3\CompanyManagement\Domain\Model\CompanyContent $companyContentIdToRemove The CompanyContent to be removed
	 * @return void
	 */
	public function removeCompanyContentId(\TYPO3\CompanyManagement\Domain\Model\CompanyContent $companyContentIdToRemove) {
		$this->companyContentId->detach($companyContentIdToRemove);
	}

	/**
	 * Returns the companyContentId
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CompanyManagement\Domain\Model\CompanyContent> $companyContentId
	 */
	public function getCompanyContentId() {
		return $this->companyContentId;
	}

	/**
	 * Sets the companyContentId
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CompanyManagement\Domain\Model\CompanyContent> $companyContentId
	 * @return void
	 */
	public function setCompanyContentId(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $companyContentId) {
		$this->companyContentId = $companyContentId;
	}
		
	/**
	 * Returns the companyProfile
	 *
	 * @return string $companyProfile
	 */
	public function getCompanyProfile() {
		return $this->companyProfile;
	}

	/**
	 * Sets the companyProfile
	 *
	 * @param string $companyProfile
	 * @return void
	 */
	public function setCompanyProfile($companyProfile) {
		$this->companyProfile = $companyProfile;
	}
	
		
	/**
	 * Returns the productsAndServices
	 *
	 * @return string $productsAndServices
	 */
	public function getProductsAndServices() {
		return $this->productsAndServices;
	}

	/**
	 * Sets the productsAndServices
	 *
	 * @param string $productsAndServices
	 * @return void
	 */
	public function setProductsAndServices($productsAndServices) {
		$this->productsAndServices = $productsAndServices;
	}
	
	/**
	 * Returns the chronicle
	 *
	 * @return string $chronicle
	 */
	public function getChronicle() {
		return $this->chronicle;
	}

	/**
	 * Sets the chronicle
	 *
	 * @param string $chronicle
	 * @return void
	 */
	public function setChronicle($chronicle) {
		$this->chronicle = $chronicle;
	}
	
	/**
	 * Returns the award
	 *
	 * @return string $award
	 */
	public function getAward() {
		return $this->award;
	}

	/**
	 * Sets the award
	 *
	 * @param string $award
	 * @return void
	 */
	public function setAward($award) {
		$this->award = $award;
	}
	
	
	/**
	 * Returns the title1
	 *
	 * @return string $title1
	 */
	public function getTitle1() {
		return $this->title1;
	}

	/**
	 * Sets the title1
	 *
	 * @param string $title1
	 * @return void
	 */
	public function setTitle1($title1) {
		$this->title1 = $title1;
	}	
	
	/**
	 * Returns the title2
	 *
	 * @return string $title2
	 */
	public function getTitle2() {
		return $this->title2;
	}

	/**
	 * Sets the title2
	 *
	 * @param string $title2
	 * @return void
	 */
	public function setTitle2($title2) {
		$this->title2 = $title2;
	}
	
	/**
	 * Returns the title3
	 *
	 * @return string $title3
	 */
	public function getTitle3() {
		return $this->title3;
	}

	/**
	 * Sets the title3
	 *
	 * @param string $title3
	 * @return void
	 */
	public function setTitle3($title3) {
		$this->title3 = $title3;
	}
	
	/**
	 * Returns the title4
	 *
	 * @return string $title4
	 */
	public function getTitle4() {
		return $this->title4;
	}

	/**
	 * Sets the title4
	 *
	 * @param string $title4
	 * @return void
	 */
	public function setTitle4($title4) {
		$this->title4 = $title4;
	}
	
	/**
	 * Returns the content1
	 *
	 * @return string $content1
	 */
	public function getContent1() {
		return $this->content1;
	}

	/**
	 * Sets the content1
	 *
	 * @param string $content1
	 * @return void
	 */
	public function setContent1($content1) {
		$this->content1 = $content1;
	}
	
	/**
	 * Returns the content2
	 *
	 * @return string $content2
	 */
	public function getContent2() {
		return $this->content2;
	}

	/**
	 * Sets the content2
	 *
	 * @param string $content2
	 * @return void
	 */
	public function setContent2($content2) {
		$this->content2 = $content2;
	}
	
	/**
	 * Returns the content3
	 *
	 * @return string $content3
	 */
	public function getContent3() {
		return $this->content3;
	}

	/**
	 * Sets the content3
	 *
	 * @param string $content3
	 * @return void
	 */
	public function setContent3($content3) {
		$this->content3 = $content3;
	}

	/**
	 * Returns the content4
	 *
	 * @return string $content4
	 */
	public function getContent4() {
		return $this->content4;
	}

	/**
	 * Sets the content4
	 *
	 * @param string $content4
	 * @return void
	 */
	public function setContent4($content4) {
		$this->content4 = $content4;
	}

}