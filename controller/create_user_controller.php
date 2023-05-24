<?php
    include ("../config/dbconnection.php");
    session_start();

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password2 = $_POST['password'];
        $password = md5($password2);
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
        $sql = "INSERT INTO user (username,password,name,email,emp_id,department,sign) 
                    VALUES ('$username','$password','$name','$email','$emp_id','$department','$newFileName')";
            
        if (mysqli_query($conn, $sql)) {

            // Insert Query of SQL & Notify via email
            $to         =   $email;
            $subject    =   "E-ECN & IECN System Account has been created.";
            $txt        =   "Hi, " . $name . "\n\n"
                            . "Good day. Your account has been registered successfully. Below is your account details:-  " . "\n"
                            . "\n" . "Username = " . $username . "  "
                            . "\n" . "Password = " . $password2 . "\n"
                            . "\n" . "Please visit to the E-ECN & IECN System at http://192.168.1.235:8088/ecn. You can change your password under Name > Profile which located at top right side of the page."
                            . "\n\n" . "Thank you.";

            $headers = "From: test@test.com";

            if($_POST){
                ini_set("SMTP","test-com.mail.protection.outlook.com");
                ini_set("smtp_port","00");
                ini_set("auth_username" , "test@test.com");
                ini_set("auth_password" , "test1234");
                ini_set("sendmail_from" , "test@test.com");

                mail($to,$subject,$txt,$headers);

            echo "<script>alert('Successful!');</script>";
?>
            <meta http-equiv="refresh" content="0; url=../view/manage_user.php"/>
<?php
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "!');</script>" ;
?>
                <meta http-equiv="refresh" content="0; url=../view/manage_user.php"/>
<?php
            }
        } else {
            include("./message/general/access_denied.php");
        }
    } else {
        echo "Post method not working";
    }

    mysqli_close($conn); // Closing Connection with Server
?>