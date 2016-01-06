<?php
/**
 * Created by Jainish Senjaliya.
 * User: Jainish
 * Date: 08.07.2015
 * Time: 15:25
 */
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Class that adds the wizard icon.
 */
class JsClinikWizicon {

    /**
     * Processing the wizard items array
     *
     * @param array $wizardItems : The wizard items
     * @return Modified array with wizard items
     */
    function proc( $wizardItems ) {

        $wizardItems['plugins_tx_jsclinik_clinikfinder'] = array(
            'icon' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('js_clinik') . 'Resources/Public/Icons/wizard_icon.png',
            'title' => $GLOBALS['LANG']->sL('LLL:EXT:js_clinik/Resources/Private/Language/locallang-wizard.xlf:clinikfinder.plugin-title'),
            'description' => $GLOBALS['LANG']->sL('LLL:EXT:js_clinik/Resources/Private/Language/locallang-wizard.xlf:clinikfinder.plugin-description'),
            'params' => '&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=jsclinik_clinikfinder'
        );
		
        $wizardItems['plugins_tx_jsclinik_footermap'] = array(
            'icon' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('js_clinik') . 'Resources/Public/Icons/wizard_icon.png',
            'title' => $GLOBALS['LANG']->sL('LLL:EXT:js_clinik/Resources/Private/Language/locallang-wizard.xlf:footerMap.plugin-title'),
            'description' => $GLOBALS['LANG']->sL('LLL:EXT:js_clinik/Resources/Private/Language/locallang-wizard.xlf:footerMap.plugin-description'),
            'params' => '&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=jsclinik_footermap'
        );

        return $wizardItems;
    }

}	