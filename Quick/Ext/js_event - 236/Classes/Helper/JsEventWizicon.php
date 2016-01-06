<?php
/**
 * Created by Jainish Senjaliya.
 * User: Jainish
 * Date: 02.07.2015
 * Time: 17:49
 */
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Class that adds the wizard icon.
 */
class JsEventWizicon {

    /**
     * Processing the wizard items array
     *
     * @param array $wizardItems : The wizard items
     * @return Modified array with wizard items
     */
    function proc( $wizardItems ) {

        $wizardItems['plugins_tx_jsevent_event'] = array(
            'icon' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('js_event') . 'Resources/Public/Icons/wizard_icon.png',
            'title' => $GLOBALS['LANG']->sL('LLL:EXT:js_event/Resources/Private/Language/locallang-wizard.xlf:plugin-title'),
            'description' => $GLOBALS['LANG']->sL('LLL:EXT:js_event/Resources/Private/Language/locallang-wizard.xlf:plugin-description'),
            'params' => '&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=jsevent_event'
        );

        return $wizardItems;
    }

}	