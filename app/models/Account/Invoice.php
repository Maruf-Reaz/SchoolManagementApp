<?php

namespace App\Models\Account;

use App\Libraries\Database;
use App\Libraries\Model;
use App\Models\Student;

class Invoice extends Model {
	protected static $table_name = 'db_account_invoices';
	protected static $db_fields = [
		'id',
		'student_id',
		'fee_type_id',
		'month',
		'year',
		'invoice_number',
		'note',
		'amount',
		'discount_in_percentage',
		'fine',
		'amount_after_fine_and_discount',
		'date'
	];

	public $db_object;

	public $id;
	public $student_id;
	public $fee_type_id;
	public $month;
	public $year;
	public $invoice_number;
	public $note;
	public $amount;
	public $discount_in_percentage;
	public $fine;
	public $amount_after_fine_and_discount;
	public $date;

	public function __construct() {
		$this->db_object = new Database();
	}

	public function getAllInvoices() {
		$this->db_object->query( 'SELECT * FROM db_account_invoices_view ORDER BY DATE DESC' );
		$result = $this->db_object->resultSet();

		return $result;
	}

	/*public function getStudentsByClassAndSection( $class_id, $section_id ) {
		$this->db_object->query( 'SELECT * FROM db_student_assignments_view WHERE section_id=:section_id AND class_id=:class_id' );
		$this->db_object->bind( ':section_id', $section_id );
		$this->db_object->bind( ':class_id', $class_id );
		$result = $this->db_object->resultSet();

		return $result;
	}*/

	public function getInvoiceByInvoiceNumber( $invoice_number ) {
		$this->db_object->query( 'SELECT * FROM db_account_invoices_view WHERE invoice_number=:invoice_number' );
		$this->db_object->bind( ':invoice_number', $invoice_number );
		$result = $this->db_object->single();

		return $result;
	}

	public function getPaymentMethods() {
		$this->db_object->query( 'SELECT * FROM db_account_payment_methods' );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getPaymentsByInvoiceNumber( $invoice_number ) {
		$this->db_object->query( 'SELECT * FROM db_account_payments WHERE invoice_number=:invoice_number' );
		$this->db_object->bind( ':invoice_number', $invoice_number );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getStudentByName( $name_of_student ) {
		$this->db_object->query( "SELECT * FROM db_account_invoices_view WHERE student_name LIKE :name_of_student OR email LIKE :email OR class_name LIKE :class_name OR section_name LIKE :section_name" );
		$this->db_object->bind( ':name_of_student', "%" . $name_of_student . "%" );
		$this->db_object->bind( ':email', "%" . $name_of_student . "%" );
		$this->db_object->bind( ':class_name', "%" . $name_of_student . "%" );
		$this->db_object->bind( ':section_name', "%" . $name_of_student . "%" );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getInvoiceByStudentClassSectionAndFeeType( $student_id, $class_id, $section_id, $fee_type_id ) {
		$this->db_object->query( 'SELECT * FROM db_account_invoices WHERE student_id=:student_id AND class_id=:class_id AND section_id=:section_id AND fee_type_id=:fee_type_id' );
		$this->db_object->bind( ':student_id', $student_id );
		$this->db_object->bind( ':class_id', $class_id );
		$this->db_object->bind( ':section_id', $section_id );
		$this->db_object->bind( ':fee_type_id', $fee_type_id );

		$result = $this->db_object->single();

		return $result;
	}

	public function getStudentByClassSectionAndRegistrationNumber( $class_id, $section_id, $registration_number ) {
		$this->db_object->query( 'SELECT * FROM db_student_assignments_view WHERE class_id=:class_id AND section_id=:section_id AND registration_no=:registration_no' );
		$this->db_object->bind( ':class_id', $class_id );
		$this->db_object->bind( ':section_id', $section_id );
		$this->db_object->bind( ':registration_no', $registration_number );

		$result = $this->db_object->single();

		return $result;
	}

	public function getFeeByClassAndFeeType( $class_id, $fee_type_id ) {
		$this->db_object->query( 'SELECT * FROM db_account_fees WHERE class_id=:class_id AND fee_type_id=:fee_type_id' );
		$this->db_object->bind( ':class_id', $class_id );
		$this->db_object->bind( ':fee_type_id', $fee_type_id );

		$result = $this->db_object->single();

		return $result;
	}

	public function doesInvoiceExist( $student_id, $fee_type_id, $month, $year ) {
		$this->db_object->query( 'SELECT * FROM db_account_invoices WHERE student_id=:student_id AND fee_type_id=:fee_type_id AND month=:month AND year=:year' );
		$this->db_object->bind( ':student_id', $student_id );
		$this->db_object->bind( ':fee_type_id', $fee_type_id );
		$this->db_object->bind( ':month', $month );
		$this->db_object->bind( ':year', $year );

		$result = $this->db_object->single();

		if ( $result != null ) {
			return true;
		} else {
			return false;
		}
	}

	public function getInvoiceByStudentId( $student_id ) {
		$this->db_object->query( 'SELECT * FROM db_account_invoices WHERE student_id=:student_id' );
		$this->db_object->bind( ':student_id', $student_id );

		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getInvoicesByDateInterval( $from_date, $to_date ) {
		$this->db_object->query( 'SELECT * FROM db_account_invoices_view WHERE date between :fromDate and :toDate ORDER BY DATE DESC' );
		$this->db_object->bind( ':fromDate', $from_date );
		$this->db_object->bind( ':toDate', $to_date );
		$result = $this->db_object->resultSet();

		return $result;
	}
}