/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.30-MariaDB : Database - ems_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ems_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ems_db`;

/*Table structure for table `db_account_accountants` */

DROP TABLE IF EXISTS `db_account_accountants`;

CREATE TABLE `db_account_accountants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration_no` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `accountant_name` varchar(100) DEFAULT NULL,
  `nid_number` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_number` varchar(30) DEFAULT NULL,
  `educational_qualification` varchar(50) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `present_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `db_account_accountants` */

insert  into `db_account_accountants`(`id`,`registration_no`,`photo`,`accountant_name`,`nid_number`,`email`,`contact_number`,`educational_qualification`,`gender`,`blood_group`,`present_address`,`permanent_address`) values 
(10,'A000010','Adnan.jpg','Michael Lorens','1996123789456','michael@mail.com','01715123456','Degree','Male','B+','Jamalkhan Chittagong','Jamalkhan Chittagong'),
(11,'A000011','robert.jpg','John Lorens','1996123456789','john@mail.com','01921564789','Degree','Male','B+','England','England');

/*Table structure for table `db_account_bank_wise_transactions` */

DROP TABLE IF EXISTS `db_account_bank_wise_transactions`;

CREATE TABLE `db_account_bank_wise_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_id` int(11) DEFAULT NULL,
  `debit` float DEFAULT NULL,
  `credit` float DEFAULT NULL,
  `balance` float DEFAULT NULL,
  `maker_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `db_account_bank_wise_transactions` */

insert  into `db_account_bank_wise_transactions`(`id`,`bank_id`,`debit`,`credit`,`balance`,`maker_id`,`date`) values 
(1,1,0,20000,20000,5,'2018-12-17');

/*Table structure for table `db_account_banks` */

DROP TABLE IF EXISTS `db_account_banks`;

CREATE TABLE `db_account_banks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(50) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `db_account_banks` */

insert  into `db_account_banks`(`id`,`bank_name`,`note`) values 
(1,'City Bank Ltd.','Great'),
(2,'Prime Bank Ltd.','Better'),
(3,'Islami Bank Ltd.','Good');

/*Table structure for table `db_account_expense_types` */

DROP TABLE IF EXISTS `db_account_expense_types`;

CREATE TABLE `db_account_expense_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_type_name` varchar(100) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `db_account_expense_types` */

insert  into `db_account_expense_types`(`id`,`expense_type_name`,`note`) values 
(1,'Entertainment','Expense for entertainment of Students'),
(2,'Utilities','Expense for utility of School');

/*Table structure for table `db_account_expenses` */

DROP TABLE IF EXISTS `db_account_expenses`;

CREATE TABLE `db_account_expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_type_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `db_account_expenses` */

/*Table structure for table `db_account_fee_types` */

DROP TABLE IF EXISTS `db_account_fee_types`;

CREATE TABLE `db_account_fee_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fee_type_name` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `db_account_fee_types` */

insert  into `db_account_fee_types`(`id`,`fee_type_name`,`note`) values 
(31,'Tution Fee','Tution Fees For Students'),
(32,'Admission Fee','Admission Fees For Students'),
(33,'Exam Fee','Exam Fees For Students'),
(34,'Library Fee','Library Fees For Students');

/*Table structure for table `db_account_fees` */

DROP TABLE IF EXISTS `db_account_fees`;

CREATE TABLE `db_account_fees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `fee_type_id` int(11) DEFAULT NULL,
  `fee_amount` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `db_account_fees` */

insert  into `db_account_fees`(`id`,`class_id`,`fee_type_id`,`fee_amount`) values 
(1,1,31,3000),
(2,1,32,10000),
(3,2,31,4000),
(4,2,32,12000);

/*Table structure for table `db_account_income_types` */

DROP TABLE IF EXISTS `db_account_income_types`;

CREATE TABLE `db_account_income_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `income_type_name` varchar(100) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `db_account_income_types` */

insert  into `db_account_income_types`(`id`,`income_type_name`,`note`) values 
(1,'Donation','Donation Received From Someone'),
(3,'Initial Amount','Amount Initialized By Authority'),
(4,'Additional Amount','Amount Added By Authority'),
(5,'Old Assets Sold','Assets Sold From School'),
(6,'Bank Withdrawal','Withdrawal For A Purpose');

/*Table structure for table `db_account_incomes` */

DROP TABLE IF EXISTS `db_account_incomes`;

CREATE TABLE `db_account_incomes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `income_type_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `db_account_incomes` */

insert  into `db_account_incomes`(`id`,`income_type_id`,`date`,`receiver_id`,`amount`,`note`) values 
(1,6,'2018-12-17',10,3000,'Withdrawal For Expense');

/*Table structure for table `db_account_invoices` */

DROP TABLE IF EXISTS `db_account_invoices`;

CREATE TABLE `db_account_invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `fee_type_id` int(11) DEFAULT NULL,
  `month` varchar(50) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `discount_in_percentage` float DEFAULT NULL,
  `fine` float DEFAULT NULL,
  `amount_after_fine_and_discount` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `db_account_invoices` */

insert  into `db_account_invoices`(`id`,`student_id`,`fee_type_id`,`month`,`year`,`invoice_number`,`note`,`amount`,`discount_in_percentage`,`fine`,`amount_after_fine_and_discount`,`date`) values 
(1,8,31,'May','2018','20181217025745118','Invoice Of May 2018',3000,0,0,3000,'2018-12-17'),
(2,2,31,'May','2018','20181217025745112','Invoice Of May 2018',3000,0,0,3000,'2018-12-17'),
(3,3,31,'May','2018','20181217025845123','Invoice Of May 2018',3000,0,0,3000,'2018-12-17'),
(4,9,31,'May','2018','20181217025921129','Invoice Of May 2018',3000,0,0,3000,'2018-12-17'),
(5,13,31,'May','2018','201812170300352513','Invoice Of May 2018',4000,0,0,4000,'2018-12-17'),
(6,12,31,'May','2018','201812170300352512','Invoice Of May 2018',4000,0,0,4000,'2018-12-17'),
(7,2,31,'June','2018','20181218060148112','Invoice Of June 2018',3000,0,0,3000,'2018-12-18');

/*Table structure for table `db_account_payment_methods` */

DROP TABLE IF EXISTS `db_account_payment_methods`;

CREATE TABLE `db_account_payment_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `db_account_payment_methods` */

insert  into `db_account_payment_methods`(`id`,`payment_method_name`) values 
(1,'Cash'),
(2,'Cheque');

/*Table structure for table `db_account_payments` */

DROP TABLE IF EXISTS `db_account_payments`;

CREATE TABLE `db_account_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `paid_amount` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `db_account_payments` */

insert  into `db_account_payments`(`id`,`student_id`,`paid_amount`,`discount`,`payment_method_id`,`bank_id`,`receiver_id`,`date`) values 
(1,2,1000,0,1,NULL,10,'2018-12-17'),
(2,2,500,0,1,NULL,10,'2018-12-17'),
(3,12,2000,0,1,NULL,11,'2018-12-17'),
(5,12,500,0,2,1,11,'2018-12-17'),
(6,8,2500,0,1,NULL,11,'2018-12-17'),
(7,13,2000,0,2,1,10,'2018-12-17');

/*Table structure for table `db_account_received_payments` */

DROP TABLE IF EXISTS `db_account_received_payments`;

CREATE TABLE `db_account_received_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `accountant_id` int(11) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `receive_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `db_account_received_payments` */

/*Table structure for table `db_guardian_guardians` */

DROP TABLE IF EXISTS `db_guardian_guardians`;

CREATE TABLE `db_guardian_guardians` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration_no` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `guardian_name` varchar(100) DEFAULT NULL,
  `nid_number` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_number` varchar(30) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `occupation` varchar(10) DEFAULT NULL,
  `present_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `db_guardian_guardians` */

insert  into `db_guardian_guardians`(`id`,`registration_no`,`photo`,`guardian_name`,`nid_number`,`email`,`contact_number`,`gender`,`blood_group`,`occupation`,`present_address`,`permanent_address`) values 
(1,'G000001','Adnan.jpg','Ned Stark','1971159369251','nedstark@mail.com','01521369852','Male','A-','King','Winterfel','Winterfel'),
(2,'G000002','Adnan.jpg','Ramsey Bolton','1971259369271','ramsey@mail.com','01521369853','Male','A+','King','Winterfel','Winterfel'),
(3,'G000003','Adnan.jpg','John Snow','1971259361111','john@mail.com','01521369222','Male','O+','King','Winterfel','Winterfel'),
(4,'G000004','Adnan.jpg','Sansa Stark','1971259362222','sansa@mail.com','01521369333','Female','B+','Queen','Winterfel','Winterfel'),
(5,'G000005','Adnan.jpg','Bethoven','1971259369333','bethoven@mail.com','01521369444','Male','AB+','King','Winterfel','Winterfel'),
(6,'G000006','Adnan.jpg','David Gillmour','1971259555555','gillmour@mail.com','01521369555','Male','AB-','King','Winterfel','Winterfel'),
(7,'G000007','Adnan.jpg','Jose Mourinho','1971666666666','mourinho@mail.com','01521369666','Male','B-','King','Winterfel','Winterfel'),
(8,'G000008','Adnan.jpg','Luis Suarez','1985259369271','suarez@mail.com','01521369777','Male','A+','King','Winterfel','Winterfel'),
(9,'G000009','Adnan.jpg','Shahdat Hossain','1985259369271','shahdat@mail.com','01521369888','Male','A-','King','Winterfel','Winterfel'),
(10,'G000010','Adnan.jpg','Muhibul Hossain','1985259369271','nofel@mail.com','01521369999','Male','AB-','King','Winterfel','Winterfel'),
(11,'G000011','Adnan.jpg','Abu Sufian','1785259369271','sufian@mail.com','01721369853','Male','AB+','King','Winterfel','Winterfel'),
(12,'G000012','Adnan.jpg','Sheikh Hasina','1985259369271','hasina@mail.com','01821369853','Female','B-','Queen','Winterfel','Winterfel');

/*Table structure for table `db_users` */

DROP TABLE IF EXISTS `db_users`;

CREATE TABLE `db_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation_id` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `db_users` */

insert  into `db_users`(`id`,`designation_id`,`role`,`password`,`email`,`username`) values 
(1,1,4,'$2y$10$AAD.l6BJp1fOuawnDwYMG.zF6c8vwAkdpbRkGbozlzh53qDUx9HWS','teacher@mail.com','teacher'),
(2,1,5,'$2y$10$AAD.l6BJp1fOuawnDwYMG.zF6c8vwAkdpbRkGbozlzh53qDUx9HWS','guardian@mail.com','guardian'),
(3,1,3,'$2y$10$AAD.l6BJp1fOuawnDwYMG.zF6c8vwAkdpbRkGbozlzh53qDUx9HWS','headmaster@mail.com','headmaster'),
(4,1,2,'$2y$10$AAD.l6BJp1fOuawnDwYMG.zF6c8vwAkdpbRkGbozlzh53qDUx9HWS','admin@mail.com','admin'),
(5,10,7,'$2y$10$AAD.l6BJp1fOuawnDwYMG.zF6c8vwAkdpbRkGbozlzh53qDUx9HWS','michael@mail.com','accountant'),
(6,11,7,'$2y$10$AAD.l6BJp1fOuawnDwYMG.zF6c8vwAkdpbRkGbozlzh53qDUx9HWS','john@mail.com','accountant');

/*Table structure for table `db_account_invoices_view` */

DROP TABLE IF EXISTS `db_account_invoices_view`;

/*!50001 DROP VIEW IF EXISTS `db_account_invoices_view` */;
/*!50001 DROP TABLE IF EXISTS `db_account_invoices_view` */;

/*!50001 CREATE TABLE  `db_account_invoices_view`(
 `id` int(11) ,
 `student_id` int(11) ,
 `fee_type_id` int(11) ,
 `invoice_number` varchar(255) ,
 `invoice_note` varchar(255) ,
 `student_name` varchar(2295) ,
 `photo` varchar(2295) ,
 `fee_type_name` varchar(255) ,
 `fee_type_note` varchar(255) ,
 `amount` float ,
 `fine` float ,
 `discount_in_percentage` float ,
 `amount_after_fine_and_discount` float ,
 `date` date 
)*/;

/*Table structure for table `db_account_payments_view` */

DROP TABLE IF EXISTS `db_account_payments_view`;

/*!50001 DROP VIEW IF EXISTS `db_account_payments_view` */;
/*!50001 DROP TABLE IF EXISTS `db_account_payments_view` */;

/*!50001 CREATE TABLE  `db_account_payments_view`(
 `id` int(11) ,
 `student_id` int(11) ,
 `paid_amount` float ,
 `discount` float ,
 `receiver_id` int(11) ,
 `date` date ,
 `payment_method_id` int(11) ,
 `payment_method_name` varchar(255) ,
 `student_name` varchar(2295) ,
 `class_name` varchar(255) ,
 `section_name` varchar(255) ,
 `registration_no` varchar(765) ,
 `roll_no` varchar(765) ,
 `bank_id` int(11) ,
 `bank_name` varchar(50) 
)*/;

/*View structure for view db_account_invoices_view */

/*!50001 DROP TABLE IF EXISTS `db_account_invoices_view` */;
/*!50001 DROP VIEW IF EXISTS `db_account_invoices_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_account_invoices_view` AS select `db_account_invoices`.`id` AS `id`,`db_student_students`.`id` AS `student_id`,`db_account_fee_types`.`id` AS `fee_type_id`,`db_account_invoices`.`invoice_number` AS `invoice_number`,`db_account_invoices`.`note` AS `invoice_note`,`db_student_students`.`name` AS `student_name`,`db_student_students`.`photo` AS `photo`,`db_account_fee_types`.`fee_type_name` AS `fee_type_name`,`db_account_fee_types`.`note` AS `fee_type_note`,`db_account_invoices`.`amount` AS `amount`,`db_account_invoices`.`fine` AS `fine`,`db_account_invoices`.`discount_in_percentage` AS `discount_in_percentage`,`db_account_invoices`.`amount_after_fine_and_discount` AS `amount_after_fine_and_discount`,`db_account_invoices`.`date` AS `date` from ((`db_account_invoices` join `db_student_students` on((`db_student_students`.`id` = `db_account_invoices`.`student_id`))) join `db_account_fee_types` on((`db_account_fee_types`.`id` = `db_account_invoices`.`fee_type_id`))) */;

/*View structure for view db_account_payments_view */

/*!50001 DROP TABLE IF EXISTS `db_account_payments_view` */;
/*!50001 DROP VIEW IF EXISTS `db_account_payments_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_account_payments_view` AS select `db_account_payments`.`id` AS `id`,`db_account_payments`.`student_id` AS `student_id`,`db_account_payments`.`paid_amount` AS `paid_amount`,`db_account_payments`.`discount` AS `discount`,`db_account_payments`.`receiver_id` AS `receiver_id`,`db_account_payments`.`date` AS `date`,`db_account_payment_methods`.`id` AS `payment_method_id`,`db_account_payment_methods`.`payment_method_name` AS `payment_method_name`,`db_student_assignments_view`.`student_name` AS `student_name`,`db_student_assignments_view`.`class_name` AS `class_name`,`db_student_assignments_view`.`section_name` AS `section_name`,`db_student_assignments_view`.`registration_no` AS `registration_no`,`db_student_assignments_view`.`roll_no` AS `roll_no`,`db_account_banks`.`id` AS `bank_id`,`db_account_banks`.`bank_name` AS `bank_name` from (((`db_account_payments` join `db_account_payment_methods` on((`db_account_payment_methods`.`id` = `db_account_payments`.`payment_method_id`))) join `db_student_assignments_view` on((`db_account_payments`.`student_id` = `db_student_assignments_view`.`id`))) left join `db_account_banks` on((`db_account_payments`.`bank_id` = `db_account_banks`.`id`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
