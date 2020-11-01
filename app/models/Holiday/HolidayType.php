<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 11/23/2018
 * Time: 4:43 PM
 */

namespace App\Models\Holiday;


use App\Libraries\Database;
use App\Libraries\Model;

class HolidayType extends Model {

	protected static $table_name = 'db_holiday_holiday_types';
	protected static $db_fields = [ 'id', 'name', 'is_group', 'short_form' ];

	public $id;
	public $name;
	public $is_group;
	public $short_form;

	public $db_object;

	public function __construct(Database $db = null) {
		if (!$db) {
			$this->db_object = new Database();
		} else {
			$this->db_object = $db;
		}
	}

	public function getGroupHoliday() {
		$this->db_object = new Database();
		$this->db_object->query( 'SELECT * FROM db_holiday_holiday_types WHERE is_group = 1' );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getIndividualHoliday() {
		$this->db_object = new Database();
		$this->db_object->query( 'SELECT * FROM db_holiday_holiday_types WHERE is_group= 0 ' );
		$result = $this->db_object->resultSet();

		return $result;
	}


}