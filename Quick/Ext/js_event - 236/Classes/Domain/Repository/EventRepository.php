<?php
namespace JS\JsEvent\Domain\Repository;


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
 * The repository for Events
 */
class EventRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
	/**
	 * getEventData
	 *
	 * @param $settings
	 * @param $event
	 *
	 * @return 
	 */
	public function getEventData($settings,$event){

		$this->fullURL	=  \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL');
		
		$this->cObject	= \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');


		$limit		= "";
				
		if(isset($settings['limit']) && $settings['limit']>0){
			$limit = $settings['limit'];
		}

		$orderBy	= " e.start_date asc ";
	
		$field		= "e.uid, e.title, e.start_date, e.end_date, e.location, e.description, e.image, c.title as category"; 

		$table		= "tx_jsevent_domain_model_event as e 
						LEFT JOIN tx_jsevent_event_category_mm AS m ON e.uid = m.uid_local 
						LEFT JOIN tx_jsevent_domain_model_category AS c ON m.uid_foreign = c.uid ";
	
		$groupBy	= "( e.uid )";

		$where		= " ";

		$event = intval($event);
		
		if($event>0){
			$where 		= " AND e.uid =  '".$event."'";
		}else{

			if(isset($settings['storagePID']) && $settings['storagePID']!=""){
				$where .= " AND e.pid in (".$settings['storagePID'].") ";
			}
			
			if(isset($settings['categories']) && $settings['categories']!=""){
				$where 	.= " AND m.uid_foreign IN (".$settings['categories'].")  ";
			}
		}
		
		$where 		= " e.deleted = 0 AND e.hidden = 0 AND  e.end_date > ".time()." AND  e.end_date > e.start_date ".$where;

		$conf	= $this->getDBHandle()->exec_SELECTgetRows($field,$table,$where,$groupBy,$orderBy,$limit);
		
//		echo $this->getDBHandle()->SELECTquery($field,$table,$where,$groupBy,$orderBy);	die;

		$data	= array();

		foreach ($conf as $key => $value) {
			
			$data[$value['uid']]	= $value; 
			
			if($value['image']>0){
				
				$field1		= "uid"; 
		
				$table1		= "sys_file_reference";
					
				$where1		= " tablenames = 'tx_jsevent_domain_model_event' AND fieldname = 'image' AND uid_foreign = '".$value['uid']."' AND deleted = 0 AND hidden = 0";
		
				$res		= $this->getDBHandle()->exec_SELECTgetRows($field1,$table1,$where1);
				
				$data[$value['uid']]['imageReference']		= $res[0]['uid'];
				
			}

			
			$link['additionalParams']	= "&tx_jsevent_event[action]=event&tx_jsevent_event[event]=".$value['uid'];
			$link['returnLast']			= 'url'; 
			$link['parameter']			= $settings['listPage'];

			$detailLink  = $this->fullURL.$this->cObject->typolink(NULL, $link);

			$data[$value['uid']]['detailLink']		= $detailLink; 
		}
		
		if($event>0){
			return $data[$event];
		}

		return $data;
	}

	/**
	 * getDBHandle
	 *
	 * @return 
	 */
	public function getDBHandle() {
		return $GLOBALS['TYPO3_DB'];
	}

}