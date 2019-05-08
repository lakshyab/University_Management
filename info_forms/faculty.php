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
    Faculty ID
    <input type="text" name="fid">
    <br/>
    
    Unique ID(Optional)
    <input type="text" name="uniqid">
    <br/>

    Joining Date:
    <input type="text" name="joindate">
    <br/>

    Designation:
    <select name="designation">
      <option value="1">Assistant Professor</option>
      <option value="2">Associate Professor</option>
      <option value="3">Professor</option>
      <option value="4">Emeritus Professor</option>
    </select>
    <br/>

    Department
    <select name="deptid">
      <option value="1">Computer Science</option>
      <option value="2">Electrical Engineering</option>
      <option value="3">Mathematics</option>
      <option value="4">Mechanical Engineering</option>
      <option value="5">Economics</option>
      <option value="6">Chemical Engineering</option>
      <option value="7">Chemistry</option>
      <option value="8">Physics</option>
      <option value="9">Civil Engineering</option>
      <option value="10">Biological Science and BioEngineering</option>
    </select>
    <br/>

    

    <input type="submit" name="data_submit"> 
</form>


<?php
    #Preferred grade_type must be int(not varchar).
    if(isset($_POST["data_submit"])){
    echo "<h3>Data Submitted Successfully</h3>";
    
    $fid = intval(trim($_POST["fid"]));
    $uniqid = intval(trim($_POST["uniqid"]));
    $designation = intval(trim($_POST["designation"]));
    $deptid = intval(trim($_POST["deptid"]));
    $joindate = trim($_POST["joindate"]);
    
    echo $fid;
    echo $uniqid;
    echo $designation;
    echo $deptid;
    echo $joindate;
    
    $sql = "INSERT INTO Faculty(Faculty_Id,Dept_ID,Uniq_Id,Designation_No,Joining_Date) VALUES ('$fid','$deptid','$uniqid','$designation','$joindate')";
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
