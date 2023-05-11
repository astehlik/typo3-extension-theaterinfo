<?php

declare(strict_types=1);

use Sto\Theaterinfo\Domain\Model\Enumeration\Gender;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$languagePrefix = 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xlf:';
$languagePrefixColumn = $languagePrefix . 'tx_theaterinfo_domain_model_actor.';
$lllImageOverlayPalette = 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette';

return [
    'ctrl' => [
        'title' => $languagePrefix . 'tx_theaterinfo_domain_model_actor',
        'label' => 'lastname',
        'label_userFunc' => 'Sto\\Theaterinfo\\Hooks\\RecordTitleHooks->getActorTitle',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
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
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => '0',
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
                        $languagePrefixColumn . 'type.I.0',
                        '0',
                    ],
                    [
                        $languagePrefixColumn . 'type.I.1',
                        '1',
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
                        $languagePrefixColumn . 'gender.I.0',
                        Gender::MALE,
                    ],
                    [
                        $languagePrefixColumn . 'gender.I.1',
                        Gender::FEMALE,
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
            'config' => ExtensionManagementUtility::getFileFieldTCAConfig(
                'picture',
                [
                    'maxitems' => 1,
                    'overrideChildTca' => [
                        'types' => [
                            '0' => [
                                'showitem' => '
								--palette--;' . $lllImageOverlayPalette . ';tx_theaterinfo_cropimage,
								--palette--;;filePalette',
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
								--palette--;' . $lllImageOverlayPalette . ';tx_theaterinfo_cropimage,
								--palette--;;filePalette',
                            ],
                        ],
                    ],
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
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
                        $languagePrefixColumn . 'favorite_role.I.none',
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
            'label' => $languagePrefixColumn . 'birthday',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'date',
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
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'date',
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
