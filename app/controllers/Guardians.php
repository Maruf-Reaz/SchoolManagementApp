<?php

namespace App\Controllers;

use App\Libraries\Controller;
use App\Libraries\Http\Request;
use App\Libraries\Validation;
use App\Models\File;
use App\Models\Guardian;

class Guardians extends Controller {

	private $guardian;
	private $file;

	public function __construct() {
		$this->guardian = new Guardian();
		$this->file     = new File();
	}

	public function index() {
		$guardians = $this->guardian->getAll();
		$data      = [
			'guardians' => $guardians,
		];
		$this->view( 'guardians/index', $data );
	}

	public function doesNidNumberExist() {
		$nid_number = Request::get( 'nid_number' );

		$flag = $this->guardian->isExist( 'nid_number', $nid_number );

		if ( $flag == true ) {
			return jsonResult( 'NID number already exists' );
		} else {
			return jsonResult( true );
		}
	}

	public function doesContactNumberExist() {
		$contact_number = Request::get( 'contact_number' );

		$flag = $this->guardian->isExist( 'contact_number', $contact_number );

		if ( $flag == true ) {
			return jsonResult( 'Contact number already exists' );
		} else {
			return jsonResult( true );
		}
	}

	public function doesEmailExist() {
		$email = Request::get( 'email' );

		$flag = $this->guardian->isExist( 'email', $email );

		if ( $flag == true ) {
			return jsonResult( 'Email already exists' );
		} else {
			return jsonResult( true );
		}
	}

	public function doesPhotoExist() {
		$photo_name = Request::get( 'photo' );

		$flag = $this->guardian->isExist( 'photo', $photo_name );

		if ( $flag == true ) {
			return jsonResult( 'Photo already exists. Please rename the file if needed' );
		} else {
			return jsonResult( true );
		}
	}

	public function add() {
		if ( POST ) {
			/*-------------------------Generating Student Registration No-------------------------*/
			$last_id_from_db = $this->guardian->getLastGuardianId();
			$guardian_serial = sprintf( "%06s", $last_id_from_db->id + 1 );
			$registration_no = 'G' . $guardian_serial;
			/*-------------------------Generating registration No code ends here---------------------------------*/

			/*-------------------------Backend validation Starts-----------------------------------*/
			$validation = new Validation();
			$validation->name( 'guardian_name' )->value( Request::post( 'guardian_name' ) )->pattern( 'text' )->required();
			$validation->name( 'nid_number' )->value( Request::post( 'nid_number' ) )->pattern( 'text' )->required();
			$validation->name( 'email' )->value( Request::post( 'email' ) )->pattern( 'email' )->required();
			$validation->name( 'occupation' )->value( Request::post( 'occupation' ) )->pattern( 'text' )->required();
			$validation->name( 'gender' )->value( Request::post( 'gender' ) )->pattern( 'text' )->required();
			$validation->name( 'blood_group' )->value( Request::post( 'blood_group' ) )->pattern( 'text' )->required();
			$validation->name( 'contact_number' )->value( Request::post( 'contact_number' ) )->pattern( 'tel' )->required();
			$validation->name( 'present_address' )->value( Request::post( 'present_address' ) )->pattern( 'text' )->required();
			$validation->name( 'permanent_address' )->value( Request::post( 'permanent_address' ) )->pattern( 'text' )->required();
			$validation->name( 'file_name' )->value( $_FILES['photo']['name'] )->pattern( 'file' )->required();
			/*-------------------------Backend validation Ends-----------------------------------*/

			if ( $validation->isSuccess() ) {
				if ( $this->guardian->isExist( 'nid_number', Request::post( 'nid_number' ) ) ) {
					redirect( 'guardians/index' );
				} else {
					if ( $this->guardian->isExist( 'email', Request::post( 'email' ) ) ) {
						redirect( 'guardians/index' );
					} else {
						if ( $this->guardian->isExist( 'contact_number', Request::post( 'contact_number' ) ) ) {
							redirect( 'guardians/index' );
						} else {
							if ( $this->guardian->isExist( 'photo', $_FILES['photo']['name'] ) ) {
								redirect( 'guardians/index' );
							} else {
								$this->guardian->registration_no   = $registration_no;
								$this->guardian->guardian_name     = Request::post( 'guardian_name' );
								$this->guardian->nid_number        = Request::post( 'nid_number' );
								$this->guardian->email             = Request::post( 'email' );
								$this->guardian->contact_number    = Request::post( 'contact_number' );
								$this->guardian->gender            = Request::post( 'gender' );
								$this->guardian->blood_group       = Request::post( 'blood_group' );
								$this->guardian->occupation        = Request::post( 'occupation' );
								$this->guardian->present_address   = Request::post( 'present_address' );
								$this->guardian->permanent_address = Request::post( 'permanent_address' );

								if ( $this->file->attach_file( $_FILES['photo'] ) ) {
									$this->file->upload_dir = 'images/guardians';
									//First save the file in directory
									if ( $this->file->save() ) {
										$this->guardian->photo = $this->file->file_name;
										//Save the guardian
										if ( $this->guardian->create() ) {
											redirect( 'guardians/index' );
										} else {
											die( 'Something went Wrong' );
										}
									} else {
										$this->file->destroy();
									}
								} else {
									die( 'Something went wrong' );
								}
							}
						}
					}
				}
			} else {
				redirect( 'guardians/index' );
			}
		} else {
			$this->view( 'guardians/add' );
		}
	}

	public function doesNidNumberExistEdit() {
		$id         = Request::get( 'id' );
		$nid_number = Request::get( 'nid_number' );

		$guardian = $this->guardian->getById( $id );

		if ( $guardian->nid_number == $nid_number ) {
			return jsonResult( true );
		} else {
			$flag = $this->guardian->isExist( 'nid_number', $nid_number );
			if ( $flag == true ) {
				return jsonResult( 'NID number already exists' );
			} else {
				return jsonResult( true );
			}
		}
	}

	public function doesContactNumberExistEdit() {
		$id             = Request::get( 'id' );
		$contact_number = Request::get( 'contact_number' );

		$guardian = $this->guardian->getById( $id );

		if ( $guardian->contact_number == $contact_number ) {
			return jsonResult( true );
		} else {
			$flag = $this->guardian->isExist( 'contact_number', $contact_number );
			if ( $flag == true ) {
				return jsonResult( 'Contact number already exists' );
			} else {
				return jsonResult( true );
			}
		}
	}

	public function doesEmailExistEdit() {
		$id    = Request::get( 'id' );
		$email = Request::get( 'email' );

		$guardian = $this->guardian->getById( $id );

		if ( $guardian->email == $email ) {
			return jsonResult( true );
		} else {
			$flag = $this->guardian->isExist( 'email', $email );
			if ( $flag == true ) {
				return jsonResult( 'Email already exists' );
			} else {
				return jsonResult( true );
			}
		}
	}

	public function update( $id = 0 ) {
		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'guardian_name' )->value( Request::post( 'guardian_name' ) )->pattern( 'text' )->required();
			$validation->name( 'nid_number' )->value( Request::post( 'nid_number' ) )->pattern( 'text' )->required();
			$validation->name( 'email' )->value( Request::post( 'email' ) )->pattern( 'email' )->required();
			$validation->name( 'occupation' )->value( Request::post( 'occupation' ) )->pattern( 'text' )->required();
			$validation->name( 'contact_number' )->value( Request::post( 'contact_number' ) )->pattern( 'tel' )->required();
			$validation->name( 'gender' )->value( Request::post( 'gender' ) )->pattern( 'text' )->required();
			$validation->name( 'blood_group' )->value( Request::post( 'blood_group' ) )->pattern( 'text' )->required();
			$validation->name( 'present_address' )->value( Request::post( 'present_address' ) )->pattern( 'text' )->required();
			$validation->name( 'permanent_address' )->value( Request::post( 'permanent_address' ) )->pattern( 'text' )->required();
			$validation->name( 'file_name' )->value( $_FILES['photo']['name'] )->pattern( 'file' );

			if ( $validation->isSuccess() ) {

				$previous_guardian = Guardian::GetInstance()->getById( Request::post( 'id' ) );

				$guardian                    = new Guardian();
				$guardian->id                = Request::post( 'id' );
				$guardian->registration_no   = $previous_guardian->registration_no;
				$guardian->guardian_name     = Request::post( 'guardian_name' );
				$guardian->nid_number        = Request::post( 'nid_number' );
				$guardian->email             = Request::post( 'email' );
				$guardian->occupation        = Request::post( 'occupation' );
				$guardian->contact_number    = Request::post( 'contact_number' );
				$guardian->gender            = Request::post( 'gender' );
				$guardian->blood_group       = Request::post( 'blood_group' );
				$guardian->present_address   = Request::post( 'present_address' );
				$guardian->permanent_address = Request::post( 'permanent_address' );

				$new_file = new File();
				/*attaching file , this method will work as a validation method for future
				returns false if there are no files given*/
				if ( $new_file->attach_file( $_FILES['photo'] ) ) {
					//New File directoy
					$new_file->upload_dir = 'images/guardians';
					// old file information
					$this->file->upload_dir = 'images/guardians';
					$this->file->file_name  = $_POST['oldPhoto'];
					$guardian->photo        = $new_file->file_name;
					if ( $guardian->update() ) {
						//Destroy the old file
						if ( $this->file->destroy() ) {
							//Save the new File
							if ( $new_file->save() ) {
								redirect( 'guardians/index' );
							} else {
								$this->file->destroy();
							}
						} else {
							die( 'Couldnt delete the old file' );
						}
					} else {
						die( 'Something went Wrong' );
					}
				} else {
					$guardian->photo = $_POST['oldPhoto'];
					if ( $guardian->update() ) {
						redirect( 'guardians/index' );
					} else {
						die( 'Something went Wrong' );
					}
				}
				if ( $guardian->update() ) {
					redirect( 'guardians/index' );
				};
			} else {
				redirect( 'guardians/index' );
			}
		} else {
			$guardian = $this->guardian->getById( $id );
			if ( $guardian->id == null ) {
				redirect( 'guardians/index' );
			} else {
				$data['guardian'] = $guardian;
				$this->view( 'guardians/update', $data );
			}
		}
	}

	public function delete( $id = 0 ) {
		$guardian = $this->guardian->getById( $id );
		if ( $guardian->id == null ) {
			redirect( 'guardians/index' );
		} else {
			$this->guardian->id = $id;
			if ( $this->guardian->delete() ) {
				$this->file->file_name  = $guardian->photo;
				$this->file->upload_dir = 'images/guardians';
				if ( $this->file->destroy() ) {
					redirect( 'guardians/index' );
				} else {
					die( 'Something went wrong!' );
				}
			} else {
				die( 'Something went wrong!' );
			}
		}
	}

	public function viewProfile( $id = 0 ) {
		$guardian = $this->guardian->getById( $id );
		if ( $guardian->id == null ) {
			redirect( 'guardians/index' );
		} else {
			$data['guardian'] = $guardian;
			$this->view( 'guardians/view', $data );
		}
	}
}