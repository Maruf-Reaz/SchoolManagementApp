-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2019 at 12:02 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_academic_assignments`
--

CREATE TABLE `db_academic_assignments` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_academic_assignments`
--

INSERT INTO `db_academic_assignments` (`id`, `title`, `deadline`, `class_id`, `subject_id`, `file_name`, `description`) VALUES
(10, 'Assignment on Unit 1', '2018-09-20', 3, 5, 'An Automatic Attendance Monitoring System using RFID and IOT using Cloud.pdf', 'Class Assignment 1 for mid');

-- --------------------------------------------------------

--
-- Table structure for table `db_academic_assignment_sections`
--

CREATE TABLE `db_academic_assignment_sections` (
  `id` int(11) NOT NULL,
  `assignment_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_academic_assignment_sections`
--

INSERT INTO `db_academic_assignment_sections` (`id`, `assignment_id`, `section_id`) VALUES
(67, 10, 5),
(68, 10, 6),
(69, 10, 7),
(70, 10, 8);

-- --------------------------------------------------------

--
-- Table structure for table `db_academic_classes`
--

CREATE TABLE `db_academic_classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `numeric_value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_academic_classes`
--

INSERT INTO `db_academic_classes` (`id`, `name`, `numeric_value`) VALUES
(1, 'One', 1),
(2, 'Two', 2),
(3, 'Three', 3),
(4, 'Four', 4),
(5, 'Five', 5),
(6, 'Six', 6),
(7, 'Seven', 7),
(8, 'Eight', 8),
(9, 'Nine', 9),
(10, 'Ten', 10),
(11, 'Eleven', 11),
(12, 'Twelve', 12);

-- --------------------------------------------------------

--
-- Table structure for table `db_academic_class_sessions`
--

CREATE TABLE `db_academic_class_sessions` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `school_years_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_academic_class_sessions`
--

INSERT INTO `db_academic_class_sessions` (`id`, `class_id`, `school_years_id`, `status`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_academic_routines`
--

CREATE TABLE `db_academic_routines` (
  `id` int(11) NOT NULL,
  `school_year` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `day_id` int(11) DEFAULT NULL,
  `starting_time` time DEFAULT NULL,
  `ending_time` time DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_academic_routines`
--

INSERT INTO `db_academic_routines` (`id`, `school_year`, `class_id`, `subject_id`, `teacher_id`, `day_id`, `starting_time`, `ending_time`, `room_id`) VALUES
(1, '1', 2, 1, 1, 1, '11:00:00', '12:00:00', 2),
(2, '1', 2, 1, 4, 2, '10:00:00', '12:30:00', 2),
(3, '1', 2, 1, 1, 1, '01:00:00', '02:00:00', 1),
(4, '1', 1, 3, 5, 1, '12:00:00', '01:00:00', 1),
(5, '1', 1, 3, 1, 1, '12:00:00', '01:00:00', 1),
(6, '1', 3, 5, 1, 1, '08:00:00', '11:00:00', 1),
(8, '1', 2, 1, 1, 1, '09:00:00', '10:00:00', 2),
(9, '1', 1, 2, 1, 1, '10:00:00', '11:00:00', 2),
(10, '1', 3, 6, 1, 3, '10:00:00', '11:00:00', 2),
(11, '1', 3, 5, 1, 3, '08:00:00', '09:00:00', 2),
(12, '1', 3, 6, 16, 3, '09:00:00', '10:00:00', 2),
(13, '1', 3, 6, 4, 2, '08:00:00', '08:00:00', 2),
(14, '1', 3, 6, 1, 2, '10:00:00', '11:00:00', 1),
(15, '1', 3, 6, 2, 6, '10:00:00', '11:00:00', 4),
(16, '1', 3, 5, 2, 6, '11:00:00', '12:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `db_academic_routine_sections`
--

CREATE TABLE `db_academic_routine_sections` (
  `id` int(11) NOT NULL,
  `routine_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_academic_routine_sections`
--

INSERT INTO `db_academic_routine_sections` (`id`, `routine_id`, `section_id`) VALUES
(19, 2, 4),
(20, 2, 3),
(21, 3, 4),
(22, 4, 1),
(23, 4, 2),
(24, 5, 1),
(25, 6, 5),
(26, 6, 6),
(36, 7, 3),
(37, 1, 4),
(38, 1, 3),
(39, 8, 4),
(40, 9, 1),
(41, 10, 5),
(42, 11, 5),
(43, 12, 5),
(44, 13, 5),
(45, 14, 7),
(46, 15, 5),
(47, 16, 5);

-- --------------------------------------------------------

--
-- Table structure for table `db_academic_school_years`
--

CREATE TABLE `db_academic_school_years` (
  `id` int(11) NOT NULL,
  `year` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_academic_school_years`
--

INSERT INTO `db_academic_school_years` (`id`, `year`) VALUES
(1, '2018-2019');

-- --------------------------------------------------------

--
-- Table structure for table `db_academic_sections`
--

CREATE TABLE `db_academic_sections` (
  `id` int(11) NOT NULL,
  `name` varchar(765) DEFAULT NULL,
  `catagory` varchar(765) DEFAULT NULL,
  `capacity` varchar(765) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_academic_sections`
--

INSERT INTO `db_academic_sections` (`id`, `name`, `catagory`, `capacity`, `class_id`, `teacher_id`) VALUES
(1, 'A', 'Male', '40', 1, 1),
(2, 'B', 'Male', '40', 1, 2),
(3, 'C', 'Female', '44', 2, 3),
(4, 'A', 'Male', '33', 2, 4),
(5, 'A', 'Male', '40', 3, 5),
(6, 'B', 'Male', '40', 3, 6),
(7, 'C', 'Male', '40', 4, 7),
(8, 'D', 'Female', '40', 4, 8);

-- --------------------------------------------------------

--
-- Stand-in structure for view `db_academic_sections_view`
-- (See below for the actual view)
--
CREATE TABLE `db_academic_sections_view` (
`id` int(11)
,`section_name` varchar(765)
,`class_id` int(11)
,`catagory` varchar(765)
,`capacity` varchar(765)
,`teacher_name` varchar(765)
);

-- --------------------------------------------------------

--
-- Table structure for table `db_academic_subjects`
--

CREATE TABLE `db_academic_subjects` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `type` varchar(765) DEFAULT NULL,
  `pass_mark` varchar(765) DEFAULT NULL,
  `final_mark` varchar(765) DEFAULT NULL,
  `subject_name` varchar(765) DEFAULT NULL,
  `subject_code` varchar(765) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_academic_subjects`
--

INSERT INTO `db_academic_subjects` (`id`, `class_id`, `type`, `pass_mark`, `final_mark`, `subject_name`, `subject_code`) VALUES
(1, 1, 'mandatory', '34', '100', 'English', '110'),
(2, 1, 'mandatory', '34', '100', 'Bangla', '101'),
(3, 2, 'mandatory', '34', '100', 'English', '110'),
(4, 2, 'mandatory', '34', '100', 'Bangla', '101'),
(5, 3, 'mandatory', '34', '100', 'English', '110'),
(6, 3, 'mandatory', '34', '100', 'Bangla', '101'),
(7, 4, 'mandatory', '34', '100', 'English', '110'),
(8, 4, 'mandatory', '34', '100', 'Bangla', '101');

-- --------------------------------------------------------

--
-- Table structure for table `db_academic_syllabus`
--

CREATE TABLE `db_academic_syllabus` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_academic_syllabus`
--

INSERT INTO `db_academic_syllabus` (`id`, `title`, `description`, `class_id`, `file_name`, `user_id`, `date`) VALUES
(13, 'Bangla 2nd paper', 'Bangla syllabus for class one', 2, 'Naming Conventions of EMS mvc v1.pdf', 1, '2018-12-23 14:30:12'),
(14, 'English', 'English syllabus for class Two', 2, 'Enterprise Resource Planning Software.docx', 1, '2018-09-12 17:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `db_account_accountants`
--

CREATE TABLE `db_account_accountants` (
  `id` int(11) NOT NULL,
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
  `permanent_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_account_accountants`
--

INSERT INTO `db_account_accountants` (`id`, `registration_no`, `photo`, `accountant_name`, `nid_number`, `email`, `contact_number`, `educational_qualification`, `gender`, `blood_group`, `present_address`, `permanent_address`) VALUES
(10, 'A000010', 'Adnan.jpg', 'Michael Lorens', '1996123789456', 'michael@mail.com', '01715123456', 'Degree', 'Male', 'B+', 'Jamalkhan Chittagong', 'Jamalkhan Chittagong'),
(11, 'A000011', 'robert.jpg', 'John Lorens', '1996123456789', 'john@mail.com', '01921564789', 'Degree', 'Male', 'B+', 'England', 'England');

-- --------------------------------------------------------

--
-- Table structure for table `db_account_banks`
--

CREATE TABLE `db_account_banks` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_account_banks`
--

INSERT INTO `db_account_banks` (`id`, `bank_name`, `note`) VALUES
(1, 'City Bank Ltd.', 'Great'),
(2, 'Prime Bank Ltd.', 'Better'),
(3, 'Islami Bank Ltd.', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `db_account_bank_wise_transactions`
--

CREATE TABLE `db_account_bank_wise_transactions` (
  `id` int(11) NOT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `debit` float DEFAULT NULL,
  `credit` float DEFAULT NULL,
  `balance` float DEFAULT NULL,
  `maker_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_account_bank_wise_transactions`
--

INSERT INTO `db_account_bank_wise_transactions` (`id`, `bank_id`, `debit`, `credit`, `balance`, `maker_id`, `date`) VALUES
(1, 1, 0, 20000, 20000, 5, '2018-12-17'),
(2, 1, 1000, 0, 21000, 5, '2019-01-13'),
(3, 1, 1000, 0, 22000, 5, '2019-01-13'),
(4, 1, 1000, 0, 23000, 5, '2019-01-13'),
(5, 1, 1000, 0, 24000, 5, '2019-01-13'),
(6, 1, 1000, 0, 25000, 5, '2019-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `db_account_expenses`
--

CREATE TABLE `db_account_expenses` (
  `id` int(11) NOT NULL,
  `expense_type_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_account_expense_types`
--

CREATE TABLE `db_account_expense_types` (
  `id` int(11) NOT NULL,
  `expense_type_name` varchar(100) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_account_expense_types`
--

INSERT INTO `db_account_expense_types` (`id`, `expense_type_name`, `note`) VALUES
(1, 'Entertainment', 'Expense for entertainment of Students'),
(2, 'Utilities', 'Expense for utility of School');

-- --------------------------------------------------------

--
-- Table structure for table `db_account_fees`
--

CREATE TABLE `db_account_fees` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `fee_type_id` int(11) DEFAULT NULL,
  `fee_amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_account_fees`
--

INSERT INTO `db_account_fees` (`id`, `class_id`, `fee_type_id`, `fee_amount`) VALUES
(1, 1, 31, 3000),
(2, 1, 32, 10000),
(3, 2, 31, 4000),
(4, 2, 32, 12000),
(5, 1, 33, 500);

-- --------------------------------------------------------

--
-- Table structure for table `db_account_fee_types`
--

CREATE TABLE `db_account_fee_types` (
  `id` int(11) NOT NULL,
  `fee_type_name` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_account_fee_types`
--

INSERT INTO `db_account_fee_types` (`id`, `fee_type_name`, `note`) VALUES
(18, 'Tution Fee[JANUARY]', 'tution fees for a year'),
(19, 'Tution Fee[FEBRUARY]', 'tution fees for a year'),
(20, 'Tution Fee[MARCH]', 'tution fees for a year'),
(21, 'Tution Fee[APRIL]', 'tution fees for a year'),
(22, 'Tution Fee[MAY]', 'tution fees for a year'),
(23, 'Tution Fee[JUNE]', 'tution fees for a year'),
(24, 'Tution Fee[JULY]', 'tution fees for a year'),
(25, 'Tution Fee[AUGUST]', 'tution fees for a year'),
(26, 'Tution Fee[SEPTEMBER]', 'tution fees for a year'),
(27, 'Tution Fee[OCTOBER]', 'tution fees for a year'),
(28, 'Tution Fee[NOVEMBER]', 'tution fees for a year'),
(29, 'Tution Fee[DECEMBER]', 'tution fees for a year'),
(30, 'Library Fee', 'Library Fee for School Students'),
(31, 'Tution Fee', 'Tution Fees For Students'),
(32, 'Admission Fee', 'Admission Fees For Students'),
(33, 'Exam Fee', 'Exam Fees For Students'),
(34, 'Library Fee', 'Library Fees For Students');

-- --------------------------------------------------------

--
-- Table structure for table `db_account_incomes`
--

CREATE TABLE `db_account_incomes` (
  `id` int(11) NOT NULL,
  `income_type_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_account_incomes`
--

INSERT INTO `db_account_incomes` (`id`, `income_type_id`, `date`, `receiver_id`, `amount`, `note`) VALUES
(1, 6, '2018-12-17', 10, 3000, 'Withdrawal For Expense');

-- --------------------------------------------------------

--
-- Table structure for table `db_account_income_types`
--

CREATE TABLE `db_account_income_types` (
  `id` int(11) NOT NULL,
  `income_type_name` varchar(100) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_account_income_types`
--

INSERT INTO `db_account_income_types` (`id`, `income_type_name`, `note`) VALUES
(1, 'Donation', 'Donation Received From Someone'),
(3, 'Initial Amount', 'Amount Initialized By Authority'),
(4, 'Additional Amount', 'Amount Added By Authority'),
(5, 'Old Assets Sold', 'Assets Sold From School'),
(6, 'Bank Withdrawal', 'Withdrawal For A Purpose');

-- --------------------------------------------------------

--
-- Table structure for table `db_account_invoices`
--

CREATE TABLE `db_account_invoices` (
  `id` int(11) NOT NULL,
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
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_account_invoices`
--

INSERT INTO `db_account_invoices` (`id`, `student_id`, `fee_type_id`, `month`, `year`, `invoice_number`, `note`, `amount`, `discount_in_percentage`, `fine`, `amount_after_fine_and_discount`, `date`) VALUES
(1, 8, 31, 'May', '2018', '20181217025745118', 'Invoice Of May 2018', 3000, 0, 0, 3000, '2018-12-17'),
(2, 2, 31, 'May', '2018', '20181217025745112', 'Invoice Of May 2018', 3000, 0, 0, 3000, '2018-12-17'),
(3, 3, 31, 'May', '2018', '20181217025845123', 'Invoice Of May 2018', 3000, 0, 0, 3000, '2018-12-17'),
(4, 9, 31, 'May', '2018', '20181217025921129', 'Invoice Of May 2018', 3000, 0, 0, 3000, '2018-12-17'),
(5, 13, 31, 'May', '2018', '201812170300352513', 'Invoice Of May 2018', 4000, 0, 0, 4000, '2018-12-17'),
(6, 12, 31, 'May', '2018', '201812170300352512', 'Invoice Of May 2018', 4000, 0, 0, 4000, '2018-12-17'),
(7, 2, 31, 'June', '2018', '20181218060148112', 'Invoice Of June 2018', 3000, 0, 0, 3000, '2018-12-18'),
(8, 2, 31, 'January', '2018', '20181226093309112', 'Invoice Of January 2018', 3000, 10, 400, 3100, '2018-12-26'),
(9, 23, 31, 'February', '2016', '201812260936292423', 'Invoice Of February 2016', 4000, 10, 50, 3650, '2018-12-26'),
(10, 21, 31, 'February', '2017', '201812260938572321', 'Invoice Of February 2017', 4000, 5, 89, 3889, '2018-12-26'),
(11, 22, 31, 'February', '2017', '201812260938572322', 'Invoice Of February 2017', 4000, 12, 97, 3617, '2018-12-26');

-- --------------------------------------------------------

--
-- Stand-in structure for view `db_account_invoices_view`
-- (See below for the actual view)
--
CREATE TABLE `db_account_invoices_view` (
`id` int(11)
,`student_id` int(11)
,`fee_type_id` int(11)
,`invoice_number` varchar(255)
,`invoice_note` varchar(255)
,`student_name` varchar(765)
,`photo` varchar(765)
,`fee_type_name` varchar(255)
,`fee_type_note` varchar(255)
,`amount` float
,`fine` float
,`discount_in_percentage` float
,`amount_after_fine_and_discount` float
,`date` date
);

-- --------------------------------------------------------

--
-- Table structure for table `db_account_payments`
--

CREATE TABLE `db_account_payments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `paid_amount` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_account_payments`
--

INSERT INTO `db_account_payments` (`id`, `student_id`, `paid_amount`, `discount`, `payment_method_id`, `bank_id`, `receiver_id`, `date`) VALUES
(1, 2, 1000, 0, 1, NULL, 10, '2018-12-17'),
(2, 2, 500, 0, 1, NULL, 10, '2018-12-17'),
(3, 12, 2000, 0, 1, NULL, 11, '2018-12-17'),
(5, 12, 500, 0, 2, 1, 11, '2018-12-17'),
(6, 8, 2500, 0, 1, NULL, 11, '2018-12-17'),
(7, 13, 2000, 0, 2, 1, 10, '2018-12-17'),
(8, 23, 90, 0, 1, NULL, 10, '2018-12-26');

-- --------------------------------------------------------

--
-- Stand-in structure for view `db_account_payments_view`
-- (See below for the actual view)
--
CREATE TABLE `db_account_payments_view` (
`id` int(11)
,`student_id` int(11)
,`paid_amount` float
,`discount` float
,`receiver_id` int(11)
,`date` date
,`payment_method_id` int(11)
,`payment_method_name` varchar(255)
,`student_name` varchar(765)
,`class_name` varchar(255)
,`section_name` varchar(765)
,`registration_no` varchar(255)
,`roll_no` varchar(255)
,`bank_id` int(11)
,`bank_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `db_account_payment_methods`
--

CREATE TABLE `db_account_payment_methods` (
  `id` int(11) NOT NULL,
  `payment_method_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_account_payment_methods`
--

INSERT INTO `db_account_payment_methods` (`id`, `payment_method_name`) VALUES
(1, 'Cash'),
(2, 'Cheque');

-- --------------------------------------------------------

--
-- Table structure for table `db_account_received_payments`
--

CREATE TABLE `db_account_received_payments` (
  `id` int(11) NOT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `accountant_id` int(11) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `receive_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_account_received_payments`
--

INSERT INTO `db_account_received_payments` (`id`, `payment_method_id`, `amount`, `discount`, `accountant_id`, `payment_date`, `receive_date`) VALUES
(1, 1, 0, 0, 10, '2019-01-13', '2019-01-13'),
(2, 2, 0, 0, 10, '2019-01-13', '2019-01-13'),
(3, 1, 0, 0, 11, '2019-01-13', '2019-01-13'),
(4, 2, 0, 0, 11, '2019-01-13', '2019-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `db_announcement_holidays`
--

CREATE TABLE `db_announcement_holidays` (
  `id` int(11) NOT NULL,
  `title` varchar(765) DEFAULT NULL,
  `from_date` varchar(765) DEFAULT NULL,
  `to_date` varchar(765) DEFAULT NULL,
  `details` varchar(765) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_announcement_holidays`
--

INSERT INTO `db_announcement_holidays` (`id`, `title`, `from_date`, `to_date`, `details`) VALUES
(1, 'Eid', '10/01/2018', '10/04/2018', 'Eid Ul Fitr');

-- --------------------------------------------------------

--
-- Table structure for table `db_announcement_notices`
--

CREATE TABLE `db_announcement_notices` (
  `id` int(11) NOT NULL,
  `title` varchar(765) DEFAULT NULL,
  `date` varchar(765) DEFAULT NULL,
  `notice` varchar(765) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_attendance_devices`
--

CREATE TABLE `db_attendance_devices` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `internal_id` int(11) DEFAULT NULL,
  `com_key` int(11) DEFAULT NULL,
  `device_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `soap_port` int(11) DEFAULT NULL,
  `udp_port` int(11) DEFAULT NULL,
  `encoding` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_attendance_devices`
--

INSERT INTO `db_attendance_devices` (`id`, `ip`, `internal_id`, `com_key`, `device_name`, `description`, `soap_port`, `udp_port`, `encoding`, `status`) VALUES
(1, '192.168.1.203', 1, 0, 'ZKTeco F18', 'Front Door', 80, 4370, 'iso8859-1', 1),
(2, '192.168.1.205', 1, 0, 'ZKTeco F18', 'Back Door', 80, 4370, 'utf-8', 1),
(3, '192.168.1.201', 1, 0, 'ZKTeco UA500', 'Middle Order Attendance Device', 80, 4370, 'utf-8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_attendance_employee_att`
--

CREATE TABLE `db_attendance_employee_att` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_attendance_employee_att`
--

INSERT INTO `db_attendance_employee_att` (`id`, `role_id`, `designation_id`, `status`, `note`, `datetime`, `user_id`, `updated_at`) VALUES
(1, 4, 1, 1, '', '2018-10-22 00:00:00', 1, '2018-10-23 11:25:40'),
(2, 4, 2, 1, '', '2018-10-22 00:00:00', 1, '2018-10-23 11:25:40'),
(3, 4, 3, 1, '', '2018-10-22 00:00:00', 1, '2018-10-23 11:25:41'),
(4, 4, 4, 0, '', '2018-10-22 00:00:00', 1, '2018-10-23 11:25:41'),
(5, 4, 5, 0, '', '2018-10-22 00:00:00', 1, '2018-10-23 11:25:41'),
(6, 4, 16, 1, '', '2018-10-22 00:00:00', 1, '2018-10-23 11:25:41'),
(9, 4, 1, 1, '', '2018-10-21 00:00:00', 1, '2018-10-23 11:25:31'),
(10, 4, 2, 1, '', '2018-10-21 00:00:00', 1, '2018-10-23 11:25:31'),
(11, 4, 3, 1, '', '2018-10-21 00:00:00', 1, '2018-10-23 11:25:31'),
(12, 4, 4, 1, '', '2018-10-21 00:00:00', 1, '2018-10-23 11:25:31'),
(13, 4, 5, 1, '', '2018-10-21 00:00:00', 1, '2018-10-23 11:25:32'),
(14, 4, 16, 1, '', '2018-10-21 00:00:00', 1, '2018-10-23 11:25:32'),
(15, 4, 1, 1, '', '2018-10-23 00:00:00', 1, '2018-10-23 11:25:10'),
(16, 4, 2, 1, '', '2018-10-23 00:00:00', 1, '2018-10-23 11:25:10'),
(17, 4, 3, 1, '', '2018-10-23 00:00:00', 1, '2018-10-23 11:25:10'),
(18, 4, 4, 1, '', '2018-10-23 00:00:00', 1, '2018-10-23 11:25:10'),
(19, 4, 5, 1, '', '2018-10-23 00:00:00', 1, '2018-10-23 11:25:10'),
(20, 4, 16, 1, '', '2018-10-23 00:00:00', 1, '2018-10-23 11:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `db_attendance_holidays`
--

CREATE TABLE `db_attendance_holidays` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_attendance_holidays`
--

INSERT INTO `db_attendance_holidays` (`id`, `date`, `name`) VALUES
(1, '0000-03-17', 'Sheikh Mujibur Rahman\'s Birthday'),
(2, '0000-02-21', 'Language Martyre\'s Day'),
(3, '0000-03-26', '	Independence Day'),
(4, '0000-04-14', 'Bengali New Year');

-- --------------------------------------------------------

--
-- Table structure for table `db_attendance_log`
--

CREATE TABLE `db_attendance_log` (
  `id` int(11) NOT NULL,
  `pin` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `verify_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `workcode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_attendance_student_att`
--

CREATE TABLE `db_attendance_student_att` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `note` varchar(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_attendance_student_att`
--

INSERT INTO `db_attendance_student_att` (`id`, `student_id`, `status`, `note`, `datetime`) VALUES
(1, 7, 1, 'Not well to', '2018-10-18 00:00:00'),
(2, 8, 1, 'Good', '2018-10-18 00:00:00'),
(3, 9, 1, 'Good', '2018-10-18 00:00:00'),
(4, 7, 1, 'Good', '2018-10-17 00:00:00'),
(5, 8, 1, 'Good', '2018-10-17 00:00:00'),
(6, 9, 1, 'Good', '2018-10-17 00:00:00'),
(7, 7, 1, '', '2018-10-20 00:00:00'),
(8, 8, 1, '', '2018-10-20 00:00:00'),
(9, 9, 1, '', '2018-10-20 00:00:00'),
(10, 7, 0, 'Not well to', '2018-10-21 00:00:00'),
(11, 8, 1, 'Good', '2018-10-21 00:00:00'),
(12, 9, 2, 'Not well to', '2018-10-21 00:00:00'),
(13, 7, 1, '', '2018-10-22 00:00:00'),
(14, 8, 1, '', '2018-10-22 00:00:00'),
(15, 9, 1, '', '2018-10-22 00:00:00'),
(16, 7, 1, '', '2018-10-02 00:00:00'),
(17, 8, 1, '', '2018-10-02 00:00:00'),
(18, 9, 1, '', '2018-10-02 00:00:00'),
(19, 7, 1, '', '2018-10-26 00:00:00'),
(20, 8, 1, '', '2018-10-26 00:00:00'),
(21, 9, 1, '', '2018-10-26 00:00:00'),
(22, 7, 0, '', '2018-10-29 00:00:00'),
(23, 8, 1, '', '2018-10-29 00:00:00'),
(24, 9, 0, '', '2018-10-29 00:00:00'),
(25, 7, 1, '', '2018-11-05 00:00:00'),
(26, 8, 0, '', '2018-11-05 00:00:00'),
(27, 9, 1, '', '2018-11-05 00:00:00'),
(28, 7, 1, '', '2018-10-01 00:00:00'),
(29, 8, 1, '', '2018-10-01 00:00:00'),
(30, 9, 1, '', '2018-10-01 00:00:00'),
(31, 7, 0, '', '2018-11-11 00:00:00'),
(32, 8, 0, '', '2018-11-11 00:00:00'),
(33, 9, 0, '', '2018-11-11 00:00:00'),
(34, 7, 1, '', '2018-10-11 00:00:00'),
(35, 8, 1, '', '2018-10-11 00:00:00'),
(36, 9, 1, '', '2018-10-11 00:00:00'),
(37, 7, 1, '', '2018-11-01 00:00:00'),
(38, 8, 1, '', '2018-11-01 00:00:00'),
(39, 9, 0, '', '2018-11-01 00:00:00'),
(40, 7, 1, '', '2018-11-02 00:00:00'),
(41, 8, 1, '', '2018-11-02 00:00:00'),
(42, 9, 1, '', '2018-11-02 00:00:00'),
(43, 7, 1, '', '2018-11-03 00:00:00'),
(44, 8, 1, '', '2018-11-03 00:00:00'),
(45, 9, 1, '', '2018-11-03 00:00:00'),
(46, 10, 1, '', '2018-11-01 00:00:00'),
(47, 11, 1, '', '2018-11-01 00:00:00'),
(48, 13, 0, '', '2018-11-01 00:00:00'),
(49, 14, 0, '', '2018-11-01 00:00:00'),
(50, 15, 1, '', '2018-11-01 00:00:00'),
(51, 16, 0, '', '2018-11-01 00:00:00'),
(52, 17, 1, '', '2018-11-01 00:00:00'),
(53, 18, 1, '', '2018-11-01 00:00:00'),
(54, 10, 1, '', '2018-11-02 00:00:00'),
(55, 11, 1, '', '2018-11-02 00:00:00'),
(56, 13, 1, '', '2018-11-02 00:00:00'),
(57, 14, 1, '', '2018-11-02 00:00:00'),
(58, 15, 1, '', '2018-11-02 00:00:00'),
(59, 16, 1, '', '2018-11-02 00:00:00'),
(60, 17, 1, '', '2018-11-02 00:00:00'),
(61, 18, 1, '', '2018-11-02 00:00:00'),
(62, 10, 1, '', '2018-11-03 00:00:00'),
(63, 11, 1, '', '2018-11-03 00:00:00'),
(64, 13, 1, '', '2018-11-03 00:00:00'),
(65, 14, 1, '', '2018-11-03 00:00:00'),
(66, 15, 1, '', '2018-11-03 00:00:00'),
(67, 16, 1, '', '2018-11-03 00:00:00'),
(68, 17, 1, '', '2018-11-03 00:00:00'),
(69, 18, 1, '', '2018-11-03 00:00:00'),
(70, 7, 1, '', '2018-11-04 00:00:00'),
(71, 8, 1, '', '2018-11-04 00:00:00'),
(72, 9, 1, '', '2018-11-04 00:00:00'),
(73, 10, 1, '', '2018-11-04 00:00:00'),
(74, 11, 1, '', '2018-11-04 00:00:00'),
(75, 13, 0, '', '2018-11-04 00:00:00'),
(76, 14, 1, '', '2018-11-04 00:00:00'),
(77, 15, 1, '', '2018-11-04 00:00:00'),
(78, 16, 0, '', '2018-11-04 00:00:00'),
(79, 17, 1, '', '2018-11-04 00:00:00'),
(80, 18, 1, '', '2018-11-04 00:00:00'),
(81, 10, 0, '', '2018-11-05 00:00:00'),
(82, 11, 0, '', '2018-11-05 00:00:00'),
(83, 13, 1, '', '2018-11-05 00:00:00'),
(84, 14, 1, '', '2018-11-05 00:00:00'),
(85, 15, 0, '', '2018-11-05 00:00:00'),
(86, 16, 1, '', '2018-11-05 00:00:00'),
(87, 17, 1, '', '2018-11-05 00:00:00'),
(88, 18, 0, '', '2018-11-05 00:00:00'),
(89, 7, 1, '', '2018-11-06 00:00:00'),
(90, 8, 1, '', '2018-11-06 00:00:00'),
(91, 9, 1, '', '2018-11-06 00:00:00'),
(92, 10, 1, '', '2018-11-06 00:00:00'),
(93, 11, 1, '', '2018-11-06 00:00:00'),
(94, 13, 1, '', '2018-11-06 00:00:00'),
(95, 14, 1, '', '2018-11-06 00:00:00'),
(96, 15, 1, '', '2018-11-06 00:00:00'),
(97, 16, 1, '', '2018-11-06 00:00:00'),
(98, 17, 1, '', '2018-11-06 00:00:00'),
(99, 18, 1, '', '2018-11-06 00:00:00'),
(100, 7, 0, '', '2018-10-06 00:00:00'),
(101, 8, 0, '', '2018-10-06 00:00:00'),
(102, 9, 0, '', '2018-10-06 00:00:00'),
(103, 10, 0, '', '2018-10-06 00:00:00'),
(104, 11, 0, '', '2018-10-06 00:00:00'),
(105, 12, 0, '', '2018-10-06 00:00:00'),
(106, 13, 0, '', '2018-10-06 00:00:00'),
(107, 14, 0, '', '2018-10-06 00:00:00'),
(108, 15, 0, '', '2018-10-06 00:00:00'),
(109, 16, 0, '', '2018-10-06 00:00:00'),
(110, 17, 0, '', '2018-10-06 00:00:00'),
(111, 18, 0, '', '2018-10-06 00:00:00'),
(112, 19, 0, '', '2018-10-06 00:00:00'),
(113, 20, 0, '', '2018-10-06 00:00:00'),
(114, 12, 2, '', '2018-11-01 00:00:00'),
(115, 19, 1, '', '2018-11-01 00:00:00'),
(116, 20, 1, '', '2018-11-01 00:00:00'),
(117, 10, 0, '', '2018-10-01 00:00:00'),
(118, 11, 0, '', '2018-10-01 00:00:00'),
(119, 12, 1, '', '2018-10-01 00:00:00'),
(120, 13, 1, '', '2018-10-01 00:00:00'),
(121, 14, 1, '', '2018-10-01 00:00:00'),
(122, 15, 0, '', '2018-10-01 00:00:00'),
(123, 16, 1, '', '2018-10-01 00:00:00'),
(124, 17, 1, '', '2018-10-01 00:00:00'),
(125, 18, 1, '', '2018-10-01 00:00:00'),
(126, 19, 1, '', '2018-10-01 00:00:00'),
(127, 20, 1, '', '2018-10-01 00:00:00'),
(128, 10, 1, '', '2018-10-02 00:00:00'),
(129, 11, 1, '', '2018-10-02 00:00:00'),
(130, 12, 1, '', '2018-10-02 00:00:00'),
(131, 13, 1, '', '2018-10-02 00:00:00'),
(132, 14, 1, '', '2018-10-02 00:00:00'),
(133, 15, 1, '', '2018-10-02 00:00:00'),
(134, 16, 1, '', '2018-10-02 00:00:00'),
(135, 17, 1, '', '2018-10-02 00:00:00'),
(136, 18, 1, '', '2018-10-02 00:00:00'),
(137, 19, 1, '', '2018-10-02 00:00:00'),
(138, 20, 1, '', '2018-10-02 00:00:00'),
(139, 12, 1, '', '2018-11-03 00:00:00'),
(140, 19, 1, '', '2018-11-03 00:00:00'),
(141, 20, 1, '', '2018-11-03 00:00:00'),
(142, 7, 1, '', '2018-10-04 00:00:00'),
(143, 8, 1, '', '2018-10-04 00:00:00'),
(144, 9, 1, '', '2018-10-04 00:00:00'),
(145, 10, 1, '', '2018-10-04 00:00:00'),
(146, 11, 1, '', '2018-10-04 00:00:00'),
(147, 12, 1, '', '2018-10-04 00:00:00'),
(148, 13, 1, '', '2018-10-04 00:00:00'),
(149, 14, 1, '', '2018-10-04 00:00:00'),
(150, 15, 1, '', '2018-10-04 00:00:00'),
(151, 16, 1, '', '2018-10-04 00:00:00'),
(152, 17, 1, '', '2018-10-04 00:00:00'),
(153, 18, 1, '', '2018-10-04 00:00:00'),
(154, 19, 1, '', '2018-10-04 00:00:00'),
(155, 20, 1, '', '2018-10-04 00:00:00'),
(156, 7, 1, '', '2018-10-03 00:00:00'),
(157, 8, 1, '', '2018-10-03 00:00:00'),
(158, 9, 1, '', '2018-10-03 00:00:00'),
(159, 10, 1, '', '2018-10-03 00:00:00'),
(160, 11, 1, '', '2018-10-03 00:00:00'),
(161, 12, 1, '', '2018-10-03 00:00:00'),
(162, 13, 1, '', '2018-10-03 00:00:00'),
(163, 14, 1, '', '2018-10-03 00:00:00'),
(164, 15, 1, '', '2018-10-03 00:00:00'),
(165, 16, 1, '', '2018-10-03 00:00:00'),
(166, 17, 1, '', '2018-10-03 00:00:00'),
(167, 18, 1, '', '2018-10-03 00:00:00'),
(168, 19, 1, '', '2018-10-03 00:00:00'),
(169, 20, 1, '', '2018-10-03 00:00:00'),
(170, 7, 0, '', '2018-10-05 00:00:00'),
(171, 8, 0, '', '2018-10-05 00:00:00'),
(172, 9, 0, '', '2018-10-05 00:00:00'),
(173, 10, 0, '', '2018-10-05 00:00:00'),
(174, 11, 0, '', '2018-10-05 00:00:00'),
(175, 12, 0, '', '2018-10-05 00:00:00'),
(176, 13, 0, '', '2018-10-05 00:00:00'),
(177, 14, 0, '', '2018-10-05 00:00:00'),
(178, 15, 0, '', '2018-10-05 00:00:00'),
(179, 16, 0, '', '2018-10-05 00:00:00'),
(180, 17, 0, '', '2018-10-05 00:00:00'),
(181, 18, 0, '', '2018-10-05 00:00:00'),
(182, 19, 0, '', '2018-10-05 00:00:00'),
(183, 20, 0, '', '2018-10-05 00:00:00'),
(184, 7, 1, '', '2018-10-07 00:00:00'),
(185, 8, 1, '', '2018-10-07 00:00:00'),
(186, 9, 1, '', '2018-10-07 00:00:00'),
(187, 10, 1, '', '2018-10-07 00:00:00'),
(188, 11, 1, '', '2018-10-07 00:00:00'),
(189, 12, 1, '', '2018-10-07 00:00:00'),
(190, 13, 1, '', '2018-10-07 00:00:00'),
(191, 14, 1, '', '2018-10-07 00:00:00'),
(192, 15, 1, '', '2018-10-07 00:00:00'),
(193, 16, 1, '', '2018-10-07 00:00:00'),
(194, 17, 1, '', '2018-10-07 00:00:00'),
(195, 18, 1, '', '2018-10-07 00:00:00'),
(196, 19, 1, '', '2018-10-07 00:00:00'),
(197, 20, 1, '', '2018-10-07 00:00:00'),
(198, 7, 1, '', '2018-11-18 00:00:00'),
(199, 8, 1, '', '2018-11-18 00:00:00'),
(200, 9, 1, '', '2018-11-18 00:00:00'),
(201, 10, 1, '', '2018-11-18 00:00:00'),
(202, 11, 1, '', '2018-11-18 00:00:00'),
(203, 12, 1, '', '2018-11-18 00:00:00'),
(204, 13, 1, '', '2018-11-18 00:00:00'),
(205, 14, 1, '', '2018-11-18 00:00:00'),
(206, 15, 1, '', '2018-11-18 00:00:00'),
(207, 16, 1, '', '2018-11-18 00:00:00'),
(208, 17, 1, '', '2018-11-18 00:00:00'),
(209, 18, 1, '', '2018-11-18 00:00:00'),
(210, 19, 1, '', '2018-11-18 00:00:00'),
(211, 20, 1, '', '2018-11-18 00:00:00'),
(212, 7, 1, '', '2018-11-18 00:00:00'),
(213, 8, 1, '', '2018-11-18 00:00:00'),
(214, 9, 1, '', '2018-11-18 00:00:00'),
(215, 10, 1, '', '2018-11-18 00:00:00'),
(216, 11, 1, '', '2018-11-18 00:00:00'),
(217, 12, 1, '', '2018-11-18 00:00:00'),
(218, 13, 1, '', '2018-11-18 00:00:00'),
(219, 14, 1, '', '2018-11-18 00:00:00'),
(220, 15, 1, '', '2018-11-18 00:00:00'),
(221, 16, 1, '', '2018-11-18 00:00:00'),
(222, 17, 1, '', '2018-11-18 00:00:00'),
(223, 18, 1, '', '2018-11-18 00:00:00'),
(224, 19, 1, '', '2018-11-18 00:00:00'),
(225, 20, 1, '', '2018-11-18 00:00:00'),
(226, 7, 1, '', '2018-11-14 00:00:00'),
(227, 8, 1, '', '2018-11-14 00:00:00'),
(228, 9, 0, '', '2018-11-14 00:00:00'),
(229, 10, 1, '', '2018-11-14 00:00:00'),
(230, 11, 1, '', '2018-11-14 00:00:00'),
(231, 12, 1, '', '2018-11-14 00:00:00'),
(232, 13, 1, '', '2018-11-14 00:00:00'),
(233, 14, 1, '', '2018-11-14 00:00:00'),
(234, 15, 1, '', '2018-11-14 00:00:00'),
(235, 16, 1, '', '2018-11-14 00:00:00'),
(236, 17, 1, '', '2018-11-14 00:00:00'),
(237, 18, 1, '', '2018-11-14 00:00:00'),
(238, 19, 1, '', '2018-11-14 00:00:00'),
(239, 20, 1, '', '2018-11-14 00:00:00'),
(240, 7, 1, NULL, '2018-11-26 00:00:00'),
(241, 8, 1, NULL, '2018-11-26 00:00:00'),
(242, 9, 1, NULL, '2018-11-26 00:00:00'),
(243, 10, 1, NULL, '2018-11-26 00:00:00'),
(244, 11, 1, NULL, '2018-11-26 00:00:00'),
(245, 12, 1, NULL, '2018-11-26 00:00:00'),
(246, 13, 1, NULL, '2018-11-26 00:00:00'),
(247, 14, 1, NULL, '2018-11-26 00:00:00'),
(248, 15, 1, NULL, '2018-11-26 00:00:00'),
(249, 16, 1, NULL, '2018-11-26 00:00:00'),
(250, 17, 1, NULL, '2018-11-26 00:00:00'),
(251, 18, 1, NULL, '2018-11-26 00:00:00'),
(252, 19, 1, NULL, '2018-11-26 00:00:00'),
(253, 20, 1, NULL, '2018-11-26 00:00:00'),
(254, 7, 1, NULL, '2018-11-26 00:00:00'),
(255, 8, 1, NULL, '2018-11-26 00:00:00'),
(256, 9, 1, NULL, '2018-11-26 00:00:00'),
(257, 10, 1, NULL, '2018-11-26 00:00:00'),
(258, 11, 1, NULL, '2018-11-26 00:00:00'),
(259, 12, 1, NULL, '2018-11-26 00:00:00'),
(260, 13, 1, NULL, '2018-11-26 00:00:00'),
(261, 14, 1, NULL, '2018-11-26 00:00:00'),
(262, 15, 1, NULL, '2018-11-26 00:00:00'),
(263, 16, 1, NULL, '2018-11-26 00:00:00'),
(264, 17, 1, NULL, '2018-11-26 00:00:00'),
(265, 18, 1, NULL, '2018-11-26 00:00:00'),
(266, 19, 1, NULL, '2018-11-26 00:00:00'),
(267, 20, 1, NULL, '2018-11-26 00:00:00'),
(268, 7, 1, NULL, '2018-10-10 00:00:00'),
(269, 8, 1, NULL, '2018-10-10 00:00:00'),
(270, 9, 1, NULL, '2018-10-10 00:00:00'),
(271, 10, 1, NULL, '2018-10-10 00:00:00'),
(272, 11, 1, NULL, '2018-10-10 00:00:00'),
(273, 12, 1, NULL, '2018-10-10 00:00:00'),
(274, 13, 1, NULL, '2018-10-10 00:00:00'),
(275, 14, 1, NULL, '2018-10-10 00:00:00'),
(276, 15, 1, NULL, '2018-10-10 00:00:00'),
(277, 16, 1, NULL, '2018-10-10 00:00:00'),
(278, 17, 1, NULL, '2018-10-10 00:00:00'),
(279, 18, 1, NULL, '2018-10-10 00:00:00'),
(280, 19, 1, NULL, '2018-10-10 00:00:00'),
(281, 20, 1, NULL, '2018-10-10 00:00:00'),
(282, 7, 1, NULL, '2018-11-27 00:00:00'),
(283, 8, 1, NULL, '2018-11-27 00:00:00'),
(284, 9, 0, NULL, '2018-11-27 00:00:00'),
(285, 10, 0, NULL, '2018-11-27 00:00:00'),
(286, 11, 1, NULL, '2018-11-27 00:00:00'),
(287, 12, 1, NULL, '2018-11-27 00:00:00'),
(288, 13, 0, NULL, '2018-11-27 00:00:00'),
(289, 14, 1, NULL, '2018-11-27 00:00:00'),
(290, 15, 0, NULL, '2018-11-27 00:00:00'),
(291, 16, 1, NULL, '2018-11-27 00:00:00'),
(292, 17, 1, NULL, '2018-11-27 00:00:00'),
(293, 18, 1, NULL, '2018-11-27 00:00:00'),
(294, 19, 1, NULL, '2018-11-27 00:00:00'),
(295, 20, 1, NULL, '2018-11-27 00:00:00'),
(296, 7, 1, NULL, '2018-11-27 00:00:00'),
(297, 8, 1, NULL, '2018-11-27 00:00:00'),
(298, 9, 1, NULL, '2018-11-27 00:00:00'),
(299, 10, 1, NULL, '2018-11-27 00:00:00'),
(300, 11, 1, NULL, '2018-11-27 00:00:00'),
(301, 12, 1, NULL, '2018-11-27 00:00:00'),
(302, 13, 1, NULL, '2018-11-27 00:00:00'),
(303, 14, 1, NULL, '2018-11-27 00:00:00'),
(304, 15, 1, NULL, '2018-11-27 00:00:00'),
(305, 16, 1, NULL, '2018-11-27 00:00:00'),
(306, 17, 1, NULL, '2018-11-27 00:00:00'),
(307, 18, 1, NULL, '2018-11-27 00:00:00'),
(308, 19, 1, NULL, '2018-11-27 00:00:00'),
(309, 20, 1, NULL, '2018-11-27 00:00:00'),
(310, 7, 1, NULL, '2018-12-03 00:00:00'),
(311, 8, 1, NULL, '2018-12-03 00:00:00'),
(312, 9, 1, NULL, '2018-12-03 00:00:00'),
(313, 10, 1, NULL, '2018-12-03 00:00:00'),
(314, 11, 0, NULL, '2018-12-03 00:00:00'),
(315, 12, 1, NULL, '2018-12-03 00:00:00'),
(316, 13, 1, NULL, '2018-12-03 00:00:00'),
(317, 14, 0, NULL, '2018-12-03 00:00:00'),
(318, 15, 1, NULL, '2018-12-03 00:00:00'),
(319, 16, 1, NULL, '2018-12-03 00:00:00'),
(320, 17, 1, NULL, '2018-12-03 00:00:00'),
(321, 18, 1, NULL, '2018-12-03 00:00:00'),
(322, 19, 1, NULL, '2018-12-03 00:00:00'),
(323, 20, 1, NULL, '2018-12-03 00:00:00'),
(324, 7, 1, NULL, '2018-12-03 00:00:00'),
(325, 8, 1, NULL, '2018-12-03 00:00:00'),
(326, 9, 1, NULL, '2018-12-03 00:00:00'),
(327, 10, 1, NULL, '2018-12-03 00:00:00'),
(328, 11, 1, NULL, '2018-12-03 00:00:00'),
(329, 12, 1, NULL, '2018-12-03 00:00:00'),
(330, 13, 1, NULL, '2018-12-03 00:00:00'),
(331, 14, 1, NULL, '2018-12-03 00:00:00'),
(332, 15, 1, NULL, '2018-12-03 00:00:00'),
(333, 16, 1, NULL, '2018-12-03 00:00:00'),
(334, 17, 1, NULL, '2018-12-03 00:00:00'),
(335, 18, 1, NULL, '2018-12-03 00:00:00'),
(336, 19, 1, NULL, '2018-12-03 00:00:00'),
(337, 20, 1, NULL, '2018-12-03 00:00:00'),
(338, 7, 1, NULL, '2018-12-02 00:00:00'),
(339, 8, 1, NULL, '2018-12-02 00:00:00'),
(340, 9, 1, NULL, '2018-12-02 00:00:00'),
(341, 10, 1, NULL, '2018-12-02 00:00:00'),
(342, 11, 1, NULL, '2018-12-02 00:00:00'),
(343, 12, 1, NULL, '2018-12-02 00:00:00'),
(344, 13, 1, NULL, '2018-12-02 00:00:00'),
(345, 14, 1, NULL, '2018-12-02 00:00:00'),
(346, 15, 1, NULL, '2018-12-02 00:00:00'),
(347, 16, 1, NULL, '2018-12-02 00:00:00'),
(348, 17, 1, NULL, '2018-12-02 00:00:00'),
(349, 18, 1, NULL, '2018-12-02 00:00:00'),
(350, 19, 1, NULL, '2018-12-02 00:00:00'),
(351, 20, 1, NULL, '2018-12-02 00:00:00'),
(352, 7, 1, NULL, '2018-12-04 00:00:00'),
(353, 8, 1, NULL, '2018-12-04 00:00:00'),
(354, 9, 1, NULL, '2018-12-04 00:00:00'),
(355, 10, 0, NULL, '2018-12-04 00:00:00'),
(356, 11, 1, NULL, '2018-12-04 00:00:00'),
(357, 12, 1, NULL, '2018-12-04 00:00:00'),
(358, 13, 1, NULL, '2018-12-04 00:00:00'),
(359, 14, 0, NULL, '2018-12-04 00:00:00'),
(360, 15, 1, NULL, '2018-12-04 00:00:00'),
(361, 16, 1, NULL, '2018-12-04 00:00:00'),
(362, 17, 0, NULL, '2018-12-04 00:00:00'),
(363, 18, 1, NULL, '2018-12-04 00:00:00'),
(364, 19, 1, NULL, '2018-12-04 00:00:00'),
(365, 20, 1, NULL, '2018-12-04 00:00:00'),
(366, 7, 1, NULL, '2018-11-07 00:00:00'),
(367, 8, 1, NULL, '2018-11-07 00:00:00'),
(368, 9, 0, NULL, '2018-11-07 00:00:00'),
(369, 10, 1, NULL, '2018-11-07 00:00:00'),
(370, 11, 1, NULL, '2018-11-07 00:00:00'),
(371, 12, 0, NULL, '2018-11-07 00:00:00'),
(372, 13, 1, NULL, '2018-11-07 00:00:00'),
(373, 14, 0, NULL, '2018-11-07 00:00:00'),
(374, 15, 1, NULL, '2018-11-07 00:00:00'),
(375, 16, 1, NULL, '2018-11-07 00:00:00'),
(376, 17, 0, NULL, '2018-11-07 00:00:00'),
(377, 18, 0, NULL, '2018-11-07 00:00:00'),
(378, 19, 1, NULL, '2018-11-07 00:00:00'),
(379, 20, 1, NULL, '2018-11-07 00:00:00'),
(380, 7, 1, NULL, '2018-12-07 00:00:00'),
(381, 8, 1, NULL, '2018-12-07 00:00:00'),
(382, 9, 1, NULL, '2018-12-07 00:00:00'),
(383, 10, 1, NULL, '2018-12-07 00:00:00'),
(384, 11, 1, NULL, '2018-12-07 00:00:00'),
(385, 12, 1, NULL, '2018-12-07 00:00:00'),
(386, 13, 1, NULL, '2018-12-07 00:00:00'),
(387, 14, 1, NULL, '2018-12-07 00:00:00'),
(388, 15, 1, NULL, '2018-12-07 00:00:00'),
(389, 16, 1, NULL, '2018-12-07 00:00:00'),
(390, 17, 1, NULL, '2018-12-07 00:00:00'),
(391, 18, 1, NULL, '2018-12-07 00:00:00'),
(392, 19, 1, NULL, '2018-12-07 00:00:00'),
(393, 20, 1, NULL, '2018-12-07 00:00:00'),
(394, 7, 0, NULL, '2018-12-08 00:00:00'),
(395, 8, 1, NULL, '2018-12-08 00:00:00'),
(396, 9, 1, NULL, '2018-12-08 00:00:00'),
(397, 10, 1, NULL, '2018-12-08 00:00:00'),
(398, 11, 1, NULL, '2018-12-08 00:00:00'),
(399, 12, 1, NULL, '2018-12-08 00:00:00'),
(400, 13, 1, NULL, '2018-12-08 00:00:00'),
(401, 14, 1, NULL, '2018-12-08 00:00:00'),
(402, 15, 1, NULL, '2018-12-08 00:00:00'),
(403, 16, 1, NULL, '2018-12-08 00:00:00'),
(404, 17, 1, NULL, '2018-12-08 00:00:00'),
(405, 18, 1, NULL, '2018-12-08 00:00:00'),
(406, 19, 1, NULL, '2018-12-08 00:00:00'),
(407, 20, 1, NULL, '2018-12-08 00:00:00'),
(408, 7, 1, NULL, '2018-12-15 00:00:00'),
(409, 8, 1, NULL, '2018-12-15 00:00:00'),
(410, 9, 1, NULL, '2018-12-15 00:00:00'),
(411, 10, 1, NULL, '2018-12-15 00:00:00'),
(412, 11, 1, NULL, '2018-12-15 00:00:00'),
(413, 12, 1, NULL, '2018-12-15 00:00:00'),
(414, 13, 1, NULL, '2018-12-15 00:00:00'),
(415, 14, 1, NULL, '2018-12-15 00:00:00'),
(416, 15, 1, NULL, '2018-12-15 00:00:00'),
(417, 16, 1, NULL, '2018-12-15 00:00:00'),
(418, 17, 1, NULL, '2018-12-15 00:00:00'),
(419, 18, 1, NULL, '2018-12-15 00:00:00'),
(420, 19, 1, NULL, '2018-12-15 00:00:00'),
(421, 20, 1, NULL, '2018-12-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `db_attendance_user_info`
--

CREATE TABLE `db_attendance_user_info` (
  `id` int(11) NOT NULL,
  `pin` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `privilege` int(11) DEFAULT NULL,
  `card` varchar(255) DEFAULT NULL,
  `pin2` int(11) DEFAULT NULL,
  `TZ1` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `registration_no` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_attendance_user_info`
--

INSERT INTO `db_attendance_user_info` (`id`, `pin`, `name`, `password`, `group_id`, `privilege`, `card`, `pin2`, `TZ1`, `role`, `designation_id`, `registration_no`) VALUES
(1, 1, 'Imran Khan', '1551', 1, 14, '271373', 1, 0, NULL, NULL, NULL),
(2, 2, 'Abdullah Al Adnan', '13801', 1, 0, '270018', 2, 0, NULL, NULL, NULL),
(3, 3, 'Md. Salman Chowdhury', '58679', 1, 0, '243867', 3, 0, NULL, NULL, NULL),
(4, 4, 'Sk. Armanul Islam Ador', '01621', 1, 0, '249015', 4, 0, NULL, NULL, NULL),
(5, 5, 'Reaz Uddin Maruf', '54321', 1, 0, '0', 5, 0, NULL, NULL, NULL),
(6, 6, 'Nayeem Uddin', '245409', 1, 0, '255594', 6, 0, NULL, NULL, NULL),
(8, 7, 'Nayeem', '12345', 1, 0, '12345456456', 7, 0, 8, 9, 'S000003'),
(9, 8, 'Angelina', '12345', 1, 0, '123456', 8, 0, 8, 10, 'S000004'),
(10, 9, 'Jimmy', '12345', 1, 0, '123123', 9, 0, 8, 11, 'S000005');

-- --------------------------------------------------------

--
-- Table structure for table `db_attendance_user_templates`
--

CREATE TABLE `db_attendance_user_templates` (
  `id` int(11) NOT NULL,
  `finger_id` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `valid` int(11) DEFAULT NULL,
  `template` varchar(2000) DEFAULT NULL,
  `pin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_attendance_user_templates`
--

INSERT INTO `db_attendance_user_templates` (`id`, `finger_id`, `size`, `valid`, `template`, `pin`) VALUES
(1, 5, 1182, 1, 'TdtTUzIxAAAEmJ8ECAUHCc7QAAAcmWkBAAAAhEUtTJhaAPIPkQCZAH+XJgB1AGEPkgCBmGQPngCFAMQPf5iGAHMPYABPAPGXjACSAHcP6gCXmFsPVQCbACoPlJidAG8PvQBhAHmXAwGmAI4P9QCqmN4PUADFAJAPk5jMAGAO/wAUAJWXkQDUAOIOfQDdmAMPWADbABkPB5ngAJEPgQAhAFyViwDsAFIOvwDrmNkOlQDxAIsOG5jzAEwPrQA2APaWCgH0AJMOOQD+mJAO6gD/AEkOSZgFAUQP3QDDAYeVqQAHAdUOuAANmdMOiAAfAQMO8pggAZMO2ADgASuV4QAlARYNtQA1mTMPzgAyAegN3JgyAbkNqwDxAbmXKQA2AT0PegA9mboO6AA/AVgO8gvDj7/9On+eCE+eVwgGcy/99XNl4h/15Y3VlzuRIWWIgy4EIJMgCY0fPQuhBfF5oH/aYDNuaf1Vjt+WwGPoc7L8pn9KEJeRN/8z/3cTpIe6Fo/zXXrGejdrhBuDCHIRJQDnATKagYf9jumSFBMKPQciVYq6BmuHoZggAT0DRAtFgw3izf9AB6l8RYOlEOQLxP/J+vBeQ5Amcxf72R3UpmVrXASdBWIJJABhnbwDYQjp/S/5DvNCdM/46fj/bELMdOVRixISGA5tZ4OAafYilGfyYeZrZEL4UBpUeKmc7erBXNHq82wa+/byWHctAAR0SBeIjJ2kzQUHkV5iHvv/80MPcJBVmbwHfeWZi7xz+1Xy/+8WIEXEAlyEpQMAa0p6BgYECk93/sLAwsYA0cgNwQQAQFGhwMScAclWCVUNxY1dGIJuwcB1CcWVWZhW/sFDAwCBXmNZDACOX3fAsYHFWIwRAPh0iZdwxFprasIPAQpFk8GubmfAwcEKxaKGZTnA/sE4DMVTgPHAwZDAwMC2DwT6h+0y/1RCBTYPmKOIAEz9wzv+NJ0BVolkwW7GAHwTdcINAFyNpcDEWIVkcwwAiUt3xRx/fAYAkZE4RsWdASqUXoUTxYmR78DDwMLB/0F+Uh4JAC+XXH6sBARPmAlLBgCMXneSWAsAlJv6ODtWxIsBjqBwgMEExPngeXnCCgC5ZIbA5MJOCADBpMP/SKcNALmmfYi1dcSRAUzGXMJptg4EychWeMDBbwXBxlsJAJvL9EE6NRyY/M2WwcGAB8CZWInC/8P/wwWWH5kV1JpcgItWwIRZwsBxwosDxbvdmP4EAODdDIYKBZjcl4h1lgrF/+YIbX2WBADZLYmkmwHb6Qz+BsWx9mj8KgUAePOWw4WcAZb1T3sTxAfxCF55qXjDiQQDBLn3Sf8FALY87fiwCwCi/UnBBcR8WMIEALf/9OMEFC0AU8PBDRAcAYdcx8TDwcb/B8CfnBHuARNOBdXhA4tECRBJCEm7kcafEVAIQE2GwRDAkVanBBCnC4PCxZARfA1GwpC1CBRsHJfAxMe1whCMuzzCw/+RBdXkIY7DLwUQ4SnlhwGIbDU3wsDDwBBwrTF4BBCuOOiBAIgqOTpyAxApQxRYBBDXRBZ0wBDX0CGQUkIAC4YBBJgKRVIAAAAAAAAA', 1),
(2, 6, 908, 1, 'SsVTUzIxAAADhocECAUHCc7QAAAbh2kBAAAAg6seZ4Y5AP8PPwCRAGCJbQBjAG4PZgCMhoMPwgCQAFEPVYakAEwPeQBsAEyIoACsAHIOHgCshh8PiQC2ACoOkYbKADANnAAaAKyIvADoABIPQgDvhiUP1gDtAFYP0Yb5AJUOOgA8AEeJxQD+ABUPrAAAhykPkgADAd0PyoYLAZcO3QDUAZeJmQATARcOBgAVh5UOrwAdAVAOfoYfAaQPrADuAZWJvwBBAYYPUwBIh44PfQBWAUoPuRXqnKt/B2Tq9FCdz3OjDGMnhBMBdlqUbhQSepcnOXtCXgPjTWFzBTVYgIfR82JFz47kKaaPLaHBwkR/fgQAQibBgYL4jt0boP55gol/gHaKiCv1PANRgrCCu4FcgEEBRxyWozSlnYNdgCEGR4U9gFsSmQAV9gN1mwE9B70Fef2gA56FHAB5htl3Bf9ih6yCNQDdAbiCzgmHfbqNtQDUE82CoPOu8nL6pAPJfOsK4QOz7hL7pH28PyA1AQE5GFCDAYQhg5AJxYsvBYf/xF8DAK00/nkEAGA5dMG9BQPuOwBUAwCm+hDAgQGPQgxWKsMAhMKChMEEADuWa8BGBQA9WGRtzgBr5HbDi8LAw4kOA/Zj+jBG/V2ZEgNUZJbBfGmEB8HCDQ0Aa2dwwgXDwwXAWgMA2mrlwRGGvo6Xd5fBBsJ59cEXAJ+PiQbDwUXCwsDBwcAH/8BFw8HAwv/EBRYDeZeawFGLwgV3w0LBgIQMAFlk1yB6/0P9wAoAl6dQD0wzDwBYqYnBwkdn/6dpDQC9rVNHicDCw8DBBMMGht6uGkQbADiun0bBWn7E/5IEwoPswcL9xAoAYK8TtMHAwVUFABmzIdoFAKC5fdEBBAMBu0ycCQCneRNDR8BmCQCMwIXBx0bEwMDCBwBfwC55w8KYBQCrDR7D/gIApsorwdkBDkmj/sRY/3q8wMEUgnjASQUAWuMqQmQGAIvtIrrCFIcO7J7B/1s6w/1Fw8PCn4h1wADZdht+GgEP+WHCUNvAhsfFxP8HwsEAwcHEBADWPhqAghGWAxNVA9VnBLbCAxCTBxwEAxNnEw/CBBDH0hCAgBGzHxCLwMMQgqQfwsHC/wfVTySmhJYHELAt1cJ1RQUQwkIAWcIQmcsHdmAJEPORd8O4UgkQemAGo13B1EMAC0MBAMULRtQAAAAAAAA=', 1),
(3, 6, 820, 1, 'Sm1TUzIxAAADLjEECAUHCc7QAAAbL2kBAAAAg9MXZS5YAG8OpwCiAIUhlgB3AAsPoACbLvsPugCZAEkPei6hAHMP4QBjAJUhiwC5AHMP8AC/LmIPcQDDADEPiS7iAGkP2AAoAJ4hZQDvAOgPhAAEL1QPlgAMAckOuS4pAZoPcQDzAT0gYQA4AU0OvwA9LyYNbwBKAfENhy5NAa8NpQCVAaQh0ABWAaYP7mZQWRrrXX4v/UIbVqiWgNOZlYp7C6SnA/qXgKcJWHo1LluBeg4z+0oTfq23AE4PB2vmc0BRfINWgbKOS4K9WNv7OwerC5aTjawDl2f0Fm+SC0w1K6eTdNPS//eAvhb1YBu98EwNMj5YGj0r+Ot89IJWLAwR+VGFvIhWU3RzYvjiA2sPYS2KDWP7FRuUIC0vAPkaaAUAa0QQ7DkLAF5J8D7D/dD/wMBXDACTVPLQ/1f+YMALxY1XKP7+wcH9wvAHA6tbd4VuCwBOWgXR/MP+wP/AjwkDimaG/8VpX88AmFsBKFRZCQBWd4Om/8JzCwCdvgzD0P7B/v9tFMUtl8fB/l3//ks7TFbRDAC3lZDCOsOPRE4HAGiX9zo4/iYBvpwTwE+lCQNboXTBi3MRxd2nucFxwcGRYq8UAxe45Ev9TECB/sPuQg4AecTw7//+aFDACQBtxayEZ+4PAKfFgHxMw0WnEgDz1Z7AvcHCpcODcMEDAD3cHe4NAIbka8EEifxMwBMA2OiiB8DA6sHBwsHCw6PB/F8LAGXq4Cg7/v0DDgBo7+T+9P8hAVoGANvwJ57AFC4r8dpH/8A6/TNv/j7/wFcIxWHxecHAXP4YEOwF1O7B/zgw+8M5wf7R/v/A/8HAOwQTEQtWVwoQnMkD+NP/wMDBegfVlh8t+v43CRCP5FDAgMB7BhCbI9UiwScRuCSgxMICxMfqxQUQmykeO3IGPpgvMMKFD9VyMf41//r8/v06wMPuwwMQkTI0BgYTXTs9xsP8yMEQYxVRPBgQ/ENuwVFAjMOTwm1yOhQTwEqi/mXCjWLDdF4WEPdLqVO1wpa8iFHA/wQQQk8d7MFSQgALQ8QAAyVEUgAAAAAAAA==', 2),
(4, 5, 838, 1, 'SgNTUzIxAAADQEIECAUHCc7QAAAbQWkBAAAAg+0dKkBeAIwPZgCoAIBPiAB4AAsPUAB4QIgPSQCWAEUPK0C2AHQPjgB+AIZPeADRAHcPawDjQIEOngDhAMYOjkDmAH4OQgAoAHZLMgDxAPUMgwD6QPMMggD7AL8PwUACAYYPlADdAXpPVQAcAfMPXAAuQXgPNQA3ASUOTkA5AfEPjAD9AXdP5ABCAYQPfQBHQXkPMgBGAR0OY0BGAfIPjQCMAXNPygBOAXwP/ABXQVEO/wsjD/IbCTkK/FsFgIfHibTLgYOHCD8HpgzYva737/RHg/4DXVAvhj4LLvgv9Bk2fHx6BS7+uITyxeOK9X1ZBmMIQ8eAgD+FgYBYBbBGQX8h/cICGP4xQet6pgqbha4NPkJTBLIB2Qf7AvFWbAS9AloILAiistyTERKtApwD8rxIBNr8bQu7D6hDHP2mAoYLtPjWyJfoKQICpoMDzrzj+A77mQUw+5xH3HjtcwphKfrOVSEzAQHCFRMDAxktHMQIAFH8CWGAWAUAfDoGmAsDBj8PcMDAWTsNA39FE8Na/2QFNAVAG1MQwMNVzwBrJwL/VVbADcVCUElIR8FHwAbFGGdGWP8KAA5vxUX9g8AoEQAUecbAWgtlwP/C/cDDAJo8B//AahIAw4b5d0tTwMD/wAVBEUAIk/D8V2KJW2NFAUWVfWUSxQeiQ3HBNVhYRdcACu/8aGQ/Wj4FCANst/pR/z0HxZK/RsH/wEYJAE+9gIB5YggAdc+4c2xIAX3RA0vCgAQDNtR0VBEA2h+Qe4D+wv/DwMCvwMZDAUDhd8MHxZniycDEwG4GAELleYDAXQQAoOXMXQhAyPeJwHR2swgDPvl9hP+YBcWG+UBVCAB+/ne2wsOEDBC+BYbCo8H8hP7/rwoQ0taPx7/BwXDCCBBVFXkp/6cFEJgYOD4LUJEcesFpgs4QzWaHXYlqAxBQKn6CBxCdLQNTOgkT1TF6wW/CnMMQd3F1b8MEEIn9dF9MEc88hsF6oX0AULVBesAEEHlEA7zHBhC0R3QFwVRGEYlIdMHAXQUTy0xtWQcQxYt9wSrBBhDYU3oFcVECAQtDAQAAzkVRQAAAAAAAAA==', 3),
(5, 6, 592, 1, 'SwlTUzIxAAACSksECAUHCc7QAAAaS2kBAAAAgvcSkkpmAH4PogC6AINFgACAAAIPXACPSn8PVQCmACsPvErBAJMPjQAIAHFEmADUABAObQDYSo8OpADuALkOjUr7AFgPqwA7AHtFkQAXAUkOFAAaS6sPmgAsAfsNpko4ASsNrAD8AbVElQBIAToOnH8otjsCWQSmBLuAl81Uh36A2fxcf7hIdu+vf4dzjwVYzWYhJWQi5PP6B9aAhKGXgYD4FYRWNATN8XEm0N4vqWgTufyNIwPtZ0T08xrRczD+9T3IaBRdivH2kXb/prjySI5levB/K1gwhxH/Q1LGICBLAFEPywQAV1KCEwcAmF6JwgSGBEqhYAz+wEbGAGkoccAIAJRnzP5IegQAjGp9wb8IAtR6hsNqdg3FVH26P/8pQMAHxaaCWv4+/gYAgkN9wIuICgCFh/04QUKKCQCTjYB+AEoMSlmk6S7B/zn+/bXBOBEAQ7sn/v0MKyv//1MNxbu90MKGw8CJ/wAKAsPLd5HCwMIFwwtKkMwJ/ijA9ggCw9FwjnMSAPnS2LX/OCouRErPAKOjgsLFwotszwCiunvDw8LCWwcHAuLwIFU4EgD/8tWK//8wLv3CPv/9HAgAp/qDyUZXEUpA+9NAMf45wPy3/8D/wf7AzQCPt1/CwkTCBtWeDFomwAgQkhMT+fW0/j8RENAUbGnCjsDHwMSD/1kGEsYaT8L+//3DEJFRR/9BBhCo2SQ6iAQQnjBAn8YQrXcm/1JCAAuGAQJKCkVSAAAAAAAAAA==', 3),
(6, 5, 1192, 1, 'TeFTUzIxAAAEoqEECAUHCc7QAAAco2kBAAAAhE8pP6JQAHMPqgCdAIqtNwBcAPMPpwBoonoPuACJAFcPPKKjAGgPdABhAHqssQCpABwPKgC2oiEPtwC5AFAPnaK/ABkPOwAGAGCtmQDIAI8PswDPonEP3wDNAOYPHKLPAOQPvAAlACmtOADtAFEPigDpok8P1wDwAPQPc6L2AB4NuQA/AD6t/AD/ADEPqgAFozkMXAAHAfYOmKIIAU4PhQDLAauuGwARAUQPqQAfo70NhQAfAXgNTqIjAS4PsgDhAUut/AApATsPEQA0o0QPewA0ASUO7aI2AbwPowD4AWatcgBBAQEOTQBFo4EOFgBGAfEPgaJTAeUOYIPi+FetKv1rFzN3pYOb2s6Pl4ifCP7/Ptoy/KcFVgS2hh9NQxIeZyfxUIjCpjOMtvzfjiIHmdpnfFoJrI+nhE5e2/ySgWIXcXtqg+P9DuECWRf2Mqar9cr6koF7l3PcmPdq/A6a9Ab2TUsjtf5hH48a4qbH+BoRvOtIc8pODA86CLbsJwKWWfoTJB+9BZiLRV9we/3nqaJTkCa2EPTJYml73vRPu4IRzQJpi0yHgbIU3kkCLvyPdTNbiO/WAUINaILGWQcPSYrK+fMP/ULAYXUmUXpoglfNmOf1F4Z9kCCFI5weSZyhoUSBF1M2C0s3ZWT85lamb7pSq5EA5UIFoJMeuQMAmvgQxKkBiEAM/8CKwFKnATdDfcLABwQE3UYGNgQAL4l0daYBfk0PZAXFOFXTUgMAylETOwkEmFbt//v/wTthAKKvWRA6BAASchPHBAAyXXRv1wA+/PXA/ET/wTtC+/HBCgCpYRcFZcRiMQgAXmmAB2qHpQFmbgP//gQzDKJfcHrBwf8HhhyiCHjtwP9QPv/F5v//wMH/wDvCxJoJAFuY/TY7Ox2iC5znwP9ABf37YP1WwP7/wDr9xmP+wggAcKBGlsXaBAA0oW3BswYE2qUG//7A/8AAMgRmwIMIAHBifcbefQkAs6oeBcD7XcBMGQAHrCVAPF38wTXC/v+B/m9iBQDytCDABRoEpr3gPUHA/YlF+eDB/sFMCgB+vRrmTjsPAJy/0sD6njT/wvxwGcU+xUs0/yjA/jg6Tzf2/QYANsNnBMB7twGXw5bCwgF1xsTAwv7ClJjNAD5lY8H/kMENxZTMLsCNhGzBBsVyzdiW/w8AnMrS/vpfVv47LwoAv8sCXf3A/P78XsoAd21wh8TDwMEGwMZgw8MHAOHQ5UU3oQEV0VfAC8W/54k0/zDA/QvFNen4k3fCwMMNxU3r7cN0xMGg/wMKBJvwT3l4lQbF2PePNv0OALr9/z37X//A//jBOsERBaMoPwgQXAIV/vlZ+vv9BRD8xjFeoRFuBTfEC9VYDuLEj8PHxf8BBRT8CzfFwcgE1ZkI7ToEEBYTTFcIFL4UQ4vCjQnVahwW+v76+PgdwBDmgEHC+8MKEI4nNWCXw8LHwgbVtCPh/P44AxEB7jH5pxH7LEA9A9XUMuvDAxAaSTAEGQTa13DDwcSCB8PFYMPIxMHBwgHAxmDFwcVSQgDOQwWiAQtFUgAAAAAAAA==', 4),
(7, 6, 1160, 1, 'TcFTUzIxAAAEgoIECAUHCc7QAAAcg2kBAAAAhK8uyYJEAIoP9wCLABqNuwBvAIMPIgBzgh0PvQB9ANQPn4KAAHYPyQBRAIyNdQCjAGIPzwG1gqQOtgC7AKgOmYLCAE8P/QABADGMagDLAFIPeQDKgjIOewDRAI0PPoLoAEgPxwAsALCPoADrACcOSgD5gjUO0gD/AJsNi4INAb4NhwDdAa+MTgAZAS4OOwAng1IPmwAkAeIL24IrAV0MtADuAcSI6wAsAU0NtQAqgycOjAA3Ae0NsoI2AcwKWQD9AS6MSwA8AScOPAA7g1UPwQBCASEK6YJEAdMNdQCDAa6PqQBHAbALDABIg3ELuABPASIK2YJOAc8MXACUAaOMZwBSAasOaABWg8wMfABUAfIOqoJbAeYOAm+OCCPw75eyB8+f8HRujy/+xpfiD/MDLRKci+6dBmUz9RtzpHuqBtpvrxJfngLtNXKHi6ofTb+II+bnJeeHHKaLJJK3g8cH+Az+cCoFAcl9gxvkzXor+VMgax3m+i+B+Fp9g06OfPaq6Ft2jXgtDlyL1SxbA1MRHRRAjPUZrOzthqF7QwSei2sKnQp1A2P49fy0AmVrLBOXjBqO+fdNm+3fefMlfFj6kX7J/qwDMYDAg+UHbA8Q6BWfzARFBpGGlPx5ASP5mIPRCjADxPU8GPX8nIPcBW0IBHQ9AY2GxefhSwTNtI+JiNyhFJ34AHEEnf38YUJu3f+Vfsn/nQe9g9h28Oqo66Uf/Q7Mjs6QVBq8AEm7nr3M/wgL5TgFgDcawwUAueEcwLwJAJwsA/2eVAeChTB3wwwADEGIQsDBw8DD/7YNBEtGhlmQwlEHBwRTRhD+wMBSxgDz0B/BDQC3a0OExkJ6w8D/CAB7cQhC/EHBDQC2t4DE93F3/xAA47CTdxTAhX7BBgAudhLC/AgAwXsM9v/EQgQA6XseR8sAvf6Cwv3EhHgFXQuCl4F3wmxZqcBhjgHAgRA1wPv9P5cBLYLe/sDy/8V+/sD+wf7+BcDEfP4VADKI4jvBT0P8QUxD/jDCAMEQiJB/BwBwZ2d6Dw4Ac6dgwKqQxn2M/hgA+r9ug8RDwpJ0d8DCBcL79QQAmMReo8gBBUQsMv5K/MKHGATsxtz/M/7+5v76fP/+PP/+bM0A+EU2wEY1CABYyUgPwsH9BAC5D1rMQAoAZsxaw0bCc0MJAGvPU8MFwcf5AgC70jfAzAB+Wk6XjsAGADnnOX3/MAoANuyJwYJBwWALADzthv+PRv/BlwMAojQpxpEB1PvQn8MGmMdDx8DBw8HEBQwEOvyg/f/6+zz4+H79/gUAk//xxMZ8BRDUA1YxxhESi0H/HRBPFH//+n3+/UzA/cA4//lC/f8u//4+6QUU0Rowwl4EEOYdNOwCEPolV8LGEQSlUf4DENsqp8ABknUuIsH7/8YQ6LJOwQQQbzHiJRmSiTSc/v3/Ov4quf/9/v78/jv++nz8wvz+wMLBEJS1GyAEEF064TMAko07KUMFEB1EZkEZUkIAC0PEAASJRFIAAAAAAAA=', 4),
(8, 5, 1056, 1, 'TVlTUzIxAAAEGh0ECAUHCc7QAAAcG2kBAAAAhMcfohoxAJMPZgCQAJYV3wBfACEPdABuGpcP5gBvAGQPahp0AI4PwQBmAJAVPwCoAIUPWAC9GhYP7AC6ANgPLhq8AIEOfAAMAA8UIgDKAHsOdQDOGpcPPADMALUOlhrMAIoOJwARAHcUYwDVAIAP6ADcGvAOHwDkALYP3xrtACEPSgArAPoVmQDyAI4PzAH/GqEPWwASAbEPGRoZAeAP2QDkAaAVIQAjAc8P/gAiG+8P1AApAe8PLBpUAe0PJ//Od18ZJwTbA/v/SIHTlv6T43Tv9WIHiZtmDTsPqvwq+1cRV38+AwN4mAc6D1sPvY6Jgh8N/5Ky/duLVQiAEhkIfILlj2b18Qvd5iyMiYJqDHsHcZuA/q3yfYIIdvLuJYa8+2EBNHdmn4sSKII1eDCB5RvwhdX7b4DqBadnY4EeDTaRawXP4pqFb4BH/4J7cpC/etP31BN39Gd3NX6fhcMHrfOx+e7lGSMmELt+KJAeCzuPTyGiAUsV1z+bbiA+xAKAOcETAFkeHATAxUA+akZ9CwC0IRpqUlgGALIk38BZDgFJJQb7wLdT+tvAwMD/wMD7CwS+KRrAZFtKzABJNxvBUsFCB8WTKw3DNsATAD/0E0jY/sFSS8L+OmABGjQ3E8BKFsUhOD7FckfBwEcFwEN+BAAtPBfBqRMEB0sWe17CwK1V+9r+BAD1UhqQBwQBVxBoaA8Ar1cTd1bCQMBkBcXiWgBhDwAUYAwFU3Xk/lfADwASrgZH2mTB/0bBBcXpdg3+RRcAEnXMSsTawFdEwf7AOv9g2hcAEoAJU57D+iTBwEbAWBbFDI8cUsD/XP9Mjz9TFgENlwBGWgX/Tx4BFKL9NwnFxaIAVWTBAwAabQPEEwFCqAlXXgcYBAqxA8DBPlg6/8TaOf7AwMD/rA0Eu7kT/8BEwftUABrxuhxgBgDrvfkk/wUA7L4eBcDEDAEnyPpATJ7+xCHBW1sEALQIF0AVAYnRBv7/OkD72lJcBABe0kObBxoi03fBCwCj1gLlR/9G/wUAmtiEnwIAHehwwc8AePKHecBywQfF3+gGOVMMAEzvP/8/VcE7BwDc8OHB+kwTAAr950EEMvrlLkb/FhAPz+372/4t//3/wff/+dr+wFwHEFfUd8fYNhMQIBbrhDs55UBMwRUQFdLaJigywf3AQVEFEhQ+IenA/in//kb62sHCDxA9JC7+KirB/jfCBhAeJCBY/gUQ2CsnkAUUziwtaxIQCYjaLE7+Jzj/UAvVKlX9/v7+Kf/8BREUF1PiPzv//vT/+tvDCRAsVvAH/Prl/MD9DxARnuL6TS///i7CBtVyWpORwwgQgl9SwpJlBxCBZoD/vlJGGgpDAQAAC4BSAAAAAAAA', 5),
(9, 6, 860, 1, 'ShVTUzIxAAADVlkECAUHCc7QAAAbV2kBAAAAg/sXcVZSAHEPbQBMAPRYhQCXAHUOpACbVl4O1ACYAFkPnFabABgPcgBZAPdYTgCtAN8OmQC2VlsOYADDACEPKVbWANYPpwAgAIxZ0ADmADAPvADsVvEPlADzAKwPU1b1AFUPwwA/AKlZ2QD+ALEPQgAaV04OLwAiAREP1VYrAa0PRAD6AdBZjwBPAT4Okn5EqVoX5ZnBBWSHgteggxFfLWw4aYLVZoUnb2crKKfpcfYhFZSBgYT9utKAg8n/XXh4fO6pUIxBB27zAoCIrJ73WSoO5TNjqtyEgtKjmYvLnsX1/N6de2Ye72bE1vpx3fmxfrcdWl+EghIHAuojY2xE1wGHgmsDU/+EU5J/VgG3l7KD/KTObzOTCRfhIC1XAyEe0wYAQSqD0sEHAI8yfaKMD1aVPYaDwmqyDgPxTZCTdcF4uQoDOFB3wsLBZ5wEAyBT+i8MAG6ScMKXhf9qwAgAYlkQljxUBQC9XdUvDFZxiPAnL/87wMMQDgBklev+7zBHGhcA0paedbzBkCZ6XcIHAFxdYMIKwQsAo5sXOkZJEBkA96CiwKxqj5SCwsDCUFvUAGPn4yn8+8DAO0RXlgsAWLVedK9VGVb6s6fBZMEHwIOUjcJzaf+GzgBe71ty/3tKEcVgvIr+/f78/f46/sOW/8H//8ELxWTBtMH8/v37wDtBCFZcx1pza8CcHAOpxqfAwML+B8CA3pHCe3vBZNIAKYXRPv84wP4+OP0a/kYFACjbk2QPVqLimsbFwwFVZ1MB1ekt/2zOAHm75v34//3AO//Blg0AkPJwxLpzSEoB9/Cra8GvwsAsxMHBX8DAsVYLVk/3U1X/b9AAwq6swcGPxcQFw8OXwVXAwjIG1ZkUcUPABxCRGZXBx6kiBxCDG1OoUQRGiR1Pwf9HwxCUSDHAwI0YEPUg1D5c//8s/P0F/cNpaRQQ1SetBP7ABMPExp5kWsMQk3hBwsKeBhBTLjTHwhsQ4C+wBWjCKsPDxcOTwQTBQKnAPQQQg0eK//5AEdtKqVZSB8G3lMHA/8L/wIMTE4RMpET/wsEHysaXf1TBEhDPn6RHqcPAws3DwgTC/gtTQgALQwHFAAgTUwAAAAAAAAA=', 5),
(10, 5, 836, 1, 'Sn1TUzIxAAADPj0ECAUHCc7QAAAbP2kBAAAAg+Maqj4+AAAPrgCNAIIxJgBKAIgPkwBIPosPLgBYAMkPjD5kAIQPSQBFAIQxpwCMAIEPdwCQPv8PzACfAEUPSz6sAIEPTABwAAMxkgDAAIEPRwDMPgEPpwDTAEQPUz7VAH4PRwArAHox+QDzAPoPlAD4PnUPngD+ALgPqT4RAQEPYQD2AXMxjQA2AXkPRABOP/oO+wBNAcwP1T5QAYcPrIMefMC9rYNi/0cD4Hz4PiIDaoN7BIYGIrprh5+E3gfvB9S6OwujfDuJ0IQVPav/GXyVgxp+krmXA1sDLIL/BsHBLYK+hD95pIIiPdqGZYKGgTqFoj2HgUoHUQd7gEEwLATV/896PvsURcbzsfzO+oYHLkDP/69+KYYaiDy9L3YW+8f/nIKJNeZ4WYYijpr/9bs2ExML9oFmi4gtFDmqACAzxAHnJBsEAH4tEEwKAwwvEMP9wcCxwBI+GDMDNv97RcD8wcHAAwCBOczBBz6sO/3A/gTFJD4yWAQArEIDjw8DFUoJwf9obwVk/TYBMVcG/2uvEgM5Wg/CN3Z0i8BUMQEwXBfEWTrCwcPBwv9dEwDCZgxTY8L+e/+JhQYDPXUDQv8NAMd6D016W2QNAA5MBmZFWYwGAP+KRnjDMQEIlAZdwLZYaDkBtpUGeEbRAAugB2tfN2LABEn8OwEKqwNoD8QGs0NkW1RzwwXFSLZD/sL9BgBQfQPDaAoAA78Ge4J+Cj8Dv4DAaMGQCgM8ywZ7wf5yzgCF9fw3dP/AwMMASOuBXP8TAPsdekF7RnvD/mUTxAXnREXAwFhWwjpawj0BQ+96wBHF8/C+W8BKXMCBBQQDcvp0hQkAmj6Aw/9vaAoAov7Fwfx5wf/9CRCbx3pRTP4IELAQAJ/8cywQDROQfnCowGb/bhERCSeJOn5X+kt0wBAQP/TwLG1SwP//TwTVXTFJmQ4QZTL6Bf3BYMBDcQcQiPN9wUD+BBBgN22eERI3RoNLfsLBO8NfaAoQhUn3/47A/vr8/wQQfU6ybQQuhFD9wEf/zBCRafzA/1U8BNWFXj10BRD/ZX2JUkE+CkMBAAALgFIAAAAAAAA=', 6),
(11, 6, 834, 1, 'Sn9TUzIxAAADPEEECAUHCc7QAAAbPWkBAAAAg+EYUjxFAIUPpQCTABIytQBeAI4OhwBhPHwPvwBzAEcOsTx3AAcOVAC8AHgzowCJAIUPgACUPHEPdQCrALIPlzzDAA8PJQAGAOozigDmAH0PBgDkPJkPZwDsADgMZTz4AGgOfgDGAW4yMAAGAVwPTAAEPSIOUQAWAZYOkzwXASEOhQDlAUEy4wApATgPsQBOPdwPUgk7DYYXhrijDZKSiXzkDja2KAfa+UMNsX+uymf9cIc9ehCGrj9bDcf52YInBczE5/Uj+c/142qYNfL2vpUOmvqPcEbSj6/vVhCDXH29ah6Hi1d3DZelrH+B3G8p/7cVI3OkBzVPOgna9hBf7buNBKXiB/kJ0QJYweANAMS3IhwEIvbU+6MWG8zHcpx7v0+PP+BWHDMBAfsZ2cAAchsHwFoLAEnpHMZeZyoHAFctw1ZWMQE5NBOL/gZR/AMLACZM/VE6YMI6AahUDFH+1AAca/s3/1NTwjj/Pj8BPl6DwgrFRmE8W/5bwAQA+2R5RAcAUHWAiQUEA/90E0kMAK2ziXFYwHoMAFh4xcBX/PzC/WsGAHB6E/xUBgBRfHoEwV0wAZ+Eg2J0qv8LPKeKDEL//zkMA6KKgE3+doDBAEOkcWsJAHKsv8HC/cD/hBQA73ychF3+/8L/woQEwGkvASjA6UYwkT78w8HA/woAmQcQ/HrAPhUAE8kiwv0EMcE2QFT/ywBY4fD/J0bCNjoVAyvi3v8ywP86wf/Dwf1T//9TygDA35vAg4zDZ6sGA2nlacHBTg/Fv+urwXeRwsDDhgUD++oXQxQAGyngQm8ywfxV/cGBCQNf72vCwMHCogsDUO79/8D6wKFRCDxr9/3+//wFViw1AWP9YsFxBIAJLHsAfcaR/wR7BSxRBWKLwAnVjAYmY0bAChB6wnTH/ojAwf8GEIoZVUTDCBCUGRoH/cJ4CBCOGjrLOcHCwmEGEHccZ1vBFiwjKNb/T8A6/v3C/DZY/zwG1YkoTMXDxcAGEE8xFXnBBRCMPBqfCBNLYMD7+vPAtRATaWK6/v7/wDn9/dD6/cPEfVKHAAh/AAAAC0VSAAAAAAAA', 6);

-- --------------------------------------------------------

--
-- Table structure for table `db_attendance_verify_types`
--

CREATE TABLE `db_attendance_verify_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_attendance_verify_types`
--

INSERT INTO `db_attendance_verify_types` (`id`, `name`) VALUES
(1, 'Fingerprint'),
(2, 'unknown'),
(3, 'Password'),
(4, 'Card Punch');

-- --------------------------------------------------------

--
-- Table structure for table `db_days`
--

CREATE TABLE `db_days` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_days`
--

INSERT INTO `db_days` (`id`, `name`) VALUES
(1, 'Saturday'),
(2, 'Sunday'),
(3, 'Monday'),
(4, 'Tuesday'),
(5, 'Wednesday'),
(6, 'Thursday'),
(7, 'Friday');

-- --------------------------------------------------------

--
-- Table structure for table `db_designations`
--

CREATE TABLE `db_designations` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_designations`
--

INSERT INTO `db_designations` (`id`, `role_id`, `designation`) VALUES
(1, 4, 'Assist.  Teacher'),
(2, 4, 'Sr. Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `db_exam_exams`
--

CREATE TABLE `db_exam_exams` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(765) DEFAULT NULL,
  `from_date` varchar(765) DEFAULT NULL,
  `note` varchar(765) DEFAULT NULL,
  `year` varchar(765) DEFAULT NULL,
  `to_date` varchar(765) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_exam_exams`
--

INSERT INTO `db_exam_exams` (`id`, `name`, `from_date`, `note`, `year`, `to_date`) VALUES
(1, '1st term exam-2018', '2018-12-01', '1st term examination', '2018', '2018-12-15'),
(NULL, '1st Term-2018', '2018-12-01', 'First Term', '2018', '2018-12-10'),
(1, '1st term exam-2018', '2018-12-01', '1st term examination', '2018', '2018-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `db_exam_exam_attendances`
--

CREATE TABLE `db_exam_exam_attendances` (
  `id` int(11) NOT NULL,
  `exam_schedule_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_exam_exam_attendances`
--

INSERT INTO `db_exam_exam_attendances` (`id`, `exam_schedule_id`, `student_id`, `value`) VALUES
(1, 1, 1, 0),
(2, 1, 2, 0),
(3, 1, 3, 0),
(4, 1, 4, 0),
(5, 1, 5, 0),
(6, 1, 6, 0),
(7, 1, 7, 0),
(8, 1, 8, 0),
(9, 1, 9, 0),
(10, 1, 10, 0),
(11, 1, 11, 0),
(12, 1, 12, 0),
(13, 1, 13, 0),
(14, 1, 14, 0),
(15, 1, 15, 0),
(16, 1, 16, 0),
(17, 1, 17, 0),
(18, 1, 18, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `db_exam_exam_attendance_view`
-- (See below for the actual view)
--
CREATE TABLE `db_exam_exam_attendance_view` (
`id` int(11)
,`exam_id` int(11)
,`exam_name` varchar(765)
,`class_id` int(11)
,`class_name` varchar(255)
,`section_id` int(11)
,`section_name` varchar(765)
,`subject_id` int(11)
,`subject_name` varchar(765)
,`student_name` varchar(765)
,`student_id` int(11)
,`student_photo` varchar(765)
,`registration_no` varchar(255)
,`mark_distribution_id` int(11)
,`mark_distribution_type` varchar(255)
,`attendance_value` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `db_exam_exam_schedules`
--

CREATE TABLE `db_exam_exam_schedules` (
  `id` int(11) NOT NULL,
  `exam_id` int(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `date` varchar(765) DEFAULT NULL,
  `from_time` varchar(765) DEFAULT NULL,
  `to_time` varchar(765) DEFAULT NULL,
  `room_id` varchar(765) DEFAULT NULL,
  `mark_distribution_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_exam_exam_schedules`
--

INSERT INTO `db_exam_exam_schedules` (`id`, `exam_id`, `class_id`, `section_id`, `subject_id`, `date`, `from_time`, `to_time`, `room_id`, `mark_distribution_id`) VALUES
(1, 1, 1, 1, 2, '2018-12-25', '10:00', '12:00', '1', 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `db_exam_exam_schedules_view`
-- (See below for the actual view)
--
CREATE TABLE `db_exam_exam_schedules_view` (
`id` int(11)
,`exam_id` int(11)
,`exam_name` varchar(765)
,`class_id` int(11)
,`class_name` varchar(255)
,`section_id` int(11)
,`section_name` varchar(765)
,`subject_id` int(11)
,`subject_name` varchar(765)
,`exam_date` varchar(765)
,`from_time` varchar(765)
,`to_time` varchar(765)
,`room_id` int(11)
,`room_name` varchar(765)
,`mark_distribution_id` int(11)
,`mark_distribution_type` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `db_exam_grades`
--

CREATE TABLE `db_exam_grades` (
  `id` int(11) NOT NULL,
  `grade_name` varchar(765) DEFAULT NULL,
  `grade_point` float DEFAULT NULL,
  `mark_from` int(11) DEFAULT NULL,
  `mark_upto` int(11) DEFAULT NULL,
  `note` varchar(765) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_guardian_guardians`
--

CREATE TABLE `db_guardian_guardians` (
  `id` int(11) NOT NULL,
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
  `permanent_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_guardian_guardians`
--

INSERT INTO `db_guardian_guardians` (`id`, `registration_no`, `photo`, `guardian_name`, `nid_number`, `email`, `contact_number`, `gender`, `blood_group`, `occupation`, `present_address`, `permanent_address`) VALUES
(1, 'G000001', 'Adnan.jpg', 'Ned Stark', '1971159369251', 'nedstark@mail.com', '01521369852', 'Male', 'A-', 'King', 'Winterfel', 'Winterfel'),
(2, 'G000002', 'Adnan.jpg', 'Ramsey Bolton', '1971259369271', 'ramsey@mail.com', '01521369853', 'Male', 'A+', 'King', 'Winterfel', 'Winterfel'),
(3, 'G000003', 'Adnan.jpg', 'John Snow', '1971259361111', 'john@mail.com', '01521369222', 'Male', 'O+', 'King', 'Winterfel', 'Winterfel'),
(4, 'G000004', 'Adnan.jpg', 'Sansa Stark', '1971259362222', 'sansa@mail.com', '01521369333', 'Female', 'B+', 'Queen', 'Winterfel', 'Winterfel'),
(5, 'G000005', 'Adnan.jpg', 'Bethoven', '1971259369333', 'bethoven@mail.com', '01521369444', 'Male', 'AB+', 'King', 'Winterfel', 'Winterfel'),
(6, 'G000006', 'Adnan.jpg', 'David Gillmour', '1971259555555', 'gillmour@mail.com', '01521369555', 'Male', 'AB-', 'King', 'Winterfel', 'Winterfel'),
(7, 'G000007', 'Adnan.jpg', 'Jose Mourinho', '1971666666666', 'mourinho@mail.com', '01521369666', 'Male', 'B-', 'King', 'Winterfel', 'Winterfel'),
(8, 'G000008', 'Adnan.jpg', 'Luis Suarez', '1985259369271', 'suarez@mail.com', '01521369777', 'Male', 'A+', 'King', 'Winterfel', 'Winterfel'),
(9, 'G000009', 'Adnan.jpg', 'Shahdat Hossain', '1985259369271', 'shahdat@mail.com', '01521369888', 'Male', 'A-', 'King', 'Winterfel', 'Winterfel'),
(10, 'G000010', 'Adnan.jpg', 'Muhibul Hossain', '1985259369271', 'nofel@mail.com', '01521369999', 'Male', 'AB-', 'King', 'Winterfel', 'Winterfel'),
(11, 'G000011', 'Adnan.jpg', 'Abu Sufian', '1785259369271', 'sufian@mail.com', '01721369853', 'Male', 'AB+', 'King', 'Winterfel', 'Winterfel'),
(12, 'G000012', 'Adnan.jpg', 'Sheikh Hasina', '1985259369271', 'hasina@mail.com', '01821369853', 'Female', 'B-', 'Queen', 'Winterfel', 'Winterfel');

-- --------------------------------------------------------

--
-- Table structure for table `db_holiday_global_holidays`
--

CREATE TABLE `db_holiday_global_holidays` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `recurrence` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_holiday_global_holidays`
--

INSERT INTO `db_holiday_global_holidays` (`id`, `name`, `type_id`, `from_date`, `to_date`, `remarks`, `recurrence`) VALUES
(1, 'May Day', 1, '2018-05-01', '2018-05-01', 'May Day For the labor', 1),
(2, 'Christmas', 1, '2018-12-25', '2018-12-25', 'Jesus Was Born this Day', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_holiday_holidays`
--

CREATE TABLE `db_holiday_holidays` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `registration_no` varchar(255) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `recurrence` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_holiday_holidays`
--

INSERT INTO `db_holiday_holidays` (`id`, `name`, `type_id`, `role_id`, `registration_no`, `from_date`, `to_date`, `remarks`, `recurrence`) VALUES
(1, 'Independence Day', 1, NULL, '', '1971-03-26', '1971-03-26', 'Bangladesh gained independence on this day', 1),
(3, NULL, 3, 8, 'S000001', '2018-12-08', '2018-12-11', 'Sick Leave', 0),
(4, 'Victory Day', 1, NULL, NULL, '2018-12-16', '2018-12-16', 'Bangladesh gained victory this day', 1),
(5, NULL, 2, 8, 'S000003', '2018-12-15', '2018-12-21', 'Sick Leave', 0),
(6, NULL, 2, 8, 'S0000012', '2018-12-03', '2018-12-06', 'Sick Leave', 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_holiday_holiday_types`
--

CREATE TABLE `db_holiday_holiday_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_group` int(11) DEFAULT NULL,
  `short_form` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_holiday_holiday_types`
--

INSERT INTO `db_holiday_holiday_types` (`id`, `name`, `is_group`, `short_form`) VALUES
(1, 'Public Holiday', 1, 'PH'),
(2, 'Sick Leave', 0, 'SL'),
(3, 'Casual Leave', 0, 'CL'),
(4, 'Vacation', 1, 'V');

-- --------------------------------------------------------

--
-- Table structure for table `db_holiday_individual_holidays`
--

CREATE TABLE `db_holiday_individual_holidays` (
  `id` int(11) NOT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `registration_no` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_holiday_individual_holidays`
--

INSERT INTO `db_holiday_individual_holidays` (`id`, `from_date`, `to_date`, `registration_no`, `type_id`, `role_id`) VALUES
(1, '2018-08-25', '2018-08-28', 'S000001', 2, 8),
(2, '2018-12-11', '2018-12-14', 'S000001', 2, 8),
(3, '2018-12-16', '2018-12-20', 'S000004', 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `db_mark_marks`
--

CREATE TABLE `db_mark_marks` (
  `id` int(11) NOT NULL,
  `attendance_id` int(11) DEFAULT NULL,
  `gained_mark` float DEFAULT NULL,
  `highest_mark` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `db_mark_marks_view`
-- (See below for the actual view)
--
CREATE TABLE `db_mark_marks_view` (
`id` int(11)
,`exam_id` int(11)
,`exam_name` varchar(765)
,`class_id` int(11)
,`exam_schedules_id` int(11)
,`class_name` varchar(255)
,`section_id` int(11)
,`section_name` varchar(765)
,`subject_id` int(11)
,`subject_name` varchar(765)
,`student_name` varchar(765)
,`student_id` int(11)
,`student_photo` varchar(765)
,`student_roll` varchar(255)
,`registration_no` varchar(255)
,`attendance_value` int(11)
,`mark_type` varchar(255)
,`mark_value` float
,`attendance_id` int(11)
,`mark_distribution_id` int(11)
,`gained_mark` float
,`highest_mark` float
);

-- --------------------------------------------------------

--
-- Table structure for table `db_mark_mark_distributions`
--

CREATE TABLE `db_mark_mark_distributions` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `value` float DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_mark_mark_distributions`
--

INSERT INTO `db_mark_mark_distributions` (`id`, `type`, `value`, `class_id`) VALUES
(1, 'Class Test', 10, 1),
(2, 'Assignment', 10, 1),
(3, 'Attendence', 5, 1),
(4, 'Written', 40, 1),
(5, 'MCQ', 35, 1),
(6, 'Assignment', 0, 1),
(7, 'Written', 0, 1),
(8, 'MCQ', 0, 1),
(9, 'exception', 0, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `db_mark_mark_distributions_view`
-- (See below for the actual view)
--
CREATE TABLE `db_mark_mark_distributions_view` (
`id` int(11)
,`type` varchar(255)
,`value` float
,`class_name` varchar(255)
,`class_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `db_mark_total_marks`
--

CREATE TABLE `db_mark_total_marks` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `total_mark` float DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `highest_mark` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `db_mark_total_marks_view`
-- (See below for the actual view)
--
CREATE TABLE `db_mark_total_marks_view` (
`id` int(11)
,`exam_id` int(11)
,`exam_name` varchar(765)
,`class_id` int(11)
,`class_name` varchar(255)
,`exam_schedules_id` int(11)
,`section_id` int(11)
,`section_name` varchar(765)
,`subject_id` int(11)
,`subject_name` varchar(765)
,`student_name` varchar(765)
,`student_id` int(11)
,`student_photo` varchar(765)
,`student_roll` varchar(255)
,`attendance_value` int(11)
,`mark_type` varchar(255)
,`mark_value` float
,`attendance_id` int(11)
,`gained_mark` float
,`highest_mark` float
,`mark_distribution_id` int(11)
,`total_mark` float
,`grade_id` int(11)
,`grade_name` varchar(765)
,`grade_point` float
,`total_highest_mark` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `db_roles`
--

CREATE TABLE `db_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_roles`
--

INSERT INTO `db_roles` (`id`, `name`) VALUES
(1, 'Super_admin'),
(2, 'Admin'),
(3, 'Headmaster'),
(4, 'Teacher'),
(5, 'Guardian'),
(6, 'Employee'),
(7, 'Accountant'),
(8, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `db_rooms`
--

CREATE TABLE `db_rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(765) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_rooms`
--

INSERT INTO `db_rooms` (`id`, `name`) VALUES
(1, 'Room 1'),
(2, 'Room 2'),
(3, 'Room 3'),
(4, 'Room 4');

-- --------------------------------------------------------

--
-- Table structure for table `db_sms_smses`
--

CREATE TABLE `db_sms_smses` (
  `id` int(11) NOT NULL,
  `sender` int(255) DEFAULT NULL,
  `template` int(11) DEFAULT NULL,
  `receiver` int(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `type` varchar(11) DEFAULT NULL,
  `sender_role` int(11) DEFAULT NULL,
  `receiver_role` int(11) DEFAULT NULL,
  `date_and_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_sms_templates`
--

CREATE TABLE `db_sms_templates` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_sms_templates`
--

INSERT INTO `db_sms_templates` (`id`, `title`, `body`) VALUES
(1, 'Holiday', 'All the academic work will remain off tomorrow.');

-- --------------------------------------------------------

--
-- Table structure for table `db_student_assignments`
--

CREATE TABLE `db_student_assignments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `roll_no` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_student_assignments`
--

INSERT INTO `db_student_assignments` (`id`, `student_id`, `section_id`, `roll_no`, `class_id`) VALUES
(1, 1, 1, '1', 1),
(2, 2, 1, '2', 1),
(3, 3, 1, '3', 1),
(4, 4, 1, '4', 1),
(5, 5, 1, '5', 1),
(6, 6, 1, '6', 1),
(7, 7, 1, '7', 1),
(8, 8, 1, '8', 1),
(9, 9, 1, '9', 1),
(10, 10, 1, '10', 1),
(11, 11, 1, '11', 1),
(12, 12, 1, '12', 1),
(13, 13, 1, '13', 1),
(14, 14, 1, '14', 1),
(15, 15, 1, '15', 1),
(16, 16, 1, '16', 1),
(17, 17, 1, '17', 1),
(18, 18, 1, '18', 1),
(19, 19, 2, '1', 1),
(20, 20, 2, '2', 1),
(21, 21, 3, '1', 2),
(22, 22, 3, '2', 2),
(23, 23, 4, '1', 2),
(24, 24, 4, '2', 2),
(25, 25, 5, '1', 3),
(26, 26, 5, '2', 3),
(27, 27, 6, '1', 3),
(28, 28, 6, '2', 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `db_student_assignments_view`
-- (See below for the actual view)
--
CREATE TABLE `db_student_assignments_view` (
`id` int(11)
,`student_name` varchar(765)
,`photo` varchar(765)
,`guardian_id` int(11)
,`date_of_birth` date
,`gender` varchar(255)
,`blood_group` varchar(255)
,`religion` varchar(255)
,`current_address` varchar(255)
,`permanent_address` varchar(255)
,`registration_no` varchar(255)
,`extra_curricular_acctivities` varchar(255)
,`remarks` varchar(255)
,`class_id` int(11)
,`class_name` varchar(255)
,`section_id` int(11)
,`section_name` varchar(765)
,`roll_no` varchar(255)
,`status` int(11)
,`guardian_name` varchar(100)
,`guardian_registration_no` varchar(50)
,`guardian_phone_no` varchar(30)
,`guardian_address` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `db_student_deactivations`
--

CREATE TABLE `db_student_deactivations` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `deactivation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_student_students`
--

CREATE TABLE `db_student_students` (
  `id` int(11) NOT NULL,
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
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_student_students`
--

INSERT INTO `db_student_students` (`id`, `name`, `assignment`, `status`, `photo`, `guardian_id`, `date_of_birth`, `gender`, `blood_group`, `religion`, `current_address`, `permanent_address`, `registration_no`, `extra_curricular_activities`, `remarks`) VALUES
(1, 'John Reese', 1, 1, 'mike.jpg', 2, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000001', 'Hitman', 'Kills everyone'),
(2, 'Ned Stark', 1, 1, 'mike.jpg', 3, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000002', 'Hitman', 'Kills everyone'),
(3, 'Jon Reese', 1, 1, 'mike.jpg', 4, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000003', 'Hitman', 'Kills everyone'),
(4, 'Tony Stark', 1, 1, 'mike.jpg', 5, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000004', 'Hitman', 'Kills everyone'),
(5, 'Rob Stark', 1, 1, 'mike.jpg', 6, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000005', 'Hitman', 'Kills everyone'),
(6, 'Barney Stinson', 1, 1, 'mike.jpg', 7, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000006', 'Hitman', 'Kills everyone'),
(7, 'Sheldon Cooper', 1, 1, 'mike.jpg', 8, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000007', 'Hitman', 'Kills everyone'),
(8, 'Walder Frey', 1, 1, 'mike.jpg', 9, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000008', 'Hitman', 'Kills everyone'),
(9, 'Harvey Specter', 1, 1, 'mike.jpg', 1, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000009', 'Hitman', 'Kills everyone'),
(10, 'Mike Ross', 1, 1, 'mike.jpg', 2, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000010', 'Hitman', 'Kills everyone'),
(11, 'Tom Haardy', 1, 1, 'mike.jpg', 3, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000011', 'Hitman', 'Kills everyone'),
(12, 'Thomas Shelby', 1, 1, 'mike.jpg', 4, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000012', 'Hitman', 'Kills everyone'),
(13, 'Harry Potter', 1, 1, 'mike.jpg', 5, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000013', 'Hitman', 'Kills everyone'),
(14, 'Jack Reacher', 1, 1, 'mike.jpg', 6, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000014', 'Hitman', 'Kills everyone'),
(15, 'Andy Flower', 1, 1, 'mike.jpg', 7, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000015', 'Hitman', 'Kills everyone'),
(16, 'Shai Hope', 1, 1, 'mike.jpg', 8, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000016', 'Hitman', 'Kills everyone'),
(17, 'Michael Hardy', 1, 1, 'mike.jpg', 9, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000017', 'Hitman', 'Kills everyone'),
(18, 'Ted Moseby', 1, 1, 'mike.jpg', 1, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000018', 'Hitman', 'Kills everyone'),
(19, 'Daniel Hardman', 1, 1, 'mike.jpg', 2, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000019', 'Hitman', 'Kills everyone'),
(20, 'Loid Litt', 1, 1, 'mike.jpg', 3, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000020', 'Hitman', 'Kills everyone'),
(21, 'James Andrew', 1, 1, 'mike.jpg', 2, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000021', 'Hitman', 'Kills everyone'),
(22, 'Bill Clinton', 1, 1, 'mike.jpg', 6, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000022', 'Hitman', 'Kills everyone'),
(23, 'Ragner Lothbrok', 1, 1, 'mike.jpg', 5, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000023', 'Hitman', 'Kills everyone'),
(24, 'Andrew Russel', 1, 1, 'mike.jpg', 3, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000024', 'Hitman', 'Kills everyone'),
(25, 'Adam Smoth', 1, 1, 'mike.jpg', 8, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000025', 'Hitman', 'Kills everyone'),
(26, 'James Bond', 1, 1, 'mike.jpg', 9, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000026', 'Hitman', 'Kills everyone'),
(27, 'Bruce Wayne', 1, 1, 'mike.jpg', 4, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000027', 'Hitman', 'Kills everyone'),
(28, 'Vin Diesel', 1, 1, 'mike.jpg', 3, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000028', 'Hitman', 'Kills everyone'),
(29, 'James naderson', 0, 1, 'mike.jpg', 1, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000029', 'Hitman', 'Kills everyone'),
(30, 'Tyler Durden', 0, 0, 'mike.jpg', 2, '2018-12-01', 'male', 'O+', 'Cristian', 'London.Uk', 'London.Uk', 'S000030', 'Hitman', 'Kills everyone');

-- --------------------------------------------------------

--
-- Stand-in structure for view `db_student_students_view`
-- (See below for the actual view)
--
CREATE TABLE `db_student_students_view` (
`id` int(11)
,`name` varchar(765)
,`photo` varchar(765)
,`guardian_id` int(11)
,`date_of_birth` date
,`gender` varchar(255)
,`blood_group` varchar(255)
,`religion` varchar(255)
,`current_address` varchar(255)
,`permanent_address` varchar(255)
,`registration_no` varchar(255)
,`extra_curricular_acctivities` varchar(255)
,`remarks` varchar(255)
,`assignment` int(11)
,`status` int(11)
,`guardian_name` varchar(100)
,`guardian_phone_no` varchar(30)
,`guardian_registration_no` varchar(50)
,`guardian_address` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `db_teacher_assignments`
--

CREATE TABLE `db_teacher_assignments` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_teacher_assignments`
--

INSERT INTO `db_teacher_assignments` (`id`, `class_id`, `section_id`, `subject_id`, `teacher_id`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 1, 2, 2),
(3, 1, 2, 1, 3),
(4, 1, 2, 2, 4),
(5, 2, 3, 3, 5),
(6, 2, 3, 4, 6),
(7, 2, 4, 3, 7),
(8, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `db_teacher_assignments_view`
-- (See below for the actual view)
--
CREATE TABLE `db_teacher_assignments_view` (
`id` int(11)
,`teacher_name` varchar(765)
,`photo` varchar(765)
,`date_of_birth` date
,`gender` varchar(255)
,`blood_group` varchar(255)
,`religion` varchar(255)
,`current_address` varchar(255)
,`permanent_address` varchar(255)
,`registration_no` varchar(255)
,`class_id` int(11)
,`class_name` varchar(255)
,`section_id` int(11)
,`section_name` varchar(765)
,`subject_id` int(11)
,`subject_name` varchar(765)
);

-- --------------------------------------------------------

--
-- Table structure for table `db_teacher_deactivations`
--

CREATE TABLE `db_teacher_deactivations` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `deactivation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_teacher_teachers`
--

CREATE TABLE `db_teacher_teachers` (
  `id` int(11) NOT NULL,
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
  `speciality` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_teacher_teachers`
--

INSERT INTO `db_teacher_teachers` (`id`, `name`, `email`, `phone`, `photo`, `status`, `designation_id`, `date_of_birth`, `gender`, `blood_group`, `religion`, `current_address`, `permanent_address`, `joining_date`, `national_id`, `registration_no`, `educational_qualification`, `speciality`) VALUES
(1, 'James Bond', 'a@b.com', '01754290194', 'tom.jpg', 1, '1', '2018-12-01', 'male', 'O+', 'Cristian', 'London,Uk', 'London,Uk', '2018-12-01', '1994827123', 'T000001', 'Bsc. in CSE', 'CSE'),
(2, 'John Reese', 'a@b.com', '01754290194', 'tom.jpg', 1, '1', '2018-12-01', 'male', 'O+', 'Cristian', 'London,Uk', 'London,Uk', '2018-12-01', '1994827123', 'T000002', 'Bsc. in CSE', 'CSE'),
(3, 'John Wick', 'a@b.com', '01754290194', 'tom.jpg', 1, '1', '2018-12-01', 'male', 'O+', 'Cristian', 'London,Uk', 'London,Uk', '2018-12-01', '1994827123', 'T000003', 'Bsc. in CSE', 'CSE'),
(4, 'Tom Hardy', 'a@b.com', '01754290194', 'tom.jpg', 1, '1', '2018-12-01', 'male', 'O+', 'Cristian', 'London,Uk', 'London,Uk', '2018-12-01', '1994827123', 'T000004', 'Bsc. in CSE', 'CSE'),
(5, 'Ned Stark', 'a@b.com', '01754290194', 'tom.jpg', 1, '2', '2018-12-01', 'male', 'O+', 'Cristian', 'London,Uk', 'London,Uk', '2018-12-01', '1994827123', 'T000005', 'Bsc. in CSE', 'CSE'),
(6, 'Ed Sheeran', 'a@b.com', '01754290194', 'tom.jpg', 1, '2', '2018-12-01', 'male', 'O+', 'Cristian', 'London,Uk', 'London,Uk', '2018-12-01', '1994827123', 'T000006', 'Bsc. in CSE', 'CSE'),
(7, 'James ANderson', 'a@b.com', '01754290194', 'tom.jpg', 1, '2', '2018-12-01', 'male', 'O+', 'Cristian', 'London,Uk', 'London,Uk', '2018-12-01', '1994827123', 'T000007', 'Bsc. in CSE', 'CSE'),
(8, 'Bill Clinton', 'a@b.com', '01754290194', 'tom.jpg', 1, '2', '2018-12-01', 'male', 'O+', 'Cristian', 'London,Uk', 'London,Uk', '2018-12-01', '1994827123', 'T000008', 'Bsc. in CSE', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `db_users`
--

CREATE TABLE `db_users` (
  `id` int(11) NOT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_users`
--

INSERT INTO `db_users` (`id`, `designation_id`, `role`, `password`, `email`, `username`) VALUES
(1, 1, 4, '$2y$10$AAD.l6BJp1fOuawnDwYMG.zF6c8vwAkdpbRkGbozlzh53qDUx9HWS', 'teacher@mail.com', 'teacher'),
(2, 1, 5, '$2y$10$AAD.l6BJp1fOuawnDwYMG.zF6c8vwAkdpbRkGbozlzh53qDUx9HWS', 'guardian@mail.com', 'guardian'),
(3, 1, 3, '$2y$10$AAD.l6BJp1fOuawnDwYMG.zF6c8vwAkdpbRkGbozlzh53qDUx9HWS', 'headmaster@mail.com', 'headmaster'),
(4, 1, 2, '$2y$10$AAD.l6BJp1fOuawnDwYMG.zF6c8vwAkdpbRkGbozlzh53qDUx9HWS', 'admin@mail.com', 'admin'),
(5, 10, 7, '$2y$10$AAD.l6BJp1fOuawnDwYMG.zF6c8vwAkdpbRkGbozlzh53qDUx9HWS', 'michael@mail.com', 'accountant'),
(6, 11, 7, '$2y$10$AAD.l6BJp1fOuawnDwYMG.zF6c8vwAkdpbRkGbozlzh53qDUx9HWS', 'john@mail.com', 'accountant');

-- --------------------------------------------------------

--
-- Structure for view `db_academic_sections_view`
--
DROP TABLE IF EXISTS `db_academic_sections_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_academic_sections_view`  AS  select `db_academic_sections`.`id` AS `id`,`db_academic_sections`.`name` AS `section_name`,`db_academic_sections`.`class_id` AS `class_id`,`db_academic_sections`.`catagory` AS `catagory`,`db_academic_sections`.`capacity` AS `capacity`,`db_teacher_teachers`.`name` AS `teacher_name` from (`db_academic_sections` join `db_teacher_teachers` on((`db_academic_sections`.`teacher_id` = `db_teacher_teachers`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `db_account_invoices_view`
--
DROP TABLE IF EXISTS `db_account_invoices_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_account_invoices_view`  AS  select `db_account_invoices`.`id` AS `id`,`db_student_students`.`id` AS `student_id`,`db_account_fee_types`.`id` AS `fee_type_id`,`db_account_invoices`.`invoice_number` AS `invoice_number`,`db_account_invoices`.`note` AS `invoice_note`,`db_student_students`.`name` AS `student_name`,`db_student_students`.`photo` AS `photo`,`db_account_fee_types`.`fee_type_name` AS `fee_type_name`,`db_account_fee_types`.`note` AS `fee_type_note`,`db_account_invoices`.`amount` AS `amount`,`db_account_invoices`.`fine` AS `fine`,`db_account_invoices`.`discount_in_percentage` AS `discount_in_percentage`,`db_account_invoices`.`amount_after_fine_and_discount` AS `amount_after_fine_and_discount`,`db_account_invoices`.`date` AS `date` from ((`db_account_invoices` join `db_student_students` on((`db_student_students`.`id` = `db_account_invoices`.`student_id`))) join `db_account_fee_types` on((`db_account_fee_types`.`id` = `db_account_invoices`.`fee_type_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `db_account_payments_view`
--
DROP TABLE IF EXISTS `db_account_payments_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_account_payments_view`  AS  select `db_account_payments`.`id` AS `id`,`db_account_payments`.`student_id` AS `student_id`,`db_account_payments`.`paid_amount` AS `paid_amount`,`db_account_payments`.`discount` AS `discount`,`db_account_payments`.`receiver_id` AS `receiver_id`,`db_account_payments`.`date` AS `date`,`db_account_payment_methods`.`id` AS `payment_method_id`,`db_account_payment_methods`.`payment_method_name` AS `payment_method_name`,`db_student_assignments_view`.`student_name` AS `student_name`,`db_student_assignments_view`.`class_name` AS `class_name`,`db_student_assignments_view`.`section_name` AS `section_name`,`db_student_assignments_view`.`registration_no` AS `registration_no`,`db_student_assignments_view`.`roll_no` AS `roll_no`,`db_account_banks`.`id` AS `bank_id`,`db_account_banks`.`bank_name` AS `bank_name` from (((`db_account_payments` join `db_account_payment_methods` on((`db_account_payment_methods`.`id` = `db_account_payments`.`payment_method_id`))) join `db_student_assignments_view` on((`db_account_payments`.`student_id` = `db_student_assignments_view`.`id`))) left join `db_account_banks` on((`db_account_payments`.`bank_id` = `db_account_banks`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `db_exam_exam_attendance_view`
--
DROP TABLE IF EXISTS `db_exam_exam_attendance_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_exam_exam_attendance_view`  AS  select `db_exam_exam_attendances`.`id` AS `id`,`db_exam_exams`.`id` AS `exam_id`,`db_exam_exams`.`name` AS `exam_name`,`db_exam_exam_schedules`.`class_id` AS `class_id`,`db_academic_classes`.`name` AS `class_name`,`db_academic_sections`.`id` AS `section_id`,`db_academic_sections`.`name` AS `section_name`,`db_academic_subjects`.`id` AS `subject_id`,`db_academic_subjects`.`subject_name` AS `subject_name`,`db_student_students`.`name` AS `student_name`,`db_student_students`.`id` AS `student_id`,`db_student_students`.`photo` AS `student_photo`,`db_student_students`.`registration_no` AS `registration_no`,`db_mark_mark_distributions`.`id` AS `mark_distribution_id`,`db_mark_mark_distributions`.`type` AS `mark_distribution_type`,`db_exam_exam_attendances`.`value` AS `attendance_value` from (((((((`db_exam_exam_attendances` left join `db_exam_exam_schedules` on((`db_exam_exam_attendances`.`exam_schedule_id` = `db_exam_exam_schedules`.`id`))) left join `db_student_students` on((`db_exam_exam_attendances`.`student_id` = `db_student_students`.`id`))) left join `db_academic_classes` on((`db_exam_exam_schedules`.`class_id` = `db_academic_classes`.`id`))) left join `db_academic_sections` on((`db_exam_exam_schedules`.`section_id` = `db_academic_sections`.`id`))) left join `db_academic_subjects` on((`db_exam_exam_schedules`.`subject_id` = `db_academic_subjects`.`id`))) left join `db_exam_exams` on((`db_exam_exam_schedules`.`exam_id` = `db_exam_exams`.`id`))) left join `db_mark_mark_distributions` on((`db_exam_exam_schedules`.`mark_distribution_id` = `db_mark_mark_distributions`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `db_exam_exam_schedules_view`
--
DROP TABLE IF EXISTS `db_exam_exam_schedules_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_exam_exam_schedules_view`  AS  select `db_exam_exam_schedules`.`id` AS `id`,`db_exam_exams`.`id` AS `exam_id`,`db_exam_exams`.`name` AS `exam_name`,`db_exam_exam_schedules`.`class_id` AS `class_id`,`db_academic_classes`.`name` AS `class_name`,`db_academic_sections`.`id` AS `section_id`,`db_academic_sections`.`name` AS `section_name`,`db_academic_subjects`.`id` AS `subject_id`,`db_academic_subjects`.`subject_name` AS `subject_name`,`db_exam_exam_schedules`.`date` AS `exam_date`,`db_exam_exam_schedules`.`from_time` AS `from_time`,`db_exam_exam_schedules`.`to_time` AS `to_time`,`db_rooms`.`id` AS `room_id`,`db_rooms`.`name` AS `room_name`,`db_mark_mark_distributions`.`id` AS `mark_distribution_id`,`db_mark_mark_distributions`.`type` AS `mark_distribution_type` from ((((((`db_exam_exam_schedules` left join `db_academic_classes` on((`db_exam_exam_schedules`.`class_id` = `db_academic_classes`.`id`))) left join `db_academic_sections` on((`db_exam_exam_schedules`.`section_id` = `db_academic_sections`.`id`))) left join `db_academic_subjects` on((`db_exam_exam_schedules`.`subject_id` = `db_academic_subjects`.`id`))) left join `db_rooms` on((`db_exam_exam_schedules`.`room_id` = `db_rooms`.`id`))) left join `db_exam_exams` on((`db_exam_exam_schedules`.`exam_id` = `db_exam_exams`.`id`))) left join `db_mark_mark_distributions` on((`db_exam_exam_schedules`.`mark_distribution_id` = `db_mark_mark_distributions`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `db_mark_marks_view`
--
DROP TABLE IF EXISTS `db_mark_marks_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_mark_marks_view`  AS  select `db_mark_marks`.`id` AS `id`,`db_exam_exams`.`id` AS `exam_id`,`db_exam_exams`.`name` AS `exam_name`,`db_exam_exam_schedules`.`class_id` AS `class_id`,`db_exam_exam_schedules`.`id` AS `exam_schedules_id`,`db_academic_classes`.`name` AS `class_name`,`db_academic_sections`.`id` AS `section_id`,`db_academic_sections`.`name` AS `section_name`,`db_academic_subjects`.`id` AS `subject_id`,`db_academic_subjects`.`subject_name` AS `subject_name`,`db_student_assignments_view`.`student_name` AS `student_name`,`db_student_assignments_view`.`id` AS `student_id`,`db_student_assignments_view`.`photo` AS `student_photo`,`db_student_assignments_view`.`roll_no` AS `student_roll`,`db_student_assignments_view`.`registration_no` AS `registration_no`,`db_exam_exam_attendances`.`value` AS `attendance_value`,`db_mark_mark_distributions`.`type` AS `mark_type`,`db_mark_mark_distributions`.`value` AS `mark_value`,`db_exam_exam_attendances`.`id` AS `attendance_id`,`db_mark_mark_distributions`.`id` AS `mark_distribution_id`,`db_mark_marks`.`gained_mark` AS `gained_mark`,`db_mark_marks`.`highest_mark` AS `highest_mark` from ((((((((`db_mark_marks` left join `db_exam_exam_attendances` on((`db_mark_marks`.`attendance_id` = `db_exam_exam_attendances`.`id`))) left join `db_exam_exam_schedules` on((`db_exam_exam_attendances`.`exam_schedule_id` = `db_exam_exam_schedules`.`id`))) join `db_student_assignments_view` on((`db_exam_exam_attendances`.`student_id` = `db_student_assignments_view`.`id`))) left join `db_academic_classes` on((`db_exam_exam_schedules`.`class_id` = `db_academic_classes`.`id`))) left join `db_academic_sections` on((`db_exam_exam_schedules`.`section_id` = `db_academic_sections`.`id`))) left join `db_academic_subjects` on((`db_exam_exam_schedules`.`subject_id` = `db_academic_subjects`.`id`))) left join `db_exam_exams` on((`db_exam_exam_schedules`.`exam_id` = `db_exam_exams`.`id`))) left join `db_mark_mark_distributions` on((`db_exam_exam_schedules`.`mark_distribution_id` = `db_mark_mark_distributions`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `db_mark_mark_distributions_view`
--
DROP TABLE IF EXISTS `db_mark_mark_distributions_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_mark_mark_distributions_view`  AS  select `db_mark_mark_distributions`.`id` AS `id`,`db_mark_mark_distributions`.`type` AS `type`,`db_mark_mark_distributions`.`value` AS `value`,`db_academic_classes`.`name` AS `class_name`,`db_academic_classes`.`id` AS `class_id` from (`db_mark_mark_distributions` left join `db_academic_classes` on((`db_mark_mark_distributions`.`class_id` = `db_academic_classes`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `db_mark_total_marks_view`
--
DROP TABLE IF EXISTS `db_mark_total_marks_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_mark_total_marks_view`  AS  select `db_mark_marks_view`.`id` AS `id`,`db_mark_marks_view`.`exam_id` AS `exam_id`,`db_mark_marks_view`.`exam_name` AS `exam_name`,`db_mark_marks_view`.`class_id` AS `class_id`,`db_mark_marks_view`.`class_name` AS `class_name`,`db_mark_marks_view`.`exam_schedules_id` AS `exam_schedules_id`,`db_mark_marks_view`.`section_id` AS `section_id`,`db_mark_marks_view`.`section_name` AS `section_name`,`db_mark_marks_view`.`subject_id` AS `subject_id`,`db_mark_marks_view`.`subject_name` AS `subject_name`,`db_mark_marks_view`.`student_name` AS `student_name`,`db_mark_marks_view`.`student_id` AS `student_id`,`db_mark_marks_view`.`student_photo` AS `student_photo`,`db_mark_marks_view`.`student_roll` AS `student_roll`,`db_mark_marks_view`.`attendance_value` AS `attendance_value`,`db_mark_marks_view`.`mark_type` AS `mark_type`,`db_mark_marks_view`.`mark_value` AS `mark_value`,`db_mark_marks_view`.`attendance_id` AS `attendance_id`,`db_mark_marks_view`.`gained_mark` AS `gained_mark`,`db_mark_marks_view`.`highest_mark` AS `highest_mark`,`db_mark_marks_view`.`mark_distribution_id` AS `mark_distribution_id`,`db_mark_total_marks`.`total_mark` AS `total_mark`,`db_mark_total_marks`.`grade_id` AS `grade_id`,`db_exam_grades`.`grade_name` AS `grade_name`,`db_exam_grades`.`grade_point` AS `grade_point`,`db_mark_total_marks`.`highest_mark` AS `total_highest_mark` from ((`db_mark_marks_view` left join `db_mark_total_marks` on(((`db_mark_marks_view`.`exam_id` = `db_mark_total_marks`.`exam_id`) and (`db_mark_marks_view`.`student_id` = `db_mark_total_marks`.`student_id`) and (`db_mark_marks_view`.`subject_id` = `db_mark_total_marks`.`subject_id`)))) left join `db_exam_grades` on((`db_mark_total_marks`.`grade_id` = `db_exam_grades`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `db_student_assignments_view`
--
DROP TABLE IF EXISTS `db_student_assignments_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_student_assignments_view`  AS  select `db_student_students`.`id` AS `id`,`db_student_students`.`name` AS `student_name`,`db_student_students`.`photo` AS `photo`,`db_student_students`.`guardian_id` AS `guardian_id`,`db_student_students`.`date_of_birth` AS `date_of_birth`,`db_student_students`.`gender` AS `gender`,`db_student_students`.`blood_group` AS `blood_group`,`db_student_students`.`religion` AS `religion`,`db_student_students`.`current_address` AS `current_address`,`db_student_students`.`permanent_address` AS `permanent_address`,`db_student_students`.`registration_no` AS `registration_no`,`db_student_students`.`extra_curricular_activities` AS `extra_curricular_acctivities`,`db_student_students`.`remarks` AS `remarks`,`db_student_assignments`.`class_id` AS `class_id`,`db_academic_classes`.`name` AS `class_name`,`db_student_assignments`.`section_id` AS `section_id`,`db_academic_sections`.`name` AS `section_name`,`db_student_assignments`.`roll_no` AS `roll_no`,`db_student_students`.`status` AS `status`,`db_guardian_guardians`.`guardian_name` AS `guardian_name`,`db_guardian_guardians`.`registration_no` AS `guardian_registration_no`,`db_guardian_guardians`.`contact_number` AS `guardian_phone_no`,`db_guardian_guardians`.`present_address` AS `guardian_address` from ((((`db_student_assignments` left join `db_student_students` on((`db_student_assignments`.`student_id` = `db_student_students`.`id`))) left join `db_academic_classes` on((`db_student_assignments`.`class_id` = `db_academic_classes`.`id`))) left join `db_academic_sections` on((`db_student_assignments`.`section_id` = `db_academic_sections`.`id`))) left join `db_guardian_guardians` on((`db_student_students`.`guardian_id` = `db_guardian_guardians`.`id`))) where ((`db_student_students`.`status` = 1) and (`db_student_students`.`assignment` = 1)) ;

-- --------------------------------------------------------

--
-- Structure for view `db_student_students_view`
--
DROP TABLE IF EXISTS `db_student_students_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_student_students_view`  AS  select `db_student_students`.`id` AS `id`,`db_student_students`.`name` AS `name`,`db_student_students`.`photo` AS `photo`,`db_student_students`.`guardian_id` AS `guardian_id`,`db_student_students`.`date_of_birth` AS `date_of_birth`,`db_student_students`.`gender` AS `gender`,`db_student_students`.`blood_group` AS `blood_group`,`db_student_students`.`religion` AS `religion`,`db_student_students`.`current_address` AS `current_address`,`db_student_students`.`permanent_address` AS `permanent_address`,`db_student_students`.`registration_no` AS `registration_no`,`db_student_students`.`extra_curricular_activities` AS `extra_curricular_acctivities`,`db_student_students`.`remarks` AS `remarks`,`db_student_students`.`assignment` AS `assignment`,`db_student_students`.`status` AS `status`,`db_guardian_guardians`.`guardian_name` AS `guardian_name`,`db_guardian_guardians`.`contact_number` AS `guardian_phone_no`,`db_guardian_guardians`.`registration_no` AS `guardian_registration_no`,`db_guardian_guardians`.`present_address` AS `guardian_address` from (`db_student_students` left join `db_guardian_guardians` on((`db_student_students`.`guardian_id` = `db_guardian_guardians`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `db_teacher_assignments_view`
--
DROP TABLE IF EXISTS `db_teacher_assignments_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_teacher_assignments_view`  AS  select `db_teacher_teachers`.`id` AS `id`,`db_teacher_teachers`.`name` AS `teacher_name`,`db_teacher_teachers`.`photo` AS `photo`,`db_teacher_teachers`.`date_of_birth` AS `date_of_birth`,`db_teacher_teachers`.`gender` AS `gender`,`db_teacher_teachers`.`blood_group` AS `blood_group`,`db_teacher_teachers`.`religion` AS `religion`,`db_teacher_teachers`.`current_address` AS `current_address`,`db_teacher_teachers`.`permanent_address` AS `permanent_address`,`db_teacher_teachers`.`registration_no` AS `registration_no`,`db_teacher_assignments`.`class_id` AS `class_id`,`db_academic_classes`.`name` AS `class_name`,`db_teacher_assignments`.`section_id` AS `section_id`,`db_academic_sections`.`name` AS `section_name`,`db_teacher_assignments`.`subject_id` AS `subject_id`,`db_academic_subjects`.`subject_name` AS `subject_name` from ((((`db_teacher_assignments` left join `db_teacher_teachers` on((`db_teacher_assignments`.`teacher_id` = `db_teacher_teachers`.`id`))) left join `db_academic_classes` on((`db_teacher_assignments`.`class_id` = `db_academic_classes`.`id`))) left join `db_academic_sections` on((`db_teacher_assignments`.`section_id` = `db_academic_sections`.`id`))) left join `db_academic_subjects` on((`db_teacher_assignments`.`subject_id` = `db_academic_subjects`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_academic_assignments`
--
ALTER TABLE `db_academic_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_academic_assignment_sections`
--
ALTER TABLE `db_academic_assignment_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_academic_classes`
--
ALTER TABLE `db_academic_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_academic_class_sessions`
--
ALTER TABLE `db_academic_class_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_academic_routines`
--
ALTER TABLE `db_academic_routines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_academic_routine_sections`
--
ALTER TABLE `db_academic_routine_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_academic_school_years`
--
ALTER TABLE `db_academic_school_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_academic_sections`
--
ALTER TABLE `db_academic_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_academic_subjects`
--
ALTER TABLE `db_academic_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_academic_syllabus`
--
ALTER TABLE `db_academic_syllabus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_account_accountants`
--
ALTER TABLE `db_account_accountants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_account_banks`
--
ALTER TABLE `db_account_banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_account_bank_wise_transactions`
--
ALTER TABLE `db_account_bank_wise_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_account_expenses`
--
ALTER TABLE `db_account_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_account_expense_types`
--
ALTER TABLE `db_account_expense_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_account_fees`
--
ALTER TABLE `db_account_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_account_fee_types`
--
ALTER TABLE `db_account_fee_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_account_incomes`
--
ALTER TABLE `db_account_incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_account_income_types`
--
ALTER TABLE `db_account_income_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_account_invoices`
--
ALTER TABLE `db_account_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_account_payments`
--
ALTER TABLE `db_account_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_account_payment_methods`
--
ALTER TABLE `db_account_payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_account_received_payments`
--
ALTER TABLE `db_account_received_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_announcement_notices`
--
ALTER TABLE `db_announcement_notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_attendance_devices`
--
ALTER TABLE `db_attendance_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_attendance_employee_att`
--
ALTER TABLE `db_attendance_employee_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_attendance_holidays`
--
ALTER TABLE `db_attendance_holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_attendance_log`
--
ALTER TABLE `db_attendance_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_attendance_student_att`
--
ALTER TABLE `db_attendance_student_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_attendance_user_info`
--
ALTER TABLE `db_attendance_user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_attendance_user_templates`
--
ALTER TABLE `db_attendance_user_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_attendance_verify_types`
--
ALTER TABLE `db_attendance_verify_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_days`
--
ALTER TABLE `db_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_designations`
--
ALTER TABLE `db_designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_exam_exam_attendances`
--
ALTER TABLE `db_exam_exam_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_exam_exam_schedules`
--
ALTER TABLE `db_exam_exam_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_exam_grades`
--
ALTER TABLE `db_exam_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_guardian_guardians`
--
ALTER TABLE `db_guardian_guardians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_holiday_global_holidays`
--
ALTER TABLE `db_holiday_global_holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_holiday_holidays`
--
ALTER TABLE `db_holiday_holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_holiday_holiday_types`
--
ALTER TABLE `db_holiday_holiday_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_holiday_individual_holidays`
--
ALTER TABLE `db_holiday_individual_holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_mark_marks`
--
ALTER TABLE `db_mark_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_mark_mark_distributions`
--
ALTER TABLE `db_mark_mark_distributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_mark_total_marks`
--
ALTER TABLE `db_mark_total_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_roles`
--
ALTER TABLE `db_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_rooms`
--
ALTER TABLE `db_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_sms_smses`
--
ALTER TABLE `db_sms_smses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_sms_templates`
--
ALTER TABLE `db_sms_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_student_assignments`
--
ALTER TABLE `db_student_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_student_deactivations`
--
ALTER TABLE `db_student_deactivations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_student_students`
--
ALTER TABLE `db_student_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_teacher_assignments`
--
ALTER TABLE `db_teacher_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_teacher_deactivations`
--
ALTER TABLE `db_teacher_deactivations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_teacher_teachers`
--
ALTER TABLE `db_teacher_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_users`
--
ALTER TABLE `db_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_academic_assignments`
--
ALTER TABLE `db_academic_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `db_academic_assignment_sections`
--
ALTER TABLE `db_academic_assignment_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `db_academic_classes`
--
ALTER TABLE `db_academic_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `db_academic_class_sessions`
--
ALTER TABLE `db_academic_class_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `db_academic_routines`
--
ALTER TABLE `db_academic_routines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `db_academic_routine_sections`
--
ALTER TABLE `db_academic_routine_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `db_academic_school_years`
--
ALTER TABLE `db_academic_school_years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_academic_sections`
--
ALTER TABLE `db_academic_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `db_academic_subjects`
--
ALTER TABLE `db_academic_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `db_academic_syllabus`
--
ALTER TABLE `db_academic_syllabus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `db_account_accountants`
--
ALTER TABLE `db_account_accountants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `db_account_banks`
--
ALTER TABLE `db_account_banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `db_account_bank_wise_transactions`
--
ALTER TABLE `db_account_bank_wise_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `db_account_expenses`
--
ALTER TABLE `db_account_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_account_expense_types`
--
ALTER TABLE `db_account_expense_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `db_account_fees`
--
ALTER TABLE `db_account_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `db_account_fee_types`
--
ALTER TABLE `db_account_fee_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `db_account_incomes`
--
ALTER TABLE `db_account_incomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_account_income_types`
--
ALTER TABLE `db_account_income_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `db_account_invoices`
--
ALTER TABLE `db_account_invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `db_account_payments`
--
ALTER TABLE `db_account_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `db_account_payment_methods`
--
ALTER TABLE `db_account_payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `db_account_received_payments`
--
ALTER TABLE `db_account_received_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `db_announcement_notices`
--
ALTER TABLE `db_announcement_notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_attendance_devices`
--
ALTER TABLE `db_attendance_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `db_attendance_employee_att`
--
ALTER TABLE `db_attendance_employee_att`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `db_attendance_holidays`
--
ALTER TABLE `db_attendance_holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `db_attendance_log`
--
ALTER TABLE `db_attendance_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_attendance_student_att`
--
ALTER TABLE `db_attendance_student_att`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=422;

--
-- AUTO_INCREMENT for table `db_attendance_user_info`
--
ALTER TABLE `db_attendance_user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `db_attendance_user_templates`
--
ALTER TABLE `db_attendance_user_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `db_attendance_verify_types`
--
ALTER TABLE `db_attendance_verify_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `db_days`
--
ALTER TABLE `db_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `db_designations`
--
ALTER TABLE `db_designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `db_exam_exam_attendances`
--
ALTER TABLE `db_exam_exam_attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `db_exam_exam_schedules`
--
ALTER TABLE `db_exam_exam_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_exam_grades`
--
ALTER TABLE `db_exam_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_guardian_guardians`
--
ALTER TABLE `db_guardian_guardians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `db_holiday_global_holidays`
--
ALTER TABLE `db_holiday_global_holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `db_holiday_holidays`
--
ALTER TABLE `db_holiday_holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `db_holiday_holiday_types`
--
ALTER TABLE `db_holiday_holiday_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `db_holiday_individual_holidays`
--
ALTER TABLE `db_holiday_individual_holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `db_mark_marks`
--
ALTER TABLE `db_mark_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_mark_mark_distributions`
--
ALTER TABLE `db_mark_mark_distributions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `db_mark_total_marks`
--
ALTER TABLE `db_mark_total_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_roles`
--
ALTER TABLE `db_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `db_rooms`
--
ALTER TABLE `db_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `db_sms_smses`
--
ALTER TABLE `db_sms_smses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_sms_templates`
--
ALTER TABLE `db_sms_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_student_assignments`
--
ALTER TABLE `db_student_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `db_student_deactivations`
--
ALTER TABLE `db_student_deactivations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_student_students`
--
ALTER TABLE `db_student_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `db_teacher_assignments`
--
ALTER TABLE `db_teacher_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `db_teacher_deactivations`
--
ALTER TABLE `db_teacher_deactivations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_teacher_teachers`
--
ALTER TABLE `db_teacher_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `db_users`
--
ALTER TABLE `db_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
