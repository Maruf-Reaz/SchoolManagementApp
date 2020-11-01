<?php

namespace App\Models\Exam;

use App\Libraries\Database;
use App\Libraries\Model;

//written by
//Maruf
//11-9-2018


class ExamAttendance extends Model {
	protected static $table_name = "db_exam_exam_attendances";
	protected static $db_fields = [
		'id',
		'value',
		'exam_schedule_id',
		'student_id',
	];
	public $id;
	public $value;
	public $exam_schedule_id;
	public $student_id;


	protected $db_object;

	public function __construct() {
		$this->db_object = new Database();
	}

	public function getAttendanceByExamAndClassAndSectionAndSubject( $exam_id, $class_id, $section_id, $subject_id, $mark_distribution_id ) {

		$this->db_object->query( 'SELECT * FROM db_exam_exam_attendance_view WHERE exam_id=:exam_id AND class_id=:class_id AND section_id=:section_id AND subject_id=:subject_id AND mark_distribution_id=:mark_distribution_id' );
		$this->db_object->bind( ':exam_id', $exam_id );
		$this->db_object->bind( ':class_id', $class_id );
		$this->db_object->bind( ':section_id', $section_id );
		$this->db_object->bind( ':subject_id', $subject_id );
		$this->db_object->bind( ':mark_distribution_id', $mark_distribution_id );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getAllAttendance( $exam_id, $class_id, $section_id, $subject_id ) {

		$this->db_object->query( 'SELECT * FROM db_exam_exam_attendance_view WHERE exam_id=:exam_id AND class_id=:class_id AND section_id=:section_id AND subject_id=:subject_id' );
		$this->db_object->bind( ':exam_id', $exam_id );
		$this->db_object->bind( ':class_id', $class_id );
		$this->db_object->bind( ':section_id', $section_id );
		$this->db_object->bind( ':subject_id', $subject_id );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function updateStatus( $attendance_id, $value ) {

		$this->db_object->query( 'UPDATE db_exam_exam_attendances SET value=:value WHERE id=:attendance_id' );
		//Bind parameters
		$this->db_object->bind( ':attendance_id', $attendance_id );
		$this->db_object->bind( ':value', $value );
		$this->db_object->execute();


	}

	public function getAttendanceByClassAndSection( $class_id, $section_id ) {

		$this->db_object->query( 'SELECT * FROM db_exam_exam_attendance_view WHERE class_id=:class_id AND section_id=:section_id' );
		$this->db_object->bind( ':class_id', $class_id );
		$this->db_object->bind( ':section_id', $section_id );
		$this->db_object->execute();
		$result = $this->db_object->resultSet();

		return $result;


	}

	public function deleteAttendanceByExamScheduleId( $exam_schedule_id ) {
		$this->db_object->query( 'DELETE FROM db_exam_exam_attendances WHERE exam_schedule_id=:exam_schedule_id ' );
		$this->db_object->bind( ':exam_schedule_id', $exam_schedule_id );
		$this->db_object->execute();
	}


}