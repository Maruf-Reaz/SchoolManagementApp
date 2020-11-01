<?php
namespace App\Models\Announcement;

use App\Libraries\Database;
use App\Libraries\Model;

//written by
//Maruf
//29-9-2018


class Holiday extends Model
{
	protected static $table_name = "db_announcement_holidays";
	protected static $db_fields = ['id', 'title', 'from_date','to_date','details'];

	public $id;
	public $title;
	public $from_date;
	public $to_date;
	public $details;
	protected $db_object;

	public function __construct()
	{
		$this->db_object = new Database();
	}

}
