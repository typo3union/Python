#
# Table structure for table 'tx_property_domain_model_propertytype'
#
CREATE TABLE tx_property_domain_model_propertytype (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,
	sorting varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_property_domain_model_property'
#
CREATE TABLE tx_property_domain_model_property (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,
	subtitle varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
	price varchar(255) DEFAULT '' NOT NULL,
	running_cost varchar(255) DEFAULT '' NOT NULL,
	object_type tinyint(1) unsigned DEFAULT '0' NOT NULL,
	property_type int(11) unsigned DEFAULT '0',
	floor_area varchar(255) DEFAULT '' NOT NULL,
	land_area varchar(255) DEFAULT '' NOT NULL,
	building_type int(11) unsigned DEFAULT '0',
	year_of_construction varchar(255) DEFAULT '' NOT NULL,
	zustand varchar(255) DEFAULT '' NOT NULL,
	available varchar(255) DEFAULT '' NOT NULL,
	floor varchar(255) DEFAULT '' NOT NULL,
	room varchar(255) DEFAULT '' NOT NULL,
	heating varchar(255) DEFAULT '' NOT NULL,
	ground varchar(255) DEFAULT '' NOT NULL,
	basement varchar(255) DEFAULT '' NOT NULL,	
	balcony varchar(255) DEFAULT '' NOT NULL,	
	garage varchar(255) DEFAULT '' NOT NULL,
	terrase varchar(255) DEFAULT '' NOT NULL,
	parking varchar(255) DEFAULT '' NOT NULL,
	elevator varchar(255) DEFAULT '' NOT NULL,
	transport varchar(255) DEFAULT '' NOT NULL,
	expiration varchar(255) DEFAULT '' NOT NULL,
	energy varchar(255) DEFAULT '' NOT NULL,
	charging varchar(255) DEFAULT '' NOT NULL,
	hwb varchar(255) DEFAULT '' NOT NULL,
	commission varchar(255) DEFAULT '' NOT NULL,
				
	images varchar(255) DEFAULT '' NOT NULL,
	pdf varchar(255) DEFAULT '' NOT NULL,	
	
	street varchar(255) DEFAULT '' NOT NULL,
	city varchar(255) DEFAULT '' NOT NULL,
	lage varchar(255) DEFAULT '' NOT NULL,
	plz varchar(255) DEFAULT '' NOT NULL,
	country varchar(255) DEFAULT '' NOT NULL,
	
	sorting varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_property_domain_model_buildingtype'
#
CREATE TABLE tx_property_domain_model_buildingtype (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,
	sorting varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_property_domain_model_inquirer'
#
CREATE TABLE tx_property_domain_model_inquirer (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	address varchar(255) DEFAULT '' NOT NULL,
	telephone varchar(255) DEFAULT '' NOT NULL,
	message varchar(255) DEFAULT '' NOT NULL,
	ip varchar(255) DEFAULT '' NOT NULL,
	property varchar(255) DEFAULT '' NOT NULL,
	sorting varchar(255) DEFAULT '' NOT NULL,
	

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

