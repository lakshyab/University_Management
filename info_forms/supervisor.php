<html>
<body>
<h1>Supervisor Information Page</h1>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "123123";
    $dbname = "UMS";
    echo "before connection";
    $conn = new mysqli($servername, $username, $password, $dbname);
    echo "after connections";
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    Faculty ID of Supervisor
    <input type="text" name="fid">
    <br/>
    
    Roll No of Student
    <input type="text" name="rollno">
    <br/>

    Exact Role of Supervisor
    <select name="role">
      <option value="Primary Supervisor">Primary Supervisor</option>
      <option value="Associate Supervisor">Associate Supervisor</option>
    </select>
    <br/>

    

    <input type="submit" name="data_submit"> 
</form>


<?php
    #Preferred grade_type must be int(not varchar).
    if(isset($_POST["data_submit"])){
    echo "<h3>Data Submitted Successfully</h3>";
    
    $fid = intval(trim($_POST["fid"]));
    $uniqid = intval(trim($_POST["rollno"]));
    $role = trim($_POST["role"]);
    
    echo $fid;
    echo $rollno;
    echo $role;
    
    if ($role == "Primary Supervisor") {
      $sql1 = "INSERT INTO Supervisor(Roll_No, Faculty_ID) VALUES ('$rollno','$fid')";
    } else {
      $sql2 = "INSERT INTO AssociateSupervisor(Roll_No, Faculty_ID) VALUES ('$rollno','$fid')";
    }

    echo "\nInserting Supervisor data: ";
    echo "<ul>";
    if ($conn->query($sql1) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }

    if ($conn->query($sql2) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
    echo "</ul>";
}

$conn->close();
?>

</body>
</html>
