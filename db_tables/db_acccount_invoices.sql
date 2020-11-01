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

/*Table structure for table `db_account_invoices` */

DROP TABLE IF EXISTS `db_account_invoices`;

CREATE TABLE `db_account_invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `fee_type_id` int(11) DEFAULT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `discount_in_percentage` float DEFAULT NULL,
  `amount_after_discount` float DEFAULT NULL,
  `paid_amount` float DEFAULT NULL,
  `due_amount` float DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `db_account_invoices` */

insert  into `db_account_invoices`(`id`,`student_id`,`class_id`,`section_id`,`fee_type_id`,`invoice_number`,`amount`,`discount_in_percentage`,`amount_after_discount`,`paid_amount`,`due_amount`,`payment_status`,`date`) values 
(14,1,1,1,18,'20181006085011111',5000,0,5000,0,5000,3,'2018-10-06'),
(15,9,3,9,30,'20181006115627399',2000,5,1900,1900,0,1,'2018-10-06'),
(16,8,2,8,26,'20181007074542288',5000,0,5000,3000,2000,2,'2018-10-07'),
(17,12,3,12,26,'2018100708002031212',5000,5,4750,4000,750,2,'2018-10-07'),
(18,4,1,3,26,'20181008070513134',5000,0,5000,3000,2000,2,'2018-10-08');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
