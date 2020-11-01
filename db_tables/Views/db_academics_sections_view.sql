CREATE  VIEW `db_academic_sections_view` AS
select
  `db_academic_sections`.`id`       AS `id`,
  `db_academic_sections`.`name`     AS `section_name`,
  `db_academic_sections`.`class_id` AS `class_id`,
  `db_academic_sections`.`catagory` AS `catagory`,
  `db_academic_sections`.`capacity` AS `capacity`,
  `db_teacher_teachers`.`name`      AS `teacher_name`,
  `db_academic_sections`.`note`     AS `note`
from (`db_academic_sections`
   join `db_teacher_teachers`
     on ((`db_academic_sections`.`teacher_id` = `db_teacher_teachers`.`id`)))
