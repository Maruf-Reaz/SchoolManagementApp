<?php

namespace App\Controllers;

use App\Models\Guardian;
use App\Models\Sms\Sms;
use App\Models\Sms\Template;
use App\Libraries\Validation;
use App\Libraries\Controller;
use App\Models\Teacher;

class Smses extends Controller {

	public function __construct() {
		$this->middleware( [ 'Authentication' ] )->all();
		$this->middleware( [ 'Roles' ] )->all()->hasRole( [
			'all' => [ 'Admin' ],
		] );
	}

	public function index() {
		$templates=Template::GetInstance()->getAll();
		$data      = [
			'templates' => $templates,
		];
		$this->view( 'smses/templates/index', $data );
	}


	public function addTemplate() {
		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'name' )->value( $_POST['title'] )->pattern( 'text' )->required();
			$validation->name( 'body' )->value( $_POST['body'] )->pattern( 'text' )->required();


			if ( $validation->isSuccess() ) {
				$template        = new Template();
				$template->title = trim( $_POST['title'] );
				$template->body  = trim( $_POST['body'] );


				if ( $template->create() ) {
					redirect( 'Smses/index' );
				} else {
					die( 'Something went Wrong' );
				}

			} else {
				echo $validation->displayErrors();
			}
		} else {

			$this->view( 'smses/templates/add' );
		}
	}

	public function showTemplate( $id = 0 ) {
		$template = new Template();
		$template = $template->getById( $id );
		$data     = [
			'template' => $template,
		];
		$this->view( 'smses/templates/edit', $data );
	}

	public function editTemplate() {

		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'title' )->value( $_POST['title'] )->pattern( 'text' )->required();
			$validation->name( 'body' )->value( $_POST['body'] )->pattern( 'text' )->required();

			if ( $validation->isSuccess() ) {
				$template        = new Template();
				$template->id    = trim( $_POST['id'] );
				$template->title = trim( $_POST['title'] );
				$template->body  = trim( $_POST['body'] );

				if ( $template->update() ) {
					redirect( 'Smses/index' );
				} else {
					die( 'Something went Wrong' );
				}


			} else {
				echo $validation->displayErrors();
			}

		}
	}

	public function sendSms() {
		$display = "none";
		$data      = [
			'status' => null,
			'type' => 5,
			'display'=> $display,
		];
		$this->view( 'smses/send_sms/send',$data );
	}

	public function showRecipient() {
		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'role' )->value( $_POST['role'] )->pattern( 'int' )->required();
			$role = trim( $_POST['role'] );
			if ( $validation->isSuccess() ) {
				if ( $role == 1 ) {
					$recipients = Teacher::GetInstance()->getActiveTeachers();
					$templates=Template::GetInstance()->getAll();
					$display = "block";
					$data      = [
						'recipients' => $recipients,
						'type' => 1,
						'templates' =>$templates,
						'status' => 1,
						'display'=> $display,
					];
					$this->view( 'smses/send_sms/send',$data );
				}
				else if($role == 2) {
					$recipients=Guardian::GetInstance()->getAll();
					$templates=Template::GetInstance()->getAll();
					$display = "block";
					$data      = [
						'recipients' => $recipients,
						'type' => 2,
						'templates' =>$templates,
						'status' => 1,
						'display'=> $display,
					];
					$this->view( 'smses/send_sms/send',$data );

				}


			} else {
				echo $validation->displayErrors();
			}
		} else {
			$templates=Template::GetInstance()->getAll();
			$display = "none";
			$data      = [
				'status' => null,
				'type' => 5,
				'templates' =>$templates,
				'display'=> $display,
			];
			$this->view( 'smses/send_sms/send',$data );
		}


	}
	public function submitRecipients() {
		if ( POST ) {
		$recipients =$_POST['send_checkbox'];
		$type =trim( $_POST['type'] );
		$message_body =trim( $_POST['body'] );
			$display = "none";
			$result = Sms::GetInstance()->sendSmsToRecipients( $recipients, $type, $message_body );
			$data      = [
				'status' => null,
				'type' => 5,
				'display'=> $display,
			];
			$this->view( 'smses/send_sms/send',$data );
		}
		else
		{
			$display = "none";
			$data      = [
				'status' => null,
				'type' => 5,
				'display'=> $display,
			];
			$this->view( 'smses/send_sms/send',$data );
		}
	}
	public function getSmsBody() {
		$sms_body = Template::GetInstance()->getBodyById( $_POST['template'] );

		return jsonResult( $sms_body );

	}


}