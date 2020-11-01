<?php
/**
 * Created by PhpStorm.
 * User: Arman
 * Date: 11/22/2018
 * Time: 1:41 PM
 */

namespace App\Models\Account;

use App\Libraries\Database;
use App\Libraries\Model;

class ExpenseType extends Model {
	public static $table_name = 'db_account_expense_types';
	public static $db_fields = [
		'id',
		'expense_type_name',
		'note'
	];

	public $db_object;

	public $id;
	public $expense_type_name;
	public $note;

	public function __construct() {
		$this->db_object = new Database();
	}
}