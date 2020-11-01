<?php

namespace App\Models;

use App\Libraries\Database;
use App\Libraries\Model;

class Teacher extends Model {
	protected static $table_name = "db_teacher_teachers";
	protected static $db_fields = [
		'id',
		'name',
		'designation_id',
		'status',
		'date_of_birth',
		'gender',
		'blood_group',
		'religion',
		'email',
		'phone',
		'current_address',
		'permanent_address',
		'photo',
		'joining_date',
		'registration_no',
		'educational_qualification',
		'speciality',
		'national_id'
	];
	public $id;
	public $name;
	public $designation_id;
	public $date_of_birth;
	public $gender;
	public $blood_group;
	public $religion;
	public $email;
	public $phone;
	public $current_address;
	public $permanent_address;
	public $status;
	public $photo;
	public $joining_date;
	public $registration_no;
	public $educational_qualification;
	public $speciality;
	public $national_id;

	protected $db_object;

	public function __construct() {
		$this->db_object = new Database();
	}


	public function change( $id, $status ) {
		if ( $status == 1 ) {
			$this->db_object->query( 'UPDATE db_teacher_teachers SET status=0 WHERE id=:id' );
			$this->db_object->bind( ':id', $id );
			if ( $this->db_object->execute() ) {
				return true;
			} else {
				return false;
			}
		} else {
			$this->db_object->query( 'UPDATE db_teacher_teachers SET status=1 WHERE id=:id' );
			$this->db_object->bind( ':id', $id );
			if ( $this->db_object->execute() ) {
				return true;
			} else {
				return false;
			}
		}
	}

	public function getDeactivatedTeachers() {
		$this->db_object->query( 'SELECT * FROM db_teacher_teachers WHERE status = 0 ' );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getActiveTeachers() {
		$this->db_object->query( 'SELECT * FROM db_teacher_teachers WHERE status = 1 ' );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getMaxCount() {
		$this->db_object->query( 'SELECT COUNT(id) AS max_count FROM db_teacher_teachers' );
		$result = $this->db_object->single();

		return $result;
	}

	public function deactivateTeacher( $teacher ) {
		$this->db_object->query( 'INSERT INTO db_teacher_deactivations(teacher_id,deactivation_date) VALUES (:teacher_id,:deactivation_date)' );
		$this->db_object->bind( ':teacher_id', $teacher->id );
		$this->db_object->bind( ':deactivation_date', $teacher->deactivation_date );
		$this->db_object->execute();

		return true;
	}

	public function changeStatus( $id ) {

		$this->db_object->query( 'UPDATE db_teacher_teachers SET status = 0 WHERE id=:id' );
		$this->db_object->bind( ':id', $id );
		$this->db_object->execute();

	}

	public function assignTeacher( $teacher ) {
		$this->db_object->query( 'INSERT INTO db_teacher_assignments(class_id,section_id,subject_id,teacher_id) VALUES (:class_id,:section_id,:subject_id,:teacher_id)' );
		$this->db_object->bind( ':class_id', $teacher->class_id );
		$this->db_object->bind( ':section_id', $teacher->section_id );
		$this->db_object->bind( ':subject_id', $teacher->subject_id );
		$this->db_object->bind( ':teacher_id', $teacher->id );
		$this->db_object->execute();

		return true;
	}

	public function deactivateSTeacher( $teacher ) {
		$this->db_object->query( 'INSERT INTO db_teacher_deactivations(teacher_id,deactivation_date) VALUES (:teacher_id,:deactivation_date)' );
		$this->db_object->bind( ':teacher_id', $teacher->id );
		$this->db_object->bind( ':deactivation_date', $teacher->deactivation_date );
		$this->db_object->execute();

		return true;
	}

	public function getAssignedSubjects( $class_id, $section_id ) {
		$this->db_object->query( 'SELECT * FROM db_teacher_assignments WHERE class_id=:class_id AND section_id=:section_id' );
		$this->db_object->bind( ':class_id', $class_id );
		$this->db_object->bind( ':section_id', $section_id );
		$result = $this->db_object->resultSet();

		return $result;
	}


	public function getSubjectsByClass( $class_id, $assigned_subjects ) {
		$assigned_db_string = $class_id . " ";
		foreach ( $assigned_subjects as $assigned_subject ) {
			$assigned_db_string .= "AND id != " . $assigned_subject->subject_id . " ";
		}
		$this->db_object->query( 'SELECT * FROM db_academic_subjects WHERE class_id=' . $assigned_db_string );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getAssignedAllSubjects( $class_id ) {
		$this->db_object->query( 'SELECT * FROM db_teacher_assignments_view WHERE class_id=:class_id ' );
		$this->db_object->bind( ':class_id', $class_id );
		$result = $this->db_object->resultSet();
		return $result;
	}


	public function checkAssignment( $class_id, $section_id, $subject_id ) {
		$this->db_object->query( 'SELECT * FROM db_teacher_assignments_view WHERE class_id=:class_id AND section_id=:section_id AND subject_id=:subject_id' );
		$this->db_object->bind( ':class_id', $class_id );
		$this->db_object->bind( ':section_id', $section_id );
		$this->db_object->bind( ':subject_id', $subject_id );
		$result = $this->db_object->result();

		return $result;
	}


}
