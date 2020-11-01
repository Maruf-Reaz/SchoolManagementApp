<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 10/21/2018
 * Time: 3:08 PM
 */

namespace App\Models\Attendance;


use App\Libraries\Database;
use App\Libraries\Model;
use App\Libraries\Validation;
use App\Models\Teacher;

class EmployeeAttendance extends Model {
	protected static $table_name = 'db_attendance_employee_att';
	protected static $db_fields = [
		'id',
		'role_id',
		'designation_id',
		'status',
		'datetime',
		'note',
		'user_id',
		'updated_at'
	];
	/**
	 * Property
	 */

	public $id;
	public $role_id;
	public $designation_id;
	public $status;
	public $datetime;
	public $note;
	public $user_id;
	public $updated_at;

	public $db_object;

	public function __construct() {
		$this->db_object = new Database();
	}

	public function getAllRoles() {
		$this->db_object->query( 'SELECT * FROM db_roles WHERE id > 2' );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getTeacherAttendance( $role_id, $datetime ) {

		if ( $role_id != 0 && $datetime != "" ) {
			$attended_teachers = $this->getAttendedTeachers( $role_id, $datetime );
			$teachers          = ( new Teacher() )->getAll();

			foreach ( $teachers as $teacher ) {
				$teacher->att_status = null;
				$teacher->note       = null;
				$teacher->att_id     = "";

				foreach ( $attended_teachers as $attended_teacher ) {
					if ( $teacher->id == $attended_teacher->designation_id ) {
						$teacher->att_status = $attended_teacher->status;
						$teacher->note       = $attended_teacher->note;
						$teacher->att_id     = $attended_teacher->id;
					}
				}
			}

			return $teachers;
		}
	}

	private function getAttendedTeachers( $role_id, $datetime ) {
		$this->db_object->query( 'SELECT * FROM db_attendance_employee_att WHERE datetime=:datetime AND role_id=:role_id' );
		$this->db_object->bind( ':datetime', $datetime );
		$this->db_object->bind( ':role_id', $role_id );
		$results = $this->db_object->resultSet();

		return $results;
	}
}