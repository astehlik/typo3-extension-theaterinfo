<?php
declare(strict_types=1);

return [
    'ctrl' => [
        'title' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_managementposition',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'iconfile' => 'EXT:theaterinfo/Resources/Public/Icons/icon_tx_theaterinfo_domain_model_managementposition.gif',
        'searchFields' => 'name',
    ],
    'interface' => [
        'showRecordFieldList' => 'name,showInOverview,memberships',
    ],
    'columns' => [
        'name' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_managementposition.name',
            'config' => [
                'type' => 'input',
                'eval' => 'trim,required',
            ],
        ],
        'name_female' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_managementposition.name_female',
            'config' => [
                'type' => 'input',
                'eval' => 'trim,required',
            ],
        ],
        'show_in_overview' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_managementposition.show_in_overview',
            'config' => [
                'type' => 'check',
            ],
        ],
        'memberships' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_managementposition.memberships',
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
