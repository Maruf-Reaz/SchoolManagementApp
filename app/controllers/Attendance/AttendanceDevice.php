<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 12/12/2018
 * Time: 1:53 PM
 */

namespace App\Controllers\Attendance;


use App\Libraries\Controller;
use App\Models\Attendance\AttendanceDeviceUser;
use App\Models\Attendance\TimeAttendanceDevice;
use App\Models\Attendance\UserTemplate;
use TADPHP\TADFactory;

class AttendanceDevice extends Controller {
	public function test() {
		/*$tad  = ( new TADFactory( [ 'ip' => '192.168.1.201' ] ) )->get_instance();
		$r = $tad->get_date();
		$logs = $tad->get_att_log()->get_response( [ 'format' => 'json' ] );

		//echo( $logs );
		$dt = $tad->get_date();
		echo $dt;*/

		/*$tad_factory = new TADFactory( [ 'ip' => '192.168.1.201' ] );
		$tad = $tad_factory->get_instance();*/
		//$r = $tad->get_date();
		$tad_factory = TimeAttendanceDevice::GetInstance()->getById( 1 );
		$tad         = $tad_factory->getTadInstance();
		//$tad = ( new TADFactory( [ 'ip' => '192.168.1.203' ] ) )->get_instance();
		/*try {
			$tad_factory->isConnected();
			echo 'Connected.';
		} catch ( \TADPHP\Exceptions\ConnectionError $e ) {
			echo "Not connected";
		}*/

		if ( $tad->is_alive() ) {
			echo 'Connected.';
		} else {
			echo "Not connected";
		}

		/*$r = $tad->set_user_info( [
			'pin'       => 1,
			'name'      => 'Imran Khan',
			'privilege' => 14,
			'password'  => 4321
		] );
		*/

		//$tad->disable();//Not working
		//$tad->restart();//working
		//$tad->poweroff();

	}

	public function setUser() {
		/*Setting Up All User to New Devices*/
		//get device
		$tad_factory = TimeAttendanceDevice::GetInstance()->getById( 1 );
		$tad         = $tad_factory->getTadInstance();

		//get users
		$users = AttendanceDeviceUser::GetInstance()->getAll();
		//$tem         = "Ss9TUzIxAAADjJEECAUHCc7QAAAbjWkBAAAAg7Eepox1AAUPLABKAHiD9gCTAJ4OVgCXjHwPuACbAEQPfYygAP4PdgBtAH+DNQC4AHYPPwDDjIsPgQDPAMUPT4ziAHEPugAvAICDrQAEAX8PGQAGjQkPYgAIAT0PQIwQAW0P0gDQAYaDXQAXAXEPQwAbjXIPowAZAccPJ4wdAe0OWwDmAWSD+AAnAQwPywAsjdQOHwA0ASYO1Yw+AYgPDgCFAc6CwwBJAQUPfABOjX8P4QBNAUMP0QWrh9sLPgfSAwzzIxdfH3ObqIJtjdt5igauf7qH5wtsgsMA6IMrATnyx\/83BAP\/c+9IC44LNoY\/BDaSOfdaBL\/8UgTffyiMUH7W\/Bb\/FIUVC5\/\/2YjVkzuMHnMvCAp00X1LCzlzVQ\/heJkH1HOh8pMHUYYBk7p83oL4G4aA3Psgc7Vw34cGixoHKAi6eZDrKREFGaD6HolkhmYMdfhY7Ylv7YtpfoKANXvxdAf6oQGCgLsKoWN3KyA6AQLHGoyFAQsIScJknQUD+VIAPgQAbZN6NIABJmEDwlGKewyMzm19\/sDDO1ph\/wcAqnQDVTgEA3t3PcP\/EwDCffnGWsDA\/sFFicAXjAaG9\/5lXDpDUtn8AwAojIAHEQO8jv1lYP7DOGTCvQIAKJJ3wM4AjBmBwVpSYAXFtJgPwMHBCgB6ZIDC1lj\/BQEOofhVCIyDpAN7P\/\/wCQP+qXpKwf5\/wQAzOnZsEAA4uD\/Aw+xTN0EEADJ5cE2YAfbChln\/BGRn9MBsCgCEyzhGWNgLAH3PfWe3awqMhNEDwFhU0AEEXY17YmrAWQWFhosBSOF0dMEBDgPc4PRAU\/9orAYDxeZtWcAPAHPnheVmcVnBBgB76gVMWg4Atu2ABcDDTmd0wcETAcP+ivdn\/3OLYsHBEOOPATYKEGQEMkQ0ywcQqAR9\/74DE2wICf8GEM3Rg\/xPXQQQQRVrQwUT1BR6xHEOEKUV9Ez+\/8FP\/v8GNQCcgxd6wgcQYxkATMH\/TAgQWd50i\/kHEAccQMCTCRMIHXF6wHsD1SEc1sEHEFcibUWEBZxbJ2d1wBLUBzocanTAwcN1BX4InNM7jH7CwFbDB5zbQAxxEBHFQIrZaMCRwMJ3zxDRzYfAwv+ThMIQvcSIxP\/DwMPAELXAfMCUAxDliwzAiRHGU4N\/UocACM8AAAALRVIAAAAAAAA=";
		//$tem = "ocoegZS+bOwInD5kIQWXQGmsCZ03VisZKztRKxEpt24oCRw6bH8HJrJcGRU3SWJsCpDNXQUKkr9aFQifRVU\/ChzBVOkOHr1djQcht11ZEKxIa7QHjSk9sQtMLmT\/Km4YSaoKaS1VVhdAKlCxDUvMO3wQjb0r\/gxDDkE+C+mic6YOjqtmKhiCrVU4GNY9dr4HlBFCfw1sp23\/CIwz1KsXDxThxmtxdwTAxWSi7928wMRgo63\/zc3AxF6jvN3\/3xfAw1ihq81sdQUMFRrAw1ahmr1pcgQOFxzAw1OhqatkbwMRGh7Aw1GhqJpaZHQTHCDAw06iiYeeYhceIsDDTKKHhnpFHiAkwMNLonZ3Zj0pIiPAw0yiZHZTNCokIsDDTKRTZhIkN8DDSqRTQwI2eMDDSUZANaIxVGkhwMRGOyeiVmhnG8DFDhei2mhVEsDGF6K5Z1TAxhWhyFXgAAAAAAAA";
		//$tem      = "ocoagZg2X34bJzhdqxQpjh4sBtqRI\/8L0hQ5JQ4AlFdqCBoWVv4KjhxUPxCJEET0CXkrZp4IJxc+6BdwwVTHI7nCbT8QEJs6vyHrP04oE6ImNrsGTzc4fBEyRkVvDqCjZ+oHHSJlsQaWpU8wHYEmF6IFwShkPgqXIxq+CEuEQ74Iej9UfhqfGmTMEg8U4cV3odvtGMDDYm6i3u7fHcDCW2BqcQGh7u4cwMJXXWRqdQeh79oewMFQodzecwYMFRkcH8B+TaGL3WBxBgwYHSAiwH5NoYmcWWoEChcfIiPAfkyhaIpOV24HGCMiJcB+SqKGmY1lAxolJCcnwH5IooeZmVY7ICgkJyfAwUeid4mYNSCh6LjAwUmidVNyMCeht4fAwUpIQTijN0WogybAwUxKOzCjaWmGUSDAwzUpo3h7llIfwMQgo8qIgoTAxR+iyilMwMYjJB8f4AAAAAAAAA==";

		/*$r = $tad->set_user_info( [
			'pin'       => 3,
			'name'      => 'Legend Khan',
			'finger_id' => 6,
			'privilege' => 14,
			'password'  => 4321
		] )->get_response( [ 'format' => 'json' ] );*/

		/*foreach ( $users as $user ) {
			$r = $tad->set_user_info( [
				'pin'       => $user->pin2,
				'name'      => $user->name,
				'card'      => $user->card,
				'privilege' => $user->privilege,
				'password'  => $user->password,
			] )->get_response( [ 'format' => 'json' ] );

			$user_tems = UserTemplate::GetInstance()->getByPin( $user->pin2 );

			foreach ( $user_tems as $user_tem ) {
				$tem_data = [
					'pin'       => $user->pin2,
					'finger_id' => $user_tem->finger_id, // First fingerprint has 0 as index.
					'size'      => $user_tem->size,    // Be careful, this is not string length of $template1_vx9 var.
					'valid'     => $user_tem->valid,
					'template'  => $user_tem->template,
				];
				$tad->set_user_template( $tem_data );
			}
		}*/


		//Ser FingerPrints
		/*$tem      = "";
		$tem_data = [
			'pin'       => 3,
			'finger_id' => 6, // First fingerprint has 0 as index.
			'size'      => 349,    // Be careful, this is not string length of $template1_vx9 var.
			'valid'     => 1,
			'template'  => $tem
		];
		$tad->set_user_template( $tem_data );
		echo( $r );*/
	}

	public function getUser() {
		$tad_factory = TimeAttendanceDevice::GetInstance()->getById( 3 );
		$tad         = $tad_factory->getTadInstance();
		//$user_info   = $tad->get_user_template( [ 'pin' => 4 ] )->get_response( [ 'format' => 'json' ] );
		$user_info = $tad->get_all_user_info()->get_response( [ 'format' => 'json' ] );
		$results   = json_decode( $user_info );
		/*foreach ( $results->Row as $result ) {
			$att_user            = new AttendanceDeviceUser();
			$att_user->pin       = $result->PIN;
			$att_user->name      = $result->Name;
			$att_user->password  = $result->Password;
			$att_user->group_id  = $result->Group;
			$att_user->privilege = $result->Privilege;
			$att_user->card      = $result->Card;
			$att_user->pin2      = $result->PIN2;
			$att_user->TZ1       = $result->TZ1;
			$att_user->save();
		}*/
		echo( $user_info );
	}

	public function setAllUser() {
		$tad   = TimeAttendanceDevice::GetInstance()->getById( 3 )->getTadInstance();
		$users = AttendanceDeviceUser::GetInstance()->getAll();
		foreach ( $users as $user ) {
			$user_info = $tad->get_user_template( [ 'pin' => $user->pin2 ] )->get_response( [ 'format' => 'json' ] );
			$results   = json_decode( $user_info )->Row;

			if ( is_array( $results ) && ! is_null( $results ) ) {

				//If user Has multiple Fingerprint
				foreach ( $results as $result ) {
					if ( $result ) {
						$user_tem            = new UserTemplate();
						$user_tem->pin       = $user->pin2;
						$user_tem->finger_id = $result->FingerID;
						$user_tem->size      = $result->Size;
						$user_tem->valid     = $result->Valid;
						$user_tem->template  = $result->Template;
						//$user_tem->save();
					}
				}

				echo( $user_info );
			} else {

				//If user Has Only one Fingerprint
				if ( ! is_null( $results ) ) {
					$user_tem            = new UserTemplate();
					$user_tem->pin       = $user->pin2;
					$user_tem->finger_id = $results->FingerID;
					$user_tem->size      = $results->Size;
					$user_tem->valid     = $results->Valid;
					$user_tem->template  = $results->Template;
					//$user_tem->save();
				}

			}
		}
	}
}