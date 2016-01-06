<?php
namespace Typo3\Karriere\Domain\Repository;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Ajay Gohel <shared_user@webofficeindia.com>, Weboffice India
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
 * The repository for Karrieres
 */
class KarriereRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {


	
	public function catName($category) {
		
		$result = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('t1.uid,t1.cat,t2.name','tx_karriere_domain_model_karriere t1 LEFT JOIN tx_karriere_domain_model_category t2 ON t1.cat = t2.uid','t1.hidden = 0 and t1.deleted = 0 and t1.uid='.$category);
		return $result;
	}

	public function categoryName($category) {
		
		$result = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('t2.uid,t2.name','tx_karriere_domain_model_category t2','t2.hidden = 0 and t2.deleted = 0 and t2.uid='.$category);
		return $result;
	}	
	
}