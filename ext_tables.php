<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Theater info');

// These dividers are a little trick to group these items in the plugin selector
$GLOBALS['TCA']['tt_content']['columns']['list_type']['config']['items'][] = [
    'Theater info',
    '--div--',
    'EXT:theaterinfo/ext_icon.gif',
];

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Sto.Theaterinfo',
    'PlaysList',
    'Show plays (Theater info)'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Sto.Theaterinfo',
    'ShowManagement',
    'Show management (Theater info)'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Sto.Theaterinfo',
    'CardOrderForm',
    'Card order (Theater info)'
);

$TCA['tt_content']['columns']['list_type']['config']['items'][] = ['', '--div--'];
