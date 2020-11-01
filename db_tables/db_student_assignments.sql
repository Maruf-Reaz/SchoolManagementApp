/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.32-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `db_student_assignments` (
	`id` int (11),
	`student_id` int (11),
	`section_id` int (11),
	`roll_no` varchar (765),
	`class_id` int (11)
); 
insert into `db_student_assignments` (`id`, `student_id`, `section_id`, `roll_no`, `class_id`) values('1','2','1','1','1');
insert into `db_student_assignments` (`id`, `student_id`, `section_id`, `roll_no`, `class_id`) values('2','3','2','1','1');
insert into `db_student_assignments` (`id`, `student_id`, `section_id`, `roll_no`, `class_id`) values('3','4','4','1','1');
insert into `db_student_assignments` (`id`, `student_id`, `section_id`, `roll_no`, `class_id`) values('4','8','1','12','1');
insert into `db_student_assignments` (`id`, `student_id`, `section_id`, `roll_no`, `class_id`) values('5','9','2','2','1');
insert into `db_student_assignments` (`id`, `student_id`, `section_id`, `roll_no`, `class_id`) values('6','10','4','5','1');
