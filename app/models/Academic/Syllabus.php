<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/8/2018
 * Time: 12:44 PM
 */

namespace App\Models\Academic;

use App\Libraries\Database;
use App\Libraries\Model;

class Syllabus extends Model {
    protected static $table_name = 'db_academic_syllabus';
    protected static $db_fields = ['id', 'title', 'description', 'date', 'user_id', 'class_id', 'file_name'];
    /*properties*/
    public $id;
    public $title;
    public $description;
    public $date;
    public $user_id;
    public $class_id;
    public $file_name;
    public $db_object;

    public function __construct() {
        $this->db_object = new Database();
    }

    public function getSyllabusByClass($class_id) {
        if ($class_id == 0) {
            return $this->getAll();
        } else {

            $this->db_object->query('SELECT * FROM db_academic_syllabus WHERE class_id=:class_id');
            $this->db_object->bind(':class_id', $class_id);
            $result = $this->db_object->resultSet();

            return $result;
        }
    }
}