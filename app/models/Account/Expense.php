<?php

namespace App\Models\Account;

use App\Libraries\Database;
use App\Libraries\Model;

class Expense extends Model {
	protected static $table_name = 'db_account_expenses';
	protected static $db_fields = [
		'id',
		'expense_type_id',
		'date',
		'user_id',
		'amount',
		'note'
	];

	public $db_object;

	public $id;
	public $expense_type_id;
	public $date;
	public $user_id;
	public $amount;
	public $note;

	public function __construct() {
		$this->db_object = new Database();
	}

	public function getAll() {
		$this->db_object->query( "SELECT db_account_expenses.id,
										db_account_expenses.expense_type_id,
										db_account_expense_types.expense_type_name,									  
									    db_account_expenses.date,
										db_account_expenses.user_id,
										db_account_expenses.amount,
										db_account_expenses.note,
										db_account_accountants.accountant_name
										FROM db_account_expenses
										JOIN db_account_expense_types
										ON db_account_expenses.expense_type_id=db_account_expense_types.id
										JOIN db_account_accountants
										ON db_account_expenses.user_id=db_account_accountants.id" );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getById( $id = 0 ) {
		$this->db_object->query( "SELECT db_account_expenses.id,
										db_account_expenses.expense_type_id,
										db_account_expense_types.expense_type_name,									  
										db_account_expenses.date,
										db_account_expenses.user_id,
										db_account_expenses.amount,
										db_account_expenses.note
										FROM db_account_expenses
										JOIN db_account_expense_types
										ON db_account_expenses.expense_type_id=db_account_expense_types.id
										WHERE db_account_expenses.id=:id" );
		$this->db_object->bind( ':id', $id );
		$result = $this->db_object->single();

		return $result;
	}

	public function getAccountantAndDateWiseExpense( $accountant_id, $date ) {
		$this->db_object->query( "SELECT * FROM db_account_expenses WHERE user_id=:accountant_id AND DATE=:date" );
		$this->db_object->bind( ':accountant_id', $accountant_id );
		$this->db_object->bind( ':date', $date );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getAccountantWiseExpenseDetailsByDateInterval( $accountantId, $fromDate, $toDate ) {
		$this->db_object->query( 'SELECT db_account_expenses.id,db_account_expenses.expense_type_id,db_account_expenses.date,
										db_account_expenses.user_id,db_account_expenses.amount,db_account_expenses.note,db_account_expense_types.id AS expense_type_id,db_account_expense_types.expense_type_name,db_account_expense_types.note,
										db_account_accountants.id AS accountant_id,db_account_accountants.accountant_name FROM db_account_expenses
										JOIN db_account_expense_types ON db_account_expense_types.id=db_account_expenses.expense_type_id
										JOIN db_account_accountants ON db_account_expenses.user_id=db_account_accountants.id
 										WHERE user_id=:accountant_id AND date BETWEEN :fromDate AND :toDate' );
		$this->db_object->bind( ':accountant_id', $accountantId );
		$this->db_object->bind( ':fromDate', $fromDate );
		$this->db_object->bind( ':toDate', $toDate );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getTotalExpensesOfAccountant( $accountant_id ) {
		$this->db_object->query( 'SELECT SUM(amount) AS total_amount FROM db_account_expenses WHERE user_id=:accountant_id GROUP BY user_id' );
		$this->db_object->bind( 'accountant_id', $accountant_id );
		$result = $this->db_object->single();

		return $result;
	}

	/*public function getExpenseByName( $name_of_expense ) {
		$this->db_object->query( "SELECT * FROM db_account_expenses WHERE name LIKE :name_of_expense" );
		$this->db_object->bind( ':name_of_expense', "%" . $name_of_expense . "%" );
		$result = $this->db_object->resultSet();

		return $result;
	}*/
}