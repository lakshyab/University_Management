<!DOCTYPE html>
<html>
    <head>
        <title>Students' Gymkhana</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <div align="right">
            <form action="Admin_Portal.php" method="post">
                    <input type="submit" name="Admin_Portal" value="Admin">
            </form>
        </div>
        <h1>Students' Gymkhana</h1>
        <?php
            define('DB_SERVER', 'localhost');
    	    define('DB_USERNAME', 'root');
    	    define('DB_PASSWORD', '123123');
    	    define('DB_NAME', 'UMS');
            $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

            if($conn === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

            echo "Select the Body about which you would like to know";
            $sql = 'SELECT Body FROM Student_Bodies WHERE Parent_Body is NULL';
            echo "<ul>";
            $g = mysqli_query($conn, $sql);
            while($g1 = mysqli_fetch_array($g)) {
                    echo "<li>" . $g1['Body'] .  "<br>";
                }
            echo "</ul>";
        ?>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            Select the body
                <input type="text" name="Gymkhana">
                <input type="submit" name="Submit_Gymkhana">
        </form>
        
        <?php

            if(isset($_POST["Submit_Gymkhana"]))
            {

                $x = trim($_POST["Gymkhana"]);
                //echo $x;
                echo "The Clubs/Cells within ".$x." are:";

                $stmt = mysqli_prepare($conn, "SELECT Body from Student_Bodies WHERE Parent_Body = ?");
                mysqli_stmt_bind_param($stmt, 's', $x);
                //mysqli_stmt_fetch($stmt);
                mysqli_stmt_execute($stmt);

                /* bind result variables */
                mysqli_stmt_bind_result($stmt, $child_body);

                /* fetch values */
                echo "<ul>";
                while (mysqli_stmt_fetch($stmt)) {
                    //echo "HHH";
                    //echo $child_body;
                    echo "<li>" . $child_body .  "<br>";
                    //printf ("%s\n", $child_body);
                }
                 echo "</ul>";
                /* close statement */
                echo "<form action='Contact_Details.php' method='post'>
                        For Information of the students working in a particular body, select body:
                        <input type='text' name='Body'>
                        <input type='submit' name='Submit_Body'>
                      </form>";
                mysqli_stmt_close($stmt);
            }

        ?>

        <?php
        $conn->close();
        ?>

    </body>
</html>
