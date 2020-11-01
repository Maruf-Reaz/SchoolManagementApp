<?php

namespace App\Controllers\Exam;

use App\Libraries\Controller;
use App\Models\Exam\Grade;
use App\Libraries\Http\Request;
use App\Libraries\Validation;

class Grades extends Controller {

	public function __construct() {
		$this->middleware( [ 'Authentication' ] )->all();
		$this->middleware( [ 'Roles' ] )->all()->hasRole( [
			'all' => [ 'Admin' ],
		] );
	}

	public function index() {
		$grade = Grade::GetInstance()->getAll();
		$data  = [
			'grade' => $grade,
		];
		$this->view( 'exam/grades/index', $data );
	}

	public function addGrade() {
		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'grade_name' )->value( $_POST['grade_name'] )->pattern( 'text' )->required();
			$validation->name( 'grade_point' )->value( $_POST['grade_point'] )->pattern( 'float' )->required();
			$validation->name( 'mark_from' )->value( $_POST['mark_from'] )->pattern( 'int' )->required();
			$validation->name( 'mark_upto' )->value( $_POST['mark_upto'] )->pattern( 'int' )->required();
			$validation->name( 'note' )->value( $_POST['note'] )->pattern( 'text' )->required();
			if ( $validation->isSuccess() ) {

				$_POST              = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
				$grade              = new Grade();
				$grade->grade_name  = trim( $_POST['grade_name'] );
				$grade->grade_point = sprintf( '%0.2f', trim( $_POST['grade_point'] ) );
				$grade->mark_from   = trim( $_POST['mark_from'] );
				$grade->mark_upto   = trim( $_POST['mark_upto'] );
				$grade->note        = trim( $_POST['note'] );

				if ( Grade::GetInstance()->isExist( 'grade_point', Request::post( 'grade_point' ) ) or
				     Grade::GetInstance()->isExist( 'grade_name', Request::post( 'grade_name' ) ) ) {
					die( 'Grade already exist' );
				} else {
					if ( $this->checkIfMarkOverlaps( $grade->mark_from, $grade->mark_upto, 0 ) == false ) {
						if ( $grade->create() ) {
							redirect( '/exam/Grades/index' );
						} else {
							die( 'Something went Wrong' );
						}
					} else {
						die( 'Mark overlaps with other grade' );
					}

				}
			}
			else {
				echo $validation->displayErrors();
			}

		} else {
			$data = [
				'grade_name'  => '',
				'grade_point' => '',
				'mark_from'   => '',
				'mark-upto'   => '',
				'note'        => '',
			];
			$this->view( 'exam/grades/add', $data );

		}
	}

	public function checkIfMarkOverlaps( $mark_from, $mark_upto, $id ) {
		$grades = Grade::GetInstance()->getAllGradesExceptId( $id );
		foreach ( $grades as $grade ) {
			$from = $grade->mark_from;
			$to   = $grade->mark_upto;
			if ( ( $mark_from >= $from && $mark_from <= $to )
			     || ( $mark_upto >= $from && $mark_upto <= $to ) ) {
				return true;
				break;
			}
		}

		return false;
	}

	public function showGrade( $id = 0 ) {
		$grade = Grade::GetInstance()->getById( $id );
		$data  = [
			'id'          => $grade->id,
			'grade_name'  => $grade->grade_name,
			'grade_point' => $grade->grade_point,
			'mark_from'   => $grade->mark_from,
			'mark_upto'   => $grade->mark_upto,
			'note'        => $grade->note,
		];
		$this->view( 'exam/grades/edit', $data );
	}

	public function editGrade() {
		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'grade_name' )->value( $_POST['grade_name'] )->pattern( 'text' )->required();
			$validation->name( 'grade_point' )->value( $_POST['grade_point'] )->pattern( 'float' )->required();
			$validation->name( 'mark_from' )->value( $_POST['mark_from'] )->pattern( 'int' )->required();
			$validation->name( 'mark_upto' )->value( $_POST['mark_upto'] )->pattern( 'int' )->required();
			$validation->name( 'note' )->value( $_POST['note'] )->pattern( 'text' )->required();
			if ( $validation->isSuccess() ) {

				$_POST              = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
				$grade              = new Grade();
				$grade->id          = trim( $_POST['id'] );
				$grade->grade_name  = trim( $_POST['grade_name'] );
				$grade->grade_point = sprintf( '%0.2f', trim( $_POST['grade_point'] ) );
				$grade->mark_from   = trim( $_POST['mark_from'] );
				$grade->mark_upto   = trim( $_POST['mark_upto'] );
				$grade->note        = trim( $_POST['note'] );

				if ( Grade::GetInstance()->isExistsExceptId( 'grade_point', Request::post( 'grade_point' ), $grade->id ) or
				     Grade::GetInstance()->isExistsExceptId( 'grade_name', Request::post( 'grade_name' ), $grade->id ) ) {
					die( 'Grade already exist' );
				} else {
					if ( $this->checkIfMarkOverlaps( $grade->mark_from, $grade->mark_upto, $grade->id ) == false ) {

						if ( $grade->update() ) {
							redirect( '/exam/Grades/index' );
						} else {
							die( 'Something went Wrong' );
						}
					} else {
						die( 'Mark overlaps with other grade' );
					}

				}

			}
			else{
				//Show validation Errors
				echo $validation->displayErrors();
			}
		}
	}
}

