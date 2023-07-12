<?php
    include ("../config/dbconnection.php");
    session_start();

    if($_SESSION['username'] != ""){

        $emp_id = $_SESSION['emp_id'];
        $username = $_SESSION['username'];
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $access = $_SESSION['access'];
        $department = $_SESSION['department'];
        $sign = $_SESSION['sign'];

        $today = date('Y-m-d');
        $form_id = $_POST['form_id'];
        $ecn_no = $_POST['ecn_no'];
        $type = $_POST['type'];

        // Update SQL according to department
        if ($department == "Planner") {

            $etd_no = $_POST['etd_no'];
            $job_no = $_POST['job_no'];
            $implement_date = $_POST['implement_date'];

            $sql = "UPDATE form_list SET 
            planner_chk = 10,
            etd_no = '$etd_no',
            job_no = '$job_no',
            implement_date = '$implement_date',
            planner_date = '$today',
            planner_sign = '$sign'
            WHERE `form_id`= '$form_id'"; 

        } else if ($department == "QA") {

            // Create a folder if not exist
            $imgDir = "../src/img/form/" . $ecn_no . "/";
            if (!file_exists($imgDir)) {
                mkdir($imgDir, 0777, true);
            }

            $filetoupload = basename($_FILES["fa_report"]["name"]);
            if($filetoupload == "") {
                $newFileName = "";
            } else {
                $imageFileType = pathinfo($filetoupload,PATHINFO_EXTENSION);
                $newFileName = $ecn_no . '_FA_Report.' . $imageFileType;
                $target_file = $imgDir . $newFileName;
                $file= $_FILES["fa_report"]["tmp_name"];

                if (move_uploaded_file($file, $target_file)) {
                    echo "Success";
                } else {
                    echo "<p>Failed to upload the before image.</p>";
                }
            }

            $sql = "UPDATE form_list SET 
            qa_chk = 10,
            qa_date = '$today',
            qa_sign = '$sign',
            fa_report = '$newFileName'
            WHERE `form_id`= '$form_id'"; 

        } else {

            $dept = strtolower($department);

            $sql = "UPDATE form_list SET 
            {$dept}_chk = 10,
            {$dept}_date = '$today',
            {$dept}_sign = '$sign'
            WHERE `form_id`= '$form_id'"; 

        }                
            
        // Send email notification
        if (mysqli_query($conn, $sql)) {

            
            // Check if form is closed or not
            $sql2 = "SELECT * FROM form_list WHERE form_id = '$form_id'";
            $result2 = mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_assoc($result2);

            // If closed
            if ($row2['planner_chk'] != 1 && $row2['sales_chk'] != 1 && $row2['cs_chk'] != 1 && $row2['purchasing_chk'] != 1 && $row2['cam_chk'] != 1 && $row2['bending_chk'] != 1 &&
                $row2['assembly_chk'] != 1 && $row2['cnc_chk'] != 1 && $row2['welding_chk'] != 1 && $row2['finishing_chk'] != 1 && $row2['qa_chk'] != 1){

                // Get customer information
                $sql3 = "SELECT * FROM customer WHERE name = '$customer'";
                $result3 = mysqli_query($conn,$sql3);
                $row3 = mysqli_fetch_assoc($result3);

                // Get related department emails
                $notify_email = '';

                // Check each column value and concatenate into $notify_email if not empty
                if ($row2['npi1_chk'] == 10 && !empty($row3['npi1'])) {
                    if (empty($notify_email)) {
                        $notify_email = $row3['npi1'];
                    } else {
                        $notify_email .= ', ' . $row3['npi1'];
                    }
                }

                if ($row2['npi2_chk'] == 10 && !empty($row3['npi2'])) {
                    if (empty($notify_email)) {
                        $notify_email = $row3['npi2'];
                    } else {
                        $notify_email .= ', ' . $row3['npi2'];
                    }
                }

                if ($row2['planner_chk'] == 10 && !empty($row3['planner'])) {
                    if (empty($notify_email)) {
                        $notify_email = $row3['planner'];
                    } else {
                        $notify_email .= ', ' . $row3['planner'];
                    }
                }

                if ($row2['sales_chk'] == 10 && !empty($row3['sales'])) {
                    if (empty($notify_email)) {
                        $notify_email = $row3['sales'];
                    } else {
                        $notify_email .= ', ' . $row3['sales'];
                    }
                }

                if ($row2['cs_chk'] == 10 && !empty($row3['cs'])) {
                    if (empty($notify_email)) {
                        $notify_email = $row3['cs'];
                    } else {
                        $notify_email .= ', ' . $row3['cs'];
                    }
                }

                if ($row2['purchasing_chk'] == 10 && !empty($row3['purchasing'])) {
                    if (empty($notify_email)) {
                        $notify_email = $row3['purchasing'];
                    } else {
                        $notify_email .= ', ' . $row3['purchasing'];
                    }
                }

                if ($row2['cam_chk'] == 10 && !empty($row3['cam'])) {
                    if (empty($notify_email)) {
                        $notify_email = $row3['cam'];
                    } else {
                        $notify_email .= ', ' . $row3['cam'];
                    }
                }

                if ($row2['bending_chk'] == 10 && !empty($row3['bending'])) {
                    if (empty($notify_email)) {
                        $notify_email = $row3['bending'];
                    } else {
                        $notify_email .= ', ' . $row3['bending'];
                    }
                }

                if ($row2['assembly_chk'] == 10 && !empty($row3['assembly'])) {
                    if (empty($notify_email)) {
                        $notify_email = $row3['assembly'];
                    } else {
                        $notify_email .= ', ' . $row3['assembly'];
                    }
                }

                if ($row2['cnc_chk'] == 10 && !empty($row3['cnc'])) {
                    if (empty($notify_email)) {
                        $notify_email = $row3['cnc'];
                    } else {
                        $notify_email .= ', ' . $row3['cnc'];
                    }
                }

                if ($row2['welding_chk'] == 10 && !empty($row3['welding'])) {
                    if (empty($notify_email)) {
                        $notify_email = $row3['welding'];
                    } else {
                        $notify_email .= ', ' . $row3['welding'];
                    }
                }

                if ($row2['finishing_chk'] == 10 && !empty($row3['finishing'])) {
                    if (empty($notify_email)) {
                        $notify_email = $row3['finishing'];
                    } else {
                        $notify_email .= ', ' . $row3['finishing'];
                    }
                }

                if ($row2['qa_chk'] == 10 && !empty($row3['qa'])) {
                    if (empty($notify_email)) {
                        $notify_email = $row3['qa'];
                    } else {
                        $notify_email .= ', ' . $row3['qa'];
                    }
                }

                
                // Update status to CLOSED
                $sql4 = "UPDATE form_list SET 
                status = 10
                WHERE `form_id`= '$form_id'";

                // Send email notification
                if (mysqli_query($conn, $sql4)) {

                    // Notify via email
                    $to2        =   $notify_email;
                    $subject2   =   $type . " is CLOSED";
                    $txt2       =   "Hi, All"."\n\n"
                                    ."Good day. " . $type . " No - " . $ecn_no . " has been CLOSED!"."\n"
                                    ."Please visit our ECN System at http://192.168.1.235:8088/ecn for more information."
                                    . "\n\n" . "Thank you.";

                    $headers2    =   "From: autonav@wenteleng.com";

                    if($_POST){
                        require_once '../config/email_setting.php';
                        mail($to2,$subject2,$txt2,$headers2);
                    }

                    $success_msg = "Congratulations, your ECN has been successfully Closed!";
                    header("Location: ../page/success.php?success_msg=" . urlencode($success_msg));
                    exit();

                } else {

                    $error_message = mysqli_error($conn);
                    $error_msg = "SORRY, ECN FAILED TO CLOSE!" . "\n" . "Error:" . $error_message;
                    header("Location: ../page/error.php?error_msg=" . urlencode($error_msg));

                }

            } else {
            
                // Notify via email
                $to        =   $email;
                $subject   =   $type . " is Approved";
                $txt       =   "Hi, ".$name."\n\n"
                                ."Good day. " . $type . " No - " . $ecn_no . " has been Approved successfully!" . "\n"
                                ."Please visit our ECN System at http://192.168.1.235:8088/ecn for more information."
                                . "\n\n" . "Thank you.";

                $headers    =   "From: autonav@wenteleng.com";

                if($_POST){
                    require_once '../config/email_setting.php';
                    mail($to,$subject,$txt,$headers);
                }
                $success_msg = "Congratulations, your ECN has been successfully Approved!";
                header("Location: ../page/success.php?success_msg=" . urlencode($success_msg));
                exit();
            }

        } else {

            $error_message = mysqli_error($conn);
            $error_msg = "SORRY, ECN APPROVE FAILED!" . "\n" . "Error:" . $error_message;
            header("Location: ../page/error.php?error_msg=" . urlencode($error_msg));
            exit();

        }

        mysqli_close($conn); // Closing Connection with Server

    } else {

        echo '<script>window.location.href = "../page/404.php";</script>';

    }

?>