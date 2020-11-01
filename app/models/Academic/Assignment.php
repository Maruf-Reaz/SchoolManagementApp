<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/14/2018
 * Time: 11:31 PM
 */

namespace App\Models\Academic;


use App\Libraries\Database;
use App\Libraries\Model;

class Assignment extends Model {
	protected static $table_name = 'db_academic_assignments';
	protected static $db_fields = [ 'id', 'title', 'description', 'deadline', 'class_id', 'subject_id', 'file_name' ];
	/*properties*/
	public $id;
	public $title;
	public $description;
	public $deadline;
	public $class_id;
	public $subject_id;
	public $file_name;

	public $db_object;

	public function __construct() {
		$this->db_object = new Database();
	}

	public function getSectionAndSubjectByClass( $class_id ) {

		$sections = ( new Section() )->getSectionsByClass( $class_id );
		$this->db_object->query( 'SELECT * FROM db_academic_subjects WHERE class_id=:class_id' );
		$this->db_object->bind( ':class_id', $class_id );
		$subjects = $this->db_object->resultSet();

		$data = [
			'sections' => $sections,
			'subjects' => $subjects,
		];

		return $data;

	}

	public function updateSections( $sections ) {
		$assignment_id = $this->id;
		//first delete the old assigned sections
		$this->deleteSections( $assignment_id );
		//Update data
		/*foreach ( $sections as $key => $section ) {
			$this->db_object->query( 'UPDATE  db_academic_assignment_sections SET section_id=:section_id WHERE  assignment_id=:assignment_id LIMIT 1' );
			$this->db_object->bind( ':assignment_id', $assignment_id );
			$this->db_object->bind( ':section_id', $section );
			$this->db_object->execute();
		}*/

		$this->saveSections( $sections, $assignment_id );

	}

	public function deleteSections( $assignment_id ) {
		$this->db_object->query( 'DELETE FROM db_academic_assignment_sections WHERE assignment_id=:assignment_id ' );
		$this->db_object->bind( ':assignment_id', $assignment_id );
		$this->db_object->execute();
	}

	public function saveSections( $sections, $assignment_id = 0 ) {
		if ( $assignment_id == 0 ) {
			$assignment_id = $this->db_object->lastInsertId();
		}

		foreach ( $sections as $key => $section ) {
			$this->db_object->query( 'INSERT INTO db_academic_assignment_sections (assignment_id,section_id) VALUES (:assignment_id,:section_id)' );
			$this->db_object->bind( ':assignment_id', $assignment_id );
			$this->db_object->bind( ':section_id', $section );
			$this->db_object->execute();
		}

	}

	public function getAssignmentsByClass( $class_id ) {
		$assignments = $this->getAllByClassId( $class_id );
		foreach ( $assignments as $assignment ) {
			$assignment->sections = $this->getSections( $assignment->id );
		}

		/*$data = [
				'assignments' => $assignments,
				'sections'    => $sections,
		];*/

		return $assignments;
	}

	/*public function getAllByClass() {
		$assignments = $this->getAll();
		$sections    = [];
		foreach ($assignments as $assignment) {
			$sections[] = $this->getSections($assignment->id);
		}

		$data = [
				'assignments' => $assignments,
				'sections'    => $sections,
		];

		return $data;
	}*/

	public function getAllByClassId( $class_id ) {

		$this->db_object->query( 'SELECT * FROM db_academic_assignments WHERE class_id=:class_id' );
		$this->db_object->bind( ':class_id', $class_id );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getSections( $assignment_id ) {
		$this->db_object->query( 'SELECT db_academic_assignment_sections.id ,
db_academic_assignment_sections.assignment_id ,
db_academic_assignment_sections.section_id ,
db_academic_sections.name  
FROM db_academic_assignment_sections 
LEFT JOIN db_academic_sections
ON db_academic_assignment_sections.section_id=db_academic_sections.id
WHERE assignment_id=:assignment_id' );
		$this->db_object->bind( ':assignment_id', $assignment_id );
		$result = $this->db_object->resultSet();

		return $result;
	}
}