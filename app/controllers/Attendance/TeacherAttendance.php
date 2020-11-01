<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 10/22/2018
 * Time: 4:16 PM
 */

namespace App\Controllers\Attendance;

use App\Libraries\Controller;
use App\Libraries\Validation;
use App\Models\Attendance\EmployeeAttendance;
use Carbon\Carbon;

class TeacherAttendance extends Controller {

	public function daily() {
		if ( POST ) {
			$validation = new Validation();

			$validation->name( 'designation_id' )->value( $_POST['designation_id'] )->pattern( 'array' )->required();
			$validation->name( 'status' )->value( $_POST['status'] )->pattern( 'array' )->required();
			$validation->name( 'note' )->value( $_POST['note'] )->pattern( 'array' )->required();
			$validation->name( 'datetime' )->value( $_POST['datetime'] )->pattern( 'text' )->required();

			if ( $validation->isSuccess() ) {
				$role          = 4;
				$teachers      = $_POST['designation_id'];
				$status        = $_POST['status'];
				$note          = $_POST['note'];
				$date          = $_POST['datetime'];
				$attendance_id = $_POST['attendance_id'];

				foreach ( $teachers as $key => $teacher ) {
					$attendance                 = new EmployeeAttendance();
					$attendance->id             = $attendance_id[ $key ] == "" ? null : $attendance_id[ $key ];//if id is null that means new record
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

		//Role=4 means teacher,present day
		$teachers = ( new EmployeeAttendance() )->getTeacherAttendance( 4, '2018-10-22' );

		//Data did not used in View
		$data = [
			'teachers' => $teachers,
		];
		$this->view( 'attendance/teachers/take_attendance', $data );
	}

	public function getAllTeacherAttendance() {
		$validation = new Validation();

		$validation->name( 'datetime' )->value( $_POST['datetime'] )->pattern( 'text' )->required();

		if ( $validation->isSuccess() ) {
			$role_id  = 4;
			$datetime = $_POST['datetime'];

			$result = ( new EmployeeAttendance() )->getTeacherAttendance( $role_id, $datetime );

			return jsonResult( $result );

		}

	}
}