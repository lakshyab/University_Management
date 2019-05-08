<html>
<body>
<h1>Register your Organization with IITK Page</h1>
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
    Organization Name
    <input type="text" name="name">
    <br/>
    
    Your Point of Contact
    <input type="text" name="poc">
    <br/>

    Email
    <input type="text" name="email">
    <br/>

    Contact Number
    <input type="text" name="contact">
    <br/>

    Address
    <input type="text" name="address">
    <br/>

    IITK Correspondent
    <input type="text" name="iitkcorr">
    <br/>

    <input type="submit" name="data_submit"> 
</form>


<?php
    #Preferred grade_type must be int(not varchar).
    if(isset($_POST["data_submit"])){
    echo "<h3>Data Submitted Successfully</h3>";
    
    $name = trim($_POST["name"]);
    $poc = trim($_POST["poc"]);
    $email = trim($_POST["email"]);
    $contact = trim($_POST["contact"]);
    $address = trim($_POST["address"]);
    $iitkcorr = trim($_POST["iitkcorr"]);
    
    
    $sql = "INSERT INTO Organization(Organization_Name, Point_of_Contact,Email,Contact_no,Address,IITK_corrospondent) VALUES ('$name','$poc','$email','$contact','$address','$iitkcorr')";
    

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
