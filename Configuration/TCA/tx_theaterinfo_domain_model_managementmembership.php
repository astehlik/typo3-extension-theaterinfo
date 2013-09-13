<?php
return array(
	'ctrl' => array(
		'title' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership',
		'label' => 'type',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY startdate',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'starttime' => 'startdate',
			'endtime' => 'enddate',
		),
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('theaterinfo') . 'Resources/Public/Icons/icon_tx_theaterinfo_domain_model_managementmembership.gif',
	),
	'interface' => array(
		'showRecordFieldList' => 'type,position,actor,startdate,enddate'
	),
	'columns' => array(
		'type' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.type',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.type.I.first_leader', 'first_leader'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.type.I.second_leader', 'second_leader'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.type.I.treasurer', 'treasurer'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.type.I.reporter', 'reporter'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.type.I.technical_leader', 'technical_leader'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.type.I.backstage_leader', 'backstage_leader'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.type.I.public_relations', 'public_relations'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.type.I.accounts_auditor', 'accounts_auditor'),
				),
				'size' => 1,
				'maxitems' => 1,
			),
		),
		'position' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.position',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_theaterinfo_domain_model_managementposition',
				'foreign_table_where' => 'ORDER BY tx_theaterinfo_domain_model_managementposition.name',
				'size' => 1,
				'maxitems' => 1,
			),
		),
		'startdate' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.startdate',
			'config' => array(
				'type' => 'input',
				'eval' => 'date',
			),
		),
		'enddate' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.enddate',
			'config' => array(
				'type' => 'input',
				'eval' => 'date',
			),
		),
		'actor' => array(
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementmembership.actor',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_theaterinfo_domain_model_actor',
				'size' => 1,
				'maxitems' => 1,
				'readOnly' => 1,
			)
		),
	),
	'types' => array(
		'0' => array('showitem' => 'type,position,actor,startdate,enddate'),
	),
	'palettes' => array()
);
?>