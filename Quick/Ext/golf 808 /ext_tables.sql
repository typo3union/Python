#
# Table structure for table 'tx_golf_domain_model_golf'
#
CREATE TABLE tx_golf_domain_model_golf (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	putting_holes tinyint(1) unsigned DEFAULT '0' NOT NULL,
	name varchar(255) DEFAULT '' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	video_image int(11) unsigned NOT NULL default '0',
	video text NOT NULL,
	hole_image int(11) unsigned NOT NULL default '0',
	par varchar(255) DEFAULT '' NOT NULL,
	hcp varchar(255) DEFAULT '' NOT NULL,
	red varchar(255) DEFAULT '' NOT NULL,
	green varchar(255) DEFAULT '' NOT NULL,
	m_green varchar(255) DEFAULT '' NOT NULL,
	pinposition_image int(11) unsigned NOT NULL default '0',
	slider_images int(11) unsigned NOT NULL default '0',
	content text NOT NULL,
	tx_golf_table text NOT NULL,
	description_title text NOT NULL,
	degree_view text NOT NULL,


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
