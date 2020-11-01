/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.30-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `db_academic_routines` (
	`id` int (11),
	`school_year` varchar (765),
	`class_id` int (11),
	`subject_id` int (11),
	`teacher_id` int (11),
	`day_id` int (11),
	`starting_time` time ,
	`ending_time` time ,
	`room_id` int (11)
); 
insert into `db_academic_routines` (`id`, `school_year`, `class_id`, `subject_id`, `teacher_id`, `day_id`, `starting_time`, `ending_time`, `room_id`) values('1','1','2','1','1','1','11:00:00','12:00:00','2');
insert into `db_academic_routines` (`id`, `school_year`, `class_id`, `subject_id`, `teacher_id`, `day_id`, `starting_time`, `ending_time`, `room_id`) values('2','1','2','1','4','2','10:00:00','12:30:00','2');
insert into `db_academic_routines` (`id`, `school_year`, `class_id`, `subject_id`, `teacher_id`, `day_id`, `starting_time`, `ending_time`, `room_id`) values('3','1','2','1','1','1','01:00:00','02:00:00','1');
insert into `db_academic_routines` (`id`, `school_year`, `class_id`, `subject_id`, `teacher_id`, `day_id`, `starting_time`, `ending_time`, `room_id`) values('4','1','1','3','5','1','12:00:00','01:00:00','1');
insert into `db_academic_routines` (`id`, `school_year`, `class_id`, `subject_id`, `teacher_id`, `day_id`, `starting_time`, `ending_time`, `room_id`) values('5','1','1','3','1','1','12:00:00','01:00:00','1');
insert into `db_academic_routines` (`id`, `school_year`, `class_id`, `subject_id`, `teacher_id`, `day_id`, `starting_time`, `ending_time`, `room_id`) values('6','1','3','5','1','1','08:00:00','11:00:00','1');
insert into `db_academic_routines` (`id`, `school_year`, `class_id`, `subject_id`, `teacher_id`, `day_id`, `starting_time`, `ending_time`, `room_id`) values('8','1','2','1','1','1','09:00:00','10:00:00','2');
insert into `db_academic_routines` (`id`, `school_year`, `class_id`, `subject_id`, `teacher_id`, `day_id`, `starting_time`, `ending_time`, `room_id`) values('9','1','1','2','1','1','10:00:00','11:00:00','2');
insert into `db_academic_routines` (`id`, `school_year`, `class_id`, `subject_id`, `teacher_id`, `day_id`, `starting_time`, `ending_time`, `room_id`) values('10','1','3','6','1','3','10:00:00','11:00:00','2');
insert into `db_academic_routines` (`id`, `school_year`, `class_id`, `subject_id`, `teacher_id`, `day_id`, `starting_time`, `ending_time`, `room_id`) values('11','1','3','5','1','3','08:00:00','09:00:00','2');
insert into `db_academic_routines` (`id`, `school_year`, `class_id`, `subject_id`, `teacher_id`, `day_id`, `starting_time`, `ending_time`, `room_id`) values('12','1','3','6','16','3','09:00:00','10:00:00','2');
insert into `db_academic_routines` (`id`, `school_year`, `class_id`, `subject_id`, `teacher_id`, `day_id`, `starting_time`, `ending_time`, `room_id`) values('13','1','3','6','4','2','08:00:00','08:00:00','2');
insert into `db_academic_routines` (`id`, `school_year`, `class_id`, `subject_id`, `teacher_id`, `day_id`, `starting_time`, `ending_time`, `room_id`) values('14','1','3','6','1','2','10:00:00','11:00:00','1');
