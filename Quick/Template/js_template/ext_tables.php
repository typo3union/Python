<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Template');

//# Add Constants and setup TSConfig
if ('BE' === TYPO3_MODE) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript($_EXTKEY, 'constants', '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:js_template/Configuration/TypoScript/constants.txt">');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript($_EXTKEY, 'setup', '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:js_template/Configuration/TypoScript/setup.txt">');
}

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