<?php


include_once 'db_connect.php';
include_once 'psl-config.php';

$error_msg = "";

if (isset($_POST['Roll_No'], $_POST['ID'], $_POST['As'], $_POST['ctype'], $_POST['prewaiver'], $_POST['year'], $_POST['Sem'])) {

    $prep_stmt = "SELECT Course_Id FROM CourseOffered WHERE Course_Id = ? ";
    $stmt = $mysqli->prepare($prep_stmt);
    if ($stmt) {
        $stmt->bind_param('s', $_POST['ID']);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows == 0) {
            // A user with this email address already exists
            $error_msg .= '<p class="error">This Course is not offering this semester.</p>';
        }
    } else {
        $error_msg .= '<p class="error">Database error2</p>';
    }
    // $prep_stmt = "SELECT Roll_No FROM Students WHERE Roll_No = ? LIMIT 1";
    // $stmt = $mysqli->prepare($prep_stmt);
    
    // if ($stmt) {
    //     $stmt->bind_param('s', $_POST['Roll_No']);
    //     $stmt->execute();
    //     $stmt->store_result();

    //     if ($stmt->num_rows == 0) {
    //         // A user with this email address already exists
    //         $error_msg .= '<p class="error">Enter valid Roll No.</p>';
    //     }
    // } else {
    //     $error_msg .= '<p class="error">Database error</p>';
    // }

    $prep_stmt = "SELECT Course_Id FROM Transcript WHERE Roll_No = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
    
    if ($stmt) {
        $stmt->bind_param('s', $_POST['Roll_No']);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= '<p class="error">You Cannot Repeat a Course</p>';
        }
    } else {
        $error_msg .= '<p class="error">Database error</p>';
    }
    

    if (empty($error_msg)) {
        $default = "normal";
        echo $_POST['Roll_No'];
        echo $_POST['ID'];
        echo $_POST['As'];
        echo $_POST['ctype'];
        echo $_POST['year'];
        echo $_POST['Sem'];
        echo $_POST['prewaiver'];
        echo $default;
        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO Course_Request(Roll_No, Course_Id, Course_As, Course_Type, Academic_Year, Semester, Prereq_Waiver, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)")) {
             $insert_stmt->bind_param('iissssss', $_POST['Roll_No'], $_POST['ID'], $_POST['As'], $_POST['ctype'], $_POST['year'], $_POST['Sem'], $_POST['prewaiver'], $default);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
                exit();
            }
        }
        header('Location: ./register_success.php');
        exit();
    }
}
