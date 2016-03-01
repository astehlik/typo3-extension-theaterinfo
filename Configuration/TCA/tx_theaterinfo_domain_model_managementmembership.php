<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership',
        'label' => 'type',
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
        'showRecordFieldList' => 'type,position,actor,startdate,enddate'
    ],
    'columns' => [
        'type' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.type.I.first_leader',
                        'first_leader'
                    ],
                    [
                        'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.type.I.second_leader',
                        'second_leader'
                    ],
                    [
                        'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.type.I.treasurer',
                        'treasurer'
                    ],
                    [
                        'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.type.I.reporter',
                        'reporter'
                    ],
                    [
                        'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.type.I.technical_leader',
                        'technical_leader'
                    ],
                    [
                        'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.type.I.backstage_leader',
                        'backstage_leader'
                    ],
                    [
                        'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.type.I.public_relations',
                        'public_relations'
                    ],
                    [
                        'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.type.I.accounts_auditor',
                        'accounts_auditor'
                    ],
                ],
                'size' => 1,
                'maxitems' => 1,
            ],
        ],
        'position' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.position',
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
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.startdate',
            'config' => [
                'type' => 'input',
                'eval' => 'date',
            ],
        ],
        'enddate' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.enddate',
            'config' => [
                'type' => 'input',
                'eval' => 'date',
            ],
        ],
        'actor' => [
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.actor',
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
        '0' => ['showitem' => 'type, position, actor, startdate, enddate'],
    ],
];