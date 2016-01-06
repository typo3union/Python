<?php
namespace TYPO3\EnergyConsuptionCalculation\Controller;


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
 * EnergyCalculateController
 */
class EnergyCalculateController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * energyCalculateRepository
	 *
	 * @var \TYPO3\EnergyConsuptionCalculation\Domain\Repository\EnergyCalculateRepository
	 * @inject
	 */
	protected $energyCalculateRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {

		$TYPO3_CONF_VARS['BE']['forceCharset'] = 'utf-8';

		foreach($this->settings['houseFields'] as $key=>$value){
			$houseList[] = $value['settings']['item']['houseTitle'];
		}

		foreach($this->settings['Bausubstanz'] as $key=>$value){
			$bausubstanzList[] = $value['settings']['item']['houseTitle'];
		}

		$check_val =0;
		foreach($this->settings['fuelFields'] as $key=>$value){
			$fuelList[$key]['fuelTitle'] = $value['settings']['item']['fuelTitle'];			
			foreach($value['settings']['item']['settings']['fields'] as $k=>$val){			
				$fuelList[$key]['fuelDetail'][$k]['title'] 			= $val['settings']['item']['fuelTitle'];		
				$fuelList[$key]['fuelDetail'][$k]['unit'] 			= $val['settings']['item']['unit'];
				$fuelList[$key]['fuelDetail'][$k]['material'] 		= $val['settings']['item']['material'];
				$fuelList[$key]['fuelDetail'][$k]['calorificValue'] = $val['settings']['item']['calorificValue'];
				$fuelList[$key]['fuelDetail'][$k]['austriaPrice'] 	= $val['settings']['item']['austriaPrice'];
				$fuelList[$key]['fuelDetail'][$k]['germanyPrice'] 	= $val['settings']['item']['germanyPrice'];		
				$fuelList[$key]['fuelDetail'][$k]['check_val'] 		= $check_val;
				$check_val++;		
			}
		}
		
		
		
		$energyCalculates = $this->energyCalculateRepository->findAll();
		$this->view->assignMultiple(array(
			'settings'  => $this->settings,
			'houseList' => $houseList,	
			'fuelList'	=> $fuelList,
			'bausubstanzList'=> $bausubstanzList,
			'data'	    => $data
		));
	}

	/**
	 * action show
	 *
	 * @param \TYPO3\EnergyConsuptionCalculation\Domain\Model\EnergyCalculate $energyCalculate
	 * @return void
	 */
	public function showAction(\TYPO3\EnergyConsuptionCalculation\Domain\Model\EnergyCalculate $energyCalculate) {
		$this->view->assign('energyCalculate', $energyCalculate);
	}

}
