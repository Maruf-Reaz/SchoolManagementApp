<?php

namespace App\Models\Library;

use App\Libraries\Database;
use App\Libraries\Model;

class BookAndMember extends Model {
	protected static $table_name = 'db_library_books_and_members';
	protected static $db_fields = [
		'id',
		'issue_date',
		'return_date',
		'serial_number',
		'note',
		'status',
		'book_id',
		'library_id'
	];

	public $db_object;

	public $id;
	public $issue_date;
	public $return_date;
	public $serial_number;
	public $note;
	public $status;
	public $book_id;
	public $library_id;

	public function __construct() {
		$this->db_object = new Database();
	}

	public function getBooksAndMembersInfoByLibraryID( $library_id ) {
		$this->db_object->query( 'SELECT * FROM db_library_books_and_members_view WHERE library_id=:library_id' );
		$this->db_object->bind( 'library_id', $library_id );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getBooksAndMemberInfoByLibraryAndBookID( $library_id, $book_id ) {
		$this->db_object->query( 'SELECT * FROM db_library_books_and_members_view WHERE library_id=:library_id AND book_id=:book_id' );
		$this->db_object->bind( 'library_id', $library_id );
		$this->db_object->bind( 'book_id', $book_id );
		$result = $this->db_object->single();

		return $result;
	}

	public function getMembersByClass( $class_numeric_value ) {
		$this->db_object->query( 'SELECT * FROM db_library_members_view WHERE class_numeric_value=:class_numeric_value' );
		$this->db_object->bind( 'class_numeric_value', $class_numeric_value );
		$result = $this->db_object->resultSet();

		return $result;
	}
}
