<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 12/14/2018
 * Time: 1:18 AM
 */

namespace App\Controllers\Attendance;


use App\Libraries\Controller;
use App\Libraries\Http\Request;
use App\Libraries\http\Response;
use App\Libraries\Validation;
use App\Models\Attendance\TimeAttendanceDevice;

class TimeAttendanceDevices extends Controller {
	public function add() {
		$this->view( 'attendance/device/add' );
	}

	public function store() {
		$validation = new Validation();

		$validation->name( 'ip' )->value( Request::post( 'ip' ) )->pattern( 'text' )->required();
		$validation->name( 'internal_id' )->value( Request::post( 'internal_id' ) )->pattern( 'int' )->required();
		$validation->name( 'com_key' )->value( Request::post( 'com_key' ) )->pattern( 'int' )->required();
		$validation->name( 'device_name' )->value( Request::post( 'device_name' ) )->pattern( 'text' )->required();
		$validation->name( 'description' )->value( Request::post( 'description' ) )->pattern( 'text' )->required();
		$validation->name( 'soap_port' )->value( Request::post( 'soap_port' ) )->pattern( 'int' )->required();
		$validation->name( 'udp_port' )->value( Request::post( 'udp_port' ) )->pattern( 'int' )->required();
		$validation->name( 'status' )->value( Request::post( 'status' ) )->pattern( 'int' )->required();
		$validation->name( 'encoding' )->value( Request::post( 'encoding' ) )->pattern( 'text' )->required();

		if ( $validation->isSuccess() ) {

			$device = new TimeAttendanceDevice();
			//if id is null that means new record
			$device->ip          = Request::post( 'ip' );
			$device->internal_id = Request::post( 'internal_id' );
			$device->com_key     = Request::post( 'com_key' );
			$device->device_name = Request::post( 'device_name' );
			$device->description = Request::post( 'description' );
			$device->soap_port   = Request::post( 'soap_port' );
			$device->udp_port    = Request::post( 'udp_port' );
			$device->status      = Request::post( 'status' );
			$device->encoding    = Request::post( 'encoding' );

			if ( $device->save() ) {
				flash( 'attendance_device', 'Attendance Device Added' );
				redirect( 'attendance/time-attendance-devices/index' );
			} else {
				flash( 'attendance_device', 'Attendance Device Could not Added', 'alert alert-danger' );
				redirect( 'attendance/time-attendance-devices/index' );
			}

		}
	}

	public function edit( $id = 0 ) {
		$validation = new Validation();

		$validation->name( 'id' )->value( $id )->pattern( 'int' )->required();

		if ( $validation->isSuccess() ) {
			if ( TimeAttendanceDevice::GetInstance()->isExist( 'id', $id ) ) {
				$device = TimeAttendanceDevice::GetInstance()->getById( $id );
				$data   = [
					'device' => $device
				];
				$this->view( 'attendance/device/edit', $data );
			}
		} else {
			redirect( '' );
		}

	}

	public function update() {
		$validation = new Validation();
		$validation->name( 'id' )->value( Request::post( 'id' ) )->pattern( 'int' )->required();
		$validation->name( 'ip' )->value( Request::post( 'ip' ) )->pattern( 'text' )->required();
		$validation->name( 'internal_id' )->value( Request::post( 'internal_id' ) )->pattern( 'int' )->required();
		$validation->name( 'com_key' )->value( Request::post( 'com_key' ) )->pattern( 'int' )->required();
		$validation->name( 'device_name' )->value( Request::post( 'device_name' ) )->pattern( 'text' )->required();
		$validation->name( 'description' )->value( Request::post( 'description' ) )->pattern( 'text' )->required();
		$validation->name( 'soap_port' )->value( Request::post( 'soap_port' ) )->pattern( 'int' )->required();
		$validation->name( 'udp_port' )->value( Request::post( 'udp_port' ) )->pattern( 'int' )->required();
		$validation->name( 'status' )->value( Request::post( 'status' ) )->pattern( 'int' )->required();
		$validation->name( 'encoding' )->value( Request::post( 'encoding' ) )->pattern( 'text' )->required();

		if ( $validation->isSuccess() ) {

			$device = new TimeAttendanceDevice();
			//if id is null that means new record
			$device->id          = Request::post( 'id' );
			$device->ip          = Request::post( 'ip' );
			$device->internal_id = Request::post( 'internal_id' );
			$device->com_key     = Request::post( 'com_key' );
			$device->device_name = Request::post( 'device_name' );
			$device->description = Request::post( 'description' );
			$device->soap_port   = Request::post( 'soap_port' );
			$device->udp_port    = Request::post( 'udp_port' );
			$device->status      = Request::post( 'status' );
			$device->encoding    = Request::post( 'encoding' );

			if ( $device->save() ) {
				flash( 'attendance_device', 'Attendance Device Updated' );
				redirect( 'attendance/time-attendance-devices/index' );
			} else {
				flash( 'attendance_device', 'Attendance Device update Failed', 'alert alert-danger' );
				redirect( 'attendance/time-attendance-devices/index' );
			}

		}
	}


	public function index() {
		$devices = TimeAttendanceDevice::GetInstance()->getAll();

		$data = [
			'devices' => $devices
		];

		$this->view( 'attendance/device/index', $data );
	}

	public function testConnection() {

		$validation = new Validation();
		$validation->name( 'ip' )->value( Request::post( 'ip' ) )->pattern( 'text' )->required();
		$validation->name( 'internal_id' )->value( Request::post( 'internal_id' ) )->pattern( 'int' )->required();
		$validation->name( 'com_key' )->value( Request::post( 'com_key' ) )->pattern( 'int' )->required();
		$validation->name( 'device_name' )->value( Request::post( 'device_name' ) )->pattern( 'text' );
		$validation->name( 'description' )->value( Request::post( 'description' ) )->pattern( 'text' )->required();
		$validation->name( 'soap_port' )->value( Request::post( 'soap_port' ) )->pattern( 'int' )->required();
		$validation->name( 'udp_port' )->value( Request::post( 'udp_port' ) )->pattern( 'int' )->required();
		$validation->name( 'status' )->value( Request::post( 'status' ) )->pattern( 'int' )->required();
		$validation->name( 'encoding' )->value( Request::post( 'encoding' ) )->pattern( 'text' )->required();

		if ( $validation->isSuccess() ) {

			$device = new TimeAttendanceDevice();
			//if id is null that means new record
			$device->ip          = Request::post( 'ip' );
			$device->internal_id = Request::post( 'internal_id' );
			$device->com_key     = Request::post( 'com_key' );
			$device->device_name = Request::post( 'device_name' );
			$device->description = Request::post( 'description' );
			$device->soap_port   = Request::post( 'soap_port' );
			$device->udp_port    = Request::post( 'udp_port' );
			$device->status      = Request::post( 'status' );
			$device->encoding    = Request::post( 'encoding' );
			$tad                 = $device->getTadInstance();
			if ( $tad->is_alive() ) {
				return Response::json( true );
			} else {
				return Response::json( false );
			}

		}

	}

	public function testConnectionByDevice() {

		$validation = new Validation();
		$validation->name( 'id' )->value( Request::post( 'id' ) )->pattern( 'int' )->required();
		if ( $validation->isSuccess() ) {

			$device = TimeAttendanceDevice::GetInstance()->getById( Request::post( 'id' ) );
			//if id is null that means new record

			$tad = $device->getTadInstance();
			if ( $tad->is_alive() ) {
				return Response::json( true );
			} else {
				return Response::json( false );
			}

		}

	}

	public function viewStatus() {
		//Get All Attendance Devices
		$devices = TimeAttendanceDevice::GetInstance()->getAll();
		foreach ( $devices as $device ) {
			//Dynamic Property
			$device->conn_status = $device->isConnected();
		}
		//Check for Connection

		$data = [
			'devices' => $devices
		];
		$this->view( 'attendance/device/view_status', $data );

	}
}