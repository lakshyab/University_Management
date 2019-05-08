<html>
<body>
<h1>Employee Database Interactive Portal</h1>
<!--
<?php
    /*$servername = "localhost";
    $username = "root";
    $password = "database";
    $dbname = "UMS";
    echo "before connection";
    $conn = new mysqli($servername, $username, $password, $dbname);
    echo "after connections";
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }*/ 
?>-->

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    Course ID:
    <input type="text" name="cid">
    <br/>
    
    Year:
    <select name="year">
      <option value="2019">2019-20</option>
      <option value="2018">2018-19</option>
      <option value="2017">2017-18</option>
      <option value="2016">2016-17</option>
      <option value="2015">2015-16</option>
      <option value="2014">2014-15</option>
    </select>
    <br/>
    
    Semester
    <select name="semester">
      <option value="1">Odd</option>
      <option value="2">Even</option>
      <option value="3">Summer</option>
    </select>
    <br/>

    Slot
    <input type="text" name="slot">
    <br/>

    Venue
    <input type="text" name="venue">
    <br/>

    Faculty_ID
    <input type="text" name="fid">
    <br/>

    <input type="submit" name="data_submit"> 
</form>


<?php
    #Preferred grade_type must be int(not varchar).
    if(isset($_POST["data_submit"])){
    echo "<h3>Data Submitted Successfully</h3>";
    
    $year = trim($_POST["year"]);
    $semester = trim($_POST["semester"]);
    $cid = intval(trim($_POST["cid"]));
    $fid = intval(trim($_POST["fid"]));
    $slot = trim($_POST["slot"]);
    $venue = trim($_POST["venue"]);

    
    $sql = "INSERT INTO CourseOffered(CourseID,Year,Semester,Slot, Venue,Faculty_ID) VALUES ('$cid','$year','$semester','$slot','$venue','$fid')";
    
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