<!DOCTYPE html>
<html>
    <head>
        <title>Student Adminstration Information</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <div align="right">
            <form action="Admin_Portal.php" method="post">
                    <input type="submit" name="Admin_Portal" value="Admin">
            </form>
        </div>
        <h1>Student Adminstration Information</h1>
        <?php
            define('DB_SERVER', 'localhost');
    	    define('DB_USERNAME', 'root');
    	    define('DB_PASSWORD', '123123');
    	    define('DB_NAME', 'UMS');

            $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

            if($conn === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

        ?>


        <p> You would like information pertaining to which body? </p>


        <form action="R_and_D.php" method="post">
            For infromation regarding Office of Research and Development
                <input type="submit" name="Gymkhana">
        </form>
        <form action="OIR.php" method="post">
            For infromation regarding Office International Relations
            <input type="submit" name="submit_search_last_name">
        </form>

        <?php
        $conn->close();
        ?>

    </body>
</html>
