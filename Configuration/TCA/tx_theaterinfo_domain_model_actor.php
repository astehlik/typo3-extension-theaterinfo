<?php
return array(
	'ctrl' => array(
		'title' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor',
		'label' => 'lastname',
		'label_userFunc' => 'Sto\\Theaterinfo\\Hooks\\RecordTitleHooks->getActorTitle',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY lastname, firstname',
		'delete' => 'deleted',
		'type' => 'type',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'dividers2tabs' => 1,
		'iconfile' => 'EXT:theaterinfo/Resources/Public/Icons/icon_tx_theaterinfo_domain_model_actor.gif',
	),
	'interface' => array(
		'showRecordFieldList' => 'hidden,gender,firstname,lastname,picture,management_positions,management_reasons,favorite_role,birthday,hobbys,job,member_since'
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'type' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.type',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.type.I.0', '0'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.type.I.1', '1'),
				),
				'size' => 1,
				'maxitems' => 1,
			),
		),
		'gender' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.gender',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.gender.I.0', '0'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.gender.I.1', '1'),
				),
				'size' => 1,
				'maxitems' => 1,
			),
		),
		'firstname' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.firstname',
			'config' => array(
				'type' => 'input',
				'size' => '30',
			)
		),
		'lastname' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.lastname',
			'config' => array(
				'type' => 'input',
				'size' => '30',
			)
		),
		'company' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.company',
			'config' => array(
				'type' => 'input',
				'size' => '30',
			)
		),
		'picture' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.picture',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'picture',
				array(
					'maxitems' => 1,
					'foreign_types' => array(
						'0' => array(
							'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;tx_theaterinfo_cropimage,
								--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
							'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;tx_theaterinfo_cropimage,
								--palette--;;filePalette'
						),
					),
				),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'management_memberships' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.management_memberships',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_theaterinfo_domain_model_managementmembership',
				'foreign_field' => 'actor',
				'maxitems' => 100,
				'appearance' => Array(
					'collapseAll' => 1,
					'expandSingle' => 1,
				),
			),
		),
		'management_reasons' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.management_reasons',
			'config' => array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'favorite_role' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.favorite_role',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_theaterinfo_domain_model_role',
				'foreign_table_where' => 'AND FIND_IN_SET(\'###THIS_UID###\', tx_theaterinfo_domain_model_role.actors) ORDER BY name',
				'items' => array(
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.favorite_role.I.none', '0'),
				),
				'size' => 5,
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'birthday' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.birthday',
			'config' => array(
				'type' => 'input',
				'eval' => 'date',
			),
		),
		'hobbys' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.hobbys',
			'config' => array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			),
		),
		'job' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.job',
			'config' => array(
				'type' => 'input',
				'eval' => 'trim',
			),
		),
		'member_since' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.member_since',
			'config' => array(
				'type' => 'input',
				'eval' => 'date',
			),
		),
	),
	'types' => array(
		'0' => array('showitem' => '
			--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.properties,type, hidden, gender, firstname, lastname, favorite_role, birthday, hobbys, job, member_since, picture,
			--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.management,management_memberships, management_reasons
		'),
		'1' => array('showitem' => 'type, hidden, company, picture')
	),
);