<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'fluxtemplate');

\FluidTYPO3\Flux\Core::registerProviderExtensionKey($_EXTKEY, 'Content');
\FluidTYPO3\Flux\Core::registerProviderExtensionKey($_EXTKEY, 'Page');

// New icons for the BE
if (TYPO3_MODE == 'BE') {

	$icons = array('jobs','storage','team');
	foreach ($icons as $icon) {

		\TYPO3\CMS\Backend\Sprite\SpriteManager::addTcaTypeIcon('pages', 'contains-' . $icon, \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Backend/Icons/' . $icon . '.png');

		$TCA['pages']['columns']['module']['config']['items'][] = array(ucfirst($icon), $icon, \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Backend/Icons/' . $icon . '.png');
	}
}