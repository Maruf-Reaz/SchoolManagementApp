/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.30-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `db_academic_classes` (
	`id` int (11),
	`name` varchar (2295),
	`numeric_value` int (11),
	`teacher_id` int (11),
	`note` varchar (2295)
); 
insert into `db_academic_classes` (`id`, `name`, `numeric_value`, `teacher_id`, `note`) values('1','One','1','1','Good');
insert into `db_academic_classes` (`id`, `name`, `numeric_value`, `teacher_id`, `note`) values('2','Two','2','2','Average');
insert into `db_academic_classes` (`id`, `name`, `numeric_value`, `teacher_id`, `note`) values('3','Three','3','1','Good');
insert into `db_academic_classes` (`id`, `name`, `numeric_value`, `teacher_id`, `note`) values('4','Four','4','3','Great');
