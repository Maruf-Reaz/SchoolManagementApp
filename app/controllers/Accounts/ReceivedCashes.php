<?php

namespace App\Controllers\Accounts;

use App\Libraries\Controller;
use App\Models\Account\Accountant;
use App\Models\Account\AccountantWisePayment;
use App\Models\Account\Expense;
use App\Models\Account\Income;
use App\Models\Account\Payment;
use App\Models\Account\Payment_Method;
use App\Models\Account\ReceivedCash;

class ReceivedCashes extends Controller {

	private $received_cash;

	public function __construct() {
		$this->received_cash = new ReceivedCash();
	}

	public function index() {
		$accountants = Accountant::GetInstance()->getAll();
		/*$receivers   = array();
		foreach ( $accountants as $accountant ) {
			array_push( $receivers, $accountant->id );
		}*/
		$date = date( 'Y-m-d' );

		$accountant_and_type_wise_received_cashes = array();

		if ( isset( $accountants ) ) {
			foreach ( $accountants as $accountant ) {

				$payment_methods = Payment_Method::GetInstance()->getAll();

				foreach ( $payment_methods as $payment_method ) {
					if ( trim( $payment_method->payment_method_name ) == "Cash" ) {

						$accountant_wise_payment                          = new AccountantWisePayment();
						$accountant_wise_payment->receiver_id             = $accountant->id;
						$accountant_wise_payment->receiver_name           = $accountant->accountant_name;
						$accountant_wise_payment->total_payments_received = 0;
						$accountant_wise_payment->total_discount          = 0;
						$accountant_wise_payment->total_income_received   = 0;
						$accountant_wise_payment->total_expense_done      = 0;
						$accountant_wise_payment->total_received_amount   = 0;
						$accountant_wise_payment->date                    = $date;
						$accountant_wise_payment->payment_method_id       = $payment_method->id;
						$accountant_wise_payment->payment_method_name     = $payment_method->payment_method_name;
						$accountant_wise_payment->flag                    = false;

						$accountant_date_and_type_wise_received_cash = Payment::GetInstance()->getAccountantDateAndTypeWisePayments( $accountant->id, $date, $payment_method->id );
						if ( $accountant_date_and_type_wise_received_cash->receiver_id != null ) {
							$accountant_wise_payment->total_payments_received += $accountant_date_and_type_wise_received_cash->total_received_amount;
							$accountant_wise_payment->total_discount          += $accountant_date_and_type_wise_received_cash->total_discount;
						}

						$accountant_and_date_wise_incomes = Income::GetInstance()->getAccountantAndDateWiseIncome( $accountant->id, $date );
						if ( $accountant_and_date_wise_incomes != null ) {
							$total_income = 0;
							foreach ( $accountant_and_date_wise_incomes as $accountant_and_date_wise_income ) {
								$total_income += $accountant_and_date_wise_income->amount;
							}
							$accountant_wise_payment->total_income_received += $total_income;
						}

						$accountant_and_date_wise_expenses = Expense::GetInstance()->getAccountantAndDateWiseExpense( $accountant->id, $date );
						if ( $accountant_and_date_wise_expenses != null ) {
							$total_expense = 0;
							foreach ( $accountant_and_date_wise_expenses as $accountant_and_date_wise_expense ) {
								$total_expense += $accountant_and_date_wise_expense->amount;
							}
							$accountant_wise_payment->total_expense_done += $total_expense;
						}

						if ( $this->received_cash->isPaymentReceivedAlready( $payment_method->id, $accountant->id, $date ) ) {
							$accountant_wise_payment->flag = true;
						}

						$accountant_wise_payment->total_received_amount = $accountant_wise_payment->total_payments_received + $accountant_wise_payment->total_income_received - $accountant_wise_payment->total_expense_done;
						array_push( $accountant_and_type_wise_received_cashes, $accountant_wise_payment );

					} else {
						$accountant_wise_payment                          = new AccountantWisePayment();
						$accountant_wise_payment->receiver_id             = $accountant->id;
						$accountant_wise_payment->receiver_name           = $accountant->accountant_name;
						$accountant_wise_payment->total_payments_received = 0;
						$accountant_wise_payment->total_discount          = 0;
						$accountant_wise_payment->total_income_received   = 0;
						$accountant_wise_payment->total_expense_done      = 0;
						$accountant_wise_payment->total_received_amount   = 0;
						$accountant_wise_payment->date                    = $date;
						$accountant_wise_payment->payment_method_id       = $payment_method->id;
						$accountant_wise_payment->payment_method_name     = $payment_method->payment_method_name;
						$accountant_wise_payment->flag                    = false;

						$accountant_date_and_type_wise_received_cash = Payment::GetInstance()->getAccountantDateAndTypeWisePayments( $accountant->id, $date, $payment_method->id );
						if ( $accountant_date_and_type_wise_received_cash->receiver_id != null ) {
							$accountant_wise_payment->total_payments_received += $accountant_date_and_type_wise_received_cash->total_received_amount;
							$accountant_wise_payment->total_discount          += $accountant_date_and_type_wise_received_cash->total_discount;
						}

						if ( $this->received_cash->isPaymentReceivedAlready( $payment_method->id, $accountant->id, $date ) ) {
							$accountant_wise_payment->flag = true;
						}

						$accountant_wise_payment->total_received_amount = $accountant_wise_payment->total_payments_received + $accountant_wise_payment->total_income_received - $accountant_wise_payment->total_expense_done;
						array_push( $accountant_and_type_wise_received_cashes, $accountant_wise_payment );

					}
				}
			}
		}
		$data = [ 'accountant_and_type_wise_received_cashes' => $accountant_and_type_wise_received_cashes ];
		$this->view( 'accounts/received_cashes/index', $data );
	}

	public function receivePayment() {
		$payment_method_id     = $_POST['payment_method_id'];
		$total_received_amount = $_POST['total_received_amount'];
		$total_discount        = $_POST['total_discount'];
		$receiver_id           = $_POST['receiver_id'];
		$received_date         = $_POST['received_date'];

		$this->received_cash->payment_method_id = $payment_method_id;
		$this->received_cash->amount            = $total_received_amount;
		$this->received_cash->discount          = $total_discount;
		$this->received_cash->accountant_id     = $receiver_id;
		$this->received_cash->payment_date      = $received_date;
		$this->received_cash->receive_date      = date( 'Y-m-d' );
		if ( $this->received_cash->create() ) {
			return jsonResult( true );
		}
	}

	public function getReceivedPaymentsByDateInterval() {
		$from_date   = $_POST['fromDate'];
		$to_date     = $_POST['toDate'];
		$accountants = Accountant::GetInstance()->getAll();
		/*$receivers   = array();
		foreach ( $accountants as $accountant ) {
			array_push( $receivers, $accountant->id );
		}*/

		$accountant_and_type_wise_received_cashes = array();

		$dates = array();
		for ( $i = $from_date; $i <= $to_date; $i = strftime( "%Y-%m-%d", strtotime( "$i +1 day" ) ) ) {
			array_push( $dates, $i );
		}

		if ( isset( $accountants ) ) {
			foreach ( $dates as $date ) {
				foreach ( $accountants as $accountant ) {

					$payment_methods = Payment_Method::GetInstance()->getAll();

					foreach ( $payment_methods as $payment_method ) {
						if ( trim( $payment_method->payment_method_name ) == "Cash" ) {
							$accountant_wise_payment                          = new AccountantWisePayment();
							$accountant_wise_payment->receiver_id             = $accountant->id;
							$accountant_wise_payment->receiver_name           = $accountant->accountant_name;
							$accountant_wise_payment->total_payments_received = 0;
							$accountant_wise_payment->total_discount          = 0;
							$accountant_wise_payment->total_income_received   = 0;
							$accountant_wise_payment->total_expense_done      = 0;
							$accountant_wise_payment->total_received_amount   = 0;
							$accountant_wise_payment->date                    = $date;
							$accountant_wise_payment->payment_method_id       = $payment_method->id;
							$accountant_wise_payment->payment_method_name     = $payment_method->payment_method_name;
							$accountant_wise_payment->flag                    = false;

							$accountant_date_and_type_wise_received_cash = Payment::GetInstance()->getAccountantDateAndTypeWisePayments( $accountant->id, $date, $payment_method->id );
							if ( $accountant_date_and_type_wise_received_cash->receiver_id != null ) {
								$accountant_wise_payment->total_payments_received += $accountant_date_and_type_wise_received_cash->total_received_amount;
								$accountant_wise_payment->total_discount          += $accountant_date_and_type_wise_received_cash->total_discount;
							}

							$accountant_and_date_wise_incomes = Income::GetInstance()->getAccountantAndDateWiseIncome( $accountant->id, $date );
							if ( $accountant_and_date_wise_incomes != null ) {
								$total_income = 0;
								foreach ( $accountant_and_date_wise_incomes as $accountant_and_date_wise_income ) {
									$total_income += $accountant_and_date_wise_income->amount;
								}
								$accountant_wise_payment->total_income_received += $total_income;
							}

							$accountant_and_date_wise_expenses = Expense::GetInstance()->getAccountantAndDateWiseExpense( $accountant->id, $date );
							if ( $accountant_and_date_wise_expenses != null ) {
								$total_expense = 0;
								foreach ( $accountant_and_date_wise_expenses as $accountant_and_date_wise_expense ) {
									$total_expense += $accountant_and_date_wise_expense->amount;
								}
								$accountant_wise_payment->total_expense_done += $total_expense;
							}

							if ( $this->received_cash->isPaymentReceivedAlready( $payment_method->id, $accountant->id, $date ) ) {
								$accountant_wise_payment->flag = true;
							}

							$accountant_wise_payment->total_received_amount = $accountant_wise_payment->total_payments_received + $accountant_wise_payment->total_income_received - $accountant_wise_payment->total_expense_done;
							array_push( $accountant_and_type_wise_received_cashes, $accountant_wise_payment );

						} else {

							$accountant_wise_payment                          = new AccountantWisePayment();
							$accountant_wise_payment->receiver_id             = $accountant->id;
							$accountant_wise_payment->receiver_name           = $accountant->accountant_name;
							$accountant_wise_payment->total_payments_received = 0;
							$accountant_wise_payment->total_discount          = 0;
							$accountant_wise_payment->total_income_received   = 0;
							$accountant_wise_payment->total_expense_done      = 0;
							$accountant_wise_payment->total_received_amount   = 0;
							$accountant_wise_payment->date                    = $date;
							$accountant_wise_payment->payment_method_id       = $payment_method->id;
							$accountant_wise_payment->payment_method_name     = $payment_method->payment_method_name;
							$accountant_wise_payment->flag                    = false;

							$accountant_date_and_type_wise_received_cash = Payment::GetInstance()->getAccountantDateAndTypeWisePayments( $accountant->id, $date, $payment_method->id );
							if ( $accountant_date_and_type_wise_received_cash->receiver_id != null ) {
								$accountant_wise_payment->total_payments_received += $accountant_date_and_type_wise_received_cash->total_received_amount;
								$accountant_wise_payment->total_discount          += $accountant_date_and_type_wise_received_cash->total_discount;
							}

							if ( $this->received_cash->isPaymentReceivedAlready( $payment_method->id, $accountant->id, $date ) ) {
								$accountant_wise_payment->flag = true;
							}

							$accountant_wise_payment->total_received_amount = $accountant_wise_payment->total_payments_received + $accountant_wise_payment->total_income_received - $accountant_wise_payment->total_expense_done;
							array_push( $accountant_and_type_wise_received_cashes, $accountant_wise_payment );

						}
					}
				}
			}
		}

		return jsonResult( $accountant_and_type_wise_received_cashes );
	}

	public function getTransactionDetailsByDate() {
		$accountant_id     = $_GET['accountant_id'];
		$payment_method_id = $_GET['payment_method_id'];
		$date              = $_GET['date'];

		$payment_method = Payment_Method::GetInstance()->getById( $payment_method_id );

		$payments = null;
		$incomes  = null;
		$expenses = null;

		if ( strtolower( trim( $payment_method->payment_method_name ) ) == "cash" ) {
			$payments = Payment::GetInstance()->getAccountantWisePaymentDetailsByDateInterval( $accountant_id, $payment_method_id, $date, $date );
			$incomes  = Income::GetInstance()->getAccountantWiseIncomeDetailsByDateInterval( $accountant_id, $date, $date );
			$expenses = Expense::GetInstance()->getAccountantWiseExpenseDetailsByDateInterval( $accountant_id, $date, $date );
		} else {
			$payments = Payment::GetInstance()->getAccountantWisePaymentDetailsByDateInterval( $accountant_id, $payment_method_id, $date, $date );
		}

		$data = [
			'payments' => $payments,
			'incomes'  => $incomes,
			'expenses' => $expenses
		];
		$this->view( 'accounts/received_cashes/showDetails', $data );
	}
}