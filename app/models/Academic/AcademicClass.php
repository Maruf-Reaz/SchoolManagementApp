<?php

namespace App\Models\Academic;


use App\Libraries\Database;
use App\Libraries\Model;

class AcademicClass extends Model {
	protected static $table_name = 'db_academic_classes';
	protected static $db_fields = [ 'id', 'name', 'numeric_value'];
	/**
	 * Property
	 */
	public $id;
	public $name;
	public $numeric_value;
	/*public $note;*/


	protected $db_object;

	public function __construct() {
		$this->db_object = new Database();
	}

}