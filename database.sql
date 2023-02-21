# ************************************************************
# Sequel Ace SQL dump
# Version 20046
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.37)
# Database: mymove
# Generation Time: 2023-02-21 15:59:57 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table houses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `houses`;

CREATE TABLE `houses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `area` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `rent` int(11) NOT NULL,
  `available` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `living_room` varchar(255) NOT NULL DEFAULT 'Yes',
  `kitchen` varchar(255) NOT NULL DEFAULT 'Yes',
  `laundry` varchar(255) NOT NULL DEFAULT 'Yes',
  `shower_wc` varchar(255) NOT NULL DEFAULT 'Yes',
  `fire_alarm` varchar(255) NOT NULL DEFAULT 'Yes',
  `security_sys` varchar(255) NOT NULL DEFAULT 'Yes',
  `front_door` varchar(255) NOT NULL DEFAULT 'Yes',
  `glazing` varchar(255) NOT NULL DEFAULT 'Double',
  `telephone` varchar(255) NOT NULL DEFAULT 'Yes',
  `internet` varchar(255) NOT NULL DEFAULT 'Yes',
  `lan` varchar(255) NOT NULL DEFAULT 'No',
  `tv` varchar(255) NOT NULL DEFAULT 'No',
  `deposit` int(11) NOT NULL DEFAULT '100',
  `water` varchar(255) NOT NULL DEFAULT 'Not included',
  `gas` varchar(255) NOT NULL DEFAULT 'Not included',
  `email` varchar(255) NOT NULL DEFAULT 'NA',
  `landlord` varchar(255) NOT NULL,
  `telephone_no` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `houses` WRITE;
/*!40000 ALTER TABLE `houses` DISABLE KEYS */;

INSERT INTO `houses` (`id`, `area`, `address`, `bedrooms`, `rent`, `available`, `living_room`, `kitchen`, `laundry`, `shower_wc`, `fire_alarm`, `security_sys`, `front_door`, `glazing`, `telephone`, `internet`, `lan`, `tv`, `deposit`, `water`, `gas`, `email`, `landlord`, `telephone_no`)
VALUES
	(1,'Lower Great Horton','8 Sherborne Road',3,500,'2023-02-21 15:42:42','Yes','Yes','Yes','Yes','Yes','Yes','Yes','Double','Yes','Yes','No','No',100,'Not included','Not included','NA','Joe Bloggs','12345678910'),
	(2,'Lower Great Horton','12 Grantham Road',5,750,'2023-02-19 15:42:42','Yes','Yes','Yes','Yes','Yes','Yes','Yes','Double','Yes','Yes','No','No',100,'Not included','Not included','NA','Jane Doe','12345678910'),
	(3,'Lister Hills','11 Turner Place',3,450,'2023-02-21 15:43:31','Yes','Yes','Yes','Yes','Yes','Yes','Yes','Double','Yes','Yes','No','No',100,'Not included','Not included','NA','Joe Bloggs','12345678910'),
	(4,'City Centre','5 Tumbling Hill Street',6,900,'2023-02-21 15:44:20','Yes','Yes','Yes','Yes','Yes','Yes','Yes','Double','Yes','Yes','No','No',100,'Not included','Not included','NA','Joe Bloggs','12345678910'),
	(5,'City Centre','Omars',0,999,'2023-02-21 15:44:34','Yes','Yes','Yes','Yes','Yes','Yes','Yes','Double','Yes','Yes','No','No',100,'Not included','Not included','NA','Joe Bloggs','12345678910'),
	(6,'Lidget Green','20 Ashgrove',3,400,'2023-02-21 15:59:35','Yes','Yes','Yes','Yes','Yes','Yes','Yes','Double','Yes','Yes','No','No',100,'Not included','Not included','NA','Joe Bloggs','12345678910');

/*!40000 ALTER TABLE `houses` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
