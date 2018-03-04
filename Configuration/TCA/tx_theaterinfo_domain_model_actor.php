<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor',
        'label' => 'lastname',
        'label_userFunc' => 'Sto\\Theaterinfo\\Hooks\\RecordTitleHooks->getActorTitle',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY lastname, firstname',
        'delete' => 'deleted',
        'type' => 'type',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'dividers2tabs' => 1,
        'iconfile' => 'EXT:theaterinfo/Resources/Public/Icons/icon_tx_theaterinfo_domain_model_actor.gif',
        'searchFields' => 'firstname,lastname,company',
    ],
    'interface' => [
        'showRecordFieldList' => 'hidden,gender,firstname,lastname,picture,management_positions,management_reasons,favorite_role,birthday,hobbys,job,member_since',
    ],
    'columns' => [
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => '0',
            ],
        ],
        'type' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor.type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor.type.I.0',
                        '0',
                    ],
                    [
                        'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor.type.I.1',
                        '1',
                    ],
                ],
                'size' => 1,
                'maxitems' => 1,
            ],
        ],
        'gender' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor.gender',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor.gender.I.0',
                        '0',
                    ],
                    [
                        'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor.gender.I.1',
                        '1',
                    ],
                ],
                'size' => 1,
                'maxitems' => 1,
            ],
        ],
        'firstname' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor.firstname',
            'config' => [
                'type' => 'input',
                'size' => '30',
            ],
        ],
        'lastname' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor.lastname',
            'config' => [
                'type' => 'input',
                'size' => '30',
            ],
        ],
        'company' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor.company',
            'config' => [
                'type' => 'input',
                'size' => '30',
            ],
        ],
        'picture' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor.picture',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'picture',
                [
                    'maxitems' => 1,
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;tx_theaterinfo_cropimage,
								--palette--;;filePalette',
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;tx_theaterinfo_cropimage,
								--palette--;;filePalette',
                        ],
                    ],
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        'management_memberships' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor.management_memberships',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_theaterinfo_domain_model_managementmembership',
                'foreign_field' => 'actor',
                'maxitems' => 100,
                'appearance' => [
                    'collapseAll' => 1,
                    'expandSingle' => 1,
                ],
            ],
        ],
        'management_reasons' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor.management_reasons',
            'config' => [
                'type' => 'text',
                'cols' => '30',
                'rows' => '5',
            ],
        ],
        'favorite_role' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor.favorite_role',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_theaterinfo_domain_model_role',
                'foreign_table_where' => 'AND FIND_IN_SET(\'###THIS_UID###\', tx_theaterinfo_domain_model_role.actors) ORDER BY name',
                'items' => [
                    [
                        'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor.favorite_role.I.none',
                        '0',
                    ],
                ],
                'size' => 5,
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'birthday' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor.birthday',
            'config' => [
                'type' => 'input',
                'eval' => 'date',
            ],
        ],
        'hobbys' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor.hobbys',
            'config' => [
                'type' => 'text',
                'cols' => '30',
                'rows' => '5',
            ],
        ],
        'job' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor.job',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
            ],
        ],
        'member_since' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor.member_since',
            'config' => [
                'type' => 'input',
                'eval' => 'date',
            ],
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => '
			--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor.properties,type, hidden, gender, firstname, lastname, favorite_role, birthday, hobbys, job, member_since, picture,
			--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:tx_theaterinfo_domain_model_actor.management,management_memberships, management_reasons
		',
        ],
        '1' => ['showitem' => 'type, hidden, company, picture'],
    ],
];
