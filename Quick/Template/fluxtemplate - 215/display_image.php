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
  public function getBgImage($content, $conf) {

   $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('bg_image', 'pages','uid='.$GLOBALS['TSFE']->id);
   $row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);	
	if($row['bg_image']){
		$bgImage = '<img alt="Hotel Schwedi" width="384" height="340"  src="uploads/tx_fluxtemplate/'.$row['bg_image'].'">';
	}else{
		$bgImage = '';
	}
	return $bgImage;
  }

	public function getMenuImage($content, $conf) { 
	 
	   $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('menu_image', 'pages','uid='.$GLOBALS['TSFE']->id);
	   $row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);	  
	    if($row['menu_image']){
			$menuImage = '<img alt="Hotel Schwedi" width="44" height="44"  src="uploads/tx_fluxtemplate/'.$row['menu_image'].'">';
		}else{
			$menuImage = '';
		}
		return $menuImage;
  }
  public function getInnerMenuImage($content, $conf) { 
  	 $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('inner_menu_image,uid', 'pages','');
	 while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){	  
	    if($row['inner_menu_image']){
			
			$image = $this->imageResize('160','95','uploads/tx_fluxtemplate/'.$row['inner_menu_image']);	
			$menuImage .= '<div class="hidden menu_'.$row['uid'].'" id="menu_'.$row['uid'].'" ><div class="img-col">'.$image.'</div></div>';
			
		}else{
			$menuImage .= '';
		}		
	 }
	 return $menuImage;
  }
  
   public function imageResize($width,$height,$file) {	

			//$this->cObj = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');
			$cObject = t3lib_div::makeInstance('tslib_cObj');

			$lConf['img'] = 'IMAGE';

			//shuffle($images);

			$lConf['img.']['file'] = $file;

			$lConf['img.']['file.']['width']= $width.'c';

			$lConf['img.']['file.']['height']= $height.'c';

			$lConf['img.']['file.']['params']='-quality 100';	

			$images = $cObject->IMAGE($lConf['img.']);

			return $images;

	}
  
}

?>

