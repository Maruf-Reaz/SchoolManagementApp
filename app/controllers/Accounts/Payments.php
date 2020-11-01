<?php

namespace App\Controllers\Accounts;

use App\Libraries\Controller;
use App\Models\Academic\AcademicClass;
use App\Models\Account\Bank;
use App\Models\Account\FeeType;
use App\Models\Account\Invoice;
use App\Models\Account\Payment;
use App\Models\Account\Payment_Method;
use App\Models\Student;

class Payments extends Controller {

	private $payment;
	private $invoice;
	private $class;
	private $fee_type;
	private $student;

	public function __construct() {
		$this->payment  = new Payment();
		$this->invoice  = new Invoice();
		$this->class    = new AcademicClass();
		$this->fee_type = new FeeType();
		$this->student  = new Student();
	}

	public function index() {
		$date     = date( 'Y-m-d' );
		$payments = $this->payment->getPaymentsByDateInterval( $date, $date );
		$data     = [
			'payments' => $payments,
			'date'     => $date
		];
		$this->view( 'accounts/payments/index', $data );
	}

	public function getPaymentsByDateInterval() {
		$fromDate = $_POST['fromDate'];
		$toDate   = $_POST['toDate'];
		$payments = $this->payment->getPaymentsByDateInterval( $fromDate, $toDate );

		return jsonResult( $payments );
	}

	/*public function getPaymentDetailsByDateInterval() {
		$studentId    = $_POST['student_id'];
		$fromDate    = $_POST['fromDate'];
		$toDate      = $_POST['toDate'];
		$payments    = $this->payment->getPaymentDetailsByDateInterval($studentId, $fromDate, $toDate );
		return jsonResult( $payments );
	}*/

	public function getFullPaymentDetails() {
		$student_id = $_GET['student_id'];
		$from_date  = $_GET['from_date'];
		$to_date    = $_GET['to_date'];
		$payments   = $this->payment->getPaymentDetailsByDateInterval( $student_id, $from_date, $to_date );
		$data       = [ 'payments' => $payments ];
		$this->view( 'accounts/payments/showDetails', $data );
	}

	public function addPayment() {
		if ( POST ) {
			if ( $_POST['registration_number'] == "" ) {
				die( 'Please Enter Registration Number' );
			} else {
				if ( $_POST['paid_amount'] == "" ) {
					die( 'Enter Amount to Be Paid' );
				} else {
					if ( $_POST['payment_method_id'] == "" ) {
						die( 'Select Payment Method' );
					} else {
						$bank                             = null;
						$payment_method                   = Payment_Method::GetInstance()->getById( $_POST['payment_method_id'] );
						$this->payment->student_id        = $_POST['student_id'];
						$this->payment->paid_amount       = $_POST['paid_amount'];
						$this->payment->discount          = $_POST['discount'];
						$this->payment->payment_method_id = $_POST['payment_method_id'];
						if ( strtolower( trim( $payment_method->payment_method_name ) ) == "cheque" ) {
							$this->payment->bank_id = $_POST['bank_id'];
							$bank                   = Bank::GetInstance()->getById( $_POST['bank_id'] );
						} else {
							$this->payment->bank_id = null;
						}
						$this->payment->date        = $_POST['date'];
						$this->payment->receiver_id = 10;
						if ( $this->payment->create() ) {
							$student     = $this->student->getStudentById( $_POST['student_id'] );
							$paid_amount = ( $_POST['paid_amount'] );
							$discount    = $_POST['discount'];
							$data        = [
								'student'        => $student,
								'paid_amount'    => $paid_amount,
								'payment_method' => $payment_method,
								'discount'       => $discount,
								'bank'           => $bank
							];
							$this->view( 'accounts/payments/showReceipt', $data );
						}
					}
				}
			}
		} else {
			$classes         = $this->class->getAll();
			$fee_types       = $this->fee_type->getAll();
			$payment_methods = $this->invoice->getPaymentMethods();
			$banks           = Bank::GetInstance()->getAll();
			$data            = [
				'classes'         => $classes,
				'fee_types'       => $fee_types,
				'payment_methods' => $payment_methods,
				'banks'           => $banks
			];
			$this->view( 'accounts/payments/add', $data );
		}
	}

	public function edit( $id = 0 ) {
		if ( POST ) {
			if ( $_POST['payment_method_id'] == 0 ) {
				die( 'Payment Method Should Be Selected' );
			} else {
				$invoice_number             = $_POST['invoice_number'];
				$invoice                    = $this->invoice->getInvoiceByInvoiceNumber( $invoice_number );
				$payment                    = new Payment();
				$payment->id                = $_POST['id'];
				$payment->invoice_number    = $invoice->invoice_number;
				$payment->paid_amount       = $_POST['amount'];
				$payment->payment_method_id = $_POST['payment_method_id'];
				$payment->date              = strftime( '%Y/%m/%d %H:%M:%S', time() );
				if ( $payment->update() ) {
					$invoice1                         = new Invoice();
					$invoice1->id                     = $invoice->id;
					$invoice1->student_id             = $invoice->student_id;
					$invoice1->class_id               = $invoice->class_id;
					$invoice1->section_id             = $invoice->section_id;
					$invoice1->fee_type_id            = $invoice->fee_type_id;
					$invoice1->invoice_number         = $invoice->invoice_number;
					$invoice1->amount                 = $invoice->amount;
					$invoice1->discount_in_percentage = $invoice->discount_in_percentage;
					$invoice1->amount_after_discount  = $invoice->amount_after_discount;
					$invoice1->paid_amount            = $invoice->paid_amount + $_POST['amount'] - $_POST['previous_paid_amount'];
					$invoice1->due_amount             = $invoice1->amount_after_discount - $invoice1->paid_amount;
					if ( $invoice1->due_amount == $invoice1->amount_after_discount ) {
						$invoice1->payment_status = 3;
					} elseif ( $invoice1->due_amount != 0 ) {
						$invoice1->payment_status = 2;
					} else {
						$invoice1->payment_status = 1;
					}
					$invoice1->date = $invoice->date;
					if ( $invoice1->update() ) {
						redirect( 'accounts/payments/index' );
					}
				} else {
					die( 'Failed to update payment' );
				}
			}
		} else {
			if ( $id == 0 ) {
				redirect( 'accounts/payments/index' );
			} else {
				$invoice_number  = $_GET['invoice_number'];
				$payment         = $this->payment->getById( $id );
				$payment_methods = $this->invoice->getPaymentMethods();
				$invoice         = $this->invoice->getInvoiceByInvoiceNumber( $invoice_number );
				$maximum_amount  = $invoice->due_amount + $payment->paid_amount;
				$data            = [
					'payment'         => $payment,
					'payment_methods' => $payment_methods,
					'invoice'         => $invoice,
					'maximum_amount'  => $maximum_amount
				];
				$this->view( 'accounts/payments/edit', $data );
			}
		}
	}

	public function delete( $id ) {
		$payment           = $this->payment->getById( $id );
		$this->payment->id = $id;
		$invoice           = $this->invoice->getInvoiceByInvoiceNumber( $payment->invoice_number );
		if ( $this->payment->delete() ) {
			$invoice1                         = new Invoice();
			$invoice1->id                     = $invoice->id;
			$invoice1->student_id             = $invoice->student_id;
			$invoice1->class_id               = $invoice->class_id;
			$invoice1->section_id             = $invoice->section_id;
			$invoice1->fee_type_id            = $invoice->fee_type_id;
			$invoice1->invoice_number         = $invoice->invoice_number;
			$invoice1->amount                 = $invoice->amount;
			$invoice1->discount_in_percentage = $invoice->discount_in_percentage;
			$invoice1->amount_after_discount  = $invoice->amount_after_discount;
			$invoice1->paid_amount            = $invoice->paid_amount - $payment->paid_amount;
			$invoice1->due_amount             = $invoice1->amount_after_discount - $invoice1->paid_amount;
			if ( $invoice1->due_amount == $invoice1->amount_after_discount ) {
				$invoice1->payment_status = 3;
			} elseif ( $invoice1->due_amount != 0 ) {
				$invoice1->payment_status = 2;
			} else {
				$invoice1->payment_status = 1;
			}
			$invoice1->date = $invoice->date;
			if ( $invoice1->update() ) {
				redirect( 'accounts/payments/index' );
			} else {
				die( 'Something went wrong' );
			}
		} else {
			die( 'Failed to delete this payment' );
		}
	}

	public function showStudentByName() {
		$name_of_student = $_POST['name_of_student'];
		$students        = $this->payment->getStudentByName( $name_of_student );

		return jsonResult( $students );
	}

	/*public function showInvoiceByStudentClassSectionAndFeeType() {
		$student_id  = $_POST['student_id'];
		$class_id    = $_POST['class_id'];
		$section_id  = $_POST['section_id'];
		$fee_type_id = $_POST['fee_type_id'];
		$invoice     = $this->invoice->getInvoiceByStudentClassSectionAndFeeType( $student_id, $class_id, $section_id, $fee_type_id );

		return jsonResult( $invoice );
	}*/
}