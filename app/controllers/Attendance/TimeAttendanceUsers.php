<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 12/15/2018
 * Time: 5:37 PM
 */

namespace App\Controllers\Attendance;


use App\Libraries\Controller;
use App\Libraries\Http\Request;
use App\Libraries\http\Response;
use App\Libraries\Validation;
use App\Models\Attendance\AttendanceDeviceUser;
use App\Models\Attendance\TimeAttendanceDevice;
use App\Models\Role;

class TimeAttendanceUsers extends Controller {

	public function addUser() {
		$att_allowed_roles = AttendanceDeviceUser::getAllowedRoles();
		$devices           = TimeAttendanceDevice::GetInstance()->getAll();
		$data              = [
			'att_allowed_roles' => $att_allowed_roles,
			'att_devices'       => $devices
		];

		$this->view( 'attendance/users/add', $data );
	}

	public function storeUser() {
		if ( POST ) {

		}
	}

	public function registerUser() {
		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'id' )->value( Request::post( 'id' ) )->pattern( 'int' )->required();
			$validation->name( 'group_id' )->value( Request::post( 'group_id' ) )->pattern( 'int' )->required();
			$validation->name( 'registration_no' )->value( Request::post( 'registration_no' ) )->pattern( 'text' )->required();
			$validation->name( 'name' )->value( Request::post( 'name' ) )->pattern( 'text' )->required();
			$validation->name( 'password' )->value( Request::post( 'password' ) )->pattern( 'text' )->required();
			$validation->name( 'card' )->value( Request::post( 'card' ) )->pattern( 'text' )->required();
			$validation->name( 'privilege' )->value( Request::post( 'privilege' ) )->pattern( 'int' )->required();

			if ( $validation->isSuccess() ) {
				$user                  = new AttendanceDeviceUser();
				$user->name            = Request::post( 'name' );
				$user->registration_no = Request::post( 'registration_no' );
				$user->designation_id  = Request::post( 'id' );
				$user->card            = Request::post( 'card' );
				$user->password        = Request::post( 'password' );
				$user->privilege       = Request::post( 'privilege' );
				$user->role            = Request::post( 'group_id' );//the group_id is role id...Role Id is risky to be written in view
				$user->pin             = $user->getLastPIN1() + 1;
				$user->pin2            = $user->getLastPIN2() + 1;
				$user->TZ1             = 0;
				$user->group_id        = 1;
				if ( $user->save() ) {
					flash( 'user_message', 'Holiday Successfuly Updated' );
					redirect( 'attendance/time-attendance-users/index' );
				} else {
					flash( 'user_message', 'Failed to Updated' );
					redirect( 'holidays/Holidays/index' );
				}
			}


		} else {
			$att_allowed_roles = AttendanceDeviceUser::getAllowedRoles();

			$privilages = [
				[ 'id' => 0, 'name' => 'Normal User' ],
				[ 'id' => 14, 'name' => 'Admin' ],
			];

			$data = [
				'att_allowed_roles' => $att_allowed_roles,
				'privilages'        => $privilages,
			];

			$this->view( 'attendance/users/register_users', $data );
		}


	}

	public function registerBulkUser() {
		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'group_id' )->value( Request::post( 'group_id' ) )->pattern( 'int' )->required();
			if ( $validation->isSuccess() ) {

			}
		}
		$att_allowed_roles = AttendanceDeviceUser::getAllowedRoles();

		$data = [
			'att_allowed_roles' => $att_allowed_roles,
		];

		$this->view( 'attendance/users/register_bulk_users', $data );
	}

	public function editUser() {
		$validation = new Validation();
		$validation->name( 'reg_no' )->value( Request::get( 'reg_no' ) )->pattern( 'text' )->required();

		if ( $validation->isSuccess() ) {
			$reg_no = Request::get( 'reg_no' );
			if ( $reg_no != "" && AttendanceDeviceUser::GetInstance()->isExist( 'registration_no', $reg_no ) ) {

				$user = AttendanceDeviceUser::GetInstance()->getByField( 'registration_no', $reg_no );
				$data = [
					'user' => $user
				];
				$this->view( 'attendance/users/edit', $data );
			} else {
				redirect( 'attendance/time-attendance-users/index' );
			}
		} else {
			redirect( 'attendance/time-attendance-users/index' );
		}

	}

	public function updateUser() {
		$validation = new Validation();
		$validation->name( 'registration_no' )->value( Request::post( 'registration_no' ) )->pattern( 'text' )->required();
		$validation->name( 'name' )->value( Request::post( 'name' ) )->pattern( 'text' )->required();
		$validation->name( 'card' )->value( Request::post( 'card' ) )->pattern( 'text' )->required();
		if ( $validation->isSuccess() ) {
			$reg_no = Request::post( 'registration_no' );
			if ( $reg_no != "" && AttendanceDeviceUser::GetInstance()->isExist( 'registration_no', $reg_no ) ) {

				$user = AttendanceDeviceUser::GetInstance()->getByField( 'registration_no', $reg_no );
				if ( $user ) {
					$user->name = Request::post( 'name' );
					$user->card = Request::post( 'card' );
					if ( $user->save() ) {
						flash( 'user_message', 'Successfuly Updated' );
						redirect( 'attendance/time-attendance-users/index' );
					} else {
						flash( 'user_message', 'Failed to Updated' );
						redirect( 'holidays/Holidays/index' );
					}
				}
			} else {
				redirect( 'attendance/time-attendance-users/index' );
			}
		} else {
			redirect( 'attendance/time-attendance-users/index' );
		}
	}

	public function setUpDevice() {

	}

	public function index() {
		$this->view( 'attendance/users/index' );
	}

	public function getUserByRegNo() {
		//Security Confusion -here typeId is role_id
		$validation = new Validation();
		$validation->name( 'type_id' )->value( Request::post( 'type_id' ) )->pattern( 'int' )->required();
		$validation->name( 'registration_no' )->value( Request::post( 'registration_no' ) )->pattern( 'text' )->required();
		if ( $validation->isSuccess() ) {

			$user = Role::GetInstance()->getByGroupIdAndRegNo( Request::post( 'type_id' ), Request::post( 'registration_no' ) );

			//if id is null that means new record
			if ( $user ) {
				//check if it is already registered
				$user = array_pop( $user );
				if ( AttendanceDeviceUser::GetInstance()->isExist( 'registration_no', Request::post( 'registration_no' ) ) ) {
					$user->already_exists = true;
				} else {
					$user->already_exists = false;
				}

				return Response::json( $user );
			} else {
				return Response::json( false );
			}

		}
	}

	public function getRegisteredUserByRegNo() {
		$validation = new Validation();
		$validation->name( 'registration_no' )->value( Request::post( 'registration_no' ) )->pattern( 'text' )->required();
		if ( $validation->isSuccess() ) {

			$user = AttendanceDeviceUser::GetInstance()->getByField( 'registration_no', Request::post( 'registration_no' ) );

			//if id is null that means new record
			if ( $user ) {
				return Response::json( $user );
			} else {
				return Response::json( false );
			}

		}
	}

	public function getAllByGroupId() {
		$validation = new Validation();
		$validation->name( 'group_id' )->value( Request::post( 'group_id' ) )->pattern( 'text' )->required();

		if ( $validation->isSuccess() ) {
			$group_id = Request::post( 'group_id' );
			if ( $group_id != "" && Role::GetInstance()->isExist( 'id', $group_id ) ) {

				$user       = Role::GetInstance()->getAllByGroupId( $group_id );
				$is_student = Role::getRoleById( $group_id ) == 'Student' ? true : false;
				$data       = [
					'is_student' => $is_student,
					'user'       => $user
				];

				return Response::json( $data );
			} else {
				return Response::json( false );
			}
		} else {
			return Response::json( false );
		}
	}
	public function getAllStudentsBy() {
		$validation = new Validation();
		$validation->name( 'group_id' )->value( Request::post( 'group_id' ) )->pattern( 'text' )->required();

		if ( $validation->isSuccess() ) {
			$group_id = Request::post( 'group_id' );
			if ( $group_id != "" && Role::GetInstance()->isExist( 'id', $group_id ) ) {

				$user       = Role::GetInstance()->getAllByGroupId( $group_id );
				$is_student = Role::getRoleById( $group_id ) == 'Student' ? true : false;
				$data       = [
					'is_student' => $is_student,
					'user'       => $user
				];

				return Response::json( false );
			} else {
				return Response::json( false );
			}
		} else {
			return Response::json( false );
		}
	}
}