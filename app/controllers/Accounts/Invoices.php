<?php

namespace App\Controllers\Accounts;

use App\Libraries\Controller;
use App\Libraries\Http\Request;
use App\Models\Academic\AcademicClass;
use App\Models\Account\FeeType;
use App\Models\Account\Invoice;
use App\Models\Account\Payment;
use App\Models\Student;

class Invoices extends Controller {

	private $invoice;
	private $class;
	private $fee_type;
	private $payment;

	public function __construct() {
		$this->invoice  = new Invoice();
		$this->class    = new AcademicClass();
		$this->fee_type = new FeeType();
		$this->payment  = new Payment();
	}

	public function index() {
		$invoices = $this->invoice->getAllInvoices();
		foreach ( $invoices as $invoice ) {
			$student               = ( new Student() )->getStudentById( $invoice->student_id );
			$section               = $this->payment->getSectionDetails( $student->section_id );
			$invoice->class_name   = $section->class_name;
			$invoice->section_name = $section->section_name;
		}
		$data = [ 'invoices' => $invoices ];
		$this->view( 'accounts/invoices/index', $data );
	}

	public function add() {
		if ( POST ) {
			if ( $_POST['month'] == "0" ) {
				die( 'Month should be selected' );
			} else {
				if ( $_POST['year'] == "0" ) {
					die( 'Year should be selected' );
				} else {
					if ( $_POST['class_id'] == 0 ) {
						die( 'Class should be selected' );
					} else {
						if ( $_POST['section'] == 0 ) {
							die( 'Section should be selected' );
						} else {
							if ( $_POST['registration_number'] == "" ) {
								die( 'Student should be selected' );
							} else {
								if ( $_POST['fee_type_id'] == 0 ) {
									die( 'Fee Type should be selected' );
								} else {
									if ( $this->invoice->doesInvoiceExist( $_POST['student_id'], $_POST['fee_type_id'], $_POST['month'], $_POST['year'] ) ) {
										die( 'Invoice of this student for that month is already created' );
									} else {
										$this->invoice->student_id                     = $_POST['student_id'];
										$this->invoice->fee_type_id                    = $_POST['fee_type_id'];
										$this->invoice->invoice_number                 = date( 'Ymdhis' ) . $_POST['class_id'] . $_POST['section'] . $_POST['student_id'];
										$this->invoice->month                          = $_POST['month'];
										$this->invoice->year                           = $_POST['year'];
										$this->invoice->note                           = "Invoice Of" . " " . $_POST['month'] . " " . $_POST['year'];
										$this->invoice->amount                         = $_POST['amount'];
										$this->invoice->fine                           = $_POST['fine'];
										$this->invoice->discount_in_percentage         = $_POST['discount'];
										$this->invoice->amount_after_fine_and_discount = $_POST['amount'] + $_POST['fine'] - ( $_POST['amount'] * ( $_POST['discount'] / 100 ) );
										$this->invoice->date                           = date( 'Y-m-d' );
										if ( $this->invoice->create() ) {
											redirect( 'accounts/invoices/index' );
										}
									}
								}
							}
						}
					}
				}
			}
		} else {
			$classes   = $this->class->getAll();
			$fee_types = $this->fee_type->getAll();
			$data      = [
				'classes'   => $classes,
				'fee_types' => $fee_types
			];
			$this->view( 'accounts/invoices/add', $data );
		}
	}

	public function addInvoices() {
		if ( POST ) {
			if ( $_POST['month'] == "0" ) {
				die( 'Month should be selected' );
			} else {
				if ( $_POST['year'] == "0" ) {
					die( 'Year should be selected' );
				} else {
					if ( $_POST['class_id'] == 0 ) {
						die( 'Class should be selected' );
					} else {
						if ( $_POST['section'] == 0 ) {
							die( 'Section should be selected' );
						} else {
							if ( $_POST['fee_type_id'] == 0 ) {
								die( 'Type of Fee should be selected' );
							} else {
								$confirmation           = 0;
								$student_id             = $_POST['student_id'];
								$amount                 = $_POST['amount'];
								$discount_in_percentage = $_POST['discount_in_percentage'];
								$fine                   = $_POST['fine'];
								for ( $i = 0; $i < count( $student_id ); $i ++ ) {
									if ( $this->invoice->doesInvoiceExist( $student_id[ $i ], $_POST['fee_type_id'], $_POST['month'], $_POST['year'] ) ) {
										continue;
									} else {
										$this->invoice->student_id                     = $student_id[ $i ];
										$this->invoice->fee_type_id                    = $_POST['fee_type_id'];
										$this->invoice->invoice_number                 = date( 'Ymdhis' ) . $_POST['class_id'] . $_POST['section'] . $student_id[ $i ];
										$this->invoice->month                          = $_POST['month'];
										$this->invoice->year                           = $_POST['year'];
										$this->invoice->note                           = "Invoice Of" . " " . $_POST['month'] . " " . $_POST['year'];
										$this->invoice->amount                         = $amount[ $i ];
										$this->invoice->fine                           = $fine[ $i ];
										$this->invoice->discount_in_percentage         = $discount_in_percentage[ $i ];
										$this->invoice->amount_after_fine_and_discount = $this->invoice->amount + $this->invoice->fine - ( $this->invoice->amount * ( $this->invoice->discount_in_percentage / 100 ) );
										$this->invoice->date                           = date( 'Y-m-d' );
										if ( $this->invoice->create() ) {
											$confirmation ++;
										}
									}
								}
								if ( $confirmation != 0 ) {
									redirect( 'accounts/invoices/index' );
								} else {
									die( 'Invoice Already Added! Or Something went wrong!' );
								}
							}
						}
					}
				}
			}
		} else {
			$classes   = $this->class->getAll();
			$fee_types = $this->fee_type->getAll();
			$data      = [
				'classes'   => $classes,
				'fee_types' => $fee_types
			];
			$this->view( 'accounts/invoices/addinvoices', $data );
		}
	}

	public function addIndividualInvoice() {
		if ( $_POST['month'] == "0" ) {
			die( 'Month should be selected' );
		} else {
			if ( $_POST['year'] == "0" ) {
				die( 'Year should be selected' );
			} else {
				if ( $_POST['class_id'] == 0 ) {
					die( 'Class should be selected' );
				} else {
					if ( $_POST['section_id'] == 0 ) {
						die( 'Section should be selected' );
					} else {
						if ( $_POST['fee_type_id'] == 0 ) {
							die( 'Fee Type should be selected' );
						} else {
							$flag = false;
							if ( $this->invoice->doesInvoiceExist( $_POST['student_id'], $_POST['fee_type_id'], $_POST['month'], $_POST['year'] ) ) {
								$flag = true;

								return jsonResult( $flag );
							} else {
								$this->invoice->student_id                     = $_POST['student_id'];
								$this->invoice->fee_type_id                    = $_POST['fee_type_id'];
								$this->invoice->invoice_number                 = date( 'Ymdhis' ) . $_POST['class_id'] . $_POST['section_id'] . $_POST['student_id'];
								$this->invoice->month                          = $_POST['month'];
								$this->invoice->year                           = $_POST['year'];
								$this->invoice->note                           = "Invoice Of" . " " . $_POST['month'] . " " . $_POST['year'];
								$this->invoice->amount                         = $_POST['amount'];
								$this->invoice->fine                           = $_POST['fine'];
								$this->invoice->discount_in_percentage         = $_POST['discount_in_percentage'];
								$this->invoice->amount_after_fine_and_discount = $_POST['amount'] + $_POST['fine'] - ( $_POST['amount'] * ( $_POST['discount_in_percentage'] / 100 ) );
								$this->invoice->date                           = date( 'Y-m-d' );
								if ( $this->invoice->create() ) {
									$flag = true;
								}

								return jsonResult( $flag );
							}
						}
					}
				}
			}
		}
	}

	public function showFeeByClassAndFeeType() {
		$class_id    = $_POST['class_id'];
		$fee_type_id = $_POST['fee_type_id'];
		$fee         = $this->invoice->getFeeByClassAndFeeType( $class_id, $fee_type_id );

		return jsonResult( $fee );
	}

	public function showStudentsByClassAndSection() {
		$class_id   = $_POST['class_id'];
		$section_id = $_POST['section_id'];
		$students   = Student::GetInstance()->getStudentByClassAndSection( $class_id, $section_id );

		return jsonResult( $students );
	}

	public function doesInvoiceExist() {
		if ( $this->invoice->doesInvoiceExist( $_POST['student_id'], $_POST['fee_type_id'], $_POST['month'], $_POST['year'] ) ) {
			return jsonResult( true );
		} else {
			return jsonResult( false );
		}
	}

	public function showFullInvoiceInfo( $invoice_number = 0 ) {
		if ( $invoice_number == 0 ) {
			redirect( 'accounts/invoices/index' );
		} else {
			$invoice               = $this->invoice->getInvoiceByInvoiceNumber( $invoice_number );
			$student               = ( new Student() )->getStudentById( $invoice->student_id );
			$section               = $this->payment->getSectionDetails( $student->section_id );
			$invoice->class_name   = $section->class_name;
			$invoice->section_name = $section->section_name;
			$invoice->roll_no      = $student->roll_no;
			$data                  = [
				'invoice' => $invoice
			];
			$this->view( 'accounts/invoices/show', $data );
		}
	}

	/*public function edit( $invoice_number ) {
		if ( POST ) {
			$invoice                         = new Invoice();
			$invoice->id                     = $_POST['invoice_id'];
			$invoice->student_id             = $_POST['student_id'];
			$invoice->class_id               = $_POST['class_id'];
			$invoice->section_id             = $_POST['section_id'];
			$invoice->fee_type_id            = $_POST['fee_type_id'];
			$invoice->invoice_number         = $invoice_number;
			$invoice->amount                 = $_POST['amount'];
			$invoice->discount_in_percentage = $_POST['discount'];
			$invoice->amount_after_discount  = $_POST['amount'] - ( $_POST['amount'] * ( $_POST['discount'] / 100 ) );
			$invoice->paid_amount            = $_POST['paid_amount'];
			$invoice->due_amount             = $invoice->amount_after_discount - $invoice->paid_amount;
			if ( $invoice->due_amount < 0 || $invoice->amount < $invoice->paid_amount ) {
				die( 'That Much Discount Can Not Be Issued OR Payment Already Done More Than The Given Amount' );
			}
			$invoice->payment_status = $_POST['payment_status'];
			$invoice->date           = $_POST['date'];
			if ( $invoice->update() ) {
				redirect( 'accounts/invoices/index' );
			}
		} else {
			$invoice         = $this->invoice->getInvoiceByInvoiceNumber( $invoice_number );
			$data['invoice'] = $invoice;
			$this->view( 'accounts/invoices/edit', $data );
		}
	}

	public function delete( $id ) {
		$this->invoice->id = $id;
		if ( $this->invoice->delete() ) {
			redirect( 'accounts/invoices/index' );
		}
	}*/

	public function showStudentByClassSectionAndRegistrationNumber() {
		$class_id            = Request::post( 'class_id' );
		$section_id          = Request::post( 'section_id' );
		$registration_number = Request::post( 'registration_number' );
		$student             = $this->invoice->getStudentByClassSectionAndRegistrationNumber( $class_id, $section_id, $registration_number );

		return jsonResult( $student );
	}

	public function getStudentByRegistrationNumber() {
		$registration_number = Request::post( 'registration_number' );
		$student             = Student::GetInstance()->getByField( 'registration_no', $registration_number );

		return jsonResult( $student );
	}

	public function doesStudentExist() {
		$registration_number = Request::get( 'registration_number' );
		$student             = Student::GetInstance()->isExist( 'registration_no', $registration_number );
		if ( $student == null || $student == false ) {
			return jsonResult( 'No student found with this registration number' );
		} else {
			return jsonResult( true );
		}
	}

	public function getDueAmount() {
		$generated_amount = 0;
		$paid_amount      = 0;
		$student_id       = $_POST['student_id'];
		$invoices         = $this->invoice->getInvoiceByStudentId( $student_id );
		$payments         = $this->payment->getPaymentsByStudentId( $student_id );
		if ( $invoices != null ) {
			foreach ( $invoices as $invoice ) {
				$generated_amount += $invoice->amount_after_fine_and_discount;
			}
		}
		if ( $payments != null ) {
			foreach ( $payments as $payment ) {
				$paid_amount += ( $payment->paid_amount + $payment->discount );
			}
		}
		$due_amount = $generated_amount - $paid_amount;

		return jsonResult( $due_amount );
	}

	public function getInvoicesByDateInterval() {
		$from_date = $_POST['fromDate'];
		$to_date   = $_POST['toDate'];
		$invoices  = $this->invoice->getInvoicesByDateInterval( $from_date, $to_date );
		foreach ( $invoices as $invoice ) {
			$student               = ( new Student() )->getStudentById( $invoice->student_id );
			$section               = $this->payment->getSectionDetails( $student->section_id );
			$invoice->class_name   = $section->class_name;
			$invoice->section_name = $section->section_name;
		}

		return jsonResult( $invoices );
	}
}