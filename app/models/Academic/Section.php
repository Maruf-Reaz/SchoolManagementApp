<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/5/2018
 * Time: 11:37 AM
 */

namespace App\Models\Academic;

use App\Libraries\Model;
use App\Libraries\Database;

class Section extends Model {

	protected static $table_name = 'db_academic_sections';
	protected static $db_fields = [ 'id', 'name', 'catagory', 'capacity', 'class_id', 'teacher_id'];

	public $db_object;
	/*Properties*/
	public $id;
	public $name;
	public $catagory;
	public $capacity;
	public $class_id;
	public $teacher_id;
	/*public $note;*/

	public function __construct() {
		$this->db_object = new Database();
	}


	public function getSectionsByClass( $class_id ) {
		if ( $class_id == 0 ) {
			return $this->getSections();
		} else {

			$this->db_object->query( 'SELECT * FROM db_academic_sections_view WHERE class_id=:class_id' );
			$this->db_object->bind( ':class_id', $class_id );
			$result = $this->db_object->resultSet();

			return $result;
		}
	}

	public function getSections() {
		$this->db_object->query( 'SELECT * FROM db_academic_sections_view' );
		$result = $this->db_object->resultSet();

		return $result;
	}
}
