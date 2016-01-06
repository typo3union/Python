<?php
namespace TYPO3\Events\Domain\Repository;


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
 * The repository for Events
 */
class EventRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	public function findAllEvents($private){
		
		$query = $this->createQuery();
		$constraints[] = $query->logicalAnd(
			$query->equals('deleted', 0),
			$query->equals('hidden', 0)	,
			$query->equals('sys_language_uid',$GLOBALS['TSFE']->sys_language_uid)
        );
		
		if(isset($private)){
			$constraints[] = $query->logicalAnd(
				$query->equals('private',0)						
			);
		}
		$query->matching($query->logicalAnd($constraints));
		return $query->execute();
	}	
	
	public function findAllEventsArray($private){
		$where = '';
		if(isset($private)){
			$where = ' AND private=0'; 
		}
		$Query = $this->createQuery();
		 //Enable below line for debug
		$Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		
		$Query->statement('SELECT * from tx_events_domain_model_event where deleted=0 AND hidden=0 AND sys_language_uid ='.$GLOBALS['TSFE']->sys_language_uid.$where); //order by crdate Desc limit 6
		return $Query->execute();
	}
	
	
	
	
}
