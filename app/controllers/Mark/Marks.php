<?php

namespace App\Controllers\Mark;

use App\Libraries\Controller;
use App\Models\Academic\Subject;
use App\Models\Exam\Grade;
use App\Models\Mark\MarkDistribution;
use App\Models\Academic\AcademicClass;
use App\Models\Exam\Exam;
use App\Models\Exam\ExamAttendance;
use App\Models\Exam\ExamSchedule;
use App\Models\Mark\Mark;
use App\Models\Student;

class Marks extends Controller {

	public function __construct() {
		$this->middleware( [ 'Authentication' ] )->all();
		$this->middleware( [ 'Roles' ] )->all()->hasRole( [
			'all' => [ 'Admin' ],
		] );
	}

	public function index() {
		if ( POST ) {
			$this->view( 'mark/marks/index' );

		} else {

			$classes = AcademicClass::GetInstance()->getAll();
			$data    = [

				'classes' => $classes,
			];
			$this->view( 'mark/marks/index', $data );

		}


	}

	public function add() {
		if ( POST ) {
			$this->view( 'mark/marks/add' );

		} else {

			$classes            = AcademicClass::GetInstance()->getAll();
			$exams              = Exam::GetInstance()->getExamByYear( date( "Y" ) );
			$mark_distributions = MarkDistribution::GetInstance()->getAll();
			$data               = [

				'classes'            => $classes,
				'exams'              => $exams,
				'mark_distributions' => $mark_distributions,
			];
			$this->view( 'mark/marks/add', $data );

		}
	}

	public function updateMarks() {
		$section_id        = $_GET['section_id'];
		$class_id          = $_GET['class_id'];
		$subject_id        = $_GET['subject_id'];
		$exam_id           = $_GET['exam_id'];
		$gained_mark       = $_GET['gained_mark'];
		$attendance_id     = $_GET['attendance_id'];
		$mark_distribution = $_GET['mark_distribution'];
		$student_id        = $_GET['student_id'];
		$update_mark       = new Mark();
		$update_mark->updateMark( $gained_mark, $attendance_id, $exam_id, $subject_id, $student_id );
		$update_mark->updateHighestMark( $exam_id, $class_id, $subject_id, $section_id, $mark_distribution );
		$this->getMarks();
	}

	public function getMarks() {
		$section_id           = $_GET['section_id'];
		$class_id             = $_GET['class_id'];
		$subject_id           = $_GET['subject_id'];
		$exam_id              = $_GET['exam_id'];
		$mark_distribution_id = $_GET['mark_distribution'];
		$marks                = Mark::GetInstance()->getMarksByExamAndClassAndSectionAndSubject( $exam_id, $class_id, $section_id, $subject_id, $mark_distribution_id );

		return jsonResult( $marks );
	}

	public function getAllMarks() {
		$class_id    = $_GET['class_id'];
		$section_id  = $_GET['section_id'];
		$attendances = Student::GetInstance()->getStudentByClassAndSection( $class_id, $section_id );

		return jsonResult( $attendances );

	}

	public function viewResultByStudent( $student_id ) {

		if ( POST ) {
			$exam_id      = $_POST['exam_id'];
			$studentMarks = Mark::GetInstance()->getStudentMarkForExam( $student_id, $exam_id );
			$exams        = Exam::GetInstance()->getAll();
			$class        = Student::GetInstance()->getClassIdAndSectionIdByStudentId( $student_id );
			$subjects     = Subject::GetInstance()->getSubjectByClassId( $class->class_id );
			$exam         = Exam::GetInstance()->getById( $exam_id );
			$grades       = Grade::GetInstance()->getAll();
			$data         = [
				'marks'      => $studentMarks,
				'subjects'   => $subjects,
				'exam'       => $exam,
				'exams'      => $exams,
				'grades'     => $grades,
				'student_id' => $student_id
			];
			$this->view( 'mark/marks/view_by_student', $data );

		} else {
			$exam               = Exam::GetInstance()->getLastExam();
			$exams              = Exam::GetInstance()->getAll();
			$studentMarks       = Mark::GetInstance()->getStudentMarkForExam( $student_id, $exam->id );
			$class              = Student::GetInstance()->getClassIdAndSectionIdByStudentId( $student_id );
			$mark_distributions = MarkDistribution::GetInstance()->getMarkDistributionsByClass( $class->class_id );
			$subjects           = Subject::GetInstance()->getSubjectByClassId( $class->class_id );

			$grade  = new Grade();
			$grades = $grade->getAll();
			$data   = [
				'marks'              => $studentMarks,
				'subjects'           => $subjects,
				'exam'               => $exam,
				'exams'              => $exams,
				'grades'             => $grades,
				'mark_distributions' => $mark_distributions,
				'student_id'         => $student_id
			];
			$this->view( 'mark/marks/view_by_student', $data );
		}
	}


	public function viewStudentResultBySubject() {
		$student_id         = ( $_GET['student_id'] );
		$subject_id         = ( $_GET['subject_id'] );
		$exam_id            = ( $_GET['exam_id'] );
		$mark_distributions = MarkDistribution::GetInstance()->getAll();
		$marks              = Mark::GetInstance()->getStudentMarkForExamAndSubject( $student_id, $exam_id, $subject_id );


		$data = [
			'marks'              => $marks,
			'mark_distributions' => $mark_distributions,
		];
		$this->view( 'mark/marks/view_student_result_by_subject', $data );
	}

	public function viewBySubject() {
		$student_id = ( $_GET['student_id'] );
		$subject_id = ( $_GET['subject_id'] );
		$exam_id    = ( $_GET['exam_id'] );
		$class      = Student::GetInstance()->getClassIdAndSectionIdByStudentId( $student_id );
		$students   = Student::GetInstance()->getStudentByClassAndSection( $class->class_id, $class->section_id );
		$marks      = Mark::GetInstance()->getMarksByClassSectionExamAndSubject( $class->class_id, $class->section_id, $exam_id, $subject_id );
		$subject    = Subject::GetInstance()->getById( $subject_id );


		$data = [
			'marks'    => $marks,
			'students' => $students,
			'subject' => $subject,
		];
		$this->view( 'mark/marks/view_by_subject', $data );

	}

	public function viewByClass() {
		$class_id = ( $_GET['class_id'] );
		$exam_id    = ( $_GET['exam_id'] );

		$students   = Student::GetInstance()->getStudentByClass($class_id);
		$marks      = Mark::GetInstance()->getMarksByClassAndExam( $class_id,$exam_id);



		$data = [
			'marks'    => $marks,
			'students'    => $students,
		];
		$this->view( 'mark/marks/view_by_class', $data );

	}


}





