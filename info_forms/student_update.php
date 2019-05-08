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
    
    Enter you Unique ID for identification
    <input type="text" name="uniqid">
    <br/>

    You can update the following information
    <br/>

    Parental Income
    <input type="text" name="income">
    <input type="submit" name="income_submit">
    <br/>


    Academic Probation Status
    <select name="probation">
      <option value="None">None</option>
      <option value="Warning">Warning</option>
      <option value="Academic Probation">Academic Probation</option>
      <option value="Appealing against Termination">Appealing against Termination</option>
      <option value="Terminated">Terminated</option>
    </select>
    <input type="submit" name="probation_submit">
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
    <input type="submit" name="deptid_submit">
    <br/>

    Programme
    <select name="progid">
      <option value="1">BTech in Computer Science</option>
      <option value="2">BTech in Electrical Engineering</option>
      <option value="3">BS in Mathematics</option>
      <option value="4">BTech in Mechanical Engineering</option>
      <option value="5">BS in Economics</option>
      <option value="6">BTech in Chemical Engineering</option>
      <option value="7">BS Chemistry</option>
      <option value="8">BS Physics</option>
      <option value="9">BTech in Civil Engineering</option>
      <option value="10">BS in Biological Science and BioEngineering</option>

      <option value="11">MTech in Computer Science</option>
      <option value="12">MTech in Electrical Engineering</option>
      <option value="13">MSc in Mathematics</option>
      <option value="14">MTech in Mechanical Engineering</option>
      <option value="15">MSc in Economics</option>
      <option value="16">MTech in Chemical Engineering</option>
      <option value="17">MSc Chemistry</option>
      <option value="18">MSc Physics</option>
      <option value="19">MTech in Civil Engineering</option>
      <option value="20">MSc in Biological Science and BioEngineering</option>

      <option value="21">PhD in Computer Science</option>
      <option value="22">PhD in Electrical Engineering</option>
      <option value="23">PhD in Mathematics</option>
      <option value="24">PhD in Mechanical Engineering</option>
      <option value="25">PhD in Economics</option>
      <option value="26">PhD in Chemical Engineering</option>
      <option value="27">PhD Chemistry</option>
      <option value="28">PhD Physics</option>
      <option value="29">PhD in Civil Engineering</option>
      <option value="30">PhD in Biological Science and BioEngineering</option>      
    </select>
    <input type="submit" name="progid_submit">
    <br/>
 
</form>


<?php
    #Preferred grade_type must be int(not varchar).
    if(isset($_POST["income_submit"])){
      echo "<h3>Data Submitted Successfully</h3>";
      $income = intval(trim($_POST["income"]));
      
      $sql = "UPDATE students SET Parental_Income='$income' WHERE Uniq_Id='$uniqid'"
      echo "<ul>";
      if ($conn->query($sql) === TRUE) {
          echo "Updated successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
      echo "</ul>";
    }

    if(isset($_POST["probation_submit"])){
      echo "<h3>Data Submitted Successfully</h3>";
      
      $probation = trim($_POST["probation"]);

      $sql = "UPDATE students SET academic_probation_status='$probation' WHERE Uniq_Id='$uniqid'"
      echo "<ul>";
      if ($conn->query($sql) === TRUE) {
          echo "Updated successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
      echo "</ul>";
    }

    if(isset($_POST["deptid_submit"])){
      echo "<h3>Data Submitted Successfully</h3>";
      
      $deptid = intval(trim($_POST["deptid"]));
      
      $sql = "UPDATE students SET Dept_ID='$deptid' WHERE Uniq_Id='$uniqid'"
      echo "<ul>";
      if ($conn->query($sql) === TRUE) {
          echo "Updated successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
      echo "</ul>";
    }

    if(isset($_POST["progid_submit"])){
      echo "<h3>Data Submitted Successfully</h3>";
      
      $progid = intval(trim($_POST["progid"]));
      
      $sql = "UPDATE students SET Prog_ID='$progid' WHERE Uniq_Id='$uniqid'"
      echo "<ul>";
      if ($conn->query($sql) === TRUE) {
          echo "Updated successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
      echo "</ul>";
    }

$conn->close();
?>

</body>
</html>
