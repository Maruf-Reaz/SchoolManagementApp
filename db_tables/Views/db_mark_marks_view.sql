CREATE VIEW db_mark_marks_view AS
SELECT db_mark_marks.id AS id,
db_exam_exams.id AS exam_id,db_exam_exams.name AS exam_name,db_exam_exam_schedules.id AS exam_schedules_id,
db_exam_exam_schedules.class_id AS class_id,
db_academic_classes.name AS class_name,db_academic_sections.id AS section_id ,db_academic_sections.name AS section_name
,db_academic_subjects.id AS subject_id,db_academic_subjects.subject_name AS subject_name,db_student_students.id AS student_id,db_student_students.name AS student_name,
db_student_students.photo AS student_photo,db_student_students.roll AS student_roll,db_student_students.email AS student_email,
db_exam_exam_attendances.value AS attendance_value ,db_mark_mark_distributions.type AS mark_type,db_mark_mark_distributions.value AS mark_value,
db_mark_marks.gained_mark AS gained_mark,db_mark_marks.highest_mark AS highest_mark,db_mark_marks.total_mark AS total_mark,db_mark_marks.grade_id AS grade_id
,db_exam_grades.grade_name AS grade_name,db_exam_grades.grade_point AS grade_point,db_exam_exam_attendances.id AS attendance_id,db_mark_mark_distributions.id AS mark_distribution_id

FROM db_mark_marks
LEFT JOIN db_exam_exam_attendances
ON db_mark_marks.attendance_id= db_exam_exam_attendances.id
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
LEFT JOIN db_mark_mark_distributions
ON db_mark_marks.mark_distribution_id= db_mark_mark_distributions.id
LEFT JOIN db_exam_grades
ON db_mark_marks.grade_id= db_exam_grades.id
