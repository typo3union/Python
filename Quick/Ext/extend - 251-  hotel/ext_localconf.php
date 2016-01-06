<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Extend',
	array(
		'Extend' => 'list',
		
	),
	// non-cacheable actions
	array(
		'Extend' => '',
		
	)
);
