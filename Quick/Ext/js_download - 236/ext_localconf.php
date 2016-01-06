<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'JS.' . $_EXTKEY,
	'Download',
	array(
		'File' => 'download',
		
	),
	// non-cacheable actions
	array(
		'File' => 'download',
		
	)
);
