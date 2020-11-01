<?php

namespace App\Controllers;

use App\Libraries\Controller;
use App\Models\Academic\AcademicClass;
use App\Models\Teacher;
use App\Libraries\Validation;
use App\Models\File;

class Teachers extends Controller {
	private $file;

	public function __construct() {
		$this->file = new File();
		$this->middleware( [ 'Authentication' ] )->all();
		$this->middleware( [ 'Roles' ] )->all()->hasRole( [
			'all' => [ 'Admin' ],
		] );
	}

	public function index() {
		$teachers = Teacher::GetInstance()->getAll();
		$data     = [
			'teachers' => $teachers,
		];
		$this->view( 'teachers/index', $data );
	}

	public function add() {
		if ( POST ) {

			/*-------------------------Generating Teacher Registration No-------------------------*/
			$max_count_from_db = Teacher::GetInstance()->getMaxCount();
			$teacher_serial    = sprintf( "%06s", $max_count_from_db->max_count + 1 );
			$registration_no   = 'T' . $teacher_serial;
			/*-------------------------Generating registration No code ends here---------------------------------*/


			$validation = new Validation();
			$validation->name( 'name' )->value( $_POST['name'] )->pattern( 'text' )->required();
			$validation->name( 'designation_id' )->value( $_POST['designation_id'] )->pattern( 'text' )->required();
			$validation->name( 'date_of_birth' )->value( $_POST['date_of_birth'] )->pattern( 'text' )->required();
			$validation->name( 'gender' )->value( $_POST['gender'] )->pattern( 'text' )->required();
			$validation->name( 'blood_group' )->value( $_POST['blood_group'] )->pattern( 'text' )->required();
			$validation->name( 'religion' )->value( $_POST['religion'] )->pattern( 'text' )->required();
			$validation->name( 'email' )->value( $_POST['email'] )->pattern( 'email' )->required();
			$validation->name( 'phone_no' )->value( $_POST['name'] )->pattern( 'text' )->required();
			$validation->name( 'current_address' )->value( $_POST['current_address'] )->pattern( 'text' )->required();
			$validation->name( 'permanent_address' )->value( $_POST['permanent_address'] )->pattern( 'text' )->required();
			$validation->name( 'joining_date' )->value( $_POST['joining_date'] )->pattern( 'text' )->required();
			$validation->name( 'national_id' )->value( $_POST['national_id'] )->pattern( 'text' )->required();
			$validation->name( 'speciality' )->value( $_POST['speciality'] )->pattern( 'text' )->required();
			$validation->name( 'educational_qualification' )->value( $_POST['educational_qualification'] )->pattern( 'text' )->required();


			if ( $validation->isSuccess() ) {
				$teacher                            = new Teacher();
				$teacher->name                      = trim( $_POST['name'] );
				$teacher->designation_id            = trim( $_POST['designation_id'] );
				$teacher->date_of_birth             = trim( $_POST['date_of_birth'] );
				$teacher->gender                    = trim( $_POST['gender'] );
				$teacher->blood_group               = trim( $_POST['blood_group'] );
				$teacher->religion                  = trim( $_POST['religion'] );
				$teacher->email                     = trim( $_POST['email'] );
				$teacher->phone                     = trim( $_POST['phone'] );
				$teacher->current_address           = trim( $_POST['current_address'] );
				$teacher->permanent_address         = trim( $_POST['permanent_address'] );
				$teacher->joining_date              = trim( $_POST['joining_date'] );
				$teacher->national_id               = trim( $_POST['national_id'] );
				$teacher->speciality                = trim( $_POST['speciality'] );
				$teacher->registration_no           = $registration_no;
				$teacher->educational_qualification = trim( $_POST['educational_qualification'] );
				$teacher->status                    = 1;
				if ( $this->file->attach_file( $_FILES['photo'] ) ) {
					$this->file->upload_dir = 'images/teachers';
					//First save the file in directory
					if ( $this->file->save() ) {
						$teacher->photo = $this->file->file_name;
						//Save the guardian
						if ( $teacher->create() ) {
							redirect( 'teachers/index' );
						} else {
							die( 'Something went Wrong' );
						}
					} else {
						$this->file->destroy();
					}
				} else {
					die( 'Something went wrong' );
				}

			} else {
				echo $validation->displayErrors();
			}
		} else {


			$data = [
				'name'              => '',
				'designation'       => '',
				'date_of_birth'     => '',
				'gender'            => '',
				'blood_group'       => '',
				'religion'          => '',
				'email'             => '',
				'phone_no'          => '',
				'current_address'   => '',
				'permanent_address' => '',
				'photo'             => '',
			];
			$this->view( 'Teachers/add', $data );
		}
	}

	public function showTeacher( $id ) {
		$teacher = Teacher::GetInstance()->getById( $id );


		$data = [
			'teacher' => $teacher,
		];
		$this->view( 'teachers/edit', $data );
	}

	public function editTeacher() {
		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'name' )->value( $_POST['name'] )->pattern( 'text' )->required();
			$validation->name( 'designation_id' )->value( $_POST['designation_id'] )->pattern( 'text' )->required();
			$validation->name( 'date_of_birth' )->value( $_POST['date_of_birth'] )->pattern( 'text' )->required();
			$validation->name( 'gender' )->value( $_POST['gender'] )->pattern( 'text' )->required();
			$validation->name( 'blood_group' )->value( $_POST['blood_group'] )->pattern( 'text' )->required();
			$validation->name( 'religion' )->value( $_POST['religion'] )->pattern( 'text' )->required();
			$validation->name( 'email' )->value( $_POST['email'] )->pattern( 'email' )->required();
			$validation->name( 'phone_no' )->value( $_POST['name'] )->pattern( 'text' )->required();
			$validation->name( 'current_address' )->value( $_POST['current_address'] )->pattern( 'text' )->required();
			$validation->name( 'permanent_address' )->value( $_POST['permanent_address'] )->pattern( 'text' )->required();
			$validation->name( 'joining_date' )->value( $_POST['joining_date'] )->pattern( 'text' )->required();
			$validation->name( 'national_id' )->value( $_POST['national_id'] )->pattern( 'text' )->required();
			$validation->name( 'speciality' )->value( $_POST['speciality'] )->pattern( 'text' )->required();
			$validation->name( 'educational_qualification' )->value( $_POST['educational_qualification'] )->pattern( 'text' )->required();


			if ( $validation->isSuccess() ) {
				$teacher                            = new Teacher();
				$teacher->name                      = trim( $_POST['name'] );
				$teacher->designation_id            = trim( $_POST['designation_id'] );
				$teacher->date_of_birth             = trim( $_POST['date_of_birth'] );
				$teacher->gender                    = trim( $_POST['gender'] );
				$teacher->blood_group               = trim( $_POST['blood_group'] );
				$teacher->religion                  = trim( $_POST['religion'] );
				$teacher->email                     = trim( $_POST['email'] );
				$teacher->phone                     = trim( $_POST['phone'] );
				$teacher->current_address           = trim( $_POST['current_address'] );
				$teacher->permanent_address         = trim( $_POST['permanent_address'] );
				$teacher->joining_date              = trim( $_POST['joining_date'] );
				$teacher->national_id               = trim( $_POST['national_id'] );
				$teacher->speciality                = trim( $_POST['speciality'] );
				$teacher->educational_qualification = trim( $_POST['educational_qualification'] );
				$teacher->status                    = 1;
				$new_file                           = new File();
				//attaching file , this method will work as a validation method for future
				//returns false if there are no files given
				if ( $new_file->attach_file( $_FILES['photo'] ) ) {
					//New File directory
					$new_file->upload_dir = 'images/teachers';
					// old file information
					$this->file->upload_dir = 'images/teachers';
					$this->file->file_name  = $_POST['oldPhoto'];
					$teacher->photo         = $new_file->file_name;
					if ( $teacher->update() ) {
						//Destroy the old file
						if ( $this->file->destroy() ) {
							//Save the new File
							if ( $new_file->save() ) {
								redirect( 'teachers/index' );
							} else {
								$this->file->destroy();
							}
						} else {
							die( 'Could not delete the file' );
						}
					} else {
						die( 'Something went Wrong' );
					}
				} else {
					$teacher->photo = $_POST['oldPhoto'];
					if ( $teacher->update() ) {
						redirect( 'teachers/index' );
					} else {
						die( 'Something went Wrong' );
					}
				}

			} else {
				echo $validation->displayErrors();
			}

		}
	}

	public function deleteTeacher( $id ) {

		Teacher::GetInstance()->id = $id;
		Teacher::GetInstance()->delete();
		redirect( 'Teachers/index' );


	}

	public function getDeactivatedTeachers() {
		$getDeactivatedTeachers = Teacher::GetInstance()->getDeactivatedTeachers();

		return jsonResult( $getDeactivatedTeachers );
	}

	public function getActiveTeachers() {
		$getActiveTeachers = Teacher::GetInstance()->getActiveTeachers();

		return jsonResult( $getActiveTeachers );
	}

	public function viewTeacher( $id = 0 ) {
		$teacher = Teacher::GetInstance()->getById( $id );

		$data = [
			'teacher' => $teacher,
		];
		$this->view( 'teachers/view', $data );
	}


	public function assignedAllTeachers() {
		$classes = AcademicClass::GetInstance()->getAll();

		$data = [
			'classes' => $classes,
		];
		$this->view( 'teachers/allAssigned', $data );
	}

	public function deactivateTeacher( $id ) {
		if ( POST ) {
			$teacher                    = new Teacher();
			$teacher->id                = $id;
			$teacher->deactivation_date = trim( $_POST['deactivation_date'] );
			if ( $teacher->deactivation_date == "" ) {
				$teacher->deactivation_date = date( date( "Y/m/d" ) );
			}

			/*------------------------Save Teacher Deactivation-------------------------*/
			if ( $teacher->deactivateTeacher( $teacher ) ) {
				/*Update Teacher as Deactivated*/
				$teacher->changeStatus( $teacher->id );
				redirect( 'Teachers/index' );
			} else {
				die( 'Something went Wrong' );
			}

		} else {

			$teacher = Teacher::GetInstance()->getById( $id );
			$data    = [
				'teacher' => $teacher,
			];
			$this->view( 'teachers/deactivate', $data );
		}
	}

	public function assignTeacher( $id ) {
		if ( POST ) {
			/*validation code starts here*/
			$validation = new Validation();
			$validation->name( 'class_id' )->value( $_POST['class_id'] )->pattern( 'int' )->required();
			$validation->name( 'section_id' )->value( $_POST['section_id'] )->pattern( 'int' )->required();
			$validation->name( 'subject_id' )->value( $_POST['subject_id'] )->pattern( 'int' )->required();

			/*-------------------------------Validation Ends Here--------------------------*/

			if ( $validation->isSuccess() ) {
				$teacher             = new Teacher();
				$teacher->class_id   = trim( $_POST['class_id'] );
				$teacher->id         = $id;
				$teacher->section_id = trim( $_POST['section_id'] );
				$teacher->subject_id = trim( $_POST['subject_id'] );
				/*------------------------Save the Teacher Assignment-------------------------*/
				if ( $teacher->assignTeacher( $teacher ) ) {
					redirect( 'Teachers/index' );
				} else {
					die( 'Something went Wrong' );
				}
			} else {
				//Show validation Errors
				echo $validation->displayErrors();
			}
		} else {

			$teacher = Teacher::GetInstance()->getById( $id );
			$classes = AcademicClass::GetInstance()->getAll();
			$data    = [
				'teacher' => $teacher,
				'classes' => $classes,
			];
			$this->view( 'teachers/assign', $data );
		}
	}

	public function getSubjectsByClass() {
		$class_id                     = $_POST['class_id'];
		$section_id                   = $_POST['section_id'];
		$assigned_subjects            = Teacher::GetInstance()->getAssignedSubjects( $class_id, $section_id );
		$unassigned_subjects_by_class = Teacher::GetInstance()->getSubjectsByClass( $class_id, $assigned_subjects );

		return jsonResult( $unassigned_subjects_by_class );
	}
	public function getAssignedAllSubjects() {
		$class_id                     = $_POST['class_id'];
		$assigned_all_subjects            = Teacher::GetInstance()->getAssignedAllSubjects( $class_id);
		return jsonResult( $assigned_all_subjects );
	}


	public function getAllTeachers() {
		$teachers = Teacher::GetInstance()->getAll();

		return jsonResult( $teachers );
	}

	public function checkAssignment() {

		$teacher_assignments = Teacher::GetInstance()->checkAssignment( $_POST['class_id'], $_POST['section_id'], $_POST['subject_id'] );
		$temp                = array();
		if ( $teacher_assignments == false ) {
			return jsonResult( $temp );
		} else {
			return jsonResult( $teacher_assignments );
		}

	}

}
