<?php

namespace App\Controllers;

use App\Libraries\Controller;
use App\Libraries\Validation;
use App\Models\Academic\AcademicClass;
use App\Models\Academic\Section;
use App\Models\Guardian;
use App\Models\Student;
use App\Models\File;

class Students extends Controller {


	private $file;

	public function __construct() {
		$this->file         = new File();
		$this->middleware( [ 'Authentication' ] )->all();
		$this->middleware( [ 'Roles' ] )->all()->hasRole( [
			'all' => [ 'Admin' ],
		] );
	}

	public function index() {
		$classes  = AcademicClass::GetInstance()->getAll();
		$data     = [
			'classes'  => $classes,
		];
		$this->view( 'students/student_entry/index', $data );
	}
	/* ------------------------Getting all the unassigned Student from DB----------------------------*/
	public function getUnassignedStudents() {
		AcademicClass::GetInstance()->getAll();
		$unassigned_students = Student::GetInstance()->getAllUnassignedStudents();

		return jsonResult( $unassigned_students );

	}
	/*-----------------------Action for adding a student---------------------------------------------*/
	public function add() {

		if ( POST ) {

			/*-------------------------Generating Student Registration No-------------------------*/
			$max_count_from_db = Student::GetInstance()->getMaxCount();
			$student_serial    = sprintf( "%06s", $max_count_from_db->max_count + 1 );
			$registration_no   = 'S' . $student_serial;
			/*-------------------------Generating registration No code ends here---------------------------------*/


			/*-------------------------Backend validation Starts-----------------------------------*/
			$validation = new Validation();
			$validation->name( 'name' )->value( $_POST['name'] )->pattern( 'text' )->required();
			$validation->name( 'guardian_id' )->value( $_POST['guardian_id'] )->pattern( 'int' )->required();
			$validation->name( 'date_of_birth' )->value( $_POST['date_of_birth'] )->pattern( 'text' )->required();
			$validation->name( 'gender' )->value( $_POST['gender'] )->pattern( 'text' )->required();
			$validation->name( 'blood_group' )->value( $_POST['blood_group'] )->pattern( 'text' )->required();
			$validation->name( 'religion' )->value( $_POST['religion'] )->pattern( 'text' )->required();
			$validation->name( 'current_address' )->value( $_POST['current_address'] )->pattern( 'text' )->required();
			$validation->name( 'permanent_address' )->value( $_POST['permanent_address'] )->pattern( 'text' )->required();
			$validation->name( 'extra_curricular_activities' )->value( $_POST['extra_curricular_activities'] )->pattern( 'text' )->required();
			$validation->name( 'remarks' )->value( $_POST['remarks'] )->pattern( 'text' )->required();

			/*-------------------------------Validation Ends Here--------------------------*/

			if ( $validation->isSuccess() ) {
				$student                              = new Student();
				$student->name                        = trim( $_POST['name'] );
				$student->guardian_id                 = trim( $_POST['guardian_id'] );
				$student->date_of_birth               = trim( $_POST['date_of_birth'] );
				$student->gender                      = trim( $_POST['gender'] );
				$student->blood_group                 = trim( $_POST['blood_group'] );
				$student->religion                    = trim( $_POST['religion'] );
				$student->current_address             = trim( $_POST['current_address'] );
				$student->permanent_address           = trim( $_POST['permanent_address'] );
				$student->registration_no             = $registration_no;
				$student->extra_curricular_activities = trim( $_POST['extra_curricular_activities'] );
				$student->remarks                     = trim( $_POST['remarks'] );
				$student->status                      = 1;
				$student->assignment                  = 0;
				if ( $this->file->attach_file( $_FILES['photo'] ) ) {
					$this->file->upload_dir = 'images/students';
					//First save the file in directory
					if ( $this->file->save() ) {
						$student->photo = $this->file->file_name;
						/*------------------------Save the Student-------------------------*/
						if ( $student->create() ) {
							redirect( 'Students/index' );
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
				//Show validation Errors
				echo $validation->displayErrors();

			}
		} else {
			/*--------------Show the empty form before posting a Student-------------*/
			$guardians=Guardian::GetInstance()->getAll();

			$data = [
				'name'                        => '',
				'guardian_id'                 => '',
				'date_of_birth'               => '',
				'gender'                      => '',
				'blood_group'                 => '',
				'religion'                    => '',
				'current_address'             => '',
				'permanent_address'           => '',
				'photo'                       => '',
				'extra_curricular_activities' => '',
				'remarks'                     => '',
				'guardians'                   => $guardians,
			];
			$this->view( 'students/student_entry/add', $data );
		}
	}
	/*---------------------------Action for showing a student before editing------------------------*/
	public function showStudent( $id = 0 ) {
		$student   = Student::GetInstance()->getById( $id );
		$guardians = Guardian::GetInstance()->getAll();
		$guardian_id = $student->guardian_id ;
		$guardian  = Guardian::GetInstance()->getById($guardian_id);


		$data = [
			'student'       => $student,
			'guardian_name' => $guardian->guardian_name,
			'guardians'     => $guardians,
		];
		$this->view( 'students/student_entry/edit', $data );
	}
	/*---------------------Action for showing student information-----------------------------------*/
	public function viewStudent( $id = 0 ) {
		$student = Student::GetInstance()->getById( $id );

		$data = [
			'student' => $student,
		];
		$this->view( 'students/student_entry/view', $data );
	}
	/*--------------------------------Action for editing a student----------------------------------*/
	public function editStudent() {

		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'name' )->value( $_POST['name'] )->pattern( 'text' )->required();
			$validation->name( 'guardian_id' )->value( $_POST['guardian_id'] )->pattern( 'int' )->required();
			$validation->name( 'date_of_birth' )->value( $_POST['date_of_birth'] )->pattern( 'text' )->required();
			$validation->name( 'gender' )->value( $_POST['gender'] )->pattern( 'text' )->required();
			$validation->name( 'blood_group' )->value( $_POST['blood_group'] )->pattern( 'text' )->required();
			$validation->name( 'religion' )->value( $_POST['religion'] )->pattern( 'text' )->required();
			$validation->name( 'current_address' )->value( $_POST['current_address'] )->pattern( 'text' )->required();
			$validation->name( 'permanent_address' )->value( $_POST['permanent_address'] )->pattern( 'text' )->required();
			$validation->name( 'extra_curricular_activities' )->value( $_POST['extra_curricular_activities'] )->pattern( 'text' )->required();
			$validation->name( 'remarks' )->value( $_POST['remarks'] )->pattern( 'text' )->required();

			if ( $validation->isSuccess() ) {
				$student                              = new Student();
				$student->id                          = trim( $_POST['id'] );
				$student->name                        = trim( $_POST['name'] );
				$student->guardian_id                 = trim( $_POST['guardian_id'] );
				$student->date_of_birth               = trim( $_POST['date_of_birth'] );
				$student->gender                      = trim( $_POST['gender'] );
				$student->blood_group                 = trim( $_POST['blood_group'] );
				$student->religion                    = trim( $_POST['religion'] );
				$student->current_address             = trim( $_POST['current_address'] );
				$student->permanent_address           = trim( $_POST['permanent_address'] );
				$student->registration_no             = trim( $_POST['registration_no'] );
				$student->extra_curricular_activities = trim( $_POST['extra_curricular_activities'] );
				$student->remarks                     = trim( $_POST['remarks'] );
				$student->status                  = trim( $_POST['status'] );
				$student->assignment                     = trim( $_POST['assignment'] );
				$new_file                             = new File();
				//attaching file , this method will work as a validation method for future
				//returns false if there are no files given
				if ( $new_file->attach_file( $_FILES['photo'] ) ) {
					//New File directory
					$new_file->upload_dir = 'images/students';
					// old file information
					$this->file->upload_dir = 'images/students';
					$this->file->file_name  = $_POST['oldPhoto'];
					$student->photo         = $new_file->file_name;
					if ( $student->update() ) {
						//Destroy the old file
						if ( $this->file->destroy() ) {
							//Save the new File
							if ( $new_file->save() ) {
								redirect( 'students/index' );
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
					$student->photo = $_POST['oldPhoto'];
					if ( $student->update() ) {
						redirect( 'students/index' );
					} else {
						die( 'Something went Wrong' );
					}
				}

			} else {
				echo $validation->displayErrors();
			}

		}
	}
	/*---------------------Action for Assigning student to a class and section----------------------*/
	public function assignStudent( $id ) {
		if ( POST ) {
			/*validation code starts here*/
			$validation = new Validation();
			$validation->name( 'class_id' )->value( $_POST['class_id'] )->pattern( 'int' )->required();
			$validation->name( 'section_id' )->value( $_POST['section_id'] )->pattern( 'int' )->required();
			$validation->name( 'roll_no' )->value( $_POST['roll_no'] )->pattern( 'text' )->required();

			/*-------------------------------Validation Ends Here--------------------------*/

			if ( $validation->isSuccess() ) {
				$student             = new Student();
				$student->class_id   = trim( $_POST['class_id'] );
				$student->id         = $id;
				$student->section_id = trim( $_POST['section_id'] );
				$student->roll_no    = trim( $_POST['roll_no'] );
				/*------------------------Save the Student-------------------------*/
				if ( $student->assignStudent( $student ) ) {
					/*Update student as Assigned*/
					$student->changeAssignment( $student->id );
					redirect( 'Students/index' );
				} else {
					die( 'Something went Wrong' );
				}
			} else {
				//Show validation Errors
				echo $validation->displayErrors();
			}
		} else {

			$student = Student::GetInstance()->getById( $id );
			$classes = AcademicClass::GetInstance()->getAll();
			$data    = [
				'student' => $student,
				'classes' => $classes,
			];
			$this->view( 'students/student_assign/assign', $data );
		}
	}
	/*---------------------------------Action for deactivate student--------------------------------*/
	public function deactivateStudent( $id ) {
		if ( POST ) {
			$student                    = new Student();
			$student->id                = $id;
			$student->deactivation_date = trim( $_POST['deactivation_date'] );
			if ( $student->deactivation_date == "" ) {
				$student->deactivation_date = date( date( "Y/m/d" ) );
			}

			/*------------------------Save Student Deactivation-------------------------*/
			if ( $student->deactivateStudent( $student ) ) {
				/*Update student as Assigned*/
				$student->changeStatus( $student->id );
				redirect( 'Students/index' );
			} else {
				die( 'Something went Wrong' );
			}

		} else {

			$student = Student::GetInstance()->getById( $id );
			$data    = [
				'student' => $student,
			];
			$this->view( 'students/student_deactivate/deactivate', $data );
		}
	}
    /*--------------------------Action for getting student by class----------------------------------*/
	public function getStudentsByClass() {
		$students_by_class = Student::GetInstance()->getStudentsByClass( $_POST['class_id'] );

		return jsonResult( $students_by_class );

	}
	/*-----------------------------Action for getting sections by class------------------------------*/
	public function getSectionsByClass() {
		$sections_by_class = Section::GetInstance()->getSectionsByClass( $_POST['class_id'] );

		return jsonResult( $sections_by_class );

	}
	/*-----------------------------Action for getting deacativated Students--------------------------*/
	public function getDeactivatedStudents() {
		$getDeactivatedStudents = Student::GetInstance()->getDeactivatedStudents();
		return jsonResult( $getDeactivatedStudents );
	}
	/*----------------------Action for checking a roll no if it exists already-----------------------*/
	public function checkRollNo() {

		if(Student::GetInstance()->checkRollNo($_POST['class_id'],$_POST['section_id'],$_POST['roll_no']))
		{
			$error_message = 1;
			return jsonResult( $error_message );
		}
		else{
			$error_message = 0;
			return jsonResult( $error_message );
		}
	}
	public function getAllStudents() {
		$getAllStudents = Student::GetInstance()->getAll();

		return jsonResult( $getAllStudents );
	}
	public function getAllClasses() {
		$getAllClasses = AcademicClass::GetInstance()->getAll();

		return jsonResult( $getAllClasses );
	}

}

