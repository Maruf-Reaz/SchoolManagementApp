/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.32-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `db_student_students` (
	`id` int (11),
	`name` varchar (2295),
	`assignment` int (11),
	`status` int (11),
	`photo` varchar (2295),
	`guardian_id` int (11),
	`date_of_birth` date ,
	`gender` varchar (765),
	`blood_group` varchar (765),
	`religion` varchar (765),
	`current_address` varchar (765),
	`permanent_address` varchar (765),
	`registration_no` varchar (765),
	`extra_curricular_activities` varchar (765),
	`remarks` varchar (765)
); 
insert into `db_student_students` (`id`, `name`, `assignment`, `status`, `photo`, `guardian_id`, `date_of_birth`, `gender`, `blood_group`, `religion`, `current_address`, `permanent_address`, `registration_no`, `extra_curricular_activities`, `remarks`) values('2','Mike ross','1','0','mike.jpg','18','2018-10-01','male','O+','Islam','Chittagong','Chittagong','S000001','Football','good');
insert into `db_student_students` (`id`, `name`, `assignment`, `status`, `photo`, `guardian_id`, `date_of_birth`, `gender`, `blood_group`, `religion`, `current_address`, `permanent_address`, `registration_no`, `extra_curricular_activities`, `remarks`) values('3','Paul Harris','1','1','paul.jpg','18','2018-09-30','male','A-','Islam','dhaka','Chittagong','S000002','Cricket','average');
insert into `db_student_students` (`id`, `name`, `assignment`, `status`, `photo`, `guardian_id`, `date_of_birth`, `gender`, `blood_group`, `religion`, `current_address`, `permanent_address`, `registration_no`, `extra_curricular_activities`, `remarks`) values('4','Harry Kane','1','1','Harry_Kane_3.jpg','18','2018-10-02','male','O+','Islam','Chittagong','Chittagong','S000003','Football','great');
insert into `db_student_students` (`id`, `name`, `assignment`, `status`, `photo`, `guardian_id`, `date_of_birth`, `gender`, `blood_group`, `religion`, `current_address`, `permanent_address`, `registration_no`, `extra_curricular_activities`, `remarks`) values('5','John Snow','0','0','jon snow.jpg','18','2018-09-30','male','A+','Islam','Sylhet','Sylhet','S000004','Vollyball','above average');
insert into `db_student_students` (`id`, `name`, `assignment`, `status`, `photo`, `guardian_id`, `date_of_birth`, `gender`, `blood_group`, `religion`, `current_address`, `permanent_address`, `registration_no`, `extra_curricular_activities`, `remarks`) values('6','Abdullah al Adnan','0','0','Adnan.jpg','18','2018-09-30','male','O+','Islam','Chittagong','Chittagong','S000005','Singing','below average');
insert into `db_student_students` (`id`, `name`, `assignment`, `status`, `photo`, `guardian_id`, `date_of_birth`, `gender`, `blood_group`, `religion`, `current_address`, `permanent_address`, `registration_no`, `extra_curricular_activities`, `remarks`) values('7','Harry Potter','0','0','Harry Potter.jpg','18','2018-09-30','male','O+','Cristian','London.Uk','London.Uk','S000006','Wizardy','Scar on the forehead');
insert into `db_student_students` (`id`, `name`, `assignment`, `status`, `photo`, `guardian_id`, `date_of_birth`, `gender`, `blood_group`, `religion`, `current_address`, `permanent_address`, `registration_no`, `extra_curricular_activities`, `remarks`) values('8','Bruce Wayne','1','1','batman.jpg','18','2018-11-13','male','O+','Cristian','London.Uk','London.Uk','S000007','Super hero','Because he is batman');
insert into `db_student_students` (`id`, `name`, `assignment`, `status`, `photo`, `guardian_id`, `date_of_birth`, `gender`, `blood_group`, `religion`, `current_address`, `permanent_address`, `registration_no`, `extra_curricular_activities`, `remarks`) values('9','Bruce Wayne','1','1','15621864_389481191390907_7825876534981044778_n.jpg','18','2018-11-13','female','O+','Cristian','London.Uk','Chittagong','S000008','Super hero','He is batman');
insert into `db_student_students` (`id`, `name`, `assignment`, `status`, `photo`, `guardian_id`, `date_of_birth`, `gender`, `blood_group`, `religion`, `current_address`, `permanent_address`, `registration_no`, `extra_curricular_activities`, `remarks`) values('10','Harry Potter','1','1','Harry Potter.jpg','18','2018-11-13','male','O+','Islam','Chittagong','Chittagong','S000009','Super hero','He is batman');
insert into `db_student_students` (`id`, `name`, `assignment`, `status`, `photo`, `guardian_id`, `date_of_birth`, `gender`, `blood_group`, `religion`, `current_address`, `permanent_address`, `registration_no`, `extra_curricular_activities`, `remarks`) values('12','Abdullah Al Adnan','0','1','Harry Potter.jpg','18','2018-11-13','male','O+','Cristian','London.Uk','London.Uk','S000011','S.Eng.','He is batman');
