<?php
return array(
	'ctrl' => array(
		'title' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementposition',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',
		'delete' => 'deleted',
		'iconfile' => 'EXT:theaterinfo/Resources/Public/Icons/icon_tx_theaterinfo_domain_model_managementposition.gif',
		'searchFields' => 'name',
	),
	'interface' => array(
		'showRecordFieldList' => 'name,showInOverview,memberships'
	),
	'columns' => array(
		'name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementposition.name',
			'config' => array(
				'type' => 'input',
			),
		),
		'show_in_overview' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementposition.show_in_overview',
			'config' => array(
				'type' => 'check',
			),
		),
		'memberships' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_managementposition.memberships',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_theaterinfo_domain_model_managementmembership',
				'foreign_field' => 'position',
			),
		),
	),
	'types' => array(
		'0' => array('showitem' => 'name, showInOverview, memberships'),
	),
);