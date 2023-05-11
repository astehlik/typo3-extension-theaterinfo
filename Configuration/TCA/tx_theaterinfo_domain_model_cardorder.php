<?php

declare(strict_types=1);

$languagePrefix = 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:';
$languagePrefixColumn = $languagePrefix . 'tx_theaterinfo_domain_model_cardorder.';

return [
    'ctrl' => [
        'label' => 'email',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'title' => $languagePrefix . 'tx_theaterinfo_domain_model_cardorder',
        'delete' => 'deleted',
    ],
    'columns' => [
        'address' => [
            'label' => $languagePrefixColumn . 'address',
            'config' => ['type' => 'input'],
        ],

        'city' => [
            'label' => $languagePrefixColumn . 'city',
            'config' => ['type' => 'input'],
        ],

        'email' => [
            'label' => $languagePrefixColumn . 'email',
            'config' => ['type' => 'input'],
        ],

        'firstname' => [
            'label' => $languagePrefixColumn . 'firstname',
            'config' => ['type' => 'input'],
        ],

        'lastname' => [
            'label' => $languagePrefixColumn . 'lastname',
            'config' => ['type' => 'input'],
        ],

        'notes' => [
            'label' => $languagePrefixColumn . 'notes',
            'config' => [
                'type' => 'text',
                'rows' => 5,
                'cols' => 30,
            ],
        ],

        'rows' => [
            'label' => $languagePrefixColumn . 'rows',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_theaterinfo_domain_model_cardorderrow',
                'foreign_field' => 'parent_order',
                'appearance' => [
                    'enabledControls' => [
                        'info' => true,
                        'new' => true,
                        'dragdrop' => false,
                        'sort' => false,
                        'hide' => false,
                        'delete' => true,
                    ],
                ],
            ],
        ],

        'zip' => [
            'label' => $languagePrefixColumn . 'zip',
            'config' => ['type' => 'input'],
        ],
    ],

    'types' => [
        '0' => [
            'showitem' => '
                firstname, lastname, email, address, zip, city, notes,
                rows
		    ',
        ],
    ],
];
