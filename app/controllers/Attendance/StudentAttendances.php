<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 10/5/2018
 * Time: 11:02 AM
 */

namespace App\Controllers\Attendance;


use App\Libraries\Http\Request;
use App\Libraries\Validation;
use App\Models\Academic\AcademicClass;
use App\Libraries\Controller;
use App\Models\Academic\Section;
use App\Models\Attendance\StudentAttendance;
use App\Models\Holiday\GlobalHoliday;
use App\Models\Student;
use Carbon\Carbon;

class StudentAttendances extends Controller {
	public function index() {
		$this->view( 'attendance/students/index' );
	}


	public function daily() {
		if ( POST ) {
			$validation = new Validation();

			$validation->name( 'class_id' )->value( $_POST['class_id'] )->pattern( 'int' )->required();
			$validation->name( 'section_id' )->value( $_POST['section_id'] )->pattern( 'int' )->required();
			$validation->name( 'student_id' )->value( $_POST['student_id'] )->pattern( 'array' )->required();
			$validation->name( 'status' )->value( $_POST['status'] )->pattern( 'array' )->required();
			//$validation->name( 'note' )->value( $_POST['note'] )->pattern( 'text' );
			$validation->name( 'date' )->value( $_POST['date'] )->pattern( 'text' )->required();

			if ( $validation->isSuccess() ) {
				$students      = $_POST['student_id'];
				$status        = $_POST['status'];
				$date          = $_POST['date'];
				$attendance_id = $_POST['attendance_id'];
				foreach ( $students as $key => $student ) {
					$attendance             = new StudentAttendance();
					$attendance->id         = $attendance_id[ $key ] == "" ? null : $attendance_id[ $key ];//if id is null that means new record
					$attendance->student_id = $student;
					$attendance->status     = $status[ $key ];
					$attendance->datetime   = $date;
					$attendance->save();
				}

			}
		}
		$classes = ( new AcademicClass() )->getAll();
		$data    = [
			'classes' => $classes,
		];
		$this->view( 'attendance/students/take_attendance', $data );
	}

	public function dailySingle() {
		if ( POST ) {
			$validation = new Validation();

			$validation->name( 'attendance_id' )->value( Request::post( 'attendance_id' ) )->pattern( 'int' )->required();
			$validation->name( 'student_id' )->value( Request::post( 'student_id' ) )->pattern( 'int' )->required();
			$validation->name( 'status' )->value( Request::post( 'status' ) )->pattern( 'int' )->required();
			$validation->name( 'date' )->value( Request::post( 'datetime' ) )->pattern( 'text' )->required();

			if ( $validation->isSuccess() ) {

				$attendance = new StudentAttendance();
				//if id is null that means new record
				$attendance->id         = Request::post( 'attendance_id' ) == "" ? null : Request::post( 'attendance_id' );
				$attendance->student_id = Request::post( 'student_id' );
				$attendance->status     = Request::post( 'status' );
				$attendance->datetime   = Request::post( 'datetime' );

				if ( $attendance->save() ) {
					return jsonResult( true );
				} else {
					return jsonResult( false );
				}

			}
		}
	}

	public function weeklyReport() {
		$validation = new Validation();

		$validation->name( 'sdate' )->value( isset( $_GET['sdate'] ) ? $_GET['sdate'] : "" )->pattern( 'text' )->required();
		$validation->name( 'class' )->value( isset( $_GET['class'] ) ? $_GET['class'] : "" )->pattern( 'int' )->min( 1 )->required();
		$validation->name( 'section' )->value( isset( $_GET['section'] ) ? $_GET['section'] : "" )->min( 1 )->required();

		if ( $validation->isSuccess() ) {

			$start_date          = Request::get( 'sdate' );
			$class_id            = Request::get( 'class' );
			$section_id          = Request::get( 'section' );
			$date                = Carbon::parse( $start_date )->toImmutable();
			$classes             = ( new AcademicClass() )->getAll();
			$sections            = ( new Section() )->getSectionsByClass( $class_id );
			$day_names           = ( new StudentAttendance() )->getAallDayNamesByWeek( $start_date );
			$student_attendances = ( new StudentAttendance() )->getAllStudentAttendanceReportByWeek( $start_date, $class_id, $section_id );
			$next_week           = $date->addWeek()->format( 'Y-m-d' );
			$prev_week           = $date->subWeek()->format( 'Y-m-d' );
			$week_of_the_year    = $date->weekOfMonth . ' week of ' . $date->monthName . ' ' . $date->year;

		} else {

			$date                 = Carbon::now()->toImmutable();
			$classes              = ( new AcademicClass() )->getAll();
			$day_names            = null;
			$student_attendances  = null;
			$month_name_with_year = null;
			$next_week            = $date->addWeek()->format( 'Y-m-d' );
			$prev_week            = $date->subWeek()->format( 'Y-m-d' );
			$class_id             = 0;
			$section_id           = 0;
			$sections             = null;
			$week_of_the_year     = $date->weekOfYear . ' week of ' . $date->year;
		}

		$data = [
			'classes'             => $classes,
			'sections'            => $sections,
			'day_names'           => $day_names,
			'next_week'           => $next_week,
			'prev_week'           => $prev_week,
			'class_id'            => $class_id,
			'section_id'          => $section_id,
			'student_attendances' => $student_attendances,
			'week_of_the_year'    => $week_of_the_year
		];
		$this->view( 'attendance/students/weekly_report', $data );
	}

	public function monthlyReport() {
		$validation = new Validation();

		$validation->name( 'year' )->value( isset( $_GET['year'] ) ? (int) $_GET['year'] : "" )->pattern( 'int' )->min( 1950 )->max( 2050 )->required();
		$validation->name( 'month' )->value( isset( $_GET['month'] ) ? (int) $_GET['month'] : "" )->pattern( 'int' )->min( 1 )->max( 12 )->required();
		$validation->name( 'class' )->value( isset( $_GET['class'] ) ? (int) $_GET['class'] : "" )->pattern( 'int' )->min( 1 )->required();
		$validation->name( 'section' )->value( isset( $_GET['section'] ) ? (int) $_GET['section'] : "" )->min( 1 )->required();

		if ( $validation->isSuccess() ) {

			$current_year         = $_GET['year'];
			$current_month        = $_GET['month'];
			$class_id             = $_GET['class'];
			$section_id           = $_GET['section'];
			$date                 = Carbon::createFromDate( $current_year, $current_month, 1 )->toImmutable();
			$next_month           = $date->addMonth()->format( 'Y-m' );//eg- 2018-10
			$prev_month           = $date->subMonth()->format( 'Y-m' );//eg- 2017-5
			$month_name_with_year = $date->format( 'F Y' );//eg-December 2018
			$classes              = AcademicClass::GetInstance()->getAll();
			$total_working_days   = StudentAttendance::GetInstance()->getWorkingdaysForMonth( $current_year, $current_month, GlobalHoliday::$weekend_days );
			$sections             = Section::GetInstance()->getSectionsByClass( $class_id );
			$day_names            = StudentAttendance::GetInstance()->getAllDayNamesByMonth( $current_year, $current_month );
			$days_in_month        = count( $day_names );
			$student_attendances  = StudentAttendance::GetInstance()->getAllStudentAttendanceReportByMonth( $current_year, $current_month, $class_id, $section_id );

		} else {
			$date                 = Carbon::now()->toImmutable();
			$classes              = AcademicClass::GetInstance()->getAll();
			$day_names            = null;
			$days_in_month        = null;
			$total_working_days   = null;
			$student_attendances  = null;
			$month_name_with_year = null;
			$current_year         = $date->year;
			$current_month        = $date->month;
			$next_month           = $date->addMonth()->format( 'Y-m' );
			$prev_month           = $date->subMonth()->format( 'Y-m' );
			$class_id             = 0;
			$section_id           = 0;
			$sections             = null;
		}


		$data = [
			'classes'              => $classes,
			'day_names'            => $day_names,
			'days_in_month'        => $days_in_month,
			'current_year'         => $current_year,
			'current_month'        => $current_month,
			'total_working_days'   => $total_working_days,
			'month_name_with_year' => $month_name_with_year,
			'next_month'           => $next_month,
			'prev_month'           => $prev_month,
			'class_id'             => $class_id,
			'section_id'           => $section_id,
			'sections'             => $sections,
			'student_attendances'  => $student_attendances,
		];

		$this->view( 'attendance/students/monthly_report', $data );
	}

	public function getStudentByClassAndSection() {
		$validation = new Validation();

		$validation->name( 'class_id' )->value( $_POST['class_id'] )->pattern( 'int' )->required();
		$validation->name( 'section_id' )->value( $_POST['section_id'] )->pattern( 'int' )->required();
		if ( $validation->isSuccess() ) {
			$class_id   = $_POST['class_id'];
			$section_id = $_POST['section_id'];
			$datetime   = $_POST['datetime'];
			if ( $class_id != 0 && $section_id != 0 && $datetime != "" ) {
				$attended_students = ( new StudentAttendance() )->getStudentByClassAndSection( $class_id, $section_id, $datetime );
				$students          = ( new Student() )->getStudentByClassAndSection( $class_id, $section_id );
				foreach ( $students as $student ) {
					$student->status = null;
					$student->note   = null;
					$student->att_id = "";
					foreach ( $attended_students as $attended_student ) {
						if ( $student->id == $attended_student->id ) {
							$student->status = $attended_student->status;
							$student->note   = $attended_student->note;
							$student->att_id = $attended_student->attendance_id;
						}
					}
				}

				return jsonResult( $students );
			}
		}
	}
}