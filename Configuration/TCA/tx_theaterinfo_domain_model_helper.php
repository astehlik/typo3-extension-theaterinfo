<?php

declare(strict_types=1);

$languagePrefix = 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:';
$languagePrefixColumn = $languagePrefix . 'tx_theaterinfo_domain_model_helper.';

return [
    'ctrl' => [
        'title' => $languagePrefix . 'tx_theaterinfo_domain_model_helper',
        'label' => 'helpertype',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'enablecolumns' => ['disabled' => 'hidden'],
        'iconfile' => 'EXT:theaterinfo/Resources/Public/Icons/icon_tx_theaterinfo_domain_model_helper.gif',
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
        'helpertype' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'helpertype',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_theaterinfo_domain_model_helpertype',
                'foreign_table_where' => 'ORDER BY tx_theaterinfo_domain_model_helpertype.jobtitle',
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
            ],
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
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 100,
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
            'label' => $languagePrefixColumn . 'insert_spacer',
            'config' => ['type' => 'check'],
        ],
        'playuid' => [
            'config' => ['type' => 'passthrough'],
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
