<?php
    include ("../config/dbconnection.php");
    session_start();

    // if(($_SESSION['access'] == "admin") || ($_SESSION['access'] == "superuser")) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $emp_id = $_POST['emp_id'];
        $department = $_POST['department'];
        
        
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
                sign = '$newFileName'
                WHERE `emp_id`= '$emp_id'";
            
        if (mysqli_query($conn, $sql)) {
            
            echo "<script>alert('Successful!');</script>";
?>
            <meta http-equiv="refresh" content="0; url=../view/manage_user.php"/>
<?php
        } else {
            echo "Error: " . mysqli_error($conn);
?>
            <meta http-equiv="refresh" content="0; url=../view/manage_user.php"/>
<?php
        }
    // } else {
    //     include("./message/general/access_denied.php");
    // }

    mysqli_close($conn); // Closing Connection with Server
?>