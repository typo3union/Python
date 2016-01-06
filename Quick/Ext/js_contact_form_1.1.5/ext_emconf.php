<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "js_contact_form"
 *
 * Auto generated by Extension Builder 2015-06-13
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Contact Form',
	'description' => 'Contact form extensions for TYPO3 where user can send his contact information to admin & copy of that is also sent to user on their email. Admin can select required fields & can also manage the mandatory fields for the form via plugin options. All dynamic stuffs can easily managed from typoscript. This Form has both server & client side validations.',
	'category' => 'plugin',
	'author' => '',
	'author_email' => '',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => '0',
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'version' => '1.1.5',
	'constraints' => array(
		'depends' => array(
			'extbase' => '6.0',
			'fluid' => '6.0',
			'typo3' => '6.0.0 - 6.2.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);