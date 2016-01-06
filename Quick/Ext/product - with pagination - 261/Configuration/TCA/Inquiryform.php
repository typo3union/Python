<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_product_domain_model_inquiryform'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_product_domain_model_inquiryform']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'company,firstname,lastname,address,postal,ort,land,email,mobile,product',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1,company,firstname,lastname,address,postal,ort,land,email,mobile,product, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_product_domain_model_inquiryform',
				'foreign_table_where' => 'AND tx_product_domain_model_inquiryform.pid=###CURRENT_PID### AND tx_product_domain_model_inquiryform.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
        
	    'company' => array(
	        'exclude' => 1,
	        'label' => 'Company',
	        'config' => array(
	            'type' => 'input',
	            'size' => 30,
	            'eval' => 'trim'
	        ),
	    ),
	    
		'firstname' => array(
			'exclude' => 1,
			'label' => 'Name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'lastname' => array(
			'exclude' => 1,
			'label' => 'Vorname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'address' => array(
			'exclude' => 1,
			'label' => 'Address',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
	    
	    'postal' => array(
	        'exclude' => 1,
	        'label' => 'Postleitzahl',
	        'config' => array(
	            'type' => 'input',
	            'size' => 30,
	            'eval' => 'trim'
	        ),
	    ),
		'ort' => array(
			'exclude' => 1,
			'label' => 'Ort',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
	    'land' => array(
	        'exclude' => 1,
	        'label' => 'Ort',
	        'config' => array(
	            'type' => 'input',
	            'size' => 30,
	            'eval' => 'trim'
	        ),
	    ),
		'email' => array(
			'exclude' => 1,
			'label' => 'E-Mail',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'mobile' => array(
			'exclude' => 1,
			'label' => 'Mobiltelefon',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),	
		'product' => array(
			'exclude' => 1,
			'label' => 'Product',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		
		
	),
);
