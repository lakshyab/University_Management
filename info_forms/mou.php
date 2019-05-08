<html>
<body>
<h1>MOU(Memorandum of Understanding) Page</h1>
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
    Name of MOU
    <input type="text" name="name">
    <br/>
    
    Point of Contact IITK
    <input type="text" name="pociitk">
    <br/>

    Signed_on Date(YYYY-MM-DD)
    <input type="text" name="signdate">
    <br/>

    Validity Upto(YYYY-MM-DD)
    <input type="text" name="valdate">
    <br/>

    Type of MOU
    <select name="type">
      <option value="Joint Degree Program">Joint Degree Program</option>
      <option value="Student Exchange Program">Student Exchange Program</option>
      <option value="Faculty Research Collaboration">Faculty Research Collaboration </option>
    </select>
    <br/>

    

    <input type="submit" name="data_submit"> 
</form>


<?php
    #Preferred grade_type must be int(not varchar).
    if(isset($_POST["data_submit"])){
    echo "<h3>Data Submitted Successfully</h3>";
    
    $pociitk = trim($_POST["pociitk"]);
    $signdate = trim($_POST["signdate"]);
    $valdate = trim($_POST["valdate"]);
    $name = trim($_POST["name"]);
    $type = trim($_POST["type"]);
    
    $sql = "INSERT INTO MOU(Name,Point_of_Contact_IITK,Signed_on, Valid_upto,Type) VALUES ('$name','$pociitk','$signdate','$valdate','$type')";
    

    echo "\nInserting MOU data: ";
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
