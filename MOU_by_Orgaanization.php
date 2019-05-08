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
<h1>MOU's Related</h1>
<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '123123');
    define('DB_NAME', 'UMS');


    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }


    echo "<h3>MOU's by Organization</h3>";
    $sql = 'SELECT * FROM MOU';
    //echo $sql;
    $vbn = mysqli_query($conn, $sql);
    if ($vbn ->num_rows <= 0) {
        echo "No such MOU's! <br>";
        return;
    }
    while ($row = mysqli_fetch_array($vbn)) {
    echo "<li>" .$row['Name'] . "<br>";
        }
        echo "</ul>";
?>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="container">
		
		<table border="0" width="500" align="center" class="demo-table">
	<tr>
    <label for="MOU"><td><b>MOU's:  </b></td></label>
    <td>
    <input type="text" name="MOU" class="demoInputBox" placeholder="Enter the name of Organization">
    <input type="submit" class="btnRegister" name="submit_MOU">
	</td>
	</tr>
</form>

<?php
    function university_query($conn, $sql) {
        $g = mysqli_query($conn, $sql);
        if ($g ->num_rows <= 0) {
            echo "No such MOU's! <br>";
            return;
        }
        while($g1 = mysqli_fetch_assoc($g)) {		
	    echo "<h5>Matching Queries are:</h5>";
            echo "<li>" . $g1['Type'] . " " . $g1['Signed_on'] . " " . $g1['Valid_upto'] . " " . $g1['Point_of_Contact_IITK']. "<br>";
        }
    }
if(isset($_POST["submit_MOU"])){
    echo "<h3>Here's the detail</h3>";
    $x = trim($_POST["MOU"]);
    $sql = 'SELECT * from MOU WHERE Name = "' . $x . '"';
    echo "<ul>";
    university_query($conn, $sql);
    echo "</ul>";
}

$conn->close();
?>

</body>
</html>

