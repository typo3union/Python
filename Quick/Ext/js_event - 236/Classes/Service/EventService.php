<?php
namespace JS\JsEvent\Service;

/*
 *  (c) 2014 Jainish Senjaliya <jainish.online@gmail.com>
 *  Jainish Senjaliya <jainish.online@gmail.com>
*/

class EventService implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * categoryRepository
	 * 
	 * @var \JS\JsEvent\Domain\Repository\CategoryRepository
	 * @inject
	 */
	protected $categoryRepository = NULL;
	
	/**
	 * missingConfiguration
	 *
	 * @param $settings
	 * @return
	 */
	 
	function missingConfiguration($settings)
	{
		if($settings['configuration']!=1){
			return 'include_template';
		}else if($settings['storagePID']=="" ){
			return 'storagePID';
		}else if($settings['categories']=="" ){
			return 'categories';
		}
		return 1;
	}

 	/**
	 * includeAdditionalData
	 *
	 * @param $settings
	 * @return
	 */
	
	function includeAdditionalData($settings)
	{
		
		$settings['includeJSinFooter']	= 1;
		$settings['includeCSSinFooter']	= 1;
		
		$additionalDataJS	= '<script src="typo3conf/ext/js_event/Resources/Public/Script/event.js" type="text/javascript"></script>';
		
		$additionalDataCSS	= '<link rel="stylesheet" href="typo3conf/ext/js_event/Resources/Public/Css/event.css" type="text/css" media="all" />';
		
		if($settings['includeJSinFooter']==1){
			$GLOBALS['TSFE']->additionalFooterData['9150'] = $additionalDataJS;
		}else{
			$GLOBALS['TSFE']->additionalHeaderData['9150'] = $additionalDataJS;	
		}
		
		if($settings['includeCSSinFooter']==1){
			$GLOBALS['TSFE']->additionalFooterData['853'] = $additionalDataCSS;
		}else{
			$GLOBALS['TSFE']->additionalHeaderData['853'] = $additionalDataCSS;	
		}
		
	}
	
}

?>