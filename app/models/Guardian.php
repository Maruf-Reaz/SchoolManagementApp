<?php

namespace App\Models;

use App\Libraries\Database;
use App\Libraries\Model;

class Guardian extends Model {
	protected static $table_name = 'db_guardian_guardians';
	protected static $db_fields = [
		'id',
		'registration_no',
		'photo',
		'guardian_name',
		'nid_number',
		'email',
		'contact_number',
		'gender',
		'blood_group',
		'occupation',
		'present_address',
		'permanent_address'
	];

	public $db_object;

	public $id;
	public $registration_no;
	public $photo;
	public $guardian_name;
	public $nid_number;
	public $email;
	public $contact_number;
	public $gender;
	public $blood_group;
	public $occupation;
	public $present_address;
	public $permanent_address;

	public function __construct() {
		$this->db_object = new Database();
	}

	public function getLastGuardianId() {
		$this->db_object->query( 'SELECT * FROM db_guardian_guardians ORDER BY id DESC LIMIT 1' );
		$result = $this->db_object->single();

		return $result;
	}
}