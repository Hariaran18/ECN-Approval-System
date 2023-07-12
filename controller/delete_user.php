<?php
    include ("../config/dbconnection.php");
    session_start();

    if($_SESSION['access'] == "Admin"){

        $emp_id = $_GET['emp_id'];

        // SQL Query
        $sql = "DELETE FROM user WHERE emp_id = '$emp_id'";

        // echo "<pre>";
        // print_r($sql);
            
        if (mysqli_query($conn, $sql)) {
            
            echo "<script>alert('Successful!');</script>";
            echo '<script>window.location.href = "../view/manage_user.php";</script>';
        } else {
            echo "Error: " . mysqli_error($conn);
            echo '<script>window.location.href = "../view/manage_user.php";</script>';
        }
    } else {
        echo '<script>window.location.href = "../page/access_denied.php";</script>';
    }

    mysqli_close($conn); // Closing Connection with Server
?>