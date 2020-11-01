<?php

namespace App\Controllers\Announcement;

use App\Libraries\Controller;
use App\Models\Announcement\Notice;

//written by
//Maruf
//26-9-2018
class Notices extends Controller {
	private $notice;

	public function __construct() {
		$this->notice = new Notice();
	}

	public function index() {
		$notices = $this->notice->getAll();
		$data  = [
			'notices' => $notices,
		];
		$this->view( 'announcement/notice/index', $data );
	}

	public function add() {
		if ( POST ) {
			$_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
			$notice             = new Notice();
			$notice->title       = trim( $_POST['title'] );
			$notice->date      = trim( $_POST['date'] );
			$notice->notice       = trim( $_POST['notice'] );
			if ( $notice->create() ) {
				redirect( '/announcement/Notices/index' );
			} else {
				die( 'Something went Wrong' );
			}

		} else {
			$data = [
				'title'    => '',
				'date'   => '',
				'notice'    => '',
			];
			$this->view( 'announcement/notice/add', $data );
		}
	}



	public function edit() {
		if ( POST ) {

			$_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
			$notice             = new Notice();
			$notice->id         = trim( $_POST['id'] );
			$notice->title       = trim( $_POST['title'] );
			$notice->date      = trim( $_POST['date'] );
			$notice->notice       = trim( $_POST['notice'] );

			//update from model
			if ( $notice->update() ) {
				redirect( 'announcement/Notices/index' );
			} else {
				die( 'Something went Wrong' );
			}

		}
	}

	public function delete( $id ) {
		$this->notice->id=$id;
		$this->notice->delete();  // delete
		/*$this->examModel->deleteExam( $id );*/   //Manual Delete Method[Redundant]
		redirect( 'announcement/Notices/index' );


	}

	public function show( $id = 0 ) {
		$notice = $this->notice->getById( $id );
		$data    = [
			'id'            => $notice->id,
			'title'          => $notice->title,
			'date'         => $notice->date,
			'notice'          => $notice->notice,

		];
		$this->view( 'announcement/notice/edit', $data );
	}

}