<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */
/** @noinspection PhpMissingStrictTypesDeclarationInspection */

defined('TYPO3_MODE') or die();

if (TYPO3_MODE == 'BE') {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/class.db_list_extra.inc']['getTable'][] =
        \Sto\Theaterinfo\Hooks\RecordListHooks::class;
}

/**
 * Configure the Plugin to call the
 * right combination of Controller and Action according to
 * the user input (default settings, FlexForm, URL etc.)
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Sto.Theaterinfo',
    'PlaysList',
    ['Play' => 'list, show',],
    []
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Sto.Theaterinfo',
    'ShowManagement',
    [
        'Management' => 'list',
        'Actor' => 'show',
    ],
    []
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Sto.Theaterinfo',
    'CardOrderForm',
    ['CardOrder' => 'orderForm,takeOrder,takeOrderConfirmation'],
    ['CardOrder' => 'orderForm,takeOrder']
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['txTheaterinfoFal'] =
    \Sto\Theaterinfo\Install\FalUpdateWizard::class;
