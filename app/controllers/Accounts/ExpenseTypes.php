<?php
/**
 * Created by PhpStorm.
 * User: Arman
 * Date: 11/22/2018
 * Time: 1:57 PM
 */

namespace App\Controllers\Accounts;

use App\Libraries\Controller;
use App\Models\Account\ExpenseType;

class ExpenseTypes extends Controller {

	private $expense_type;

	public function __construct() {
		$this->expense_type = new ExpenseType();
	}

	public function index() {
		$expense_types = $this->expense_type->getAll();
		$data          = [ 'expense_types' => $expense_types ];
		$this->view( 'accounts/expense_types/index', $data );
	}

	public function add() {
		if ( POST ) {
			$this->expense_type->expense_type_name = $_POST['expense_type_name'];
			$this->expense_type->note              = $_POST['note'];
			if ( $this->expense_type->create() ) {
				redirect( 'accounts/ExpenseTypes/index' );
			}
		} else {
			$this->view( 'accounts/expense_types/add' );
		}
	}

	public function edit( $id = 0 ) {
		if ( POST ) {
			$expense_type                    = new ExpenseType();
			$expense_type->id                = $_POST['id'];
			$expense_type->expense_type_name = $_POST['expense_type_name'];
			$expense_type->note              = $_POST['note'];

			if ( $expense_type->update() ) {
				redirect( 'accounts/ExpenseTypes/index' );
			}
		} else {
			$expense_type         = $this->expense_type->getById( $id );
			$data['expense_type'] = $expense_type;
			$this->view( 'accounts/expense_types/edit', $data );
		}
	}

	public function delete( $id ) {
		$this->expense_type->id = $id;
		if ( $this->expense_type->delete() ) {
			redirect( 'accounts/ExpenseTypes/index' );
		}
	}
}