<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || exit;

call_user_func(static function (): void {
    $lllPrefxCtype = 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tt_content.CType.';

    ExtensionManagementUtility::addTcaSelectItemGroup(
        'tt_content',
        'CType',
        'theaterinfo',
        $lllPrefxCtype . 'group.theaterinfo',
    );

    $enablePagesForContentType = static function (string $contentTypeName): void {
        ExtensionManagementUtility::addToAllTCAtypes(
            'tt_content',
            '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:plugin, pages',
            $contentTypeName,
            'after:palette:headers',
        );
    };

    $contentTypeName = ExtensionUtility::registerPlugin(
        'Theaterinfo',
        'PlaysList',
        $lllPrefxCtype . 'theaterinfo_playslist',
        'content-inside-text-img-right',
        'theaterinfo',
        $lllPrefxCtype . 'theaterinfo_playslist.description',
    );

    $enablePagesForContentType($contentTypeName);


    $contentTypeName = ExtensionUtility::registerPlugin(
        'Theaterinfo',
        'ShowManagement',
        $lllPrefxCtype . 'theaterinfo_showmanagement',
        'content-briefcase',
        'theaterinfo',
        $lllPrefxCtype . 'theaterinfo_showmanagement.description',
    );

    $enablePagesForContentType($contentTypeName);

    $contentTypeName = ExtensionUtility::registerPlugin(
        'Theaterinfo',
        'CardOrderForm',
        $lllPrefxCtype . 'theaterinfo_cardorderform',
        'content-book',
        'theaterinfo',
        $lllPrefxCtype . 'theaterinfo_cardorderform.description',
    );

    $enablePagesForContentType($contentTypeName);
});
