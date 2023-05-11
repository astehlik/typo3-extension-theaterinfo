<?php

declare(strict_types=1);

use Sto\Theaterinfo\Domain\Model\Enumeration\Gender;
use Sto\Theaterinfo\Hooks\RecordTitleHooks;
use TYPO3\CMS\Core\Resource\AbstractFile;

$languagePrefix = 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:';
$languagePrefixColumn = $languagePrefix . 'tx_theaterinfo_domain_model_actor.';

return [
    'ctrl' => [
        'title' => $languagePrefix . 'tx_theaterinfo_domain_model_actor',
        'label' => 'lastname',
        'label_alt' => 'company,firstname,type',
        /** @uses RecordTitleHooks::getActorTitle(); */
        'label_userFunc' => RecordTitleHooks::class . '->getActorTitle',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'default_sortby' => 'ORDER BY lastname, firstname',
        'delete' => 'deleted',
        'type' => 'type',
        'enablecolumns' => ['disabled' => 'hidden'],
        'dividers2tabs' => 1,
        'iconfile' => 'EXT:theaterinfo/Resources/Public/Icons/icon_tx_theaterinfo_domain_model_actor.gif',
        'searchFields' => 'firstname,lastname,company',
    ],
    'columns' => [
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],
        'type' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => $languagePrefixColumn . 'type.I.0',
                        'value' => '0',
                    ],
                    [
                        'label' => $languagePrefixColumn . 'type.I.1',
                        'value' => '1',
                    ],
                ],
                'size' => 1,
                'maxitems' => 1,
            ],
        ],
        'gender' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'gender',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => $languagePrefixColumn . 'gender.I.0',
                        'value' => Gender::MALE,
                    ],
                    [
                        'label' => $languagePrefixColumn . 'gender.I.1',
                        'value' => Gender::FEMALE,
                    ],
                ],
                'size' => 1,
                'maxitems' => 1,
            ],
        ],
        'firstname' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'firstname',
            'config' => [
                'type' => 'input',
                'size' => 30,
            ],
        ],
        'lastname' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'lastname',
            'config' => [
                'type' => 'input',
                'size' => 30,
            ],
        ],
        'company' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'company',
            'config' => [
                'type' => 'input',
                'size' => 30,
            ],
        ],
        'picture' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'picture',
            'config' => [
                'type' => 'file',
                'maxitems' => 1,
                'allowed' => 'common-image-types',
                'overrideChildTca' => [
                    'types' => [
                        '0' => [
                            'showitem' => '
                                --palette--;;tx_theaterinfo_cropimage,
                                --palette--;;filePalette',
                        ],
                        AbstractFile::FILETYPE_TEXT => [
                            'showitem' => '
                                --palette--;;tx_theaterinfo_cropimage,
                                --palette--;;filePalette',
                        ],
                    ],
                ],
            ],
        ],
        'management_memberships' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'management_memberships',
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
            'label' => $languagePrefixColumn . 'management_reasons',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
            ],
        ],
        'favorite_role' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'favorite_role',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_theaterinfo_domain_model_role',
                'foreign_table_where' => 'AND FIND_IN_SET(\'###THIS_UID###\', tx_theaterinfo_domain_model_role.actors)'
                    . ' ORDER BY name',
                'items' => [
                    [
                        'label' => $languagePrefixColumn . 'favorite_role.I.none',
                        'value' => '0',
                    ],
                ],
                'size' => 5,
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'birthday' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'birthday',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
                'eval' => 'int',
            ],
        ],
        'hobbys' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'hobbys',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
            ],
        ],
        'job' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'job',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
            ],
        ],
        'member_since' => [
            'exclude' => 0,
            'label' => $languagePrefixColumn . 'member_since',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
                'eval' => 'int',
            ],
        ],
        'slug' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:pages.slug',
            'config' => [
                'type' => 'slug',
                'size' => 50,
                'generatorOptions' => [
                    'fields' => [
                        'lastname',
                        'firstname',
                        'company',
                    ],
                    'fieldSeparator' => '-',
                ],
                'fallbackCharacter' => '-',
                'eval' => 'uniqueInSite',
                'default' => '',
            ],
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => '
			--div--;' . $languagePrefixColumn . 'properties,type, hidden, gender, firstname, lastname, slug,
			    favorite_role, birthday, hobbys, job, member_since, picture,
			--div--;' . $languagePrefixColumn . 'management,management_memberships, management_reasons
		',
        ],
        '1' => ['showitem' => 'type, hidden, company, slug, picture'],
    ],
];
