<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'JS.' . $_EXTKEY,
	'Clinikfinder',
	array(
		'Clinik' => 'clinikFinder',
		
	),
	// non-cacheable actions
	array(
		'Clinik' => 'clinikFinder',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'JS.' . $_EXTKEY,
	'Footermap',
	array(
		'Clinik' => 'footerMap',
		
	),
	// non-cacheable actions
	array(
		'Clinik' => 'footerMap',
		
	)
);
