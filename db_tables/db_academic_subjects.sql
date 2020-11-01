/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.30-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `db_academic_subjects` (
	`id` int (11),
	`class_id` int (11),
	`teacher_id` int (11),
	`type` varchar (2295),
	`pass_mark` varchar (2295),
	`final_mark` varchar (2295),
	`subject_name` varchar (2295),
	`subject_author` varchar (2295),
	`subject_code` varchar (2295)
); 
insert into `db_academic_subjects` (`id`, `class_id`, `teacher_id`, `type`, `pass_mark`, `final_mark`, `subject_name`, `subject_author`, `subject_code`) values('1','2','1','mandatory','34','100','English','Imran','110');
insert into `db_academic_subjects` (`id`, `class_id`, `teacher_id`, `type`, `pass_mark`, `final_mark`, `subject_name`, `subject_author`, `subject_code`) values('2','1','2','optional','34','100','Bangla','Imran Khan','101');
insert into `db_academic_subjects` (`id`, `class_id`, `teacher_id`, `type`, `pass_mark`, `final_mark`, `subject_name`, `subject_author`, `subject_code`) values('3','1','3','mandatory','34','100','English','Imran','110');
insert into `db_academic_subjects` (`id`, `class_id`, `teacher_id`, `type`, `pass_mark`, `final_mark`, `subject_name`, `subject_author`, `subject_code`) values('4','1','4','optional','34','100','Latin','Gustavo Frings','111');
insert into `db_academic_subjects` (`id`, `class_id`, `teacher_id`, `type`, `pass_mark`, `final_mark`, `subject_name`, `subject_author`, `subject_code`) values('5','3','2','mandatory','34','100','English','Gustavo Frings','111');
insert into `db_academic_subjects` (`id`, `class_id`, `teacher_id`, `type`, `pass_mark`, `final_mark`, `subject_name`, `subject_author`, `subject_code`) values('6','3','3','mandatory','34','100','Bangla','Imran','110');
