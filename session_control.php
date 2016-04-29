<?php
session_start();

if(!isset($_POST['action'])){
    if(!isset($_SESSION['username'])){
        include_once 'login_form_before.php';
        include 'unlogin.php';
    }
    else {
        $username = $_SESSION['username'];
        include 'login_form_after.php';
        include $content_source;
    }
}
else {
    $log_action = filter_input(INPUT_POST, 'action');
    if($log_action == 'login'){
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $login_as = filter_input(INPUT_POST, 'login_as');
        
        if($login_as == 'User'){
            $DB_table = 'auth';
            require_once 'DBConfig.php';
            $error_code = $user->login($username,$password,true);
            switch ($error_code){
                case 1:
                    include 'login_form_after.php';
                    include_once $content_source;
                    break;
                case 0:
                    include_once 'login_form_before.php';
                    echo "<p style='color: red;'>User does not exist!</p>";
                    include 'unlogin.php';
                    break;
                case -1:            
                    include_once 'login_form_before.php';
                    echo "<p style='color: red;'>Wrong password!</p>";
                    include 'unlogin.php';
                    break;
                case -2:
                    include_once 'login_form_before.php';
                    echo "<p style='color: red;'>Username and password can not be empty!</p>";
                    include 'unlogin.php';
                    break;
            }  
        }
        elseif($login_as == 'Reviewer'){
            $DB_table = 'reviewer';
            require_once 'DBConfig.php';
            $error_code = $user->login($username,$password,false);
            switch ($error_code){
                case 1:
                    include 'login_form_after.php';
                    include $content_source;
                    break;
                case 0:
                    include_once 'login_form_before.php';
                    echo "<p style='color: red;'>User does not exist!</p>";
                    include 'unlogin.php';
                    break;
                case -1:            
                    include_once 'login_form_before.php';
                    echo "<p style='color: red;'>Wrong password!</p>";
                    include 'unlogin.php';
                    break;
                case -2:
                    include_once 'login_form_before.php';
                    echo "<p style='color: red;'>Username and password can not be empty!</p>";
                    include 'unlogin.php';
                    break;
            }  
        }
    }
    elseif ($log_action == 'logout') {
        $_SESSION = array();
        session_destroy();
        include_once 'login_form_before.php';
        include 'unlogin.php';
    } 
}




