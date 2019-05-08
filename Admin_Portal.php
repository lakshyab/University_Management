
<?php

    session_start();            // Start the PHP session 

    include_once 'support_functions.php';

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'newuser');
    define('DB_PASSWORD', 'HelloDarkness1!');
    define('DB_NAME', 'tmp');

    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($conn === false)
        {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

   if (login_check($conn) == true) {
        $logged = 'in';
    } else {
        $logged = 'out';
    }
//print_r($_SESSION);
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <h1>Login using Administrator Credentials</h1>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?>
        <form action="process_login.php" method="post" name="login_form">
            Email: <input type="text" name="email" />
            Password: <input type="password" 
                             name="password" 
                             id="password"/>
            <input type="button" 
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);" /> 
        </form>-
        <p>You are currently logged <?php echo $logged ?>.</p>
            
<?php
if (login_check($mysqli) == false) {
        echo '<p>To register as administrator<a href="admin_register.php">Reg</a></p>';
} else {

        echo '<p>If you are done, please <a href="includes/logout.php">log out</a>.</p>';
}
?>
    </body>
</html>    