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
 * StatementController
 */
use \TYPO3\CMS\Core\Utility\GeneralUtility;
class StatementController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {


	/**
	 * statementRepository
	 *
	 * @var \TYPO3\CompanyManagement\Domain\Repository\StatementRepository
	 * @inject
	 */
	protected $statementRepository = NULL;
	

	/**
	 * action list
	 *
	 * @return void
	 */	
	public function listAction() {
		if(TYPO3_MODE === 'FE') {			
			$statements['left'] = $this->statementRepository->findLeftStatement();
			$statements['right'] = $this->statementRepository->findRightStatement();
			$statements['center'] = $this->statementRepository->findCenterStatement();			
			
			$this->view->assignMultiple(array(
					'leftStatements' => $statements['left'][0],
					'rightStatements' => $statements['right'][0],
					'centerStatements' => $statements['center'],
			));		
		}			
	}

	/**
	 * action show
	 *
	 * @param \TYPO3\CompanyManagement\Domain\Model\Statement $statement
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
			
			$statements = $this->statementRepository->findByUid($uid);	
			$this->view->assign('statements', $statements);		
		}
	}

	/**
	 * action stateList
	 *
	 * @return void
	 */
	public function stateListAction() {
		if(TYPO3_MODE === 'FE') {				
			$pageType	 = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('type'); // Page TYPE	
			$stateStatements['left'] = $this->statementRepository->findLeftStatement();
			$stateStatements['right'] = $this->statementRepository->findRightStatement();
			$stateStatements['center'] = $this->statementRepository->findCenterStatement();	
			
			$this->view->assignMultiple(array(
					'leftStateStatements' => $stateStatements['left'][0],
					'rightStateStatements' => $stateStatements['right'][0],
					'centerStateStatements' => $stateStatements['center'],
					'pageType' => $pageType,
			));					
		}	
	}

	/**
	 * action companyList
	 *
	 * @return void
	 */
	public function companyListAction() {
		if(TYPO3_MODE === 'FE') {				
			$pageType = GeneralUtility::_GP('type'); 
			$sort = GeneralUtility::_GP('sort'); 
			$companyStatements = $this->statementRepository->findCompanyStatement($sort);
			
			$this->view->assignMultiple(array(
					'companyStatements' => $companyStatements,					
					'pageType' => $pageType,
			));					
		}
	}

}