<html>
<body>
<h1>Student Data Initialization Page</h1>

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
    Staff ID
    <input type="text" name="sid">
    <br/>
    
    Unique ID(Optional)
    <input type="text" name="uniqid">
    <br/>

    Joining Date:
    <input type="text" name="joindate">
    <br/>

    Designation:
    <select name="designation">
      <option value="1">Clerk</option>
      <option value="2">Maintenance</option>
      <option value="3">Lab Staff</option>
      <option value="4">Security</option>
    </select>
    <br/>    

    <input type="submit" name="data_submit"> 
</form>


<?php
    #Preferred grade_type must be int(not varchar).
    if(isset($_POST["data_submit"])){
    echo "<h3>Data Submitted Successfully</h3>";
    
    $sid = intval(trim($_POST["sid"]));
    $uniqid = intval(trim($_POST["uniqid"]));
    $designation = intval(trim($_POST["designation"]));
    $joindate = trim($_POST["joindate"]);
    
    echo $sid;
    echo $uniqid;
    echo $designation;
    echo $joindate;
    
    $sql = "INSERT INTO Staff(Staff_Id,Uniq_Id,Designation_No,Joining_Date) VALUES ('$sid','$uniqid','$designation','$joindate')";
    echo "Inserting Course data: ";
    echo "<ul>";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    echo "</ul>";
}

$conn->close();
?>

</body>
</html>
