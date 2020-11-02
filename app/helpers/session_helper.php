<?php
    session_start();

    // Flash message helper
    function flash($name = '', $message = '', $class = 'alert alert-success') {
        # If there is a name of the message eg. register_success
        if(!empty($name)) {

            # If there is a message passed in and no message in the session
            if(!empty($message) && empty($_SESSION[$name])) {
                if(!empty($_SESSION[$name])) {
                    unset($_SESSION[$name]);
                }
                if(!empty($_SESSION[$name . '_class'])) {
                    unset($_SESSION[$name . '_class']);
                }

                # Set session variables
                $_SESSION[$name] = $message;
                $_SESSION[$name . '_class'] = $class;

            # If no message is passed in and there is a message in the session
            } else if(empty($message) && !empty($_SESSION[$name])) {
                # Display message and unset session variables
                $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
                echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name . '_class']);
            }
        }
    }

    function isLoggedIn() {
        if(isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

