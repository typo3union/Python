<?php
namespace TYPO3\Events\Domain\Repository;

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
class EventsRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
	/**
	 * getEventData
	 *
	 * @param $settings
	 * @param $event
	 * @return
	 */
	public function getEventData() {

		$query = $this->createQuery();
		$date = new \DateTime('-2 months');
		$org_date = $date->format('Y-m-d');
		
		$constraints[] = $query->logicalAnd(
			$query->equals('deleted', 0),
			$query->equals('hidden', 0),
			$query->equals('sys_language_uid',$GLOBALS['TSFE']->sys_language_uid),
			$query->greaterThanOrEqual('date',$org_date)							
        );

		$query->matching($query->logicalAnd($constraints));
		return $query->execute();
	}

	public function getArchivEventData() {

		$query = $this->createQuery();
		$date = new \DateTime('-2 months');
		$org_date = $date->format('Y-m-d');
		
		$constraints[] = $query->logicalAnd(
			$query->equals('deleted', 0),
			$query->equals('hidden', 0),
			$query->equals('sys_language_uid',$GLOBALS['TSFE']->sys_language_uid),
			$query->lessThanOrEqual('date',$org_date)							
        );

		$query->matching($query->logicalAnd($constraints));
		return $query->execute();
	}

	public function getFirstEventData() {

		$query = $this->createQuery();
		$date = new \DateTime('today');
		$org_date = $date->format('Y-m-d');
		
		$constraints[] = $query->logicalAnd(
			$query->equals('deleted', 0),
			$query->equals('hidden', 0),
			$query->equals('sys_language_uid',$GLOBALS['TSFE']->sys_language_uid),
			$query->greaterThanOrEqual('date',$org_date)							
        );
        $query->setOrderings(array("date" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
		$query->setLimit(1);
		$query->matching($query->logicalAnd($constraints));
		return $query->execute();
	}

	
}