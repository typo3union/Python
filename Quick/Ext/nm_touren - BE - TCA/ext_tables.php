<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Touren',
	'FE  Touren'
);

/*
if (TYPO3_MODE === 'BE') {

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'TYPO3.' . $_EXTKEY,
		'web',	
		'touren',
		'',		
		array(
			'Tour' => 'list, show, new, create, edit, update, delete','Termine' => 'list, show, new, create, edit, update, delete',
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_betouren.xlf',
		)
	);

}*/

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Touren');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nmtouren_domain_model_tour', 'EXT:nm_touren/Resources/Private/Language/locallang_csh_tx_nmtouren_domain_model_tour.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nmtouren_domain_model_tour');
$GLOBALS['TCA']['tx_nmtouren_domain_model_tour'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:nm_touren/Resources/Private/Language/locallang_db.xlf:tx_nmtouren_domain_model_tour',
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
		'searchFields' => 'name,termine,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Tour.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_nmtouren_domain_model_tour.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nmtouren_domain_model_termine', 'EXT:nm_touren/Resources/Private/Language/locallang_csh_tx_nmtouren_domain_model_termine.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nmtouren_domain_model_termine');
$GLOBALS['TCA']['tx_nmtouren_domain_model_termine'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:nm_touren/Resources/Private/Language/locallang_db.xlf:tx_nmtouren_domain_model_termine',
		'label' => 'datum',
		'label_userFunc' => 'TYPO3\\NmTouren\\Userfuncs\\TcaTour->addTtitle',
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
		'searchFields' => 'datum,geblockt,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Termine.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_nmtouren_domain_model_termine.gif'
	),
);
