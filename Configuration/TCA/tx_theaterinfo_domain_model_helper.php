<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_helper',
        'label' => 'helpertype',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'iconfile' => 'EXT:theaterinfo/Resources/Public/Icons/icon_tx_theaterinfo_domain_model_helper.gif',
    ],
    'interface' => [
        'showRecordFieldList' => 'hidden,helpertype,actors,insert_spacer,playuid'
    ],
    'columns' => [
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => '0'
            ]
        ],
        'helpertype' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_helper.helpertype',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_theaterinfo_domain_model_helpertype',
                'foreign_table_where' => 'ORDER BY tx_theaterinfo_domain_model_helpertype.jobtitle',
                'foreign_class' => 'Tx_Theaterinfo_Domain_Model_Helpertype',
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
                'wizards' => [
                    'edit' => [
                        'type' => 'popup',
                        'title' => 'Edit',
                        'module' => [
                            'name' => 'wizard_edit',
                        ],
                        'popup_onlyOpenIfSelected' => 1,
                        'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif',
                        'JSopenParams' => 'width=800,height=600,status=0,menubar=0,scrollbars=1'
                    ],
                ],
            ]
        ],
        'actors' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_helper.actors',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_theaterinfo_domain_model_actor',
                'foreign_table_where' => 'ORDER BY tx_theaterinfo_domain_model_actor.lastname, tx_theaterinfo_domain_model_actor.firstname',
                'foreign_class' => 'Tx_Theaterinfo_Domain_Model_Actor',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 100,
                'wizards' => [
                    'edit' => [
                        'type' => 'popup',
                        'title' => 'Edit',
                        'module' => [
                            'name' => 'wizard_edit',
                        ],
                        'popup_onlyOpenIfSelected' => 1,
                        'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif',
                        'JSopenParams' => 'width=800,height=600,status=0,menubar=0,scrollbars=1'
                    ],
                ],
            ]
        ],
        'insert_spacer' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_helper.insert_spacer',
            'config' => [
                'type' => 'check',
            ]
        ],
        'playuid' => [
            'config' => [
                'type' => 'passthrough',
            ]
        ],
    ],
    'types' => [
        '0' => ['showitem' => 'helpertype, hidden, actors, insert_spacer, playuid']
    ],
];