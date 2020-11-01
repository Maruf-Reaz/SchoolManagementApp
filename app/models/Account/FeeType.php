<?php
/**
 * Created by Arman
 * Date: 9/18/2018
 * Time: 2:35 PM
 */

namespace App\Models\Account;

use App\Libraries\Database;
use App\Libraries\Model;

class FeeType extends Model {
	protected static $table_name = 'db_account_fee_types';
	protected static $db_fields = [ 'id', 'fee_type_name', 'note' ];

	public $db_object;

	public $id;
	public $fee_type_name;
	public $note;

	public function __construct() {
		$this->db_object = new Database();
	}
}