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
 * Statement
 */
class Statement extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';
	
	/**
	 * designation
	 *
	 * @var string
	 */
	protected $designation = '';

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * image
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $image = NULL;

	/**
	 * statementType
	 *
	 * @var integer
	 */
	protected $statementType = 0;

	/**
	 * statementPosition
	 *
	 * @var integer
	 */
	protected $statementPosition = 0;

	/**
	 * companyId
	 *
	 * @var \TYPO3\CompanyManagement\Domain\Model\Company
	 */
	protected $companyId = NULL;

	/**
	 * stateId
	 *
	 * @var \TYPO3\CompanyManagement\Domain\Model\State
	 */
	protected $stateId = NULL;
	
	/**
	 * statePrependText
	 *
	 * @var string
	 */
	protected $statePrependtext = '';

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
	 * Returns the designation
	 *
	 * @return string $designation
	 */
	public function getDesignation() {
		return $this->designation;
	}

	/**
	 * Sets the designation
	 *
	 * @param string $designation
	 * @return void
	 */
	public function setDesignation($designation) {
		$this->designation = $designation;
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
	 * Returns the statementType
	 *
	 * @return integer $statementType
	 */
	public function getStatementType() {
		return $this->statementType;
	}

	/**
	 * Sets the statementType
	 *
	 * @param integer $statementType
	 * @return void
	 */
	public function setStatementType($statementType) {
		$this->statementType = $statementType;
	}

	/**
	 * Returns the statementPosition
	 *
	 * @return integer $statementPosition
	 */
	public function getStatementPosition() {
		return $this->statementPosition;
	}

	/**
	 * Sets the statementPosition
	 *
	 * @param integer $statementPosition
	 * @return void
	 */
	public function setStatementPosition($statementPosition) {
		$this->statementPosition = $statementPosition;
	}

	/**
	 * Returns the companyId
	 *
	 * @return \TYPO3\CompanyManagement\Domain\Model\Company $companyId
	 */
	public function getCompanyId() {
		return $this->companyId;
	}

	/**
	 * Sets the companyId
	 *
	 * @param \TYPO3\CompanyManagement\Domain\Model\Company $companyId
	 * @return void
	 */
	public function setCompanyId(\TYPO3\CompanyManagement\Domain\Model\Company $companyId) {
		$this->companyId = $companyId;
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
	 * Returns the statePrependtext
	 *
	 * @return string $statePrependtext
	 */
	public function getStatePrependtext() {
		return $this->statePrependtext;
	}

	/**
	 * Sets the statePrependtext
	 *
	 * @param string $statePrependtext
	 * @return void
	 */
	public function setStatePrependtext($statePrependtext) {
		$this->statePrependtext = $statePrependtext;
	}

}