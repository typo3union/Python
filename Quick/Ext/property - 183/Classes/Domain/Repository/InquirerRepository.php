<?php
namespace TYPO3\Property\Domain\Repository;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Martin Galler <martin.galler@weboffice.co.at>, Weboffice
 *           Pooja Patel <pooja.patel@webofficeindia.com>, Weboffice
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
 * The repository for Inquirers
 */
class InquirerRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	public function findPropertyByUid($uid){
		$Query = $this->createQuery();
		 //Enable below line for debug
		$Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		
		$Query->statement('SELECT title from tx_property_domain_model_property where deleted=0 AND hidden=0 AND uid= '.$uid.' AND sys_language_uid ='.$GLOBALS['TSFE']->sys_language_uid); //order by crdate Desc limit 6
		return $Query->execute();
	}
	public function findNewsByUid($uid){
		$Query = $this->createQuery();
		 //Enable below line for debug
		$Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		
		$Query->statement('SELECT title from tx_news_domain_model_news where deleted=0 AND hidden=0 AND uid= '.$uid.' AND sys_language_uid ='.$GLOBALS['TSFE']->sys_language_uid); //order by crdate Desc limit 6
		return $Query->execute();
	}
	
	public function saveDetails($array){
		$GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_property_domain_model_inquirer', $array);
		return $GLOBALS['TYPO3_DB']->sql_insert_id();
	}
}