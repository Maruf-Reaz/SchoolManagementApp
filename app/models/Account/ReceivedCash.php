<?php

namespace App\Models\Account;

use App\Libraries\Database;
use App\Libraries\Model;

class ReceivedCash extends Model {
	protected static $table_name = 'db_account_received_payments';
	protected static $db_fields = [
		'id',
		'payment_method_id',
		'amount',
		'discount',
		'accountant_id',
		'payment_date',
		'receive_date'
	];

	public $db_object;

	public $id;
	public $payment_method_id;
	public $amount;
	public $discount;
	public $accountant_id;
	public $payment_date;
	public $receive_date;

	public function __construct() {
		$this->db_object = new Database();
	}

	public function isPaymentReceivedAlready( $payment_method_id, $accountant_id, $payment_date ) {
		$this->db_object->query( 'SELECT * FROM db_account_received_payments WHERE payment_method_id=:payment_method_id AND accountant_id=:accountant_id AND payment_date=:payment_date' );
		$this->db_object->bind( 'payment_method_id', $payment_method_id );
		$this->db_object->bind( 'accountant_id', $accountant_id );
		$this->db_object->bind( 'payment_date', $payment_date );

		$result = $this->db_object->single();

		if ( $result != null ) {
			return true;
		} else {
			return false;
		}
	}

	//total calculation of outstanding cashes to an accountant
	public function getOutstandingCashAmountToAccountant( $accountant_id ) {

	}

	//total calculation of outstanding cheques to an accountant
	public function getOutstandingChequeAmountToAccountant( $accountant_id ) {

	}

	public function getTotalCashSubmittedAmountOfAccountant( $accountant_id ) {
		$payment_methods     = Payment_Method::GetInstance()->getAll();
		$cash_payment_method = null;
		foreach ( $payment_methods as $payment_method ) {
			$payment_method_name = $payment_method->payment_method_name;
			if ( strtolower( trim( $payment_method_name ) ) == "cash" ) {
				$cash_payment_method = $payment_method;
			}
		}

		$this->db_object->query( 'SELECT SUM(amount) AS total_amount, SUM(discount) AS total_discount
									  FROM db_account_received_payments WHERE accountant_id=:accountant_id AND payment_method_id=:payment_method_id GROUP BY accountant_id' );
		$this->db_object->bind( 'accountant_id', $accountant_id );
		$this->db_object->bind( 'payment_method_id', $cash_payment_method->id );
		$result = $this->db_object->single();

		return $result;
	}

	public function getTotalChequeSubmittedAmountOfAccountant( $accountant_id ) {
		$payment_methods       = Payment_Method::GetInstance()->getAll();
		$cheque_payment_method = null;
		foreach ( $payment_methods as $payment_method ) {
			$payment_method_name = $payment_method->payment_method_name;
			if ( strtolower( trim( $payment_method_name ) ) == "cheque" ) {
				$cheque_payment_method = $payment_method;
			}
		}

		$this->db_object->query( 'SELECT SUM(amount) AS total_amount, SUM(discount) AS total_discount
									  FROM db_account_received_payments WHERE accountant_id=:accountant_id AND payment_method_id=:payment_method_id GROUP BY accountant_id' );
		$this->db_object->bind( 'accountant_id', $accountant_id );
		$this->db_object->bind( 'payment_method_id', $cheque_payment_method->id );
		$result = $this->db_object->single();

		return $result;
	}
}