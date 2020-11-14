<?php
    class Pages extends Controller {
        public function __construct() {

        }
        public function index() {
            if (isLoggedIn()) {
                redirect('posts');
            }
            $data = [
                'title' => 'HyprYappr',
                'description' => 'A hyper active app to yapp about what\'s hype!'
            ];
            $this->view('pages/index', $data);
        }
        public function about() {
            $data = [
                'title' => 'About Us',
                'description' => 'Nowadays people feel as if they cannot share online to avoid ridicule if it doesn\'t align with self-destructive silencing; that is !healthy|constructive. This is America! Let\'s build some cool sh!t.'
            ];
            $this->view('pages/about', $data);
        }
    } 
?>