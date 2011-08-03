<?php

########################################################################
# Extension Manager/Repository config file for ext "theaterinfo".
#
# Auto generated 08-06-2011 09:25
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Theater info',
	'description' => 'Displays information about theater plays, actors and their roles and tasks',
	'category' => 'plugin',
	'author' => 'Alexander Stehlik',
	'author_email' => 'alexander.stehlik.deleteme@googlemail.com',
	'shy' => '',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => 1,
	'createDirs' => 'uploads/tx_theaterinfo/rte/',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => '',
	'version' => '0.0.0',
	'constraints' => array(
		'depends' => array(
		),
		'conflicts' => array(
		),
		'suggests' => array(
			'linkhandler' => '0.3.1-0.0.0',
		),
	),
	'suggests' => array(
	),
	'_md5_values_when_last_written' => 'a:31:{s:12:"ext_icon.gif";s:4:"f078";s:17:"ext_localconf.php";s:4:"76e8";s:14:"ext_tables.php";s:4:"84e2";s:14:"ext_tables.sql";s:4:"3d36";s:37:"Classes/Controller/PlayController.php";s:4:"b75c";s:30:"Classes/Domain/Model/Actor.php";s:4:"74b4";s:31:"Classes/Domain/Model/Helper.php";s:4:"3aec";s:35:"Classes/Domain/Model/Helpertype.php";s:4:"bc33";s:29:"Classes/Domain/Model/Play.php";s:4:"2c4e";s:29:"Classes/Domain/Model/Role.php";s:4:"5743";s:44:"Classes/Domain/Repository/PlayRepository.php";s:4:"7a42";s:21:"Configuration/TCA.php";s:4:"41b9";s:41:"Configuration/FlexForms/flexform_list.xml";s:4:"801a";s:38:"Configuration/TypoScript/constants.txt";s:4:"08d1";s:34:"Configuration/TypoScript/setup.txt";s:4:"efdf";s:40:"Resources/Private/Language/locallang.xml";s:4:"38b6";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"c982";s:38:"Resources/Private/Layouts/default.html";s:4:"5d20";s:42:"Resources/Private/Templates/Play/List.html";s:4:"ef1c";s:42:"Resources/Private/Templates/Play/Show.html";s:4:"37e8";s:65:"Resources/Public/Icons/icon_tx_theaterinfo_domain_model_actor.gif";s:4:"4b8c";s:68:"Resources/Public/Icons/icon_tx_theaterinfo_domain_model_actor__h.gif";s:4:"a4ec";s:66:"Resources/Public/Icons/icon_tx_theaterinfo_domain_model_helper.gif";s:4:"8ab9";s:69:"Resources/Public/Icons/icon_tx_theaterinfo_domain_model_helper__h.gif";s:4:"2d4f";s:70:"Resources/Public/Icons/icon_tx_theaterinfo_domain_model_helpertype.gif";s:4:"7e7e";s:64:"Resources/Public/Icons/icon_tx_theaterinfo_domain_model_play.gif";s:4:"a89f";s:67:"Resources/Public/Icons/icon_tx_theaterinfo_domain_model_play__h.gif";s:4:"7ae7";s:64:"Resources/Public/Icons/icon_tx_theaterinfo_domain_model_role.gif";s:4:"031f";s:67:"Resources/Public/Icons/icon_tx_theaterinfo_domain_model_role__h.gif";s:4:"caa1";s:43:"hooks/class.tx_theaterinfo_hooks_dblist.php";s:4:"4391";s:43:"hooks/class.tx_theaterinfo_hooks_titles.php";s:4:"b365";}',
);

?>