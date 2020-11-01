/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.32-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `db_student_deactivations` (
	`id` int (11),
	`student_id` int (11),
	`deactivation_date` date 
); 
insert into `db_student_deactivations` (`id`, `student_id`, `deactivation_date`) values('1','5','2018-11-14');
insert into `db_student_deactivations` (`id`, `student_id`, `deactivation_date`) values('2','6','0000-00-00');
insert into `db_student_deactivations` (`id`, `student_id`, `deactivation_date`) values('3','7','0000-00-00');
insert into `db_student_deactivations` (`id`, `student_id`, `deactivation_date`) values('4','2','2018-11-19');
