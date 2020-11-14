<?php
    class Users extends Controller { //*view is part of the base controller
        public function __construct() {
            // load our model
            $this->userModel = $this->model('User'); // will check models folder for User.php
        }

        // register|signUp
        public function signUp() {
            /**
             * IMPORTANT TO NOTE::
             * ONLY NUMBERS ARE ALLOWED FOR PASSWORD AT THIS MOMENT
             * __very_odd__()
             */
            // check if POST or GET
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // process form
                // sanitize POST_data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                // input data
                $data = [
                    'screenname' => trim($_POST['screenname']),
                    'email' => trim($_POST['email']),
                    'pass' => trim($_POST['pass']),
                    'conf_pass' => trim($_POST['conf_pass']),
                    // error variables
                    'sn_err' => '',
                    'email_err' => '',
                    'pass_err' => '',
                    'conf_pass_err' => ''
                ];
                // logic for if fields are empty
                if (empty($data['email'])) {
                    $data['email_err'] = "You must enter an email address";
                } else {
                    // check email if already used or not
                    if ($this->userModel->findUserByEmail($data['email'])) {
                        // add email error
                        $data['email_err'] = "Email is already taken by a user";
                    }
                }
                if (empty($data['screenname'])) {
                    $data['sn_err'] = "Enter a Screenname";
                }
                if (empty($data['pass'])) {
                    $data['pass_err'] = "Select a password to use for your account";
                } 
                if (!preg_match('#.*^(?=.{8,16})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#', $data['pass'])) {
                    $data['pass_err'] = "Password must have at least one integer|number\nPassword must have at least one string|letter character\nPassword must have at least ONE capital letter\nPassword must include one special character ($,#,%,!, etc.)";
                }
                if (empty($data['conf_pass'])) {
                    $data['conf_pass_err'] = "Retype your password to confirm you set the password you intend";
                } else {
                    if ($data['pass'] != $data['conf_pass']) {
                        $data['pass_err'] = "Passwords do not match";
                        $data['conf_pass_err'] = "Passwords to not match";
                    }
                }
                // make sure no error vars are filled
                if (empty($data['email_err']) && empty($data['sn_err']) && empty($data['pass_err']) && empty($data['conf_pass_err']))
                {
                    // validated
                    // hash password
                    // !md5::password_hash instead its apparently better
                    $data['pass'] = password_hash($data['pass'], PASSWORD_DEFAULT);
                    // regiter new user
                    if($this->userModel->signUp($data)) {
                        flash_msg('register_success', 'User account has been registered; You may now login!');
                        redirect('users/login');
                    } else {
                        die('ERROR_OCCURED');
                    }
                } else {
                    // load view with errors
                    $this->view('users/signUp', $data);
                }

            } else {
                // load the form
                // init the data 
                $data = [
                    'screenname' => '',
                    'email' => '',
                    'pass' => '',
                    'conf_pass' => '',
                    // error variables
                    'sn_err' => '',
                    'email_err' => '',
                    'pass_err' => '',
                    'conf_pass_err' => ''
                ];
                // load the view
                $this->view('users/signUp', $data);
            }
        }

        public function login() {
            // check if POST or GET
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // process form
                // sanitize POST_data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                // input data
                $data = [
                    'email' => trim($_POST['email']),
                    'pass' => trim($_POST['pass']),
                    // error variables
                    'email_err' => '',
                    'pass_err' => ''
                ];
                // logic for if fields are empty
                if (empty($data['email'])) {
                    $data['email_err'] = "Enter your account's corresponding email address";
                }
                
                if (empty($data['pass'])) {
                    $data['pass_err'] = "Enter your password that you set the account up with";
                }
                // check for user|email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    // user was found
                } else {
                    $data['email_err'] = 'No user found';
                }
                // make sure no error vars are filled
                if (empty($data['email_err']) && empty($data['pass_err'])) {
                    // validated
                    // check and set logged in user
                    $loggedInUser = $this->userModel->login($data['email'], $data['pass']);
                    if ($loggedInUser) {
                        // create session vars
                        // create/start user session
                        $this->createUserSession($loggedInUser);
                    } else {
                        // render with error
                        $data['pass_err'] = 'Password is incorrect';
                        // reload the view
                        $this->view('users/login', $data);
                    }
                } else {
                    // load view with errors
                    $this->view('users/login', $data);
                }
                    
            } else {
                // load the form
                // init the data 
                $data = [
                    'email' => '',
                    'pass' => '',
                    // error variables
                    'email_err' => '',
                    'pass_err' => '',
                ];
                // load the view
                $this->view('users/login', $data);
            }
        }

        public function createUserSession($user) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['u_email'] = $user->email;
            $_SESSION['u_sn'] = $user->screenname;
            redirect('posts/index.php');
        }
        public function logout() {
            unset($_SESSION['user_id']);
            unset($_SESSION['u_email']);
            unset($_SESSION['u_sn']);
            session_destroy();
            redirect('users/login');
        }
        
    }
?>
