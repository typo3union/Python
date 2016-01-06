<?php
namespace TYPO3\Events\Controller;

ini_set("display_errors",1);
/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 pooja <pooja.patel@webofficeindia.com>, Weboffice
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
 * EventController
 */
//require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('events'). 'reader.php');
class EventController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * eventRepository
	 *
	 * @var \TYPO3\Events\Domain\Repository\EventRepository
	 * @inject
	 */
	protected $eventRepository = NULL;
	
	/**
	 * locationRepository
	 *
	 * @var \TYPO3\Events\Domain\Repository\LocationRepository
	 * @inject
	 */
	protected $locationRepository = NULL;
	
	/**
	 * categoryRepository
	 *
	 * @var \TYPO3\Events\Domain\Repository\CategoryRepository
	 * @inject
	 */
	protected $categoryRepository = NULL;
	
	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		if(TYPO3_MODE === 'FE') {
			
			$new_events = $this->eventRepository->findAllEventsArray();		
			foreach($new_events as $key=>$value){				
				if($value['ics_file']==''){
					$name = rand().".ics";
					$summary = utf8_encode(trim($value['title']));
					$start_date = date('Y-m-d',strtotime($value['date']))." ".date('H:i',strtotime($value['time']));
					$end_date = date('Y-m-d',strtotime($value['date']))." ".date('H:i',strtotime($value['time']));
					
					$this->ICS($start_date,$end_date,$name,$summary);
					$updateArr  = array(
									'ics_file'  => $name,								
								);
					$GLOBALS['TYPO3_DB']->exec_UPDATEquery('tx_events_domain_model_event',' uid='.$value['uid'],$updateArr);
				}
			}
				
			$events = $this->eventRepository->findAllEvents();		
			$locations = $this->locationRepository->findAll();		
			//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($events);	
					
			$this->view->assignMultiple(array(
					'events'  => $events,	
					'locations'	 => $locations,
			));						
		}
		
	}

	/**
	 * action show
	 *
	 * @param \TYPO3\Events\Domain\Model\Event $event
	 * @return void
	 */
	public function showAction() {
		if(TYPO3_MODE === 'FE') {	
		
			$user=  $GLOBALS['TSFE']->fe_user->user;			
			if(isset($user)){
				$new_events = $this->eventRepository->findAllEventsArray();				
			}else{
				$new_events = $this->eventRepository->findAllEventsArray('present');		
			}			
			foreach($new_events as $key=>$value){				
				if($value['ics_file']==''){
					$name = rand().".ics";
					$summary = utf8_encode(trim($value['title']));
					$start_date = date('Y-m-d',strtotime($value['date']))." ".date('H:i',strtotime($value['time']));
					$end_date = date('Y-m-d',strtotime($value['date']))." ".date('H:i',strtotime($value['time']));
					
					$this->ICS($start_date,$end_date,$name,$summary);
					$updateArr  = array(
									'ics_file'  => $name,								
								);
					$GLOBALS['TYPO3_DB']->exec_UPDATEquery('tx_events_domain_model_event',' uid='.$value['uid'],$updateArr);
				}
			}
			
			if(isset($user)){
				$events = $this->eventRepository->findAllEvents();				
			}else{
				$events = $this->eventRepository->findAllEvents('present');		
			}	
			
			
			$date['cr_date'] = time(); 
			$date['wk_date'] = strtotime("+1 week");
			$date['mk_date'] = strtotime("+1 month");
			
			$locations = $this->locationRepository->findAll();
			$categories = $this->categoryRepository->findAll();				
			$this->view->assignMultiple(array(
					'events'     => $events,	
					'locations'	 => $locations,
					'categories' => $categories,
					'user'       => $user,
					'all_date'   => $date 
		 	));		
		}
	}

	/**
	 * action new
	 *
	 * @param \TYPO3\Events\Domain\Model\Event $newEvent
	 * @ignorevalidation $newEvent
	 * @return void
	 */
	public function newAction() {
		
		$user =  $GLOBALS['TSFE']->fe_user->user['username'];
		$user_locationsIDs =  $GLOBALS['TSFE']->fe_user->user['locations']; 	
		
		$locations = $this->locationRepository->findAllLocations($user_locationsIDs);		
				
		$this->view->assignMultiple(array(
				'user'     => $user,
				'locations' => $locations,
		));	
	}
	
	function ICS($start,$end,$name,$summary) 
	{
		$data = "BEGIN:VCALENDAR\nVERSION:2.0\nPRODID:-//Google Inc//Google Calendar 70.9054//EN\nMETHOD:PUBLISH\nBEGIN:VEVENT\nDTSTAMP:".date("Ymd\THis")."\nDTSTART:".date("Ymd\THis",strtotime($start))."\nDTEND:".date("Ymd\THis",strtotime($end))."\nSUMMARY:".$summary."\nEND:VEVENT\nEND:VCALENDAR\n";
		
		file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/uploads/tx_events/ICS/".$name,$data);
		return true;
    }
	
    /**
	 * action create
	 *
	 * @param \TYPO3\Events\Domain\Model\Event $newEvent 
	 * @return void
	 */
	public function createAction() {
		if(TYPO3_MODE === 'FE') {
			$status = '0';
			if (isset($_POST['submit'])) {
				
				$csv_mimetypes = array(
					'text/csv',
					'application/csv',
					'application/octet-stream',
					'text/tsv',
					'application/vnd.ms-excel'
				);
				if (in_array($_FILES['filename']['type'], $csv_mimetypes)) {
					
					// Added by woi last
					$GLOBALS['TYPO3_DB']->exec_DELETEquery('tx_events_domain_model_event', '');

					$handle = fopen($_FILES['filename']['tmp_name'], "r");
					fgetcsv($handle);
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
					{					
					
						if($data[0]!=''){							
							$name = rand().".ics";
							$summary = utf8_encode(trim($data[4]));
							$start_date = date('Y-m-d',strtotime($data[1]))." ".date('H:i',strtotime($data[2]));
							$end_date = date('Y-m-d',strtotime($data[1]))." ".date('H:i',strtotime($data[2]));
							
							$this->ICS($start_date,$end_date,$name,$summary);
							
							$insArr  = array(   
								'pid' 			=> '75',
								'tstamp'		=> time(),
								'crdate'		=> time(),
								'deleted' 		=> 0,
								'hidden' 		=> 0,
								'title' 		=> utf8_encode(trim($data[4])),
								'date' 			=> utf8_encode(trim(strtotime($data[1]))),
								'time' 			=> utf8_encode(trim($data[2])),
								'private' 		=> '0',	
								'category' 		=> $this->checkCategory($data[5]),								
								'location' 		=> $this->checkLocation($data[3]),
								'ics_file'      => $name,
								'description'	=> utf8_encode(trim($data[4])),
							);

							
							if($insArr['location']!='' && $insArr['category']!=''){
								$GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_events_domain_model_event', $insArr);								
								$status = '1';
							}
						}
					}
					fclose($handle);	
				}else{
					$status='2';
				}
			}			
			$this->view->assignMultiple(array(
					'status'  => $status
			));						
		}
	}
	
	public function checkLocation($location){
 		
		$locationList = array(
			'1' => 'Pfarreiengemeinschaft',
			'2' => 'St. Hedwig',
			'3' => 'St. Franziskus',
			'5' => 'St. Michael',
			'6' => 'Heiligkreuz',			
	 	);
		
		$key = array_search($location, $locationList);
		if ($key){
			return $key;
		}else{
			return false;
		}		
	}
	
	public function checkCategory($category){
 		
		$categoryList = array(
			'1' => 'Gottesdienst',
			'2' => 'Veranstaltung',		
	 	);
		
		$key = array_search($category, $categoryList);
		if ($key){
			return $key;
		}else{
			return false;
		}		
	}

}