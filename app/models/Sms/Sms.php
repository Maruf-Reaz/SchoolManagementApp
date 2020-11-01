<?php

namespace App\Models\Sms;

use App\Libraries\Model;
use App\Models\Guardian;
use App\Libraries\Database;

class Sms extends Model {

	protected $db_object;

	public function __construct() {
		$this->db_object = new Database();
	}

	public function sendSmsToRecipients( $recipients, $type, $message_text ) {
		$numbers = "";
		$to = "";
		$recipient_numbers = $this->getRecipientsNumber( $recipients, $type );
		if ( $type == 1 ) {

			foreach ( $recipient_numbers as $recipient_number ) {
				$numbers .= $recipient_number->phone . ",";
				$len     = strlen( $numbers );
				$to      = substr( $numbers, 0, $len - 1 );

			}
		}
		elseif ( $type == 2 )
		{
			$numbers = "0";
			foreach ( $recipient_numbers as $recipient_number ) {
				$numbers .= $recipient_number->contact_number . ",";
				$len     = strlen( $numbers );
				$to      = substr( $numbers, 0, $len - 21);

			}

		}
		else
			{

		}

		$message = "Dear Concern".$message_text;
		$to;
		$message;
		$result  = $this->sendSms( $to, $message );
		return $result;
	}

	public function getRecipientsNumber( $recipients, $type ) {
		if ( $type == 1 ) {
			$database_table = "db_teacher_teachers";
		} elseif ( $type == 2 ) {
			$database_table = "db_guardian_guardians";
		} else {
			$database_table = null;
		}
		$recipient_numbers = array();
		foreach ( $recipients as $recipient_id ) {
			$id = (int) $recipient_id;
			$this->db_object->query( "SELECT * FROM " . $database_table . " WHERE id =:id" );
			$this->db_object->bind( ':id', $id );
			$recipient_numbers[] = $this->db_object->single();
		}

		return $recipient_numbers;
	}

	public function sendSms( $to, $message ) {
		$token = "a380a7ad7b19fd20c6a161cb114ba228";
		$url   = "http://api.greenweb.com.bd/api.php";
		$data  = array(
			'to'      => "$to",
			'message' => "$message",
			'token'   => "$token"
		); // Add parameters in key value
		$ch    = curl_init(); // Initialize cURL
		curl_setopt( $ch, CURLOPT_URL, $url );
		curl_setopt( $ch, CURLOPT_ENCODING, '' );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $data ) );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_FORBID_REUSE, 1 );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array( 'Connection: Close' ) );
		$smsresult = curl_exec( $ch );

		return $smsresult;
		//sendsms end//
	}

	public function sendSmsToAllGuardians( $message_text ) {


		$guardians = Guardian::GetInstance()->getAll();
		foreach ( $guardians as $guardian ) {
			$message = "Mr." . $guardian->guardian_name . "\n" . $message_text;
			$this->sendSms( $guardian->contact_number, $message );
		}
	}


}
