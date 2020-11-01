/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.32-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `db_exam_grades` (
	`id` int (11),
	`grade_name` varchar (765),
	`grade_point` float ,
	`mark_from` int (11),
	`mark_upto` int (11),
	`note` varchar (765)
); 
insert into `db_exam_grades` (`id`, `grade_name`, `grade_point`, `mark_from`, `mark_upto`, `note`) values('1','A+','5','80','100','excellent');
insert into `db_exam_grades` (`id`, `grade_name`, `grade_point`, `mark_from`, `mark_upto`, `note`) values('2','A','4','70','79','Above average');
insert into `db_exam_grades` (`id`, `grade_name`, `grade_point`, `mark_from`, `mark_upto`, `note`) values('3','A-','3','60','69','Average');
insert into `db_exam_grades` (`id`, `grade_name`, `grade_point`, `mark_from`, `mark_upto`, `note`) values('4','B','2','50','59','below average');
insert into `db_exam_grades` (`id`, `grade_name`, `grade_point`, `mark_from`, `mark_upto`, `note`) values('5','F','0','0','50','Failed');
