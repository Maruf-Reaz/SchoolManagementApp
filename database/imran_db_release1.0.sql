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
/*Table structure for table `db_academic_assignment_sections` */

DROP TABLE IF EXISTS `db_academic_assignment_sections`;

CREATE TABLE `db_academic_assignment_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

/*Data for the table `db_academic_assignment_sections` */

insert  into `db_academic_assignment_sections`(`id`,`assignment_id`,`section_id`) values 
(67,10,5),
(68,10,6),
(69,10,7),
(70,10,8);

/*Table structure for table `db_academic_assignments` */

DROP TABLE IF EXISTS `db_academic_assignments`;

CREATE TABLE `db_academic_assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `db_academic_assignments` */

insert  into `db_academic_assignments`(`id`,`title`,`deadline`,`class_id`,`subject_id`,`file_name`,`description`) values 
(10,'Assignment on Unit 1','2018-09-20',3,5,'An Automatic Attendance Monitoring System using RFID and IOT using Cloud.pdf','Class Assignment 1 for mid');

/*Table structure for table `db_academic_class_sessions` */

DROP TABLE IF EXISTS `db_academic_class_sessions`;

CREATE TABLE `db_academic_class_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `school_years_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `db_academic_class_sessions` */

insert  into `db_academic_class_sessions`(`id`,`class_id`,`school_years_id`,`status`) values 
(1,1,1,1),
(2,2,1,1),
(3,3,1,1),
(4,3,1,1);

/*Table structure for table `db_academic_classes` */

DROP TABLE IF EXISTS `db_academic_classes`;

CREATE TABLE `db_academic_classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `numeric_value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `db_academic_classes` */

insert  into `db_academic_classes`(`id`,`name`,`numeric_value`) values 
(1,'One',1),
(2,'Two',2),
(3,'Three',3),
(4,'Four',4),
(5,'Five',5),
(6,'Six',6),
(7,'Seven',7),
(8,'Eight',8),
(9,'Nine',9),
(10,'Ten',10),
(11,'Eleven',11),
(12,'Twelve',12);

/*Table structure for table `db_academic_routine_sections` */

DROP TABLE IF EXISTS `db_academic_routine_sections`;

CREATE TABLE `db_academic_routine_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `routine_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

/*Data for the table `db_academic_routine_sections` */

insert  into `db_academic_routine_sections`(`id`,`routine_id`,`section_id`) values 
(19,2,4),
(20,2,3),
(21,3,4),
(22,4,1),
(23,4,2),
(24,5,1),
(25,6,5),
(26,6,6),
(36,7,3),
(37,1,4),
(38,1,3),
(39,8,4),
(40,9,1),
(41,10,5),
(42,11,5),
(43,12,5),
(44,13,5),
(45,14,7),
(46,15,5),
(47,16,5);

/*Table structure for table `db_academic_routines` */

DROP TABLE IF EXISTS `db_academic_routines`;

CREATE TABLE `db_academic_routines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_year` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `day_id` int(11) DEFAULT NULL,
  `starting_time` time DEFAULT NULL,
  `ending_time` time DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `db_academic_routines` */

insert  into `db_academic_routines`(`id`,`school_year`,`class_id`,`subject_id`,`teacher_id`,`day_id`,`starting_time`,`ending_time`,`room_id`) values 
(1,'1',2,1,1,1,'11:00:00','12:00:00',2),
(2,'1',2,1,4,2,'10:00:00','12:30:00',2),
(3,'1',2,1,1,1,'01:00:00','02:00:00',1),
(4,'1',1,3,5,1,'12:00:00','01:00:00',1),
(5,'1',1,3,1,1,'12:00:00','01:00:00',1),
(6,'1',3,5,1,1,'08:00:00','11:00:00',1),
(8,'1',2,1,1,1,'09:00:00','10:00:00',2),
(9,'1',1,2,1,1,'10:00:00','11:00:00',2),
(10,'1',3,6,1,3,'10:00:00','11:00:00',2),
(11,'1',3,5,1,3,'08:00:00','09:00:00',2),
(12,'1',3,6,16,3,'09:00:00','10:00:00',2),
(13,'1',3,6,4,2,'08:00:00','08:00:00',2),
(14,'1',3,6,1,2,'10:00:00','11:00:00',1),
(15,'1',3,6,2,6,'10:00:00','11:00:00',4),
(16,'1',3,5,2,6,'11:00:00','12:00:00',4);

/*Table structure for table `db_academic_school_years` */

DROP TABLE IF EXISTS `db_academic_school_years`;

CREATE TABLE `db_academic_school_years` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `db_academic_school_years` */

insert  into `db_academic_school_years`(`id`,`year`) values 
(1,'2018-2019');

/*Table structure for table `db_academic_sections` */

DROP TABLE IF EXISTS `db_academic_sections`;

CREATE TABLE `db_academic_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(765) DEFAULT NULL,
  `catagory` varchar(765) DEFAULT NULL,
  `capacity` varchar(765) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `db_academic_sections` */

insert  into `db_academic_sections`(`id`,`name`,`catagory`,`capacity`,`class_id`,`teacher_id`) values 
(1,'A','Male','40',1,1),
(2,'B','Male','40',1,2),
(3,'C','Female','44',2,3),
(4,'A','Male','33',2,4),
(5,'A','Male','40',3,5),
(6,'B','Male','40',3,6),
(7,'C','Male','40',4,7),
(8,'D','Female','40',4,8);

/*Table structure for table `db_academic_subjects` */

DROP TABLE IF EXISTS `db_academic_subjects`;

CREATE TABLE `db_academic_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `type` varchar(765) DEFAULT NULL,
  `pass_mark` varchar(765) DEFAULT NULL,
  `final_mark` varchar(765) DEFAULT NULL,
  `subject_name` varchar(765) DEFAULT NULL,
  `subject_code` varchar(765) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `db_academic_subjects` */

insert  into `db_academic_subjects`(`id`,`class_id`,`type`,`pass_mark`,`final_mark`,`subject_name`,`subject_code`) values 
(1,1,'mandatory','34','100','English','110'),
(2,1,'mandatory','34','100','Bangla','101'),
(3,2,'mandatory','34','100','English','110'),
(4,2,'mandatory','34','100','Bangla','101'),
(5,3,'mandatory','34','100','English','110'),
(6,3,'mandatory','34','100','Bangla','101'),
(7,4,'mandatory','34','100','English','110'),
(8,4,'mandatory','34','100','Bangla','101');

/*Table structure for table `db_academic_syllabus` */

DROP TABLE IF EXISTS `db_academic_syllabus`;

CREATE TABLE `db_academic_syllabus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `db_academic_syllabus` */

insert  into `db_academic_syllabus`(`id`,`title`,`description`,`class_id`,`file_name`,`user_id`,`date`) values 
(13,'Bangla 2nd paper','Bangla syllabus for class one',2,'Naming Conventions of EMS mvc v1.pdf',1,'2018-12-23 14:30:12'),
(14,'English','English syllabus for class Two',2,'Enterprise Resource Planning Software.docx',1,'2018-09-12 17:53:47');

/*Table structure for table `db_attendance_devices` */

DROP TABLE IF EXISTS `db_attendance_devices`;

CREATE TABLE `db_attendance_devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) DEFAULT NULL,
  `internal_id` int(11) DEFAULT NULL,
  `com_key` int(11) DEFAULT NULL,
  `device_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `soap_port` int(11) DEFAULT NULL,
  `udp_port` int(11) DEFAULT NULL,
  `encoding` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `db_attendance_devices` */

insert  into `db_attendance_devices`(`id`,`ip`,`internal_id`,`com_key`,`device_name`,`description`,`soap_port`,`udp_port`,`encoding`,`status`) values 
(1,'192.168.1.203',1,0,'ZKTeco F18','Front Door',80,4370,'iso8859-1',1),
(2,'192.168.1.205',1,0,'ZKTeco F18','Back Door',80,4370,'utf-8',1),
(3,'192.168.1.201',1,0,'ZKTeco UA500','Middle Order Attendance Device',80,4370,'utf-8',1);

/*Table structure for table `db_attendance_employee_att` */

DROP TABLE IF EXISTS `db_attendance_employee_att`;

CREATE TABLE `db_attendance_employee_att` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `db_attendance_employee_att` */

insert  into `db_attendance_employee_att`(`id`,`role_id`,`designation_id`,`status`,`note`,`datetime`,`user_id`,`updated_at`) values 
(1,4,1,1,'','2018-10-22 00:00:00',1,'2018-10-23 11:25:40'),
(2,4,2,1,'','2018-10-22 00:00:00',1,'2018-10-23 11:25:40'),
(3,4,3,1,'','2018-10-22 00:00:00',1,'2018-10-23 11:25:41'),
(4,4,4,0,'','2018-10-22 00:00:00',1,'2018-10-23 11:25:41'),
(5,4,5,0,'','2018-10-22 00:00:00',1,'2018-10-23 11:25:41'),
(6,4,16,1,'','2018-10-22 00:00:00',1,'2018-10-23 11:25:41'),
(9,4,1,1,'','2018-10-21 00:00:00',1,'2018-10-23 11:25:31'),
(10,4,2,1,'','2018-10-21 00:00:00',1,'2018-10-23 11:25:31'),
(11,4,3,1,'','2018-10-21 00:00:00',1,'2018-10-23 11:25:31'),
(12,4,4,1,'','2018-10-21 00:00:00',1,'2018-10-23 11:25:31'),
(13,4,5,1,'','2018-10-21 00:00:00',1,'2018-10-23 11:25:32'),
(14,4,16,1,'','2018-10-21 00:00:00',1,'2018-10-23 11:25:32'),
(15,4,1,1,'','2018-10-23 00:00:00',1,'2018-10-23 11:25:10'),
(16,4,2,1,'','2018-10-23 00:00:00',1,'2018-10-23 11:25:10'),
(17,4,3,1,'','2018-10-23 00:00:00',1,'2018-10-23 11:25:10'),
(18,4,4,1,'','2018-10-23 00:00:00',1,'2018-10-23 11:25:10'),
(19,4,5,1,'','2018-10-23 00:00:00',1,'2018-10-23 11:25:10'),
(20,4,16,1,'','2018-10-23 00:00:00',1,'2018-10-23 11:25:10');

/*Table structure for table `db_attendance_holidays` */

DROP TABLE IF EXISTS `db_attendance_holidays`;

CREATE TABLE `db_attendance_holidays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `db_attendance_holidays` */

insert  into `db_attendance_holidays`(`id`,`date`,`name`) values 
(1,'0000-03-17','Sheikh Mujibur Rahman\'s Birthday'),
(2,'0000-02-21','Language Martyre\'s Day'),
(3,'0000-03-26','	Independence Day'),
(4,'0000-04-14','Bengali New Year');

/*Table structure for table `db_attendance_log` */

DROP TABLE IF EXISTS `db_attendance_log`;

CREATE TABLE `db_attendance_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pin` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `verify_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `workcode` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `db_attendance_log` */

/*Table structure for table `db_attendance_student_att` */

DROP TABLE IF EXISTS `db_attendance_student_att`;

CREATE TABLE `db_attendance_student_att` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `note` varchar(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=422 DEFAULT CHARSET=latin1;

/*Data for the table `db_attendance_student_att` */

insert  into `db_attendance_student_att`(`id`,`student_id`,`status`,`note`,`datetime`) values 
(1,7,1,'Not well to','2018-10-18 00:00:00'),
(2,8,1,'Good','2018-10-18 00:00:00'),
(3,9,1,'Good','2018-10-18 00:00:00'),
(4,7,1,'Good','2018-10-17 00:00:00'),
(5,8,1,'Good','2018-10-17 00:00:00'),
(6,9,1,'Good','2018-10-17 00:00:00'),
(7,7,1,'','2018-10-20 00:00:00'),
(8,8,1,'','2018-10-20 00:00:00'),
(9,9,1,'','2018-10-20 00:00:00'),
(10,7,0,'Not well to','2018-10-21 00:00:00'),
(11,8,1,'Good','2018-10-21 00:00:00'),
(12,9,2,'Not well to','2018-10-21 00:00:00'),
(13,7,1,'','2018-10-22 00:00:00'),
(14,8,1,'','2018-10-22 00:00:00'),
(15,9,1,'','2018-10-22 00:00:00'),
(16,7,1,'','2018-10-02 00:00:00'),
(17,8,1,'','2018-10-02 00:00:00'),
(18,9,1,'','2018-10-02 00:00:00'),
(19,7,1,'','2018-10-26 00:00:00'),
(20,8,1,'','2018-10-26 00:00:00'),
(21,9,1,'','2018-10-26 00:00:00'),
(22,7,0,'','2018-10-29 00:00:00'),
(23,8,1,'','2018-10-29 00:00:00'),
(24,9,0,'','2018-10-29 00:00:00'),
(25,7,1,'','2018-11-05 00:00:00'),
(26,8,0,'','2018-11-05 00:00:00'),
(27,9,1,'','2018-11-05 00:00:00'),
(28,7,1,'','2018-10-01 00:00:00'),
(29,8,1,'','2018-10-01 00:00:00'),
(30,9,1,'','2018-10-01 00:00:00'),
(31,7,0,'','2018-11-11 00:00:00'),
(32,8,0,'','2018-11-11 00:00:00'),
(33,9,0,'','2018-11-11 00:00:00'),
(34,7,1,'','2018-10-11 00:00:00'),
(35,8,1,'','2018-10-11 00:00:00'),
(36,9,1,'','2018-10-11 00:00:00'),
(37,7,1,'','2018-11-01 00:00:00'),
(38,8,1,'','2018-11-01 00:00:00'),
(39,9,0,'','2018-11-01 00:00:00'),
(40,7,1,'','2018-11-02 00:00:00'),
(41,8,1,'','2018-11-02 00:00:00'),
(42,9,1,'','2018-11-02 00:00:00'),
(43,7,1,'','2018-11-03 00:00:00'),
(44,8,1,'','2018-11-03 00:00:00'),
(45,9,1,'','2018-11-03 00:00:00'),
(46,10,1,'','2018-11-01 00:00:00'),
(47,11,1,'','2018-11-01 00:00:00'),
(48,13,0,'','2018-11-01 00:00:00'),
(49,14,0,'','2018-11-01 00:00:00'),
(50,15,1,'','2018-11-01 00:00:00'),
(51,16,0,'','2018-11-01 00:00:00'),
(52,17,1,'','2018-11-01 00:00:00'),
(53,18,1,'','2018-11-01 00:00:00'),
(54,10,1,'','2018-11-02 00:00:00'),
(55,11,1,'','2018-11-02 00:00:00'),
(56,13,1,'','2018-11-02 00:00:00'),
(57,14,1,'','2018-11-02 00:00:00'),
(58,15,1,'','2018-11-02 00:00:00'),
(59,16,1,'','2018-11-02 00:00:00'),
(60,17,1,'','2018-11-02 00:00:00'),
(61,18,1,'','2018-11-02 00:00:00'),
(62,10,1,'','2018-11-03 00:00:00'),
(63,11,1,'','2018-11-03 00:00:00'),
(64,13,1,'','2018-11-03 00:00:00'),
(65,14,1,'','2018-11-03 00:00:00'),
(66,15,1,'','2018-11-03 00:00:00'),
(67,16,1,'','2018-11-03 00:00:00'),
(68,17,1,'','2018-11-03 00:00:00'),
(69,18,1,'','2018-11-03 00:00:00'),
(70,7,1,'','2018-11-04 00:00:00'),
(71,8,1,'','2018-11-04 00:00:00'),
(72,9,1,'','2018-11-04 00:00:00'),
(73,10,1,'','2018-11-04 00:00:00'),
(74,11,1,'','2018-11-04 00:00:00'),
(75,13,0,'','2018-11-04 00:00:00'),
(76,14,1,'','2018-11-04 00:00:00'),
(77,15,1,'','2018-11-04 00:00:00'),
(78,16,0,'','2018-11-04 00:00:00'),
(79,17,1,'','2018-11-04 00:00:00'),
(80,18,1,'','2018-11-04 00:00:00'),
(81,10,0,'','2018-11-05 00:00:00'),
(82,11,0,'','2018-11-05 00:00:00'),
(83,13,1,'','2018-11-05 00:00:00'),
(84,14,1,'','2018-11-05 00:00:00'),
(85,15,0,'','2018-11-05 00:00:00'),
(86,16,1,'','2018-11-05 00:00:00'),
(87,17,1,'','2018-11-05 00:00:00'),
(88,18,0,'','2018-11-05 00:00:00'),
(89,7,1,'','2018-11-06 00:00:00'),
(90,8,1,'','2018-11-06 00:00:00'),
(91,9,1,'','2018-11-06 00:00:00'),
(92,10,1,'','2018-11-06 00:00:00'),
(93,11,1,'','2018-11-06 00:00:00'),
(94,13,1,'','2018-11-06 00:00:00'),
(95,14,1,'','2018-11-06 00:00:00'),
(96,15,1,'','2018-11-06 00:00:00'),
(97,16,1,'','2018-11-06 00:00:00'),
(98,17,1,'','2018-11-06 00:00:00'),
(99,18,1,'','2018-11-06 00:00:00'),
(100,7,0,'','2018-10-06 00:00:00'),
(101,8,0,'','2018-10-06 00:00:00'),
(102,9,0,'','2018-10-06 00:00:00'),
(103,10,0,'','2018-10-06 00:00:00'),
(104,11,0,'','2018-10-06 00:00:00'),
(105,12,0,'','2018-10-06 00:00:00'),
(106,13,0,'','2018-10-06 00:00:00'),
(107,14,0,'','2018-10-06 00:00:00'),
(108,15,0,'','2018-10-06 00:00:00'),
(109,16,0,'','2018-10-06 00:00:00'),
(110,17,0,'','2018-10-06 00:00:00'),
(111,18,0,'','2018-10-06 00:00:00'),
(112,19,0,'','2018-10-06 00:00:00'),
(113,20,0,'','2018-10-06 00:00:00'),
(114,12,2,'','2018-11-01 00:00:00'),
(115,19,1,'','2018-11-01 00:00:00'),
(116,20,1,'','2018-11-01 00:00:00'),
(117,10,0,'','2018-10-01 00:00:00'),
(118,11,0,'','2018-10-01 00:00:00'),
(119,12,1,'','2018-10-01 00:00:00'),
(120,13,1,'','2018-10-01 00:00:00'),
(121,14,1,'','2018-10-01 00:00:00'),
(122,15,0,'','2018-10-01 00:00:00'),
(123,16,1,'','2018-10-01 00:00:00'),
(124,17,1,'','2018-10-01 00:00:00'),
(125,18,1,'','2018-10-01 00:00:00'),
(126,19,1,'','2018-10-01 00:00:00'),
(127,20,1,'','2018-10-01 00:00:00'),
(128,10,1,'','2018-10-02 00:00:00'),
(129,11,1,'','2018-10-02 00:00:00'),
(130,12,1,'','2018-10-02 00:00:00'),
(131,13,1,'','2018-10-02 00:00:00'),
(132,14,1,'','2018-10-02 00:00:00'),
(133,15,1,'','2018-10-02 00:00:00'),
(134,16,1,'','2018-10-02 00:00:00'),
(135,17,1,'','2018-10-02 00:00:00'),
(136,18,1,'','2018-10-02 00:00:00'),
(137,19,1,'','2018-10-02 00:00:00'),
(138,20,1,'','2018-10-02 00:00:00'),
(139,12,1,'','2018-11-03 00:00:00'),
(140,19,1,'','2018-11-03 00:00:00'),
(141,20,1,'','2018-11-03 00:00:00'),
(142,7,1,'','2018-10-04 00:00:00'),
(143,8,1,'','2018-10-04 00:00:00'),
(144,9,1,'','2018-10-04 00:00:00'),
(145,10,1,'','2018-10-04 00:00:00'),
(146,11,1,'','2018-10-04 00:00:00'),
(147,12,1,'','2018-10-04 00:00:00'),
(148,13,1,'','2018-10-04 00:00:00'),
(149,14,1,'','2018-10-04 00:00:00'),
(150,15,1,'','2018-10-04 00:00:00'),
(151,16,1,'','2018-10-04 00:00:00'),
(152,17,1,'','2018-10-04 00:00:00'),
(153,18,1,'','2018-10-04 00:00:00'),
(154,19,1,'','2018-10-04 00:00:00'),
(155,20,1,'','2018-10-04 00:00:00'),
(156,7,1,'','2018-10-03 00:00:00'),
(157,8,1,'','2018-10-03 00:00:00'),
(158,9,1,'','2018-10-03 00:00:00'),
(159,10,1,'','2018-10-03 00:00:00'),
(160,11,1,'','2018-10-03 00:00:00'),
(161,12,1,'','2018-10-03 00:00:00'),
(162,13,1,'','2018-10-03 00:00:00'),
(163,14,1,'','2018-10-03 00:00:00'),
(164,15,1,'','2018-10-03 00:00:00'),
(165,16,1,'','2018-10-03 00:00:00'),
(166,17,1,'','2018-10-03 00:00:00'),
(167,18,1,'','2018-10-03 00:00:00'),
(168,19,1,'','2018-10-03 00:00:00'),
(169,20,1,'','2018-10-03 00:00:00'),
(170,7,0,'','2018-10-05 00:00:00'),
(171,8,0,'','2018-10-05 00:00:00'),
(172,9,0,'','2018-10-05 00:00:00'),
(173,10,0,'','2018-10-05 00:00:00'),
(174,11,0,'','2018-10-05 00:00:00'),
(175,12,0,'','2018-10-05 00:00:00'),
(176,13,0,'','2018-10-05 00:00:00'),
(177,14,0,'','2018-10-05 00:00:00'),
(178,15,0,'','2018-10-05 00:00:00'),
(179,16,0,'','2018-10-05 00:00:00'),
(180,17,0,'','2018-10-05 00:00:00'),
(181,18,0,'','2018-10-05 00:00:00'),
(182,19,0,'','2018-10-05 00:00:00'),
(183,20,0,'','2018-10-05 00:00:00'),
(184,7,1,'','2018-10-07 00:00:00'),
(185,8,1,'','2018-10-07 00:00:00'),
(186,9,1,'','2018-10-07 00:00:00'),
(187,10,1,'','2018-10-07 00:00:00'),
(188,11,1,'','2018-10-07 00:00:00'),
(189,12,1,'','2018-10-07 00:00:00'),
(190,13,1,'','2018-10-07 00:00:00'),
(191,14,1,'','2018-10-07 00:00:00'),
(192,15,1,'','2018-10-07 00:00:00'),
(193,16,1,'','2018-10-07 00:00:00'),
(194,17,1,'','2018-10-07 00:00:00'),
(195,18,1,'','2018-10-07 00:00:00'),
(196,19,1,'','2018-10-07 00:00:00'),
(197,20,1,'','2018-10-07 00:00:00'),
(198,7,1,'','2018-11-18 00:00:00'),
(199,8,1,'','2018-11-18 00:00:00'),
(200,9,1,'','2018-11-18 00:00:00'),
(201,10,1,'','2018-11-18 00:00:00'),
(202,11,1,'','2018-11-18 00:00:00'),
(203,12,1,'','2018-11-18 00:00:00'),
(204,13,1,'','2018-11-18 00:00:00'),
(205,14,1,'','2018-11-18 00:00:00'),
(206,15,1,'','2018-11-18 00:00:00'),
(207,16,1,'','2018-11-18 00:00:00'),
(208,17,1,'','2018-11-18 00:00:00'),
(209,18,1,'','2018-11-18 00:00:00'),
(210,19,1,'','2018-11-18 00:00:00'),
(211,20,1,'','2018-11-18 00:00:00'),
(212,7,1,'','2018-11-18 00:00:00'),
(213,8,1,'','2018-11-18 00:00:00'),
(214,9,1,'','2018-11-18 00:00:00'),
(215,10,1,'','2018-11-18 00:00:00'),
(216,11,1,'','2018-11-18 00:00:00'),
(217,12,1,'','2018-11-18 00:00:00'),
(218,13,1,'','2018-11-18 00:00:00'),
(219,14,1,'','2018-11-18 00:00:00'),
(220,15,1,'','2018-11-18 00:00:00'),
(221,16,1,'','2018-11-18 00:00:00'),
(222,17,1,'','2018-11-18 00:00:00'),
(223,18,1,'','2018-11-18 00:00:00'),
(224,19,1,'','2018-11-18 00:00:00'),
(225,20,1,'','2018-11-18 00:00:00'),
(226,7,1,'','2018-11-14 00:00:00'),
(227,8,1,'','2018-11-14 00:00:00'),
(228,9,0,'','2018-11-14 00:00:00'),
(229,10,1,'','2018-11-14 00:00:00'),
(230,11,1,'','2018-11-14 00:00:00'),
(231,12,1,'','2018-11-14 00:00:00'),
(232,13,1,'','2018-11-14 00:00:00'),
(233,14,1,'','2018-11-14 00:00:00'),
(234,15,1,'','2018-11-14 00:00:00'),
(235,16,1,'','2018-11-14 00:00:00'),
(236,17,1,'','2018-11-14 00:00:00'),
(237,18,1,'','2018-11-14 00:00:00'),
(238,19,1,'','2018-11-14 00:00:00'),
(239,20,1,'','2018-11-14 00:00:00'),
(240,7,1,NULL,'2018-11-26 00:00:00'),
(241,8,1,NULL,'2018-11-26 00:00:00'),
(242,9,1,NULL,'2018-11-26 00:00:00'),
(243,10,1,NULL,'2018-11-26 00:00:00'),
(244,11,1,NULL,'2018-11-26 00:00:00'),
(245,12,1,NULL,'2018-11-26 00:00:00'),
(246,13,1,NULL,'2018-11-26 00:00:00'),
(247,14,1,NULL,'2018-11-26 00:00:00'),
(248,15,1,NULL,'2018-11-26 00:00:00'),
(249,16,1,NULL,'2018-11-26 00:00:00'),
(250,17,1,NULL,'2018-11-26 00:00:00'),
(251,18,1,NULL,'2018-11-26 00:00:00'),
(252,19,1,NULL,'2018-11-26 00:00:00'),
(253,20,1,NULL,'2018-11-26 00:00:00'),
(254,7,1,NULL,'2018-11-26 00:00:00'),
(255,8,1,NULL,'2018-11-26 00:00:00'),
(256,9,1,NULL,'2018-11-26 00:00:00'),
(257,10,1,NULL,'2018-11-26 00:00:00'),
(258,11,1,NULL,'2018-11-26 00:00:00'),
(259,12,1,NULL,'2018-11-26 00:00:00'),
(260,13,1,NULL,'2018-11-26 00:00:00'),
(261,14,1,NULL,'2018-11-26 00:00:00'),
(262,15,1,NULL,'2018-11-26 00:00:00'),
(263,16,1,NULL,'2018-11-26 00:00:00'),
(264,17,1,NULL,'2018-11-26 00:00:00'),
(265,18,1,NULL,'2018-11-26 00:00:00'),
(266,19,1,NULL,'2018-11-26 00:00:00'),
(267,20,1,NULL,'2018-11-26 00:00:00'),
(268,7,1,NULL,'2018-10-10 00:00:00'),
(269,8,1,NULL,'2018-10-10 00:00:00'),
(270,9,1,NULL,'2018-10-10 00:00:00'),
(271,10,1,NULL,'2018-10-10 00:00:00'),
(272,11,1,NULL,'2018-10-10 00:00:00'),
(273,12,1,NULL,'2018-10-10 00:00:00'),
(274,13,1,NULL,'2018-10-10 00:00:00'),
(275,14,1,NULL,'2018-10-10 00:00:00'),
(276,15,1,NULL,'2018-10-10 00:00:00'),
(277,16,1,NULL,'2018-10-10 00:00:00'),
(278,17,1,NULL,'2018-10-10 00:00:00'),
(279,18,1,NULL,'2018-10-10 00:00:00'),
(280,19,1,NULL,'2018-10-10 00:00:00'),
(281,20,1,NULL,'2018-10-10 00:00:00'),
(282,7,1,NULL,'2018-11-27 00:00:00'),
(283,8,1,NULL,'2018-11-27 00:00:00'),
(284,9,0,NULL,'2018-11-27 00:00:00'),
(285,10,0,NULL,'2018-11-27 00:00:00'),
(286,11,1,NULL,'2018-11-27 00:00:00'),
(287,12,1,NULL,'2018-11-27 00:00:00'),
(288,13,0,NULL,'2018-11-27 00:00:00'),
(289,14,1,NULL,'2018-11-27 00:00:00'),
(290,15,0,NULL,'2018-11-27 00:00:00'),
(291,16,1,NULL,'2018-11-27 00:00:00'),
(292,17,1,NULL,'2018-11-27 00:00:00'),
(293,18,1,NULL,'2018-11-27 00:00:00'),
(294,19,1,NULL,'2018-11-27 00:00:00'),
(295,20,1,NULL,'2018-11-27 00:00:00'),
(296,7,1,NULL,'2018-11-27 00:00:00'),
(297,8,1,NULL,'2018-11-27 00:00:00'),
(298,9,1,NULL,'2018-11-27 00:00:00'),
(299,10,1,NULL,'2018-11-27 00:00:00'),
(300,11,1,NULL,'2018-11-27 00:00:00'),
(301,12,1,NULL,'2018-11-27 00:00:00'),
(302,13,1,NULL,'2018-11-27 00:00:00'),
(303,14,1,NULL,'2018-11-27 00:00:00'),
(304,15,1,NULL,'2018-11-27 00:00:00'),
(305,16,1,NULL,'2018-11-27 00:00:00'),
(306,17,1,NULL,'2018-11-27 00:00:00'),
(307,18,1,NULL,'2018-11-27 00:00:00'),
(308,19,1,NULL,'2018-11-27 00:00:00'),
(309,20,1,NULL,'2018-11-27 00:00:00'),
(310,7,1,NULL,'2018-12-03 00:00:00'),
(311,8,1,NULL,'2018-12-03 00:00:00'),
(312,9,1,NULL,'2018-12-03 00:00:00'),
(313,10,1,NULL,'2018-12-03 00:00:00'),
(314,11,0,NULL,'2018-12-03 00:00:00'),
(315,12,1,NULL,'2018-12-03 00:00:00'),
(316,13,1,NULL,'2018-12-03 00:00:00'),
(317,14,0,NULL,'2018-12-03 00:00:00'),
(318,15,1,NULL,'2018-12-03 00:00:00'),
(319,16,1,NULL,'2018-12-03 00:00:00'),
(320,17,1,NULL,'2018-12-03 00:00:00'),
(321,18,1,NULL,'2018-12-03 00:00:00'),
(322,19,1,NULL,'2018-12-03 00:00:00'),
(323,20,1,NULL,'2018-12-03 00:00:00'),
(324,7,1,NULL,'2018-12-03 00:00:00'),
(325,8,1,NULL,'2018-12-03 00:00:00'),
(326,9,1,NULL,'2018-12-03 00:00:00'),
(327,10,1,NULL,'2018-12-03 00:00:00'),
(328,11,1,NULL,'2018-12-03 00:00:00'),
(329,12,1,NULL,'2018-12-03 00:00:00'),
(330,13,1,NULL,'2018-12-03 00:00:00'),
(331,14,1,NULL,'2018-12-03 00:00:00'),
(332,15,1,NULL,'2018-12-03 00:00:00'),
(333,16,1,NULL,'2018-12-03 00:00:00'),
(334,17,1,NULL,'2018-12-03 00:00:00'),
(335,18,1,NULL,'2018-12-03 00:00:00'),
(336,19,1,NULL,'2018-12-03 00:00:00'),
(337,20,1,NULL,'2018-12-03 00:00:00'),
(338,7,1,NULL,'2018-12-02 00:00:00'),
(339,8,1,NULL,'2018-12-02 00:00:00'),
(340,9,1,NULL,'2018-12-02 00:00:00'),
(341,10,1,NULL,'2018-12-02 00:00:00'),
(342,11,1,NULL,'2018-12-02 00:00:00'),
(343,12,1,NULL,'2018-12-02 00:00:00'),
(344,13,1,NULL,'2018-12-02 00:00:00'),
(345,14,1,NULL,'2018-12-02 00:00:00'),
(346,15,1,NULL,'2018-12-02 00:00:00'),
(347,16,1,NULL,'2018-12-02 00:00:00'),
(348,17,1,NULL,'2018-12-02 00:00:00'),
(349,18,1,NULL,'2018-12-02 00:00:00'),
(350,19,1,NULL,'2018-12-02 00:00:00'),
(351,20,1,NULL,'2018-12-02 00:00:00'),
(352,7,1,NULL,'2018-12-04 00:00:00'),
(353,8,1,NULL,'2018-12-04 00:00:00'),
(354,9,1,NULL,'2018-12-04 00:00:00'),
(355,10,0,NULL,'2018-12-04 00:00:00'),
(356,11,1,NULL,'2018-12-04 00:00:00'),
(357,12,1,NULL,'2018-12-04 00:00:00'),
(358,13,1,NULL,'2018-12-04 00:00:00'),
(359,14,0,NULL,'2018-12-04 00:00:00'),
(360,15,1,NULL,'2018-12-04 00:00:00'),
(361,16,1,NULL,'2018-12-04 00:00:00'),
(362,17,0,NULL,'2018-12-04 00:00:00'),
(363,18,1,NULL,'2018-12-04 00:00:00'),
(364,19,1,NULL,'2018-12-04 00:00:00'),
(365,20,1,NULL,'2018-12-04 00:00:00'),
(366,7,1,NULL,'2018-11-07 00:00:00'),
(367,8,1,NULL,'2018-11-07 00:00:00'),
(368,9,0,NULL,'2018-11-07 00:00:00'),
(369,10,1,NULL,'2018-11-07 00:00:00'),
(370,11,1,NULL,'2018-11-07 00:00:00'),
(371,12,0,NULL,'2018-11-07 00:00:00'),
(372,13,1,NULL,'2018-11-07 00:00:00'),
(373,14,0,NULL,'2018-11-07 00:00:00'),
(374,15,1,NULL,'2018-11-07 00:00:00'),
(375,16,1,NULL,'2018-11-07 00:00:00'),
(376,17,0,NULL,'2018-11-07 00:00:00'),
(377,18,0,NULL,'2018-11-07 00:00:00'),
(378,19,1,NULL,'2018-11-07 00:00:00'),
(379,20,1,NULL,'2018-11-07 00:00:00'),
(380,7,1,NULL,'2018-12-07 00:00:00'),
(381,8,1,NULL,'2018-12-07 00:00:00'),
(382,9,1,NULL,'2018-12-07 00:00:00'),
(383,10,1,NULL,'2018-12-07 00:00:00'),
(384,11,1,NULL,'2018-12-07 00:00:00'),
(385,12,1,NULL,'2018-12-07 00:00:00'),
(386,13,1,NULL,'2018-12-07 00:00:00'),
(387,14,1,NULL,'2018-12-07 00:00:00'),
(388,15,1,NULL,'2018-12-07 00:00:00'),
(389,16,1,NULL,'2018-12-07 00:00:00'),
(390,17,1,NULL,'2018-12-07 00:00:00'),
(391,18,1,NULL,'2018-12-07 00:00:00'),
(392,19,1,NULL,'2018-12-07 00:00:00'),
(393,20,1,NULL,'2018-12-07 00:00:00'),
(394,7,0,NULL,'2018-12-08 00:00:00'),
(395,8,1,NULL,'2018-12-08 00:00:00'),
(396,9,1,NULL,'2018-12-08 00:00:00'),
(397,10,1,NULL,'2018-12-08 00:00:00'),
(398,11,1,NULL,'2018-12-08 00:00:00'),
(399,12,1,NULL,'2018-12-08 00:00:00'),
(400,13,1,NULL,'2018-12-08 00:00:00'),
(401,14,1,NULL,'2018-12-08 00:00:00'),
(402,15,1,NULL,'2018-12-08 00:00:00'),
(403,16,1,NULL,'2018-12-08 00:00:00'),
(404,17,1,NULL,'2018-12-08 00:00:00'),
(405,18,1,NULL,'2018-12-08 00:00:00'),
(406,19,1,NULL,'2018-12-08 00:00:00'),
(407,20,1,NULL,'2018-12-08 00:00:00'),
(408,7,1,NULL,'2018-12-15 00:00:00'),
(409,8,1,NULL,'2018-12-15 00:00:00'),
(410,9,1,NULL,'2018-12-15 00:00:00'),
(411,10,1,NULL,'2018-12-15 00:00:00'),
(412,11,1,NULL,'2018-12-15 00:00:00'),
(413,12,1,NULL,'2018-12-15 00:00:00'),
(414,13,1,NULL,'2018-12-15 00:00:00'),
(415,14,1,NULL,'2018-12-15 00:00:00'),
(416,15,1,NULL,'2018-12-15 00:00:00'),
(417,16,1,NULL,'2018-12-15 00:00:00'),
(418,17,1,NULL,'2018-12-15 00:00:00'),
(419,18,1,NULL,'2018-12-15 00:00:00'),
(420,19,1,NULL,'2018-12-15 00:00:00'),
(421,20,1,NULL,'2018-12-15 00:00:00');

/*Table structure for table `db_attendance_user_info` */

DROP TABLE IF EXISTS `db_attendance_user_info`;

CREATE TABLE `db_attendance_user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pin` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `privilege` int(11) DEFAULT NULL,
  `card` varchar(255) DEFAULT NULL,
  `pin2` int(11) DEFAULT NULL,
  `TZ1` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `registration_no` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `db_attendance_user_info` */

insert  into `db_attendance_user_info`(`id`,`pin`,`name`,`password`,`group_id`,`privilege`,`card`,`pin2`,`TZ1`,`role`,`designation_id`,`registration_no`) values 
(1,1,'Imran Khan','1551',1,14,'271373',1,0,NULL,NULL,NULL),
(2,2,'Abdullah Al Adnan','13801',1,0,'270018',2,0,NULL,NULL,NULL),
(3,3,'Md. Salman Chowdhury','58679',1,0,'243867',3,0,NULL,NULL,NULL),
(4,4,'Sk. Armanul Islam Ador','01621',1,0,'249015',4,0,NULL,NULL,NULL),
(5,5,'Reaz Uddin Maruf','54321',1,0,'0',5,0,NULL,NULL,NULL),
(6,6,'Nayeem Uddin','245409',1,0,'255594',6,0,NULL,NULL,NULL),
(8,7,'Nayeem','12345',1,0,'12345456456',7,0,8,9,'S000003'),
(9,8,'Angelina','12345',1,0,'123456',8,0,8,10,'S000004'),
(10,9,'Jimmy','12345',1,0,'123123',9,0,8,11,'S000005');

/*Table structure for table `db_attendance_user_templates` */

DROP TABLE IF EXISTS `db_attendance_user_templates`;

CREATE TABLE `db_attendance_user_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `finger_id` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `valid` int(11) DEFAULT NULL,
  `template` varchar(2000) DEFAULT NULL,
  `pin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `db_attendance_user_templates` */

insert  into `db_attendance_user_templates`(`id`,`finger_id`,`size`,`valid`,`template`,`pin`) values 
(1,5,1182,1,'TdtTUzIxAAAEmJ8ECAUHCc7QAAAcmWkBAAAAhEUtTJhaAPIPkQCZAH+XJgB1AGEPkgCBmGQPngCFAMQPf5iGAHMPYABPAPGXjACSAHcP6gCXmFsPVQCbACoPlJidAG8PvQBhAHmXAwGmAI4P9QCqmN4PUADFAJAPk5jMAGAO/wAUAJWXkQDUAOIOfQDdmAMPWADbABkPB5ngAJEPgQAhAFyViwDsAFIOvwDrmNkOlQDxAIsOG5jzAEwPrQA2APaWCgH0AJMOOQD+mJAO6gD/AEkOSZgFAUQP3QDDAYeVqQAHAdUOuAANmdMOiAAfAQMO8pggAZMO2ADgASuV4QAlARYNtQA1mTMPzgAyAegN3JgyAbkNqwDxAbmXKQA2AT0PegA9mboO6AA/AVgO8gvDj7/9On+eCE+eVwgGcy/99XNl4h/15Y3VlzuRIWWIgy4EIJMgCY0fPQuhBfF5oH/aYDNuaf1Vjt+WwGPoc7L8pn9KEJeRN/8z/3cTpIe6Fo/zXXrGejdrhBuDCHIRJQDnATKagYf9jumSFBMKPQciVYq6BmuHoZggAT0DRAtFgw3izf9AB6l8RYOlEOQLxP/J+vBeQ5Amcxf72R3UpmVrXASdBWIJJABhnbwDYQjp/S/5DvNCdM/46fj/bELMdOVRixISGA5tZ4OAafYilGfyYeZrZEL4UBpUeKmc7erBXNHq82wa+/byWHctAAR0SBeIjJ2kzQUHkV5iHvv/80MPcJBVmbwHfeWZi7xz+1Xy/+8WIEXEAlyEpQMAa0p6BgYECk93/sLAwsYA0cgNwQQAQFGhwMScAclWCVUNxY1dGIJuwcB1CcWVWZhW/sFDAwCBXmNZDACOX3fAsYHFWIwRAPh0iZdwxFprasIPAQpFk8GubmfAwcEKxaKGZTnA/sE4DMVTgPHAwZDAwMC2DwT6h+0y/1RCBTYPmKOIAEz9wzv+NJ0BVolkwW7GAHwTdcINAFyNpcDEWIVkcwwAiUt3xRx/fAYAkZE4RsWdASqUXoUTxYmR78DDwMLB/0F+Uh4JAC+XXH6sBARPmAlLBgCMXneSWAsAlJv6ODtWxIsBjqBwgMEExPngeXnCCgC5ZIbA5MJOCADBpMP/SKcNALmmfYi1dcSRAUzGXMJptg4EychWeMDBbwXBxlsJAJvL9EE6NRyY/M2WwcGAB8CZWInC/8P/wwWWH5kV1JpcgItWwIRZwsBxwosDxbvdmP4EAODdDIYKBZjcl4h1lgrF/+YIbX2WBADZLYmkmwHb6Qz+BsWx9mj8KgUAePOWw4WcAZb1T3sTxAfxCF55qXjDiQQDBLn3Sf8FALY87fiwCwCi/UnBBcR8WMIEALf/9OMEFC0AU8PBDRAcAYdcx8TDwcb/B8CfnBHuARNOBdXhA4tECRBJCEm7kcafEVAIQE2GwRDAkVanBBCnC4PCxZARfA1GwpC1CBRsHJfAxMe1whCMuzzCw/+RBdXkIY7DLwUQ4SnlhwGIbDU3wsDDwBBwrTF4BBCuOOiBAIgqOTpyAxApQxRYBBDXRBZ0wBDX0CGQUkIAC4YBBJgKRVIAAAAAAAAA',1),
(2,6,908,1,'SsVTUzIxAAADhocECAUHCc7QAAAbh2kBAAAAg6seZ4Y5AP8PPwCRAGCJbQBjAG4PZgCMhoMPwgCQAFEPVYakAEwPeQBsAEyIoACsAHIOHgCshh8PiQC2ACoOkYbKADANnAAaAKyIvADoABIPQgDvhiUP1gDtAFYP0Yb5AJUOOgA8AEeJxQD+ABUPrAAAhykPkgADAd0PyoYLAZcO3QDUAZeJmQATARcOBgAVh5UOrwAdAVAOfoYfAaQPrADuAZWJvwBBAYYPUwBIh44PfQBWAUoPuRXqnKt/B2Tq9FCdz3OjDGMnhBMBdlqUbhQSepcnOXtCXgPjTWFzBTVYgIfR82JFz47kKaaPLaHBwkR/fgQAQibBgYL4jt0boP55gol/gHaKiCv1PANRgrCCu4FcgEEBRxyWozSlnYNdgCEGR4U9gFsSmQAV9gN1mwE9B70Fef2gA56FHAB5htl3Bf9ih6yCNQDdAbiCzgmHfbqNtQDUE82CoPOu8nL6pAPJfOsK4QOz7hL7pH28PyA1AQE5GFCDAYQhg5AJxYsvBYf/xF8DAK00/nkEAGA5dMG9BQPuOwBUAwCm+hDAgQGPQgxWKsMAhMKChMEEADuWa8BGBQA9WGRtzgBr5HbDi8LAw4kOA/Zj+jBG/V2ZEgNUZJbBfGmEB8HCDQ0Aa2dwwgXDwwXAWgMA2mrlwRGGvo6Xd5fBBsJ59cEXAJ+PiQbDwUXCwsDBwcAH/8BFw8HAwv/EBRYDeZeawFGLwgV3w0LBgIQMAFlk1yB6/0P9wAoAl6dQD0wzDwBYqYnBwkdn/6dpDQC9rVNHicDCw8DBBMMGht6uGkQbADiun0bBWn7E/5IEwoPswcL9xAoAYK8TtMHAwVUFABmzIdoFAKC5fdEBBAMBu0ycCQCneRNDR8BmCQCMwIXBx0bEwMDCBwBfwC55w8KYBQCrDR7D/gIApsorwdkBDkmj/sRY/3q8wMEUgnjASQUAWuMqQmQGAIvtIrrCFIcO7J7B/1s6w/1Fw8PCn4h1wADZdht+GgEP+WHCUNvAhsfFxP8HwsEAwcHEBADWPhqAghGWAxNVA9VnBLbCAxCTBxwEAxNnEw/CBBDH0hCAgBGzHxCLwMMQgqQfwsHC/wfVTySmhJYHELAt1cJ1RQUQwkIAWcIQmcsHdmAJEPORd8O4UgkQemAGo13B1EMAC0MBAMULRtQAAAAAAAA=',1),
(3,6,820,1,'Sm1TUzIxAAADLjEECAUHCc7QAAAbL2kBAAAAg9MXZS5YAG8OpwCiAIUhlgB3AAsPoACbLvsPugCZAEkPei6hAHMP4QBjAJUhiwC5AHMP8AC/LmIPcQDDADEPiS7iAGkP2AAoAJ4hZQDvAOgPhAAEL1QPlgAMAckOuS4pAZoPcQDzAT0gYQA4AU0OvwA9LyYNbwBKAfENhy5NAa8NpQCVAaQh0ABWAaYP7mZQWRrrXX4v/UIbVqiWgNOZlYp7C6SnA/qXgKcJWHo1LluBeg4z+0oTfq23AE4PB2vmc0BRfINWgbKOS4K9WNv7OwerC5aTjawDl2f0Fm+SC0w1K6eTdNPS//eAvhb1YBu98EwNMj5YGj0r+Ot89IJWLAwR+VGFvIhWU3RzYvjiA2sPYS2KDWP7FRuUIC0vAPkaaAUAa0QQ7DkLAF5J8D7D/dD/wMBXDACTVPLQ/1f+YMALxY1XKP7+wcH9wvAHA6tbd4VuCwBOWgXR/MP+wP/AjwkDimaG/8VpX88AmFsBKFRZCQBWd4Om/8JzCwCdvgzD0P7B/v9tFMUtl8fB/l3//ks7TFbRDAC3lZDCOsOPRE4HAGiX9zo4/iYBvpwTwE+lCQNboXTBi3MRxd2nucFxwcGRYq8UAxe45Ev9TECB/sPuQg4AecTw7//+aFDACQBtxayEZ+4PAKfFgHxMw0WnEgDz1Z7AvcHCpcODcMEDAD3cHe4NAIbka8EEifxMwBMA2OiiB8DA6sHBwsHCw6PB/F8LAGXq4Cg7/v0DDgBo7+T+9P8hAVoGANvwJ57AFC4r8dpH/8A6/TNv/j7/wFcIxWHxecHAXP4YEOwF1O7B/zgw+8M5wf7R/v/A/8HAOwQTEQtWVwoQnMkD+NP/wMDBegfVlh8t+v43CRCP5FDAgMB7BhCbI9UiwScRuCSgxMICxMfqxQUQmykeO3IGPpgvMMKFD9VyMf41//r8/v06wMPuwwMQkTI0BgYTXTs9xsP8yMEQYxVRPBgQ/ENuwVFAjMOTwm1yOhQTwEqi/mXCjWLDdF4WEPdLqVO1wpa8iFHA/wQQQk8d7MFSQgALQ8QAAyVEUgAAAAAAAA==',2),
(4,5,838,1,'SgNTUzIxAAADQEIECAUHCc7QAAAbQWkBAAAAg+0dKkBeAIwPZgCoAIBPiAB4AAsPUAB4QIgPSQCWAEUPK0C2AHQPjgB+AIZPeADRAHcPawDjQIEOngDhAMYOjkDmAH4OQgAoAHZLMgDxAPUMgwD6QPMMggD7AL8PwUACAYYPlADdAXpPVQAcAfMPXAAuQXgPNQA3ASUOTkA5AfEPjAD9AXdP5ABCAYQPfQBHQXkPMgBGAR0OY0BGAfIPjQCMAXNPygBOAXwP/ABXQVEO/wsjD/IbCTkK/FsFgIfHibTLgYOHCD8HpgzYva737/RHg/4DXVAvhj4LLvgv9Bk2fHx6BS7+uITyxeOK9X1ZBmMIQ8eAgD+FgYBYBbBGQX8h/cICGP4xQet6pgqbha4NPkJTBLIB2Qf7AvFWbAS9AloILAiistyTERKtApwD8rxIBNr8bQu7D6hDHP2mAoYLtPjWyJfoKQICpoMDzrzj+A77mQUw+5xH3HjtcwphKfrOVSEzAQHCFRMDAxktHMQIAFH8CWGAWAUAfDoGmAsDBj8PcMDAWTsNA39FE8Na/2QFNAVAG1MQwMNVzwBrJwL/VVbADcVCUElIR8FHwAbFGGdGWP8KAA5vxUX9g8AoEQAUecbAWgtlwP/C/cDDAJo8B//AahIAw4b5d0tTwMD/wAVBEUAIk/D8V2KJW2NFAUWVfWUSxQeiQ3HBNVhYRdcACu/8aGQ/Wj4FCANst/pR/z0HxZK/RsH/wEYJAE+9gIB5YggAdc+4c2xIAX3RA0vCgAQDNtR0VBEA2h+Qe4D+wv/DwMCvwMZDAUDhd8MHxZniycDEwG4GAELleYDAXQQAoOXMXQhAyPeJwHR2swgDPvl9hP+YBcWG+UBVCAB+/ne2wsOEDBC+BYbCo8H8hP7/rwoQ0taPx7/BwXDCCBBVFXkp/6cFEJgYOD4LUJEcesFpgs4QzWaHXYlqAxBQKn6CBxCdLQNTOgkT1TF6wW/CnMMQd3F1b8MEEIn9dF9MEc88hsF6oX0AULVBesAEEHlEA7zHBhC0R3QFwVRGEYlIdMHAXQUTy0xtWQcQxYt9wSrBBhDYU3oFcVECAQtDAQAAzkVRQAAAAAAAAA==',3),
(5,6,592,1,'SwlTUzIxAAACSksECAUHCc7QAAAaS2kBAAAAgvcSkkpmAH4PogC6AINFgACAAAIPXACPSn8PVQCmACsPvErBAJMPjQAIAHFEmADUABAObQDYSo8OpADuALkOjUr7AFgPqwA7AHtFkQAXAUkOFAAaS6sPmgAsAfsNpko4ASsNrAD8AbVElQBIAToOnH8otjsCWQSmBLuAl81Uh36A2fxcf7hIdu+vf4dzjwVYzWYhJWQi5PP6B9aAhKGXgYD4FYRWNATN8XEm0N4vqWgTufyNIwPtZ0T08xrRczD+9T3IaBRdivH2kXb/prjySI5levB/K1gwhxH/Q1LGICBLAFEPywQAV1KCEwcAmF6JwgSGBEqhYAz+wEbGAGkoccAIAJRnzP5IegQAjGp9wb8IAtR6hsNqdg3FVH26P/8pQMAHxaaCWv4+/gYAgkN9wIuICgCFh/04QUKKCQCTjYB+AEoMSlmk6S7B/zn+/bXBOBEAQ7sn/v0MKyv//1MNxbu90MKGw8CJ/wAKAsPLd5HCwMIFwwtKkMwJ/ijA9ggCw9FwjnMSAPnS2LX/OCouRErPAKOjgsLFwotszwCiunvDw8LCWwcHAuLwIFU4EgD/8tWK//8wLv3CPv/9HAgAp/qDyUZXEUpA+9NAMf45wPy3/8D/wf7AzQCPt1/CwkTCBtWeDFomwAgQkhMT+fW0/j8RENAUbGnCjsDHwMSD/1kGEsYaT8L+//3DEJFRR/9BBhCo2SQ6iAQQnjBAn8YQrXcm/1JCAAuGAQJKCkVSAAAAAAAAAA==',3),
(6,5,1192,1,'TeFTUzIxAAAEoqEECAUHCc7QAAAco2kBAAAAhE8pP6JQAHMPqgCdAIqtNwBcAPMPpwBoonoPuACJAFcPPKKjAGgPdABhAHqssQCpABwPKgC2oiEPtwC5AFAPnaK/ABkPOwAGAGCtmQDIAI8PswDPonEP3wDNAOYPHKLPAOQPvAAlACmtOADtAFEPigDpok8P1wDwAPQPc6L2AB4NuQA/AD6t/AD/ADEPqgAFozkMXAAHAfYOmKIIAU4PhQDLAauuGwARAUQPqQAfo70NhQAfAXgNTqIjAS4PsgDhAUut/AApATsPEQA0o0QPewA0ASUO7aI2AbwPowD4AWatcgBBAQEOTQBFo4EOFgBGAfEPgaJTAeUOYIPi+FetKv1rFzN3pYOb2s6Pl4ifCP7/Ptoy/KcFVgS2hh9NQxIeZyfxUIjCpjOMtvzfjiIHmdpnfFoJrI+nhE5e2/ySgWIXcXtqg+P9DuECWRf2Mqar9cr6koF7l3PcmPdq/A6a9Ab2TUsjtf5hH48a4qbH+BoRvOtIc8pODA86CLbsJwKWWfoTJB+9BZiLRV9we/3nqaJTkCa2EPTJYml73vRPu4IRzQJpi0yHgbIU3kkCLvyPdTNbiO/WAUINaILGWQcPSYrK+fMP/ULAYXUmUXpoglfNmOf1F4Z9kCCFI5weSZyhoUSBF1M2C0s3ZWT85lamb7pSq5EA5UIFoJMeuQMAmvgQxKkBiEAM/8CKwFKnATdDfcLABwQE3UYGNgQAL4l0daYBfk0PZAXFOFXTUgMAylETOwkEmFbt//v/wTthAKKvWRA6BAASchPHBAAyXXRv1wA+/PXA/ET/wTtC+/HBCgCpYRcFZcRiMQgAXmmAB2qHpQFmbgP//gQzDKJfcHrBwf8HhhyiCHjtwP9QPv/F5v//wMH/wDvCxJoJAFuY/TY7Ox2iC5znwP9ABf37YP1WwP7/wDr9xmP+wggAcKBGlsXaBAA0oW3BswYE2qUG//7A/8AAMgRmwIMIAHBifcbefQkAs6oeBcD7XcBMGQAHrCVAPF38wTXC/v+B/m9iBQDytCDABRoEpr3gPUHA/YlF+eDB/sFMCgB+vRrmTjsPAJy/0sD6njT/wvxwGcU+xUs0/yjA/jg6Tzf2/QYANsNnBMB7twGXw5bCwgF1xsTAwv7ClJjNAD5lY8H/kMENxZTMLsCNhGzBBsVyzdiW/w8AnMrS/vpfVv47LwoAv8sCXf3A/P78XsoAd21wh8TDwMEGwMZgw8MHAOHQ5UU3oQEV0VfAC8W/54k0/zDA/QvFNen4k3fCwMMNxU3r7cN0xMGg/wMKBJvwT3l4lQbF2PePNv0OALr9/z37X//A//jBOsERBaMoPwgQXAIV/vlZ+vv9BRD8xjFeoRFuBTfEC9VYDuLEj8PHxf8BBRT8CzfFwcgE1ZkI7ToEEBYTTFcIFL4UQ4vCjQnVahwW+v76+PgdwBDmgEHC+8MKEI4nNWCXw8LHwgbVtCPh/P44AxEB7jH5pxH7LEA9A9XUMuvDAxAaSTAEGQTa13DDwcSCB8PFYMPIxMHBwgHAxmDFwcVSQgDOQwWiAQtFUgAAAAAAAA==',4),
(7,6,1160,1,'TcFTUzIxAAAEgoIECAUHCc7QAAAcg2kBAAAAhK8uyYJEAIoP9wCLABqNuwBvAIMPIgBzgh0PvQB9ANQPn4KAAHYPyQBRAIyNdQCjAGIPzwG1gqQOtgC7AKgOmYLCAE8P/QABADGMagDLAFIPeQDKgjIOewDRAI0PPoLoAEgPxwAsALCPoADrACcOSgD5gjUO0gD/AJsNi4INAb4NhwDdAa+MTgAZAS4OOwAng1IPmwAkAeIL24IrAV0MtADuAcSI6wAsAU0NtQAqgycOjAA3Ae0NsoI2AcwKWQD9AS6MSwA8AScOPAA7g1UPwQBCASEK6YJEAdMNdQCDAa6PqQBHAbALDABIg3ELuABPASIK2YJOAc8MXACUAaOMZwBSAasOaABWg8wMfABUAfIOqoJbAeYOAm+OCCPw75eyB8+f8HRujy/+xpfiD/MDLRKci+6dBmUz9RtzpHuqBtpvrxJfngLtNXKHi6ofTb+II+bnJeeHHKaLJJK3g8cH+Az+cCoFAcl9gxvkzXor+VMgax3m+i+B+Fp9g06OfPaq6Ft2jXgtDlyL1SxbA1MRHRRAjPUZrOzthqF7QwSei2sKnQp1A2P49fy0AmVrLBOXjBqO+fdNm+3fefMlfFj6kX7J/qwDMYDAg+UHbA8Q6BWfzARFBpGGlPx5ASP5mIPRCjADxPU8GPX8nIPcBW0IBHQ9AY2GxefhSwTNtI+JiNyhFJ34AHEEnf38YUJu3f+Vfsn/nQe9g9h28Oqo66Uf/Q7Mjs6QVBq8AEm7nr3M/wgL5TgFgDcawwUAueEcwLwJAJwsA/2eVAeChTB3wwwADEGIQsDBw8DD/7YNBEtGhlmQwlEHBwRTRhD+wMBSxgDz0B/BDQC3a0OExkJ6w8D/CAB7cQhC/EHBDQC2t4DE93F3/xAA47CTdxTAhX7BBgAudhLC/AgAwXsM9v/EQgQA6XseR8sAvf6Cwv3EhHgFXQuCl4F3wmxZqcBhjgHAgRA1wPv9P5cBLYLe/sDy/8V+/sD+wf7+BcDEfP4VADKI4jvBT0P8QUxD/jDCAMEQiJB/BwBwZ2d6Dw4Ac6dgwKqQxn2M/hgA+r9ug8RDwpJ0d8DCBcL79QQAmMReo8gBBUQsMv5K/MKHGATsxtz/M/7+5v76fP/+PP/+bM0A+EU2wEY1CABYyUgPwsH9BAC5D1rMQAoAZsxaw0bCc0MJAGvPU8MFwcf5AgC70jfAzAB+Wk6XjsAGADnnOX3/MAoANuyJwYJBwWALADzthv+PRv/BlwMAojQpxpEB1PvQn8MGmMdDx8DBw8HEBQwEOvyg/f/6+zz4+H79/gUAk//xxMZ8BRDUA1YxxhESi0H/HRBPFH//+n3+/UzA/cA4//lC/f8u//4+6QUU0Rowwl4EEOYdNOwCEPolV8LGEQSlUf4DENsqp8ABknUuIsH7/8YQ6LJOwQQQbzHiJRmSiTSc/v3/Ov4quf/9/v78/jv++nz8wvz+wMLBEJS1GyAEEF064TMAko07KUMFEB1EZkEZUkIAC0PEAASJRFIAAAAAAAA=',4),
(8,5,1056,1,'TVlTUzIxAAAEGh0ECAUHCc7QAAAcG2kBAAAAhMcfohoxAJMPZgCQAJYV3wBfACEPdABuGpcP5gBvAGQPahp0AI4PwQBmAJAVPwCoAIUPWAC9GhYP7AC6ANgPLhq8AIEOfAAMAA8UIgDKAHsOdQDOGpcPPADMALUOlhrMAIoOJwARAHcUYwDVAIAP6ADcGvAOHwDkALYP3xrtACEPSgArAPoVmQDyAI4PzAH/GqEPWwASAbEPGRoZAeAP2QDkAaAVIQAjAc8P/gAiG+8P1AApAe8PLBpUAe0PJ//Od18ZJwTbA/v/SIHTlv6T43Tv9WIHiZtmDTsPqvwq+1cRV38+AwN4mAc6D1sPvY6Jgh8N/5Ky/duLVQiAEhkIfILlj2b18Qvd5iyMiYJqDHsHcZuA/q3yfYIIdvLuJYa8+2EBNHdmn4sSKII1eDCB5RvwhdX7b4DqBadnY4EeDTaRawXP4pqFb4BH/4J7cpC/etP31BN39Gd3NX6fhcMHrfOx+e7lGSMmELt+KJAeCzuPTyGiAUsV1z+bbiA+xAKAOcETAFkeHATAxUA+akZ9CwC0IRpqUlgGALIk38BZDgFJJQb7wLdT+tvAwMD/wMD7CwS+KRrAZFtKzABJNxvBUsFCB8WTKw3DNsATAD/0E0jY/sFSS8L+OmABGjQ3E8BKFsUhOD7FckfBwEcFwEN+BAAtPBfBqRMEB0sWe17CwK1V+9r+BAD1UhqQBwQBVxBoaA8Ar1cTd1bCQMBkBcXiWgBhDwAUYAwFU3Xk/lfADwASrgZH2mTB/0bBBcXpdg3+RRcAEnXMSsTawFdEwf7AOv9g2hcAEoAJU57D+iTBwEbAWBbFDI8cUsD/XP9Mjz9TFgENlwBGWgX/Tx4BFKL9NwnFxaIAVWTBAwAabQPEEwFCqAlXXgcYBAqxA8DBPlg6/8TaOf7AwMD/rA0Eu7kT/8BEwftUABrxuhxgBgDrvfkk/wUA7L4eBcDEDAEnyPpATJ7+xCHBW1sEALQIF0AVAYnRBv7/OkD72lJcBABe0kObBxoi03fBCwCj1gLlR/9G/wUAmtiEnwIAHehwwc8AePKHecBywQfF3+gGOVMMAEzvP/8/VcE7BwDc8OHB+kwTAAr950EEMvrlLkb/FhAPz+372/4t//3/wff/+dr+wFwHEFfUd8fYNhMQIBbrhDs55UBMwRUQFdLaJigywf3AQVEFEhQ+IenA/in//kb62sHCDxA9JC7+KirB/jfCBhAeJCBY/gUQ2CsnkAUUziwtaxIQCYjaLE7+Jzj/UAvVKlX9/v7+Kf/8BREUF1PiPzv//vT/+tvDCRAsVvAH/Prl/MD9DxARnuL6TS///i7CBtVyWpORwwgQgl9SwpJlBxCBZoD/vlJGGgpDAQAAC4BSAAAAAAAA',5),
(9,6,860,1,'ShVTUzIxAAADVlkECAUHCc7QAAAbV2kBAAAAg/sXcVZSAHEPbQBMAPRYhQCXAHUOpACbVl4O1ACYAFkPnFabABgPcgBZAPdYTgCtAN8OmQC2VlsOYADDACEPKVbWANYPpwAgAIxZ0ADmADAPvADsVvEPlADzAKwPU1b1AFUPwwA/AKlZ2QD+ALEPQgAaV04OLwAiAREP1VYrAa0PRAD6AdBZjwBPAT4Okn5EqVoX5ZnBBWSHgteggxFfLWw4aYLVZoUnb2crKKfpcfYhFZSBgYT9utKAg8n/XXh4fO6pUIxBB27zAoCIrJ73WSoO5TNjqtyEgtKjmYvLnsX1/N6de2Ye72bE1vpx3fmxfrcdWl+EghIHAuojY2xE1wGHgmsDU/+EU5J/VgG3l7KD/KTObzOTCRfhIC1XAyEe0wYAQSqD0sEHAI8yfaKMD1aVPYaDwmqyDgPxTZCTdcF4uQoDOFB3wsLBZ5wEAyBT+i8MAG6ScMKXhf9qwAgAYlkQljxUBQC9XdUvDFZxiPAnL/87wMMQDgBklev+7zBHGhcA0paedbzBkCZ6XcIHAFxdYMIKwQsAo5sXOkZJEBkA96CiwKxqj5SCwsDCUFvUAGPn4yn8+8DAO0RXlgsAWLVedK9VGVb6s6fBZMEHwIOUjcJzaf+GzgBe71ty/3tKEcVgvIr+/f78/f46/sOW/8H//8ELxWTBtMH8/v37wDtBCFZcx1pza8CcHAOpxqfAwML+B8CA3pHCe3vBZNIAKYXRPv84wP4+OP0a/kYFACjbk2QPVqLimsbFwwFVZ1MB1ekt/2zOAHm75v34//3AO//Blg0AkPJwxLpzSEoB9/Cra8GvwsAsxMHBX8DAsVYLVk/3U1X/b9AAwq6swcGPxcQFw8OXwVXAwjIG1ZkUcUPABxCRGZXBx6kiBxCDG1OoUQRGiR1Pwf9HwxCUSDHAwI0YEPUg1D5c//8s/P0F/cNpaRQQ1SetBP7ABMPExp5kWsMQk3hBwsKeBhBTLjTHwhsQ4C+wBWjCKsPDxcOTwQTBQKnAPQQQg0eK//5AEdtKqVZSB8G3lMHA/8L/wIMTE4RMpET/wsEHysaXf1TBEhDPn6RHqcPAws3DwgTC/gtTQgALQwHFAAgTUwAAAAAAAAA=',5),
(10,5,836,1,'Sn1TUzIxAAADPj0ECAUHCc7QAAAbP2kBAAAAg+Maqj4+AAAPrgCNAIIxJgBKAIgPkwBIPosPLgBYAMkPjD5kAIQPSQBFAIQxpwCMAIEPdwCQPv8PzACfAEUPSz6sAIEPTABwAAMxkgDAAIEPRwDMPgEPpwDTAEQPUz7VAH4PRwArAHox+QDzAPoPlAD4PnUPngD+ALgPqT4RAQEPYQD2AXMxjQA2AXkPRABOP/oO+wBNAcwP1T5QAYcPrIMefMC9rYNi/0cD4Hz4PiIDaoN7BIYGIrprh5+E3gfvB9S6OwujfDuJ0IQVPav/GXyVgxp+krmXA1sDLIL/BsHBLYK+hD95pIIiPdqGZYKGgTqFoj2HgUoHUQd7gEEwLATV/896PvsURcbzsfzO+oYHLkDP/69+KYYaiDy9L3YW+8f/nIKJNeZ4WYYijpr/9bs2ExML9oFmi4gtFDmqACAzxAHnJBsEAH4tEEwKAwwvEMP9wcCxwBI+GDMDNv97RcD8wcHAAwCBOczBBz6sO/3A/gTFJD4yWAQArEIDjw8DFUoJwf9obwVk/TYBMVcG/2uvEgM5Wg/CN3Z0i8BUMQEwXBfEWTrCwcPBwv9dEwDCZgxTY8L+e/+JhQYDPXUDQv8NAMd6D016W2QNAA5MBmZFWYwGAP+KRnjDMQEIlAZdwLZYaDkBtpUGeEbRAAugB2tfN2LABEn8OwEKqwNoD8QGs0NkW1RzwwXFSLZD/sL9BgBQfQPDaAoAA78Ge4J+Cj8Dv4DAaMGQCgM8ywZ7wf5yzgCF9fw3dP/AwMMASOuBXP8TAPsdekF7RnvD/mUTxAXnREXAwFhWwjpawj0BQ+96wBHF8/C+W8BKXMCBBQQDcvp0hQkAmj6Aw/9vaAoAov7Fwfx5wf/9CRCbx3pRTP4IELAQAJ/8cywQDROQfnCowGb/bhERCSeJOn5X+kt0wBAQP/TwLG1SwP//TwTVXTFJmQ4QZTL6Bf3BYMBDcQcQiPN9wUD+BBBgN22eERI3RoNLfsLBO8NfaAoQhUn3/47A/vr8/wQQfU6ybQQuhFD9wEf/zBCRafzA/1U8BNWFXj10BRD/ZX2JUkE+CkMBAAALgFIAAAAAAAA=',6),
(11,6,834,1,'Sn9TUzIxAAADPEEECAUHCc7QAAAbPWkBAAAAg+EYUjxFAIUPpQCTABIytQBeAI4OhwBhPHwPvwBzAEcOsTx3AAcOVAC8AHgzowCJAIUPgACUPHEPdQCrALIPlzzDAA8PJQAGAOozigDmAH0PBgDkPJkPZwDsADgMZTz4AGgOfgDGAW4yMAAGAVwPTAAEPSIOUQAWAZYOkzwXASEOhQDlAUEy4wApATgPsQBOPdwPUgk7DYYXhrijDZKSiXzkDja2KAfa+UMNsX+uymf9cIc9ehCGrj9bDcf52YInBczE5/Uj+c/142qYNfL2vpUOmvqPcEbSj6/vVhCDXH29ah6Hi1d3DZelrH+B3G8p/7cVI3OkBzVPOgna9hBf7buNBKXiB/kJ0QJYweANAMS3IhwEIvbU+6MWG8zHcpx7v0+PP+BWHDMBAfsZ2cAAchsHwFoLAEnpHMZeZyoHAFctw1ZWMQE5NBOL/gZR/AMLACZM/VE6YMI6AahUDFH+1AAca/s3/1NTwjj/Pj8BPl6DwgrFRmE8W/5bwAQA+2R5RAcAUHWAiQUEA/90E0kMAK2ziXFYwHoMAFh4xcBX/PzC/WsGAHB6E/xUBgBRfHoEwV0wAZ+Eg2J0qv8LPKeKDEL//zkMA6KKgE3+doDBAEOkcWsJAHKsv8HC/cD/hBQA73ychF3+/8L/woQEwGkvASjA6UYwkT78w8HA/woAmQcQ/HrAPhUAE8kiwv0EMcE2QFT/ywBY4fD/J0bCNjoVAyvi3v8ywP86wf/Dwf1T//9TygDA35vAg4zDZ6sGA2nlacHBTg/Fv+urwXeRwsDDhgUD++oXQxQAGyngQm8ywfxV/cGBCQNf72vCwMHCogsDUO79/8D6wKFRCDxr9/3+//wFViw1AWP9YsFxBIAJLHsAfcaR/wR7BSxRBWKLwAnVjAYmY0bAChB6wnTH/ojAwf8GEIoZVUTDCBCUGRoH/cJ4CBCOGjrLOcHCwmEGEHccZ1vBFiwjKNb/T8A6/v3C/DZY/zwG1YkoTMXDxcAGEE8xFXnBBRCMPBqfCBNLYMD7+vPAtRATaWK6/v7/wDn9/dD6/cPEfVKHAAh/AAAAC0VSAAAAAAAA',6);

/*Table structure for table `db_attendance_verify_types` */

DROP TABLE IF EXISTS `db_attendance_verify_types`;

CREATE TABLE `db_attendance_verify_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `db_attendance_verify_types` */

insert  into `db_attendance_verify_types`(`id`,`name`) values 
(1,'Fingerprint'),
(2,'unknown'),
(3,'Password'),
(4,'Card Punch');

/*Table structure for table `db_days` */

DROP TABLE IF EXISTS `db_days`;

CREATE TABLE `db_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `db_days` */

insert  into `db_days`(`id`,`name`) values 
(1,'Saturday'),
(2,'Sunday'),
(3,'Monday'),
(4,'Tuesday'),
(5,'Wednesday'),
(6,'Thursday'),
(7,'Friday');

/*Table structure for table `db_holiday_global_holidays` */

DROP TABLE IF EXISTS `db_holiday_global_holidays`;

CREATE TABLE `db_holiday_global_holidays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `recurrence` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `db_holiday_global_holidays` */

insert  into `db_holiday_global_holidays`(`id`,`name`,`type_id`,`from_date`,`to_date`,`remarks`,`recurrence`) values 
(1,'May Day',1,'2018-05-01','2018-05-01','May Day For the labor',1),
(2,'Christmas',1,'2018-12-25','2018-12-25','Jesus Was Born this Day',1);

/*Table structure for table `db_holiday_holiday_types` */

DROP TABLE IF EXISTS `db_holiday_holiday_types`;

CREATE TABLE `db_holiday_holiday_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `is_group` int(11) DEFAULT NULL,
  `short_form` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `db_holiday_holiday_types` */

insert  into `db_holiday_holiday_types`(`id`,`name`,`is_group`,`short_form`) values 
(1,'Public Holiday',1,'PH'),
(2,'Sick Leave',0,'SL'),
(3,'Casual Leave',0,'CL'),
(4,'Vacation',1,'V');

/*Table structure for table `db_holiday_holidays` */

DROP TABLE IF EXISTS `db_holiday_holidays`;

CREATE TABLE `db_holiday_holidays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `registration_no` varchar(255) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `recurrence` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `db_holiday_holidays` */

insert  into `db_holiday_holidays`(`id`,`name`,`type_id`,`role_id`,`registration_no`,`from_date`,`to_date`,`remarks`,`recurrence`) values 
(1,'Independence Day',1,NULL,'','1971-03-26','1971-03-26','Bangladesh gained independence on this day',1),
(3,NULL,3,8,'S000001','2018-12-08','2018-12-11','Sick Leave',0),
(4,'Victory Day',1,NULL,NULL,'2018-12-16','2018-12-16','Bangladesh gained victory this day',1),
(5,NULL,2,8,'S000003','2018-12-15','2018-12-21','Sick Leave',0),
(6,NULL,2,8,'S0000012','2018-12-03','2018-12-06','Sick Leave',0);

/*Table structure for table `db_holiday_individual_holidays` */

DROP TABLE IF EXISTS `db_holiday_individual_holidays`;

CREATE TABLE `db_holiday_individual_holidays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `registration_no` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `db_holiday_individual_holidays` */

insert  into `db_holiday_individual_holidays`(`id`,`from_date`,`to_date`,`registration_no`,`type_id`,`role_id`) values 
(1,'2018-08-25','2018-08-28','S000001',2,8),
(2,'2018-12-11','2018-12-14','S000001',2,8),
(3,'2018-12-16','2018-12-20','S000004',2,8);

/*Table structure for table `db_roles` */

DROP TABLE IF EXISTS `db_roles`;

CREATE TABLE `db_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `db_roles` */

insert  into `db_roles`(`id`,`name`) values 
(1,'Super_admin'),
(2,'Admin'),
(3,'Headmaster'),
(4,'Teacher'),
(5,'Guardian'),
(6,'Employee'),
(7,'Accountant'),
(8,'Student');

/*Table structure for table `db_rooms` */

DROP TABLE IF EXISTS `db_rooms`;

CREATE TABLE `db_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `db_rooms` */

insert  into `db_rooms`(`id`,`name`) values 
(1,'Room 1'),
(2,'Room 2'),
(3,'Room 3'),
(4,'Room 4');



/*Table structure for table `db_academic_sections_view` */

DROP TABLE IF EXISTS `db_academic_sections_view`;

/*!50001 DROP VIEW IF EXISTS `db_academic_sections_view` */;
/*!50001 DROP TABLE IF EXISTS `db_academic_sections_view` */;

/*!50001 CREATE TABLE  `db_academic_sections_view`(
 `id` int(11) ,
 `section_name` varchar(765) ,
 `class_id` int(11) ,
 `catagory` varchar(765) ,
 `capacity` varchar(765) ,
 `teacher_name` varchar(255) 
)*/;

/*View structure for view db_academic_sections_view */

/*!50001 DROP TABLE IF EXISTS `db_academic_sections_view` */;
/*!50001 DROP VIEW IF EXISTS `db_academic_sections_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_academic_sections_view` AS select `db_academic_sections`.`id` AS `id`,`db_academic_sections`.`name` AS `section_name`,`db_academic_sections`.`class_id` AS `class_id`,`db_academic_sections`.`catagory` AS `catagory`,`db_academic_sections`.`capacity` AS `capacity`,`db_teacher_teachers`.`name` AS `teacher_name` from (`db_academic_sections` join `db_teacher_teachers` on((`db_academic_sections`.`teacher_id` = `db_teacher_teachers`.`id`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
