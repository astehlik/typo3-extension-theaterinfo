<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Resource\AbstractFile;

$languagePrefix = 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:';
$languagePrefixColumn = $languagePrefix . 'tx_theaterinfo_domain_model_play.';
$lllImageOverlayPalette = 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette';

return [
    'ctrl' => [
        'title' => $languagePrefix . 'tx_theaterinfo_domain_model_play',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'default_sortby' => 'ORDER BY time_sort DESC',
        'delete' => 'deleted',
        'enablecolumns' => ['disabled' => 'hidden'],
        'dividers2tabs' => 1,
        'iconfile' => 'EXT:theaterinfo/Resources/Public/Icons/icon_tx_theaterinfo_domain_model_play.gif',
        'searchFields' => 'title',
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
        'title' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'author' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'author',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
                'eval' => 'trim',
            ],
        ],
        'time_sort' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'time_sort',
            'config' => [
                'type' => 'datetime',
                'format' => 'datetime',
                'eval' => 'int',
            ],
        ],
        'time_display' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'time_display',
            'config' => [
                'type' => 'input',
                'size' => 30,
            ],
        ],
        'teaser' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'teaser',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
            ],
        ],
        'action' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'action',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
                'enableRichtext' => true,
            ],
        ],
        'logo' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'logo',
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
        'pictures' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'pictures',
            'config' => [
                'type' => 'file',
                'maxitems' => 20,
                'allowed' => 'common-image-types',
                'overrideChildTca' => [
                    'types' => [
                        '0' => [
                            'showitem' => '
                                --palette--;;tx_theaterinfo_playpicture,
                                --palette--;;filePalette',
                        ],
                        AbstractFile::FILETYPE_TEXT => [
                            'showitem' => '
                                --palette--;;tx_theaterinfo_playpicture,
                                --palette--;;filePalette',
                        ],
                    ],
                ],
            ],
        ],
        'state' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'state',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => $languagePrefixColumn . 'state.I.0',
                        'value' => '0',
                    ],
                    [
                        'label' => $languagePrefixColumn . 'state.I.1',
                        'value' => '1',
                    ],
                    [
                        'label' => $languagePrefixColumn . 'state.I.2',
                        'value' => '2',
                    ],
                    [
                        'label' => $languagePrefixColumn . 'state.I.3',
                        'value' => '3',
                    ],
                ],
                'size' => 1,
                'maxitems' => 1,
            ],
        ],
        'roles' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'roles',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_theaterinfo_domain_model_role',
                'foreign_field' => 'playuid',
                'foreign_class' => 'Tx_Theaterinfo_Domain_Model_Role',
                'maxitems' => 100,
                'appearance' => [
                    'collapseAll' => 1,
                    'expandSingle' => 1,
                ],
            ],
        ],
        'hide_roles' => [
            'exclude' => 1,
            'label' => $languagePrefixColumn . 'hide_roles',
            'config' => [
                'type' => 'check',
                'default' => '0',
            ],
        ],
        'helpers' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'helpers',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_theaterinfo_domain_model_helper',
                'foreign_field' => 'playuid',
                'foreign_class' => 'Tx_Theaterinfo_Domain_Model_Helper',
                'maxitems' => 100,
                'appearance' => [
                    'collapseAll' => 1,
                    'expandSingle' => 1,
                ],
            ],
        ],
        'hide_helpers' => [
            'exclude' => 1,
            'label' => $languagePrefixColumn . 'hide_helpers',
            'config' => [
                'type' => 'check',
                'default' => '0',
            ],
        ],
        'advance_sale' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'advance_sale',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
                'enableRichtext' => true,
            ],
        ],
        'slug' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:pages.slug',
            'config' => [
                'type' => 'slug',
                'size' => 50,
                'generatorOptions' => [
                    'fields' => ['title'],
                    'fieldSeparator' => '/',
                ],
                'fallbackCharacter' => '-',
                'eval' => 'uniqueInSite',
                'default' => '',
            ],
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => '
				--div--;' . $languagePrefixColumn . 'properties,
				    --palette--;;title, slug,
				    author,
				     --palette--;;times,
				    state, teaser,
				--div--;' . $languagePrefixColumn . 'action, action,
				--div--;' . $languagePrefixColumn . 'pictures, logo, pictures,
				--div--;' . $languagePrefixColumn . 'roles, hide_roles, roles,
				--div--;' . $languagePrefixColumn . 'helpers, hide_helpers, helpers,
				--div--;' . $languagePrefixColumn . 'advance_sale, advance_sale
			',
        ],
    ],
    'palettes' => [
        'title' => ['showitem' => 'title, hidden'],
        'times' => ['showitem' => 'time_sort, time_display'],
    ],
];
