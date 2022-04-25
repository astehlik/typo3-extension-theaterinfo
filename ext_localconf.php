<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */
/** @noinspection PhpMissingStrictTypesDeclarationInspection */

defined('TYPO3') or die();

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
    [\Sto\Theaterinfo\Controller\PlayController::class => 'list, show',],
    []
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Sto.Theaterinfo',
    'ShowManagement',
    [
        \Sto\Theaterinfo\Controller\ManagementController::class => 'list',
        \Sto\Theaterinfo\Controller\ActorController::class => 'show',
    ],
    []
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Sto.Theaterinfo',
    'CardOrderForm',
    [\Sto\Theaterinfo\Controller\CardOrderController::class => 'orderForm,takeOrder,takeOrderConfirmation'],
    [\Sto\Theaterinfo\Controller\CardOrderController::class => 'orderForm,takeOrder']
);
