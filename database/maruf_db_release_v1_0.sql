/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.32-MariaDB : Database - ems_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `db_announcement_notices` */

DROP TABLE IF EXISTS `db_announcement_notices`;

CREATE TABLE `db_announcement_notices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(765) DEFAULT NULL,
  `date` varchar(765) DEFAULT NULL,
  `notice` varchar(765) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `db_announcement_notices` */

/*Table structure for table `db_designations` */

DROP TABLE IF EXISTS `db_designations`;

CREATE TABLE `db_designations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `db_designations` */

insert  into `db_designations`(`id`,`role_id`,`designation`) values 
(1,4,'Assist.  Teacher'),
(2,4,'Sr. Teacher');

/*Table structure for table `db_exam_exam_attendances` */

DROP TABLE IF EXISTS `db_exam_exam_attendances`;

CREATE TABLE `db_exam_exam_attendances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_schedule_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `db_exam_exam_attendances` */

/*Table structure for table `db_exam_exam_schedules` */

DROP TABLE IF EXISTS `db_exam_exam_schedules`;

CREATE TABLE `db_exam_exam_schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `date` varchar(765) DEFAULT NULL,
  `from_time` varchar(765) DEFAULT NULL,
  `to_time` varchar(765) DEFAULT NULL,
  `room_id` varchar(765) DEFAULT NULL,
  `mark_distribution_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `db_exam_exam_schedules` */

/*Table structure for table `db_exam_exams` */

DROP TABLE IF EXISTS `db_exam_exams`;

CREATE TABLE `db_exam_exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `db_exam_exams` */

/*Table structure for table `db_exam_grades` */

DROP TABLE IF EXISTS `db_exam_grades`;

CREATE TABLE `db_exam_grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(765) DEFAULT NULL,
  `grade_point` float DEFAULT NULL,
  `mark_from` int(11) DEFAULT NULL,
  `mark_upto` int(11) DEFAULT NULL,
  `note` varchar(765) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `db_exam_grades` */

/*Table structure for table `db_mark_mark_distributions` */

DROP TABLE IF EXISTS `db_mark_mark_distributions`;

CREATE TABLE `db_mark_mark_distributions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `value` float DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `db_mark_mark_distributions` */

/*Table structure for table `db_mark_marks` */

DROP TABLE IF EXISTS `db_mark_marks`;

CREATE TABLE `db_mark_marks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attendance_id` int(11) DEFAULT NULL,
  `gained_mark` float DEFAULT NULL,
  `highest_mark` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `db_mark_marks` */

/*Table structure for table `db_mark_total_marks` */

DROP TABLE IF EXISTS `db_mark_total_marks`;

CREATE TABLE `db_mark_total_marks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `total_mark` float DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `highest_mark` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `db_mark_total_marks` */

/*Table structure for table `db_rooms` */

DROP TABLE IF EXISTS `db_rooms`;

CREATE TABLE `db_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(765) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `db_rooms` */

insert  into `db_rooms`(`id`,`name`) values 
(1,'Room 1'),
(2,'Room 2'),
(3,'Room 3'),
(4,'Room 4');

/*Table structure for table `db_sms_smses` */

DROP TABLE IF EXISTS `db_sms_smses`;

CREATE TABLE `db_sms_smses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(255) DEFAULT NULL,
  `template` int(11) DEFAULT NULL,
  `receiver` int(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `type` varchar(11) DEFAULT NULL,
  `sender_role` int(11) DEFAULT NULL,
  `receiver_role` int(11) DEFAULT NULL,
  `date_and_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `db_sms_smses` */

/*Table structure for table `db_sms_templates` */

DROP TABLE IF EXISTS `db_sms_templates`;

CREATE TABLE `db_sms_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `db_sms_templates` */

/*Table structure for table `db_student_assignments` */

DROP TABLE IF EXISTS `db_student_assignments`;

CREATE TABLE `db_student_assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `roll_no` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `db_student_assignments` */

insert  into `db_student_assignments`(`id`,`student_id`,`section_id`,`roll_no`,`class_id`) values 
(1,1,1,'1',1),
(2,2,1,'2',1),
(3,3,1,'3',1),
(4,4,1,'4',1),
(5,5,1,'5',1),
(6,6,1,'6',1),
(7,7,1,'7',1),
(8,8,1,'8',1),
(9,9,1,'9',1),
(10,10,1,'10',1),
(11,11,1,'11',1),
(12,12,1,'12',1),
(13,13,1,'13',1),
(14,14,1,'14',1),
(15,15,1,'15',1),
(16,16,1,'16',1),
(17,17,1,'17',1),
(18,18,1,'18',1),
(19,19,2,'1',1),
(20,20,2,'2',1),
(21,21,3,'1',2),
(22,22,3,'2',2),
(23,23,4,'1',2),
(24,24,4,'2',2),
(25,25,5,'1',3),
(26,26,5,'2',3),
(27,27,6,'1',3),
(28,28,6,'2',3),
(29,29,7,'1',4),
(30,30,7,'2',4);

/*Table structure for table `db_student_deactivations` */

DROP TABLE IF EXISTS `db_student_deactivations`;

CREATE TABLE `db_student_deactivations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `deactivation_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `db_student_deactivations` */

/*Table structure for table `db_student_students` */

DROP TABLE IF EXISTS `db_student_students`;

CREATE TABLE `db_student_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(765) DEFAULT NULL,
  `assignment` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `photo` varchar(765) DEFAULT NULL,
  `guardian_id` int(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `current_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `registration_no` varchar(255) DEFAULT NULL,
  `extra_curricular_activities` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `db_student_students` */

insert  into `db_student_students`(`id`,`name`,`assignment`,`status`,`photo`,`guardian_id`,`date_of_birth`,`gender`,`blood_group`,`religion`,`current_address`,`permanent_address`,`registration_no`,`extra_curricular_activities`,`remarks`) values 
(1,'John Reese',0,1,'mike.jpg',2,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000001','Hitman','Kills everyone'),
(2,'Ned Stark',0,1,'mike.jpg',3,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000002','Hitman','Kills everyone'),
(3,'Jon Reese',0,1,'mike.jpg',4,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000003','Hitman','Kills everyone'),
(4,'Tony Stark',0,1,'mike.jpg',5,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000004','Hitman','Kills everyone'),
(5,'Rob Stark',0,1,'mike.jpg',6,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000005','Hitman','Kills everyone'),
(6,'Barney Stinson',0,1,'mike.jpg',7,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000006','Hitman','Kills everyone'),
(7,'Sheldon Cooper',0,1,'mike.jpg',8,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000007','Hitman','Kills everyone'),
(8,'Walder Frey',0,1,'mike.jpg',9,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000008','Hitman','Kills everyone'),
(9,'Harvey Specter',0,1,'mike.jpg',1,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000009','Hitman','Kills everyone'),
(10,'Mike Ross',0,1,'mike.jpg',2,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000010','Hitman','Kills everyone'),
(11,'Tom Haardy',0,1,'mike.jpg',3,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000011','Hitman','Kills everyone'),
(12,'Thomas Shelby',0,1,'mike.jpg',4,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000012','Hitman','Kills everyone'),
(13,'Harry Potter',0,1,'mike.jpg',5,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000013','Hitman','Kills everyone'),
(14,'Jack Reacher',0,1,'mike.jpg',6,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000014','Hitman','Kills everyone'),
(15,'Andy Flower',0,1,'mike.jpg',7,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000015','Hitman','Kills everyone'),
(16,'Shai Hope',0,1,'mike.jpg',8,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000016','Hitman','Kills everyone'),
(17,'Michael Hardy',0,1,'mike.jpg',9,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000017','Hitman','Kills everyone'),
(18,'Ted Moseby',0,1,'mike.jpg',1,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000018','Hitman','Kills everyone'),
(19,'Daniel Hardman',0,1,'mike.jpg',2,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000019','Hitman','Kills everyone'),
(20,'Loid Litt',0,1,'mike.jpg',3,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000020','Hitman','Kills everyone'),
(21,'James Andrew',0,1,'mike.jpg',2,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000021','Hitman','Kills everyone'),
(22,'Bill Clinton',0,1,'mike.jpg',6,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000022','Hitman','Kills everyone'),
(23,'Ragner Lothbrok',0,1,'mike.jpg',5,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000023','Hitman','Kills everyone'),
(24,'Andrew Russel',0,1,'mike.jpg',3,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000024','Hitman','Kills everyone'),
(25,'Adam Smoth',0,1,'mike.jpg',8,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000025','Hitman','Kills everyone'),
(26,'James Bond',0,1,'mike.jpg',9,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000026','Hitman','Kills everyone'),
(27,'Bruce Wayne',0,1,'mike.jpg',4,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000027','Hitman','Kills everyone'),
(28,'Vin Diesel',0,1,'mike.jpg',3,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000028','Hitman','Kills everyone'),
(29,'James naderson',0,1,'mike.jpg',1,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000029','Hitman','Kills everyone'),
(30,'Tyler Durden',0,1,'mike.jpg',2,'2018-12-01','male','O+','Cristian','London.Uk','London.Uk','S000030','Hitman','Kills everyone');

/*Table structure for table `db_teacher_assignments` */

DROP TABLE IF EXISTS `db_teacher_assignments`;

CREATE TABLE `db_teacher_assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `db_teacher_assignments` */

insert  into `db_teacher_assignments`(`id`,`class_id`,`section_id`,`subject_id`,`teacher_id`) values 
(1,1,1,1,1),
(2,1,1,2,2),
(3,1,2,1,3),
(4,1,2,2,4),
(5,2,3,3,5),
(6,2,3,4,6),
(7,2,4,3,7),
(8,NULL,NULL,NULL,NULL);

/*Table structure for table `db_teacher_deactivations` */

DROP TABLE IF EXISTS `db_teacher_deactivations`;

CREATE TABLE `db_teacher_deactivations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) DEFAULT NULL,
  `deactivation_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `db_teacher_deactivations` */

/*Table structure for table `db_teacher_teachers` */

DROP TABLE IF EXISTS `db_teacher_teachers`;

CREATE TABLE `db_teacher_teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(765) DEFAULT NULL,
  `email` varchar(765) DEFAULT NULL,
  `phone` varchar(765) DEFAULT NULL,
  `photo` varchar(765) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `designation_id` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `current_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `national_id` varchar(255) DEFAULT NULL,
  `registration_no` varchar(255) DEFAULT NULL,
  `educational_qualification` varchar(255) DEFAULT NULL,
  `speciality` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `db_teacher_teachers` */

insert  into `db_teacher_teachers`(`id`,`name`,`email`,`phone`,`photo`,`status`,`designation_id`,`date_of_birth`,`gender`,`blood_group`,`religion`,`current_address`,`permanent_address`,`joining_date`,`national_id`,`registration_no`,`educational_qualification`,`speciality`) values 
(1,'James Bond','a@b.com','01754290194','tom.jpg',1,'1','2018-12-01','male','O+','Cristian','London,Uk','London,Uk','2018-12-01','1994827123','T000001','Bsc. in CSE','CSE'),
(2,'John Reese','a@b.com','01754290194','tom.jpg',1,'1','2018-12-01','male','O+','Cristian','London,Uk','London,Uk','2018-12-01','1994827123','T000002','Bsc. in CSE','CSE'),
(3,'John Wick','a@b.com','01754290194','tom.jpg',1,'1','2018-12-01','male','O+','Cristian','London,Uk','London,Uk','2018-12-01','1994827123','T000003','Bsc. in CSE','CSE'),
(4,'Tom Hardy','a@b.com','01754290194','tom.jpg',1,'1','2018-12-01','male','O+','Cristian','London,Uk','London,Uk','2018-12-01','1994827123','T000004','Bsc. in CSE','CSE'),
(5,'Ned Stark','a@b.com','01754290194','tom.jpg',1,'2','2018-12-01','male','O+','Cristian','London,Uk','London,Uk','2018-12-01','1994827123','T000005','Bsc. in CSE','CSE'),
(6,'Ed Sheeran','a@b.com','01754290194','tom.jpg',1,'2','2018-12-01','male','O+','Cristian','London,Uk','London,Uk','2018-12-01','1994827123','T000006','Bsc. in CSE','CSE'),
(7,'James ANderson','a@b.com','01754290194','tom.jpg',1,'2','2018-12-01','male','O+','Cristian','London,Uk','London,Uk','2018-12-01','1994827123','T000007','Bsc. in CSE','CSE'),
(8,'Bill Clinton','a@b.com','01754290194','tom.jpg',1,'2','2018-12-01','male','O+','Cristian','London,Uk','London,Uk','2018-12-01','1994827123','T000008','Bsc. in CSE','CSE');

/*Table structure for table `db_exam_exam_attendance_view` */

DROP TABLE IF EXISTS `db_exam_exam_attendance_view`;

/*!50001 DROP VIEW IF EXISTS `db_exam_exam_attendance_view` */;
/*!50001 DROP TABLE IF EXISTS `db_exam_exam_attendance_view` */;

/*!50001 CREATE TABLE  `db_exam_exam_attendance_view`(
 `id` int(11) ,
 `exam_id` int(11) ,
 `exam_name` varchar(255) ,
 `class_id` int(11) ,
 `class_name` varchar(2295) ,
 `section_id` int(11) ,
 `section_name` varchar(2295) ,
 `subject_id` int(11) ,
 `subject_name` varchar(2295) ,
 `student_name` varchar(765) ,
 `student_id` int(11) ,
 `student_photo` varchar(765) ,
 `registration_no` varchar(255) ,
 `mark_distribution_id` int(11) ,
 `mark_distribution_type` varchar(255) ,
 `attendance_value` int(11) 
)*/;

/*Table structure for table `db_exam_exam_schedules_view` */

DROP TABLE IF EXISTS `db_exam_exam_schedules_view`;

/*!50001 DROP VIEW IF EXISTS `db_exam_exam_schedules_view` */;
/*!50001 DROP TABLE IF EXISTS `db_exam_exam_schedules_view` */;

/*!50001 CREATE TABLE  `db_exam_exam_schedules_view`(
 `id` int(11) ,
 `exam_id` int(11) ,
 `exam_name` varchar(255) ,
 `class_id` int(11) ,
 `class_name` varchar(2295) ,
 `section_id` int(11) ,
 `section_name` varchar(2295) ,
 `subject_id` int(11) ,
 `subject_name` varchar(2295) ,
 `exam_date` varchar(765) ,
 `from_time` varchar(765) ,
 `to_time` varchar(765) ,
 `room_id` int(11) ,
 `room_name` varchar(765) ,
 `mark_distribution_id` int(11) ,
 `mark_distribution_type` varchar(255) 
)*/;

/*Table structure for table `db_mark_mark_distributions_view` */

DROP TABLE IF EXISTS `db_mark_mark_distributions_view`;

/*!50001 DROP VIEW IF EXISTS `db_mark_mark_distributions_view` */;
/*!50001 DROP TABLE IF EXISTS `db_mark_mark_distributions_view` */;

/*!50001 CREATE TABLE  `db_mark_mark_distributions_view`(
 `id` int(11) ,
 `type` varchar(255) ,
 `value` float ,
 `class_name` varchar(2295) ,
 `class_id` int(11) 
)*/;

/*Table structure for table `db_mark_marks_view` */

DROP TABLE IF EXISTS `db_mark_marks_view`;

/*!50001 DROP VIEW IF EXISTS `db_mark_marks_view` */;
/*!50001 DROP TABLE IF EXISTS `db_mark_marks_view` */;

/*!50001 CREATE TABLE  `db_mark_marks_view`(
 `id` int(11) ,
 `exam_id` int(11) ,
 `exam_name` varchar(255) ,
 `class_id` int(11) ,
 `exam_schedules_id` int(11) ,
 `class_name` varchar(2295) ,
 `section_id` int(11) ,
 `section_name` varchar(2295) ,
 `subject_id` int(11) ,
 `subject_name` varchar(2295) ,
 `student_name` varchar(765) ,
 `student_id` int(11) ,
 `student_photo` varchar(765) ,
 `student_roll` varchar(255) ,
 `registration_no` varchar(255) ,
 `attendance_value` int(11) ,
 `mark_type` varchar(255) ,
 `mark_value` float ,
 `attendance_id` int(11) ,
 `mark_distribution_id` int(11) ,
 `gained_mark` float ,
 `highest_mark` float 
)*/;

/*Table structure for table `db_mark_total_marks_view` */

DROP TABLE IF EXISTS `db_mark_total_marks_view`;

/*!50001 DROP VIEW IF EXISTS `db_mark_total_marks_view` */;
/*!50001 DROP TABLE IF EXISTS `db_mark_total_marks_view` */;

/*!50001 CREATE TABLE  `db_mark_total_marks_view`(
 `id` int(11) ,
 `exam_id` int(11) ,
 `exam_name` varchar(255) ,
 `class_id` int(11) ,
 `class_name` varchar(2295) ,
 `exam_schedules_id` int(11) ,
 `section_id` int(11) ,
 `section_name` varchar(2295) ,
 `subject_id` int(11) ,
 `subject_name` varchar(2295) ,
 `student_name` varchar(765) ,
 `student_id` int(11) ,
 `student_photo` varchar(765) ,
 `student_roll` varchar(255) ,
 `attendance_value` int(11) ,
 `mark_type` varchar(255) ,
 `mark_value` float ,
 `attendance_id` int(11) ,
 `gained_mark` float ,
 `highest_mark` float ,
 `mark_distribution_id` int(11) ,
 `total_mark` float ,
 `grade_id` int(11) ,
 `grade_name` varchar(765) ,
 `grade_point` float ,
 `total_highest_mark` int(11) 
)*/;

/*Table structure for table `db_student_assignments_view` */

DROP TABLE IF EXISTS `db_student_assignments_view`;

/*!50001 DROP VIEW IF EXISTS `db_student_assignments_view` */;
/*!50001 DROP TABLE IF EXISTS `db_student_assignments_view` */;

/*!50001 CREATE TABLE  `db_student_assignments_view`(
 `id` int(11) ,
 `student_name` varchar(765) ,
 `photo` varchar(765) ,
 `guardian_id` int(11) ,
 `date_of_birth` date ,
 `gender` varchar(255) ,
 `blood_group` varchar(255) ,
 `religion` varchar(255) ,
 `current_address` varchar(255) ,
 `permanent_address` varchar(255) ,
 `registration_no` varchar(255) ,
 `extra_curricular_acctivities` varchar(255) ,
 `remarks` varchar(255) ,
 `class_id` int(11) ,
 `class_name` varchar(2295) ,
 `section_id` int(11) ,
 `section_name` varchar(2295) ,
 `roll_no` varchar(255) ,
 `status` int(11) 
)*/;

/*Table structure for table `db_teacher_assignments_view` */

DROP TABLE IF EXISTS `db_teacher_assignments_view`;

/*!50001 DROP VIEW IF EXISTS `db_teacher_assignments_view` */;
/*!50001 DROP TABLE IF EXISTS `db_teacher_assignments_view` */;

/*!50001 CREATE TABLE  `db_teacher_assignments_view`(
 `id` int(11) ,
 `teacher_name` varchar(765) ,
 `photo` varchar(765) ,
 `date_of_birth` date ,
 `gender` varchar(255) ,
 `blood_group` varchar(255) ,
 `religion` varchar(255) ,
 `current_address` varchar(255) ,
 `permanent_address` varchar(255) ,
 `registration_no` varchar(255) ,
 `class_id` int(11) ,
 `class_name` varchar(2295) ,
 `section_id` int(11) ,
 `section_name` varchar(2295) ,
 `subject_id` int(11) ,
 `subject_name` varchar(2295) 
)*/;

/*View structure for view db_exam_exam_attendance_view */

/*!50001 DROP TABLE IF EXISTS `db_exam_exam_attendance_view` */;
/*!50001 DROP VIEW IF EXISTS `db_exam_exam_attendance_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`ROOT`@`localhost` SQL SECURITY DEFINER VIEW `db_exam_exam_attendance_view` AS select `db_exam_exam_attendances`.`id` AS `id`,`db_exam_exams`.`id` AS `exam_id`,`db_exam_exams`.`name` AS `exam_name`,`db_exam_exam_schedules`.`class_id` AS `class_id`,`db_academic_classes`.`name` AS `class_name`,`db_academic_sections`.`id` AS `section_id`,`db_academic_sections`.`name` AS `section_name`,`db_academic_subjects`.`id` AS `subject_id`,`db_academic_subjects`.`subject_name` AS `subject_name`,`db_student_students`.`name` AS `student_name`,`db_student_students`.`id` AS `student_id`,`db_student_students`.`photo` AS `student_photo`,`db_student_students`.`registration_no` AS `registration_no`,`db_mark_mark_distributions`.`id` AS `mark_distribution_id`,`db_mark_mark_distributions`.`type` AS `mark_distribution_type`,`db_exam_exam_attendances`.`value` AS `attendance_value` from (((((((`db_exam_exam_attendances` left join `db_exam_exam_schedules` on((`db_exam_exam_attendances`.`exam_schedule_id` = `db_exam_exam_schedules`.`id`))) left join `db_student_students` on((`db_exam_exam_attendances`.`student_id` = `db_student_students`.`id`))) left join `db_academic_classes` on((`db_exam_exam_schedules`.`class_id` = `db_academic_classes`.`id`))) left join `db_academic_sections` on((`db_exam_exam_schedules`.`section_id` = `db_academic_sections`.`id`))) left join `db_academic_subjects` on((`db_exam_exam_schedules`.`subject_id` = `db_academic_subjects`.`id`))) left join `db_exam_exams` on((`db_exam_exam_schedules`.`exam_id` = `db_exam_exams`.`id`))) left join `db_mark_mark_distributions` on((`db_exam_exam_schedules`.`mark_distribution_id` = `db_mark_mark_distributions`.`id`))) */;

/*View structure for view db_exam_exam_schedules_view */

/*!50001 DROP TABLE IF EXISTS `db_exam_exam_schedules_view` */;
/*!50001 DROP VIEW IF EXISTS `db_exam_exam_schedules_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`ROOT`@`localhost` SQL SECURITY DEFINER VIEW `db_exam_exam_schedules_view` AS select `db_exam_exam_schedules`.`id` AS `id`,`db_exam_exams`.`id` AS `exam_id`,`db_exam_exams`.`name` AS `exam_name`,`db_exam_exam_schedules`.`class_id` AS `class_id`,`db_academic_classes`.`name` AS `class_name`,`db_academic_sections`.`id` AS `section_id`,`db_academic_sections`.`name` AS `section_name`,`db_academic_subjects`.`id` AS `subject_id`,`db_academic_subjects`.`subject_name` AS `subject_name`,`db_exam_exam_schedules`.`date` AS `exam_date`,`db_exam_exam_schedules`.`from_time` AS `from_time`,`db_exam_exam_schedules`.`to_time` AS `to_time`,`db_rooms`.`id` AS `room_id`,`db_rooms`.`name` AS `room_name`,`db_mark_mark_distributions`.`id` AS `mark_distribution_id`,`db_mark_mark_distributions`.`type` AS `mark_distribution_type` from ((((((`db_exam_exam_schedules` left join `db_academic_classes` on((`db_exam_exam_schedules`.`class_id` = `db_academic_classes`.`id`))) left join `db_academic_sections` on((`db_exam_exam_schedules`.`section_id` = `db_academic_sections`.`id`))) left join `db_academic_subjects` on((`db_exam_exam_schedules`.`subject_id` = `db_academic_subjects`.`id`))) left join `db_rooms` on((`db_exam_exam_schedules`.`room_id` = `db_rooms`.`id`))) left join `db_exam_exams` on((`db_exam_exam_schedules`.`exam_id` = `db_exam_exams`.`id`))) left join `db_mark_mark_distributions` on((`db_exam_exam_schedules`.`mark_distribution_id` = `db_mark_mark_distributions`.`id`))) */;

/*View structure for view db_mark_mark_distributions_view */

/*!50001 DROP TABLE IF EXISTS `db_mark_mark_distributions_view` */;
/*!50001 DROP VIEW IF EXISTS `db_mark_mark_distributions_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`ROOT`@`localhost` SQL SECURITY DEFINER VIEW `db_mark_mark_distributions_view` AS select `db_mark_mark_distributions`.`id` AS `id`,`db_mark_mark_distributions`.`type` AS `type`,`db_mark_mark_distributions`.`value` AS `value`,`db_academic_classes`.`name` AS `class_name`,`db_academic_classes`.`id` AS `class_id` from (`db_mark_mark_distributions` left join `db_academic_classes` on((`db_mark_mark_distributions`.`class_id` = `db_academic_classes`.`id`))) */;

/*View structure for view db_mark_marks_view */

/*!50001 DROP TABLE IF EXISTS `db_mark_marks_view` */;
/*!50001 DROP VIEW IF EXISTS `db_mark_marks_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`ROOT`@`localhost` SQL SECURITY DEFINER VIEW `db_mark_marks_view` AS select `db_mark_marks`.`id` AS `id`,`db_exam_exams`.`id` AS `exam_id`,`db_exam_exams`.`name` AS `exam_name`,`db_exam_exam_schedules`.`class_id` AS `class_id`,`db_exam_exam_schedules`.`id` AS `exam_schedules_id`,`db_academic_classes`.`name` AS `class_name`,`db_academic_sections`.`id` AS `section_id`,`db_academic_sections`.`name` AS `section_name`,`db_academic_subjects`.`id` AS `subject_id`,`db_academic_subjects`.`subject_name` AS `subject_name`,`db_student_assignments_view`.`student_name` AS `student_name`,`db_student_assignments_view`.`id` AS `student_id`,`db_student_assignments_view`.`photo` AS `student_photo`,`db_student_assignments_view`.`roll_no` AS `student_roll`,`db_student_assignments_view`.`registration_no` AS `registration_no`,`db_exam_exam_attendances`.`value` AS `attendance_value`,`db_mark_mark_distributions`.`type` AS `mark_type`,`db_mark_mark_distributions`.`value` AS `mark_value`,`db_exam_exam_attendances`.`id` AS `attendance_id`,`db_mark_mark_distributions`.`id` AS `mark_distribution_id`,`db_mark_marks`.`gained_mark` AS `gained_mark`,`db_mark_marks`.`highest_mark` AS `highest_mark` from ((((((((`db_mark_marks` left join `db_exam_exam_attendances` on((`db_mark_marks`.`attendance_id` = `db_exam_exam_attendances`.`id`))) left join `db_exam_exam_schedules` on((`db_exam_exam_attendances`.`exam_schedule_id` = `db_exam_exam_schedules`.`id`))) join `db_student_assignments_view` on((`db_exam_exam_attendances`.`student_id` = `db_student_assignments_view`.`id`))) left join `db_academic_classes` on((`db_exam_exam_schedules`.`class_id` = `db_academic_classes`.`id`))) left join `db_academic_sections` on((`db_exam_exam_schedules`.`section_id` = `db_academic_sections`.`id`))) left join `db_academic_subjects` on((`db_exam_exam_schedules`.`subject_id` = `db_academic_subjects`.`id`))) left join `db_exam_exams` on((`db_exam_exam_schedules`.`exam_id` = `db_exam_exams`.`id`))) left join `db_mark_mark_distributions` on((`db_exam_exam_schedules`.`mark_distribution_id` = `db_mark_mark_distributions`.`id`))) */;

/*View structure for view db_mark_total_marks_view */

/*!50001 DROP TABLE IF EXISTS `db_mark_total_marks_view` */;
/*!50001 DROP VIEW IF EXISTS `db_mark_total_marks_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`ROOT`@`localhost` SQL SECURITY DEFINER VIEW `db_mark_total_marks_view` AS select `db_mark_marks_view`.`id` AS `id`,`db_mark_marks_view`.`exam_id` AS `exam_id`,`db_mark_marks_view`.`exam_name` AS `exam_name`,`db_mark_marks_view`.`class_id` AS `class_id`,`db_mark_marks_view`.`class_name` AS `class_name`,`db_mark_marks_view`.`exam_schedules_id` AS `exam_schedules_id`,`db_mark_marks_view`.`section_id` AS `section_id`,`db_mark_marks_view`.`section_name` AS `section_name`,`db_mark_marks_view`.`subject_id` AS `subject_id`,`db_mark_marks_view`.`subject_name` AS `subject_name`,`db_mark_marks_view`.`student_name` AS `student_name`,`db_mark_marks_view`.`student_id` AS `student_id`,`db_mark_marks_view`.`student_photo` AS `student_photo`,`db_mark_marks_view`.`student_roll` AS `student_roll`,`db_mark_marks_view`.`attendance_value` AS `attendance_value`,`db_mark_marks_view`.`mark_type` AS `mark_type`,`db_mark_marks_view`.`mark_value` AS `mark_value`,`db_mark_marks_view`.`attendance_id` AS `attendance_id`,`db_mark_marks_view`.`gained_mark` AS `gained_mark`,`db_mark_marks_view`.`highest_mark` AS `highest_mark`,`db_mark_marks_view`.`mark_distribution_id` AS `mark_distribution_id`,`db_mark_total_marks`.`total_mark` AS `total_mark`,`db_mark_total_marks`.`grade_id` AS `grade_id`,`db_exam_grades`.`grade_name` AS `grade_name`,`db_exam_grades`.`grade_point` AS `grade_point`,`db_mark_total_marks`.`highest_mark` AS `total_highest_mark` from ((`db_mark_marks_view` left join `db_mark_total_marks` on(((`db_mark_marks_view`.`exam_id` = `db_mark_total_marks`.`exam_id`) and (`db_mark_marks_view`.`student_id` = `db_mark_total_marks`.`student_id`) and (`db_mark_marks_view`.`subject_id` = `db_mark_total_marks`.`subject_id`)))) left join `db_exam_grades` on((`db_mark_total_marks`.`grade_id` = `db_exam_grades`.`id`))) */;

/*View structure for view db_student_assignments_view */

/*!50001 DROP TABLE IF EXISTS `db_student_assignments_view` */;
/*!50001 DROP VIEW IF EXISTS `db_student_assignments_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`ROOT`@`localhost` SQL SECURITY DEFINER VIEW `db_student_assignments_view` AS select `db_student_students`.`id` AS `id`,`db_student_students`.`name` AS `student_name`,`db_student_students`.`photo` AS `photo`,`db_student_students`.`guardian_id` AS `guardian_id`,`db_student_students`.`date_of_birth` AS `date_of_birth`,`db_student_students`.`gender` AS `gender`,`db_student_students`.`blood_group` AS `blood_group`,`db_student_students`.`religion` AS `religion`,`db_student_students`.`current_address` AS `current_address`,`db_student_students`.`permanent_address` AS `permanent_address`,`db_student_students`.`registration_no` AS `registration_no`,`db_student_students`.`extra_curricular_activities` AS `extra_curricular_acctivities`,`db_student_students`.`remarks` AS `remarks`,`db_student_assignments`.`class_id` AS `class_id`,`db_academic_classes`.`name` AS `class_name`,`db_student_assignments`.`section_id` AS `section_id`,`db_academic_sections`.`name` AS `section_name`,`db_student_assignments`.`roll_no` AS `roll_no`,`db_student_students`.`status` AS `status` from (((`db_student_assignments` left join `db_student_students` on((`db_student_assignments`.`student_id` = `db_student_students`.`id`))) left join `db_academic_classes` on((`db_student_assignments`.`class_id` = `db_academic_classes`.`id`))) left join `db_academic_sections` on((`db_student_assignments`.`section_id` = `db_academic_sections`.`id`))) where (`db_student_students`.`status` = 1) */;

/*View structure for view db_teacher_assignments_view */

/*!50001 DROP TABLE IF EXISTS `db_teacher_assignments_view` */;
/*!50001 DROP VIEW IF EXISTS `db_teacher_assignments_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`ROOT`@`localhost` SQL SECURITY DEFINER VIEW `db_teacher_assignments_view` AS select `db_teacher_teachers`.`id` AS `id`,`db_teacher_teachers`.`name` AS `teacher_name`,`db_teacher_teachers`.`photo` AS `photo`,`db_teacher_teachers`.`date_of_birth` AS `date_of_birth`,`db_teacher_teachers`.`gender` AS `gender`,`db_teacher_teachers`.`blood_group` AS `blood_group`,`db_teacher_teachers`.`religion` AS `religion`,`db_teacher_teachers`.`current_address` AS `current_address`,`db_teacher_teachers`.`permanent_address` AS `permanent_address`,`db_teacher_teachers`.`registration_no` AS `registration_no`,`db_teacher_assignments`.`class_id` AS `class_id`,`db_academic_classes`.`name` AS `class_name`,`db_teacher_assignments`.`section_id` AS `section_id`,`db_academic_sections`.`name` AS `section_name`,`db_teacher_assignments`.`subject_id` AS `subject_id`,`db_academic_subjects`.`subject_name` AS `subject_name` from ((((`db_teacher_assignments` left join `db_teacher_teachers` on((`db_teacher_assignments`.`teacher_id` = `db_teacher_teachers`.`id`))) left join `db_academic_classes` on((`db_teacher_assignments`.`class_id` = `db_academic_classes`.`id`))) left join `db_academic_sections` on((`db_teacher_assignments`.`section_id` = `db_academic_sections`.`id`))) left join `db_academic_subjects` on((`db_teacher_assignments`.`subject_id` = `db_academic_subjects`.`id`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
