<?php
declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

return [
    'ctrl' => [
        'title' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY time_sort DESC',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'dividers2tabs' => 1,
        'iconfile' => 'EXT:theaterinfo/Resources/Public/Icons/icon_tx_theaterinfo_domain_model_play.gif',
        'searchFields' => 'title',
    ],
    'columns' => [
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => '0',
            ],
        ],
        'title' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
            ],
        ],
        'author' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.author',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
            ],
        ],
        'time_sort' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.time_sort',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 12,
                'eval' => 'datetime',
                'checkbox' => '0',
                'default' => '0',
            ],
        ],
        'time_display' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.time_display',
            'config' => [
                'type' => 'input',
                'size' => 30,
            ],
        ],
        'teaser' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.teaser',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
            ],
        ],
        'action' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.action',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
                'enableRichtext' => true,
            ],
        ],
        'logo' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.logo',
            'config' => ExtensionManagementUtility::getFileFieldTCAConfig(
                'logo',
                [
                    'maxitems' => 1,
                    'overrideChildTca' => [
                        'types' => [
                            '0' => [
                                'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;tx_theaterinfo_cropimage,
								--palette--;;filePalette',
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;tx_theaterinfo_cropimage,
								--palette--;;filePalette',
                            ],
                        ],
                    ],
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        'pictures' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.pictures',
            'config' => ExtensionManagementUtility::getFileFieldTCAConfig(
                'pictures',
                [
                    'maxitems' => 20,
                    'overrideChildTca' => [
                        'types' => [
                            '0' => [
                                'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;tx_theaterinfo_playpicture,
								--palette--;;filePalette',
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;tx_theaterinfo_playpicture,
								--palette--;;filePalette',
                            ],
                        ],
                    ],
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        'state' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.state',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.state.I.0',
                        '0',
                    ],
                    [
                        'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.state.I.1',
                        '1',
                    ],
                    [
                        'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.state.I.2',
                        '2',
                    ],
                    [
                        'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.state.I.3',
                        '3',
                    ],
                ],
                'size' => 1,
                'maxitems' => 1,
            ],
        ],
        'roles' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.roles',
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
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.hide_roles',
            'config' => [
                'type' => 'check',
                'default' => '0',
            ],
        ],
        'helpers' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.helpers',
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
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.hide_helpers',
            'config' => [
                'type' => 'check',
                'default' => '0',
            ],
        ],
        'advance_sale' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.advance_sale',
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
				--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.properties,
				    --palette--;;title, slug,
				    author,
				     --palette--;;times,
				    state, teaser,
				--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.action, action,
				--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.pictures, logo, pictures,
				--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.roles, hide_roles, roles,
				--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.helpers, hide_helpers, helpers,
				--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_play.advance_sale, advance_sale
			',
        ],
    ],
    'palettes' => [
        'title' => [
            'showitem' => 'title, hidden',
        ],
        'times' => [
            'showitem' => 'time_sort, time_display',
        ],
    ],
];
