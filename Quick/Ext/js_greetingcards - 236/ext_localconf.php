<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'JS.' . $_EXTKEY,
	'Greetingcards',
	array(
		'GreetingsWishes' => 'greetingsWishes',
		
	),
	// non-cacheable actions
	array(
		'GreetingsWishes' => 'greetingsWishes',
		
	)
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder