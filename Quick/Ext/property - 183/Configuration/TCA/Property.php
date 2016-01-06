<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_property_domain_model_property'] = array(
	'ctrl' =>array(
		'title' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property',
		'label' => 'title',
		'sortby' => 'sorting'
	 ),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, subtitle, object_type, property_type,price,running_cost,  description, images, pdf, floor_area, land_area, building_type , year_of_construction,zustand ,available,floor, room , heating ,ground,basement,balcony,garage,terrase,parking,elevator,transport,expiration,energy,charging,hwb,commission, street, lage,plz, city, country ',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, subtitle, object_type,property_type, price,running_cost,  description, images, pdf, floor_area, land_area, building_type , year_of_construction,zustand ,available,floor,room , heating,ground,basement,balcony,garage,terrase,parking,elevator,transport,expiration,energy,charging,hwb,commission, street, lage,plz, city,  country,sorting, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_property_domain_model_property',
				'foreign_table_where' => 'AND tx_property_domain_model_property.pid=###CURRENT_PID### AND tx_property_domain_model_property.sys_language_uid IN (-1,0)',
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

		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'subtitle' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.subtitle',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'object_type' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.object_type',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('Miete', '0'),
					array('Kauf', '1'),					
				)
			)
			
		),
		'property_type' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.property_type',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_property_domain_model_propertytype',
				'foreign_table_where' => " AND tx_property_domain_model_propertytype.deleted=0 AND tx_property_domain_model_propertytype.hidden=0 AND tx_property_domain_model_propertytype.sys_language_uid=###REC_FIELD_sys_language_uid###",				
				"size" => 1,
				 "minitems" => 0,
				 "maxitems" => 1,
				 'eval' => 'required',
			),
		),		
		'price' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.price',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'running_cost' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.running_cost',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'description' => array(			
			'exclude' => 0,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.description',
			'config' => array(
					'type' => 'text',
					'cols' => 40,
					'rows' => 6
			),
			'defaultExtras' => 'richtext[]'
		),
		'images' => array(			
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.images',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
				'uploadfolder' => 'uploads/tx_property',
				'show_thumbs' => 1,
				'size' => 10,
				'minitems' => 1,
				'maxitems' => 10000000,
				
			)
		),
		'pdf' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.pdf',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => 'pdf',
				'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
				'uploadfolder' => 'uploads/tx_property/PDF',
				'size' => 5,				
				'minitems' => 0,
				'maxitems' => 100,
				'show_thumbs' => TRUE,
			),
		),
		
		'floor_area' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.floor_area',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'land_area' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.land_area',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'building_type' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.building_type',
			'config' => array(
				'type' => 'select',
				'items' => array (
					array('--Select--',0),
				 ),
				'foreign_table' => 'tx_property_domain_model_buildingtype',
				'foreign_table_where' => " AND tx_property_domain_model_buildingtype.deleted=0 AND tx_property_domain_model_buildingtype.hidden=0 AND tx_property_domain_model_buildingtype.sys_language_uid=###REC_FIELD_sys_language_uid###",				
				"size" => 1,
				 "minitems" => 0,
				 "maxitems" => 1,				
			),
		),
		'year_of_construction' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.year_of_construction',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'zustand' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.zustand',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'available' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.available',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'floor' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.floor',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
						
		'room' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.room',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'heating' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.heating',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'garage' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.garage',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),			
		'ground' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.ground',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'basement' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.basement',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),		
		'balcony' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.balcony',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'balcony' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.balcony',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'garage' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.garage',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'terrase' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.terrase',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),	
		'parking' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.parking',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),			
		'elevator' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.elevator',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),					
		'transport' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.transport',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),				
		'expiration' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.expiration',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'energy' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.energy',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'charging' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.charging',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'hwb' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.hwb',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'commission' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.commission',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),			
		'street' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.street',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'lage' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.lage',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'plz' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.plz',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'city' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.city',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),	
	
		'country' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:property/Resources/Private/Language/locallang_db.xlf:tx_property_domain_model_property.country',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),		
	),
);
