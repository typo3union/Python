<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Events',
	array(
		'Event' => 'list, show, new, create',
		'Category' => 'list',
		'Location' => 'list',
		
	),
	// non-cacheable actions
	array(
		'Event' => 'create',
		'Category' => '',
		'Location' => '',
		
	)
);
