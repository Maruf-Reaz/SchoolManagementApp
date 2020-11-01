/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.32-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `db_exam_exams` (
	`id` int (11),
	`name` varchar (765),
	`date` varchar (765),
	`note` varchar (765)
); 
insert into `db_exam_exams` (`id`, `name`, `date`, `note`) values('1','1st Term','2018-10-17','First Term Examination');
insert into `db_exam_exams` (`id`, `name`, `date`, `note`) values('2','2nd term','2018-11-14','Second Term Examination');
insert into `db_exam_exams` (`id`, `name`, `date`, `note`) values('3','final Term','2018-12-04','Final Term Examination');
