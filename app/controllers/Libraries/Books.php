<?php
/**
 * Created by Arman
 * Date: 9/17/2018
 * Time: 11:23 AM
 */

namespace App\Controllers\Libraries;

use App\Libraries\Controller;
use App\Models\Library\Book;

class Books extends Controller {

	private $book;

	public function __construct() {
		$this->book = new Book();
	}

	public function index() {
		$books = $this->book->getAll();
		$data  = [ 'books' => $books ];

		$this->view( 'libraries/books/index', $data );
	}

	public function add() {
		if ( POST ) {
			$this->book->name         = $_POST['name'];
			$this->book->author       = $_POST['author'];
			$this->book->subject_code = $_POST['subject_code'];
			$this->book->price        = $_POST['price'];
			$this->book->quantity     = $_POST['quantity'];
			$this->book->rack_number  = $_POST['rack_number'];
			$this->book->status       = 'available';

			if ( $this->book->create() ) {
				redirect( 'libraries/index' );
			}
		} else {
			$this->view( 'libraries/books/add' );
		}
	}

	public function showIssues( $book_id = 0 ) {
		$book   = $this->book->getById( $book_id );
		$issues = $this->book->getBooksByBookId( $book_id );
		$data   = [
			'book'   => $book,
			'issues' => $issues
		];
		$this->view( 'libraries/books/show_issues', $data );
	}

	public function edit( $id = 0 ) {
		if ( POST ) {
			$book               = new Book();
			$book->id           = $_POST['id'];
			$book->name         = $_POST['name'];
			$book->author       = $_POST['author'];
			$book->subject_code = $_POST['subject_code'];
			$book->price        = $_POST['price'];
			$book->quantity     = $_POST['quantity'];
			$book->rack_number  = $_POST['rack_number'];
			$book->status       = $_POST['status'];

			if ( $book->update() ) {
				redirect( 'libraries/index' );
			}
		} else {
			$book         = $this->book->getById( $id );
			$data['book'] = $book;
			$this->view( 'libraries/books/edit', $data );
		}
	}

	public function delete( $id ) {
		$this->book->id = $id;
		if ( $this->book->delete() ) {
			redirect( 'libraries/index' );
		}
	}

	public function showBookByName() {
		$name_of_book = $_POST['name_of_book'];
		$books        = $this->book->getBookByName( $name_of_book );

		return jsonResult( $books );
	}
}