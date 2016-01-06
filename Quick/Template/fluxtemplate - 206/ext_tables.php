<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Fluid - Flux template');
\FluidTYPO3\Flux\Core::registerProviderExtensionKey($_EXTKEY, 'Content');