<?php
declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

return [
    'ctrl' => [
        'title' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_role',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'iconfile' => 'EXT:theaterinfo/Resources/Public/Icons/icon_tx_theaterinfo_domain_model_role.gif',
        'searchFields' => 'name',
        'hideTable' => true,
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
        'name' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_role.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
            ],
        ],
        'picture' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_role.picture',
            'config' => ExtensionManagementUtility::getFileFieldTCAConfig(
                'picture',
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
        'insert_spacer' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_role.insert_spacer',
            'config' => [
                'type' => 'check',
            ],
        ],
        'playuid' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'actors' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_role.actors',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_theaterinfo_domain_model_actor',
                'foreign_table_where' => 'ORDER BY tx_theaterinfo_domain_model_actor.lastname, tx_theaterinfo_domain_model_actor.firstname',
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
