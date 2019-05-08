<html>
<body>
<h1>Employee Database UPDATE Interactive Portal</h1>
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
    Enter your UNIQ ID to identify yourself
    <input type="text" name="uniqid">
    <br/>

    You can edit the following information
    Enter Name:
    <input type="text" name="name">
    <input type="submit" name="name_submit">
    <br/>
    
    Enter Date of Birth:
    <input type="text" name="dob">
    <input type="submit" name="dob_submit">
    <br/>

    Email
    <input type="text" name="email">
    <input type="submit" name="email_submit">
    <br/>

    Contact No:
    <input type="text" name="phone">
    <input type="submit" name="phone_submit">
    <br/>

    Father's Name
    <input type="text" name="father">
    <input type="submit" name="father_submit">
    <br/>

    Category:
    <select name="category">
      <option value="1">General</option>
      <option value="2">SC/ST</option>
      <option value="3">OBC</option>
    </select>
    <input type="submit" name="category_submit">
    <br/>

</form>


<?php
    if(isset($_POST["name_submit"])){
    
        $name = trim($_POST["name"]);
        $sql = "UPDATE people SET Name='$name' WHERE Uniq_Id='$uniqid' "
        echo "<ul>";
        if ($conn->query($sql) === TRUE) {
            echo "Updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        echo "</ul>";
    }

    if(isset($_POST["dob_submit"])){
    
        $dob = trim($_POST["dob"]);
        
        $sql = "UPDATE people SET DOB='$dob' WHERE Uniq_Id='$uniqid'"
        echo "<ul>";
        if ($conn->query($sql) === TRUE) {
            echo "Updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        echo "</ul>";
    }

    if(isset($_POST["email_submit"])){
    
        $email = trim($_POST["email"]);
        
        $sql = "UPDATE people SET Email='$email' WHERE Uniq_Id='$uniqid'"
        echo "<ul>";
        if ($conn->query($sql) === TRUE) {
            echo "Updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        echo "</ul>";
    }

    if(isset($_POST["phone_submit"])){

        $phone = trim($_POST["phone"]);
        
        
        $sql = "UPDATE people SET Phone_No='$phone' WHERE Uniq_Id='$uniqid'"
        echo "<ul>";
        if ($conn->query($sql) === TRUE) {
            echo "Updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        echo "</ul>";
    }

    if(isset($_POST["father_submit"])){

        $father = trim($_POST["father"]);
        
        
        $sql = "UPDATE people SET Father='$father' WHERE Uniq_Id='$uniqid'"
        echo "<ul>";
        if ($conn->query($sql) === TRUE) {
            echo "Updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        echo "</ul>";
    }

    if(isset($_POST["category_submit"])){

        $category = intval(trim($_POST["category"]));
        
        $sql = "UPDATE people SET Category='$category' WHERE Uniq_Id='$uniqid'"
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
