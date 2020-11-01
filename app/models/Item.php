<?php
namespace App\Models;

use App\Libraries\Database;
use App\Libraries\Model;

class Item extends Model {
    protected static $table_name = "items";

    protected static $db_fields = ['id', 'name', 'company_name', 'catagory_name'];
    public $id;
    public $name;
    public $company_name;
    public $catagory_name;
    protected $db_object;

    public function __construct() {
        $this->db_object = new Database();
    }

    public function getItemByCatagory($catagory) {
        $this->db_object->query('SELECT * FROM items WHERE catagory_name=:catagory');
        $this->db_object->bind(':catagory', $catagory);

        return $this->db_object->resultSet();
    }
}