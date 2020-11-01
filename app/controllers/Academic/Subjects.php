<?php
/**
 * Created By Imran Khan
 */

namespace App\Controllers\Academic;

use App\Libraries\Controller;
use App\Libraries\Http\Request;
use App\Libraries\http\Response;
use App\Libraries\Validation;
use App\Models\Academic\AcademicClass;
use App\Models\Academic\Subject;
use App\Models\Teacher;

class Subjects extends Controller {
	private $subject;
	private $classes;
	private $teacher;

	public function __construct() {
		$this->middleware( [ 'Authentication' ] )->all();
		$this->middleware( [ 'Roles' ] )->all()->hasRole( [
			'all' => [ 'Admin' ],
		] );
		$this->subject = new Subject();
		$this->classes = new AcademicClass();
		$this->teacher = new Teacher();
	}

	public function index() {
		$subject = $this->subject->getAll();
		$data    = [
			'subjects' => $subject,
		];

		$this->view( 'academic/subjects/index', $data );
	}

	public function add() {
		if ( POST ) {
			//Validation
			$validation = new Validation();
			$validation->name( 'class_id' )->value( Request::post( 'class_id' ) )->pattern( 'int' )->required();
			$validation->name( 'type' )->value( Request::post( 'type' ) )->pattern( 'text' )->required();
			$validation->name( 'pass_mark' )->value( Request::post( 'pass_mark' ) )->pattern( 'int' )->required();
			$validation->name( 'final_mark' )->value( Request::post( 'final_mark' ) )->pattern( 'int' )->required();
			$validation->name( 'subject_name' )->value( Request::post( 'subject_name' ) )->pattern( 'text' )->required();
			$validation->name( 'subject_code' )->value( Request::post( 'subject_code' ) )->pattern( 'text' )->required();
			//Validation
			if ( $validation->isSuccess() ) {
				//Validated
				$this->subject->class_id       = Request::post( 'class_id' );
				$this->subject->type           = Request::post( 'type' );
				$this->subject->pass_mark      = Request::post( 'pass_mark' );
				$this->subject->final_mark     = Request::post( 'final_mark' );
				$this->subject->subject_name   = Request::post( 'subject_name' );
				$this->subject->subject_code   = Request::post( 'subject_code' );


				if ( $this->subject->save() ) {
					flash( 'subject_message', 'Subject Successfuly added' );
					redirect( 'academic/subjects/index' );
				} else {
					flash( 'subject_message', 'Subject failed to add' );
					redirect( 'academic/subjects/index' );
				}
			} else {
				flash( 'subject_message', 'Subject failed to add' );
				redirect( 'academic/subjects/index' );
			}

		} else {
			//GET code here
			$data = [
				'subjects' => $this->subject->getAll(),
				'teachers' => $this->teacher->getAll(),
				'classes'  => $this->classes->getAll(),
			];
			//Get request here
			$this->view( 'academic/subjects/add', $data );
		}
	}

	public function edit( $id = 0 ) {
		if ( POST ) {
			//Sanitize the posts
			$validation = new Validation();
			$validation->name( 'id' )->value( Request::post( 'id' ) )->pattern( 'int' )->required();
			$validation->name( 'class_id' )->value( Request::post( 'class_id' ) )->pattern( 'int' )->required();
			$validation->name( 'type' )->value( Request::post( 'type' ) )->pattern( 'text' )->required();
			$validation->name( 'pass_mark' )->value( Request::post( 'pass_mark' ) )->pattern( 'int' )->required();
			$validation->name( 'final_mark' )->value( Request::post( 'final_mark' ) )->pattern( 'int' )->required();
			$validation->name( 'subject_name' )->value( Request::post( 'subject_name' ) )->pattern( 'text' )->required();
			$validation->name( 'subject_code' )->value( Request::post( 'subject_code' ) )->pattern( 'text' )->required();

			if ( $validation->isSuccess() ) {

				$this->subject->id             = Request::post( 'id' );
				$this->subject->class_id       = Request::post( 'class_id' );
				$this->subject->type           = Request::post( 'type' );
				$this->subject->pass_mark      = Request::post( 'pass_mark' );
				$this->subject->final_mark     = Request::post( 'final_mark' );
				$this->subject->subject_name   = Request::post( 'subject_name' );
				$this->subject->subject_code   = Request::post( 'subject_code' );

				if ( $this->subject->update() ) {
					flash( 'subject_message', 'Subject Successfuly added' );
					redirect( 'academic/subjects/index' );
				} else {
					flash( 'subject_message', 'Failed to update' );
					redirect( 'academic/subjects/index' );
				}
			} else {
				redirect( 'academic/subjects/index' );
			}
		} else {
			//GET
			$validation = new Validation();
			$validation->name( 'id' )->value( $id )->pattern( 'int' )->required();
			if ( $validation->isSuccess() ) {


				if ( $id != 0 && Subject::GetInstance()->isExist( 'id', $id ) ) {

					$subject = $this->subject->getById( $id );
					$data    = [
						'id'             => $subject->id,
						'class_id'       => $subject->class_id,
						'type'           => $subject->type,
						'pass_mark'      => $subject->pass_mark,
						'final_mark'     => $subject->final_mark,
						'subject_name'   => $subject->subject_name,
						'subject_code'   => $subject->subject_code,
						'subjects'       => $this->subject->getAll(),
						'teachers'       => $this->teacher->getAll(),
						'classes'        => $this->classes->getAll(),
					];

					$this->view( 'academic/subjects/edit', $data );
				} else {
					redirect( 'academic/subjects/index' );
				}
			} else {
				redirect( 'academic/subjects/index' );
			}
		}
	}

	/*public function delete( $id = 0 ) {
		$subject     = $this->subject;
		$subject->id = $id;

		if ( $subject->delete() ) {
			flash( 'subject_message', 'Subject deleted' );
			redirect( 'academic/subjects/index' );
		} else {

		}

	}*/
}