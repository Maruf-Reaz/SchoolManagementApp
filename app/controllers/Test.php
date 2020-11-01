<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 10/15/2018
 * Time: 12:00 PM
 */

namespace App\Controllers;


use App\Libraries\Controller;

class Test extends Controller {
	public function index() {
		if(POST){
			$var="hello";
		}
		$this->view( 'tests/index' );
	}
}