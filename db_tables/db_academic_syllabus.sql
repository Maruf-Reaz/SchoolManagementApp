/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.30-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `db_academic_syllabus` (
	`id` int (11),
	`title` varchar (765),
	`description` varchar (765),
	`class_id` int (11),
	`file_name` varchar (765),
	`user_id` int (11),
	`date` datetime 
); 
insert into `db_academic_syllabus` (`id`, `title`, `description`, `class_id`, `file_name`, `user_id`, `date`) values('13','Bangla 2nd paper','Bangla syllabus for class one','2','Naming Conventions of EMS mvc v1.pdf','1','2018-09-13 17:11:59');
insert into `db_academic_syllabus` (`id`, `title`, `description`, `class_id`, `file_name`, `user_id`, `date`) values('14','English','English syllabus for class Two','2','Enterprise Resource Planning Software.docx','1','2018-09-12 17:53:47');
