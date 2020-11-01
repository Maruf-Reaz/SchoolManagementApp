<?php
/**
 * Created by Arman
 * Date: 9/17/2018
 * Time: 11:24 AM
 */

namespace App\Controllers\Libraries;

use App\Libraries\Controller;
use App\Models\Library\Book;
use App\Models\Library\BookAndMember;
use App\Models\Library\Member;

class IssueBooks extends Controller {
	private $book_and_member;
	private $book;
	private $member;

	public function __construct() {
		$this->book_and_member = new BookAndMember();
		$this->book            = new Book();
		$this->member          = new Member();
	}

	public function index() {
		if ( isset( $_GET['library_id'] ) ) {
			$books_and_members = $this->book_and_member->getBooksAndMembersInfoByLibraryID( $_GET['library_id'] );
			$data              = [
				'books_and_members' => $books_and_members
			];
		} else {
			$data = [];
		}
		$this->view( 'libraries/issue_books/index', $data );
	}

	public function showFullMemberInfo( $library_id = 0 ) {
		$book_id = $_GET['book_id'];
		if ( $library_id == 0 || $book_id == 0 ) {
			redirect( 'libraries/issuebooks/index' );
		} else {
			$book_and_member          = $this->book_and_member->getBooksAndMemberInfoByLibraryAndBookID( $library_id, $book_id );
			$data ['book_and_member'] = $book_and_member;
			$this->view( 'libraries/issue_books/show', $data );
		}
	}

	public function showMembersByClass() {
		$members = $this->book_and_member->getMembersByClass( $_POST['class_numeric_value'] );

		return jsonResult( $members );
	}

	public function addIssue() {
		if ( POST ) {
			$member = $this->member->getMemberByLibraryId( $_POST['library_id'] );
			if ( $member == null ) {
				die( 'Book Can Not Be Issued To A Non Library Member' );
			} elseif ( $_POST['book_id'] == 0 ) {
				die( 'Please Select A Book' );
			} else {
				$this->book_and_member->issue_date    = strftime( '%Y/%m/%d %H:%M:%S', time() );
				$this->book_and_member->return_date   = $_POST['due_date'];
				$this->book_and_member->serial_number = $_POST['serial_number'];
				$this->book_and_member->note          = $_POST['note'];
				$this->book_and_member->status        = "good";
				$this->book_and_member->book_id       = $_POST['book_id'];
				$this->book_and_member->library_id    = $_POST['library_id'];

				if ( $this->book_and_member->create() ) {
					$book_id = $_POST['book_id'];
					$this->book->increaseQuantity( $book_id );
					redirect( 'libraries/issuebooks/index' );
				}
			}
		} else {
			$books        = $this->book->getAll();
			$rack_numbers = array();
			foreach ( $books as $book ) {
				if ( ! in_array( "$book->rack_number", $rack_numbers ) ) {
					array_push( $rack_numbers, "$book->rack_number" );
				}
			}
			$data = [
				'books'        => $books,
				'rack_numbers' => $rack_numbers
			];
			$this->view( 'libraries/issue_books/add', $data );
		}
	}

	public function getBooksByRackNumber() {
		$books = $this->book->getBooksByRackNumber( $_POST['rack_number'] );

		return jsonResult( $books );
	}

	public function getBookByID() {
		$book = $this->book->getById( $_POST['book_id'] );

		return jsonResult( $book );
	}

	public function editIssue( $library_id = 0 ) {
		if ( POST ) {
			$book_and_member                = new BookAndMember();
			$book_and_member->id            = $_POST['id'];
			$book_and_member->issue_date    = $_POST['issue_date'];
			$book_and_member->return_date   = $_POST['due_date'];
			$book_and_member->serial_number = $_POST['serial_number'];
			$book_and_member->note          = $_POST['note'];
			$book_and_member->status        = $_POST['status'];
			$book_and_member->book_id       = $_POST['book_id'];
			$book_and_member->library_id    = $_POST['library_id'];
			if ( $book_and_member->update() ) {
				redirect( 'libraries/issuebooks/index' );
			}
		} else {
			$book_id                 = $_GET['book_id'];
			$book_and_member         = $this->book_and_member->getBooksAndMemberInfoByLibraryAndBookID( $library_id, $book_id );
			$data['book_and_member'] = $book_and_member;
			$this->view( 'libraries/issue_books/edit', $data );
		}
	}

	public function deleteIssue( $id ) {
		$this->book_and_member->id = $id;
		if ( $this->book_and_member->delete() ) {
			$this->book->decreaseQuantity( $_GET['book_id'] );
			redirect( 'libraries/issuebooks/index' );
		}
	}
}