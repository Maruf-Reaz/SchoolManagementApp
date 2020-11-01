<?php

namespace App\Controllers\Accounts;

use App\Libraries\Controller;
use App\Models\Account\Bank;
use App\Models\Account\BankWiseTransaction;
use App\Models\Account\Payment_Method;
use App\Models\Account\TrialBalance;
use Carbon\Carbon;

class TrialBalances extends Controller {

	public function index() {
		$date           = Carbon::now();
		$number_of_days = $date->daysInMonth;

		$start_date = $date->format( 'Y' ) . '-' . $date->format( 'm' ) . '-' . '1';
		$end_date   = $date->format( 'Y' ) . '-' . $date->format( 'm' ) . '-' . $number_of_days;

		$invoices      = TrialBalance::GetInstance()->getInvoices( $start_date, $end_date );
		$total_invoice = 0;
		foreach ( $invoices as $invoice ) {
			$total_invoice += $invoice->amount_after_fine_and_discount;
		}

		$payments = TrialBalance::GetInstance()->getPayments( $start_date, $end_date );

		$total_payment  = 0;
		$total_discount = 0;

		foreach ( $payments as $payment ) {
			$total_payment  += $payment->paid_amount;
			$total_discount += $payment->discount;
		}

		$accounts_receivable = $total_invoice - $total_payment - $total_discount;

		$incomes      = TrialBalance::GetInstance()->getIncomes( $start_date, $end_date );
		$total_income = 0;
		foreach ( $incomes as $income ) {
			$total_income += $income->amount;
		}

		$expenses      = TrialBalance::GetInstance()->getExpenses( $start_date, $end_date );
		$total_expense = 0;
		foreach ( $expenses as $expense ) {
			$total_expense += $expense->amount;
		}

		$cash_payment_method_id = 0;
		//$cheque_payment_method_id = 0;
		$payment_methods = Payment_Method::GetInstance()->getAll();
		foreach ( $payment_methods as $payment_method ) {
			if ( strtolower( trim( $payment_method->payment_method_name ) ) == "cash" ) {
				$cash_payment_method_id = $payment_method->id;
			}/* else {
				$cheque_payment_method_id = $payment_method->id;
			}*/
		}

		$cash_in_hand           = 0;
		$received_cash_payments = TrialBalance::GetInstance()->getReceivedCashes( $start_date, $end_date, $cash_payment_method_id );
		foreach ( $received_cash_payments as $received_cash_payment ) {
			$cash_in_hand += $received_cash_payment->amount;
		}

		/*$cash_in_bank             = 0;
		$received_cheque_payments = TrialBalance::GetInstance()->getReceivedCashes( $start_date, $end_date, $cheque_payment_method_id );
		foreach ( $received_cheque_payments as $received_cheque_payment ) {
			$cash_in_hand += $received_cheque_payment->amount;
		}*/

		$banks        = Bank::GetInstance()->getAll();
		$bank_details = array();
		foreach ( $banks as $bank ) {
			$balance          = 0;
			$bank_wise_detail = BankWiseTransaction::GetInstance()->getPreviousBalance( $bank->id );
			if ( $bank_wise_detail == false ) {
				$bank->balance = $balance;
			} else {
				$bank->balance = $balance + $bank_wise_detail->balance;
			}
			array_push( $bank_details, $bank );
		}

		$data = [
			'accounts_receivable' => $accounts_receivable,
			'payments'            => $total_payment,
			'incomes'             => $total_income,
			'expenses'            => $total_expense,
			'cash_in_hand'        => $cash_in_hand,
			'bank_details'        => $bank_details
		];
		$this->view( 'accounts/trial_balance/index', $data );
	}
}