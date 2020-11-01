<?php
/**
 * Created by Arman
 * Date: 9/18/2018
 * Time: 2:42 PM
 */

namespace App\Controllers\Accounts;

use App\Libraries\Controller;
use App\Models\Account\FeeType;

class FeeTypes extends Controller {

	private $fee_type;

	public function __construct() {
		$this->fee_type = new FeeType();
	}

	public function index() {
		$fee_types = $this->fee_type->getAll();
		$data      = [ 'fee_types' => $fee_types ];
		$this->view( 'accounts/fee_types/index', $data );
	}

	public function add() {
		if ( POST ) {
			$this->fee_type->fee_type_name = $_POST['fee_type_name'];
			$this->fee_type->note          = $_POST['note'];
			if ( $this->fee_type->create() ) {
				redirect( 'accounts/feetypes/index' );
			}
		} else {
			$this->view( 'accounts/fee_types/add' );
		}
	}

	public function edit( $id = 0 ) {
		if ( POST ) {
			$fee_type                = new FeeType();
			$fee_type->id            = $_POST['id'];
			$fee_type->fee_type_name = $_POST['fee_type_name'];
			$fee_type->note          = $_POST['note'];

			if ( $fee_type->update() ) {
				redirect( 'accounts/feetypes/index' );
			}
		} else {
			$fee_type         = $this->fee_type->getById( $id );
			$data['fee_type'] = $fee_type;
			$this->view( 'accounts/fee_types/edit', $data );
		}
	}

	public function delete( $id ) {
		$this->fee_type->id = $id;
		if ( $this->fee_type->delete() ) {
			redirect( 'accounts/feetypes/index' );
		}
	}
}