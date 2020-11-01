<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/20/2018
 * Time: 4:20 PM
 */

namespace App\Models\Academic;


use App\Libraries\Model;
use App\Libraries\Database;

class Routine extends Model {
	protected static $table_name = 'db_academic_routines';
	protected static $db_fields = [
		'id',
		'school_year',
		'class_id',
		'subject_id',
		'teacher_id',
		'day_id',
		'starting_time',
		'ending_time',
		'room_id'
	];

	public $db_object;
	/*Properties*/
	public $id;
	public $school_year;
	public $class_id;
	public $subject_id;
	public $teacher_id;
	public $day_id;
	public $starting_time;
	public $ending_time;
	public $room_id;

	//This field is for room conflict management
	public $conflicted_routine_id;

	public function __construct() {
		$this->db_object = new Database();
	}

	public function getDays() {
		$this->db_object->query( "SELECT * FROM db_days" );

		return $this->db_object->resultSet();
	}

	public function getRooms() {
		$this->db_object->query( "SELECT * FROM db_rooms" );

		return $this->db_object->resultSet();
	}

	public function updateSections( $sections ) {
		$routine_id = $this->id;
		//first delete the old assigned sections
		$this->deleteSections( $routine_id );
		//Update data
		/*foreach ( $sections as $key => $section ) {
			$this->db_object->query( 'UPDATE  db_academic_assignment_sections SET section_id=:section_id WHERE  assignment_id=:assignment_id LIMIT 1' );
			$this->db_object->bind( ':assignment_id', $assignment_id );
			$this->db_object->bind( ':section_id', $section );
			$this->db_object->execute();
		}*/

		$this->saveSections( $sections, $routine_id );

	}

	public function deleteSections( $routine_id = 0 ) {
		if ( $routine_id == 0 ) {
			$routine_id = $this->id;
		}
		$this->db_object->query( 'DELETE FROM db_academic_routine_sections WHERE routine_id=:routine_id' );
		$this->db_object->bind( ':routine_id', $routine_id );
		$this->db_object->execute();
	}

	public function saveSections( $sections, $routine_id = 0 ) {
		if ( $routine_id == 0 ) {
			$routine_id = $this->db_object->lastInsertId();
		}

		foreach ( $sections as $key => $section ) {
			$this->db_object->query( 'INSERT INTO db_academic_routine_sections (routine_id,section_id) VALUES (:routine_id,:section_id)' );
			$this->db_object->bind( ':routine_id', $routine_id );
			$this->db_object->bind( ':section_id', $section );
			$this->db_object->execute();
		}

	}

	public function getSections( $routine_id = 0 ) {
		if ( $routine_id == 0 ) {
			$routine_id = $this->id;
		}
		$this->db_object->query( 'SELECT db_academic_routine_sections.id ,
db_academic_routine_sections.routine_id ,
db_academic_routine_sections.section_id ,
db_academic_sections.name  
FROM db_academic_routine_sections 
LEFT JOIN db_academic_sections
ON db_academic_routine_sections.section_id=db_academic_sections.id
WHERE routine_id=:routine_id' );
		$this->db_object->bind( ':routine_id', $routine_id );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function getSectionAndSubjectByClass( $class_id ) {
	}

	public function getAcademicyears() {
		$this->db_object->query( "SELECT * FROM db_academic_school_years" );
		$result = $this->db_object->resultSet();

		return $result;
	}

	public function isSloteAvailable( $day_id = 0, $room_id = 0 ) {
		if ( $day_id == 0 ) {
			$day_id = $this->day_id;
		}
		if ( $room_id == 0 ) {
			$room_id = $this->room_id;
		}
		$routine_id = $this->id;

		$starting_time = strtotime( $this->starting_time );
		$ending_time   = strtotime( $this->ending_time );

		$allocatedRoutine = $this->getRoutineByDayAndRoom( $day_id, $room_id );
		$available        = false;
		if ( empty( $allocatedRoutine ) ) {
			//Np records found on database
			$available = true;
		} elseif ( $starting_time > $ending_time ) {
			//Impossible
			$available = false;

			return $available;
		} else {
			foreach ( $allocatedRoutine as $routine ) {
				$allocated_starting_time = strtotime( $routine->starting_time );
				$allocated_ending_time   = strtotime( $routine->ending_time );

				if ( $routine->id == $routine_id ) {
					if ( $starting_time == $allocated_starting_time && $ending_time == $allocated_ending_time ) {
						//This is just an update with no same time field
						$available = true;
					} else {
						if ( count( $allocatedRoutine ) == 1 ) {
							$available = true;
						}
						continue;
					}
				} elseif ( $starting_time < $allocated_starting_time && $ending_time <= $allocated_starting_time ) {
					$available = true;
				} elseif ( $starting_time >= $allocated_ending_time && $ending_time > $allocated_ending_time ) {
					$available = true;
				} else {
					$available = false;
					//this value will be required to solve room confliction
					$this->conflicted_routine_id = $routine->id;
					break;
				}
			}
		}

		return $available;


	}

	public function getRoutineByDayAndRoom( $day_id, $room_id ) {
		$this->db_object->query( "SELECT * FROM db_academic_routines WHERE day_id=:day_id AND room_id=:room_id " );
		$this->db_object->bind( ':day_id', $day_id );
		$this->db_object->bind( ':room_id', $room_id );
		//Need to be edited
		$result = $this->db_object->resultSet();

		return $result;

		return $this->db_object->resultSet();
	}

	public function getRoutineByClassAndSection( $class_id, $section_id ) {
		$this->db_object->query( "SELECT
  db_academic_routines.id,
  db_academic_routines.school_year,
  db_academic_routines.class_id,
  db_academic_routines.subject_id,
  db_academic_routines.teacher_id,
  db_academic_routine_sections.id AS section_id,
  db_academic_routines.day_id,
  db_academic_routines.room_id,
  db_academic_routines.starting_time,
  db_academic_routines.ending_time,
  db_academic_subjects.subject_name,
  db_teacher_teachers.name AS teacher_name,
  db_rooms.name            AS room_name


FROM db_academic_routines
  LEFT JOIN db_academic_routine_sections
    ON db_academic_routines.id = db_academic_routine_sections.routine_id
  LEFT JOIN db_academic_subjects
    ON db_academic_routines.subject_id = db_academic_subjects.id
  LEFT JOIN db_teacher_teachers
    ON db_academic_routines.teacher_id = db_teacher_teachers.id
  LEFT JOIN db_rooms
    ON db_academic_routines.room_id = db_rooms.id
WHERE db_academic_routines.class_id =:class_id AND section_id=:section_id

ORDER BY day_id ASC, starting_time ASC" );
		$this->db_object->bind( ':class_id', $class_id );
		$this->db_object->bind( ':section_id', $section_id );
		$result = $this->db_object->resultSet();

		return $result;
	}
}