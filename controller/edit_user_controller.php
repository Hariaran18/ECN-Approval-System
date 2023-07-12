<?php
    include ("../config/dbconnection.php");
    session_start();

    if($_SESSION['access'] == "Admin") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $emp_id = $_POST['emp_id'];
        $department = $_POST['department'];
        $access = $_POST['access'];
        
        
        // Image rename and storing
        $target_dir = "../src/img/sign/";

        // Image 1
        $filetoupload = basename($_FILES["sign"]["name"]);
        if($filetoupload == "") {
            $newFileName = "";
        } else {
            $imageFileType = pathinfo($filetoupload,PATHINFO_EXTENSION);
            $newFileName = $emp_id . '_sign.'.$imageFileType;
            $target_file = $target_dir . $newFileName;
            $file= $_FILES["sign"]["tmp_name"];

            if (move_uploaded_file($file, $target_file)) {
                echo "Signature has been uploaded.";
            } else {
                echo "Signature failed to upload.";
            }
        }



        // SQL Query
        $sql = "UPDATE user SET 
                name = '$name',
                email = '$email',
                department = '$department',
                access = '$access',
                sign = '$newFileName'
                WHERE `emp_id`= '$emp_id'";
            
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Successful!');</script>";
            echo '<script>window.location.href = "../view/manage_user.php";</script>';
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "!');</script>" ;
            echo '<script>window.location.href = "../view/manage_user.php";</script>';
        }
    } else {
        echo '<script>window.location.href = "../page/access_denied.php";</script>';
    }

    mysqli_close($conn); // Closing Connection with Server
?>