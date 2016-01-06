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
  public function IconBarNavigationMenu($content, $conf) {

   $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('bg_image', 'pages','uid='.$GLOBALS['TSFE']->id);
   $row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);	
	if($row['bg_image']){
		$bgImage = '<img alt="Hotel Schwedi" src="uploads/tx_fluxtemplate/'.$row['bg_image'].'">';
	}else{
		$bgImage = '';
	}
	return $bgImage;
  }

	
}

?>

