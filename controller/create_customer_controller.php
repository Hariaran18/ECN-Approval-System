<?php
    include ("../config/dbconnection.php");
    session_start();

    if (($_SESSION['access'] == "Admin") || ($_SESSION['access'] == "Controller")) {
        if(isset($_POST['submit'])) {
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

            // Get the maximum cus_id from the customer table
            $maxIdQuery = "SELECT MAX(cus_id) AS max_id FROM customer";
            $result = mysqli_query($conn, $maxIdQuery);
            $row = mysqli_fetch_assoc($result);
            $maxId = $row['max_id'];
            
            // Calculate the new cus_id
            if (!empty($maxId)) {
                $cus_id = $maxId + 1;
            } else {
                $cus_id = 1;
            }

            // SQL Query
            $sql = "INSERT INTO customer (cus_id, name, npi1, npi2, planner, sales, cs, purchasing, cam, bending, assembly, cnc, welding, finishing, qa) 
                        VALUES ('$cus_id', '$name', '$npi1', '$npi2', '$planner', '$sales', '$cs', '$purchasing', '$cam', '$bending', '$assembly', '$cnc', '$welding', '$finishing', '$qa')";
                
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
