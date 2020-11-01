<?php

namespace App\Controllers\Exam;

use App\Libraries\Controller;
use App\Models\Exam\Exam;
use App\Models\Exam\ExamAttendance;
use App\Models\Exam\ExamSchedule;
use App\Models\Academic\AcademicClass;
use App\Models\Mark\MarkDistribution;
use App\Models\Student;
use App\Libraries\Validation;

class ExamSchedules extends Controller {


	public function __construct() {
		$this->middleware( [ 'Authentication' ] )->all();
		$this->middleware( [ 'Roles' ] )->all()->hasRole( [
			'all' => [ 'Admin' ],
		] );
	}

	public function index() {
		$classes       = AcademicClass::GetInstance()->getAll();
		$exam_schedule = ExamSchedule::GetInstance()->getAllExamSchedules();
		$data          = [
			'exam_schedule' => $exam_schedule,
			'classes'       => $classes,
		];
		$this->view( 'exam/exam_schedules/index', $data );
	}

	public function addExamSchedule() {
		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'exam_id' )->value( $_POST['exam_id'] )->pattern( 'int' )->required();
			$validation->name( 'class_id' )->value( $_POST['class_id'] )->pattern( 'int' )->required();
			$validation->name( 'section_id' )->value( $_POST['section_id'] )->pattern( 'int' )->required();
			$validation->name( 'subject_id' )->value( $_POST['subject_id'] )->pattern( 'int' )->required();
			$validation->name( 'date' )->value( $_POST['date'] )->pattern( 'text' )->required();
			$validation->name( 'from_time' )->value( $_POST['from_time'] )->pattern( 'text' )->required();
			$validation->name( 'to_time' )->value( $_POST['to_time'] )->pattern( 'text' )->required();
			$validation->name( 'room_id' )->value( $_POST['room_id'] )->pattern( 'int' )->required();
			$validation->name( 'mark_distribution_id' )->value( $_POST['mark_distribution_id'] )->pattern( 'int' )->required();

			if ( $validation->isSuccess() ) {
				$exam_schedule                       = new ExamSchedule();
				$exam_schedule->exam_id              = trim( $_POST['exam_id'] );
				$exam_schedule->class_id             = trim( $_POST['class_id'] );
				$exam_schedule->section_id           = trim( $_POST['section_id'] );
				$exam_schedule->subject_id           = trim( $_POST['subject_id'] );
				$exam_schedule->date                 = trim( $_POST['date'] );
				$exam_schedule->from_time            = trim( $_POST['from_time'] );
				$exam_schedule->to_time              = trim( $_POST['to_time'] );
				$exam_schedule->room_id              = trim( $_POST['room_id'] );
				$exam_schedule->mark_distribution_id = trim( $_POST['mark_distribution_id'] );
				$exam_attendance                     = new ExamAttendance();
				if ( $exam_schedule->create() ) {
					$student       = new Student();
					$students      = $student->getStudentByClassAndSection( $exam_schedule->class_id, $exam_schedule->section_id );
					$exam_schedule = $exam_schedule->getExamSchedulesId( $exam_schedule->exam_id, $exam_schedule->class_id, $exam_schedule->section_id, $exam_schedule->subject_id, $exam_schedule->mark_distribution_id );
					foreach ( $students as $student ) {
						$exam_attendance->exam_schedule_id = $exam_schedule->id;
						$exam_attendance->student_id       = $student->id;
						$exam_attendance->value            = 0;
						$exam_attendance->create();
					}
					/*$exam_attendance->populateAttendanceTable($exam_schedule->id,$students);*/
					redirect( 'exam/ExamSchedules/index' );
				} else {
					die( 'Something went Wrong' );
				}
			} else {
				//Show validation Errors
				echo $validation->displayErrors();

			}
		} else {
			$classes = AcademicClass::GetInstance()->getAll();
			$rooms   = ExamSchedule::GetInstance()->getAllRooms();
			$exam =  Exam::GetInstance()->getLastExam();
			$exams   = Exam::GetInstance()->getExamByYear( date( "Y" ) );
			$data    = [
				'classes' => $classes,
				'exams'   => $exams,
				'rooms'   => $rooms,
				'exam'   => $exam,
			];
			$this->view( 'exam/exam_schedules/add', $data );
		}
	}

	public function showExamSchedule( $id = 0 ) {
		$exam_schedule = ExamSchedule::GetInstance()->getExamScheduleById( $id );
		$rooms         = ExamSchedule::GetInstance()->getAllRooms();
		$exam =  Exam::GetInstance()->getLastExam();
		$classes       = AcademicClass::GetInstance()->getAll();
		$exams         = Exam::GetInstance()->getAll();
		$data          = [
			'exam_schedule' => $exam_schedule,
			'classes'       => $classes,
			'exams'         => $exams,
			'rooms'         => $rooms,
			'exam'         => $exam,
		];
		$this->view( 'exam/exam_schedules/edit', $data );
	}

	public function editExamSchedule() {
		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'exam_id' )->value( $_POST['exam_id'] )->pattern( 'int' )->required();
			$validation->name( 'class_id' )->value( $_POST['class_id'] )->pattern( 'int' )->required();
			$validation->name( 'section_id' )->value( $_POST['section_id'] )->pattern( 'int' )->required();
			$validation->name( 'subject_id' )->value( $_POST['subject_id'] )->pattern( 'int' )->required();
			$validation->name( 'date' )->value( $_POST['date'] )->pattern( 'text' )->required();
			$validation->name( 'from_time' )->value( $_POST['from_time'] )->pattern( 'text' )->required();
			$validation->name( 'to_time' )->value( $_POST['to_time'] )->pattern( 'text' )->required();
			$validation->name( 'room_id' )->value( $_POST['room_id'] )->pattern( 'int' )->required();
			$validation->name( 'mark_distribution_id' )->value( $_POST['mark_distribution_id'] )->pattern( 'int' )->required();

			if ( $validation->isSuccess() ) {

				$exam_schedule                       = new ExamSchedule();
				$exam_schedule->id                   = trim( $_POST['id'] );
				$exam_schedule->exam_id              = trim( $_POST['exam_id'] );
				$exam_schedule->class_id             = trim( $_POST['class_id'] );
				$exam_schedule->section_id           = trim( $_POST['section_id'] );
				$exam_schedule->subject_id           = trim( $_POST['subject_id'] );
				$exam_schedule->date                 = trim( $_POST['date'] );
				$exam_schedule->from_time            = trim( $_POST['from_time'] );
				$exam_schedule->to_time              = trim( $_POST['to_time'] );
				$exam_schedule->room_id              = trim( $_POST['room_id'] );
				$exam_schedule->mark_distribution_id = trim( $_POST['mark_distribution_id'] );

				$exam_attendance                     = new ExamAttendance();
				if ( $exam_schedule->update() ) {

					$student       = new Student();
					$students      = $student->getStudentByClassAndSection( $exam_schedule->class_id, $exam_schedule->section_id );
					$exam_schedule = $exam_schedule->getExamSchedulesId( $exam_schedule->exam_id, $exam_schedule->class_id, $exam_schedule->section_id, $exam_schedule->subject_id, $exam_schedule->mark_distribution_id );
					ExamAttendance::GetInstance()->deleteAttendanceByExamScheduleId($exam_schedule->id);

					foreach ( $students as $student ) {
						$exam_attendance->exam_schedule_id = $exam_schedule->id;
						$exam_attendance->student_id       = $student->id;
						$exam_attendance->value            = 0;
						$exam_attendance->create();
					}


					redirect( 'exam/ExamSchedules/index' );
				} else {
					die( 'Something went Wrong' );
				}
			} else {
				echo $validation->displayErrors();
			}

		}
	}

	public function getExamSchedulesByClass() {
		$students_by_class = ExamSchedule::GetInstance()->getExamSchedulesByClass( $_POST['class_id'] );

		return jsonResult( $students_by_class );
	}

	public function getMarkDistributionsByClass() {
		$mark_distributions_by_class = MarkDistribution::GetInstance()->getMarkDistributionsByClass( $_POST['class_id'] );

		return jsonResult( $mark_distributions_by_class );
	}

	public function getSubjectsByClass() {
		$subjects_by_class = ExamSchedule::GetInstance()->getSubjectsByClass( $_POST['class_id'] );

		return jsonResult( $subjects_by_class );
	}

}