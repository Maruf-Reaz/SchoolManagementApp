<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 10/14/2018
 * Time: 11:42 AM
 */

namespace App\Controllers\Attendance;

use App\Libraries\Controller;
use App\Libraries\Validation;
use App\Models\Attendance\EmployeeAttendance;
use Carbon\Carbon;

/*Controller*/

class Attendances extends Controller {

	public function takeAttendance() {

		if ( POST ) {
			$validation = new Validation();

			$validation->name( 'role_id' )->value( $_POST['role_id'] )->pattern( 'int' )->required();
			$validation->name( 'designation_id' )->value( $_POST['designation_id'] )->pattern( 'array' )->required();
			$validation->name( 'status' )->value( $_POST['status'] )->pattern( 'array' )->required();
			$validation->name( 'note' )->value( $_POST['note'] )->pattern( 'array' )->required();
			$validation->name( 'datetime' )->value( $_POST['datetime'] )->pattern( 'text' )->required();

			if ( $validation->isSuccess() ) {
				$role          = $_POST['role_id'];
				$teachers      = $_POST['designation_id'];
				$status        = $_POST['status'];
				$note          = $_POST['note'];
				$date          = $_POST['datetime'];
				$attendance_id = $_POST['attendance_id'];

				foreach ( $teachers as $key => $teacher ) {
					$attendance                 = new EmployeeAttendance();
					$attendance->id             = $attendance_id[ $key ] == "" ? null : $attendance_id[ $key ];//if it is null that means new record
					$attendance->designation_id = $teacher;
					$attendance->role_id        = $role;
					$attendance->status         = $status[ $key ];
					$attendance->note           = $note[ $key ];
					$attendance->datetime       = $date;
					$attendance->user_id        = '1';
					$attendance->updated_at     = Carbon::now()->toDateTimeString();
					$attendance->save();
				}

			}


		}

		//Get All
		$roles = ( new EmployeeAttendance() )->getAllRoles();
		$data  = [
			'roles' => $roles,
		];
		$this->view( 'attendance/attendances/take_attendance', $data );
	}

	public function getAllEmployee() {
		$validation = new Validation();

		$validation->name( 'role_id' )->value( $_POST['role_id'] )->pattern( 'int' )->required();
		$validation->name( 'datetime' )->value( $_POST['datetime'] )->pattern( 'text' )->required();

		if ( $validation->isSuccess() ) {
			$role_id  = $_POST['role_id'];
			$datetime = $_POST['datetime'];

			$result = null;
			switch ( $role_id ) {
				//role_id=4 teacher
				case 4:
					$result = ( new EmployeeAttendance() )->getTeacherAttendance( $role_id, $datetime );
					break;
				case 7:
					$result = null;
					break;
				default:
					$result = null;
			}

			return jsonResult( $result );

		}

	}

}