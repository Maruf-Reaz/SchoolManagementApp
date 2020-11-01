<?php

namespace App\Models\Account;

use App\Libraries\Database;
use App\Libraries\Model;

class Income extends Model {
	protected static $table_name = 'db_account_incomes';
	protected static $db_fields = [
		'id',
		'income_type_id',
		'date',
		'receiver_id',
		'amount',
		'note'
	];

	public $db_object;

	public $id;
	public $income_type_id;
	public $date;
	public $receiver_id;
	public $amount;
	public $note;

	public function __construct() {
		$this->db_object = new Database();
	}

	public function getAll() {
		$this->db_object->query( "SELECT db_account_incomes.id,
										db_account_incomes.income_type_id,
										db_account_income_types.income_type_name,									  
									    db_account_incomes.date,
										db_account_incomes.receiver_id,
										db_account_incomes.amount,
										db_account_incomes.note,
										db_account_accountants.accountant_name
										FROM db_account_incomes
										JOIN db_account_income_types
										ON db_account_incomes.income_type_id=db_account_income_types.id
										JOIN db_account_accountants
										ON db_account_incomes.receiver_id=db_account_accountants.id" );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getById( $id = 0 ) {
		$this->db_object->query( "SELECT db_account_incomes.id,
										db_account_incomes.income_type_id,
										db_account_income_types.income_type_name,									  
										db_account_incomes.date,
										db_account_incomes.receiver_id,
										db_account_incomes.amount,
										db_account_incomes.note
										FROM db_account_incomes
										JOIN db_account_income_types
										ON db_account_incomes.income_type_id=db_account_income_types.id
										WHERE db_account_incomes.id=:id" );
		$this->db_object->bind( ':id', $id );
		$result = $this->db_object->single();

		return $result;
	}

	public function getAccountantAndDateWiseIncome( $accountant_id, $date ) {
		$this->db_object->query( "SELECT * FROM db_account_incomes WHERE receiver_id=:accountant_id AND DATE=:date" );
		$this->db_object->bind( ':accountant_id', $accountant_id );
		$this->db_object->bind( ':date', $date );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getAccountantWiseIncomeDetailsByDateInterval( $accountantId, $fromDate, $toDate ) {
		$this->db_object->query( 'SELECT db_account_incomes.id,db_account_incomes.income_type_id,db_account_incomes.date,db_account_incomes.receiver_id,db_account_incomes.amount,
										db_account_incomes.note,db_account_income_types.id AS income_type_id,db_account_income_types.income_type_name,db_account_income_types.note,db_account_accountants.id AS accountant_id,db_account_accountants.accountant_name FROM db_account_incomes
										JOIN db_account_income_types ON db_account_income_types.id=db_account_incomes.income_type_id
										JOIN db_account_accountants ON db_account_incomes.receiver_id=db_account_accountants.id
 										WHERE receiver_id=:accountant_id AND date BETWEEN :fromDate AND :toDate' );
		$this->db_object->bind( ':accountant_id', $accountantId );
		$this->db_object->bind( ':fromDate', $fromDate );
		$this->db_object->bind( ':toDate', $toDate );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getTotalIncomesOfAccountant( $accountant_id ) {
		$this->db_object->query( 'SELECT SUM(amount) AS total_amount FROM db_account_incomes WHERE receiver_id=:accountant_id GROUP BY receiver_id' );
		$this->db_object->bind( 'accountant_id', $accountant_id );
		$result = $this->db_object->single();

		return $result;
	}

	/*public function getIncomeByName( $name_of_income ) {
		$this->db_object->query( "SELECT * FROM db_account_incomes WHERE name LIKE :name_of_income" );
		$this->db_object->bind( ':name_of_income', "%" . $name_of_income . "%" );
		$result = $this->db_object->resultSet();

		return $result;
	}*/
}