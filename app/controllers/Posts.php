<?php
namespace App\Controllers;

use App\Libraries\Controller;
use App\Models\Post;
use App\Models\User;

class Posts extends Controller {
    private $postModel;
    private $userModel;

    public function __construct() {
        if ( ! isset($_SESSION['user_id'])) {
            redirect('users/login');
        }

        $this->postModel = new Post();
        $this->userModel = new User();
    }

    public function index() {
        $p     = new Post();
        $posts = $this->postModel->getPosts();
        //$posts=Post::getAll();
        $data = [
                'posts' => $posts,
        ];

        $this->view('posts/index', $data);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize the posts
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                    'title'       => trim($_POST['title']),
                    'body'        => trim($_POST['body']),
                    'user_id'     => $_SESSION['user_id'],
                    'title_error' => '',
                    'body_error'  => '',
            ];

            //Validate title
            if (empty($data['title'])) {
                $data['title_error'] = 'Please enter title';
            }
            //Validate Body
            if (empty($data['body'])) {
                $data['body_error'] = 'Please enter body text';
            }
            //Make sure no errors
            if (empty($data['title_error']) && empty($data['body_error'])) {
                //Validated
                if ($this->postModel->addPost($data)) {
                    flash('post_message', 'Post Added');
                    redirect('posts/');
                } else {
                    die('Something went Wrong');
                }
            } else {
                //Load the view with error
                $this->view('posts/add', $data);
            }
        } else {
            $data = [
                    'title' => '',
                    'body'  => '',
            ];

            $this->view('posts/add', $data);
        }


    }

    public function show($id) {
        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);
        $data = [
                'post' => $post,
                'user' => $user,
        ];
        $this->view('posts/show', $data);
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize the posts
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                    'id'          => $id,
                    'title'       => trim($_POST['title']),
                    'body'        => trim($_POST['body']),
                    'user_id'     => $_SESSION['user_id'],
                    'title_error' => '',
                    'body_error'  => '',
            ];

            //Validate title
            if (empty($data['title'])) {
                $data['title_error'] = 'Please enter title';
            }
            //Validate Body
            if (empty($data['body'])) {
                $data['body_error'] = 'Please enter body text';
            }
            //Make sure no errors
            if (empty($data['title_error']) && empty($data['body_error'])) {
                //Validated
                if ($this->postModel->updatePost($data)) {
                    flash('post_message', 'Post Updated');
                    redirect('posts/');
                } else {
                    die('Something went Wrong');
                }
            } else {
                //Load the view with error
                $this->view('posts/edit', $data);
            }
        } else {
            //Get existing post from model
            $post = $this->postModel->getPostById($id);

            //Check for owner
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts/');
            }
            $data = [
                    'id'    => $id,
                    'title' => $post->title,
                    'body'  => $post->body,
            ];

            $this->view('posts/edit', $data);
        }


    }

    public function delete($id) {
        //Get existing post from model

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = $this->postModel->getPostById($id);

            //Check for owner
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts/');
            }
            if ($this->postModel->deletePost($id)) {
                flash('post_message', 'Post Removed');
                redirect('posts/');
            } else {
                die('Something went Wrong');
            }
        } else {
            redirect('posts/');
        }
    }

}