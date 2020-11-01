<?php
/**
 * Created by PhpStorm.
 * User: Arman
 * Date: 12/11/2018
 * Time: 12:02 PM
 */

namespace App\Models\Account;

class AccountantWisePayment {
	public $receiver_id;
	public $receiver_name;
	public $total_payments_received;
	public $total_discount;
	public $total_income_received;
	public $total_expense_done;
	public $total_received_amount;
	public $date;
	public $payment_method_id;
	public $payment_method_name;
	public $flag;
}