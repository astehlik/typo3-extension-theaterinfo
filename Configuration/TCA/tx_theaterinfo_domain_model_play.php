<?php
return [
	'ctrl' => [
		'title' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY time_sort',
		'delete' => 'deleted',
		'enablecolumns' => [
			'disabled' => 'hidden',
		],
		'dividers2tabs' => 1,
		'iconfile' => 'EXT:theaterinfo/Resources/Public/Icons/icon_tx_theaterinfo_domain_model_play.gif',
		'searchFields' => 'title',
	],
	'interface' => [
		'showRecordFieldList' => 'hidden,title,author,time_sort,time_display,teaser,action,logo,pictures,state,roles,hide_roles,helpers,hide_helpers,advance_sale',
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
		'title' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.title',
			'config' => [
				'type' => 'input',
				'size' => '30',
			]
		],
		'author' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.author',
			'config' => [
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			]
		],
		'time_sort' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.time_sort',
			'config' => [
				'type' => 'input',
				'size' => '12',
				'max' => '20',
				'eval' => 'datetime',
				'checkbox' => '0',
				'default' => '0'
			]
		],
		'time_display' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.time_display',
			'config' => [
				'type' => 'input',
				'size' => '30',
			]
		],
		'teaser' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.teaser',
			'config' => [
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			]
		],
		'action' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.action',
			'config' => [
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			]
		],
		'logo' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.logo',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'logo',
				[
					'maxitems' => 1,
					'foreign_types' => [
						'0' => [
							'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;tx_theaterinfo_cropimage,
								--palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
							'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;tx_theaterinfo_cropimage,
								--palette--;;filePalette'
						],
					],
				],
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		],
		'pictures' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.pictures',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'pictures',
				[
					'maxitems' => 20,
					'foreign_types' => [
						'0' => [
							'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;tx_theaterinfo_playpicture,
								--palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
							'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;tx_theaterinfo_playpicture,
								--palette--;;filePalette'
						],
					],
				],
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		],
		'state' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.state',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => [
					[
						'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.state.I.0',
						'0'
					],
					[
						'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.state.I.1',
						'1'
					],
					[
						'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.state.I.2',
						'2'
					],
					[
						'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.state.I.3',
						'3'
					],
				],
				'size' => 1,
				'maxitems' => 1,
			]
		],
		'roles' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.roles',
			'config' => [
				'type' => 'inline',
				'foreign_table' => 'tx_theaterinfo_domain_model_role',
				'foreign_field' => 'playuid',
				'foreign_class' => 'Tx_Theaterinfo_Domain_Model_Role',
				'maxitems' => 100,
				'appearance' => [
					'collapseAll' => 1,
					'expandSingle' => 1,
				],
			]
		],
		'hide_roles' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.hide_roles',
			'config' => [
				'type' => 'check',
				'default' => '0'
			]
		],
		'helpers' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.helpers',
			'config' => [
				'type' => 'inline',
				'foreign_table' => 'tx_theaterinfo_domain_model_helper',
				'foreign_field' => 'playuid',
				'foreign_class' => 'Tx_Theaterinfo_Domain_Model_Helper',
				'maxitems' => 100,
				'appearance' => [
					'collapseAll' => 1,
					'expandSingle' => 1,
				],
			]
		],
		'hide_helpers' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.hide_helpers',
			'config' => [
				'type' => 'check',
				'default' => '0'
			]
		],
		'advance_sale' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.advance_sale',
			'config' => [
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			]
		],
	],
	'types' => [
		'0' => [
			'showitem' => '
				--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.properties, title, hidden, author, time_sort, time_display, state, teaser,
				--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.action, action,
				--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.pictures, logo, pictures,
				--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.roles, hide_roles, roles,
				--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.helpers, hide_helpers, helpers,
				--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.advance_sale, advance_sale
			',
			'columnsOverrides' => [
				'action' => [
					'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
				],
				'advance_sale' => [
					'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
				],
			]
		],
	],
];