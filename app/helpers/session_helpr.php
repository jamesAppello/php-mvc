<?php
    // start session
    session_start();
    function flash_msg($name = '', $msg = '', $class= 'alert alert-success') {
        if (!empty($name)) {
            if (!empty($msg) && empty($_SESSION[$name])) {
                // check fo session if set then unset them
                if (!empty($_SESSION[$name])) {
                    unset($_SESSION[$name]);
                }
                if (!empty($_SESSION[$name . '_class'])) {
                    unset($_SESSION[$name . '_class']);
                }
                $_SESSION[$name] = $msg;
                $_SESSION[$name . '_class'] = $class;
            } else if (empty($msg) && !empty($_SESSION[$name])) {
                $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
                echo '<div class ="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name . '_class']);
            }
        }
    }
    function isLoggedIn() {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
    
?>