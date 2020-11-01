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
/*Table structure for table `db_users` */

DROP TABLE IF EXISTS `db_users`;

CREATE TABLE `db_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation_id` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `db_users` */

insert  into `db_users`(`id`,`designation_id`,`role`,`password`,`email`,`username`) values 
(1,1,4,'$2y$10$AAD.l6BJp1fOuawnDwYMG.zF6c8vwAkdpbRkGbozlzh53qDUx9HWS','teacher@mail.com','teacher'),
(2,1,5,'$2y$10$AAD.l6BJp1fOuawnDwYMG.zF6c8vwAkdpbRkGbozlzh53qDUx9HWS','guardian@mail.com','guardian'),
(3,1,3,'$2y$10$AAD.l6BJp1fOuawnDwYMG.zF6c8vwAkdpbRkGbozlzh53qDUx9HWS','headmaster@mail.com','headmaster'),
(4,1,2,'$2y$10$AAD.l6BJp1fOuawnDwYMG.zF6c8vwAkdpbRkGbozlzh53qDUx9HWS','admin@mail.com','admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
