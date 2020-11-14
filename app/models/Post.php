<?php
    class Post {
        private $db;
        public function __construct() {
            $this->db = new Database;
        }

        public function getPosts() {
            $this->db->query( // setAlias, from point a, join tablename, on point b, orderby, asc|desc
                "SELECT *,
                posts.id as postID,
                users.id as userID,
                posts.created_at as ptime,
                users.created_at as utime
                FROM posts
                INNER JOIN users
                ON posts.user_id = users.id
                ORDER BY posts.created_at
                DESC"
            );
            $results = $this->db->results();
            return $results;
        }

        public function newPost($data) {
            // query
            $this->db->query("INSERT INTO posts (title, user_id, content) VALUES (:title, :user_id, :content)");
            // bind
            $this->db->bind(":title", $data['title']);
            $this->db->bind(":user_id", $data['user_id']);
            $this->db->bind(":content", $data['content']);
            // execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getPost($id) {
            $this->db->query("SELECT * FROM posts WHERE id = :id");
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
        }

        public function fixPost($data) {
            $this->db->query("UPDATE posts SET title = :title, content = :content WHERE id = :id");
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':content', $data['content']);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function removePost($id) {
            $this->db->query("DELETE FROM posts WHERE id = :id");
            $this->db->bind(':id', $id);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>