#
# Table structure for table 'tx_theaterinfo_domain_model_cardorderdate'
#
CREATE TABLE tx_theaterinfo_domain_model_cardorderdate (
	date_and_time datetime NOT NULL,
	parent_play int(11) unsigned DEFAULT '0' NOT NULL,

	KEY parent_play (parent_play)
);

#
# Table structure for table 'tx_theaterinfo_domain_model_cardorderplay'
#
CREATE TABLE tx_theaterinfo_domain_model_cardorderplay (
	dates int(11) unsigned DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_theaterinfo_domain_model_cardorderrow'
#
CREATE TABLE tx_theaterinfo_domain_model_cardorderrow (
	parent_order int(11) unsigned DEFAULT '0' NOT NULL,
	play_date int(11) unsigned DEFAULT '0' NOT NULL,

	KEY parent_order (parent_order)
);

#
# Table structure for table 'tx_theaterinfo_domain_model_actor'
#
CREATE TABLE tx_theaterinfo_domain_model_actor (
	slug varchar(2048),
);

#
# Table structure for table 'tx_theaterinfo_domain_model_managementposition'
#
CREATE TABLE tx_theaterinfo_domain_model_managementposition (
	memberships int(11) unsigned DEFAULT '0' NOT NULL,
	show_in_overview tinyint(3) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_theaterinfo_domain_model_role'
#
CREATE TABLE tx_theaterinfo_domain_model_role (
	playuid int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_theaterinfo_domain_model_play'
#
CREATE TABLE tx_theaterinfo_domain_model_play (
	slug varchar(2048),
);

#
# Table structure for table 'tx_theaterinfo_domain_model_helper'
#
CREATE TABLE tx_theaterinfo_domain_model_helper (
	sorting int(11) DEFAULT '0' NOT NULL
);
