<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Product.' . $_EXTKEY,
	'Product',
	array(
		'Product' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Product' => 'list, show',
		
	)
);
