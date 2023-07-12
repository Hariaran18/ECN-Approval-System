<?php
    include ("../config/dbconnection.php");
    session_start();

    if($_SESSION['username'] != ""){

        $emp_id = $_SESSION['emp_id'];
        $username = $_SESSION['username'];
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $department = $_SESSION['department'];
        $sign = $_SESSION['sign'];
        $today = date('Y-m-d');

        // Retrieve form data
        $created_on = $today;
        $created_by = $_POST['created_by'];
        $type = $_POST['type'];
        $model = $_POST['model'];
        $ecn_no = $_POST['ecn_no'];
        $ecr_no = $_POST['ecr_no'];
        $etd_no = $_POST['etd_no'];
        $customer = $_POST['customer'];
        $job_no = $_POST['job_no'];
        $implement_date = $_POST['implement_date'];
        $status = $_POST['status'];

        $npi1_chk = isset($_POST['npi1_chk']) ? $_POST['npi1_chk'] : 0;
        $npi2_chk = isset($_POST['npi2_chk']) ? $_POST['npi2_chk'] : 0;
        $planner_chk = 1;
        $sales_chk = 1;
        $cs_chk = 1;
        $purchasing_chk = isset($_POST['purchasing_chk']) ? $_POST['purchasing_chk'] : 0;
        $cam_chk = isset($_POST['cam_chk']) ? $_POST['cam_chk'] : 0;
        $bending_chk = isset($_POST['bending_chk']) ? $_POST['bending_chk'] : 0;
        $assembly_chk = isset($_POST['assembly_chk']) ? $_POST['assembly_chk'] : 0;
        $cnc_chk = isset($_POST['cnc_chk']) ? $_POST['cnc_chk'] : 0;
        $welding_chk = isset($_POST['welding_chk']) ? $_POST['welding_chk'] : 0;
        $finishing_chk = isset($_POST['finishing_chk']) ? $_POST['finishing_chk'] : 0;
        $qa_chk = 1;

        $b_details1 = $_POST['b_details'];
        $b_partno1 = $_POST['b_partno'];
        $b_rev1 = $_POST['b_rev'];
        $a_details1 = $_POST['a_details'];
        $a_partno1 = $_POST['a_partno'];
        $a_rev1 = $_POST['a_rev'];

        // Retrieve uploaded images
        $before_pic = isset($_FILES['b_pic']) ? $_FILES['b_pic'] : null;
        $after_pic = isset($_FILES['a_pic']) ? $_FILES['a_pic'] : null;

        // Create a folder for each submission
        $imgDir = "../src/img/form/" . $ecn_no . "/";
        if (!file_exists($imgDir)) {
            mkdir($imgDir, 0777, true);
        }

        // Create a database connection
        // $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get customer information
        $sql3 = "SELECT * FROM customer WHERE name = '$customer'";
        $result3 = mysqli_query($conn,$sql3);
        $row3 = mysqli_fetch_assoc($result3);

        $notify_email = '';

        // Check each column value and concatenate into $notify_email if not empty
        if ($npi1_chk == 10 && !empty($row3['npi1'])) {
            if (empty($notify_email)) {
                $notify_email = $row3['npi1'];
            } else {
                $notify_email .= ', ' . $row3['npi1'];
            }
        }

        if ($npi2_chk == 10 && !empty($row3['npi2'])) {
            if (empty($notify_email)) {
                $notify_email = $row3['npi2'];
            } else {
                $notify_email .= ', ' . $row3['npi2'];
            }
        }

        if ($planner_chk == 1 && !empty($row3['planner'])) {
            if (empty($notify_email)) {
                $notify_email = $row3['planner'];
            } else {
                $notify_email .= ', ' . $row3['planner'];
            }
        }

        if ($sales_chk == 1 && !empty($row3['sales'])) {
            if (empty($notify_email)) {
                $notify_email = $row3['sales'];
            } else {
                $notify_email .= ', ' . $row3['sales'];
            }
        }

        if ($cs_chk == 1 && !empty($row3['cs'])) {
            if (empty($notify_email)) {
                $notify_email = $row3['cs'];
            } else {
                $notify_email .= ', ' . $row3['cs'];
            }
        }

        if ($purchasing_chk == 1 && !empty($row3['purchasing'])) {
            if (empty($notify_email)) {
                $notify_email = $row3['purchasing'];
            } else {
                $notify_email .= ', ' . $row3['purchasing'];
            }
        }

        if ($cam_chk == 1 && !empty($row3['cam'])) {
            if (empty($notify_email)) {
                $notify_email = $row3['cam'];
            } else {
                $notify_email .= ', ' . $row3['cam'];
            }
        }

        if ($bending_chk == 1 && !empty($row3['bending'])) {
            if (empty($notify_email)) {
                $notify_email = $row3['bending'];
            } else {
                $notify_email .= ', ' . $row3['bending'];
            }
        }

        if ($assembly_chk == 1 && !empty($row3['assembly'])) {
            if (empty($notify_email)) {
                $notify_email = $row3['assembly'];
            } else {
                $notify_email .= ', ' . $row3['assembly'];
            }
        }

        if ($cnc_chk == 1 && !empty($row3['cnc'])) {
            if (empty($notify_email)) {
                $notify_email = $row3['cnc'];
            } else {
                $notify_email .= ', ' . $row3['cnc'];
            }
        }

        if ($welding_chk == 1 && !empty($row3['welding'])) {
            if (empty($notify_email)) {
                $notify_email = $row3['welding'];
            } else {
                $notify_email .= ', ' . $row3['welding'];
            }
        }

        if ($finishing_chk == 1 && !empty($row3['finishing'])) {
            if (empty($notify_email)) {
                $notify_email = $row3['finishing'];
            } else {
                $notify_email .= ', ' . $row3['finishing'];
            }
        }

        if ($qa_chk == 1 && !empty($row3['qa'])) {
            if (empty($notify_email)) {
                $notify_email = $row3['qa'];
            } else {
                $notify_email .= ', ' . $row3['qa'];
            }
        }

        // Retrieve the maximum form_id from the form_list table
        $sql_max_id = "SELECT MAX(form_id) AS max_id FROM form_list";
        $result_max_id = $conn->query($sql_max_id);
        $row_max_id = $result_max_id->fetch_assoc();
        $max_id = $row_max_id['max_id'];

        // Increment the form_id
        $formId = $max_id !== null ? $max_id + 1 : 1;

        // Insert group name into the database
        $sql = "INSERT INTO form_list 
        (form_id,created_on,created_by,type,model,ecn_no,ecr_no,etd_no,customer,job_no,implement_date,status,npi1_chk,npi2_chk,planner_chk,sales_chk,cs_chk,purchasing_chk,cam_chk,bending_chk,assembly_chk,cnc_chk,welding_chk,finishing_chk,qa_chk,engineer_sign,engineer_date)
        VALUES 
        ('$formId','$created_on','$created_by','$type','$model','$ecn_no','$ecr_no','$etd_no','$customer','$job_no','$implement_date','$status','$npi1_chk','$npi2_chk','$planner_chk','$sales_chk','$cs_chk','$purchasing_chk','$cam_chk','$bending_chk','$assembly_chk','$cnc_chk','$welding_chk','$finishing_chk','$qa_chk','$sign','$today')";
        
        $result = $conn->query($sql);
        if ($result === false) {
            // Query execution failed
            echo "Error: " . $sql . "<br>" . $conn->error;
        } else {
            // Query executed successfully
            // $formId = $conn->insert_id;
            echo "Query executed successfully!";
        }

        // Insert people data into the database
        for ($i = 0; $i < count($b_partno1); $i++) {
            $entry_no = $i+1;
            $b_details = $conn->real_escape_string($b_details1[$i]);
            $b_partno = $conn->real_escape_string($b_partno1[$i]);
            $b_rev = $conn->real_escape_string($b_rev1[$i]);
            $a_details = $conn->real_escape_string($a_details1[$i]);
            $a_partno = $conn->real_escape_string($a_partno1[$i]);
            $a_rev = $conn->real_escape_string($a_rev1[$i]);

            // Before Picture
            $filetoupload1 = basename($before_pic["name"][$i]);
            if($filetoupload1 == "") {
                $newFileName1 = "";
            } else {
                $imageFileType1 = pathinfo($filetoupload1,PATHINFO_EXTENSION);
                $newFileName1 = $ecn_no . '_before_' . ($i+1) . '.' . $imageFileType1;
                $target_file1 = $imgDir . $newFileName1;
                $file1= $before_pic["tmp_name"][$i];

                if (move_uploaded_file($file1, $target_file1)) {
                    echo "Success";
                } else {
                    echo "<p>Failed to upload the before image.</p>";
                }
            }

            // After Picture
            $filetoupload2 = basename($after_pic["name"][$i]);
            if($filetoupload2 == "") {
                $newFileName2 = "";
            } else {
                $imageFileType2 = pathinfo($filetoupload2,PATHINFO_EXTENSION);
                $newFileName2 = $ecn_no . '_after_' . ($i+1) . '.' . $imageFileType1;
                $target_file2 = $imgDir . $newFileName2;
                $file2= $after_pic["tmp_name"][$i];

                if (move_uploaded_file($file2, $target_file2)) {
                    echo "Success";
                } else {
                    echo "<p>Failed to upload the before image.</p>";
                }
            }

            $sql2 = "INSERT INTO form (entry_no,form_id, b_details, b_partno, b_rev, a_details, a_partno, a_rev, b_pic, a_pic) VALUES ('$entry_no','$formId', '$b_details', '$b_partno', '$b_rev', '$a_details', '$a_partno', '$a_rev', '$newFileName1', '$newFileName2')";
            $result2 = $conn->query($sql2);
        }

        if ($result && $result2){
            // Send email notification for All related departments
            $to        =   $notify_email;
            $subject   =   $type . " is Created";
            $txt       =   "Hi, All" . "\n\n"
                            ."Good day. " . $type . " No - " . $ecn_no . " has been Created by " . $created_by . ". " . "\n"
                            ."Please visit our ECN System at http://192.168.1.235:8088/ecn under APPROVAL tab for Approval process."
                            . "\n\n" . "Thank you.";

            $headers    =   "From: autonav@wenteleng.com";

            if($_POST){
                require_once '../config/email_setting.php';
                mail($to,$subject,$txt,$headers);
            }
            $success_msg = "Congratulations, your ECN has been successfully Created!";
            header("Location: ../page/success.php?success_msg=" . urlencode($success_msg));
            exit();

        } else{
            $error_message = mysqli_error($conn);
            $error_msg = "SORRY, ECN CREATE FAILED!" . "\n" . "Error:" . $error_message;
            header("Location: ../page/error.php?error_msg=" . urlencode($error_msg));
            exit();
        }

        // Close the database connection
        $conn->close();

    } else {
        echo '<script>window.location.href = "../page/404.php";</script>';
    }
?>
