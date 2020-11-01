<?php

namespace App\Controllers\Mark;

use App\Libraries\Controller;
use App\Models\Mark\Mark;
use App\Models\Mark\MarkDistribution;
use App\Models\Academic\AcademicClass;
use App\Libraries\Validation;

class MarkDistributions extends Controller {

	public function __construct() {
		$this->middleware( [ 'Authentication' ] )->all();
		$this->middleware( [ 'Roles' ] )->all()->hasRole( [
			'all' => [ 'Admin' ],
		] );
	}

	public function index() {
		$classes           = AcademicClass::GetInstance()->getAll();
		$markDistributions = MarkDistribution::GetInstance()->getAllMarkDistributions();
		$data              = [
			'mark_distributions' => $markDistributions,
			'error_bit'          => 0,
			'classes'            => $classes,
		];
		$this->view( 'mark/mark_distributions/index', $data );
	}

	public function add() {
		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'type' )->value( $_POST['type'] )->pattern( 'text' )->required();
			$validation->name( 'value' )->value( $_POST['value'] )->pattern( 'text' )->required();
			$validation->name( 'class' )->value( $_POST['class'] )->pattern( 'int' )->required();

			if ( $validation->isSuccess() ) {
				$mark_distribution           = new MarkDistribution();
				$mark_distribution->type     = trim( $_POST['type'] );
				$mark_distribution->value    = trim( $_POST['value'] );
				$mark_distribution->class_id = trim( $_POST['class'] );
				$sum                         = $mark_distribution->totalSum( $mark_distribution->class_id, 0 );
				$tempSum                     = $sum->totalMark;
				$tempValue                   = $mark_distribution->value;
				$tempTotal                   = $tempSum + $tempValue;
				if ( $tempTotal <= 100 ) {
					if ( $mark_distribution->create() ) {
						$mark = new Mark();
						$mark->AddMarksWhenMarkDistributionIsAdded();
						redirect( 'mark/MarkDistributions/index' );
					} else {
						die( 'Something went Wrong' );
					}

				} else {
					$mark_distributions = MarkDistribution::GetInstance()->getAllMarkDistributions();
					$classes            = AcademicClass::GetInstance()->getAll();
					$data               = [
						'mark_distributions' => $mark_distributions,
						'classes'            => $classes,
						'type'               => '',
						'value'              => '',
						'error_bit'          => 1,
					];
					$this->view( 'mark/mark_distributions/index', $data );
				}

			} else {
				echo $validation->displayErrors();
			}

		} else {
			$classes = AcademicClass::GetInstance()->getAll();
			$data    = [
				'classes' => $classes,
			];
			$this->view( 'mark/mark_distributions/add', $data );

		}
	}

	public function showMarkDistribution( $id = 0 ) {
		$classes           = AcademicClass::GetInstance()->getAll();
		$mark_distribution = MarkDistribution::GetInstance()->getMarkDistributionById( $id );
		$data              = [
			'mark_distribution' => $mark_distribution,
			'error_bit'         => 0,
			'classes'           => $classes,
		];
		$this->view( 'mark/mark_distributions/edit', $data );
	}

	public function edit() {
		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'type' )->value( $_POST['type'] )->pattern( 'text' )->required();
			$validation->name( 'value' )->value( $_POST['value'] )->pattern( 'text' )->required();
			$validation->name( 'class' )->value( $_POST['class'] )->pattern( 'int' )->required();
			if ( $validation->isSuccess() ) {
				$mark_distribution           = new MarkDistribution();
				$mark_distribution->id       = trim( $_POST['id'] );
				$mark_distribution->type     = trim( $_POST['type'] );
				$mark_distribution->value    = trim( $_POST['value'] );
				$mark_distribution->class_id = trim( $_POST['class'] );
				$sum                         = $mark_distribution->totalSum( $mark_distribution->class_id, $mark_distribution->id );
				$tempSum                     = $sum->totalMark;
				$tempValue                   = $mark_distribution->value;
				$tempTotal                   = $tempSum + $tempValue;
				if ( $tempTotal <= 100 ) {
					if ( $mark_distribution->update() ) {
						redirect( 'mark/MarkDistributions/index' );
					} else {
						die( 'Something went Wrong' );
					}
				} else {
					$classes           = AcademicClass::GetInstance()->getAll();
					$mark_distribution = MarkDistribution::GetInstance()->getMarkDistributionById( $mark_distribution->id );
					$data              = [
						'mark_distribution' => $mark_distribution,
						'error_bit'         => 1,
						'classes'           => $classes,

					];
					$this->view( 'mark/mark_distributions/edit', $data );
				}
			}
			else{
				echo $validation->displayErrors();
			}


		}
	}

	public function getMarkDistributionsByClass() {

		$mark_distributions_by_class = MarkDistribution::GetInstance()->getMarkDistributionsByClass( $_POST['class_id'] );

		return jsonResult( $mark_distributions_by_class );


	}


}