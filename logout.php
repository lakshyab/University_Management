<?php

include_once 'support_functions.php';
session_start();

// Unset all session values 
$_SESSION = array();

session_destroy();
header("Location: ../index.php");
exit();
?>