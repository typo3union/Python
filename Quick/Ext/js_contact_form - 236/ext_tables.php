<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Contactform',
	'Contact Form'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Contact Form');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jscontactform_domain_model_contactform', 'EXT:js_contact_form/Resources/Private/Language/locallang_csh_tx_jscontactform_domain_model_contactform.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jscontactform_domain_model_contactform');
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform',
		'label' => 'firstname',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		
		'editlock' => 'editlock',
		
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'firstname,lastname,company,url,email,phone,fax,address,zip,city,country,message,subject,page,contact_date,ip,useragent,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/ContactForm.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jscontactform_domain_model_contactform.png'
	),
);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

/* For include flexform */

$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);

#### Contact form #####

$frontendpluginName = 'contactform';
$pluginSignature = strtolower($extensionName) . '_'.strtolower($frontendpluginName);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';

t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/Flexform/Contactform_flexform.xml');


// add wizard icon to the "add new record" in backend
if (TYPO3_MODE == "BE") {
    $TBE_MODULES_EXT["xMOD_db_new_content_el"]["addElClasses"]["JsContactFormWizicon"] =
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Classes/Helper/JsContactFormWizicon.php';
}

