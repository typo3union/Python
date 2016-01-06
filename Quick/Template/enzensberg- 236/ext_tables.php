<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Enzensberg');
\FluidTYPO3\Flux\Core::registerProviderExtensionKey($_EXTKEY, 'Content');
\FluidTYPO3\Flux\Core::registerProviderExtensionKey($_EXTKEY, 'Page');

$thumbimage = array(
        'pageicon' => array (
                'exclude' => 0,
                'label' => 'Page Icon',
                'config' => array(
	                'type' => 'group',
	                'internal_type' => 'file',
	                'allowed' => 'gif,jpg,png',
	                'max_size' => 1000,
	                'uploadfolder' => 'uploads/pics/',
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
        'abstract',
        '--linebreak--,pageicon',
        'after:abstract'
);



/*
$videoBanner = array(
        'videobanner' => array (
                'exclude' => 0,
                'label' => 'Hide Video Banner',
                'config' => array(
	                'type' => 'check',
        		)
        )
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'pages',
        $videoBanner,
        1
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
        'pages',
        'visibility',
        'videobanner',
        'after:linkToTop'
);
*/

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'extended content');
 
