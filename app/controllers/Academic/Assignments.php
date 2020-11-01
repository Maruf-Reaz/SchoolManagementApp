<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/14/2018
 * Time: 11:29 PM
 */

namespace App\Controllers\Academic;

use App\Libraries\Controller;
use App\Models\Academic\AcademicClass;
use App\Models\Academic\Assignment;
use App\Models\Academic\Section;
use App\Models\Academic\Subject;
use App\Models\File;

class Assignments extends Controller {

	private $assignment;
	private $classes;
	private $subjects;
	private $file;


	public function __construct() {
		$this->middleware( [ 'Authentication' ] )->all();
		$this->middleware( [ 'Roles' ] )->all()->hasRole( [
			'all' => [ 'Admin' ],
		] );
		$this->assignment = new Assignment();
		$this->classes    = new AcademicClass();
		$this->subjects   = new Subject();
		$this->file       = new File();
	}


	public function add() {
		if ( POST ) {
			//Validation
			$_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );

			$this->assignment->title       = trim( $_POST['title'] );
			$this->assignment->description = trim( $_POST['description'] );
			$this->assignment->deadline    = trim( $_POST['deadline'] );
			$this->assignment->class_id    = trim( $_POST['class_id'] );
			$this->assignment->subject_id  = trim( $_POST['subject_id'] );

			$this->file->attach_file( $_FILES['file'] );
			//the file will be uploaded in => public/file
			$this->file->upload_dir = 'file/assignments';

			//First save the file in directory
			if ( $this->file->save() ) {
				$this->assignment->file_name = $this->file->file_name;
				//Save the syllabus
				if ( $this->assignment->save() ) {

					$this->assignment->saveSections( $_POST['sections'] );

					flash( 'assignment_message', 'Assignment Successfuly added' );
					redirect( 'academic/assignments/index' );
				} else {
					die( 'Something went Wrong' );
				}
			} else {
				$this->file->destroy();
			}

		} else {
			$data = [
				'classes' => $this->classes->getAll(),
			];
			//Get request here
			$this->view( 'academic/assignments/add', $data );
		}
	}

	public function getSectionAndSubjectByClass() {
		if ( isset( $_POST['class_id'] ) ) {

			$data = $this->assignment->getSectionAndSubjectByClass( $_POST['class_id'] );

			return jsonResult( $data );
		}
	}

	public function index() {
		$data = [
			'classes' => $this->classes->getAll(),
		];
		$this->view( 'academic/assignments/index', $data );
	}

	public function update() {
		if ( POST ) {
			//Sanitize the posts
			$_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );

			$this->assignment->id          = trim( $_POST['id'] );
			$this->assignment->title       = trim( $_POST['title'] );
			$this->assignment->description = trim( $_POST['description'] );
			$this->assignment->deadline    = trim( $_POST['deadline'] );
			$this->assignment->class_id    = trim( $_POST['class_id'] );
			$this->assignment->subject_id  = trim( $_POST['subject_id'] );

			$old_file_name = trim( $_POST['old_file_name'] );
			$new_file      = new File();
			//attaching file , this method will work as a validation method for future
			//returns false if there are no files given
			if ( $new_file->attach_file( $_FILES['file'] ) ) {
				//New File directoy
				$new_file->upload_dir = 'file/assignments';
				// old file information
				$this->file->upload_dir = 'file/assignments';
				$this->file->file_name  = $old_file_name;
				//Update the assignment in database
				$this->assignment->file_name = $new_file->file_name;
				if ( $this->assignment->update() ) {
					//Update the sections
					$this->assignment->updateSections( $_POST['sections'] );
					//Destroy the old file
					if ( $this->file->destroy() ) {
						//Save the new File
						if ( $new_file->save() ) {
							//Save the assignment
							flash( 'assignment_message', 'Assignment Successfuly updated' );
							redirect( 'academic/assignments/index' );
						} else {
							$this->file->destroy();
						}
					} else {
						die( 'Couldnt delete the file' );
					}
				} else {
					die( 'Something went Wrong' );
				}
			} else {
				/*
				 * if user doesnt provide any file data
				 * The previous name will be preserved
				 * */
				$this->assignment->file_name = $old_file_name;
				if ( $this->assignment->update() ) {
					$this->assignment->updateSections( $_POST['sections'] );
					flash( 'assignment_message', 'Assignment Successfuly updated' );
					redirect( 'academic/assignments/index' );
				} else {
					die( 'Something went Wrong' );
				}
			}
		}
	}

	public function edit( $id = 0 ) {
		if ( $id == 0 ) {
			redirect( 'academic/assignments/index' );
		} else {
			$assignment = $this->assignment->getById( $id );
			if ( $assignment == null ) {
				redirect( 'academic/assignments/index' );
			} else {
				$assignmentSections = $this->assignment->getSections( $assignment->id );
				$subjects           = $this->subjects->getSubjectByClassId( $assignment->class_id );
				$sections           = ( new Section() )->getSectionsByClass( $assignment->class_id );
				$data               = [
					'assignment'         => $assignment,
					'subjects'           => $subjects,
					'assignmentSections' => $assignmentSections,
					'sections'           => $sections,
					'classes'            => $this->classes->getAll(),
				];

				$this->view( 'academic/assignments/edit', $data );
			}
		}
	}

	//sends Json data to view
	public function getAssignmentsByClass() {
		$data = [];
		if ( isset( $_POST['class_id'] ) ) {
			$data = $this->assignment->getAssignmentsByClass( $_POST['class_id'] );
		}

		return jsonResult( $data );
	}

	public function delete( $id = 0 ) {
		if ( $id == 0 ) {
			redirect( 'academic/assignments/index' );
		}
		//File name and uloaded directory is required to delete the file
		$file_name      = ( $this->assignment->getById( $id ) )->file_name;
		$assignment     = $this->assignment;
		$assignment->id = $id;

		//First delete the db record
		if ( $assignment->delete() ) {
			//attaching file information to delete
			$this->file->file_name  = $file_name;
			$this->file->upload_dir = 'file/assignments';

			if ( $this->file->destroy() ) {
				flash( 'assignment_message', 'assignment deleted' );
				redirect( 'academic/assignments/index' );
			} else {
				flash( 'assignment_message', 'assignment deleted but file couldnt found' );
				redirect( 'academic/assignments/index' );
			}

		} else {
			die( 'Couldnt delete the file' );
		}

	}
}