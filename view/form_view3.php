<?php
    include ("../config/dbconnection.php");
    include ("../config/navigationbar.php");

    // Check if the session has expired
    // if (isset($_SESSION['LAST_ACTIVITY']) && time() - $_SESSION['LAST_ACTIVITY'] > 1800) {
    //     // Session expired, perform logout
    //     unset($_SESSION["username"]);
    //     unset($_SESSION["name"]);
    //     unset($_SESSION["email"]);
    //     unset($_SESSION["emp_id"]);
    //     unset($_SESSION["department"]);
    //     unset($_SESSION["sign"]);
    //     unset($_SESSION["access"]);
    //     echo '<script> location.replace("login.php"); </script>';
    // }

    // Update the last activity timestamp
    $_SESSION['LAST_ACTIVITY'] = time();

    $fid = $_GET['form_id'];

    // Query to fetch group details and related form records
    $sql = "SELECT f.form_id, f.ecn_no, f.type, f.model, p.b_pic, p.a_pic, p.b_rev, p.a_rev, p.b_details, p.a_details, p.b_partno, p.a_partno
            FROM form_list f
            INNER JOIN form p ON f.form_id = p.form_id
            WHERE f.form_id = '$fid'";
    $result = $conn->query($sql);
    $numRows = $result->num_rows; // Get the number of rows in the result set
    $rowIndex = 0; // Initialize the row index

    $sql2 = "SELECT * FROM form_list
            WHERE form_id = '$fid'";
    $result2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_assoc($result2);

// Close the database connection
$conn->close();

    // $sql = "SELECT * FROM `form` WHERE ncmr_no = '".$fid."'";
    // $qry = mysqli_query($conn,$sql);

	// if($_SESSION["username"]) {
	//     if(($_SESSION['access'] == "admin") || ($_SESSION['access'] == "superuser")) {
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
                width:90%;
                border-collapse: collapse;
                margin-left: auto;
                margin-right: auto;
            }
            th, td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }
        </style>
    </head>
        <header>
            <br>
            <table>
                <tr>
                    <th>ECN Launching</th>
                    <td>
                        <div>
                            Job No:
                        </div>
                        <div>
                            <?php echo $row2['ecn_no']; ?>
                        </div>
                    </td>
                    <td>
                        <div>
                            ETD/Implementation Date:
                        </div>
                        <div>
                            <?php echo $row2['ecn_no']; ?>
                        </div>
                    </td>
                    <td>
                        <div>
                            ECR No:
                        </div>
                        <div>
                            <?php echo $row2['ecn_no']; ?>
                        </div>
                    </td>
                    <td>
                        <div>
                            ECN No:
                        </div>
                        <div>
                            <?php echo $row2['ecn_no']; ?>
                        </div>
                    </td>
                    <td>
                        <div>
                            Model/Top Level:
                        </div>
                        <div>
                            <?php echo $row2['model']; ?>
                        </div>
                    </td>
                    <td>WE-ENG-F55-06</td>
                </tr>
            </table>
        </header>
        <body>
            <br>
            <table>
                <tr>
                    <div class="col-md-4">
                        <td>Image</td>
                        <td>
                            <td>Image</td>
                        </td>
                        <td>Image</td>
                        <td>Image</td>
                    </div>
                    
                </tr>
            </table>
            <div class="container" id="container">

                <?phpfor ($i = 0; $i < $numRows; $i += 3) {
                        // Start of the row
                        echo '<div class="row input-group">';
                        for ($j = 1; $j <= 3; $j++) {
                            $row = $result->fetch_assoc(); // Fetch the next row

                            if (!$row) {
                                break; // If there are no more rows, exit the loop
                            }
            
                            echo '<div class="col-md">';
                            echo '<div class="card">';
                            echo '<div class="card-header">';
                            echo '<h5 class="card-title d-flex justify-content-center">BEFORE</h5>';
                            echo '</div>';
                            echo '<div class="card-body">';
                            echo 'Picture:';
                            echo '<div class="image-box">';
                            echo '<a href="../src/img/form/' . $row2['ecn_no'] . '/' . $row['b_pic'] . '" target="_blank">';
                            echo '<img src="../src/img/form/' . $row2['ecn_no'] . '/' . $row['b_pic'] . '" class="img-size" style="display: ' . (empty($row['b_pic']) ? 'none' : 'block') . ';">';
                            echo '</a>';
                            echo '</div>';
                            echo '<br>';
                            echo 'Details of Change:';
                            echo '<input type="text" class="form-control" value="' . $row['b_details'] . '" readonly>';
                            echo '<div class="row">';
                            echo '<div class="col">';
                            echo 'PART NO:';
                            echo '<input type="text" class="form-control" value="' . $row['b_partno'] . '" readonly>';
                            echo '</div>';
                            echo '<div class="col">';
                            echo 'REVISION:';
                            echo '<input type="text" class="form-control" value="' . $row['b_rev'] . '" readonly>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="card">';
                            echo '<div class="card-header">';
                            echo '<h5 class="card-title d-flex justify-content-center">AFTER</h5>';
                            echo '</div>';
                            echo '<div class="card-body">';
                            echo 'Picture:';
                            echo '<div class="image-box">';
                            echo '<a href="../src/img/form/' . $row2['ecn_no'] . '/' . $row['a_pic'] . '" target="_blank">';
                            echo '<img src="../src/img/form/' . $row2['ecn_no'] . '/' . $row['a_pic'] . '" class="img-size" style="display: ' . (empty($row['a_pic']) ? 'none' : 'block') . ';">';
                            echo '</a>';
                            echo '</div>';
                            echo '<br>';
                            echo 'Details of Change:';
                            echo '<input type="text" class="form-control" value="' . $row['a_details'] . '" readonly>';
                            echo '<div class="row">';
                            echo '<div class="col">';
                            echo 'PART NO:';
                            echo '<input type="text" class="form-control" value="' . $row['a_partno'] . '" readonly>';
                            echo '</div>';
                            echo '<div class="col">';
                            echo 'REVISION:';
                            echo '<input type="text" class="form-control" value="' . $row['a_rev'] . '" readonly>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';

                        }
                        // End of the row
                        echo '</div>';
                        $rowIndex += 3; // Increment the row index
                    }
                ?>
            </div> 
        </body>

    <br><br>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">SALES DEPT</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/img1.jpg" class="img-fluid sign-box" style="display:<?php echo empty($sign1) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">CUSTOMER SERVICE</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/img1.jpg" class="img-fluid sign-box" style="display:<?php echo empty($sign1) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">ENGINEERING DEPT</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/img1.jpg" class="img-fluid sign-box" style="display:<?php echo empty($sign1) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">PLANNING DEPT</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/img1.jpg" class="img-fluid sign-box" style="display:<?php echo empty($sign1) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">PURCHASE DEPT</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/img1.jpg" class="img-fluid sign-box" style="display:<?php echo empty($sign1) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">CAM DEPT</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/img1.jpg" class="img-fluid sign-box" style="display:<?php echo empty($sign1) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">BENDING DEPT</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/img1.jpg" class="img-fluid sign-box" style="display:<?php echo empty($sign1) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">ASSEMBLY DEPT</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/img1.jpg" class="img-fluid sign-box" style="display:<?php echo empty($sign1) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">CNC DEPT</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/img1.jpg" class="img-fluid sign-box" style="display:<?php echo empty($sign1) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">WELDING DEPT</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/img1.jpg" class="img-fluid sign-box" style="display:<?php echo empty($sign1) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">FINISHING DEPT</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/img1.jpg" class="img-fluid sign-box" style="display:<?php echo empty($sign1) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">QA DEPT</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/img1.jpg" class="img-fluid sign-box" style="display:<?php echo empty($sign1) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </footer>
</html>
