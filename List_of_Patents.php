<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style>
body{
	width:1000px;
	font-family:calibri;
}
.demo-table {
	background: #d9eeff;
	width: 100%;
	border-spacing: initial;
	margin: 2px 0px;
	word-break: break-word;
	table-layout: auto;
	line-height: 1.8em;
	color: #333;
	border-radius: 8px;
	padding: 20px 40px;
}
.demo-table td {
	padding: 15px 0px;
}
.demoInputBox {
	padding: 5px 30px;
	border: #a9a9a9 1px solid;
	border-radius: 5px;
}
.btnRegister {
	padding: 10px 30px;
	background-color: #3367b2;
	border: 0;
	color: #FFF;
	cursor: pointer;
	border-radius: 4px;
	margin-left: 10px;
}	
	</style>
</head>
<body>
<h1>Patents</h1>
<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '123123');
    define('DB_NAME', 'UMS');

    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($conn ===false <= 0){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }


    echo "<h3>List of Patents</h3>";
    $sql = 'SELECT * FROM Patent_and_Publications';
    //echo $sql;
    $vbn = mysqli_query($conn, $sql);
    if ($vbn ->num_rows <= 0) {
        echo "No Patents! <br>";
        return;
    }
    while ($row = mysqli_fetch_array($vbn)) {
    echo "<li>" .$row['Patent_Name'] . "<br>";
        }
        echo "</ul>";
?>

</body>
</html>

