<?php
namespace App\Controllers;

use App\Libraries\Controller;
use App\Models\Item;

class Items extends Controller {

    public function index() {
        $item = new Item();

        $data = [
                'items' => $item->getAll(),
        ];

        $this->view('items/index', $data);
    }

    public function getJson() {

        $data  = ['name' => 'imran', 'age' => '23'];
        $items = Item::getAll();

        return jsonResult($items);

    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize the posts
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                    'name'                => trim($_POST['name']),
                    'company_name'        => trim($_POST['company_name']),
                    'catagory_name'       => trim($_POST['catagory_name']),
                    'name_error'          => '',
                    'company_name_error'  => '',
                    'catagory_name_error' => '',
            ];

            //Validate name
            if (empty($data['name'])) {
                $data['name_error'] = 'Please enter name';
            }
            //Validate company_name
            if (empty($data['company_name'])) {
                $data['company_name_error'] = 'Please enter company item';
            }
            //Validate catagory_name
            if (empty($data['catagory_name'])) {
                $data['catagory_name_error'] = 'Please enter catagory item';
            }
            //Make sure no errors
            if (empty($data['name_error']) && empty($data['company_name_error']) && empty($data['catagory_name_error'])) {
                //Validated
                $item                = new Item();
                $item->name          = trim($_POST['name']);
                $item->company_name  = trim($_POST['company_name']);
                $item->catagory_name = trim($_POST['catagory_name']);

                if ($item->create()) {
                    flash('post_message', 'Post Added');
                    redirect('items/index');
                } else {
                    die('Something went Wrong');
                }
            } else {
                //Load the view with error
                $this->view('items/add', $data);
            }
        } else {

            //Form load
            $data = [
                    'name'          => '',
                    'company_name'  => '',
                    'catagory_name' => '',
            ];

            $this->view('items/add', $data);
        }


    }

    public function searchItemsByCatagory() {
        if (POST) {
            $catagory = $_POST['catagory'];
            $items    = (new Item())->getItemByCatagory($catagory);

            return jsonResult($items);
        }

    }

    public function getItems() {
        $items = (new Item())->getAll();
        $data  = [
                'items' => $items,
        ];
        $this->view('items/search', $data);
    }
}