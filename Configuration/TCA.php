<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_theaterinfo_domain_model_actor'] = array (
	'ctrl' => $TCA['tx_theaterinfo_domain_model_actor']['ctrl'],
	'interface' => array (
		'showRecordFieldList' => 'hidden,firstname,lastname,picture,management_position,management_reasons,favorite_role,birthday,hobbys,job,member_since'
	),
	'feInterface' => $TCA['tx_theaterinfo_domain_model_actor']['feInterface'],
	'columns' => array (
		'hidden' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'type' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.type',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.type.I.0', '0'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.type.I.1', '1'),
				),
				'size' => 1,
				'maxitems' => 1,
			),
		),
		'gender' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.gender',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.gender.I.0', '0'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.gender.I.1', '1'),
				),
				'size' => 1,
				'maxitems' => 1,
			),
		),
		'firstname' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.firstname',
			'config' => array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'lastname' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.lastname',
			'config' => array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'company' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.company',
			'config' => array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'picture' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.picture',
			'config' => array (
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
		'management_position' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.management_position',
			'config' => array (
				'type' => 'inline',
				'size' => 1,
				'maxitems' => 1,
			),
		),
		'management_reasons' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.management_reasons',
			'config' => array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'favorite_role' => array (
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.favorite_role',
            'config' => array (
                'type' => 'select',
                'foreign_table' => 'tx_theaterinfo_domain_model_role',
				'foreign_table_where' => 'AND FIND_IN_SET(\'###THIS_UID###\', tx_theaterinfo_domain_model_role.actors) ORDER BY name',
				'items' => array (
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.favorite_role.I.none', '0'),
				),
                'size' => 5,
                'minitems' => 0,
                'maxitems' => 1,
			),
		),
		'birthday' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.birthday',
			'config' => array (
				'type' => 'input',
				'eval' => 'date',
			),
		),
		'hobbys' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.hobbys',
			'config' => array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			),
		),
		'job' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.job',
			'config' => array (
				'type' => 'input',
				'eval' => 'trim',
			),
		),
		'member_since' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.member_since',
			'config' => array (
				'type' => 'input',
				'eval' => 'date',
			),
		),
	),
	'types' => array (
		'0' => array('showitem' => 'type, firstname;;1;;1-1-1, lastname, management_position, management_reasons, favorite_role, birthday, hobbys, job, member_since, picture'),
		'1' => array('showitem' => 'type, company;;1;;1-1-1, picture')
	),
	'palettes' => array (
		'1' => array('showitem' => 'hidden')
	)
);

$TCA['tx_theaterinfo_domain_model_management_position'] = array (
	'columns' => array (
		'type' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.management_position',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.management_position.I.none', 'none'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.management_position.I.first_leader', 'first_leader'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.management_position.I.second_leader', 'second_leader'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.management_position.I.treasurer', 'treasurer'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.management_position.I.reporter', 'reporter'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.management_position.I.technical_leader', 'technical_leader'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.management_position.I.backstage_leader', 'backstage_leader'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.management_position.I.public_relations', 'public_relations'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_actor.management_position.I.accounts_auditor', 'accounts_auditor'),
				),
				'size' => 1,
				'maxitems' => 1,
			),
		),
	),
	'startdate' => array (
	),
	'enddate' => array (
	),
	'actor' => array (
		'config' => array (
			'type' => 'passthrough',
		)
	),
);

$TCA['tx_theaterinfo_domain_model_helpertype'] = array (
	'ctrl' => $TCA['tx_theaterinfo_domain_model_helpertype']['ctrl'],
	'interface' => array (
		'showRecordFieldList' => 'hidden,jobtitle,icon'
	),
	'feInterface' => $TCA['tx_theaterinfo_domain_model_helpertype']['feInterface'],
	'columns' => array (
		'hidden' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'jobtitle' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_helpertype.jobtitle',
			'config' => array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'icon' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_helpertype.icon',
			'config' => array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
				'uploadfolder' => 'uploads/tx_theaterinfo',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
	),
	'types' => array (
		'0' => array('showitem' => 'jobtitle;;1;;1-1-1, icon')
	),
	'palettes' => array (
		'1' => array('showitem' => 'hidden')
	)
);



$TCA['tx_theaterinfo_domain_model_role'] = array (
	'ctrl' => $TCA['tx_theaterinfo_domain_model_role']['ctrl'],
	'interface' => array (
		'showRecordFieldList' => 'hidden,name,actors,picture,insert_spacer,playuid'
	),
	'feInterface' => $TCA['tx_theaterinfo_domain_model_role']['feInterface'],
	'columns' => array (
		'hidden' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'name' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_role.name',
			'config' => array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'picture' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_role.picture',
			'config' => array (
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
		'insert_spacer' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_role.insert_spacer',
			'config' => array (
				'type' => 'check',
			)
		),
		'playuid' => array (
			'config' => array (
				'type' => 'passthrough',
			)
		),
		'actors' => array (
            'exclude' => 0,
            'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_role.actors',
            'config' => array (
                'type' => 'select',
                'foreign_table' => 'tx_theaterinfo_domain_model_actor',
                'foreign_table_where' => 'AND tx_theaterinfo_domain_model_actor.pid=###CURRENT_PID### ORDER BY tx_theaterinfo_domain_model_actor.lastname, tx_theaterinfo_domain_model_actor.firstname',
				'foreign_class' => 'Tx_Theaterinfo_Domain_Model_Actor',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 100,
				'wizards' => array(
                    '_PADDING'  => 2,
                    '_VERTICAL' => 1,
                    'add' => array(
                        'type'   => 'script',
                        'title'  => 'Create new record',
                        'icon'   => 'add.gif',
                        'params' => array(
                            'table'    => 'tx_theaterinfo_domain_model_actor',
                            'pid'      => '###CURRENT_PID###',
                            'setValue' => 'prepend'
                        ),
                        'script' => 'wizard_add.php',
                    ),
                    'list' => array(
                        'type'   => 'script',
                        'title'  => 'List',
                        'icon'   => 'list.gif',
                        'params' => array(
                            'table' => 'tx_theaterinfo_domain_model_actor',
                            'pid'   => '###CURRENT_PID###',
                        ),
                        'script' => 'wizard_list.php',
                    ),
                    'edit' => array(
                        'type'                     => 'popup',
                        'title'                    => 'Edit',
                        'script'                   => 'wizard_edit.php',
                        'popup_onlyOpenIfSelected' => 1,
                        'icon'                     => 'edit2.gif',
                        'JSopenParams'             => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                   	),
				),

            )
        ),
	),
	'types' => array (
		'0' => array('showitem' => 'name;;1;;1-1-1, actors, picture, insert_spacer, playuid')
	),
	'palettes' => array (
		'1' => array('showitem' => 'hidden')
	)
);



$TCA['tx_theaterinfo_domain_model_play'] = array (
	'ctrl' => $TCA['tx_theaterinfo_domain_model_play']['ctrl'],
	'interface' => array (
		'showRecordFieldList' => 'hidden,title,author,time_sort,time_display,teaser,action,logo,pictures,state,roles,hide_roles,helpers,hide_helpers,advance_sale',
	),
	'feInterface' => $TCA['tx_theaterinfo_domain_model_play']['feInterface'],
	'columns' => array (
		'hidden' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'title' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.title',
			'config' => array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'author' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.author',
			'config' => array (
                'type' => 'text',
                'cols' => '30',
                'rows' => '5',
            )
		),
		'time_sort' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.time_sort',
			'config' => array (
				'type'     => 'input',
				'size'     => '12',
				'max'      => '20',
				'eval'     => 'datetime',
				'checkbox' => '0',
				'default'  => '0'
			)
		),
		'time_display' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.time_display',
			'config' => array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'teaser' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.teaser',
			'config' => array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'action' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.action',
			'config' => array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'wizards' => array(
					'_PADDING' => 2,
					'RTE' => array(
						'notNewRecords' => 1,
						'RTEonly'       => 1,
						'type'          => 'script',
						'title'         => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
						'icon'          => 'wizard_rte2.gif',
						'script'        => 'wizard_rte.php',
					),
				),
			)
		),
		'logo' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.logo',
			'config' => array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
				'uploadfolder' => 'uploads/tx_theaterinfo/',
				'show_thumbs' => 1,
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'pictures' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.pictures',
			'config' => array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
				'uploadfolder' => 'uploads/tx_theaterinfo/',
				'show_thumbs' => 1,
				'size' => 5,
				'minitems' => 0,
				'maxitems' => 10,
			)
		),
		'state' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.state',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.state.I.0', '0'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.state.I.1', '1'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.state.I.2', '2'),
					array('LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.state.I.3', '3'),
				),
				'size' => 1,
				'maxitems' => 1,
			)
		),
		'roles' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.roles',
			'config' => array (
				'type' => 'inline',
				'foreign_table' => 'tx_theaterinfo_domain_model_role',
				'foreign_field' => 'playuid',
				'foreign_class' => 'Tx_Theaterinfo_Domain_Model_Role',
				'maxitems' => 100,
				'appearance' => Array(
		          'collapseAll' => 1,
		          'expandSingle' => 1,
		        ),
			)
		),
		'hide_roles' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.hide_roles',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'helpers' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.helpers',
			'config' => array (
				'type' => 'inline',
				'foreign_table' => 'tx_theaterinfo_domain_model_helper',
				'foreign_field' => 'playuid',
				'foreign_class' => 'Tx_Theaterinfo_Domain_Model_Helper',
				'maxitems' => 100,
				'appearance' => Array(
		          'collapseAll' => 1,
		          'expandSingle' => 1,
		        ),
			)
		),
		'hide_helpers' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.hide_helpers',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'advance_sale' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.advance_sale',
			'config' => array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'wizards' => array(
					'_PADDING' => 2,
					'RTE' => array(
						'notNewRecords' => 1,
						'RTEonly'       => 1,
						'type'          => 'script',
						'title'         => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
						'icon'          => 'wizard_rte2.gif',
						'script'        => 'wizard_rte.php',
					),
				),
			)
		),
	),
	'types' => array (
		'0' => array('showitem' => '--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.properties, title;;1;;1-1-1, author;;;;3-3-3, time_sort, time_display, state, teaser,
									--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.action, action;;;richtext[]:rte_transform[mode=ts_css|imgpath=uploads/tx_theaterinfo/rte/],
									--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.pictures, logo, pictures,
									--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.roles, hide_roles, roles,
									--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.helpers, hide_helpers, helpers,
									--div--;LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_play.advance_sale, advance_sale;;;richtext[]:rte_transform[mode=ts_css|imgpath=uploads/tx_theaterinfo/rte/]'),
	),
	'palettes' => array (
		'1' => array('showitem' => 'hidden')
	)
);



$TCA['tx_theaterinfo_domain_model_helper'] = array (
	'ctrl' => $TCA['tx_theaterinfo_domain_model_helper']['ctrl'],
	'interface' => array (
		'showRecordFieldList' => 'hidden,helpertype,actors,insert_spacer,playuid'
	),
	'feInterface' => $TCA['tx_theaterinfo_domain_model_helper']['feInterface'],
	'columns' => array (
		'hidden' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'helpertype' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_helper.helpertype',
			'config' => array (
				'type' => 'select',
                'foreign_table' => 'tx_theaterinfo_domain_model_helpertype',
                'foreign_table_where' => 'AND tx_theaterinfo_domain_model_helpertype.pid=###CURRENT_PID### ORDER BY tx_theaterinfo_domain_model_helpertype.jobtitle',
				'foreign_class' => 'Tx_Theaterinfo_Domain_Model_Helpertype',
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
				'wizards' => array(
                    '_PADDING'  => 2,
                    '_HORIZONTAL' => 1,
                    'add' => array(
                        'type'   => 'script',
                        'title'  => 'Create new record',
                        'icon'   => 'add.gif',
                        'params' => array(
                            'table'    => 'tx_theaterinfo_domain_model_helpertype',
                            'pid'      => '###CURRENT_PID###',
                            'setValue' => 'prepend'
                        ),
                        'script' => 'wizard_add.php',
                    ),
                    'list' => array(
                        'type'   => 'script',
                        'title'  => 'List',
                        'icon'   => 'list.gif',
                        'params' => array(
                            'table' => 'tx_theaterinfo_domain_model_helpertype',
                            'pid'   => '###CURRENT_PID###',
                        ),
                        'script' => 'wizard_list.php',
                    ),
                    'edit' => array(
                        'type'                     => 'popup',
                        'title'                    => 'Edit',
                        'script'                   => 'wizard_edit.php',
                        'popup_onlyOpenIfSelected' => 1,
                        'icon'                     => 'edit2.gif',
                        'JSopenParams'             => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                   	),
				),
			)
		),
		'actors' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_helper.actors',
            'config' => array (
                'type' => 'select',
                'foreign_table' => 'tx_theaterinfo_domain_model_actor',
                'foreign_table_where' => 'AND tx_theaterinfo_domain_model_actor.pid=###CURRENT_PID### ORDER BY tx_theaterinfo_domain_model_actor.lastname, tx_theaterinfo_domain_model_actor.firstname',
				'foreign_class' => 'Tx_Theaterinfo_Domain_Model_Actor',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 100,
				'wizards' => array(
                    '_PADDING'  => 2,
                    '_VERTICAL' => 1,
                    'add' => array(
                        'type'   => 'script',
                        'title'  => 'Create new record',
                        'icon'   => 'add.gif',
                        'params' => array(
                            'table'    => 'tx_theaterinfo_domain_model_actor',
                            'pid'      => '###CURRENT_PID###',
                            'setValue' => 'prepend'
                        ),
                        'script' => 'wizard_add.php',
                    ),
                    'list' => array(
                        'type'   => 'script',
                        'title'  => 'List',
                        'icon'   => 'list.gif',
                        'params' => array(
                            'table' => 'tx_theaterinfo_domain_model_actor',
                            'pid'   => '###CURRENT_PID###',
                        ),
                        'script' => 'wizard_list.php',
                    ),
                    'edit' => array(
                        'type'                     => 'popup',
                        'title'                    => 'Edit',
                        'script'                   => 'wizard_edit.php',
                        'popup_onlyOpenIfSelected' => 1,
                        'icon'                     => 'edit2.gif',
                        'JSopenParams'             => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                   	),
				),
            )
		),
		'insert_spacer' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:theaterinfo/Resources/Private/Language/locallang_db.xml:tx_theaterinfo_domain_model_helper.insert_spacer',
			'config' => array (
				'type' => 'check',
			)
		),
		'playuid' => array (
			'config' => array (
				'type' => 'passthrough',
			)
		),
	),
	'types' => array (
		'0' => array('showitem' => 'helpertype;;1;;1-1-1, actors, insert_spacer, playuid')
	),
	'palettes' => array (
		'1' => array('showitem' => 'hidden')
	)
);
?>