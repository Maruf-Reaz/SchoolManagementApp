<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 11/22/2018
 * Time: 1:08 AM
 */

namespace App\Controllers\Holidays;


use App\Libraries\Controller;
use App\Libraries\Http\Request;
use App\Libraries\http\Response;
use App\Libraries\Validation;
use App\Models\Holiday\GlobalHoliday;
use App\Models\Holiday\Holiday;
use App\Models\Holiday\HolidayType;
use App\Models\Holiday\IndividualHoliday;
use App\Models\Role;
use App\Models\Teacher;

class Holidays extends Controller {

	public function index() {
		$data = [
		];

		$this->view( 'holidays/index', $data );
	}

	public function add() {
		$holiday_types = HolidayType::GetInstance()->getAll();
		$data          = [
			'holiday_types' => $holiday_types,
		];

		$this->view( 'holidays/add', $data );
	}

	public function store() {
		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'type_id' )->value( Request::post( 'type_id' ) )->pattern( 'int' )->required();
			$validation->name( 'from_date' )->value( Request::post( 'from_date' ) )->pattern( 'text' )->required();
			$validation->name( 'to_date' )->value( Request::post( 'to_date' ) )->pattern( 'text' )->required();

			//If its Individual
			if ( isset( $_POST['group_id'] ) ) {
				$validation->name( 'group_id' )->value( Request::post( 'group_id' ) )->pattern( 'int' )->required();
				$validation->name( 'registration_no' )->value( Request::post( 'registration_no' ) )->pattern( 'text' )->required();
			} else {
				//If its Global
				$validation->name( 'recurrenece' )->value( Request::post( 'recurrence' ) )->pattern( 'text' )->required();
				$validation->name( 'name' )->value( Request::post( 'name' ) )->pattern( 'text' )->required();
				$validation->name( 'remarks' )->value( Request::post( 'remarks' ) )->pattern( 'text' )->required();
			}

			if ( $validation->isSuccess() ) {
				//If it has Role ID
				if ( isset( $_POST['group_id'] ) ) {
					$holiday                  = new IndividualHoliday();
					$holiday->type_id         = Request::post( 'type_id' );
					$holiday->role_id         = Request::post( 'group_id' );
					$holiday->registration_no = Request::post( 'registration_no' );
					$holiday->from_date       = Request::post( 'from_date' );
					$holiday->to_date         = Request::post( 'to_date' );
				} else {
					$holiday             = new GlobalHoliday();
					$holiday->type_id    = Request::post( 'type_id' );
					$holiday->name       = Request::post( 'name' );
					$holiday->from_date  = Request::post( 'from_date' );
					$holiday->to_date    = Request::post( 'to_date' );
					$holiday->remarks    = Request::post( 'remarks' );
					$holiday->recurrence = Request::post( 'recurrence' );
				}

				if ( $holiday->save() ) {
					flash( 'holiday_message', 'Holiday Successfuly Saved' );
					redirect( 'holidays/Holidays/index' );
				} else {
					flash( 'holiday_message', 'Couldn\'t Holiday Saved' );
					redirect( 'holidays/Holidays/index' );
				}
			} else {
				flash( 'holiday_message', 'Something went wrong' );
				redirect( 'holidays/Holidays/add' );
			}
		}
	}

	public function individualEdit( $id = 0 ) {
		if ( $id == 0 ) {
			redirect( 'holidays/index' );
		} else {
			$validation = new Validation();
			$validation->name( 'id' )->value( $id )->pattern( 'int' )->required();
			if ( $validation->isSuccess() ) {
				if ( IndividualHoliday::GetInstance()->isExist( 'id', $id ) ) {
					$holiday = IndividualHoliday::GetInstance()->getById( $id );
					if ( $holiday == null ) {
						redirect( 'holiday/holidays/index' );
					} else {
						$holiday_types = HolidayType::GetInstance()->getIndividualHoliday();
						$allowed_roles = Holiday::getAllowedRoles();

						$data = [
							'holiday_types' => $holiday_types,
							'holiday'       => $holiday,
							'allowed_roles' => $allowed_roles,
						];

						$this->view( 'holidays/individual_edit', $data );
					}
				} else {
					redirect( 'holidays/holidays/index' );
				}
			}
		}

	}

	public function globalEdit( $id = 0 ) {
		if ( $id == 0 ) {
			redirect( 'holidays/holidays/index' );
		} else {
			$validation = new Validation();
			$validation->name( 'id' )->value( $id )->pattern( 'int' )->required();
			if ( $validation->isSuccess() ) {
				if ( GlobalHoliday::GetInstance()->isExist( 'id', $id ) ) {
					$holiday = GlobalHoliday::GetInstance()->getById( $id );
					if ( $holiday == null ) {
						redirect( 'holidays/holidays/index' );
					} else {
						$holiday_types = HolidayType::GetInstance()->getGroupHoliday();
						$allowed_roles = Holiday::getAllowedRoles();

						$data = [
							'holiday_types' => $holiday_types,
							'holiday'       => $holiday,
							'allowed_roles' => $allowed_roles,
						];

						$this->view( 'holidays/global_edit', $data );
					}
				} else {
					redirect( 'holidays/holidays/index' );
				}
			}
		}

	}

	public function update() {
		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'id' )->value( Request::post( 'id' ) )->pattern( 'int' )->required();
			$validation->name( 'type_id' )->value( Request::post( 'type_id' ) )->pattern( 'int' )->required();
			$validation->name( 'from_date' )->value( Request::post( 'from_date' ) )->pattern( 'text' )->required();
			$validation->name( 'to_date' )->value( Request::post( 'to_date' ) )->pattern( 'text' )->required();

			//If its Individual
			if ( isset( $_POST['group_id'] ) ) {
				$validation->name( 'group_id' )->value( Request::post( 'group_id' ) )->pattern( 'int' )->required();
				$validation->name( 'registration_no' )->value( Request::post( 'registration_no' ) )->pattern( 'text' )->required();
			} else {
				//If its Global
				$validation->name( 'recurrenece' )->value( Request::post( 'recurrence' ) )->pattern( 'text' )->required();
				$validation->name( 'name' )->value( Request::post( 'name' ) )->pattern( 'text' )->required();
				$validation->name( 'remarks' )->value( Request::post( 'remarks' ) )->pattern( 'text' )->required();
			}

			if ( $validation->isSuccess() ) {
				if ( isset( $_POST['group_id'] ) ) {
					$holiday                  = IndividualHoliday::GetInstance()->getById( Request::post( 'id' ) );
					$holiday->type_id         = Request::post( 'type_id' );
					$holiday->role_id         = Request::post( 'group_id' );
					$holiday->registration_no = Request::post( 'registration_no' );
					$holiday->from_date       = Request::post( 'from_date' );
					$holiday->to_date         = Request::post( 'to_date' );
				} else {
					$holiday             = GlobalHoliday::GetInstance()->getById( Request::post( 'id' ) );
					$holiday->type_id    = Request::post( 'type_id' );
					$holiday->name       = Request::post( 'name' );
					$holiday->from_date  = Request::post( 'from_date' );
					$holiday->to_date    = Request::post( 'to_date' );
					$holiday->remarks    = Request::post( 'remarks' );
					$holiday->recurrence = Request::post( 'recurrence' );
				}

				if ( $holiday->save() ) {
					flash( 'holiday_message', 'Holiday Successfuly Updated' );
					redirect( 'holidays/Holidays/index' );
				} else {
					flash( 'holiday_message', 'Couldn\'t Holiday Updated' );
					redirect( 'holidays/Holidays/index' );
				}
			} else {
				flash( 'holiday_message', 'Something went wrong' );
				redirect( 'holidays/Holidays/add' );
			}
		}

	}

	public function delete( $id = 0 ) {
		if ( $id == 0 || Holiday::GetInstance()->isExist( 'id', $id ) ) {
			$holdiay = Holiday::GetInstance()->getById( $id );
			if ( $holdiay->delete() ) {
				flash( 'holiday_message', 'Holiday deleted' );
				redirect( 'holidays/Holidays/index' );
			} else {
				redirect( 'holidays/Holidays/index' );
			}
		} else {
			redirect( 'holidays/Holidays/index' );
		}

	}

	public function hasGroup() {
		$validation = new Validation();
		$validation->name( 'type_id' )->value( Request::post( 'type_id' ) )->pattern( 'int' )->required();
		if ( $validation->isSuccess() ) {
			$holiday_type = HolidayType::GetInstance()->getById( Request::post( 'type_id' ) );
			if ( $holiday_type->is_group == 1 ) {
				return Response::json( true );
			} else {
				$roles = Holiday::getAllowedRoles();

				return Response::json( $roles );
			}
		}

	}

	/**
	 * Useless
	 * */
	public function getDataByGroup() {
		$validation = new Validation();
		$validation->name( 'group_id' )->value( Request::post( 'group_id' ) )->pattern( 'int' )->required();
		if ( $validation->isSuccess() ) {
			$group_id = Request::post( 'group_id' );
			if ( Role::GetInstance()->isExist( 'id', $group_id ) ) {
				$role_name = Role::getRoleById( $group_id );
				$data      = [];
				switch ( $role_name ) {
					//Role id=4 => Teachers
					case "Teacher":
						$role     = [ 'role_id' => $group_id, 'role_name' => 'Teacher' ];
						$teachers = Teacher::GetInstance()->getAll();
						$data[]   = $role;
						$data[]   = $teachers;
						break;
					case "Student":

						break;

					default:
						echo "Your favorite color is neither red, blue, nor green!";
				}
			}
		}

	}

}