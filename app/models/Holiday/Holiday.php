<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 11/22/2018
 * Time: 1:11 AM
 */

namespace App\Models\Holiday;


use App\Libraries\Database;
use App\Libraries\Model;
use App\Models\Role;

class Holiday extends Model {
	/**@var array Roles on which Holiday will be applied to */
	public static $allowed_role = [ 'Teacher', 'Employee', 'Student' ];

	protected static $table_name = 'db_holiday_holidays';
	/*db object*/
	protected static $db_fields = [ 'id', 'type_id','role_id','registration_no', 'name', 'from_date', 'to_date', 'remarks', 'recurrence' ];

	public $db_object;
	public $id;
	public $type_id;
	public $role_id;
	public $registration_no;
	public $name;
	public $from_date;
	public $to_date;
	public $remarks;
	public $recurrence;

	public function __construct() {
		$this->db_object = new Database();
	}

	public static function getAllowedRoles() {
		$roles = Role::getRolesByNames( self::$allowed_role );

		return $roles;
	}

}