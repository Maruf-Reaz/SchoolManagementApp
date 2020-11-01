<?php

namespace App\Models\Library;

use App\Libraries\Database;
use App\Libraries\Model;

class Book extends Model {
	protected static $table_name = 'db_library_books';
	protected static $db_fields = [
		'id',
		'name',
		'author',
		'subject_code',
		'price',
		'quantity',
		'rack_number',
		'status'
	];

	public $db_object;

	public $id;
	public $name;
	public $author;
	public $subject_code;
	public $price;
	public $quantity;
	public $rack_number;
	public $status;

	public function __construct() {
		$this->db_object = new Database();
	}

	public function getBooksByBookId( $book_id ) {
		$this->db_object->query( 'SELECT * FROM db_library_books_and_members_view WHERE book_id=:book_id' );
		$this->db_object->bind( ':book_id', $book_id );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getBooksByRackNumber( $rack_number ) {
		$this->db_object->query( 'SELECT * FROM db_library_books WHERE rack_number=:rack_number' );
		$this->db_object->bind( ':rack_number', $rack_number );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getBookByName( $name_of_book ) {
		$this->db_object->query( "SELECT * FROM db_library_books WHERE name LIKE :name_of_book" );
		$this->db_object->bind( ':name_of_book', "%" . $name_of_book . "%" );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function increaseQuantity( $book_id ) {
		$this->db_object->query( 'UPDATE db_library_books SET quantity = quantity - 1 WHERE id=:book_id' );
		$this->db_object->bind( ':book_id', $book_id );
		$this->db_object->execute();
	}

	public function decreaseQuantity( $book_id ) {
		$this->db_object->query( 'UPDATE db_library_books SET quantity = quantity + 1 WHERE id=:book_id' );
		$this->db_object->bind( ':book_id', $book_id );
		$this->db_object->execute();
	}
}

?>