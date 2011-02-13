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
	type int(11) DEFAULT '0' NOT NULL,
	gender int(11) DEFAULT '0' NOT NULL,
	firstname varchar(150) DEFAULT '',
	lastname varchar(150) DEFAULT '',
	company varchar(150) DEFAULT '',
	picture text,
	
	PRIMARY KEY (uid),
	KEY parent (pid),
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
	action text,
	logo text,
	pictures text,
	state int(11) DEFAULT '0' NOT NULL,
	roles text,
	helpers text,
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
