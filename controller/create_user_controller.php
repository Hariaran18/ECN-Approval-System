<?php
include("../config/dbconnection.php");
session_start();

if ($_SESSION['access'] == "Admin") {
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password2 = $_POST['password'];
        $password = md5($password2);
        $name = $_POST['name'];
        $email = $_POST['email'];
        $emp_id = $_POST['emp_id'];
        $department = $_POST['department'];
        $access = $_POST['access'];

        // Image rename and storing
        $target_dir = "../src/img/sign/";

        // Image 1
        $filetoupload = basename($_FILES["sign"]["name"]);
        if ($filetoupload == "") {
            $newFileName = "";
        } else {
            $imageFileType = pathinfo($filetoupload, PATHINFO_EXTENSION);
            $newFileName = $emp_id . '_sign.' . $imageFileType;
            $target_file = $target_dir . $newFileName;
            $file = $_FILES["sign"]["tmp_name"];

            if (move_uploaded_file($file, $target_file)) {
                echo "Signature has been uploaded.";
            } else {
                echo "Signature failed to upload.";
            }
        }

        // SQL Query
        $sql = "INSERT INTO user (username, password, name, email, emp_id, department, sign, access) 
                VALUES ('$username', '$password', '$name', '$email', '$emp_id', '$department', '$newFileName', '$access')";

        if (mysqli_query($conn, $sql)) {

            // Insert Query of SQL & Notify via email
            $to = $email;
            $subject = "E-ECN & IECN Account has been created.";
            $txt = "Hi, " . $name . "\n\n"
                . "Good day. Your account has been registered successfully. Below is your account details:-  " . "\n"
                . "\n" . "Username = " . $username . "  "
                . "\n" . "Password = " . $password2 . "\n"
                . "\n" . "Please visit our ECN System at http://192.168.1.235:8088/ecn. You can change your password under NAME > PROFILE which is located at the top right side of the page."
                . "\n\n" . "Thank you.";

            $headers = "From: autonav@wenteleng.com";

            if ($_POST) {
                require_once '../config/email_setting.php';
                mail($to, $subject, $txt, $headers);

                echo "<script>alert('Successful!');</script>";
                echo '<script>window.location.href = "../view/manage_user.php";</script>';
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "!');</script>";
                echo '<script>window.location.href = "../view/manage_user.php";</script>';
            }
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "!');</script>";
            echo '<script>window.location.href = "../view/manage_user.php";</script>';
        }
    } else {
        echo "Post method not working";
    }
} else {
    echo '<script>window.location.href = "../page/access_denied.php";</script>';
}

mysqli_close($conn); // Closing Connection with Server
?>
