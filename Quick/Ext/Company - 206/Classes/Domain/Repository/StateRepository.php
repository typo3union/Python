<?php
namespace TYPO3\CompanyManagement\Domain\Repository;


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
 * The repository for States
 */
class StateRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	public function findAllStates(){
		$query = $this->createQuery();
		$constraints[] = $query->logicalAnd(
			$query->equals('deleted', 0),
			$query->equals('hidden', 0)	,
			$query->equals('sys_language_uid',$GLOBALS['TSFE']->sys_language_uid)								
        );
		$constraints[] =$query->logicalNot(
			$query->equals('main_logo',0)	
		);
		$query->matching($query->logicalAnd($constraints));
		return $query->execute();
	}	
	
}