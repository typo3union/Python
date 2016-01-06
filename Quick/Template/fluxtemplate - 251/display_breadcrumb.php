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
  public function display_breadcrumb($content, $conf) {
   
   $breadcrumb = '<ol class="breadcrumb"><li><a href="">Home</a></li>';
   $id = $GLOBALS['TSFE']->id;
   
   $ctr = $_GET['tx_product_product']['controller'];
   $act = $_GET['tx_product_product']['action'];
   $uid = $_GET['tx_product_product']['uid'];
   $news = $_GET['tx_news_pi1']['news'];
   
   
   if(!(($id == '1') || ($id == '21') || ($id == '25') )){	 
   
      $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'pages','uid='.$GLOBALS['TSFE']->id.' AND hidden=0 AND deleted=0 AND doktype=1');
	  $row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);	  
	   
	  
	  $res_0 = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'pages','uid='.$row['pid'].' AND hidden=0 AND deleted=0 AND doktype=1');
	  $row_0 = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res_0);	  
	  
		if($row_0['title']){
			$breadcrumb .= '<li>'.$row_0['title'].'</li>';
		}			   
		if($row['title']){
			$breadcrumb .= '<li class="active">'.$row['title'].'</li>';
		}
	}
	if(isset($ctr) && isset($uid)){	
		if($ctr=='Category'){			
		   $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('title', 'tx_product_domain_model_category','uid='.$uid.' AND hidden=0 AND deleted=0');
		   $row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);	  
			if($row['title']){
				$breadcrumb .= '<li>Category</li><li class="active">'.$row['title'].'</li>';
			}
		}
		if($ctr=='Product' && $act=='show'){			
		   $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'tx_product_domain_model_product','uid='.$uid.' AND hidden=0 AND deleted=0');
		   $row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);	  
   		   $res1 = $GLOBALS['TYPO3_DB']->exec_SELECTquery('title', 'tx_product_domain_model_category','uid='.$row['category'].' AND hidden=0 AND deleted=0');
     	   $row1 = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res1);	
		     
			if($row['title']){
				$breadcrumb .= '<li>'.$row1['title'].'</li><li class="active">'.$row['title'].'</li>';
			}
		}
		
	}
	if(isset($news)){
		
	   $res_p = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'pages','pid='.$GLOBALS['TSFE']->id.' AND hidden=0 AND deleted=0 AND doktype=1');
	   $row_p = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res_p);
	   
	   $res_n= $GLOBALS['TYPO3_DB']->exec_SELECTquery('title', 'tx_news_domain_model_news','uid='.$news.' AND hidden=0 AND deleted=0');
	   $row_n = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res_n);	  
		if($row_n['title']){
			$breadcrumb .= '<li class="active">'.$row_n['title'].'</li>';
		}
	}
	
     $breadcrumb .= '</ol>';
		return $breadcrumb;
  }

}

?>

