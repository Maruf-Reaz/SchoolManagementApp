<?php
/**
 * Created by PhpStorm.
 * User: Arman
 * Date: 12/6/2018
 * Time: 1:35 PM
 */

namespace App\Controllers\Accounts;

use App\Libraries\Controller;
use App\Models\Account\IncomeType;

class IncomeTypes extends Controller {

	private $income_type;

	public function __construct() {
		$this->income_type = new IncomeType();
	}

	public function index() {
		$income_types = $this->income_type->getAll();
		$data         = [ 'income_types' => $income_types ];
		$this->view( 'accounts/income_types/index', $data );
	}

	public function add() {
		if ( POST ) {
			$this->income_type->income_type_name = $_POST['income_type_name'];
			$this->income_type->note             = $_POST['note'];
			if ( $this->income_type->create() ) {
				redirect( 'accounts/IncomeTypes/index' );
			}
		} else {
			$this->view( 'accounts/income_types/add' );
		}
	}

	public function edit( $id = 0 ) {
		if ( POST ) {
			$income_type                   = new IncomeType();
			$income_type->id               = $_POST['id'];
			$income_type->income_type_name = $_POST['income_type_name'];
			$income_type->note             = $_POST['note'];

			if ( $income_type->update() ) {
				redirect( 'accounts/IncomeTypes/index' );
			}
		} else {
			$income_type         = $this->income_type->getById( $id );
			$data['income_type'] = $income_type;
			$this->view( 'accounts/income_types/edit', $data );
		}
	}

	public function delete( $id ) {
		$this->income_type->id = $id;
		if ( $this->income_type->delete() ) {
			redirect( 'accounts/IncomeTypes/index' );
		}
	}
}