<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 12/5/2018
 * Time: 1:17 PM
 */

namespace App\Controllers\Holidays;


use App\Libraries\Controller;
use App\Libraries\http\Response;
use App\Libraries\Validation;

class CalendarEvents extends Controller {
	public function getEvents() {
		$result1 = [
			'id'    => "1",
			'title' => "Eid Ul Azha",
			'start' => "2018/12/2 10:12:12",
			'end'   => "2018/12/3 12:12:12",

		];
		$result2 = [
			'id'        => "2",
			'title'     => "Holiday 1",
			'start'     => "2018/12/27 10:12:12",
			'end'       => "2018/12/29 12:12:12",
		];
		$result3 = [
			'id'    => "3",
			'title' => "Meeting",
			'start' => "2018/12/17 10:12:12",
			'end'   => "2018/12/18 12:12:12",
		];
		$result4 = [
			'id'    => "4",
			'title' => "Event",
			'start' => "2018/12/7 10:12:12",
			'end'   => "2018/12/7 12:12:12",
		];
		$result5 = [
			'id'    => "5",
			'title' => "Vacation",
			'start' => "2018/12/19 10:12:12",
			'end'   => "2018/12/19 12:12:12",
		];
		$data[]  = $result1;
		$data[]  = $result2;
		$data[]  = $result3;
		$data[]  = $result4;
		$data[]  = $result5;

		return Response::json( $data );
	}

	public function createEvents() {
		$validation = new Validation();
	}
}