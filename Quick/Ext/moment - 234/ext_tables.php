<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Augenblicke',
	'Augenblicke'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Augenblicke');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_augenblicke_domain_model_augenblicke', 'EXT:augenblicke/Resources/Private/Language/locallang_csh_tx_augenblicke_domain_model_augenblicke.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_augenblicke_domain_model_augenblicke');
$GLOBALS['TCA']['tx_augenblicke_domain_model_augenblicke'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:augenblicke/Resources/Private/Language/locallang_db.xlf:tx_augenblicke_domain_model_augenblicke',
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
		'thumbnail' => 'images',
		'sortby' => 'sort',
		//'default_sortby' => 'ORDER BY sorting DESC',
		'searchFields' => 'title,subtitle,images,description,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Augenblicke.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_augenblicke_domain_model_augenblicke.gif'
	),
);
 