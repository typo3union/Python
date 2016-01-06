<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Typo3.' . $_EXTKEY,
	'Course',
	array(
		'Course' => 'list, show, kursinformationen,kursinhalte,download,termineundAnmeldung,ajax,price,banner,lastMinute,contactForm,weitereInformationen,bookingForm,courseContactForm,breadcrum',
		'Category' => 'list,categoryShow,banner,sitemap,footerMenu',
		
	),
	// non-cacheable actions
	array(
		'Course' => 'list, show, kursinformationen,kursinhalte,download,termineundAnmeldung,ajax,price,banner,lastMinute,contactForm,weitereInformationen,bookingForm,courseContactForm,breadcrum',
		'Category' => '',
		
	)
);
