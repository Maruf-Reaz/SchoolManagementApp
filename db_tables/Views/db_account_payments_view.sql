CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_account_payments_view` AS select  `db_account_invoices`.`id` AS `id`,  `db_student_students`.`id` AS `student_id`,  `db_academic_classes`.`id` AS `class_id`,  `db_academic_sections`.`id` AS `section_id`,  `db_account_fee_types`.`id` AS `fee_type_id`,  `db_account_payments`.`id` AS `payment_id`,  `db_account_payments`.`payment_method_id` AS `payment_method_id`,  `db_account_invoices`.`invoice_number` AS `invoice_number`,  `db_student_students`.`name` AS `student_name`,  `db_student_students`.`email` AS `email`,  `db_student_students`.`roll` AS `roll`,  `db_student_students`.`photo` AS `photo`,  `db_academic_classes`.`name` AS `class_name`,  `db_academic_sections`.`name` AS `section_name`,  `db_account_fee_types`.`fee_type_name` AS `fee_type_name`,  `db_account_fee_types`.`note` AS `note`,  `db_account_invoices`.`amount` AS `amount`,  `db_account_invoices`.`discount_in_percentage` AS `discount_in_percentage`,  `db_account_invoices`.`paid_amount` AS `total_paid_amount`,  `db_account_invoices`.`due_amount` AS `due_amount`,  `db_account_payments`.`paid_amount` AS `paid_amount`,  `db_account_payment_methods`.`payment_method_name` AS `payment_method_name`,  `db_account_payments`.`date` AS `payment_date`,  `db_account_invoices`.`date` AS `invoice_date` from ((((((`db_account_invoices`  join `db_student_students`  on ((`db_student_students`.`id` = `db_account_invoices`.`student_id`)))  join `db_academic_classes`  on ((`db_academic_classes`.`id` = `db_account_invoices`.`class_id`)))  join `db_academic_sections`  on ((`db_academic_sections`.`id` = `db_account_invoices`.`section_id`)))  join `db_account_fee_types`  on ((`db_account_fee_types`.`id` = `db_account_invoices`.`fee_type_id`)))  join `db_account_payments`  on ((`db_account_payments`.`invoice_number` = `db_account_invoices`.`invoice_number`)))  join `db_account_payment_methods`  on ((`db_account_payments`.`payment_method_id` = `db_account_payment_methods`.`id`)))