<?php
declare(strict_types=1);

return [
    'ctrl' => [
        'title' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_helper',
        'label' => 'helpertype',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'iconfile' => 'EXT:theaterinfo/Resources/Public/Icons/icon_tx_theaterinfo_domain_model_helper.gif',
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
        'helpertype' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_helper.helpertype',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_theaterinfo_domain_model_helpertype',
                'foreign_table_where' => 'ORDER BY tx_theaterinfo_domain_model_helpertype.jobtitle',
                'foreign_class' => 'Tx_Theaterinfo_Domain_Model_Helpertype',
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'actors' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_helper.actors',
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
        'insert_spacer' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_helper.insert_spacer',
            'config' => [
                'type' => 'check',
            ],
        ],
        'playuid' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
    'types' => [
        '0' => ['showitem' => 'helpertype, actors, insert_spacer, playuid, --palette--;;inline'],
    ],
    'palettes' => [
        'inline' => [
            'showitem' => 'hidden',
            'isHiddenPalette' => true,
        ],
    ],
];
