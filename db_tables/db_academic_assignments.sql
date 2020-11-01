/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.30-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `db_academic_assignments` (
	`id` int (11),
	`title` varchar (765),
	`deadline` date ,
	`class_id` int (11),
	`subject_id` int (11),
	`file_name` varchar (765),
	`description` varchar (765)
); 
insert into `db_academic_assignments` (`id`, `title`, `deadline`, `class_id`, `subject_id`, `file_name`, `description`) values('10','Assignment on Unit 1','2018-09-20','3','5','An Automatic Attendance Monitoring System using RFID and IOT using Cloud.pdf','Class Assignment 1 for mid');
