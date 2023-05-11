<?php

declare(strict_types=1);

$languagePrefix = 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:';
$languagePrefixColumn = $languagePrefix . 'tx_theaterinfo_domain_model_managementmembership.';
$iconfile = 'EXT:theaterinfo/Resources/Public/Icons/icon_tx_theaterinfo_domain_model_managementmembership.gif';

return [
    'ctrl' => [
        'title' => $languagePrefix . 'tx_theaterinfo_domain_model_managementmembership',
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
        'iconfile' => $iconfile,
        'hideTable' => true,
    ],
    'columns' => [
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
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'date',
            ],
        ],
        'enddate' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'enddate',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'date',
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
        '0' => ['showitem' => 'position, actor, startdate, enddate'],
    ],
];
