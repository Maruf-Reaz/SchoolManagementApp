<?php

namespace App\Models\Mark;

use App\Libraries\Database;
use App\Libraries\Model;

//written by
//Maruf
//10-9-2018


class MarkDistribution extends Model {
	protected static $table_name = "db_mark_mark_distributions";
	protected static $db_fields = [
		'id',
		'type',
		'value',
		'class_id',
	];
	public $id;
	public $type;
	public $value;
	public $class_id;
	protected $db_object;

	public function __construct() {
		$this->db_object = new Database();
	}

	public function totalSum($class_id,$id) {
		$this->db_object->query( 'SELECT SUM(VALUE) AS totalMark FROM db_mark_mark_distributions_view WHERE class_id=:class_id AND id!=:id; ');
		$this->db_object->bind( ':class_id', $class_id );
		$this->db_object->bind( ':id', $id );
		$result = $this->db_object->single();
		return $result;
	}


	public function getMarkDistributionIdByType($mark_type) {
		$this->db_object->query( 'SELECT id FROM db_mark_mark_distributions WHERE type=:type; ' );
		$this->db_object->bind( ':type', $mark_type );
		$this->db_object->execute();
		$result = $this->db_object->single();
		return $result;
	}

	public function getAllMarkDistributions(){
		$this->db_object->query( 'SELECT * FROM db_mark_mark_distributions_view; ' );
		$this->db_object->execute();
		$result = $this->db_object->resultSet();
		return $result;
	}
	public function getMarkDistributionsByClass($class_id) {
		$this->db_object->query( 'SELECT * FROM db_mark_mark_distributions_view WHERE class_id=:class_id; ' );
		$this->db_object->bind( ':class_id', $class_id );
		$this->db_object->execute();
		$result = $this->db_object->resultSet();
		return $result;
	}
	public function getMarkDistributionById($id){
		$this->db_object->query( 'SELECT * FROM db_mark_mark_distributions_view WHERE id=:id; ' );
		$this->db_object->bind( ':id',$id );
		$this->db_object->execute();
		$result = $this->db_object->single();
		return $result;
	}




}
