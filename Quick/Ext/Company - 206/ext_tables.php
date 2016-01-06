<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Fecompanymanagement',
	'Company Management'
);


// FlexForm start
$extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName).'_fecompanymanagement';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/FlexForm.xml');

// FlexForm end
/*
if (TYPO3_MODE === 'BE') {

	
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'TYPO3.' . $_EXTKEY,
		'web',	 // Make module a submodule of 'web'
		'becompanymanagement',	// Submodule key
		'',						// Position
		array(
			'Company' => 'list, show ,googlemap,news,preview,historicalList,searchForm,searchList','State' => 'list, show','Statement' => 'list, show, stateList, companyList','Team' => 'list, show',
		),
		array( 
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_becompanymanagement.xlf',
		)
	);

}*/

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Company Management');

// Wizard start

if (TYPO3_MODE == 'BE') {
	$TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses'][$_EXTKEY . '_wizicon'] =
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Resources/Private/Php/class.' . $_EXTKEY . '_wizicon.php';

}
// Wizard end

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_companymanagement_domain_model_company', 'EXT:company_management/Resources/Private/Language/locallang_csh_tx_companymanagement_domain_model_company.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_companymanagement_domain_model_company');
$GLOBALS['TCA']['tx_companymanagement_domain_model_company'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,		
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,		
		'requestUpdate'=>'display_mode',	
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'thumbnail' => 'logo',
		'searchFields' => 'detail_link,name,logo,main_image,slider_images,address,location,zip,place,city,telephone,fax,email,website,founded,employee,share,expert_notice,branch,gallery,video,award_date,award_type,state_id,company_content_id,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Company.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_companymanagement_domain_model_company.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_companymanagement_domain_model_companycontent', 'EXT:company_management/Resources/Private/Language/locallang_csh_tx_companymanagement_domain_model_companycontent.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_companymanagement_domain_model_companycontent');
$GLOBALS['TCA']['tx_companymanagement_domain_model_companycontent'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_companycontent',
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
		'searchFields' => 'title,content,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/CompanyContent.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_companymanagement_domain_model_companycontent.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_companymanagement_domain_model_state', 'EXT:company_management/Resources/Private/Language/locallang_csh_tx_companymanagement_domain_model_state.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_companymanagement_domain_model_state');
$GLOBALS['TCA']['tx_companymanagement_domain_model_state'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_state',
		'label' => 'name',
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
		'searchFields' => 'name,main_logo,small_logo,secondary_logo,detail_link,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/State.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_companymanagement_domain_model_state.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_companymanagement_domain_model_statement', 'EXT:company_management/Resources/Private/Language/locallang_csh_tx_companymanagement_domain_model_statement.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_companymanagement_domain_model_statement');
$GLOBALS['TCA']['tx_companymanagement_domain_model_statement'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_statement',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
 
		'requestUpdate'=>'statement_type',
		
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
		'thumbnail' => 'image',
		'searchFields' => 'name,designation,description,image,statement_type,statement_position,company_id,state_id,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Statement.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_companymanagement_domain_model_statement.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_companymanagement_domain_model_team', 'EXT:company_management/Resources/Private/Language/locallang_csh_tx_companymanagement_domain_model_team.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_companymanagement_domain_model_team');
$GLOBALS['TCA']['tx_companymanagement_domain_model_team'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_team',
		'label' => 'name',
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
		'thumbnail' => 'image',
		'sortby' => 'sorting',
		'searchFields' => 'name,designation,description,image,telephone,mobile,fax,email,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Team.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_companymanagement_domain_model_team.gif'
	),
);
