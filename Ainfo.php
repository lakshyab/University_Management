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
<h1>DORD Related</h1>
<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '123123');
    define('DB_NAME', 'UMS');

    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }


    echo "<h3>Alumni Information</h3>";
    $sql = 'SELECT * FROM Alumni';
    //echo $sql;
    $vbn = mysqli_query($conn, $sql);
    if ($vbn == false) {
        echo "No such Alumni! <br>";
        return;
    }
    while ($row = mysqli_fetch_array($vbn)) {
    echo "<li>" .$row['Alumni_ID'] . " " . $row['Organization'] . " " . $row['Grad_Batch'] . " " . $row['Name'] . " " . $row['Pay'] . "<br>";
        }
        echo "</ul>";
?>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="container">
		
		<table border="0" width="500" align="center" class="demo-table">
	<tr>
    <label for="Alumni_name"><td><b>Alumni Name:  </b></td></label>
    <td>
    <input type="text" name="Alumni_name" class="demoInputBox" placeholder="Enter the Name">
    <input type="submit" class="btnRegister" name="submit_Alumni_name">
	</td>
	</tr>
</form>

 	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="container">
		
		<table border="0" width="500" align="center" class="demo-table">
	<tr>
    <label for="Alumni_org"><td><b>Alumni's organization:  </b></td></label>
    <td>
    <input type="text" name="Alumni_org" class="demoInputBox" placeholder="Search Alumni by organization">
    <input type="submit" class="btnRegister" name="submit_Alumni_org">
	</td>
	</tr>
</form>

<?php
    function university_query($conn, $sql) {
        $g = mysqli_query($conn, $sql);
        if ($g == false) {
            echo "No such Alumni! <br>";
            return;
        }
        while($g1 = mysqli_fetch_assoc($g)) {		
	    echo "<h5>Matching Queries are:</h5>";
            echo "<li>" . $g1['Alumni_ID'] . " " . $g1['Alumni_name'] . " " . $g1['Organization'] . " " . $g1['Grad_Batch'] . "<br>";
        }
    }
if(isset($_POST["submit_Alumni_org"])){
    echo "<h3>Here's the detail</h3>";
    $x = trim($_POST["Alumni_org"]);
    $sql = 'SELECT * from Alumni WHERE Organization = "' . $x . '"';
    echo "<ul>";
    university_query($conn, $sql);
    echo "</ul>";
}
if(isset($_POST["submit_Alumni_name"])){
    echo "<h3>Here's the detail</h3>";
    $x = trim($_POST["Alumni_name"]);
    $sql = 'SELECT * from Alumni WHERE Name = "' . $x . '"';
    echo "<ul>";
    university_query($conn, $sql);
    echo "</ul>";
}

$conn->close();
?>

</body>
</html>

