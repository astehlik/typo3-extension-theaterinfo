<?php
$languagePrefix = 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:';
$languagePrefixColumn = $languagePrefix . 'tx_theaterinfo_card_order_date.';

return [
    'ctrl' => [
        'label' => 'date_and_time',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'title' => $languagePrefix . 'tx_theaterinfo_card_order_date',
        'delete' => 'deleted',
        'enablecolumns' => ['disabled' => 'hidden'],
        'hideTable' => true,
    ],
    'interface' => [
        'showRecordFieldList' => 'date_and_time, hidden, location, description',
    ],
    'columns' => [

        'date_and_time' => [
            'label' => $languagePrefixColumn . 'date_and_time',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,required',
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

        'hidden' => [
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

        'location' => [
            'label' => $languagePrefixColumn . 'location',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],

        'parent_play' => [
            'config' => ['type' => 'passthrough'],
        ],
    ],

    'types' => [
        '0' => [
            'showitem' => '
                date_and_time, hidden, location, description
		    ',
        ],
    ],
];