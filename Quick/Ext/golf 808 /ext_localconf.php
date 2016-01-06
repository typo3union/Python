<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Golf.' . $_EXTKEY,
	'Golf',
	array(
		'Golf' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Golf' => '',
		
	)
);
