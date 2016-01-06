<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Events',
	array(
		'Events' => 'list, show,archiev,latest',
		
	),
	// non-cacheable actions
	array(
		'Events' => '',
		
	)
);
