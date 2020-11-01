<?php

namespace App\Controllers\Announcement;

use App\Libraries\Controller;
use App\Models\Announcement\Holiday;
use App\Models\Announcement\Notice;

//written by
//Maruf
//29-9-2018
class Holidays extends Controller {
	private $holiday;

	public function __construct() {
		$this->holiday = new Holiday();
	}

	public function index() {
		$holidays = $this->holiday->getAll();
		$data     = [
			'holidays' => $holidays,
		];
		$this->view( 'announcement/holiday/index', $data );
	}

	public function add() {
		if ( POST ) {
			$_POST              = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
			$holiday            = new Holiday();
			$holiday->title     = trim( $_POST['title'] );
			$holiday->from_date = trim( $_POST['from_date'] );
			$holiday->to_date   = trim( $_POST['to_date'] );
			$holiday->details   = trim( $_POST['details'] );
			if ( $holiday->create() ) {
				redirect( '/announcement/Holidays/index' );
			} else {
				die( 'Something went Wrong' );
			}

		} else {
			$data = [
				'title'     => '',
				'from_date' => '',
				'to_date'   => '',
				'details'   => '',
			];
			$this->view( 'announcement/holiday/add', $data );
		}
	}


	public function edit() {
		if ( POST ) {

			$_POST              = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
			$holiday            = new Notice();
			$holiday->id        = trim( $_POST['id'] );
			$holiday->title     = trim( $_POST['title'] );
			$holiday->from_date = trim( $_POST['from_date'] );
			$holiday->to_date   = trim( $_POST['to_date'] );
			$holiday->notice    = trim( $_POST['details'] );

			//update from model
			if ( $holiday->update() ) {
				redirect( 'announcement/Holidays/index' );
			} else {
				die( 'Something went Wrong' );
			}

		}
	}

	public function delete( $id ) {
		$this->holiday->id = $id;
		$this->holiday->delete();  // delete
		/*$this->examModel->deleteExam( $id );*/   //Manual Delete Method[Redundant]
		redirect( 'announcement/Holidays/index' );


	}

	public function show( $id = 0 ) {
		$holiday = $this->holiday->getById( $id );
		$data    = [
			'id'        => $holiday->id,
			'title'     => $holiday->title,
			'from_date' => $holiday->from_date,
			'to_date'   => $holiday->to_date,
			'details'   => $holiday->details,

		];
		$this->view( 'announcement/holiday/edit', $data );
	}

}