<?php
namespace TYPO3\Candle\Controller;
session_start();

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
 * CandleController
 */
class CandleController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * candleRepository
	 *
	 * @var \TYPO3\Candle\Domain\Repository\CandleRepository
	 * @inject
	 */
	protected $candleRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		
		
		if(TYPO3_MODE === 'FE') {
			
			$GLOBALS['TSFE']->set_no_cache();
			
			if($_SESSION['save'] ==''){
				if(isset($_POST['candle_submit'])){										
					$insertArray  = array(
						'user_name'		=> $_POST['name'],
						'user_address'   => $_POST['address'],
						'dedicated_name' => $_POST['candle_for'],
						'message'       => $_POST['message'],
						'pid'			=> '173',
						'crdate'		=> time(),
						'tstamp'		=> time()
					);
					$_SESSION['save']='testSession';
					$inquirersLastId = $this->candleRepository->saveDetails($insertArray);
					
				} 	
			}else{
				$_SESSION['save']='';	
			}
			
			$candles = $this->candleRepository->findAllCandles();
 			$currentDate = strtotime(date("j-m-Y"));
						
			foreach($candles as $key=>$value){				 			
				$candles[$key]['userAddress'] = $value['user_address'];
				$candles[$key]['dedicatedName'] = $value['dedicated_name'];
				$candles[$key]['message'] = $value['message'];
				$candles[$key]['userName'] = $value['user_name'];
								
				$date1 = $value['crdate'];
			    $date2  = time();
			   	$diff = $date2 - $date1;			   
			    $candles[$key]['days'] = floor($diff/(60*60*24));
			
			}
			$settings= $this->settings['flexform']['main'];
			$randomCandles= $settings['randomCandles'];
					
			$randomCheck = rand(5,9);
									
			for($i=0;$i<=$randomCandles;$i++){
				$allNumber[] = $i;				
			}
		
		
			$this->view->assignMultiple(array(
					'candles'       => $candles,
					'settings'	    => $settings,
					'allNumbers'    => $allNumber,					
					'randomCandles' => $randomCandles,
					'randomCheck'   => $randomCheck
			));	
		}
	}

	/**
	 * action show
	 *
	 * @param \TYPO3\Candle\Domain\Model\Candle $candle
	 * @return void
	 */
	public function showAction() {
		$this->view->assign('candle', $candle);
	}

}