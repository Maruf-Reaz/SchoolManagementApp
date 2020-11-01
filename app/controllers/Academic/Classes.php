<?php

namespace App\Controllers\Academic;

use App\Libraries\Controller;
use App\Libraries\Http\Request;
use App\Libraries\Validation;
use App\Models\Academic\AcademicClass;

class Classes extends Controller {
	private $classes;

	public function __construct() {
		$this->middleware( [ 'Authentication' ] )->all();
		$this->middleware( [ 'Roles' ] )->all()->hasRole( [
			'all' => [ 'Admin' ],
		] );
		$this->classes = new AcademicClass();
	}

	public function index() {
		$classes = $this->classes->getAll();
		$data    = [
			'classes' => $classes,
		];

		$this->view( 'academic/classes/index', $data );
	}

	public function add() {
		if ( POST ) {
			//Sanitize the posts
			$validation = new Validation();
			$validation->name( 'name' )->value( Request::post( 'name' ) )->pattern( 'text' )->required();
			$validation->name( 'numeric_value' )->value( Request::post( 'numeric_value' ) )->pattern( 'text' )->required();
			/*$validation->name( 'note' )->value( Request::post( 'note' ) )->pattern( 'text' );*/

			if ( $validation->isSuccess() ) {
				//Validated
				$classes                = new AcademicClass();
				$classes->name          = Request::post( 'name' );
				$classes->numeric_value = Request::post( 'numeric_value' );
				/*$classes->note          = Request::post( 'note' );*/

				if ( $classes->save() ) {
					flash( 'class_message', 'Class Successfuly added' );
					redirect( 'academic/classes/index' );
				} else {
					flash( 'class_message', 'Failed to add' );
					redirect( 'academic/classes/index' );
				}
			}
		} else {
			$data = [];

			$this->view( 'academic/classes/add', $data );
		}


	}

	public function edit( $id = 0 ) {
		if ( POST ) {
			//Sanitize the posts
			$validation = new Validation();
			$validation->name( 'id' )->value( Request::post( 'id' ) )->pattern( 'int' )->required();
			$validation->name( 'name' )->value( Request::post( 'name' ) )->pattern( 'text' )->required();
			$validation->name( 'numeric_value' )->value( Request::post( 'numeric_value' ) )->pattern( 'text' )->required();
			/*$validation->name( 'note' )->value( Request::post( 'note' ) )->pattern( 'text' );*/

			if ( $validation->isSuccess() ) {
				if ( AcademicClass::GetInstance()->isExist( 'id', Request::post( 'id' ) ) ) {
					$classes                = AcademicClass::GetInstance()->getById( 'id' );
					$classes->id            = Request::post( 'id' );
					$classes->name          = Request::post( 'name' );
					$classes->numeric_value = Request::post( 'numeric_value' );
					/*$classes->note          = Request::post( 'note' );*/

					if ( $classes->update() ) {
						flash( 'class_message', 'Successfuly updated' );
						redirect( 'academic/classes/index' );
					} else {
						flash( 'class_message', 'Update failed ' );
						redirect( 'academic/classes/index' );
					}
				} else {
					redirect( 'academic/classes/index' );
				}
			} else {
				redirect( 'academic/classes/index' );
			}
		} else {
			$validation = new Validation();
			$validation->name( 'id' )->value( $id )->pattern( 'int' )->required();

			if ( $id != 0 && $validation->isSuccess() ) {
				if ( AcademicClass::GetInstance()->isExist( 'id', $id ) ) {
					$classes = AcademicClass::GetInstance()->getById( $id );
					$data    = [
						'id'            => $classes->id,
						'name'          => $classes->name,
						'numeric_value' => $classes->numeric_value,
						/*'note'          => $classes->note*/
					];

					$this->view( 'academic/classes/edit', $data );
				} else {
					redirect( 'academic/classes/index' );
				}

			} else {
				redirect( 'academic/classes/index' );
			}

		}
	}

	/* public function delete($id) {
		 $class     = $this->classes;
		 $class->id = $id;

		 if ($class->delete()) {
			 flash('class_message', 'Class deleted');
			 redirect('academic/classes/index');
		 } else {

		 }

	 }*/
}