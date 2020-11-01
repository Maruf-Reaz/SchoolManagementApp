<?php

namespace App\Controllers\Exam;

use App\Libraries\Controller;
use App\Models\Exam\Exam;
use App\Libraries\Validation;

class Exams extends Controller {

	public function __construct() {
		$this->middleware( [ 'Authentication' ] )->all();
		$this->middleware( [ 'Roles' ] )->all()->hasRole( [
			'all' => [ 'Admin' ],
		] );
	}

	public function index() {
		$year  = date( "Y" );
		$exam  = new Exam();
		$exams = $exam->getExamByYEar( $year );
		$data  = [
			'exams' => $exams,
		];
		$this->view( 'exam/exams/index', $data );
	}

	public function add() {
		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'name' )->value( $_POST['name'] )->pattern( 'text' )->required();
			$validation->name( 'from_date' )->value( $_POST['from_date'] )->pattern( 'text' )->required();
			$validation->name( 'to_date' )->value( $_POST['to_date'] )->pattern( 'text' )->required();
			$validation->name( 'note' )->value( $_POST['note'] )->pattern( 'text' )->required();
			$validation->name( 'year' )->value( $_POST['year'] )->pattern( 'text' )->required();

			if ( $validation->isSuccess() ) {
				$exam       = new Exam();
				$exam->name = trim( $_POST['name'] ) . "-" . trim( $_POST['year'] );
				$exam->from_date = trim( $_POST['from_date'] );
				$exam->to_date = trim( $_POST['to_date'] );
				$exam->note = trim( $_POST['note'] );
				$exam->year = trim( $_POST['year'] );
				if ( $exam->create() ) {
					redirect( 'exam/Exams/index' );
				} else {
					die( 'Something went Wrong' );
				}
			} else {
				//Show validation Errors
				echo $validation->displayErrors();

			}
		}
		else {

			$this->view( 'exam/exams/add' );
		}
	}

	public function showExam( $id = 0 ) {
		$exam=Exam::GetInstance()->getById( $id );
		$data = [
			'id'   => $exam->id,
			'name' => $exam->name,
			'from_date' => $exam->from_date,
			'to_date' => $exam->to_date,
			'note' => $exam->note,
			'year' => $exam->year,

		];
		$this->view( 'exam/exams/edit', $data );
	}

	public function editExam() {
		if ( POST ) {

			$validation = new Validation();
			$validation->name( 'name' )->value( $_POST['name'] )->pattern( 'text' )->required();
			$validation->name( 'from_date' )->value( $_POST['from_date'] )->pattern( 'text' )->required();
			$validation->name( 'to_date' )->value( $_POST['to_date'] )->pattern( 'text' )->required();
			$validation->name( 'note' )->value( $_POST['note'] )->pattern( 'text' )->required();
			$validation->name( 'year' )->value( $_POST['year'] )->pattern( 'text' )->required();


			if ( $validation->isSuccess() ) {
				$exam       = new Exam();
				$exam->id   = trim( $_POST['id'] );
				$exam->name = trim( $_POST['name'] );
				$exam->from_date = trim( $_POST['from_date'] );
				$exam->to_date = trim( $_POST['to_date'] );
				$exam->note = trim( $_POST['note'] );
				$exam->year = trim( $_POST['year'] );

				if ( $exam->update() ) {
					redirect( 'exam/Exams/index' );
				} else {
					die( 'Something went Wrong' );
				}
			}
			else{
				echo $validation->displayErrors();
			}

		}
	}

	public function getExamByYear() {
		$exam_by_year = Exam::GetInstance()->getExamByYear( $_POST['year'] );
		return jsonResult( $exam_by_year );

	}


}