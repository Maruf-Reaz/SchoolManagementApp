/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.32-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `db_mark_marks` (
	`id` int (11),
	`attendance_id` int (11),
	`mark_distribution_id` int (11),
	`total_mark` float ,
	`grade_id` varchar (765),
	`gained_mark` float ,
	`highest_mark` float 
); 
insert into `db_mark_marks` (`id`, `attendance_id`, `mark_distribution_id`, `total_mark`, `grade_id`, `gained_mark`, `highest_mark`) values('1','6','1','67','3','40','55');
insert into `db_mark_marks` (`id`, `attendance_id`, `mark_distribution_id`, `total_mark`, `grade_id`, `gained_mark`, `highest_mark`) values('2','7','1','66','3','35','55');
insert into `db_mark_marks` (`id`, `attendance_id`, `mark_distribution_id`, `total_mark`, `grade_id`, `gained_mark`, `highest_mark`) values('3','8','1','84','1','55','55');
insert into `db_mark_marks` (`id`, `attendance_id`, `mark_distribution_id`, `total_mark`, `grade_id`, `gained_mark`, `highest_mark`) values('4','12','1','0','0','0','100');
insert into `db_mark_marks` (`id`, `attendance_id`, `mark_distribution_id`, `total_mark`, `grade_id`, `gained_mark`, `highest_mark`) values('5','6','2','67','3','6','7');
insert into `db_mark_marks` (`id`, `attendance_id`, `mark_distribution_id`, `total_mark`, `grade_id`, `gained_mark`, `highest_mark`) values('6','7','2','66','3','7','7');
insert into `db_mark_marks` (`id`, `attendance_id`, `mark_distribution_id`, `total_mark`, `grade_id`, `gained_mark`, `highest_mark`) values('7','8','2','84','1','3','7');
insert into `db_mark_marks` (`id`, `attendance_id`, `mark_distribution_id`, `total_mark`, `grade_id`, `gained_mark`, `highest_mark`) values('8','12','2','0','0','0','100');
insert into `db_mark_marks` (`id`, `attendance_id`, `mark_distribution_id`, `total_mark`, `grade_id`, `gained_mark`, `highest_mark`) values('9','6','3','67','3','9','9');
insert into `db_mark_marks` (`id`, `attendance_id`, `mark_distribution_id`, `total_mark`, `grade_id`, `gained_mark`, `highest_mark`) values('10','7','3','66','3','9','9');
insert into `db_mark_marks` (`id`, `attendance_id`, `mark_distribution_id`, `total_mark`, `grade_id`, `gained_mark`, `highest_mark`) values('11','8','3','84','1','7','9');
insert into `db_mark_marks` (`id`, `attendance_id`, `mark_distribution_id`, `total_mark`, `grade_id`, `gained_mark`, `highest_mark`) values('12','12','3','0','0','0','100');
insert into `db_mark_marks` (`id`, `attendance_id`, `mark_distribution_id`, `total_mark`, `grade_id`, `gained_mark`, `highest_mark`) values('13','6','4','67','3','12','19');
insert into `db_mark_marks` (`id`, `attendance_id`, `mark_distribution_id`, `total_mark`, `grade_id`, `gained_mark`, `highest_mark`) values('14','7','4','66','3','15','19');
insert into `db_mark_marks` (`id`, `attendance_id`, `mark_distribution_id`, `total_mark`, `grade_id`, `gained_mark`, `highest_mark`) values('15','8','4','84','1','19','19');
insert into `db_mark_marks` (`id`, `attendance_id`, `mark_distribution_id`, `total_mark`, `grade_id`, `gained_mark`, `highest_mark`) values('16','12','4','0','0','0','100');
