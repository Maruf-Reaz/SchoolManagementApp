<?php

namespace App\Models\Mark;

use App\Libraries\Database;
use App\Libraries\Model;
use App\Models\Academic\Subject;
use App\Models\Exam\ExamSchedule;
use App\Models\Exam\Grade;


class Mark extends Model {
	protected static $table_name = "db_mark_marks";
	protected static $db_fields = [
		'id',
		'attendance_id',
		'gained_mark',
		'highest_mark',

	];
	public $id;
	public $attendance_id;
	public $gained_mark;
	public $highest_mark;
	protected $db_object;

	public function __construct() {
		$this->db_object = new Database();
	}


	public function checkIfAnyMarkExists( $exam_id, $subject_id, $student_id, $mark_distribution_id ) {
		$this->db_object->query( 'SELECT * FROM db_mark_marks_view WHERE mark_distribution_id=:mark_distribution_id AND student_id=:student_id AND exam_id=:exam_id AND subject_id=:subject_id;' );
		$this->db_object->bind( ':exam_id', $exam_id );
		$this->db_object->bind( ':subject_id', $subject_id );
		$this->db_object->bind( ':student_id', $student_id );
		$this->db_object->bind( ':mark_distribution_id', $mark_distribution_id );
		$this->db_object->execute();
		$result = $this->db_object->single();

		if ( $result->gained_mark > 0 ) {
			return false;
		} else {
			return true;

		}
	}


	public function deleteByAttendanceId( $attendance_id ) {
		$this->db_object->query( 'DELETE FROM db_mark_marks WHERE attendance_id =:attendance_id; ' );
		$this->db_object->bind( ':attendance_id', $attendance_id );
		$this->db_object->execute();
	}

	public function getMarksByAttendanceId( $attendance_id ) {
		$this->db_object->query( 'SELECT * FROM db_mark_marks_view WHERE attendance_id =:attendance_id; ' );
		$this->db_object->bind( ':attendance_id', $attendance_id );
		$this->db_object->execute();
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function deleteTotalMark( $exam_id, $subject_id, $student_id ) {
		$this->db_object->query( 'SELECT * FROM db_mark_marks_view WHERE student_id=:student_id AND exam_id=:exam_id AND subject_id=:subject_id;' );
		$this->db_object->bind( ':exam_id', $exam_id );
		$this->db_object->bind( ':subject_id', $subject_id );
		$this->db_object->bind( ':student_id', $student_id );
		$this->db_object->execute();
		$result = $this->db_object->single();
		if ( $result == null ) {
			$this->db_object->query( 'DELETE FROM db_mark_total_marks WHERE student_id=:student_id AND exam_id=:exam_id AND subject_id=:subject_id;' );
			$this->db_object->bind( ':exam_id', $exam_id );
			$this->db_object->bind( ':subject_id', $subject_id );
			$this->db_object->bind( ':student_id', $student_id );
			$this->db_object->execute();
		}

	}


	public function getMarksByExamAndClassAndSectionAndSubject( $exam_id, $class_id, $section_id, $subject_id, $mark_distribution_id ) {
		$this->db_object->query( 'SELECT * FROM db_mark_marks_view WHERE exam_id=:exam_id AND class_id=:class_id AND section_id=:section_id AND subject_id=:subject_id AND mark_distribution_id=:mark_distribution_id' );
		$this->db_object->bind( ':exam_id', $exam_id );
		$this->db_object->bind( ':class_id', $class_id );
		$this->db_object->bind( ':section_id', $section_id );
		$this->db_object->bind( ':subject_id', $subject_id );
		$this->db_object->bind( ':mark_distribution_id', $mark_distribution_id );
		$result = $this->db_object->resultSet();

		return $result;
	}


	public function AddMarksWhenMarkDistributionIsAdded() {
		$this->db_object->query( 'SELECT * FROM db_exam_exam_attendances; ' );
		$results = $this->db_object->resultSet();
		$this->db_object->execute();
		$this->db_object->query( 'SELECT MAX(id) as id FROM db_mark_mark_distributions; ' );
		$this->db_object->execute();
		$result1              = $this->db_object->single();
		$mark_distribution_id = $result1->id;

		foreach ( $results as $result ) {
			$this->db_object->query( 'INSERT INTO db_mark_marks (attendance_id,mark_distribution_id,total_mark,grade_id,gained_mark,highest_mark) VALUES(:attendance_id,:mark_distribution_id,:total_mark,:grade_id,:gained_mark,:highest_mark) ' );
			$this->db_object->bind( ':attendance_id', $result->id );
			$this->db_object->bind( ':mark_distribution_id', $mark_distribution_id );
			$this->db_object->bind( ':total_mark', 0 );
			$this->db_object->bind( ':grade_id', 0 );
			$this->db_object->bind( ':gained_mark', 0 );
			$this->db_object->bind( ':highest_mark', 100 );
			$this->db_object->execute();
		}
	}

	public function InitializeTotalMark( $student_id, $exam_id, $subject_id ) {
		$this->db_object->query( 'SELECT * FROM db_mark_total_marks WHERE student_id=:student_id AND exam_id=:exam_id AND subject_id=:subject_id;' );
		$this->db_object->bind( ':exam_id', $exam_id );
		$this->db_object->bind( ':subject_id', $subject_id );
		$this->db_object->bind( ':student_id', $student_id );
		$this->db_object->execute();
		$result = $this->db_object->resultSet();
		if ( $result == null ) {
			$this->db_object->query( 'INSERT INTO db_mark_total_marks (student_id,exam_id,subject_id) VALUES (:student_id,:exam_id,:subject_id) ' );
			$this->db_object->bind( ':exam_id', $exam_id );
			$this->db_object->bind( ':subject_id', $subject_id );
			$this->db_object->bind( ':student_id', $student_id );
			$this->db_object->execute();
		}
	}


	public function updateMark( $gained_mark, $attendance_id, $exam_id, $subject_id, $student_id ) {

		$this->db_object->query( 'UPDATE db_mark_marks SET gained_mark=:gained_mark WHERE attendance_id=:attendance_id' );
		$this->db_object->bind( ':gained_mark', $gained_mark );
		$this->db_object->bind( ':attendance_id', $attendance_id );
		$this->db_object->execute();

		$this->db_object->query( 'SELECT SUM(gained_mark) AS total_mark FROM db_mark_marks_view WHERE exam_id=:exam_id AND student_id=:student_id AND subject_id=:subject_id ' );
		$this->db_object->bind( ':subject_id', $subject_id );
		$this->db_object->bind( ':exam_id', $exam_id );
		$this->db_object->bind( ':student_id', $student_id );
		$this->db_object->execute();
		$result = $this->db_object->single();


		$grades = Grade::GetInstance()->getAll();
		foreach ( $grades as $grade ) {
			if ( $result->total_mark >= $grade->mark_from && $result->total_mark <= $grade->mark_upto ) {

				$this->db_object->query( 'UPDATE db_mark_total_marks SET total_mark=:total_mark,grade_id=:grade_id WHERE exam_id=:exam_id AND student_id=:student_id AND subject_id=:subject_id' );
				$this->db_object->bind( ':grade_id', $grade->id );
				$this->db_object->bind( ':total_mark', $result->total_mark );
				$this->db_object->bind( ':subject_id', $subject_id );
				$this->db_object->bind( ':exam_id', $exam_id );
				$this->db_object->bind( ':student_id', $student_id );
				$this->db_object->execute();
			}
		}

		$this->db_object->query( 'SELECT MAX(total_mark) AS highest_mark FROM db_mark_total_marks WHERE exam_id=:exam_id AND subject_id=:subject_id ' );
		$this->db_object->bind( ':subject_id', $subject_id );
		$this->db_object->bind( ':exam_id', $exam_id );
		$this->db_object->execute();
		$result_highest_mark = $this->db_object->single();

		$this->db_object->query( 'UPDATE db_mark_total_marks SET highest_mark=:highest_mark WHERE exam_id=:exam_id AND subject_id=:subject_id' );
		$this->db_object->bind( ':highest_mark', $result_highest_mark->highest_mark );
		$this->db_object->bind( ':subject_id', $subject_id );
		$this->db_object->bind( ':exam_id', $exam_id );
		$this->db_object->execute();


	}

	public function updateHighestMark( $exam_id, $class_id, $subject_id, $section_id, $mark_distribution_id ) {
		$exam_schedule    = new ExamSchedule();
		$exam_schedule_id = $exam_schedule->getExamSchedulesId( $exam_id, $class_id, $section_id, $subject_id, $mark_distribution_id );
		$this->db_object->query( 'SELECT MAX(gained_mark) AS highest_mark FROM db_mark_marks_view WHERE exam_schedules_id=:exam_schedules_id' );
		$this->db_object->bind( ':exam_schedules_id', $exam_schedule_id->id );
		$this->db_object->execute();
		$result = $this->db_object->single();

		$this->db_object->query( 'UPDATE db_mark_marks_view SET highest_mark=:highest_mark WHERE exam_schedules_id=:exam_schedules_id ' );
		$this->db_object->bind( ':exam_schedules_id', $exam_schedule_id->id );
		$this->db_object->bind( ':highest_mark', $result->highest_mark );
		$this->db_object->execute();


	}

	public function getStudentMark( $student_id ) {
		$this->db_object->query( 'SELECT * FROM db_mark_marks_view WHERE student_id =:student_id ORDER BY exam_schedules_id,mark_distribution_id; ' );
		$this->db_object->bind( ':student_id', $student_id );
		$this->db_object->execute();
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getStudentMarkForExam( $student_id, $exam_id ) {
		$this->db_object->query( 'SELECT * FROM db_mark_total_marks_view WHERE student_id =:student_id AND exam_id=:exam_id ORDER BY exam_schedules_id,mark_distribution_id;' );
		$this->db_object->bind( ':student_id', $student_id );
		$this->db_object->bind( ':exam_id', $exam_id );
		$this->db_object->execute();
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getStudentMarkForExamAndSubject( $student_id, $exam_id, $subject_id ) {
		$this->db_object->query( 'SELECT * FROM db_mark_marks_view WHERE student_id =:student_id AND exam_id=:exam_id AND subject_id=:subject_id;' );
		$this->db_object->bind( ':student_id', $student_id );
		$this->db_object->bind( ':exam_id', $exam_id );
		$this->db_object->bind( ':subject_id', $subject_id );
		$this->db_object->execute();
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getMarksByClassSectionExamAndSubject( $class_id, $section_id, $exam_id, $subject_id ) {
		$this->db_object->query( 'SELECT * FROM db_mark_total_marks_view WHERE class_id =:class_id AND  section_id=:section_id  AND exam_id=:exam_id AND subject_id=:subject_id;' );
		$this->db_object->bind( ':class_id', $class_id );
		$this->db_object->bind( ':section_id', $section_id );
		$this->db_object->bind( ':exam_id', $exam_id );
		$this->db_object->bind( ':subject_id', $subject_id );
		$this->db_object->execute();
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getMarksByClassAndExam( $class_id, $exam_id ) {
		$this->db_object->query( 'SELECT * FROM db_mark_total_marks_view WHERE class_id =:class_id AND exam_id=:exam_id ORDER BY student_id,subject_id;' );
		$this->db_object->bind( ':class_id', $class_id );
		$this->db_object->bind( ':exam_id', $exam_id );
		$this->db_object->execute();
		$marks    = $this->db_object->resultSet();
		$gpa      = array();
		$student  = 0;
		$subject  = 0;
		$point    = 0;
		$subjects = Subject::GetInstance()->getSubjectByClassId( $class_id );
		$i   = 0;
		$len = count( $marks );
		$student_prev = null;
		foreach ( $marks as $mark ) {
			if ( $student == 0 or $student == $mark->student_id ) {
				if ( $subject != $mark->subject_id ) {
					$point   += $mark->grade_point;
					$student = $mark->student_id;
					$subject = $mark->subject_id;
					$i++;
					$student_prev=$mark;

				} else {
					if ( $i == $len - 1 ){
						$temp = ( $point / count( $subjects ) );
						$mark->gpa = sprintf('%0.2f', $temp);
						$mark->total_grade_name = $this->getGradeName($mark->gpa );
						$gpa[]       = $mark;
					}
					$i++;
					continue;
				}
			} else {
				if ( $point == 0 ) {
					$student_prev->gpa = 0.00;
					$student_prev->total_grade_name ="F" ;
					$gpa[]       = $student_prev;
					$point     = 0;
					$point     += $mark->grade_point;
					$student   = 0;
					$subject   = $mark->subject_id;
					$i++;
				} else {

					$temp = ( $point / count( $subjects ) );
					$student_prev->gpa = sprintf('%0.2f', $temp);

					$student_prev->total_grade_name = $this->getGradeName($student_prev->gpa );
					$gpa[]       = $student_prev;
					$point     = 0;
					$point     += $mark->grade_point;
					$student   = 0;
					$subject   = $mark->subject_id;
					$i++;
				}
			}
		}
		return $gpa;
	}
	public function getGradeName( $gpa)
	{
		$grades    = Grade::GetInstance()->getAllGrades();

			for ($i=0;$i<count($grades)-1;$i++)
			{
				$from = $grades[$i]->grade_point;
				$to = $grades[$i+1]->grade_point;
				if ($gpa>$from and $gpa<$to){
					return $grades[$i]->grade_name;
				}
				elseif ($gpa==$from){
					return $grades[$i]->grade_name;
				}
			}

	}

}