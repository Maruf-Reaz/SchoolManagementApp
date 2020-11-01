<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/8/2018
 * Time: 12:53 PM
 */

namespace App\Controllers\Academic;


use App\Libraries\Controller;
use App\Libraries\Http\Request;
use App\Libraries\http\Response;
use App\Libraries\Validation;
use App\Models\Academic\AcademicClass;
use App\Models\Academic\Syllabus;
use App\Models\File;
use App\Models\User;

class Syllabuses extends Controller {
	private $syllabus;
	private $classes;
	private $file;

	public function __construct() {
		$this->middleware( [ 'Authentication' ] )->all();
		$this->middleware( [ 'Roles' ] )->all()->hasRole( [
			'all' => [ 'Admin' ],
		] );
		$this->syllabus = new Syllabus();
		$this->classes  = new AcademicClass();
		$this->file     = new File();
	}

	public function index() {
		$data = [
			'classes'    => $this->classes->getAll(),
			'syllabuses' => $this->syllabus->getAll(),
		];
		$this->view( 'academic/syllabus/index', $data );
	}

	public function getSyllabusByClass() {
		$syllabus_by_class = $this->syllabus->getSyllabusByClass( $_POST['class_id'] );

		return jsonResult( $syllabus_by_class );

	}

	public function add() {
		if ( POST ) {
			//Validation
			$validation = new Validation();
			$validation->name( 'title' )->value( Request::post( 'title' ) )->pattern( 'text' )->required();
			$validation->name( 'description' )->value( Request::post( 'description' ) )->pattern( 'text' )->required();
			$validation->name( 'class_id' )->value( Request::post( 'class_id' ) )->pattern( 'int' )->required();
			if ( $validation->isSuccess() ) {

				$this->syllabus->title       = Request::post( 'title' );
				$this->syllabus->description = Request::post( 'description' );
				$this->syllabus->class_id    = Request::post( 'class_id' );
				$this->syllabus->date        = strftime( '%Y/%m/%d %H:%M:%S', time() );
				$this->syllabus->user_id     = User::getLoggedInUserId();

				//$this->syllabus->file_name   = trim($_POST['file_name']);
				$this->file->attach_file( $_FILES['file'] );
				//the file will be uploaded in => public/file
				$this->file->upload_dir = 'file/syllabuses';

				//First save the file in directory
				if ( $this->file->save() ) {
					$this->syllabus->file_name = $this->file->file_name;
					//Save the syllabus
					if ( $this->syllabus->save() ) {
						flash( 'syllabus_message', 'Syllabus Successfuly added' );
						redirect( 'academic/syllabuses/index' );
					} else {
						flash( 'syllabus_message', 'Failed to save' );
						redirect( 'academic/syllabuses/index' );
					}
				} else {
					$this->file->destroy();
				}

			}

		} else {

			$data = [
				'classes' => $this->classes->getAll(),
			];
			//Get request here
			$this->view( 'academic/syllabus/add', $data );
		}
	}

	public function edit( $id = 0 ) {
		if ( POST ) {
			//Sanitize the posts
			$validation = new Validation();
			$validation->name( 'id' )->value( Request::post( 'id' ) )->pattern( 'int' )->required();
			$validation->name( 'title' )->value( Request::post( 'title' ) )->pattern( 'text' )->required();
			$validation->name( 'description' )->value( Request::post( 'description' ) )->pattern( 'text' )->required();
			$validation->name( 'class_id' )->value( Request::post( 'class_id' ) )->pattern( 'int' )->required();
			$validation->name( 'old_file_name' )->value( Request::post( 'old_file_name' ) )->pattern( 'text' )->required();

			if ( $validation->isSuccess() ) {
				if ( Syllabus::GetInstance()->isExist( 'id', Request::post( 'id' ) ) ) {
					$this->syllabus->id          = Request::post( 'id' );
					$this->syllabus->title       = Request::post( 'title' );
					$this->syllabus->description = Request::post( 'description' );
					$this->syllabus->class_id    = Request::post( 'class_id' );
					$this->syllabus->date        = strftime( '%Y/%m/%d %H:%M:%S', time() );
					$this->syllabus->user_id     = 1;
					$old_file_name               = Request::post( 'old_file_name' );
					$new_file                    = new File();
					//attaching file , this method will work as a validation method for future
					//returns false if there are no files given
					if ( $new_file->attach_file( $_FILES['file'] ) ) {
						//New File directoy
						$new_file->upload_dir = 'file/syllabuses';
						// old file information
						$this->file->upload_dir = 'file/syllabuses';
						$this->file->file_name  = $old_file_name;
						//Update the syllabus in database
						$this->syllabus->file_name = $new_file->file_name;
						if ( $this->syllabus->update() ) {
							//Destroy the old file
							if ( $this->file->destroy() ) {
								//Save the new File
								if ( $new_file->save() ) {
									//Save the syllabus
									flash( 'syllabus_message', 'Syllabus Successfuly updated' );
									redirect( 'academic/syllabuses/index' );
								} else {
									$this->file->destroy();
								}
							} else {
								flash( 'syllabus_message', 'Update Failed' );
								redirect( 'academic/syllabuses/index' );
							}
						} else {
							flash( 'syllabus_message', 'Update Failed' );
							redirect( 'academic/syllabuses/index' );
						}
					} else {
						/*
						 * if user doesnt provide any file data
						 * The previous name will be preserved
						 * */
						$this->syllabus->file_name = $old_file_name;
						if ( $this->syllabus->update() ) {
							flash( 'syllabus_message', 'Syllabus Successfuly updated' );
							redirect( 'academic/syllabuses/index' );
						} else {
							flash( 'syllabus_message', 'Update Failed' );
							redirect( 'academic/syllabuses/index' );
						}
					}
				} else {
					flash( 'syllabus_message', 'Update Failed' );
					redirect( 'academic/syllabuses/index' );
				}
			}
		} else {
			//Get Request
			$validation = new Validation();
			$validation->name( 'id' )->value( $id )->pattern( 'int' )->required();

			if ( $id != 0 && $validation->isSuccess() ) {
				if ( ! $this->syllabus->isExist( 'id', $id ) ) {
					redirect( 'academic/syllabuses/index' );
				} else {
					$syllabus = $this->syllabus->getById( $id );
					$data     = [
						'syllabus' => $syllabus,
						'classes'  => $this->classes->getAll(),
					];

					$this->view( 'academic/syllabus/edit', $data );
				}
			} else {
				redirect( 'academic/syllabuses/index' );
			}
		}
	}

	public function delete( $id = 0 ) {
		$validation = new Validation();
		$validation->name( 'id' )->value( $id )->pattern( 'int' )->required();
		if ( $validation->isSuccess() ) {
			//File name and uloaded directory is required to delete the file
			if ( $this->syllabus->isExist( 'id', $id ) ) {
				$file_name = ( $this->syllabus->getById( $id ) )->file_name;

				$syllabus     = $this->syllabus;
				$syllabus->id = $id;

				//First delete the db record
				if ( $syllabus->delete() ) {
					//attaching file information to delete
					$this->file->file_name  = $file_name;
					$this->file->upload_dir = 'file/syllabuses';
					if ( $this->file->destroy() ) {
						flash( 'syllabus_message', 'Syllabus deleted', 'alert alert-danger' );
						redirect( 'academic/syllabuses/index' );
					} else {
						flash( 'syllabus_message', 'File Couldnt be deleted', 'alert alert-danger' );
						redirect( 'academic/syllabuses/index' );
					}

				} else {
					flash( 'syllabus_message', 'File Couldnt be deleted', 'alert alert-danger' );
					redirect( 'academic/syllabuses/index' );
				}
			} else {
				redirect( 'academic/syllabuses/index' );
			}
		} else {
			redirect( 'academic/syllabuses/index' );
		}
	}
}