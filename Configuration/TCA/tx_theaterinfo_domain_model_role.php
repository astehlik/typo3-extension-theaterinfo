<?php
return [
	'ctrl' => [
		'title' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_role',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',
		'delete' => 'deleted',
		'enablecolumns' => [
			'disabled' => 'hidden',
		],
		'iconfile' => 'EXT:theaterinfo/Resources/Public/Icons/icon_tx_theaterinfo_domain_model_role.gif',
		'searchFields' => 'name',
	],
	'interface' => [
		'showRecordFieldList' => 'hidden,name,actors,picture,insert_spacer,playuid'
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
		'name' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_role.name',
			'config' => [
				'type' => 'input',
				'size' => '30',
			]
		],
		'picture' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_role.picture',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'picture',
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
		'insert_spacer' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_role.insert_spacer',
			'config' => [
				'type' => 'check',
			]
		],
		'playuid' => [
			'config' => [
				'type' => 'passthrough',
			]
		],
		'actors' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_role.actors',
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
	],
	'types' => [
		'0' => ['showitem' => 'name, hidden, actors, picture, insert_spacer, playuid']
	],
];