<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 11/24/2018
 * Time: 2:29 PM
 */

namespace App\Controllers\Holidays;


use App\Libraries\Controller;
use App\Libraries\Database;
use App\Libraries\Http\Request;
use App\Libraries\Validation;
use App\Models\Holiday\Holiday;
use App\Models\Holiday\HolidayType;

class HolidayTypes extends Controller {
	public function add() {
		$data = [];

		$this->view( 'holidays/type_add', $data );
	}

	public function store() {
		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'name' )->value( Request::post( 'name' ) )->pattern( 'text' )->required();
			$validation->name( 'short_form' )->value( Request::post( 'short_form' ) )->pattern( 'text' )->required();
			$validation->name( 'is_group' )->value( Request::post( 'is_group' ) )->pattern( 'int' )->required();

			if ( $validation->isSuccess() ) {
				$holiday_type             = new HolidayType();
				$holiday_type->name       = Request::post( 'name' );
				$holiday_type->is_group   = Request::post( 'is_group' );
				$holiday_type->short_form = Request::post( 'short_form' );

				if ( $holiday_type->save() ) {
					flash( 'holiday_type', 'Holiday Type Saved' );
					redirect( 'holidays/holiday-types/index' );
				} else {
					flash( 'holiday_type', 'Holiday Type failed to save', 'alert alert-danger' );
					redirect( 'holidays/holiday-types/index' );
				}
			}
		}
	}

	public function index() {
		$holiday_types = ( new HolidayType() )->getAll();
		$data          = [
			'holiday_types' => $holiday_types
		];

		$this->view( 'holidays/type_index', $data );
	}

	public function edit( $id = 0 ) {
		if ( $id != 0 ) {
			$validation = new Validation();
			$validation->name( 'id' )->value( $id )->pattern( 'int' )->required();

			if ( $validation->isSuccess() ) {
				//Pass this object to constructor and GetInstance Method
				$db = new Database();
				if ( HolidayType::GetInstance($db)->isExist( 'id', $id ) ) {
					$holiday_type = HolidayType::GetInstance($db)->getById( $id );
					$data         = [
						'holiday_type' => $holiday_type,
					];

					$this->view( 'holidays/type_edit', $data );

				} else {
					redirect( 'holidays/holiday-types/index' );
				}
			}
		} else {
			redirect( 'holidays/holiday-types/index' );
		}
	}

	public function update() {
		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'id' )->value( Request::post( 'id' ) )->pattern( 'int' )->required();
			$validation->name( 'name' )->value( Request::post( 'name' ) )->pattern( 'text' )->required();
			$validation->name( 'short_form' )->value( Request::post( 'short_form' ) )->pattern( 'text' )->required();
			$validation->name( 'is_group' )->value( Request::post( 'is_group' ) )->pattern( 'int' )->required();

			if ( $validation->isSuccess() ) {
				$db = new Database();
				$holiday_type = ( new HolidayType($db) )->getById( Request::post( 'id' ) );
				if ( $holiday_type == null ) {
					redirect( 'holidays/type_index' );
				} else {
					$holiday_type->name       = Request::post( 'name' );
					$holiday_type->is_group   = Request::post( 'is_group' );
					$holiday_type->short_form = Request::post( 'short_form' );
					if ( $holiday_type->save() ) {
						flash( 'holiday_type', 'Holiday Type Updated' );
						redirect( 'holidays/holiday-types/index' );
					} else {
						$data = [
							'holiday_type' => $holiday_type,
						];

						$this->view( 'holidays/type_edit', $data );
					}

				}
			}
		}
	}

	public function delete( $id = 0 ) {
		if ( $id != 0 || Holiday::GetInstance()->isExist( 'id', $id ) ) {
			$holdiay_type = HolidayType::GetInstance()->getById( $id );
			if ( $holdiay_type->delete() ) {
				flash( 'holiday_message', 'Holiday Type deleted' );
				redirect( 'holidays/Holidays/index' );
			} else {
				redirect( 'holidays/Holidays/index' );
			}
		} else {
			redirect( 'holidays/Holidays/index' );
		}

	}
}