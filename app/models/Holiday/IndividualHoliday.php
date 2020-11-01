<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 12/10/2018
 * Time: 11:41 AM
 */

namespace App\Models\Holiday;

use App\Libraries\Database;
use App\Libraries\Model;

class IndividualHoliday extends Model {

	public static $allowed_role = [ 'Teacher', 'Employee', 'Student' ];

	protected static $table_name = 'db_holiday_individual_holidays';
	/*db object*/
	protected static $db_fields = [
		'id',
		'type_id',
		'role_id',
		'registration_no',
		'from_date',
		'to_date',
	];

	public $db_object;
	public $id;
	public $type_id;
	public $role_id;
	public $registration_no;
	public $from_date;
	public $to_date;

	public function __construct() {
		$this->db_object = new Database();
	}

	/*public function getStudentHolidaysByMonth( $registration_no, $current_year, $current_month ) {
		$sql = 'SELECT * FROM db_holiday_individual_holidays WHERE registration_no=:registration_no AND
 YEAR(db_holiday_individual_holidays.from_date) =:year AND MONTH(db_holiday_individual_holidays.from_date) = :month  ';

		$this->db_object->query( $sql );
		$this->db_object->bind( ':year', $current_year );
		$this->db_object->bind( ':month', $current_month );
		$this->db_object->bind( ':registration_no', $registration_no );

		$result = $this->db_object->resultSet();

		return $result;
	}*/
	public function getStudentHolidaysByMonth( $registration_no, $current_year, $current_month ) {
		$sql = 'SELECT db_holiday_individual_holidays.id , db_holiday_individual_holidays.from_date,db_holiday_individual_holidays.to_date,
db_holiday_holiday_types.id AS type_id,db_holiday_holiday_types.short_form
FROM db_holiday_individual_holidays
LEFT JOIN db_holiday_holiday_types
ON db_holiday_individual_holidays.type_id=db_holiday_holiday_types.id
WHERE registration_no=:registration_no AND
 YEAR(db_holiday_individual_holidays.from_date) =:year AND MONTH(db_holiday_individual_holidays.from_date) = :month  ';

		$this->db_object->query( $sql );
		$this->db_object->bind( ':year', $current_year );
		$this->db_object->bind( ':month', $current_month );
		$this->db_object->bind( ':registration_no', $registration_no );

		$result = $this->db_object->resultSet();

		return $result;
	}

}