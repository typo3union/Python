<?php
namespace TYPO3\Newsletter\Domain\Repository;


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
 * The repository for Newsletters
 */
class NewsletterRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	public function findUid(){
		$Query = $this->createQuery();
		$Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		
		$Query->statement('SELECT uid FROM `tt_address` ORDER BY `uid` DESC LIMIT 1');
		return $Query->execute();
	}
	
	public function findEmail($email){
		$Query = $this->createQuery();
		$Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		
		$Query->statement('SELECT email FROM `tt_address` where deleted=0 AND hidden=0 AND email="'.$email.'"');
		return $Query->execute();
	}
	
	
	public function saveDetails($array){
		$GLOBALS['TYPO3_DB']->exec_INSERTquery('tt_address', $array);
		//echo $GLOBALS['TYPO3_DB']->INSERTquery('tt_address', $array); exit;
		return $GLOBALS['TYPO3_DB']->sql_insert_id();
	}
}