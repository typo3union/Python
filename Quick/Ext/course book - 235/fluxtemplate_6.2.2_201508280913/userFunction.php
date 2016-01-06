<?
/**
 * Example of a method in a PHP class to be called from TypoScript
 *
 */
class user_various {
  /**
   * Reference to the parent (calling) cObject set from TypoScript
   */
  public $cObj;

  /**
   * List the headers of the content elements on the page
   *
   *
   * @param  string          Empty string (no content to process)
   * @param  array           TypoScript configuration
   * @return string          HTML output, showing content elements (in reverse order, if configured)
   */
  public function getData($content, $conf) {
	
   $uid= $_GET['tx_course_course']['course'];
   $dateUid = $_GET['tx_course_course']['cUid'];
   
   $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('name', 'tx_course_domain_model_course','uid='.$uid);
   $row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);	
   
   $res1 = $GLOBALS['TYPO3_DB']->exec_SELECTquery('startdate', 'tx_course_domain_model_datestartend','uid='.$dateUid);
   $row1 = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res1);	
   
   $date = str_replace('.', '/', $row1['startdate']);
   $date = date('d.m.Y', strtotime($date));

   if($row['name']){
		$data = '<span class="head">Kursgebühr für:</span><ul><li>Kurs : '.$row['name'].'</li><li>Datum : '.$date.'</li></ul><div class="getDate hidden">'.$date.'</div>';
	}else{
		$data = '';
	}
	return $data;
  }
  
}

?>

