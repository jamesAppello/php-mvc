<?php
    class Posts extends Controller {
        public function __construct() {
            // check if user session id is there otherwise redirect
            if (!isLoggedIn()) {
                redirect('users/login');
            }
            $this->postModel = $this->model('Post');
            $this->userModel = $this->model('User');
        }
        public function index() {
            // get the array of posts
            $posts = $this->postModel->getPosts();
            $data = [
                'posts' => $posts
            ];
            $this->view('posts/index', $data);
        }
        public function new() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // sanitize post
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                // get the fuckin data
                $data = [
                    'title' => trim($_POST['title']),
                    'content' => trim($_POST['content']),
                    'user_id' => $_SESSION['user_id'],
                    // error variables
                    'title_err' => '',
                    'content_err' => ''
                ];
                // validate entry of fields
                if (empty($data['title'])) {
                    $data['title_err'] = 'Enter a title';
                }
                if (empty($data['content'])) {
                    $data['content_err'] = 'Enter your post content';
                }
                // check errors
                if (empty($data['title_err']) && empty($data['content_err'])) {
                    // valid post
                    if ($this->postModel->newPost($data)) {
                        flash_msg('post_msg', 'FULL SEND!');
                        redirect('posts');
                    } else {
                        die('something is fucked up...');
                    }

                } else {
                    // load the view with error messages
                    $this->view('posts/new', $data);
                }
            } else {
                $data = [
                    'title' => '',
                    'content' => ''
                ];
                $this->view('posts/new', $data);
            }
        }
        // edit post
        public function edit($id) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // sanitize post
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                // get the fuckin data
                $data = [
                    'id' => $id,
                    'title' => trim($_POST['title']),
                    'content' => trim($_POST['content']),
                    'user_id' => $_SESSION['user_id'],
                    // error variables
                    'title_err' => '',
                    'content_err' => ''
                ];
                // validate entry of fields
                if (empty($data['title'])) {
                    $data['title_err'] = 'Enter a title';
                }
                if (empty($data['content'])) {
                    $data['content_err'] = 'Enter your post content';
                }
                // check errors
                if (empty($data['title_err']) && empty($data['content_err'])) {
                    // valid post
                    if ($this->postModel->fixPost($data)) {
                        flash_msg('post_msg', 'POST_UPDATED!');
                        redirect('posts');
                    } else {
                        die('something is fucked up...');
                    }

                } else {
                    // load the view with error messages
                    $this->view('posts/new', $data);
                }
            } else {
                // get the existing post to be edited
                $post = $this->postModel->getPost($id);
                // make sure only the owner can access this
                if ($post->user_id != $_SESSION['user_id']) {
                    redirect('posts');
                }
                $data = [
                    'id' => $id,
                    'title' => $post->title,
                    'content' => $post->content
                ];
                $this->view('posts/edit', $data);
            }
        }


        // indiv.post page
        public function show($id) {
            $post = $this->postModel->getPost($id);
            $user = $this->userModel->getUser($post->user_id);
            $data = [
                'post' => $post,
                'user' => $user
            ];
            $this->view('posts/show', $data);
        }

        public function delete($id) {
            // ALWAYS A POST...thos it is a delete
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // make sure its the user whom is deleting their own post
                $post = $this->postModel->getPost($id);
                if ($post->user_id != $_SESSION['user_id']) {
                    redirect('posts');
                }
                if ($this->postModel->removePost($id)) {
                    flash_msg('post_msg', 'POST_REMOVED!');
                    redirect('posts');
                } else {
                    die('An error occured!');
                }
            } else {
                redirect('posts');
            }
        }
    }
?>