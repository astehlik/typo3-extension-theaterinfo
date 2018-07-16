#
# Table structure for table 'tx_theaterinfo_domain_model_cardorder'
#
CREATE TABLE tx_theaterinfo_domain_model_cardorder (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,

	address varchar(255) DEFAULT '' NOT NULL,
	city varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	firstname varchar(255) DEFAULT '' NOT NULL,
	lastname varchar(255) DEFAULT '' NOT NULL,
	notes text NOT NULL,
	rows int(11) unsigned DEFAULT '0' NOT NULL,
	zip varchar(255) DEFAULT '' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_theaterinfo_domain_model_cardorderdate'
#
CREATE TABLE tx_theaterinfo_domain_model_cardorderdate (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,

	date_and_time datetime NOT NULL,
	description text,
	is_sold_out tinyint(3) DEFAULT '0' NOT NULL,
	location varchar(255) DEFAULT '' NOT NULL,
	parent_play int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY parent_play (parent_play)
);

#
# Table structure for table 'tx_theaterinfo_domain_model_cardorderplay'
#
CREATE TABLE tx_theaterinfo_domain_model_cardorderplay (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	enable_hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	enable_starttime int(11) unsigned DEFAULT '0' NOT NULL,
	enable_endtime int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	dates int(11) unsigned DEFAULT '0' NOT NULL,
	description mediumtext,
	description_mail mediumtext,
	label varchar(255) DEFAULT '' NOT NULL,
	price_normal double DEFAULT '0.0' NOT NULL,
	price_normal_description mediumtext,
	price_reduced double DEFAULT '0.0' NOT NULL,
	price_reduced_description mediumtext,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_theaterinfo_domain_model_cardorderrow'
#
CREATE TABLE tx_theaterinfo_domain_model_cardorderrow (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,

	amount_normal int(11) unsigned DEFAULT '0' NOT NULL,
	amount_reduced int(11) unsigned DEFAULT '0' NOT NULL,
	parent_order int(11) unsigned DEFAULT '0' NOT NULL,
	play_date int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY parent_order (parent_order)
);

#
# Table structure for table 'tx_theaterinfo_domain_model_actor'
#
CREATE TABLE tx_theaterinfo_domain_model_actor (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,

	birthday int(11) unsigned DEFAULT '0' NOT NULL,
	company varchar(150) DEFAULT '',
	favorite_role int(11) DEFAULT '0' NOT NULL,
	firstname varchar(150) DEFAULT '',
	gender int(11) DEFAULT '0' NOT NULL,
	hobbys text,
	job varchar(255) DEFAULT '' NOT NULL,
	lastname varchar(150) DEFAULT '',
	management_memberships int(11) unsigned DEFAULT '0' NOT NULL,
	management_reasons text,
	member_since int(11) unsigned DEFAULT '0' NOT NULL,
	picture text,
	type int(11) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_theaterinfo_domain_model_managementmembership'
#
CREATE TABLE tx_theaterinfo_domain_model_managementmembership (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,

	position int(11) unsigned DEFAULT '0' NOT NULL,
	actor int(11) unsigned DEFAULT '0' NOT NULL,
	enddate int(11) unsigned DEFAULT '0' NOT NULL,
	startdate int(11) unsigned DEFAULT '0' NOT NULL,
	type varchar(255) DEFAULT '' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_theaterinfo_domain_model_managementposition'
#
CREATE TABLE tx_theaterinfo_domain_model_managementposition (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	memberships int(11) unsigned DEFAULT '0' NOT NULL,
	show_in_overview tinyint(3) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_theaterinfo_domain_model_helpertype'
#
CREATE TABLE tx_theaterinfo_domain_model_helpertype (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	jobtitle tinytext,
	icon text,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_theaterinfo_domain_model_role'
#
CREATE TABLE tx_theaterinfo_domain_model_role (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	sorting int(10) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name tinytext,
	picture text,
	insert_spacer tinyint(3) DEFAULT '0' NOT NULL,
	playuid int(11) DEFAULT '0' NOT NULL,
	actors text,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_theaterinfo_domain_model_play'
#
CREATE TABLE tx_theaterinfo_domain_model_play (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	title tinytext,
	author text,
	time_sort int(11) DEFAULT '0' NOT NULL,
	time_display tinytext,
	teaser text,
	action text,
	logo text,
	pictures text,
	state int(11) DEFAULT '0' NOT NULL,
	roles text,
	hide_roles tinyint(4) DEFAULT '0' NOT NULL,
	helpers text,
	hide_helpers tinyint(4) DEFAULT '0' NOT NULL,
	advance_sale text,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_theaterinfo_domain_model_helper'
#
CREATE TABLE tx_theaterinfo_domain_model_helper (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	sorting int(10) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	helpertype text,
	actors text,
	insert_spacer tinyint(3) DEFAULT '0' NOT NULL,
	playuid int(11) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);
