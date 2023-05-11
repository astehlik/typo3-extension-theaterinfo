<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Resource\AbstractFile;

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
        'iconfile' => 'EXT:theaterinfo/Resources/Public/Icons/icon_tx_theaterinfo_domain_model_helpertype.gif',
        'searchFields' => 'jobtitle',
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
                        AbstractFile::FILETYPE_TEXT => [
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
