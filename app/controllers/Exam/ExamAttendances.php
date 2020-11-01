<?php

namespace App\Controllers\Exam;

use App\Controllers\Mark\Marks;
use App\Libraries\Controller;
use App\Models\Academic\AcademicClass;
use App\Models\Exam\Exam;
use App\Models\Exam\ExamAttendance;
use App\Models\Exam\ExamSchedule;
use App\Models\Mark\MarkDistribution;
use App\Models\Mark\Mark;
use App\Models\Student;

class ExamAttendances extends Controller {
	public function __construct() {
		$this->middleware( [ 'Authentication' ] )->all();
		$this->middleware( [ 'Roles' ] )->all()->hasRole( [
			'all' => [ 'Admin' ],
		] );
	}

	public function index() {
		$exams   = Exam::GetInstance()->getAll();
		$classes = AcademicClass::GetInstance()->getAll();
		$data    =
			[
				'exams'   => $exams,
				'classes' => $classes,
			];

		$this->view( 'exam/exam_attendances/index', $data );
	}

	public function getAttendance() {
		$section_id           = $_GET['section_id'];
		$class_id             = $_GET['class_id'];
		$subject_id           = $_GET['subject_id'];
		$exam_id              = $_GET['exam_id'];
		$mark_distribution_id = $_GET['mark_distribution'];
		$attendances          = ExamAttendance::GetInstance()->getAttendanceByExamAndClassAndSectionAndSubject( $exam_id, $class_id, $section_id, $subject_id, $mark_distribution_id );
		return jsonResult( $attendances );

	}

	public function add() {
		if ( POST ) {
			$this->view( 'exam/exam_schedules/add' );

		} else {
			$classes = AcademicClass::GetInstance()->getAll();
			$exams   = Exam::GetInstance()->getAll();
			$data    = [

				'classes' => $classes,
				'exams'   => $exams,
			];
			$this->view( 'exam/exam_attendances/add', $data );
		}

	}

	public function changeStatus() {

		$attendance_id        = $_GET['attendance_id'];
		$section_id           = $_GET['section_id'];
		$class_id             = $_GET['class_id'];
		$subject_id           = $_GET['subject_id'];
		$exam_id              = $_GET['exam_id'];
		$mark_distribution_id = $_GET['mark_distribution'];
		$student_id = $_GET['student_id'];
		$get_id     = new ExamAttendance();
		$attendance = ExamAttendance::GetInstance()->getById( $attendance_id );
		if ( $attendance->value == 1 ) {
			$mark = new Mark();
			if ($mark->checkIfAnyMarkExists($exam_id,$subject_id,$student_id,$mark_distribution_id ))
			{
				$mark->deleteByAttendanceId( $attendance_id );
				$mark->deleteTotalMark($exam_id,$subject_id,$student_id);
				$get_id->updateStatus( $attendance_id, "0" );
			}

			$attendances = ExamAttendance::GetInstance()->getAttendanceByExamAndClassAndSectionAndSubject( $exam_id, $class_id, $section_id, $subject_id, $mark_distribution_id );
			return jsonResult( $attendances );
		} else {
			$mark                      = new Mark();
			$mark->attendance_id        = $attendance_id;
			$mark->gained_mark          = 0;
			$mark->highest_mark         = 0;
			$mark->create();
			$mark->InitializeTotalMark($student_id,$exam_id,$subject_id);
			$get_id->updateStatus( $attendance_id, "1" );
			$attendances = ExamAttendance::GetInstance()->getAttendanceByExamAndClassAndSectionAndSubject( $exam_id, $class_id, $section_id, $subject_id, $mark_distribution_id );
			return jsonResult( $attendances );
		}
	}
}