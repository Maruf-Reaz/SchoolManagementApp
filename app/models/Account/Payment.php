<?php

namespace App\Models\Account;

use App\Libraries\Database;
use App\Libraries\Model;

class Payment extends Model {
	protected static $table_name = 'db_account_payments';
	protected static $db_fields = [
		'id',
		'student_id',
		'paid_amount',
		'discount',
		'payment_method_id',
		'bank_id',
		'receiver_id',
		'date'
	];

	public $db_object;

	public $id;
	public $student_id;
	public $paid_amount;
	public $discount;
	public $payment_method_id;
	public $bank_id;
	public $receiver_id;
	public $date;

	public function __construct() {
		$this->db_object = new Database();
	}


	public function getAllPayments() {
		$this->db_object->query( 'SELECT * FROM db_account_payments_view' );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getPaymentDetailsByDateInterval( $studentId, $fromDate, $toDate ) {
		$this->db_object->query( 'SELECT db_account_payments_view.id,db_account_payments_view.student_id,db_account_payments_view.paid_amount,db_account_payments_view.discount,
									  db_account_payments_view.receiver_id,db_account_payments_view.date,db_account_payments_view.payment_method_id,db_account_payments_view.payment_method_name,
									  db_account_payments_view.student_name,db_account_payments_view.class_name,db_account_payments_view.section_name,db_account_payments_view.registration_no,
									  db_account_payments_view.roll_no,db_account_payments_view.bank_id,db_account_payments_view.bank_name,db_account_accountants.id AS accountant_id,db_account_accountants.accountant_name
									  FROM db_account_payments_view JOIN db_account_accountants ON db_account_payments_view.receiver_id=db_account_accountants.id
									  WHERE student_id=:student_id AND date BETWEEN :fromDate AND :toDate' );
		$this->db_object->bind( ':student_id', $studentId );
		$this->db_object->bind( ':fromDate', $fromDate );
		$this->db_object->bind( ':toDate', $toDate );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getPaymentsByDateInterval( $fromDate, $toDate ) {
		$this->db_object->query( 'SELECT student_id,student_name,class_name,section_name,registration_no,SUM(paid_amount) AS total_paid_amount FROM db_account_payments_view WHERE date between :fromDate and :toDate GROUP BY student_id' );
		$this->db_object->bind( ':fromDate', $fromDate );
		$this->db_object->bind( ':toDate', $toDate );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getAccountantWisePaymentDetailsByDateInterval( $accountantId, $payment_method_id, $fromDate, $toDate ) {
		$this->db_object->query( 'SELECT db_account_payments_view.id,db_account_payments_view.student_id,db_account_payments_view.paid_amount,db_account_payments_view.discount,
									  db_account_payments_view.receiver_id,db_account_payments_view.date,db_account_payments_view.payment_method_id,db_account_payments_view.payment_method_name,db_account_payments_view.student_name,db_account_payments_view.class_name,
									  db_account_payments_view.section_name,db_account_payments_view.registration_no,db_account_payments_view.roll_no,db_account_payments_view.bank_id,
									  db_account_payments_view.bank_name,db_account_accountants.id AS accountant_id,db_account_accountants.accountant_name
									  FROM db_account_payments_view JOIN db_account_accountants ON db_account_payments_view.receiver_id=db_account_accountants.id WHERE receiver_id=:accountant_id AND payment_method_id=:payment_method_id AND date BETWEEN :fromDate AND :toDate' );
		$this->db_object->bind( ':accountant_id', $accountantId );
		$this->db_object->bind( ':payment_method_id', $payment_method_id );
		$this->db_object->bind( ':fromDate', $fromDate );
		$this->db_object->bind( ':toDate', $toDate );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getAccountantAndDateWisePayments( $receiver_id, $date ) {
		$this->db_object->query( 'SELECT receiver_id,SUM(paid_amount) AS total_received_amount,SUM(discount) AS total_discount,payment_method_id,date,payment_method_name
										FROM db_account_payments
										JOIN db_account_payment_methods ON db_account_payment_methods.id=db_account_payments.payment_method_id
										WHERE receiver_id=:receiver_id AND DATE=:date
										GROUP BY payment_method_id;' );
		$this->db_object->bind( ':date', $date );
		$this->db_object->bind( ':receiver_id', $receiver_id );

		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getAccountantDateAndTypeWisePayments( $receiver_id, $date, $payment_method_id ) {
		$this->db_object->query( 'SELECT receiver_id,SUM(paid_amount) AS total_received_amount,SUM(discount) AS total_discount,payment_method_id,DATE,payment_method_name
										FROM db_account_payments
										JOIN db_account_payment_methods ON db_account_payment_methods.id=db_account_payments.payment_method_id
										WHERE receiver_id=:receiver_id AND date=:date AND payment_method_id=:payment_method_id;' );
		$this->db_object->bind( ':date', $date );
		$this->db_object->bind( ':receiver_id', $receiver_id );
		$this->db_object->bind( ':payment_method_id', $payment_method_id );

		$result = $this->db_object->single();

		return $result;
	}

	public function getSectionDetails( $section_id ) {
		$this->db_object->query( 'SELECT db_academic_sections.id,db_academic_sections.name AS section_name,db_academic_classes.name AS class_name FROM db_academic_sections
										JOIN db_academic_classes
										ON db_academic_sections.class_id=db_academic_classes.id
										WHERE db_academic_sections.id=:section_id' );
		$this->db_object->bind( ':section_id', $section_id );
		$result = $this->db_object->single();

		return $result;
	}

	public function getStudentByName( $name_of_student ) {
		$this->db_object->query( "SELECT * FROM db_account_payments_view WHERE student_name LIKE :name_of_student" );
		$this->db_object->bind( ':name_of_student', "%" . $name_of_student . "%" );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getPaymentsByStudentId( $student_id ) {
		$this->db_object->query( 'SELECT * FROM db_account_payments WHERE student_id=:student_id' );
		$this->db_object->bind( ':student_id', $student_id );

		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getTotalCashPaymentsOfAccountant( $accountant_id ) {
		$payment_methods     = Payment_Method::GetInstance()->getAll();
		$cash_payment_method = null;
		foreach ( $payment_methods as $payment_method ) {
			$payment_method_name = $payment_method->payment_method_name;
			if ( strtolower( trim( $payment_method_name ) ) == "cash" ) {
				$cash_payment_method = $payment_method;
			}
		}

		$this->db_object->query( 'SELECT SUM(paid_amount) AS total_paid_amount, SUM(discount) AS total_discount
									  FROM db_account_payments WHERE receiver_id=:accountant_id AND payment_method_id=:payment_method_id GROUP BY receiver_id' );
		$this->db_object->bind( 'accountant_id', $accountant_id );
		$this->db_object->bind( 'payment_method_id', $cash_payment_method->id );
		$result = $this->db_object->single();

		return $result;
	}

	public function getTotalChequePaymentsOfAccountant( $accountant_id ) {
		$payment_methods       = Payment_Method::GetInstance()->getAll();
		$cheque_payment_method = null;
		foreach ( $payment_methods as $payment_method ) {
			$payment_method_name = $payment_method->payment_method_name;
			if ( strtolower( trim( $payment_method_name ) ) == "cheque" ) {
				$cheque_payment_method = $payment_method;
			}
		}

		$this->db_object->query( 'SELECT SUM(paid_amount) AS total_paid_amount, SUM(discount) AS total_discount
									  FROM db_account_payments WHERE receiver_id=:accountant_id AND payment_method_id=:payment_method_id GROUP BY receiver_id' );
		$this->db_object->bind( 'accountant_id', $accountant_id );
		$this->db_object->bind( 'payment_method_id', $cheque_payment_method->id );
		$result = $this->db_object->single();

		return $result;
	}

	/*public function getPaymentMethodById( $payment_method_id ) {
		$this->db_object->query( 'SELECT * FROM db_account_payment_methods WHERE id=:payment_method_id' );
		$this->db_object->bind( ':payment_method_id', $payment_method_id );

		$result = $this->db_object->single();

		return $result;
	}*/

	/*public function getBanks() {
		$this->db_object->query( 'SELECT * FROM db_account_banks' );
		$result = $this->db_object->resultSet();

		return $result;
	}*/

	/*public function getBankById( $id ) {
		$this->db_object->query( 'SELECT * FROM db_account_banks WHERE id=:id' );
		$this->db_object->bind( ':id', $id );
		$result = $this->db_object->single();

		return $result;
	}*/
}