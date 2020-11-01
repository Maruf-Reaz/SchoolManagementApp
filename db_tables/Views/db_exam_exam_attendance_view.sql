CREATE VIEW db_exam_exam_attendance_view AS
SELECT db_exam_exam_attendances.id AS id,db_exam_exams.id AS exam_id,db_exam_exams.name AS exam_name,db_exam_exam_schedules.class_id AS class_id,
db_academic_classes.name AS class_name,db_academic_sections.id AS section_id ,db_academic_sections.name AS section_name
,db_academic_subjects.id AS subject_id,db_academic_subjects.subject_name AS subject_name,db_student_students.id AS student_id,db_student_students.name AS student_name,
db_student_students.photo AS student_photo,db_student_students.roll AS student_roll,db_student_students.email AS student_email,
db_exam_exam_attendances.value AS attendance_value
FROM db_exam_exam_attendances
LEFT JOIN db_exam_exam_schedules
ON db_exam_exam_attendances.exam_schedule_id= db_exam_exam_schedules.id
LEFT JOIN db_student_students
ON db_exam_exam_attendances.student_id= db_student_students.id
LEFT JOIN db_academic_classes
ON db_exam_exam_schedules.class_id= db_academic_classes.id
LEFT JOIN db_academic_sections
ON db_exam_exam_schedules.section_id= db_academic_sections.id
LEFT JOIN db_academic_subjects
ON db_exam_exam_schedules.subject_id= db_academic_subjects.id
LEFT JOIN db_exam_exams
ON db_exam_exam_schedules.exam_id= db_exam_exams.id