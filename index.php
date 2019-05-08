<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <div align="right">
            <form action="Admin_Portal.php" method="post">
                    <input type="submit" name="Admin_Portal" value="Admin">
            </form>
        </div>
        <h1>University Management Portal</h1>
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


        <p> Choose the option most relevant to your query </p>


        <form action="Student_Admin.php" method="post">
            For infromation regarding Student's Administrative Bodies
                <input type="submit" name="Student_Admin">
        </form>
        <form action="Institute_Admin.php" method="post">
            For infromation regarding the administrative structure of the Indian Institute of Technology Kanpur
            <input type="submit" name="Insti_Admin">
        </form>
	<form action="Alumni.php" method="post">
            For infromation regarding Alumni's of the Indian Institute of Technology Kanpur
            <input type="submit" name="Alumni">
        </form>
        <form action="Academic Registration" method="post">
            For accessing the academic management portal
            <input type="submit" name="Acad_R">
        </form>

        <?php
        $conn->close();
        ?>

    </body>
</html>
