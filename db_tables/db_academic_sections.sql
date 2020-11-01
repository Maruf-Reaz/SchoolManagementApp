/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.30-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `db_academic_sections` (
	`id` int (11),
	`name` varchar (2295),
	`catagory` varchar (2295),
	`capacity` varchar (2295),
	`class_id` int (11),
	`teacher_id` int (11),
	`note` varchar (2295)
); 
insert into `db_academic_sections` (`id`, `name`, `catagory`, `capacity`, `class_id`, `teacher_id`, `note`) values('1','A','Male','40','1','1','Doing Well');
insert into `db_academic_sections` (`id`, `name`, `catagory`, `capacity`, `class_id`, `teacher_id`, `note`) values('2','B','Male','40','1','1','Best');
insert into `db_academic_sections` (`id`, `name`, `catagory`, `capacity`, `class_id`, `teacher_id`, `note`) values('3','C','Female','44','2','4','Avg');
insert into `db_academic_sections` (`id`, `name`, `catagory`, `capacity`, `class_id`, `teacher_id`, `note`) values('4','A','Male','33','2','3','Good');
insert into `db_academic_sections` (`id`, `name`, `catagory`, `capacity`, `class_id`, `teacher_id`, `note`) values('5','A','Male','40','3','1','Great');
insert into `db_academic_sections` (`id`, `name`, `catagory`, `capacity`, `class_id`, `teacher_id`, `note`) values('6','B','Male','40','3','2','Doing Fine');
insert into `db_academic_sections` (`id`, `name`, `catagory`, `capacity`, `class_id`, `teacher_id`, `note`) values('7','C','Male','40','3','3','Doing Not so great');
insert into `db_academic_sections` (`id`, `name`, `catagory`, `capacity`, `class_id`, `teacher_id`, `note`) values('8','D','Female','40','3','4','Doing extremely great');
