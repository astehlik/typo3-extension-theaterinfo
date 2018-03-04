<?php
$languagePrefix = 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:';
$languagePrefixColumn = $languagePrefix . 'tx_theaterinfo_card_order_play.';

return [
    'ctrl' => [
        'label' => 'label',
        'sortby' => 'sorting',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'title' => $languagePrefix . 'tx_theaterinfo_card_order_play',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'enable_hidden',
            'starttime' => 'enable_starttime',
            'endtime' => 'enable_endtime',
        ],
    ],
    'interface' => [
        'showRecordFieldList' => 'label, description, description_mail, enable_endtime, enable_starttime,
            enable_hidden, price_normal, price_normal_description, price_reduced, price_reduced_description',
    ],
    'columns' => [

        'dates' => [
            'label' => $languagePrefixColumn . 'dates',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_theaterinfo_domain_model_cardorderdate',
                'foreign_field' => 'parent_play',
                'appearance' => [
                    'enabledControls' => [
                        'info' => true,
                        'new' => true,
                        'dragdrop' => false,
                        'sort' => false,
                        'hide' => true,
                        'delete' => true,
                    ],
                ],
            ],
        ],

        'description' => [
            'label' => $languagePrefixColumn . 'description',
            'config' => [
                'type' => 'text',
                'rows' => 5,
                'cols' => 30,
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
            ],
        ],

        'description_mail' => [
            'label' => $languagePrefixColumn . 'description_mail',
            'config' => [
                'type' => 'text',
                'rows' => 5,
                'cols' => 30,
            ],
        ],

        'enable_endtime' => [
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038),
                ],
            ],
        ],

        'enable_hidden' => [
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:hidden.I.0',
                    ],
                ],
            ],
        ],

        'enable_starttime' => [
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],

        'label' => [
            'label' => $languagePrefixColumn . 'label',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],

        'price_normal' => [
            'label' => $languagePrefixColumn . 'price_normal',
            'config' => [
                'type' => 'input',
                'size' => 10,
                'eval' => 'double2',
            ],
        ],

        'price_normal_description' => [
            'label' => $languagePrefixColumn . 'price_normal_description',
            'config' => [
                'type' => 'text',
                'rows' => 5,
                'cols' => 30,
            ],
        ],

        'price_reduced' => [
            'label' => $languagePrefixColumn . 'price_reduced',
            'config' => [
                'type' => 'input',
                'size' => 10,
                'eval' => 'double2',
            ],
        ],

        'price_reduced_description' => [
            'label' => $languagePrefixColumn . 'price_reduced_description',
            'config' => [
                'type' => 'text',
                'rows' => 5,
                'cols' => 30,
            ],
        ],

    ],
    'types' => [
        '0' => [
            'showitem' => '
			    --div--,label, description, description_mail, enable_endtime, enable_starttime, enable_hidden,
			    price_normal, price_normal_description, price_reduced, price_reduced_description,
			    --div--;' . $languagePrefixColumn . 'tab.dates,dates
		    ',
        ],
    ],
];
