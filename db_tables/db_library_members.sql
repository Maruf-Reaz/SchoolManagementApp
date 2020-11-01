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

/*Table structure for table `db_library_members` */

DROP TABLE IF EXISTS `db_library_members`;

CREATE TABLE `db_library_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `library_id` varchar(255) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `library_fee` float DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `db_library_members` */

insert  into `db_library_members`(`id`,`library_id`,`join_date`,`library_fee`,`student_id`) values 
(19,'20180301','2018-09-15',115,1),
(22,'20180251','2018-09-17',325,5),
(23,'2018501','2018-10-01',100,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
