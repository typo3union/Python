<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Energyconsuptioncalculation',
	array(
		'EnergyCalculate' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'EnergyCalculate' => '',
		
	)
);
