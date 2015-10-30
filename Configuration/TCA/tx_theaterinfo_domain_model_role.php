<?php
return array(
	'ctrl' => array(
		'title' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_role',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'iconfile' => 'EXT:theaterinfo/Resources/Public/Icons/icon_tx_theaterinfo_domain_model_role.gif',
	),
	'interface' => array(
		'showRecordFieldList' => 'hidden,name,actors,picture,insert_spacer,playuid'
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
		'name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_role.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
			)
		),
		'picture' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_role.picture',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
				'uploadfolder' => 'uploads/tx_theaterinfo',
				'show_thumbs' => 1,
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'insert_spacer' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_role.insert_spacer',
			'config' => array(
				'type' => 'check',
			)
		),
		'playuid' => array(
			'config' => array(
				'type' => 'passthrough',
			)
		),
		'actors' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_role.actors',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'tx_theaterinfo_domain_model_actor',
				'foreign_table_where' => 'ORDER BY tx_theaterinfo_domain_model_actor.lastname, tx_theaterinfo_domain_model_actor.firstname',
				'foreign_class' => 'Tx_Theaterinfo_Domain_Model_Actor',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 100,
				'wizards' => array(
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'module' => array(
							'name' => 'wizard_edit',
						),
						'popup_onlyOpenIfSelected' => 1,
						'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif',
						'JSopenParams' => 'width=800,height=600,status=0,menubar=0,scrollbars=1'
					),
				),

			)
		),
	),
	'types' => array(
		'0' => array('showitem' => 'name, hidden, actors, picture, insert_spacer, playuid')
	),
);