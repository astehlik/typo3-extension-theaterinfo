<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Resource\AbstractFile;

$languagePrefix = 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:';
$languagePrefixColumn = $languagePrefix . 'tx_theaterinfo_domain_model_role.';
$lllImageOverlayPalette = 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette';

return [
    'ctrl' => [
        'title' => $languagePrefix . 'tx_theaterinfo_domain_model_role',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => ['disabled' => 'hidden'],
        'iconfile' => 'EXT:theaterinfo/Resources/Public/Icons/icon_tx_theaterinfo_domain_model_role.gif',
        'searchFields' => 'name',
        'hideTable' => true,
    ],
    'columns' => [
        'hidden' => [
            'exclude' => true,
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
        'name' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'name',
            'config' => [
                'type' => 'input',
                'size' => 30,
            ],
        ],
        'picture' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'picture',
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
        'insert_spacer' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'insert_spacer',
            'config' => ['type' => 'check'],
        ],
        'playuid' => [
            'config' => ['type' => 'passthrough'],
        ],
        'actors' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'actors',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_theaterinfo_domain_model_actor',
                'foreign_table_where' => 'ORDER BY tx_theaterinfo_domain_model_actor.lastname,'
                    . ' tx_theaterinfo_domain_model_actor.firstname',
                'foreign_class' => 'Tx_Theaterinfo_Domain_Model_Actor',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 100,
                'enableMultiSelectFilterTextfield' => true,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                        'options' => [
                            'title' => 'Edit',
                            'windowOpenParameters' => 'height=768,width=1024,status=0,menubar=0,scrollbars=1',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'types' => [
        '0' => ['showitem' => 'name, actors, picture, insert_spacer, playuid, --palette--;;inline'],
    ],
    'palettes' => [
        'inline' => [
            'showitem' => 'hidden',
            'isHiddenPalette' => true,
        ],
    ],
];
