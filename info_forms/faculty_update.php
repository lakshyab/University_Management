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
    Enter your Unique ID(Optional) to Identify Yourself
    <input type="text" name="uniqid">
    <br/>

    You can update the following information
    <br/>
    Joining Date:
    <input type="text" name="joindate">
    <input type="submit" name="joindate_submit">
    <br/>

    Designation:
    <select name="designation">
      <option value="1">Assistant Professor</option>
      <option value="2">Associate Professor</option>
      <option value="3">Professor</option>
      <option value="4">Emeritus Professor</option>
    </select>
    <input type="submit" name="designation_submit">
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
    <input type="submit" name="dept_submit">
    <br/>

    

    <input type="submit" name="data_submit"> 
</form>


<?php
    #Preferred grade_type must be int(not varchar).
  if(isset($_POST["joindate_submit"])){
    
    $joindate = trim($_POST["joindate"]);
  
    $sql = "UPDATE Faculty SET Joining_Date='$joindate' WHERE Uniq_Id='$uniqid'";
    
    echo "<ul>";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    echo "</ul>";
  }

  if(isset($_POST["designation_submit"])){
    echo "<h3>Data Submitted Successfully</h3>";
    
    $designation = intval(trim($_POST["designation"]));
    
    $sql = "UPDATE Faculty SET Designation_No='$designation' WHERE Uniq_Id='$uniqid'";
    
    echo "<ul>";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    echo "</ul>";
  }

  if(isset($_POST["dept_submit"])){
    echo "<h3>Data Submitted Successfully</h3>";
    
    $deptid = intval(trim($_POST["deptid"]));
    
    $sql = "UPDATE Faculty SET Dept_ID='$deptid' WHERE Uniq_Id='$uniqid'";
    
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
