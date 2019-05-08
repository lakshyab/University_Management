<html>
<body>
<h1>Employee Database Interactive Portal</h1>
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
    Course ID:
    <input type="text" name="cid">
    <br/>
    
    Course Type:
    <select name="ctype">
      <option value="1">IC</option>
      <option value="2">DC</option>
      <option value="3">DE</option>
      <option value="4">OE</option>
      <option value="5">HSS</option>
      <option value="6">UGP</option>
    </select>
    <br/>
    
    Course Code:
    <input type="text" name="ccode">
    <br/>

    Course Name
    <input type="text" name="cname">
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

    Preferred Grade Type
    <select name="gradetype">
      <option value="1">A/B/C/D/E/F</option>
      <option value="2">S/X</option>
    </select>
    <br/>

    Course Website
    <input type="text" name="website">
    <br/>

    Course Credits
    <input type="text" name="ccredits">
    <br/>

    Thesis Credits
    <input type="text" name="tcredits">
    <br/>

    <input type="submit" name="data_submit"> 
</form>


<?php
    #Preferred grade_type must be int(not varchar).
    if(isset($_POST["data_submit"])){
    echo "<h3>Data Submitted Successfully</h3>";
    
    $ccode = trim($_POST["ccode"]);
    $cname = trim($_POST["cname"]);
    $cid = intval($_POST["cid"]);
    $gradetype = intval(trim($_POST["gradetype"]));
    $website = trim($_POST["website"]);
    $ccredits = intval(trim($_POST["ccredits"]));
    $tcredits = intval(trim($_POST["gender"]));
    $deptid = intval(trim($_POST["deptid"]));


    echo $ccode;
    echo $cname;
    echo $cid;
    echo $gradetype;
    echo $website;
    echo $ccredits;
    echo $tcredits;
    echo $deptid;
    
    $sql = "INSERT INTO Courses(CourseID,CCode,CName,Dept_ID,CType_No,CWebsite,CourseCredits,ThesisCredits,PrefGType) VALUES ('$cid','$ccode','$cname','$deptid','$ctype','$website','$ccredits','$tcredits','$gradetype')";
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
