<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'JS.' . $_EXTKEY,
	'Contactform',
	array(
		'ContactForm' => 'contactForm',
		
	),
	// non-cacheable actions
	array(
		'ContactForm' => 'contactForm',
		
	)
);