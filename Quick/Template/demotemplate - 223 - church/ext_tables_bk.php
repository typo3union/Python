<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Bootstrap Example Theme');


//# Add page TSConfig
$pageTsConfig = \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl(
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TsConfig/Page/config.ts');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig($pageTsConfig);

# Add user TSConfig
$userTsConfig = \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl(
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TsConfig/User/config.ts');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig($userTsConfig);




\FluidTYPO3\Flux\Core::registerProviderExtensionKey($_EXTKEY, 'Content');
\FluidTYPO3\Flux\Core::registerProviderExtensionKey($_EXTKEY, 'Page');


$TCA['tt_content']['columns']['section_frame']['config']['items'][80] = array('Stil 1', '80');
$TCA['tt_content']['columns']['section_frame']['config']['items'][81] = array('Marketing', '81');
$TCA['tt_content']['columns']['section_frame']['config']['items'][82] = array('Abstand danach', '82');

$thumbimage = array(
        'thumbimage' => array (
                'exclude' => 0,
                'label' => 'Thumb Image',
                'config' => array(
	                'type' => 'group',
	                'internal_type' => 'file',
	                'allowed' => 'gif,jpg,png',
	                'max_size' => 1000,
	                'uploadfolder' => 'fileadmin/images/navigation/thumbimage/',
	                'show_thumbs' => 1,
	                'size' => 3,
	                'minitems' => 0,
	                'maxitems' => 1,
	                'autoSizeMax' => 10
        		)
        )
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'pages',
        $thumbimage,
        1
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
        'pages',
        'visibility',
        'thumbimage',
        'after:linkToTop'
);

$menuimage = array(
        'menuimage' => array (
                'exclude' => 0,
                'label' => 'Menu Image',
                'config' => array(
	                'type' => 'group',
	                'internal_type' => 'file',
	                'allowed' => 'gif,jpg,png',
	                'max_size' => 1000,
	                'uploadfolder' => 'fileadmin/images/navigation/menuimage/',
	                'show_thumbs' => 1,
	                'size' => 3,
	                'minitems' => 0,
	                'maxitems' => 1,
	                'autoSizeMax' => 10
        		)
        )
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'pages',
        $menuimage,
        1
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
        'pages',
        'visibility',
        'menuimage',
        'after:linkToTop'
);

$hoverimage = array(
        'hoverimage' => array (
                'exclude' => 0,
                'label' => 'Hover Image',
                'config' => array(
	                'type' => 'group',
	                'internal_type' => 'file',
	                'allowed' => 'gif,jpg,png',
	                'max_size' => 1000,
	                'uploadfolder' => 'fileadmin/images/navigation/hoverimage/',
	                'show_thumbs' => 1,
	                'size' => 3,
	                'minitems' => 0,
	                'maxitems' => 1,
	                'autoSizeMax' => 10
        		)
        )
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'pages',
        $hoverimage,
        1
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
        'pages',
        'visibility',
        'hoverimage',
        'after:linkToTop'
);


$temporaryColumns = array( 
        'locations' => array (
                'exclude' => 0,
                'label' => 'Locations',
                'config' => array(
					'type' => 'select',
					'foreign_table' => 'tx_events_domain_model_location',
					'foreign_table-where' => ' AND hidden=0 AND deleted=0',
					 'size' => 7,
					 'minitems' => 1,
					 'maxitems' => 10000000,
			),
        ),		
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'fe_users',
        $temporaryColumns,
        1                                                                                                           
); 
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'fe_users',
        'locations;;;;1-1-1;'
);


$pageLocations = array( 
        'page_locations' => array (
                'exclude' => 0,
                'label' => 'Locations',
                'config' => array(
					'type' => 'select',
					'foreign_table' => 'tx_events_domain_model_location',
					'foreign_table-where' => ' AND hidden=0 AND deleted=0',
					 'size' => 7,
					 'minitems' => 1,
					 'maxitems' => 10000000,
			),
        ),		
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'pages',
        $pageLocations,
        1                                                                                                           
); 
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'pages',
        'title',        
        '--linebreak--,page_locations',    
        'after:subtitle'
);


$goldHeading = array(
        'gold_heading' => array (
                'exclude' => 0,
                'label' => 'Gold Heading',
                'config' => array(
	                'type' => 'text',
	                'cols' => 20,
	                'rows' => 3,
	                'wrap' => 'off', 
        		),     		
        ),       
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'pages',
        $goldHeading,
        1
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
        'pages',
        'title',        
        '--linebreak--,gold_heading',    
        'after:subtitle'
);

$normalHeading = array(
        'normal_heading' => array (
                'exclude' => 0,
                'label' => 'Normal Heading',
                'config' => array(
	                'type' => 'text',
	                'cols' => 20,
	                'rows' => 3,
	                'wrap' => 'off', 
        		),     		
        ),       
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'pages',
        $normalHeading,
        1
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
        'pages',
        'title',        
        '--linebreak--,normal_heading',    
        'after:subtitle'
);





