<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Greetingcards',
	'Greeting Cards'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Greeting Cards');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jsgreetingcards_domain_model_greetingcards', 'EXT:js_greetingcards/Resources/Private/Language/locallang_csh_tx_jsgreetingcards_domain_model_greetingcards.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jsgreetingcards_domain_model_greetingcards');
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingcards'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingcards',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,image,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/GreetingCards.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jsgreetingcards_domain_model_greetingcards.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jsgreetingcards_domain_model_greetingswishes', 'EXT:js_greetingcards/Resources/Private/Language/locallang_csh_tx_jsgreetingcards_domain_model_greetingswishes.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jsgreetingcards_domain_model_greetingswishes');
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingswishes',
		'label' => 'header',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'header,name,patient_name,room,description,generated_pdf,admin_name,admin_email,mail_subject,creation_date,sender_ip,user_agent,marketing_referer_domain,marketing_referer,page,marketing_mobile_device,marketing_frontend_language,marketing_browser_language,card,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/GreetingsWishes.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jsgreetingcards_domain_model_greetingswishes.gif'
	),
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder


$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);

#### Greeting Card #####

$frontendpluginName = 'greetingcards';
$pluginSignature = strtolower($extensionName) . '_'.strtolower($frontendpluginName);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';

t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/Flexform/flexform.xml');


// Add wizard icon to the "Add new record" in backend
if (TYPO3_MODE == "BE") {
    $TBE_MODULES_EXT["xMOD_db_new_content_el"]["addElClasses"]["JS\JsGreetingcards\Utility\Hook\ContentElementWizard"] =
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Classes/Utility/Hook/ContentElementWizard.php';
}

/**
 * Hook to show PluginInfo
*/
  
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['list_type_Info']['jsgreetingcards_greetingcards'][$_EXTKEY] =
	'EXT:' . $_EXTKEY . '/Classes/Utility/Hook/PluginInformation.php:JS\JsGreetingcards\Utility\Hook\PluginInformation->build';