/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.30-MariaDB : Database - ems_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ems_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ems_db`;

/*Table structure for table `db_account_fee_types` */

DROP TABLE IF EXISTS `db_account_fee_types`;

CREATE TABLE `db_account_fee_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fee_type_name` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `db_account_fee_types` */

insert  into `db_account_fee_types`(`id`,`fee_type_name`,`note`) values 
(18,'Tution Fee[JANUARY]','tution fees for a year'),
(19,'Tution Fee[FEBRUARY]','tution fees for a year'),
(20,'Tution Fee[MARCH]','tution fees for a year'),
(21,'Tution Fee[APRIL]','tution fees for a year'),
(22,'Tution Fee[MAY]','tution fees for a year'),
(23,'Tution Fee[JUNE]','tution fees for a year'),
(24,'Tution Fee[JULY]','tution fees for a year'),
(25,'Tution Fee[AUGUST]','tution fees for a year'),
(26,'Tution Fee[SEPTEMBER]','tution fees for a year'),
(27,'Tution Fee[OCTOBER]','tution fees for a year'),
(28,'Tution Fee[NOVEMBER]','tution fees for a year'),
(29,'Tution Fee[DECEMBER]','tution fees for a year'),
(30,'Library Fee','Library Fee for School Students');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
