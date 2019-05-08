<!DOCTYPE html>
<html>
    <head>
        <title>Faculty Info</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <div align="right">
            <form action="Admin_Portal.php" method="post">
                    <input type="submit" name="Admin_Portal" value="Admin">
            </form>
        </div>
        <h1>Institute</h1>
        <?php
            define('DB_SERVER', 'localhost');
    	    define('DB_USERNAME', 'root');
    	    define('DB_PASSWORD', '123123');
    	    define('DB_NAME', 'UMS');

            $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

            if($conn === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            $b = trim($_POST['Body']);
            //echo $b;
            echo "The Faculty in the ".$b." are";

            $stmt = mysqli_prepare($conn, "SELECT Name, Email, Phone_No, people.Uniq_Id, Faculty.Faculty_Id, Institute_Positions.Position_Id, Position_Name, Fac_Staff_Pos from Institute_Positions inner join Institute_Admin_Staff on Institute_Positions.Position_Id = Institute_Admin_Staff.Institute_Position_Id inner join students on Faculty.Faculty_Id = Institute_Admin_Staff.FRaculty_Id inner join people on people.Uniq_Id = Faculty.Uniq_Id WHERE Body = ? ORDER BY Fac_Staff_Pos");
            mysqli_stmt_bind_param($stmt, 's', $b);
            //mysqli_stmt_fetch($stmt);
            mysqli_stmt_execute($stmt);
            //mysqli_stmt_close($stmt);



            /* bind result variables */
            mysqli_stmt_bind_result($stmt, $name, $email, $phone, $uid, $rn, $pid,$position, $ph);

            /* fetch values */
            echo "<ul>";
            while (mysqli_stmt_fetch($stmt)) {
                //echo "HHH";
                //echo $child_body;
                echo "<li>" . " ". $position. " " . $name ." ". $email." ". $phone.  "<br>";
                //printf ("%s\n", $child_body);
            }
             echo "</ul>";
            /* close statement */
            /*echo "<form action='Contact_Details_institute_body.php' method='post'>
                    For Information of the students working in a particular body, select body:
                    <input type='text' name='Body'>
                    <input type='submit' name='Submit_Body'>
                  </form>";*/
            mysqli_stmt_close($stmt);

        ?>

        <?php
        $conn->close();
        ?>

    </body>
</html>
