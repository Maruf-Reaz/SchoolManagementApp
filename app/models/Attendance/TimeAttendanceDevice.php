<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 12/12/2018
 * Time: 11:09 PM
 */

namespace App\Models\Attendance;


use App\Libraries\Database;
use App\Libraries\Model;
use TADPHP\Providers\TADZKLib;
use TADPHP\TAD;
use TADPHP\TADFactory;

class TimeAttendanceDevice extends Model {
	protected static $table_name = 'db_attendance_devices';
	protected static $db_fields = [
		'id',
		'ip',
		'internal_id',
		'com_key',
		'device_name',
		'description',
		'soap_port',
		'udp_port',
		'encoding',
		'status',
	];

	public $id;
	public $ip;
	public $internal_id = 1;
	public $com_key = 0;
	public $device_name = '';
	public $description = 'N/A';
	public $soap_port = 80;
	public $udp_port = 4370;
	public $encoding = 'utf-8';
	public $status;
	public $options;

	//Options
	protected $db_object;

	public function __construct() {
		$this->db_object = new Database();
	}

	public function isConnected() {
		try {
			return $this->getTadInstance()->is_alive();
		} catch ( \TADPHP\Exceptions\ConnectionError $e ) {
			return false;
		}
	}

	/**
	 * @return \TADPHP\TAD|TADZKLib
	 */
	public function getTadInstance() {
		$tad = null;
		try {
			$tad_factory = new TADFactory( $this->getOptions() );
			$tad         = $tad_factory->get_instance();
		} catch ( \TADPHP\Exceptions\ConnectionError $e ) {

		}

		return $tad;
	}

	/**
	 * @return array
	 */
	public function getOptions() {

		$options = [
			'ip'          => $this->ip,   // '169.254.0.1' by default (totally useless!!!).
			'internal_id' => $this->internal_id,    // 1 by default.
			'com_key'     => $this->com_key,        // 0 by default.
			'description' => $this->description, // 'N/A' by default.
			'soap_port'   => $this->soap_port,     // 80 by default,
			'udp_port'    => $this->udp_port,      // 4370 by default.
			'encoding'    => $this->encoding  // iso8859-1 by default.
		];

		return $options;
	}

	public function setAllUserToDeviceWithFingerPrint( TAD $tad, $users ) {
		/*Setting Up All User to New Devices*/
		//get device
		//$tad = TimeAttendanceDevice::GetInstance()->getById( 1 )->getTadInstance();

		//get users
		//$users = AttendanceDeviceUser::GetInstance()->getAll();

		foreach ( $users as $user ) {
			$r = $tad->set_user_info( [
				'pin'       => $user->pin2,
				'name'      => $user->name,
				'card'      => $user->card,
				'privilege' => $user->privilege,
				'password'  => $user->password,
			] )->get_response( [ 'format' => 'json' ] );

			$user_tems = UserTemplate::GetInstance()->getByPin( $user->pin2 );

			foreach ( $user_tems as $user_tem ) {

				$tem_data = [
					'pin'       => $user->pin2,
					'finger_id' => $user_tem->finger_id, // First fingerprint has 0 as index.
					'size'      => $user_tem->size,    // Be careful, this is not string length of $template1_vx9 var.
					'valid'     => $user_tem->valid,
					'template'  => $user_tem->template,
				];

				$tad->set_user_template( $tem_data );
			}
		}
	}

	public function setAllUserToDeviceWith( TAD $tad, $users ) {
		foreach ( $users as $user ) {
			$r = $tad->set_user_info( [
				'pin'       => $user->pin2,
				'name'      => $user->name,
				'card'      => $user->card,
				'privilege' => $user->privilege,
				'password'  => $user->password,
			] )->get_response( [ 'format' => 'json' ] );

			return $r;
		}
	}

	public function setUser( TAD $tad, $user ) {
		$r = $tad->set_user_info( [
			'pin'       => $user->pin2,
			'name'      => $user->name,
			'card'      => $user->card,
			'privilege' => $user->privilege,
			'password'  => $user->password,
		] )->get_response( [ 'format' => 'json' ] );

		return $r;

	}

}