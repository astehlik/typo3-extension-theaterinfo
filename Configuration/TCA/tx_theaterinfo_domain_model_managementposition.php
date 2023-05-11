<?php

declare(strict_types=1);

$languagePrefix = 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:';
$languagePrefixColumn = $languagePrefix . 'tx_theaterinfo_domain_model_managementposition.';

return [
    'ctrl' => [
        'title' => $languagePrefix . 'tx_theaterinfo_domain_model_managementposition',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'iconfile' => 'EXT:theaterinfo/Resources/Public/Icons/icon_tx_theaterinfo_domain_model_managementposition.gif',
        'searchFields' => 'name',
    ],
    'columns' => [
        'name' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'name',
            'config' => [
                'type' => 'input',
                'eval' => 'trim,required',
            ],
        ],
        'name_female' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'name_female',
            'config' => [
                'type' => 'input',
                'eval' => 'trim,required',
            ],
        ],
        'show_in_overview' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'show_in_overview',
            'config' => ['type' => 'check'],
        ],
        'memberships' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'memberships',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_theaterinfo_domain_model_managementmembership',
                'foreign_field' => 'position',
            ],
        ],
    ],
    'types' => [
        '0' => ['showitem' => 'name, name_female, show_in_overview, memberships'],
    ],
];
