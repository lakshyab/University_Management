<?php

session_start();            // Start the PHP session 


include_once 'support_functions.php';

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'newuser');
define('DB_PASSWORD', 'HelloDarkness1!');
define('DB_NAME', 'tmp');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (isset($_POST['email'], $_POST['p'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['p']; 
    
    if (login($email, $password, $conn) == true) { 
        //echo "HELOOOOOOOO";
        //$ll = login_check($conn);
        //echo $ll;
        header("Location: info_forms/protected_page.php");
        //exit();
    } else {
        // Login failed 
        header('Location: ../index.php?error=1');
        exit();
    }
} else {
    // The correct POST variables were not sent to this page. 
    header('Location: ../error.php?err=Could not process login');
    exit();
}