<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Fecompanymanagement',
	array(
		'Company' => 'list, show ,googlemap ,news,preview,historicalList,searchForm,searchList',
		'State' => 'list, show',
		'Statement' => 'list, show, stateList, companyList',
		'Team' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Company' => '',
		'State' => '',
		'Statement' => '',
		'Team' => '',
		
	)
);

$TYPO3_CONF_VARS['SYS']['lang']['cache']['clear_menu'] = TRUE;