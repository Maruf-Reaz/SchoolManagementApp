<?php
/**
 * Created by PhpStorm.
 * User: Arman
 * Date: 12/20/2018
 * Time: 4:21 PM
 */

namespace App\Models\Account;

use App\Libraries\Database;
use App\Libraries\Model;

class TrialBalance extends Model {

	public $db_object;

	public function __construct() {
		$this->db_object = new Database();
	}

	public function getInvoices( $from_date, $to_date ) {
		$this->db_object->query( 'SELECT * FROM db_account_invoices WHERE date BETWEEN :from_date AND :to_date' );
		$this->db_object->bind( ':from_date', $from_date );
		$this->db_object->bind( ':to_date', $to_date );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getPayments( $from_date, $to_date ) {
		$this->db_object->query( 'SELECT * FROM db_account_payments WHERE date BETWEEN :from_date AND :to_date' );
		$this->db_object->bind( ':from_date', $from_date );
		$this->db_object->bind( ':to_date', $to_date );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getIncomes( $from_date, $to_date ) {
		$this->db_object->query( 'SELECT * FROM db_account_incomes WHERE date BETWEEN :from_date AND :to_date' );
		$this->db_object->bind( ':from_date', $from_date );
		$this->db_object->bind( ':to_date', $to_date );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getExpenses( $from_date, $to_date ) {
		$this->db_object->query( 'SELECT * FROM db_account_expenses WHERE date BETWEEN :from_date AND :to_date' );
		$this->db_object->bind( ':from_date', $from_date );
		$this->db_object->bind( ':to_date', $to_date );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getReceivedCashes( $from_date, $to_date, $payment_method_id ) {
		$this->db_object->query( 'SELECT * FROM db_account_received_payments WHERE receive_date BETWEEN :from_date AND :to_date AND payment_method_id=:payment_method_id' );
		$this->db_object->bind( ':from_date', $from_date );
		$this->db_object->bind( ':to_date', $to_date );
		$this->db_object->bind( ':payment_method_id', $payment_method_id );
		$result = $this->db_object->resultSet();

		return $result;
	}

	/*public function getBankBalanceById( $bank_id ) {
		$this->db_object->query( 'SELECT * FROM db_account_bank_wise_transactions WHERE bank_id=:bank_id ORDER BY id DESC LIMIT 1' );
		$this->db_object->bind( ':bank_id', $bank_id );
		$result = $this->db_object->single();

		return $result;
	}*/
}