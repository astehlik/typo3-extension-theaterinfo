<?php

declare(strict_types=1);

$languagePrefix = 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:';
$languagePrefixColumn = $languagePrefix . 'tx_theaterinfo_domain_model_cardorderdate.';

return [
    'ctrl' => [
        'label' => 'date_and_time',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'title' => $languagePrefix . 'tx_theaterinfo_domain_model_cardorderdate',
        'delete' => 'deleted',
        'enablecolumns' => ['disabled' => 'hidden'],
        'hideTable' => true,
    ],
    'columns' => [
        'date_and_time' => [
            'label' => $languagePrefixColumn . 'date_and_time',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'dbType' => 'datetime',
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

        'description_mail' => [
            'label' => $languagePrefixColumn . 'description_mail',
            'config' => [
                'type' => 'text',
                'rows' => 5,
                'cols' => 30,
            ],
        ],

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

        'is_sold_out' => [
            'label' => $languagePrefixColumn . 'is_sold_out',
            'config' => ['type' => 'check'],
        ],

        'parent_play' => [
            'config' => ['type' => 'passthrough'],
        ],
    ],

    'types' => [
        '0' => [
            'showitem' => '
                date_and_time, hidden, is_sold_out, description, description_mail
		    ',
        ],
    ],
];
