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
    Joining Date:
    <input type="text" name="joindate">
    <input type="submit" name="joindate_submit">
    <br/>

    Designation:
    <select name="designation">
      <option value="1">Clerk</option>
      <option value="2">Maintenance</option>
      <option value="3">Lab Staff</option>
      <option value="4">Security</option>
    </select>
    <input type="submit" name="designation_submit">
    <br/>    
 
</form>


<?php
    #Preferred grade_type must be int(not varchar).
    if(isset($_POST["joindate_submit"])){
        $joindate = trim($_POST["joindate"]);
        
        $sql = "UPDATE Staff SET Joining_Date='$joindate' WHERE Uniq_Id = '$uniqid'";
        
        echo "<ul>";
        if ($conn->query($sql) === TRUE) {
            echo "Updated Successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        echo "</ul>";
    }

    if(isset($_POST["designation_submit"])){
        echo "<h3>Data Submitted Successfully</h3>";
        
        $designation = intval(trim($_POST["designation"]));
                
        $sql = "UPDATE Staff SET Designation_No='$designation'  WHERE Uniq_Id = '$uniqid'";
        
        echo "<ul>";
        if ($conn->query($sql) === TRUE) {
            echo "Updated Successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        echo "</ul>";
    }



$conn->close();
?>

</body>
</html>
