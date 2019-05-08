<?php

function login($email, $password, $conn) {
    // Using prepared statements means that SQL injection is not possible. 
    $stmt = mysqli_prepare($conn, "SELECT password, salt FROM administrators WHERE email = ? LIMIT 1");
        mysqli_stmt_bind_param($stmt,'s', $email);  // Bind "$email" to parameter.
        //echo "                                               ";
        //echo $stmt; 

        mysqli_stmt_execute($stmt);

        //$stmt->store_result();
        mysqli_stmt_store_result($stmt);

        // get variables from result.
        //$stmt->bind_result($user_id, $db_password, $salt);
        mysqli_stmt_bind_result($stmt, $db_password, $salt);
        mysqli_stmt_fetch($stmt);
        // hash the password with the unique salt.
        $password = hash('sha512', $password . $salt);
        if ( mysqli_stmt_num_rows($stmt) == 1) {

                if ($db_password == $password) {
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    //echo $user_browser;
                    //echo $password;
                    // XSS protection as we might print this value
                    //$user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $email;
                    //echo $password;
                    //echo $_SESSION['user_id'];
                    // XSS protection as we might print this value
                    //$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);

                    //$_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512', $password . $user_browser);

                    // Login successful. 
                    return true;
                } 
                else
                {
                    return false;
                }
            
        } else {
            // No user exists. 
            return false;
        }
}


function login_check($conn) {
    // Check if all session variables are set 
    //echo "YYYY";
    if (isset($_SESSION['user_id'],$_SESSION['login_string'])) {
        //echo "*********************************************************************";
        $email = $_SESSION['user_id'];
        //echo $email;
        $login_string = $_SESSION['login_string'];
        //$username = $_SESSION['username'];

        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
        //echo $user_browser;
        $stmt = mysqli_prepare($conn, "SELECT password FROM administrators WHERE email = ? LIMIT 1");

            // Bind "$user_id" to parameter. 
              mysqli_stmt_bind_param($stmt,'s', $email);
              mysqli_stmt_execute($stmt);

        //$stmt->store_result();
             mysqli_stmt_store_result($stmt);
             mysqli_stmt_bind_result($stmt, $password);
             mysqli_stmt_fetch($stmt);

            if (mysqli_stmt_num_rows($stmt) == 1) {
                // If the user exists get variables from result.
                
                //echo $password;
                $login_check = hash('sha512', $password . $user_browser);
                //echo $login_check;
                //echo $login_string;
                if ($login_check == $login_string) {
                    // Logged In!!!!
                    //echo "YOOOOHOOO"; 
                    return true;
                } else {
                    // Not logged in 
                    return false;
                }
            } else {
                // Not logged in 
                return false;
            }
    } else {
        // Not logged in 
        return false;
    }
}


/*function sec_session_start() {
    $session_name = 'sec_session_id';   // Set a custom session name 
    $secure = SECURE;

    // This stops JavaScript being able to access the session id.
    $httponly = true;

    // Forces sessions to only use cookies.
//    if (ini_set('session.use_only_cookies', 1) === FALSE) {
//        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
//        exit();
//    }

    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);

    // Sets the session name to the one set above.
    session_name($session_name);

    session_start();            // Start the PHP session 
    session_regenerate_id();    // regenerated the session, delete the old one. 
}
*/


?>