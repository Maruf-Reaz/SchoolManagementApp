<?php

namespace App\Controllers\Accounts;

use App\Libraries\Controller;
use App\Models\Account\Income;
use App\Models\Account\IncomeType;

class Incomes extends Controller {
	private $income;

	public function __construct() {
		$this->income = new Income();
	}

	public function index() {
		$incomes = $this->income->getAll();
		$data    = [ 'incomes' => $incomes, ];
		$this->view( 'accounts/incomes/index', $data );
	}

	public function add() {
		if ( POST ) {
			$this->income->income_type_id = $_POST['income_type_id'];
			$this->income->date           = $_POST['date'];
			$this->income->receiver_id    = 10;
			$this->income->amount         = $_POST['amount'];
			$this->income->note           = $_POST['note'];
			if ( $this->income->create() ) {
				redirect( 'accounts/incomes/index' );
			}
		} else {
			$income_types = IncomeType::GetInstance()->getAll();
			$data         = [ 'income_types' => $income_types ];
			$this->view( 'accounts/incomes/add', $data );
		}
	}

	public function edit( $id = 0 ) {
		if ( POST ) {
			$income                 = new Income();
			$income->id             = $_POST['id'];
			$income->income_type_id = $_POST['income_type_id'];
			$income->date           = $_POST['date'];
			$income->receiver_id    = $_POST['receiver_id'];
			$income->amount         = $_POST['amount'];
			$income->note           = $_POST['note'];
			if ( $income->update() ) {
				redirect( 'accounts/incomes/index' );
			}
		} else {
			if ( $id == 0 ) {
				redirect( 'accounts/incomes/index' );
			} else {
				$income       = $this->income->getById( $id );
				$income_types = IncomeType::GetInstance()->getAll();
				$data         = [
					'income'       => $income,
					'income_types' => $income_types
				];
				$this->view( 'accounts/incomes/edit', $data );
			}
		}
	}

	public function delete( $id ) {
		$this->income->id = $id;
		if ( $this->income->delete() ) {
			redirect( 'accounts/incomes/index' );
		}
	}

	/*public function showIncomeByName() {
		$name_of_income = $_POST['name_of_income'];
		$incomes        = $this->income->getIncomeByName( $name_of_income );

		return jsonResult( $incomes );
	}*/
}