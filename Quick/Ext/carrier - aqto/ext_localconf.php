<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Typo3.' . $_EXTKEY,
	'Karriere',
	array(
		'Karriere' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Karriere' => '',
		
	)
);
