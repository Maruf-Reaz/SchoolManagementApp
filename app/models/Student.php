<?php

namespace App\Models;

use App\Libraries\Database;
use App\Libraries\Model;


class Student extends Model {
	protected static $table_name = "db_student_students";
	protected static $db_fields = [
		'id',
		'name',
		'guardian_id',
		'status',
		'date_of_birth',
		'gender',
		'blood_group',
		'religion',
		'current_address',
		'permanent_address',
		'registration_no',
		'photo',
		'extra_curricular_activities',
		'remarks',
		'assignment'
	];
	public $id;
	public $name;
	public $guardian_id;
	public $date_of_birth;
	public $gender;
	public $blood_group;
	public $religion;
	public $current_address;
	public $permanent_address;
	public $status;
	public $registration_no;
	public $photo;
	public $extra_curricular_activities;
	public $remarks;
	public $assignment;

	protected $db_object;

	public function __construct() {
		$this->db_object = new Database();
	}

	/*-------------------Method for Getting all unassigned students student--------------------*/
	public function getAllUnassignedStudents() {
		$this->db_object->query( 'SELECT * FROM db_student_students_view WHERE assignment= 0 AND status=1' );
		$result = $this->db_object->resultSet();

		return $result;
	}

	/*-------------------Method for  getting  students of a class------------------------------*/
	public function getStudentsByClass( $class_id ) {
		if ( $class_id == 0 ) {
			$result = [];

			return $result;
		} else {
			$this->db_object->query( 'SELECT * FROM db_student_assignments_view WHERE class_id=:class_id AND  status = 1' );
			$this->db_object->bind( ':class_id', $class_id );
			$result = $this->db_object->resultSet();

			return $result;
		}
	}

	/*-------------------Action for getting students of a class and section ------------------*/
	public function getStudentByClassAndSection( $class_id, $section_id ) {

		$this->db_object->query( 'SELECT * FROM db_student_assignments_view WHERE class_id=:class_id AND section_id=:section_id' );
		$this->db_object->bind( ':class_id', $class_id );
		$this->db_object->bind( ':section_id', $section_id );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getStudentByClass( $class_id ) {

		$this->db_object->query( 'SELECT * FROM db_student_assignments_view WHERE class_id=:class_id' );
		$this->db_object->bind( ':class_id', $class_id );
		$result = $this->db_object->resultSet();

		return $result;
	}


	/*-------------------Method for getting class of a student--------------------------------*/
	public function getClassIdAndSectionIdByStudentId( $student_id ) {

		$this->db_object->query( 'SELECT class_id,section_id FROM db_student_assignments_view WHERE id=:id' );
		$this->db_object->bind( ':id', $student_id );
		$result = $this->db_object->single();

		return $result;
	}

	/*-----------Method for getting student with class and section and roll no---------------*/
	public function getStudentById( $id ) {
		$this->db_object->query( 'SELECT * FROM db_student_assignments_view WHERE id=:id' );
		$this->db_object->bind( ':id', $id );
		$result = $this->db_object->single();

		return $result;
	}

	public function getAllAssignedAndActiveStudents() {
		$this->db_object->query( 'SELECT * FROM db_student_students WHERE status=1 AND assignment=1' );
		$result = $this->db_object->single();

		return $result;
	}


	/*-------------Method for getting total student number to create reg no -----------------*/
	public function getMaxCount() {
		$this->db_object->query( 'SELECT COUNT(id) AS max_count FROM db_student_students' );
		$result = $this->db_object->single();

		return $result;
	}

	/*---------------------------Method for assigning student-------------------------------*/
	public function assignStudent( $student ) {
		$this->db_object->query( 'INSERT INTO db_student_assignments(student_id,section_id,roll_no,class_id) VALUES (:student_id,:section_id,:roll_no,:class_id)' );
		$this->db_object->bind( ':class_id', $student->class_id );
		$this->db_object->bind( ':student_id', $student->id );
		$this->db_object->bind( ':section_id', $student->section_id );
		$this->db_object->bind( ':roll_no', $student->roll_no );
		$this->db_object->execute();

		return true;
	}

	/*-------------------------Method for getting deactivate students-----------------------*/
	public function getDeactivatedStudents() {
		$this->db_object->query( 'SELECT * FROM db_student_students_view WHERE status = 0 ' );
		$result = $this->db_object->resultSet();

		return $result;
	}

	/*-------------------------------method for deactivate student--------------------------*/
	public function deactivateStudent( $student ) {
		$this->db_object->query( 'INSERT INTO db_student_deactivations(student_id,deactivation_date) VALUES (:student_id,:deactivation_date)' );
		$this->db_object->bind( ':student_id', $student->id );
		$this->db_object->bind( ':deactivation_date', $student->deactivation_date );
		$this->db_object->execute();

		return true;
	}


	/*------------------Change assignment status after assigning a student-----------------*/
	public function changeAssignment( $id ) {

		$this->db_object->query( 'UPDATE db_student_students SET assignment = 1 WHERE id=:id' );
		$this->db_object->bind( ':id', $id );
		$this->db_object->execute();

	}

	/*----------------------Method for changing status student-----------------------------*/
	public function changeStatus( $id ) {

		$this->db_object->query( 'UPDATE db_student_students SET status = 0 WHERE id=:id' );
		$this->db_object->bind( ':id', $id );
		$this->db_object->execute();

	}

	/*----------------------------Method for checking roll no -----------------------------*/
	public function checkRollNo( $class_id, $section_id, $roll_no ) {
		$this->db_object->query( 'SELECT * FROM db_student_assignments_view WHERE class_id=:class_id AND section_id=:section_id AND roll_no=:roll_no' );
		$this->db_object->bind( ':class_id', $class_id );
		$this->db_object->bind( ':section_id', $section_id );
		$this->db_object->bind( ':roll_no', $roll_no );
		$result = $this->db_object->resultSet();
		if ( empty( $result ) ) {
			return false;
		} else {
			return true;
		}
	}

	public function getAlLStudents() {
		$this->db_object->query( 'SELECT * FROM db_student_students_view ' );
		$result = $this->db_object->resultSet();
		return $result;
	}
}

