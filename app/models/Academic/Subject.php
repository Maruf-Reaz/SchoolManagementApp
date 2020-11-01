<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/3/2018
 * Time: 1:34 PM
 */

namespace App\Models\Academic;

use App\Libraries\Database;
use App\Libraries\Model;

class Subject extends Model {
	protected static $table_name = 'db_academic_subjects';
	protected static $db_fields = [
		'id',
		'class_id',
		'type',
		'pass_mark',
		'final_mark',
		'subject_name',
		'subject_code'
	];

	public $db_object;
	/*Properties*/
	public $id;
	public $class_id;
	public $type;
	public $pass_mark;
	public $final_mark;
	public $subject_name;
	public $subject_code;
	/*public $subject_author;*/
	/*public $teacher_id;*/

	public function __construct() {
		$this->db_object = new Database();
	}

	public function getSubjectByClassId( $class_id ) {
		$this->db_object->query( 'SELECT * FROM db_academic_subjects WHERE class_id=:class_id' );
		$this->db_object->bind( ':class_id', $class_id );
		$result = $this->db_object->resultSet();

		return $result;
	}


}