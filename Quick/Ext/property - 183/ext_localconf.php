<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Property',
	array(
		'Property' => 'list,show,latest,googlemap',
		'PropertyType' => 'list',		
		'BuildingType' => 'list',
		'Inquirer' => 'list,save',
		
	),
	// non-cacheable actions
	array(
		'Property' => '',
		'PropertyType' => '',		
		'BuildingType' => '',
		'Inquirer' => '',
		
	)
);

