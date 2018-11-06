<?php
/**
 * flash message for user feedback
 *
 * @param  mixed $name
 * @param  mixed $message
 * @param  mixed $class
 *
 * @return void
 */
function flash($name = '', $message = '', $class = 'alert alert-success'){
    if(!empty($name)){
        if(!empty($message) && empty($_SESSION[$name])){

            if(!empty($_SESSION[$name])){
                unset($_SESSION[$name]);
            }


            if(!empty($_SESSION[$name . '_class'])){
                unset($_SESSION[$name . '_class']);
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;

        }elseif(empty($message) && !empty($_SESSION[$name])){
           $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
           echo "<div class='p-4 rounded-0 mb-3 " . $class . "' id='msg-flash'>" . $_SESSION[$name] . "</div>";
           
           unset($_SESSION[$name]);
           unset($_SESSION[$name . '_class']);
        }
    }
}



/**
 * forcibly end session
 */
function end_session(){
    //use both for compatibility with all browsers
    //and all versions of PHP
    session_unset();
    session_destroy();
}

/**
 * check if the request ip match the stored value
 * @return bool
 */
function request_ip_matches_session(){
    //return false if either value is not set
    if(!isset($_SESSION['ip']) || !isset($_SERVER['REMOTE_ADDR'])){
        return false;
    }
    if($_SESSION['ip'] === $_SERVER['REMOTE_ADDR']){
        return true;
    }else{
        return false;
    }
}

/**
 * check if request user agent match the stored value
 * @return bool
 */
function request_user_agent_matches_session(){
    //return false if either value is not set
    if(!isset($_SESSION['user_agent']) || !isset($_SERVER['HTTP_USER_AGENT'])){
        return false;
    }

    if($_SESSION['user_agent'] === $_SERVER['HTTP_USER_AGENT']){
        return true;
    }else{
        return false;
    }
}

/**
 * check if user last login has expire or not recent
 */
function last_login_is_recent(){
    $max_elapsed = 60 * 60 * 24;//1 week 
    //return false if value is not set
    if(!isset($_SESSION['last_login'])){
        return false;
    }

    if(($_SESSION['last_login'] + $max_elapsed) >= time()){
        return true;
    }else{
        return false;
    }
}

/**
 * should the session be considered valid
 * 
 */
function is_session_valid(){
    $check_ip = true;
    $check_user_agent = true;
    $check_last_login = true;

    if($check_ip && !request_ip_matches_session()){
        return false;
    }

    if($check_user_agent && !request_user_agent_matches_session()){
        return false;
    }

    if($check_last_login && !last_login_is_recent()){
        return false;
    }

    return true;
}

/**
 * check if session is not valid end and redirect to login page
 */
function confirm_session_is_valid(){
    if(!is_session_valid()){
        end_session();
        //Note that the header redirection requires output buffering
        //to be turned on or requires nothing has been output
        //(Not even whitespaces).
        header("Location: login.php");
        exit;
    }
}


/**
 * check if user is logged in already ?
 */
function is_logged_in(){
    return (isset($_SESSION['logged_in']) && $_SESSION['logged_in']);
}

/**
 * check if user is not login, end session and redirect to login page
 */
function confirm_user_logged_in(){
    if(!is_logged_in()){
        end_session();
        //Note that the header redirection requires output buffering
        //to be turned on or requires nothing has been output
        //(Not even whitespaces).
        redirect('Users/login');
        exit;
    }
}


/**
 * Actions to perorm after every successful login
 */
function after_successful_login(){
    //Rgenerate session ID to invalidate the old one
    //This is super important to prevent session hijacking/fixation
    session_regenerate_id();
    $_SESSION['logged_in'] = true;

    //Save this value in the session, even when checks aren't enabled
    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
    $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
    $_SESSION['last_login'] = time();
}

/**
 * Actions to perform after every successful logout
 */
function after_successful_logout(){
    $_SESSION['logged_in'] = false;
    end_session();
}

/**
 * Actions to perform before giving access to any access-restricted page
 */
function before_every_protected_page(){
    confirm_user_logged_in();
    confirm_session_is_valid();
}