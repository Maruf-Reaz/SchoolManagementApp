<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 12/14/2018
 * Time: 6:10 PM
 */

namespace App\Models\Attendance;


use App\Libraries\Database;
use App\Libraries\Model;
use App\Models\Role;
use TADPHP\TAD;
use TADPHP\TADFactory;

class AttendanceDeviceUser extends Model {
	/**@var array Roles on which Holiday will be applied to */
	public static $allowed_role = [ 'Teacher', 'Employee', 'Student', 'Accountant' ];

	protected static $table_name = 'db_attendance_user_info';
	protected static $db_fields = [
		'id',
		'pin',
		'name',
		'password',
		'card',
		'group_id',
		'privilege',
		'pin2',
		'TZ1',
		'registration_no',
		'designation_id',
		'role'
	];

	/**
	 * Properties
	 */

	//conf
	public $id;
	//conf
	public $pin;
	public $name;
	//conf
	public $password;
	public $card;
	public $group_id;
	//conf
	public $privilege;
	public $designation_id;
	public $role;

	public $registration_no;
	public $pin2;
	public $TZ1;

	protected $db_object;

	public function __construct() {
		$this->db_object = new Database();
	}

	public static function getAllowedRoles() {
		$roles = Role::getRolesByNames( self::$allowed_role );

		return $roles;
	}

	/**
	 * @param TAD $tad Pass the device as param
	 */
	public function addUserToDevice( TAD $tad ) {
		$r = $tad->set_user_info( [
			'pin'       => $this->id,
			'name'      => $this->name,
			'privilege' => $this->privilege,
			'password'  => $this->password
		] );
	}

	public function removeUserFromDevice() {

	}

	/**
	 * @return integer
	 */
	public function getLastPIN2() {
		$this->db_object->query( 'SELECT pin2 FROM ' . self::$table_name . ' ORDER BY id DESC LIMIT 1 ' );
		$result = $this->db_object->result();

		return array_shift( $result );
	}

	public function getLastPIN1() {
		$this->db_object->query( 'SELECT pin FROM ' . self::$table_name . ' ORDER BY id DESC LIMIT 1 ' );
		$result = $this->db_object->result();

		return array_shift( $result );
	}


}