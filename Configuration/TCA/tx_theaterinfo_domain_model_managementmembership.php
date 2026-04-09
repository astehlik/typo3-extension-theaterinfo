<?php

declare(strict_types=1);

$languagePrefix = 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:';
$languagePrefixColumn = $languagePrefix . 'tx_theaterinfo_domain_model_managementmembership.';

return [
    'ctrl' => [
        'title' => $languagePrefix . 'tx_theaterinfo_domain_model_managementmembership',
        'label' => 'position',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'default_sortby' => 'ORDER BY startdate',
        'delete' => 'deleted',
        'enablecolumns' => [
            'starttime' => 'startdate',
            'endtime' => 'enddate',
        ],
        'typeicon_classes' => ['default' => 'content-briefcase'],
        'hideTable' => true,
        'origUid' => 't3_origuid',
        'versioningWS' => true,
    ],
    'columns' => [
        'actor_name_suffix' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'actor_name_suffix',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
                'eval' => 'trim',
            ],
        ],
        'position' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'position',
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
            'label' => $languagePrefixColumn . 'startdate',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
                'eval' => 'int',
            ],
        ],
        'enddate' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'enddate',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
                'eval' => 'int',
            ],
        ],
        'actor' => [
            'label' => $languagePrefixColumn . 'actor',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_theaterinfo_domain_model_actor',
                'size' => 1,
                'maxitems' => 1,
                'readOnly' => 1,
            ],
        ],
    ],
    'types' => [
        '0' => ['showitem' => 'position, actor, actor_name_suffix, startdate, enddate'],
    ],
];
