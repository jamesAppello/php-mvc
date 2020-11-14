<?php 
    class Controller {
        // load model
        public function model($model) {
            // require model file
            require_once '../app/models/' . $model . '.php';
            // instantiate model
            return new $model(); // new (Model()|etc.)
        }
        // load view
        public function view($view, $data = []) {
            // check for the view file if exists
            if (file_exists('../app/views/' . $view . '.php')) {
                // require if exists
                require_once '../app/views/' . $view . '.php';
            } else {
                // view doesn't exist
                die('View does not exist'); // die() method just ends the application.
            }
        }
    }
?>