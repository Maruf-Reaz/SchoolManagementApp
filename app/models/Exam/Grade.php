<?php

namespace App\Models\Exam;

use App\Libraries\Database;
use App\Libraries\Model;
class Grade extends Model {
	protected static $table_name = "db_exam_grades";
	protected static $db_fields = [
		'id',
		'grade_name',
		'grade_point',
		'mark_from',
		'mark_upto',
		'note',
	];
	public $id;
	public $grade_name;
	public $grade_point;
	public $mark_from;
	public $mark_upto;
	public $note;


	protected $db_object;

	public function __construct() {
		$this->db_object = new Database();
	}

	public function getAllGrades() {
		$this->db_object->query( 'SELECT * FROM db_exam_grades ORDER BY grade_point;' );
		$this->db_object->execute();
		$result = $this->db_object->resultSet();
		return $result;
	}
	
	public function getAllGradesExceptId($id) {
		$this->db_object->query( 'SELECT * FROM db_exam_grades WHERE id!=:id;' );
		$this->db_object->bind( ':id', $id );
		$this->db_object->execute();
		$result = $this->db_object->resultSet();
		return $result;
	}



}