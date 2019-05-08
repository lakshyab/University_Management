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
    Project Name
    <input type="text" name="projname">
    <br/>
    
    Funding Organization Name
    <input type="text" name="fundorg">
    <br/>

    Donator Name
    <input type="text" name="donator">
    <br/>

    Amount
    <input type="text" name="amount">
    <br/>

    Transaction Number
    <input type="text" name="trno">
    <br/>

    Type of Project
    <select name="projtype">
      <option value="Research Collaboration">Research Collaboration</option>
      <option value="Social Project">Social Project</option>
      <option value="Commercial Undertaking">Commercial Undertaking</option>
      <option value="Government Project">Government Project</option>
    </select>
    <br/>

    

    <input type="submit" name="data_submit"> 
</form>


<?php
    #Preferred grade_type must be int(not varchar).
    if(isset($_POST["data_submit"])){
    
    $projname = trim($_POST["projname"]);
    $fundorg = trim($_POST["fundorg"]);
    $donator = trim($_POST["donator"]);
    $amount = trim($_POST["amount"]);
    $trno = (int)trim($_POST["trno"]);
    $projtype = trim($_POST["projtype"]);
    
    $sql1 = "INSERT INTO Projects(Project_Name,Type) VALUES ('$projname','$projtype')";
    
    $sql2 = "INSERT INTO Funded_By(Organization_Name,Project_Name) VALUES ('$fundorg','$projname')";

    $sql3 = "INSERT INTO Funds(Transaction_No,Amount, Name_of_Donator, Project_Name) VALUES ('$trno','$amount','$donator', '$projname')"; 

    echo "\nInserting MOU data: ";
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
    if ($conn->query($sql3) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql3 . "<br>" . $conn->error;
    }
    echo "</ul>";
}

$conn->close();
?>

</body>
</html>
