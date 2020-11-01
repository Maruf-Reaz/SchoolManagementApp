<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 12/10/2018
 * Time: 11:40 AM
 */

namespace App\Models\Holiday;


use App\Libraries\Database;
use App\Libraries\Model;
use Carbon\Carbon;

class GlobalHoliday extends Model {

	public static $weekend_days = [ 'Friday' ];
	/*db object*/
	protected static $table_name = 'db_holiday_global_holidays';
	protected static $db_fields = [ 'id', 'type_id', 'name', 'from_date', 'to_date', 'remarks', 'recurrence' ];
	public $db_object;

	public $id;
	public $type_id;
	public $name;
	public $from_date;
	public $to_date;
	public $remarks;
	public $recurrence;

	public function __construct() {
		$this->db_object = new Database();
	}

	/*public function getGlobalAndGroupHolidayByMonth( $current_year, $current_month ) {
		$db_object = new Database();
		$sql       = 'SELECT * FROM db_holiday_global_holidays
 WHERE (recurrence=1  AND MONTH(db_holiday_global_holidays.from_date) = :month)
 OR (YEAR(db_holiday_global_holidays.from_date) =:year AND MONTH(db_holiday_global_holidays.from_date) =:month)';

		$db_object->query( $sql );
		$db_object->bind( ':year', $current_year );
		$db_object->bind( ':month', $current_month );
		$result = $db_object->resultSet();

		return $result;
	}*/

	public function getGlobalAndGroupHolidayByMonth( $current_year, $current_month ) {
		$db_object = new Database();
		$sql       = 'SELECT db_holiday_global_holidays.id , db_holiday_global_holidays.name AS holiday_name,
		db_holiday_global_holidays.from_date , db_holiday_global_holidays.to_date , db_holiday_global_holidays.remarks,
 		db_holiday_holiday_types.id AS type_name,db_holiday_holiday_types.short_form,db_holiday_global_holidays.recurrence
		FROM db_holiday_global_holidays
		LEFT JOIN db_holiday_holiday_types
		ON db_holiday_global_holidays.type_id=db_holiday_holiday_types.id
		WHERE (recurrence=1  AND MONTH(db_holiday_global_holidays.from_date) = :month)
 		OR (YEAR(db_holiday_global_holidays.from_date) =:year AND MONTH(db_holiday_global_holidays.from_date) =:month)';

		$db_object->query( $sql );
		$db_object->bind( ':year', $current_year );
		$db_object->bind( ':month', $current_month );
		$result = $db_object->resultSet();

		return $result;
	}

	public function getNumberOfWeekendByMonth( $current_year, $current_month, $weekends = [] ) {
		$number_of_weekends = 0;
		foreach ( $weekends as $weekend ) {
			$date          = Carbon::createFromDate( $current_year, $current_month, 1 );
			$days_in_month = $date->daysInMonth;
			for ( $i = 1; $i <= $days_in_month; $i ++ ) {
				if ( $date->isoFormat( 'dddd' ) == $weekend ) {
					$number_of_weekends += 1;
				}
				$date->addDay();
			}

		}

		return $number_of_weekends;
	}

}