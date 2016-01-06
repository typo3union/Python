<?php
namespace TYPO3\Events\Controller;

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
 * EventsController
 */
class EventsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * eventsRepository
     *
     * @var \TYPO3\Events\Domain\Repository\EventsRepository
     * @inject
     */
    protected $eventsRepository = NULL;
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $events = $this->eventsRepository->getEventData();
        $this->view->assign('eventss', $events);
        $this->view->assign('settings', $this->settings);
    }
    
    /**
     * action show
     *
     * @param \TYPO3\Events\Domain\Model\Events $events
     * @return void
     */
    public function showAction()
    {
        if(TYPO3_MODE === 'FE') {           
            $uriArr = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_events_events');  
            if(!empty($uriArr['uid'])){
                $uid = $uriArr['uid'];
            }else{
                $uid = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('uid');
            }
        };
        $events = $this->eventsRepository->findByUid($uid);       
        $this->view->assign('events', $events);
        $this->view->assign('settings', $this->settings);
    }

    public function archivAction()
    {
        $events = $this->eventsRepository->getArchivEventData();
        $this->view->assign('eventss', $events);
        $this->view->assign('settings', $this->settings);
    }
    public function latestAction()
    {
        $events = $this->eventsRepository->getFirstEventData();
      //  \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($events);  
         //print_r($events);
        $this->view->assign('events', $events[0]);
        $this->view->assign('settings', $this->settings);
    }

}