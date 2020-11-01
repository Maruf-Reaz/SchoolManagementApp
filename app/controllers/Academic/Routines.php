<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/20/2018
 * Time: 4:14 PM
 */

namespace App\Controllers\Academic;


use App\Libraries\Controller;
use App\Libraries\Validation;
use App\Models\Academic\AcademicClass;
use App\Models\Academic\Routine;
use App\Models\Academic\Subject;
use App\Models\Academic\Section;
use App\Models\Teacher;

class Routines extends Controller {
	private $routine;
	private $classes;
	private $teachers;

	public function __construct() {
		$this->middleware( [ 'Authentication' ] )->all();
		$this->middleware( [ 'Roles' ] )->all()->hasRole( [
			'all' => [ 'Admin' ],
		] );
		$this->routine  = new Routine();
		$this->classes  = new AcademicClass();
		$this->teachers = new Teacher();
		$this->teachers = new Teacher();
	}

	public function store() {
		if ( POST ) {
			//Validations
			$validation = new Validation();
			$validation->name( 'school_year' )->value( $_POST['school_year'] )->pattern( 'text' )->required();
			$validation->name( 'class_id' )->value( $_POST['class_id'] )->pattern( 'int' )->required();
			$validation->name( 'sections' )->value( $_POST['sections'] )->pattern( 'array' )->required();
			$validation->name( 'subject_id' )->value( $_POST['subject_id'] )->pattern( 'int' )->required();
			$validation->name( 'teacher_id' )->value( $_POST['teacher_id'] )->pattern( 'int' )->required();
			$validation->name( 'day_id' )->value( $_POST['day_id'] )->pattern( 'int' )->required();
			$validation->name( 'starting_time' )->value( $_POST['starting_time'] )->pattern( 'text' )->required();
			$validation->name( 'ending_time' )->value( $_POST['ending_time'] )->pattern( 'text' )->required();
			$validation->name( 'room_id' )->value( $_POST['room_id'] )->pattern( 'int' )->required();

			if ( $validation->isSuccess() ) {
				//Validated
				$this->routine->school_year   = $_POST['school_year'];
				$this->routine->class_id      = $_POST['class_id'];
				$this->routine->subject_id    = $_POST['subject_id'];
				$this->routine->teacher_id    = $_POST['teacher_id'];
				$this->routine->day_id        = $_POST['day_id'];
				$this->routine->starting_time = $_POST['starting_time'];
				$this->routine->ending_time   = $_POST['ending_time'];
				$this->routine->room_id       = $_POST['room_id'];

				/*
				 * Check for room conflict
				 *
				 * */
				if ( $this->routine->isSloteAvailable() ) {
					if ( $this->routine->create() ) {
						$this->routine->saveSections( $_POST['sections'] );
						redirect( 'academic/routines/index' );
					}
				} else {
					$this->add( $this->routine );
				}

			} else {
				echo $validation->displayErrors();
			}
		}

	}

	public function add( $routine = null ) {
		$teachers           = $this->teachers->getAll();
		$classes            = $this->classes->getAll();
		$rooms              = $this->routine->getRooms();
		$days               = $this->routine->getDays();
		$academic_years     = $this->routine->getAcademicyears();
		$subjects           = null;
		$sections           = null;
		$conflicted_routine = null;
		if ( isset( $routine ) ) {
			if ( isset( $routine->conflicted_routine_id ) ) {
				$conflicted_routine = $this->routine->getById( $routine->conflicted_routine_id );
				$subjects           = ( new Subject() )->getAll();
				$sections           = ( new Section() )->getSectionsByClass( $routine->class_id );
			}
		}
		$data = [
			'classes'            => $classes,
			'teachers'           => $teachers,
			'rooms'              => $rooms,
			'academic_years'     => $academic_years,
			'days'               => $days,
			'conflicted_routine' => $conflicted_routine,
			'routine'            => $routine,
			'subjects'           => $subjects,
			'sections'           => $sections,
			'classes'            => $classes,
		];

		$this->view( 'academic/routines/add', $data );
	}

	public function update() {
		if ( POST ) {
			//Validations
			$validation = new Validation();
			$validation->name( 'id' )->value( $_POST['id'] )->pattern( 'int' )->required();
			$validation->name( 'school_year' )->value( $_POST['school_year'] )->pattern( 'text' )->required();
			$validation->name( 'class_id' )->value( $_POST['class_id'] )->pattern( 'int' )->required();
			$validation->name( 'sections' )->value( $_POST['sections'] )->pattern( 'array' )->required();
			$validation->name( 'subject_id' )->value( $_POST['subject_id'] )->pattern( 'int' )->required();
			$validation->name( 'teacher_id' )->value( $_POST['teacher_id'] )->pattern( 'int' )->required();
			$validation->name( 'day_id' )->value( $_POST['day_id'] )->pattern( 'int' )->required();
			$validation->name( 'starting_time' )->value( $_POST['starting_time'] )->pattern( 'text' )->required();
			$validation->name( 'ending_time' )->value( $_POST['ending_time'] )->pattern( 'text' )->required();
			$validation->name( 'room_id' )->value( $_POST['room_id'] )->pattern( 'int' )->required();

			if ( $validation->isSuccess() ) {
				//Validated
				$this->routine->id            = $_POST['id'];
				$this->routine->school_year   = $_POST['school_year'];
				$this->routine->class_id      = $_POST['class_id'];
				$this->routine->subject_id    = $_POST['subject_id'];
				$this->routine->teacher_id    = $_POST['teacher_id'];
				$this->routine->day_id        = $_POST['day_id'];
				$this->routine->starting_time = $_POST['starting_time'];
				$this->routine->ending_time   = $_POST['ending_time'];
				$this->routine->room_id       = $_POST['room_id'];

				/*
				 * Check for room conflict
				 *
				 * */

				if ( $this->routine->isSloteAvailable() ) {
					if ( $this->routine->update() ) {
						$this->routine->updateSections( $_POST['sections'] );
						redirect( 'academic/routines/index' );
					}
				} else {
					$this->add( $this->routine );
				}

			} else {
				echo $validation->displayErrors();
			}
		}
	}

	public function edit( $id = 0, $routine_param = null ) {
		if ( $id == 0 && $routine_param == null ) {
			redirect( 'academic/routines/index' );
		} else {
			if ( $routine_param == null ) {
				$routine = $this->routine->getById( $id );
			} else {
				$routine = $routine_param;
			}
			if ( $routine == null ) {
				redirect( 'academic/routines/index' );
			} else {
				$routineSections    = $routine->getSections();
				$teachers           = $this->teachers->getAll();
				$classes            = $this->classes->getAll();
				$rooms              = $this->routine->getRooms();
				$academic_years     = $this->routine->getAcademicyears();
				$days               = $this->routine->getDays();
				$subjects           = ( new Subject() )->getAll();
				$sections           = ( new Section() )->getSectionsByClass( $routine->class_id );
				$conflicted_routine = null;
				if ( isset( $routine->conflicted_routine_id ) ) {
					$conflicted_routine = $this->routine->getById( $routine->conflicted_routine_id );
				}
				$data = [
					'routine'            => $routine,
					'sections'           => $sections,
					'routineSections'    => $routineSections,
					'academic_years'     => $academic_years,
					'classes'            => $classes,
					'subjects'           => $subjects,
					'teachers'           => $teachers,
					'rooms'              => $rooms,
					'days'               => $days,
					'conflicted_routine' => $conflicted_routine,
				];

				$this->view( 'academic/routines/edit', $data );
			}
		}
	}

	public function getSectionAndSubjectByClass() {
		if ( isset( $_POST['class_id'] ) ) {

			$data = $this->routine->getSectionAndSubjectByClass( $_POST['class_id'] );

			return jsonResult( $data );
		}
	}

	public function getRoutineByClassAndSection() {
		$class_id   = $_POST['class_id'];
		$section_id = $_POST['section_id'];
		//Validations
		$validation = new Validation();
		$validation->name( 'class_id' )->value( $class_id )->pattern( 'int' )->required();
		$validation->name( 'section_id' )->value( $section_id )->pattern( 'int' )->required();

		if ( $validation->isSuccess() ) {
			//Validation success
			$result = $this->routine->getRoutineByClassAndSection( $class_id, $section_id );

			return jsonResult( $result );
		}
	}

	public function index() {
		$classes = $this->classes->getAll();
		$data    = [
			'classes' => $classes,
		];
		$this->view( 'academic/routines/index', $data );
	}
}