<?php

namespace App\Models\Library;

use App\Libraries\Database;
use App\Libraries\Model;

class Member extends Model {

	protected static $table_name = 'db_library_members';
	protected static $db_fields = [ 'id', 'library_id', 'join_date', 'library_fee', 'student_id' ];

	public $db_object;

	public $id;
	public $library_id;
	public $join_date;
	public $library_fee;
	public $student_id;

	public function __construct() {
		$this->db_object = new Database();
	}

	public function getAllMembers() {
		$this->db_object->query( 'SELECT * FROM db_library_members_view' );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getMemberByStudentId( $student_id ) {
		$this->db_object->query( 'SELECT * FROM db_library_members_view WHERE student_id=:student_id' );
		$this->db_object->bind( ':student_id', $student_id );
		$result = $this->db_object->single();

		return $result;

	}

	public function getMemberByLibraryId( $library_id ) {
		$this->db_object->query( 'SELECT * FROM db_library_members WHERE library_id=:library_id' );
		$this->db_object->bind( 'library_id', $library_id );
		$result = $this->db_object->resultSet();

		return $result;
	}
}