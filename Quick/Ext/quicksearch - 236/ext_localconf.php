<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'PJ.' . $_EXTKEY,
	'Quicksearch',
	array(
		'Quicksearch' => 'list',
		
	),
	// non-cacheable actions
	array(
		'Quicksearch' => '',
		
	)
);
