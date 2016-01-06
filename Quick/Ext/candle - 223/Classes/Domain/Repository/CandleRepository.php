<?php
namespace TYPO3\Candle\Domain\Repository;


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
 * The repository for Candles
 */
class CandleRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
	
	public function saveDetails($array){
		$GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_candle_domain_model_candle', $array);
		return $GLOBALS['TYPO3_DB']->sql_insert_id();
	}
	
		
	
	public function findAllCandles(){
		$Query = $this->createQuery();
		$Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		
		$Query->statement('SELECT * from tx_candle_domain_model_candle where  deleted=0 AND hidden=0 AND sys_language_uid ='.$GLOBALS['TSFE']->sys_language_uid.' ORDER BY crdate DESC'); 
		return $Query->execute();
	}
}