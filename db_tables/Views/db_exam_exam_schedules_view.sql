CREATE VIEW db_exam_exam_schedules_view AS
SELECT db_exam_exam_schedules.id AS id,db_exam_exams.id AS exam_id,db_exam_exams.name AS exam_name,db_exam_exam_schedules.class_id AS class_id,
db_academic_classes.name AS class_name,db_academic_sections.id AS section_id ,db_academic_sections.name AS section__name
,db_academic_subjects.id AS subject_id,db_academic_subjects.subject_name AS subject_name,
db_exam_exam_schedules.date AS exam_date,db_exam_exam_schedules.from_time AS from_time,
db_exam_exam_schedules.to_time AS to_time,db_exam_exam_schedules.room_id AS room_name
FROM db_exam_exam_schedules
LEFT JOIN db_academic_classes
ON db_exam_exam_schedules.class_id= db_academic_classes.id
LEFT JOIN db_academic_sections
ON db_exam_exam_schedules.section_id= db_academic_sections.id
LEFT JOIN db_academic_subjects
ON db_exam_exam_schedules.subject_id= db_academic_subjects.id
LEFT JOIN db_exam_exams
ON db_exam_exam_schedules.exam_id= db_exam_exams.id