<?php

namespace App\Controllers\Accounts;

use App\Libraries\Controller;
use App\Libraries\Http\Request;
use App\Models\Academic\AcademicClass;
use App\Models\Account\Fee;
use App\Models\Account\FeeType;

class Fees extends Controller {

	private $fee;

	public function __construct() {
		$this->fee = new Fee();
	}

	public function index() {
		$fees = $this->fee->getAllFees();
		$data = [ 'fees' => $fees ];
		$this->view( 'accounts/fees/index', $data );
	}

	public function doesFeeExist() {
		$class_id    = Request::post( 'class_id' );
		$fee_type_id = Request::post( 'fee_type_id' );
		$flag        = $this->fee->doesFeeExist( $class_id, $fee_type_id );

		return jsonResult( $flag );
	}

	public function add() {
		if ( POST ) {
			if ( Request::post( 'class_id' ) == "" ) {
				redirect( 'accounts/fees/index' );
			} else {
				if ( Request::post( 'fee_type_id' ) == "" ) {
					redirect( 'accounts/fees/index' );
				} else {
					if ( $this->fee->doesFeeExist( Request::post( 'class_id' ), Request::post( 'fee_type_id' ) ) ) {
						die( 'This type of fee already added for the class' );
					} else {
						$this->fee->class_id    = $_POST['class_id'];
						$this->fee->fee_type_id = $_POST['fee_type_id'];
						$this->fee->fee_amount  = $_POST['fee_amount'];
						if ( $this->fee->create() ) {
							redirect( 'accounts/fees/index' );
						}
					}
				}
			}
		} else {
			$classes   = ( new AcademicClass() )->getAll();
			$fee_types = ( new FeeType() )->getAll();
			$data      = [
				'classes'   => $classes,
				'fee_types' => $fee_types,
			];
			$this->view( 'accounts/fees/add', $data );
		}
	}

	public function edit( $id = 0 ) {
		if ( POST ) {
			$fee              = new Fee();
			$fee->id          = $_POST['fee_id'];
			$fee->class_id    = $_POST['class_id'];
			$fee->fee_type_id = $_POST['fee_type_id'];
			$fee->fee_amount  = $_POST['fee_amount'];

			if ( $fee->update() ) {
				redirect( 'accounts/fees/index' );
			}
		} else {
			$fee         = $this->fee->getFeeById( $id );
			$data['fee'] = $fee;
			$this->view( 'accounts/fees/edit', $data );
		}
	}

	public function delete( $id ) {
		$this->fee->id = $id;
		if ( $this->fee->delete() ) {
			redirect( 'accounts/fees/index' );
		}
	}
}