
<?php

    session_start();

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

    if (login_check($mysqli) == true) {
        $logged = 'in';
    } else {
        $logged = 'out';
    }
//print_r($_SESSION);

$error_msg = "";

if (isset($_POST['email'],  $_POST['p'])) {
    // Sanitize and validate the data passed in
    //echo "I was here";

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    //echo $email;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= '<p class="error">The email address you entered is not valid</p>';
        //$error_msg .= '<p class="error">Try this username instead:</p>';

    }
    //echo($_POST['p']);
    
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';

    }


    // $words  = array('123456', '123456789', 'Qwerty1', '12345678', '111111');
    // foreach ($words as $word) {
    //     echo($_POST['p'].'\n'.$word.'\n');
    //     echo(levenshtein($_POST['p'], $word));
    //     echo('\n');
    //     $error_msg .= '<p class="error">test</p>';
    //     if(levenshtein($_POST['p'], $word)<=2){
    //         echo('inside');
    //         $error_msg .= '<p class="error">Please try a stronger password.</p>';
    //     }
    // }
    


    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //

    echo $error_msg;
    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.

    if (empty($error_msg)) {
        // Create a random salt
        
        $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));

        // Create salted password 
        $password = hash('sha512', $password . $random_salt);
        // $secans = hash('sha512', $secans . $secans_salt);
//echo "<script>console.log(" . $secans_salt . ")</script>";

        // Insert the new user into the database 
        //echo "HHHH1111";
        $stmt = mysqli_prepare($conn, "INSERT INTO administrators (id, email, password, salt) VALUES (NULL, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'sss', $email, $password, $random_salt);
        //echo "HHHH2222";
        //echo $stmt;
            // Execute the prepared query.
            if (! mysqli_stmt_execute($stmt)) {
                // header('Location: ../error.php?err=Registration failure: INSERT');
                echo "FFFFFFFFFF";
echo "<script> location.href='./error.php?err=Registration failure: INSERT'; </script>";
                exit();
            }
        
echo "<script> location.href='./register_success.php'; </script>";
        header('Location: ./register_success.php');
       exit();
    }
}
