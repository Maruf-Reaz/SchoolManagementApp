<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/5/2018
 * Time: 11:29 AM
 */

namespace App\Controllers\Academic;

use App\Libraries\Controller;


use App\Libraries\Http\Request;
use App\Libraries\http\Response;
use App\Libraries\Validation;
use App\Models\Academic\AcademicClass;
use App\Models\Academic\Section;
use App\Models\Teacher;

class Sections extends Controller {

	private $section;
	private $teacher;
	private $classes;

	public function __construct() {

		$this->section = new Section();
		/*$this->middleware(['Authentication'])->only(['index','add']);*/
		/*$this->middleware(['Roles'])->only(['index','edit'])->hasRole([
			'index'=>['Admin'],
			'edit'=>['Teacher','Admin'],
		]);*/
		/*$this->middleware(['Roles'])->only(['index','edit'])->hasRole([
			'all'=>['Teacher','Admin'],
		]);*/
		/*$this->middleware(['Roles'])->all()->hasRole([
			'all'=>['Admin'],
		]);*/
		$this->middleware( [ 'Authentication' ] )->all();
		$this->middleware( [ 'Roles' ] )->all()->hasRole( [
			'all' => [ 'Admin' ],
		] );
		$this->teacher = new Teacher();
		$this->classes = new AcademicClass();
	}

	public function index() {
		$sections = $this->section->getSections();
		//$sections = $this->section->getAll();
		$teachers = $this->teacher->getAll();
		$classes  = $this->classes->getAll();

		$data = [
			'sections' => $sections,
			'teachers' => $teachers,
			'classes'  => $classes,
		];

		$this->view( 'academic/sections/index', $data );
	}

	public function add() {
		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'name' )->value( Request::post( 'name' ) )->pattern( 'text' )->required();
			$validation->name( 'catagory' )->value( Request::post( 'catagory' ) )->pattern( 'text' )->required();
			$validation->name( 'capacity' )->value( Request::post( 'capacity' ) )->pattern( 'text' )->required();
			$validation->name( 'class_id' )->value( Request::post( 'class_id' ) )->pattern( 'text' )->required();
			$validation->name( 'teacher_id' )->value( Request::post( 'teacher_id' ) )->pattern( 'text' )->required();
			/*$validation->name( 'note' )->value( Request::post( 'note' ) )->pattern( 'text' )->required();*/
			//Validation
			if ( $validation->isSuccess() ) {
				$this->section->name       = Request::post( 'name' );
				$this->section->catagory   = Request::post( 'catagory' );
				$this->section->capacity   = Request::post( 'capacity' );
				$this->section->class_id   = Request::post( 'class_id' );
				$this->section->teacher_id = Request::post( 'teacher_id' );
				/*$this->section->note       = Request::post( 'note' );*/

				if ( $this->section->save() ) {
					flash( 'sections_message', 'Sections Successfuly added' );
					redirect( 'academic/sections/index' );
				} else {
					flash( 'sections_message', 'Failed to add' );
					redirect( 'academic/sections/index' );
				}
			} else {
				redirect( 'academic/sections/index' );
			}
		} else {
			// Get Request
			$data = [
				'teachers' => $this->teacher->getAll(),
				'classes'  => $this->classes->getAll(),
			];
			//Get request here
			$this->view( 'academic/sections/add', $data );
		}
	}

	public function edit( $id = 0 ) {
		if ( POST ) {
			//Sanitize the posts
			$validation = new Validation();
			$validation->name( 'id' )->value( Request::post( 'id' ) )->pattern( 'int' )->required();
			$validation->name( 'name' )->value( Request::post( 'name' ) )->pattern( 'text' )->required();
			$validation->name( 'catagory' )->value( Request::post( 'catagory' ) )->pattern( 'text' )->required();
			$validation->name( 'capacity' )->value( Request::post( 'capacity' ) )->pattern( 'text' )->required();
			$validation->name( 'class_id' )->value( Request::post( 'class_id' ) )->pattern( 'int' )->required();
			$validation->name( 'teacher_id' )->value( Request::post( 'teacher_id' ) )->pattern( 'int' )->required();
			/*$validation->name( 'note' )->value( Request::post( 'note' ) )->pattern( 'note' );*/

			if ( $validation->isSuccess() ) {
				if ( Section::GetInstance()->isExist( 'id', Request::post( 'id' ) ) ) {

					$this->section->id         = Request::post( 'id' );
					$this->section->name       = Request::post( 'name' );
					$this->section->catagory   = Request::post( 'catagory' );
					$this->section->capacity   = Request::post( 'capacity' );
					$this->section->class_id   = Request::post( 'class_id' );
					$this->section->teacher_id = Request::post( 'teacher_id' );
					/*$this->section->note       = Request::post( 'note' );*/

					if ( $this->section->update() ) {
						flash( 'section_message', 'Section Successfuly Updated' );
						redirect( 'academic/sections/index' );
					} else {
						flash( 'section_message', 'Failed to update' );
						redirect( 'academic/sections/index' );
					}
				} else {
					redirect( 'academic/sections/index' );
				}
			} else {
				//Load the view with error
				redirect( 'academic/sections/index' );
			}
		} else {
			//Get Request
			$validation = new Validation();
			$validation->name( 'id' )->value( $id )->pattern( 'int' )->required();

			if ( $id != 0 && $validation->isSuccess() ) {
				$section = $this->section->getById( $id );
				if ( $section == null ) {
					redirect( 'academic/sections/index' );
				} else {
					$data = [
						'section'  => $section,
						'teachers' => $this->teacher->getAll(),
						'classes'  => $this->classes->getAll(),
					];

					$this->view( 'academic/sections/edit', $data );
				}
			} else {
				redirect( 'academic/sections/index' );
			}
		}
	}

	/**
	 * @return Response
	 */
	public function getSectionsByClass() {
		$validation = new Validation();
		$validation->name( 'id' )->value( Request::post( 'class_id' ) )->pattern( 'int' )->required();
		if ( $validation->isSuccess() ) {
			$sections_by_class = $this->section->getSectionsByClass( Request::post( 'class_id' ) );

			return Response::json( $sections_by_class );
		}

		return Response::json( false );

	}

	/*public function delete( $id = 0 ) {
		$sectoin     = $this->section;
		$sectoin->id = $id;

		if ( $sectoin->delete() ) {
			flash( 'section_message', 'Section deleted' );
			redirect( 'academic/sections/index' );
		} else {

		}

	}*/

}