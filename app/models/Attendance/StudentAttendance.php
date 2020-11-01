<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 10/18/2018
 * Time: 12:19 AM
 */

namespace App\Models\Attendance;


use App\Libraries\Database;
use App\Libraries\Model;
use App\Models\Holiday\GlobalHoliday;
use App\Models\Holiday\Holiday;
use App\Models\Holiday\IndividualHoliday;
use App\Models\Student;
use Carbon\Carbon;

class StudentAttendance extends Model {

	protected static $table_name = 'db_attendance_student_att';
	protected static $db_fields = [ 'id', 'student_id', 'status', 'datetime', 'note' ];

	/**
	 * Properties
	 */

	public $id;
	public $student_id;
	public $status;
	public $datetime;
	public $note;

	protected $db_object;

	public function __construct() {
		$this->db_object = new Database();
	}

	/**
	 * @param $current_year
	 * @param $current_month
	 * @param int $class_id
	 * @param int $section_id
	 *
	 * @return array
	 */
	public function getAllStudentAttendanceReportByMonth( $current_year, $current_month, $class_id = 0, $section_id = 0 ) {
		/* Get all student */
		$students      = ( new Student() )->getStudentByClassAndSection( $class_id, $section_id );
		$date          = Carbon::create( $current_year, $current_month, 1 );
		$days_in_month = $date->daysInMonth;

		$student_attendances = [];
		$global_holiday      = GlobalHoliday::GetInstance()->getGlobalAndGroupHolidayByMonth( $current_year, $current_month );

		foreach ( $students as $student ) {
			//Get All hilidays for the Month
			$individual_holidays = IndividualHoliday::GetInstance()->getStudentHolidaysByMonth( $student->registration_no, $current_year, $current_month );
			//$holidays            = $this->getStudentHolidaysByMonth( $student->registration_no, $current_year, $current_month );
			//Get All the Attendance for the month
			$attendance = $this->getStudentAttendanceMonthlyReport( $current_year, $current_month, $class_id, $section_id, $student->id );
			//this varable contains the
			//$monthly_attendance = $this->generateAttendanceDateArr( $attendance, $holidays, $days_in_month );
			$monthly_attendance = $this->generateAttendanceDateArr( $attendance, $global_holiday, $individual_holidays, $days_in_month );

			$row                  = [];
			$row['id']            = $student->id;
			$row['roll']          = $student->roll_no;
			$row['name']          = $student->student_name;
			$row['days']          = $monthly_attendance['days'];
			$row['total_present'] = $monthly_attendance['total_present'];
			$row['total_absent']  = $monthly_attendance['total_absent'];

			$student_attendances[] = $row;
		}

		return $student_attendances;
	}

	/**
	 * @param $current_year
	 * @param $current_month
	 * @param int $class_id
	 * @param int $section_id
	 * @param int $student_id
	 *
	 * @return mixed
	 */
	private function getStudentAttendanceMonthlyReport( $current_year, $current_month, $class_id = 0, $section_id = 0, $student_id = 0 ) {
		$db_object = new Database();
		$sql       = 'SELECT db_student_assignments_view.id AS student_id, 
		db_student_assignments_view.section_id,db_student_assignments_view.class_id,db_attendance_student_att.status,
		db_attendance_student_att.datetime
		FROM db_student_assignments_view 
		LEFT JOIN db_attendance_student_att
		ON db_student_assignments_view.id =db_attendance_student_att.student_id WHERE YEAR(datetime) =:year AND MONTH(datetime) = :month  
		AND class_id = :class_id AND  section_id= :section_id AND  student_id= :student_id';

		$db_object->query( $sql );
		$db_object->bind( ':year', $current_year );
		$db_object->bind( ':month', $current_month );
		$db_object->bind( ':class_id', $class_id );
		$db_object->bind( ':section_id', $section_id );
		$db_object->bind( ':student_id', $student_id );

		$result = $db_object->resultSet();

		return $result;
	}

	/**
	 * @param StudentAttendance $attendacnes
	 * @param $days_in_month
	 * @param GlobalHoliday $global_holiday
	 * @param IndividualHoliday $individual_holiday
	 *
	 * @return array
	 */
	private function generateAttendanceDateArr( $attendacnes, $global_holiday, $individual_holiday, $days_in_month ) {
		$att                    = [];
		$att['total_present']   = 0;
		$att['total_absent']    = 0;
		$global_holiday_arr     = $this->convertHolidayToDateArray( $global_holiday );
		$individual_holiday_arr = $this->convertHolidayToDateArray( $individual_holiday );
		//$holiday_arr            = $this->convertHolidayToDateArray( $global_holiday );
		for ( $i = 1; $i <= $days_in_month; $i ++ ) {
			$att['days'][ $i ] = '_';
		}
		foreach ( $attendacnes as $attendacne ) {
			$date = Carbon::parse( $attendacne->datetime )->day;
			if ( $date ) {
				if ( $attendacne->status == 1 ) {
					$att['days'][ $date ] = 'P';
					$att['total_present'] += 1;
				} elseif ( $attendacne->status == 0 ) {
					$att['days'][ $date ] = 'A';
					$att['total_absent']  += 1;
				} else {
					$att['days'][ $date ] = '_';
				}
			}
		}

		if ( $individual_holiday_arr != null ) {
			foreach ( $individual_holiday_arr as $key => $holiday ) {
				$att['days'][ $key ] = $holiday;
			}
		}

		if ( $global_holiday_arr != null ) {
			foreach ( $global_holiday_arr as $key => $holiday ) {
				$att['days'][ $key ] = $holiday;
			}
		}

		return $att;
	}

	/**
	 * @param Holiday $holidays
	 *
	 * @return array $date_arr
	 * */
	private function convertHolidayToDateArray( $holidays = null ) {
		if ( $holidays ) {
			$date_arr = [];
			foreach ( $holidays as $holiday ) {
				$from_date = Carbon::parse( $holiday->from_date )->day;
				$to_date   = Carbon::parse( $holiday->to_date )->day;
				for ( $date = $from_date; $date <= $to_date; $date ++ ) {
					$date_arr[ $date ] = $holiday->short_form;
				}
			}

			return $date_arr;
		}
	}

	public function getStudentHolidaysByMonth( $registration_no, $current_year, $current_month ) {
		$db_object = new Database();
		$sql       = 'SELECT * FROM `db_holiday_holidays`
LEFT JOIN `db_holiday_holiday_types`
ON db_holiday_holidays.type_id=db_holiday_holiday_types.id
 WHERE (recurrence=1  AND MONTH(db_holiday_holidays.from_date) = :month)
 OR(is_group=1 AND YEAR(db_holiday_holidays.from_date) =:year AND MONTH(db_holiday_holidays.from_date) =:month)
  OR (YEAR(db_holiday_holidays.from_date) =:year AND MONTH(db_holiday_holidays.from_date) = :month AND registration_no= :registration_no)';

		$db_object->query( $sql );
		$db_object->bind( ':year', $current_year );
		$db_object->bind( ':month', $current_month );
		$db_object->bind( ':registration_no', $registration_no );

		$result = $db_object->resultSet();

		return $result;
	}

	/**
	 * @param $class_id
	 * @param $section_id
	 * @param $datetime
	 *
	 * @return mixed
	 */
	public function getStudentByClassAndSection( $class_id, $section_id, $datetime ) {
		$this->db_object->query( "SELECT
  db_student_assignments_view.id,
  db_student_assignments_view.student_name,
  db_student_assignments_view.roll_no,
  db_student_assignments_view.section_id,
  db_student_assignments_view.class_id,
  db_attendance_student_att.status,
  db_attendance_student_att.datetime,
  db_attendance_student_att.note,
  db_attendance_student_att.id as attendance_id 
  FROM db_student_assignments_view
  RIGHT JOIN db_attendance_student_att
    ON  db_attendance_student_att.student_id = db_student_assignments_view.id
WHERE class_id =:class_id AND section_id=:section_id AND datetime =:datetime GROUP BY  db_student_assignments_view.id " );
		$this->db_object->bind( ':class_id', $class_id );
		$this->db_object->bind( ':section_id', $section_id );
		$this->db_object->bind( ':datetime', $datetime );
		$result = $this->db_object->resultSet();

		return $result;

	}

	/**
	 *
	 * @param $year int
	 * @param $month int
	 *
	 * @return array
	 */

	public function getAllDayNamesByMonth( $year, $month ) {
		$date          = Carbon::create( $year, $month, 1 );
		$days_in_month = $date->daysInMonth;
		$day_names     = [];
		for ( $i = 1; $i <= $days_in_month; $i ++ ) {
			$day_names[] = $date->isoFormat( 'dd' );
			$date->addDays();
		}

		return $day_names;
	}

	/**
	 *
	 * @param Date $start_date
	 *
	 * @return array
	 */

	public function getAallDayNamesByWeek( $start_date ) {
		$date      = Carbon::create( $start_date );
		$day_names = [];
		for ( $i = 1; $i <= 7; $i ++ ) {
			$day_names[ $date->day ] = $date->isoFormat( 'dddd' );
			$date->addDays();
		}

		return $day_names;
	}

	/**
	 * @param $start_date
	 * @param int $class_id
	 * @param int $section_id
	 *
	 * @return array
	 */
	public function getAllStudentAttendanceReportByWeek( $start_date, $class_id = 0, $section_id = 0 ) {
		/* Get all student */
		$students            = ( new Student() )->getStudentByClassAndSection( $class_id, $section_id );
		$date                = Carbon::create( $start_date )->toImmutable();
		$start_date          = $date->format( 'Y-m-d' );
		$end_date            = $date->addDays( 6 )->format( 'Y-m-d' );
		$global_holiday      = GlobalHoliday::GetInstance()->getGlobalAndGroupHolidayByMonth( $date->year, $date->month );
		$student_attendances = [];

		foreach ( $students as $student ) {
			$result              = $this->getStudentAttendanceWeelyReport( $start_date, $end_date, $class_id, $section_id, $student->id );
			$individual_holidays = IndividualHoliday::GetInstance()->getStudentHolidaysByMonth( $student->registration_no, $date->year, $date->month );
			$monthly_attendance  = $this->generateWeeklyAttendanceDateArr( $result, $global_holiday, $individual_holidays, $start_date );

			$row                  = [];
			$row['id']            = $student->id;
			$row['roll']          = $student->roll_no;
			$row['name']          = $student->student_name;
			$row['days']          = $monthly_attendance['days'];
			$row['total_present'] = $monthly_attendance['total_present'];
			$row['total_absent']  = $monthly_attendance['total_absent'];

			$student_attendances[] = $row;
		}

		return $student_attendances;
	}

	/**
	 * @param $start_date
	 * @param $end_date
	 * @param int $class_id
	 * @param int $section_id
	 * @param int $student_id
	 *
	 * @return mixed
	 */
	private function getStudentAttendanceWeelyReport( $start_date, $end_date, $class_id = 0, $section_id = 0, $student_id = 0 ) {
		$db_object = new Database();
		$sql       = 'SELECT db_student_assignments_view.id AS student_id, 
		db_student_assignments_view.section_id,db_student_assignments_view.class_id,db_attendance_student_att.status,
		db_attendance_student_att.datetime
		FROM db_student_assignments_view 
		LEFT JOIN db_attendance_student_att
		ON db_student_assignments_view.id =db_attendance_student_att.student_id WHERE DATE(datetime) BETWEEN :start_date AND :end_date
		AND class_id = :class_id AND  section_id= :section_id AND  student_id= :student_id';

		$db_object->query( $sql );
		$db_object->bind( ':start_date', $start_date );
		$db_object->bind( ':end_date', $end_date );
		$db_object->bind( ':class_id', $class_id );
		$db_object->bind( ':section_id', $section_id );
		$db_object->bind( ':student_id', $student_id );

		$result = $db_object->resultSet();

		return $result;
	}

	/**
	 *
	 * @param StudentAttendance $attendacnes
	 * @param GlobalHoliday $global_holiday
	 * @param IndividualHoliday $individual_holiday
	 *
	 * @param Carbon $start_date
	 *
	 * @return array
	 */
	private function generateWeeklyAttendanceDateArr( $attendacnes, $global_holiday, $individual_holiday, $start_date = null ) {
		$att                    = [];
		$att['total_present']   = 0;
		$att['total_absent']    = 0;
		$global_holiday_arr     = $this->convertHolidayToDateArray( $global_holiday );
		$individual_holiday_arr = $this->convertHolidayToDateArray( $individual_holiday );
		$date                   = Carbon::create( $start_date );
		for ( $i = 1; $i <= 7; $i ++ ) {
			$att['days'][ $date->day ] = '_';
			$date->addDays( 1 );
		}
		foreach ( $attendacnes as $attendacne ) {
			$date = Carbon::parse( $attendacne->datetime )->day;
			if ( $date ) {
				if ( $attendacne->status == 1 ) {
					$att['days'][ $date ] = 'P';
					$att['total_present'] += 1;
				} elseif ( $attendacne->status == 0 ) {
					$att['days'][ $date ] = 'A';
					$att['total_absent']  += 1;
				} else {
					$att['days'][ $date ] = '_';
				}
			}
		}

		if ( $individual_holiday_arr != null ) {
			foreach ( $individual_holiday_arr as $key => $holiday ) {
				if ( array_key_exists( $key, $att['days'] ) ) {
					$att['days'][ $key ] = $holiday;
				}
			}
		}

		if ( $global_holiday_arr != null ) {
			foreach ( $global_holiday_arr as $key => $holiday ) {
				if ( array_key_exists( $key, $att['days'] ) ) {
					$att['days'][ $key ] = $holiday;
				}
			}
		}

		return $att;
	}

	public function getWorkingdaysForMonth( $current_year, $current_month, $day_name ) {
		$days_in_month   = Carbon::createFromDate( $current_year, $current_month, 1 )->daysInMonth;
		$weekends        = GlobalHoliday::GetInstance()->getNumberOfWeekendByMonth( $current_year, $current_month, $day_name );
		$global_holidays = GlobalHoliday::GetInstance()->getGlobalAndGroupHolidayByMonth( $current_year, $current_month );

		$working_days = $days_in_month - ( $weekends + count( $global_holidays ) );

		return $working_days;
	}

	private function getGlobalAndGroupHolidayByMonth( $current_year, $current_month ) {
		$db_object = new Database();
		$sql       = 'SELECT * FROM `db_holiday_holidays`
		LEFT JOIN `db_holiday_holiday_types`
		ON db_holiday_holidays.type_id=db_holiday_holiday_types.id
 		WHERE (recurrence=1  AND MONTH(db_holiday_holidays.from_date) = :month)
		OR(is_group=1 AND YEAR(db_holiday_holidays.from_date) =:year AND MONTH(db_holiday_holidays.from_date) =:month)';

		$db_object->query( $sql );
		$db_object->bind( ':year', $current_year );
		$db_object->bind( ':month', $current_month );
		$result = $db_object->resultSet();

		return $result;
	}

}