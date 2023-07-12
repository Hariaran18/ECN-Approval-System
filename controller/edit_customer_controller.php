<?php
    include ("../config/dbconnection.php");
    session_start();

    if (($_SESSION['access'] == "Admin") || ($_SESSION['access'] == "Controller")) {
        if(isset($_POST['submit'])) {
            $cus_id = $_POST['cus_id'];
            $name = $_POST['name'];
            $npi1 = $_POST['npi1'];
            $npi2 = $_POST['npi2'];
            $planner = $_POST['planner'];
            $sales = $_POST['sales'];
            $cs = $_POST['cs'];
            $purchasing = $_POST['purchasing'];
            $cam = $_POST['cam'];
            $bending = $_POST['bending'];
            $assembly = $_POST['assembly'];
            $cnc = $_POST['cnc'];
            $welding = $_POST['welding'];
            $finishing = $_POST['finishing'];
            $qa = $_POST['qa'];

            // SQL Query
            $sql = "UPDATE customer SET
                    npi1 = '$npi1',
                    npi2 = '$npi2',
                    planner = '$planner',
                    sales = '$sales',
                    cs = '$cs',
                    purchasing = '$purchasing',
                    cam = '$cam',
                    bending = '$bending',
                    assembly = '$assembly',
                    cnc = '$cnc',
                    welding = '$welding',
                    finishing = '$finishing',
                    qa = '$qa'
                    WHERE cus_id = '$cus_id'";
            
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Successful!');</script>";
                echo '<script>window.location.href = "../view/customer_list.php";</script>';
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "!');</script>" ;
                echo '<script>window.location.href = "../view/customer_list.php";</script>';
            }
        } else {
            echo "Post method not working";
        }
    } else {
        echo '<script>window.location.href = "../page/access_denied.php";</script>';
    }

    mysqli_close($conn); // Closing Connection with Server
?>