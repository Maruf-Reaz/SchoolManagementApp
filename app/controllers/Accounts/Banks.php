<?php
/**
 * Created by PhpStorm.
 * User: Arman
 * Date: 12/13/2018
 * Time: 12:27 PM
 */

namespace App\Controllers\Accounts;

use App\Libraries\Controller;
use App\Libraries\Http\Request;
use App\Models\Account\Bank;
use App\Models\Account\BankWiseTransaction;
use Carbon\Carbon;

class Banks extends Controller {

	public function index() {
		$banks = Bank::GetInstance()->getAll();
		$data  = [ 'banks' => $banks ];
		$this->view( 'accounts/banks/index', $data );
	}

	public function add() {
		if ( POST ) {
			$bank            = new Bank();
			$bank->bank_name = $_POST['bank_name'];
			$bank->note      = $_POST['note'];
			if ( $bank->create() ) {
				redirect( 'accounts/banks/index' );
			}
		} else {
			$this->view( 'accounts/banks/add' );
		}
	}

	public function manageAccount( $id = 0 ) {
		if ( POST ) {
			$bank_wise_transaction          = new BankWiseTransaction();
			$bank_wise_transaction->bank_id = Request::post( 'bank_id' );
			if ( strtolower( trim( Request::post( 'action' ) ) ) == "deposit" ) {
				$bank_wise_transaction->debit  = Request::post( 'amount' );
				$bank_wise_transaction->credit = 0;
			} else {
				$bank_wise_transaction->debit  = 0;
				$bank_wise_transaction->credit = Request::post( 'amount' );
			}
			$bank_wise_transaction->maker_id = 5;

			$previous_balance_of_bank = BankWiseTransaction::GetInstance()->getPreviousBalance( Request::post( 'bank_id' ) );
			if ( $previous_balance_of_bank == false ) {
				$bank_wise_transaction->balance = $bank_wise_transaction->credit - $bank_wise_transaction->debit;
			} else {
				$bank_wise_transaction->balance = $previous_balance_of_bank->balance + $bank_wise_transaction->debit - $bank_wise_transaction->credit;
			}
			$bank_wise_transaction->date = trim( date( 'Y-m-d' ) );
			//$bank_wise_transaction->date = Carbon::today();

			if ( $bank_wise_transaction->create() ) {
				$bank_wise_transaction_details = BankWiseTransaction::GetInstance()->getBankWiseTransactionDetails( Request::post( 'bank_id' ) );
				$data                          = [ 'bank_wise_transaction_details' => $bank_wise_transaction_details ];
				$this->view( 'accounts/banks/showTransactionDetails', $data );
			}

		} else {
			$bank = Bank::GetInstance()->getById( $id );
			$data = [ 'bank' => $bank ];
			$this->view( 'accounts/banks/manageaccount', $data );
		}
	}

	public function showBankDetails( $id = 0 ) {
		$bank_wise_transaction_details = BankWiseTransaction::GetInstance()->getBankWiseTransactionDetails( $id );
		$data                          = [ 'bank_wise_transaction_details' => $bank_wise_transaction_details ];
		$this->view( 'accounts/banks/showTransactionDetails', $data );
	}
}