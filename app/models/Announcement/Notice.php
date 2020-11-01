<?php
namespace App\Models\Announcement;

use App\Libraries\Database;
use App\Libraries\Model;

//written by
//Maruf
//26-9-2018


class Notice extends Model
{
	protected static $table_name = "db_announcement_notices";
	protected static $db_fields = ['id', 'title', 'date','notice'];

	public $id;
	public $title;
	public $date;
	public $notice;
	protected $db_object;

	public function __construct()
	{
		$this->db_object = new Database();
	}

}
