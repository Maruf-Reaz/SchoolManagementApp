<?php

namespace App\Models\Exam;

use App\Libraries\Database;
use App\Libraries\Model;

//written by
//Maruf
//5-9-2018


class ExamSchedule extends Model {
	protected static $table_name = "db_exam_exam_schedules";
	protected static $db_fields = [
		'id',
		'exam_id',
		'class_id',
		'section_id',
		'subject_id',
		'date',
		'from_time',
		'to_time',
		'room_id',
		'mark_distribution_id'
	];
	public $id;
	public $exam_id; //This field is to fetch the type of exam(e.g. 1st term,2nd term from db_exam_exams
	public $class_id;
	public $section_id;
	public $subject_id;
	public $date;
	public $from_time;
	public $to_time;
	public $room_id;
	public $mark_distribution_id;

	protected $db_object;

	public function __construct() {
		$this->db_object = new Database();
	}


	//Manual Delete Method[Redundant]
	/*public function deleteExamSchedule( $id ) {
		$this->db_object->query( 'DELETE FROM db_exam_exam_schedules  WHERE id=:id' );
		$this->db_object->bind( ':id', $id );

		if ( $this->db_object->execute() ) {
			return true;
		} else {
			return false;
		}
	}*/

	public function getExamSchedulesByClass($class_id){
		if ( $class_id == 0 ) {
			return	$this->getAll();
		} else {

			$this->db_object->query( 'SELECT * FROM db_exam_exam_schedules_view WHERE class_id=:class_id' );
			$this->db_object->bind( ':class_id', $class_id );
			$result = $this->db_object->resultSet();

			return $result;
		}
	}

	public function getSubjectsByClass($class_id){
		if ( $class_id == 0 ) {
			return	$this->getAll();
		} else {

			$this->db_object->query( 'SELECT * FROM db_academic_subjects WHERE class_id=:class_id' );
			$this->db_object->bind( ':class_id', $class_id );
			$result = $this->db_object->resultSet();

			return $result;
		}
	}

	public function getAllExamSchedules(){

			$this->db_object->query( 'SELECT * FROM db_exam_exam_schedules_view');
			$result = $this->db_object->resultSet();

			return $result;

	}
	public function getAllRooms(){
		$this->db_object->query( 'SELECT * FROM db_rooms');
		$result = $this->db_object->resultSet();
		return $result;
	}


	public function getExamScheduleById($id){
			$this->db_object->query( 'SELECT * FROM db_exam_exam_schedules_view WHERE id=:id');
			$this->db_object->bind( ':id', $id );
			$result = $this->db_object->single();
			return $result;
	}
	public function getExamSchedulesId($exam_id,$class_id,$section_id,$subject_id,$mark_distribution_id){
		$this->db_object->query( 'SELECT * FROM db_exam_exam_schedules_view WHERE exam_id=:exam_id AND class_id=:class_id AND section_id=:section_id AND subject_id=:subject_id AND mark_distribution_id=:mark_distribution_id');
		$this->db_object->bind( ':exam_id', $exam_id );
		$this->db_object->bind( ':class_id', $class_id );
		$this->db_object->bind( ':section_id', $section_id );
		$this->db_object->bind( ':subject_id', $subject_id );
		$this->db_object->bind( ':mark_distribution_id', $mark_distribution_id );
		$result = $this->db_object->single();

		return $result;

	}





}