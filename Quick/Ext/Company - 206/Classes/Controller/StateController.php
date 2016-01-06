<?php
namespace TYPO3\CompanyManagement\Controller;


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
 * StateController
 */
class StateController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * stateRepository
	 *
	 * @var \TYPO3\CompanyManagement\Domain\Repository\StateRepository
	 * @inject
	 */
	protected $stateRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	
	public function listAction() {
		if(TYPO3_MODE === 'FE') {			
			$states = $this->stateRepository->findAllStates();
			$this->view->assign('states', $states);
		}			
	}

	/**
	 * action show
	 *
	 * @param \TYPO3\CompanyManagement\Domain\Model\State $state
	 * @return void
	 */
	public function showAction() {
		if(TYPO3_MODE === 'FE') {
			$uriArr = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_companymanagement_fecompanymanagement');	
			if(!empty($uriArr['uid'])){
				$uid = $uriArr['uid'];
			}else{
				$uid = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('uid');
			}		
			
			$state = $this->stateRepository->findByUid($uid);	
			$this->view->assign('state', $state);		
		}		
	}

}