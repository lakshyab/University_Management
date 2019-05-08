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
    Enter Name:
    <input type="text" name="name">
    <br/>
    
    Who are you?
    <select name="role_id">
      <option value="1">student</option>
      <option value="2">faculty</option>
      <option value="3">staff</option>
    </select>
    <br/>
    
    Enter Date of Birth:
    <input type="text" name="dob">
    <br/>

    Email
    <input type="text" name="email">
    <br/>

    Contact No:
    <input type="text" name="phone">
    <br/>

    Gender
    <select name="gender">
      <option value="M">Male</option>
      <option value="F">Female</option>
    </select>
    <br/>

    Father's Name
    <input type="text" name="father">
    <br/>

    Category:
    <select name="category">
      <option value="1">General</option>
      <option value="2">SC/ST</option>
      <option value="3">OBC</option>
    </select>
    <br/>

    <input type="submit" name="data_submit"> 
</form>


<?php
    if(isset($_POST["data_submit"])){
    echo "<h3>Data Submitted Successfully</h3>";
    
    $name = trim($_POST["name"]);
    $dob = trim($_POST["dob"]);
    $role_id = intval($_POST["role_id"]);
    $father = trim($_POST["father"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $gender = trim($_POST["gender"]);
    $category = intval(trim($_POST["category"]));

    echo $name;
    echo $dob;
    echo $role_id;
    echo $father;
    echo $email;
    echo $phone;
    echo $gender;
    echo $category;
    
    $sql = "INSERT INTO people(Name,DOB,Father,Email,Role_In_Campus_No,Phone_No,Gender,Category_No) VALUES ('$name','$dob','$father','$email','$role_id','$phone','$gender','$category')";
    echo "Inserting personal data: ";
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
