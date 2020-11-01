<?php

namespace App\Models\Account;

use App\Libraries\Database;
use App\Libraries\Model;

class Fee extends Model {
	protected static $table_name = 'db_account_fees';
	protected static $db_fields = [
		'id',
		'class_id',
		'fee_type_id',
		'fee_amount'
	];

	public $db_object;

	public $id;
	public $class_id;
	public $fee_type_id;
	public $fee_amount;

	public function __construct() {
		$this->db_object = new Database();
	}

	public function getAllFees() {
		$this->db_object->query( 'SELECT db_account_fees.id,db_account_fees.class_id,db_account_fees.fee_type_id,db_academic_classes.name AS class_name,db_account_fee_types.fee_type_name,db_account_fees.fee_amount FROM db_account_fees
										JOIN db_academic_classes ON
										db_account_fees.class_id = db_academic_classes.id
										JOIN db_account_fee_types ON
										db_account_fees.fee_type_id = db_account_fee_types.id' );
		$this->db_object->execute();

		$result = $this->db_object->resultSet();

		return $result;
	}

	public function doesFeeExist( $class_id, $fee_type_id ) {
		$this->db_object->query( 'SELECT * FROM db_account_fees WHERE class_id=:class_id AND fee_type_id=:fee_type_id' );
		$this->db_object->bind( ':class_id', $class_id );
		$this->db_object->bind( ':fee_type_id', $fee_type_id );

		$result = $this->db_object->single();

		if ( $result != null ) {
			return true;
		} else {
			return false;
		}
	}

	public function getFeeById( $id ) {
		$this->db_object->query( 'SELECT db_account_fees.id,db_account_fees.class_id,db_account_fees.fee_type_id,db_academic_classes.name AS class_name,db_account_fee_types.fee_type_name,db_account_fees.fee_amount FROM db_account_fees
										JOIN db_academic_classes ON
										db_account_fees.class_id = db_academic_classes.id
										JOIN db_account_fee_types ON
										db_account_fees.fee_type_id = db_account_fee_types.id WHERE db_account_fees.id=:id' );
		$this->db_object->bind( ':id', $id );

		$result = $this->db_object->single();

		return $result;
	}
}