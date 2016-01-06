<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Arzte.' . $_EXTKEY,
	'Arzte',
	array(
		'Category' => 'list, show',
		'DoctoreList' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Category' => 'list, show',
		'DoctoreList' => 'list, show',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Arzte.' . $_EXTKEY,
	'Arztecategory',
	array(
		'Category' => 'catlist, list, show',
		'DoctoreList' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Category' => 'catlist, list, show',
		'DoctoreList' => 'list, show',
		
	)
);
