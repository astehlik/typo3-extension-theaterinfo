<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_managementmembership',
        'label' => 'position',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY startdate',
        'delete' => 'deleted',
        'enablecolumns' => [
            'starttime' => 'startdate',
            'endtime' => 'enddate',
        ],
        'iconfile' => 'EXT:theaterinfo/Resources/Public/Icons/icon_tx_theaterinfo_domain_model_managementmembership.gif',
    ],
    'interface' => [
        'showRecordFieldList' => 'position,actor,startdate,enddate'
    ],
    'columns' => [
        'position' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_managementmembership.position',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_theaterinfo_domain_model_managementposition',
                'foreign_table_where' => 'ORDER BY tx_theaterinfo_domain_model_managementposition.name',
                'size' => 1,
                'maxitems' => 1,
            ],
        ],
        'startdate' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_managementmembership.startdate',
            'config' => [
                'type' => 'input',
                'eval' => 'date',
            ],
        ],
        'enddate' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_managementmembership.enddate',
            'config' => [
                'type' => 'input',
                'eval' => 'date',
            ],
        ],
        'actor' => [
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_managementmembership.actor',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_theaterinfo_domain_model_actor',
                'size' => 1,
                'maxitems' => 1,
                'readOnly' => 1,
            ]
        ],
    ],
    'types' => [
        '0' => ['showitem' => 'position, actor, startdate, enddate'],
    ],
];
