# phpMyAdmin MySQL-Dump
# version 2.2.0
# http://phpwizard.net/phpMyAdmin/
# http://phpmyadmin.sourceforge.net/ (download page)
#
# Host: localhost
# Generation Time: November 7, 2001, 2:01 pm
# Server version: 3.23.39
# PHP Version: 4.0.6
# Database : `selectdemo`
# --------------------------------------------------------

#
# Table structure for table `makes`
#

CREATE TABLE makes (
  makeID tinyint(3) unsigned NOT NULL auto_increment,
  makeName varchar(20) NOT NULL default '',
  PRIMARY KEY  (makeID)
) TYPE=MyISAM;

#
# Dumping data for table `makes`
#

INSERT INTO makes VALUES (1,'Ford');
INSERT INTO makes VALUES (2,'Pontiac');
INSERT INTO makes VALUES (3,'Chevrolet');
INSERT INTO makes VALUES (4,'Hyundai');
INSERT INTO makes VALUES (5,'Porsche');
# --------------------------------------------------------

#
# Table structure for table `models`
#

CREATE TABLE models (
  modelID tinyint(3) unsigned NOT NULL auto_increment,
  modelName varchar(20) NOT NULL default '',
  makeID tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (modelID)
) TYPE=MyISAM;

#
# Dumping data for table `models`
#

INSERT INTO models VALUES (1,'Escort',1);
INSERT INTO models VALUES (2,'Mustang',1);
INSERT INTO models VALUES (3,'Windstar',1);
INSERT INTO models VALUES (4,'Sunfire',2);
INSERT INTO models VALUES (5,'Firebird',2);
INSERT INTO models VALUES (6,'Montana',2);
INSERT INTO models VALUES (7,'Cavalier',3);
INSERT INTO models VALUES (8,'Camaro',3);
INSERT INTO models VALUES (9,'Venture',3);
INSERT INTO models VALUES (10,'Elantra',4);
INSERT INTO models VALUES (11,'Sonata',4);
INSERT INTO models VALUES (12,'Carrera',5);
# --------------------------------------------------------

#
# Table structure for table `options`
#

CREATE TABLE options (
  optionID tinyint(3) unsigned NOT NULL auto_increment,
  optionName varchar(20) NOT NULL default '',
  modelID tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (optionID)
) TYPE=MyISAM;

#
# Dumping data for table `options`
#

INSERT INTO options VALUES (1,'Air Conditioning',1);
INSERT INTO options VALUES (2,'ABS Brakes',1);
INSERT INTO options VALUES (3,'Cup Holder',1);
INSERT INTO options VALUES (4,'Racing Stripes',2);
INSERT INTO options VALUES (5,'Spoiler',2);
INSERT INTO options VALUES (6,'Mag Wheels',2);
INSERT INTO options VALUES (7,'Cargo Cover',3);
INSERT INTO options VALUES (8,'Bed Seat',3);
INSERT INTO options VALUES (9,'Roof Rack',3);
INSERT INTO options VALUES (10,'CD Player',4);
INSERT INTO options VALUES (11,'Spoiler',4);
INSERT INTO options VALUES (12,'2-Tone Paint',4);
INSERT INTO options VALUES (13,'Tinted Windows',5);
INSERT INTO options VALUES (14,'Toilet Brush',6);
INSERT INTO options VALUES (15,'Socket Wrench',6);
INSERT INTO options VALUES (16,'Fan Belt',7);
INSERT INTO options VALUES (17,'Muffler',7);
INSERT INTO options VALUES (18,'V8',8);
INSERT INTO options VALUES (19,'Fuel Injection',8);
INSERT INTO options VALUES (20,'Driver Side Door',9);
INSERT INTO options VALUES (21,'Radio',10);
INSERT INTO options VALUES (22,'Seats',11);
INSERT INTO options VALUES (23,'Mirrors',11);
INSERT INTO options VALUES (24,'Whale Tail',12);

  