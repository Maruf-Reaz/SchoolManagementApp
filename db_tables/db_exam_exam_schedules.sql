/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.32-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `db_exam_exam_schedules` (
	`id` int (11),
	`exam_id` int (255),
	`class_id` int (11),
	`section_id` int (11),
	`subject_id` int (11),
	`date` varchar (765),
	`from_time` varchar (765),
	`to_time` varchar (765),
	`room_id` varchar (765)
); 
insert into `db_exam_exam_schedules` (`id`, `exam_id`, `class_id`, `section_id`, `subject_id`, `date`, `from_time`, `to_time`, `room_id`) values('1','1','1','1','2','2018-10-12','10:00','12:00','B-101');
insert into `db_exam_exam_schedules` (`id`, `exam_id`, `class_id`, `section_id`, `subject_id`, `date`, `from_time`, `to_time`, `room_id`) values('3','1','2','3','1','2018-10-12','15:00','18:00','A-101');
