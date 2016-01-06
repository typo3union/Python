<?php
/**
 * Created by Jainish Senjaliya.
 * User: Jainish
 * Date: 14.07.2015
 * Time: 17:05
 */
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Class that adds the wizard icon.
 */
class JsCareerWizicon {

    /**
     * Processing the wizard items array
     *
     * @param array $wizardItems : The wizard items
     * @return Modified array with wizard items
     */
    function proc( $wizardItems ) {

        $wizardItems['plugins_tx_jscareer_career'] = array(
            'icon' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('js_career') . 'Resources/Public/Icons/wizard_icon.png',
            'title' => $GLOBALS['LANG']->sL('LLL:EXT:js_career/Resources/Private/Language/locallang-wizard.xlf:plugin-title'),
            'description' => $GLOBALS['LANG']->sL('LLL:EXT:js_career/Resources/Private/Language/locallang-wizard.xlf:plugin-description'),
            'params' => '&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=jscareer_career'
        );
		
        return $wizardItems;
    }

}	