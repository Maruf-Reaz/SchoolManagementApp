<?php
/**
 * Created by Arman
 * Date: 9/17/2018
 * Time: 11:24 AM
 */

namespace App\Controllers\Libraries;

use App\Libraries\Controller;
use App\Models\Academic\AcademicClass;
use App\Models\Library\Member;

class Members extends Controller {

	private $member;
	private $class;

	public function __construct() {
		$this->member = new Member();
		$this->class  = new AcademicClass();
	}

	public function showMembers() {
		$members = $this->member->getAllMembers();
		$classes = $this->class->getAll();
		$data    = [
			'members' => $members,
			'classes' => $classes,
		];
		$this->view( 'libraries/members/index', $data );
	}

	public function showMember( $id = 0 ) {
		if ( $id == 0 ) {
			redirect( "libraries/members/showMembers" );
		} else {
			$member         = $this->member->getMemberByStudentId( $id );
			$data['member'] = $member;
			$this->view( 'libraries/members/show', $data );
		}
	}

	public function addMember( $id = 0 ) {
		if ( POST ) {
			$this->member->library_id  = $_POST['library_id'];
			$this->member->join_date   = strftime( '%Y/%m/%d %H:%M:%S', time() );
			$this->member->library_fee = $_POST['library_fee'];
			$this->member->student_id  = $_POST['student_id'];

			if ( $this->member->create() ) {
				redirect( 'libraries/members/showMembers' );
			}
		} else {
			$data['student_id'] = $id;
			$this->view( 'libraries/members/add', $data );
		}
	}

	public function editMember( $id = 0 ) {
		if ( POST ) {
			$member              = new Member();
			$member->id          = $_POST['id'];
			$member->library_id  = $_POST['library_id'];
			$member->join_date   = $_POST['join_date'];
			$member->library_fee = $_POST['library_fee'];
			$member->student_id  = $_POST['student_id'];
			if ( $member->update() ) {
				redirect( 'libraries/members/showMembers' );
			}
		} else {
			$member         = $this->member->getMemberByStudentId( $id );
			$data['member'] = $member;
			$this->view( 'libraries/members/edit', $data );
		}
	}

	public function deleteMember( $id ) {
		$this->member->id = $id;
		if ( $this->member->delete() ) {
			redirect( 'libraries/members/showMembers' );
		}
	}
}