<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Resource\FileType;

$languagePrefix = 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:';
$languagePrefixColumn = $languagePrefix . 'tx_theaterinfo_domain_model_helpertype.';
$lllImageOverlayPalette = 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette';

return [
    'ctrl' => [
        'title' => $languagePrefix . 'tx_theaterinfo_domain_model_helpertype',
        'label' => 'jobtitle',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'default_sortby' => 'ORDER BY jobtitle',
        'delete' => 'deleted',
        'enablecolumns' => ['disabled' => 'hidden'],
        'typeicon_classes' => ['default' => 'apps-pagetree-folder-contains-fe_users'],
        'searchFields' => 'jobtitle',
        'origUid' => 't3_origuid',
        'versioningWS' => true,
    ],
    'columns' => [
        'hidden' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],
        'jobtitle' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'jobtitle',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'icon' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'icon',
            'config' => [
                'type' => 'file',
                'maxitems' => 1,
                'allowed' => 'common-image-types',
                'overrideChildTca' => [
                    'types' => [
                        '0' => [
                            'showitem' => '
                                --palette--;;tx_theaterinfo_cropimage,
                                --palette--;;filePalette',
                        ],
                        FileType::TEXT->value => [
                            'showitem' => '
                                --palette--;;tx_theaterinfo_cropimage,
                                --palette--;;filePalette',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'types' => [
        '0' => ['showitem' => 'jobtitle, hidden, icon'],
    ],
];
