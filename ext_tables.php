<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */
/** @noinspection PhpMissingStrictTypesDeclarationInspection */

defined('TYPO3') or die();

// These dividers are a little trick to group these items in the plugin selector
$GLOBALS['TCA']['tt_content']['columns']['list_type']['config']['items'][] = [
    'Theater info',
    '--div--',
    'EXT:theaterinfo/ext_icon.gif',
];

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Theaterinfo',
    'PlaysList',
    'Show plays (Theater info)'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Theaterinfo',
    'ShowManagement',
    'Show management (Theater info)'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Theaterinfo',
    'CardOrderForm',
    'Card order (Theater info)'
);

$TCA['tt_content']['columns']['list_type']['config']['items'][] = ['', '--div--'];
