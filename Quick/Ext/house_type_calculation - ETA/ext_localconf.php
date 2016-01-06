<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Housetypecalculation',
	array(
		'HouseCalculation' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'HouseCalculation' => '',
		
	)
);
