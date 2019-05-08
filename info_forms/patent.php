<html>
<body>
<h1>Project Registration Portal</h1>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "123123";
    $dbname = "UMS";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    Uniq ID(Please Enter the your Unique ID you received at the time of registration)
    <input type="text" name="uniqid">
    <br/>
    
    Project Name
    <input type="text" name="projname">
    <br/>

    Patent Name
    <input type="text" name="patent">
    <br/>

    <input type="submit" name="data_submit"> 
</form>


<?php
    #Preferred grade_type must be int(not varchar).
    if(isset($_POST["data_submit"])){
    echo "<h3>Data Submitted Successfully</h3>";
    
    $uniqid = intval(trim($_POST["fundorg"]));
    $projname = trim($_POST["projname"]);
    $patent = trim($_POST["patent"]);
    
    
    $sql1 = "INSERT INTO Patent_and_Publications(Patent_Name) VALUES ('$patent')";
    
    $sql2 = "INSERT INTO Project_to_Patent(Patent_Name,Project_Name) VALUES ('$patent','$projname')";

    $sql3 = "INSERT INTO Patent_By(Uniq_Id,Patent_Name) VALUES ('$uniqid','$patent')"; 

    #Have to run 3 queries
    echo "\nInserting MOU data: ";
    echo "<ul>";
    if ($conn->query($sql1) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    if ($conn->query($sql2) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sq2 . "<br>" . $conn->error;
    }
    if ($conn->query($sql3) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sq3 . "<br>" . $conn->error;
    }
    echo "</ul>";
}

$conn->close();
?>

</body>
</html>
