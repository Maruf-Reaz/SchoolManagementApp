<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 12/15/2018
 * Time: 12:28 PM
 */

namespace App\Models\Attendance;


use App\Libraries\Database;
use App\Libraries\Model;

class UserTemplate extends Model {
	protected static $table_name = 'db_attendance_user_templates';
	protected static $db_fields = [ 'id', 'pin', 'finger_id', 'size', 'valid', 'template' ];

	/**
	 * Properties
	 */

	public $id;
	public $pin;
	public $finger_id;
	public $size;
	public $valid;
	public $template;

	protected $db_object;

	public function __construct() {
		$this->db_object = new Database();
	}

	public function getByPin( $pin ) {
		$this->db_object->query( 'SELECT * FROM ' . self::$table_name . ' WHERE pin=:pin ' );
		$this->db_object->bind( ':pin', $pin );
		$results = $this->db_object->resultSet();

		return $results;
	}
}