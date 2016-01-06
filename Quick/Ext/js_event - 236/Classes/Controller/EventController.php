<?php
namespace JS\JsEvent\Controller;

ini_set("display_errors",1);



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
 * EventController
 */
class EventController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * eventRepository
	 * 
	 * @var \JS\JsEvent\Domain\Repository\EventRepository
	 * @inject
	 */
	protected $eventRepository = NULL;
	

	/**
	 * eventService
	 *
	 * @var \JS\JsEvent\Service\EventService
	 * @inject
	 */
	protected $eventService;
	
		

	/**
	 * action list
	 * 
	 * @return void
	 */
	public function listAction() {
		$events = $this->eventRepository->findAll();
		$this->view->assign('events', $events);
	}

	/**
	 * action event
	 * 
	 * @return void
	 */
	public function eventAction() {

		$getData	= \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_jsevent_event');

		$detail 	= 0;

		if(isset($getData['event']) && $getData['event']>0){
			$detail = intval($getData['event']);
		}

		$template = $this->eventService->missingConfiguration($this->settings);

		$data = $this->eventRepository->getEventData($this->settings,$detail);
		
		$paginate  = 0;
		
		if(isset($this->settings['paginate'])){
			$paginate	= $this->settings['paginate'];
		}
		
		$recordPerPage  = 2;
		
		if(isset($this->settings['recordPerPage'])){
			$recordPerPage	= $this->settings['recordPerPage'];
		}
		
		if(isset($this->settings['list']) && $this->settings['list'] !=""){
			$templateList	= $this->settings['list'];
		}else{
			$templateList	= "List";
		}
		
		if(isset($this->settings['detail']) && $this->settings['detail'] !=""){
			$templateDetail	= $this->settings['detail'];
		}else{
			$templateDetail	= "Detail";
		}

		if(count($data)==0){
			$template = 'no-record';
		}
		
		$this->view->assign('event', $data);
		$this->view->assign('setting', $this->settings);
		$this->view->assign('template', $template);
		$this->view->assign('templateList', $templateList);
		$this->view->assign('templateDetail', $templateDetail);
		$this->view->assign('eventDetail', $detail);
		$this->view->assign('paginate', $paginate);
		$this->view->assign('recordPerPage', $recordPerPage);
		
		// Include Additional Data
		$this->eventService->includeAdditionalData($this->settings);
	}

}