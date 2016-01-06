<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'JS.' . $_EXTKEY,
	'Event',
	array(
		'Event' => 'event',
		
	),
	// non-cacheable actions
	array(
		'Event' => 'event',
		
	)
);
