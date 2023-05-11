<?php

declare(strict_types=1);

$languagePrefix = 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:';
$languagePrefixColumn = $languagePrefix . 'tx_theaterinfo_domain_model_cardorderrow.';

return [
    'ctrl' => [
        'label' => 'play_date',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'title' => $languagePrefix . 'tx_theaterinfo_domain_model_cardorderrow',
        'delete' => 'deleted',
        'hideTable' => true,
    ],
    'columns' => [
        'amount_normal' => [
            'label' => $languagePrefixColumn . 'amount_normal',
            'config' => ['type' => 'input'],
        ],

        'amount_reduced' => [
            'label' => $languagePrefixColumn . 'amount_reduced',
            'config' => ['type' => 'input'],
        ],

        'play_date' => [
            'config' => ['type' => 'passthrough'],
        ],
    ],

    'types' => [
        '0' => [
            'showitem' => '
                amount_normal, amount_reduced
		    ',
        ],
    ],
];
