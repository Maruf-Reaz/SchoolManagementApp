/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.32-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `db_exam_exam_attendances` (
	`id` int (11),
	`exam_schedule_id` int (11),
	`student_id` int (11),
	`value` int (11)
); 
insert into `db_exam_exam_attendances` (`id`, `exam_schedule_id`, `student_id`, `value`) values('6','1','1','1');
insert into `db_exam_exam_attendances` (`id`, `exam_schedule_id`, `student_id`, `value`) values('7','1','2','1');
insert into `db_exam_exam_attendances` (`id`, `exam_schedule_id`, `student_id`, `value`) values('8','1','3','1');
insert into `db_exam_exam_attendances` (`id`, `exam_schedule_id`, `student_id`, `value`) values('12','3','5','0');
