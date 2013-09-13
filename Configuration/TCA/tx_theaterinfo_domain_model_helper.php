<?php
return array(
	'ctrl' => array(
		'title' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_helper',
		'label' => 'helpertype',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('theaterinfo') . 'Resources/Public/Icons/icon_tx_theaterinfo_domain_model_helper.gif',
	),
	'interface' => array(
		'showRecordFieldList' => 'hidden,helpertype,actors,insert_spacer,playuid'
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
		'helpertype' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_helper.helpertype',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_theaterinfo_domain_model_helpertype',
				'foreign_table_where' => 'ORDER BY tx_theaterinfo_domain_model_helpertype.jobtitle',
				'foreign_class' => 'Tx_Theaterinfo_Domain_Model_Helpertype',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'wizards' => array(
					'_PADDING' => 2,
					'_HORIZONTAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'popup_onlyOpenIfSelected' => 1,
						'icon' => 'edit2.gif',
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
					),
				),
			)
		),
		'actors' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_helper.actors',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_theaterinfo_domain_model_actor',
				'foreign_table_where' => 'ORDER BY tx_theaterinfo_domain_model_actor.lastname, tx_theaterinfo_domain_model_actor.firstname',
				'foreign_class' => 'Tx_Theaterinfo_Domain_Model_Actor',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 100,
				'wizards' => array(
					'_PADDING' => 2,
					'_VERTICAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'popup_onlyOpenIfSelected' => 1,
						'icon' => 'edit2.gif',
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
					),
				),
			)
		),
		'insert_spacer' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_helper.insert_spacer',
			'config' => array(
				'type' => 'check',
			)
		),
		'playuid' => array(
			'config' => array(
				'type' => 'passthrough',
			)
		),
	),
	'types' => array(
		'0' => array('showitem' => 'helpertype;;1;;1-1-1, actors, insert_spacer, playuid')
	),
	'palettes' => array(
		'1' => array('showitem' => 'hidden')
	)
);
?>