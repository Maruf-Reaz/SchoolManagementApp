<?php
namespace App\Models\Exam;

use App\Libraries\Database;
use App\Libraries\Model;



class Exam extends Model
{
    protected static $table_name = "db_exam_exams";
    protected static $db_fields = ['id', 'name', 'from_date','to_date','note','year'];
    public $id;
    public $name;
    public $from_date;
    public $to_date;
    public $note;
    public $year;

    protected $db_object;

    public function __construct()
    {
        $this->db_object = new Database();
    }

	public function getExamByYear($year){
		$this->db_object->query( 'SELECT * FROM db_exam_exams WHERE year=:year ' );
		$this->db_object->bind( ':year', $year );
		$result = $this->db_object->resultSet();
		return $result;
	}

	public function getLastExam(){
		$this->db_object->query( 'SELECT MAX(id) as max_id FROM db_exam_exams ' );
		$result = $this->db_object->single();

		$this->db_object->query( 'SELECT * FROM db_exam_exams WHERE id=:id ' );
		$this->db_object->bind( ':id', $result->max_id );
		$result1 = $this->db_object->single();
		return $result1;
	}

}
