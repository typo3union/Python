<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Touren',
	array(
		'Tour' => 'list, show, new, create, edit, update, delete',
		'Termine' => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Tour' => 'create, update, delete',
		'Termine' => 'create, update, delete',
		
	)
);
