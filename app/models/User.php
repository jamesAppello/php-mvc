<?php
    class User {
        private $db;
        public function __construct() {
            $this->db = new Database;
        }

        public function signUp($data) {
            // query
            $this->db->query("INSERT INTO users (screenname, email, pass) VALUES (:screenname, :email, :pass)");
            // bind
            $this->db->bind(":screenname", $data['screenname']);
            $this->db->bind(":email", $data['email']);
            $this->db->bind(":pass", $data['pass']);
            // execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function login($email, $pass) {
            $this->db->query("SELECT * FROM users WHERE email = :email");
            $this->db->bind(':email', $email);
            $row = $this->db->single();
            $hashed_pw = $row->pass;
            if (password_verify($pass, $hashed_pw)) {
                return $row;
            } else {
                return false;
            }
        }

        // find user by email
        public function findUserByEmail($email) {
            // create query
            $this->db->query("SELECT * FROM users WHERE email = :email");
            // bind value - to - email
            $this->db->bind(":email", $email);
            // get single result with 'single' method
            $row = $this->db->single();
            // check the returned row
            if ($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
        public function getUser($id) {
            // create query
            $this->db->query("SELECT * FROM users WHERE id = :id");
            // bind value - to - id
            $this->db->bind(":id", $id);
            // get single result with 'single' method
            $row = $this->db->single();
            return $row;
        }
    }
?>