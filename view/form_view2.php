<?php
    include ("../config/dbconnection.php");
    include ("../config/navigationbar.php");

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
?>

<!DOCTYPE html>
<html>
    <head>
        <title>E-ECN & IECN</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <style>
            header {
                /* position: fixed; */
                top: 0;
                left: 0;
                right: 0;
                /* height: 50px;
                background-color: #333;
                color: #fff;*/
                /* padding: 30px;  */
            }
            footer {
                /* position: absolute; */
                bottom: 0;
                left: 0;
                right: 0;
                /* height: 300px; */
                /* background-color: #333;
                color: #fff; */
                padding: 10px;
            }
            body {
                /* position: absolute; */
                bottom: 0;
                left: 0;
                right: 0;
                /* height: 300px; */
                /* background-color: #333;
                color: #fff; */
                /* padding: 10px; */
            }
            .input-group {
                margin-bottom: 20px;
            }
            hr {
                height: 1px;
                background-color: black;
                border: none;
            }
            .img-size {
                width: 100%;
                height: 200px;
                border: 1px solid gray;
                text-align: center;
            }
            .image-box {
                width: 100%;
                height: 200px;
                border: 1px solid gray;
                text-align: center;
            }
            .sign-box {
                width: 100%;
                height: 80px;
                border: 1px solid gray;
                text-align: center;
            }

            @media print {
                @page {
                    size: A3 landscape;
                    margin: 0;
                }
                html, head, footer, body {
                    width: 100%;
                    height: 100%;
                    /* overflow: hidden;
                    left: 20px;
                    right: 20px; */
                }
                body {
                    transform: scale(1);
                    /* transform-origin: 0 0; */
                    /* page-break-after: avoid; */
                }
            }
            
            .container {
            max-width: 100%;
            padding-right: 20px;
            padding-left: 20px;
            margin-right: auto;
            margin-left: auto;
            }
        </style>

    </head>
    
        <header>
        <br><br>
            <div class="container">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title">ECN LAUNCHING</h2>
                        <div class="row">
                            <div class="col">
                                <label class="font-weight-bold">Created on</label>
                                <input type="date" id="created_on" name="created_on" class="form-control" value="<?php echo $row2['created_on']; ?>" readonly>
                            </div>
                            <div class="col">
                                <label class="font-weight-bold">Created by</label>
                                <input type="text" id="created_by" name="created_by" class="form-control" value="<?php echo $_SESSION['name']; ?>" readonly>
                            </div>
                            <div class="col">
                                <label class="font-weight-bold">Type</label>
                                <input class="form-control" name="type" id="type" value="<?php echo $row2['type'];?>" readonly>
                            </div>
                            <div class="col">
                                <label class="font-weight-bold">ECN No</label>
                                <input type="text" id="ecn_no" name="ecn_no" class="form-control" value="<?php echo $row2['ecn_no'];?>" readonly>
                            </div>
                            <div class="col">
                                <label class="font-weight-bold">Model/Top Level:</label>
                                <input type="text" id="model" name="model" class="form-control" value="<?php echo $row2['model'];?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <br>
                                <label class="font-weight-bold">ECR No</label>
                                <input type="text" id="ecr_no" name="ecr_no" class="form-control" value="<?php echo $row2['ecr_no'];?>" readonly>
                            </div>
                            <div class="col">
                                <br>
                                <label class="font-weight-bold">ETD</label>
                                <input type="text" id="etd_no" name="etd_no" class="form-control" value="<?php echo $row2['etd_no'];?>" readonly>
                            </div>
                            <div class="col">
                                <br>
                                <label class="font-weight-bold">Job No</label>
                                <input type="text" id="job_no" name="job_no" class="form-control" value="<?php echo $row2['job_no'];?>" readonly>
                            </div>
                            <div class="col">
                                <br>
                                <label class="font-weight-bold">Implement Date</label>
                                <input type="date" id="implement_date" name="implement_date" class="form-control" value="<?php echo $row2['implement_date'];?>" readonly>
                            </div>
                            <div class="col">
                                <br>
                                <label class="font-weight-bold">Status</label>
                                <input type="text" id="status" name="status" class="form-control" value="New" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div>
                                    <br>
                                    <label class="font-weight-bold">Customer</label>
                                    <input class="form-control" name="customer" id="customer" value="<?php echo $row2['customer'];?>" readonly>
                                </div>
                                <div>
                                    <label class="font-weight-bold">FA Report</label>
                                    <a href="../src/img/form/<?php echo $row2['ecn_no']; ?>/<?php echo $row2['fa_report']; ?>" target="_blank">
                                        <input type="text" class="form-control" value="<?php echo $row2['fa_report']; ?>" name="fa_report" id="fa_report" readonly>
                                    </a>
                                </div>
                            </div>
                            <div class="col checkbox" style="float:left;">
                                <br>
                                <label class="font-weight-bold">PIC</label>
                                <br>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="1" id="npi1_chk" name="npi1_chk" <?php if ($row2['npi1_chk'] == 1 || $row2['npi1_chk'] == 10) echo "checked"; ?> disabled>
                                    <label>NPI 1</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="1" id="npi2_chk" name="npi2_chk" <?php if ($row2['npi2_chk'] == 1 || $row2['npi2_chk'] == 10) echo "checked"; ?> disabled>
                                    <label>NPI 2</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="1" id="planner_chk" name="planner_chk" checked disabled>
                                    <label>Planner</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="1" id="sales_chk" name="sales_chk" checked disabled>
                                    <label>Sales</label>
                                </div>
                            </div>
                            <div class="col checkbox" style="float:left; margin-left:20px;">
                                <br>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="1" id="cs_chk" name="cs_chk" checked disabled>
                                    <label>Customer Service</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="1" id="purchasing_chk" name="purchasing_chk" <?php if ($row2['purchasing_chk'] == 1 || $row2['purchasing_chk'] == 10) echo "checked"; ?> disabled>
                                    <label>Purchasing</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="1" id="cam_chk" name="cam_chk" <?php if ($row2['cam_chk'] == 1 || $row2['cam_chk'] == 10) echo "checked"; ?> disabled>
                                    <label>CAM</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="1" id="bending_chk" name="bending_chk" <?php if ($row2['bending_chk'] == 1 || $row2['bending_chk'] == 10) echo "checked"; ?> disabled>
                                    <label>Bending</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="1" id="assembly_chk" name="assembly_chk" <?php if ($row2['assembly_chk'] == 1 || $row2['assembly_chk'] == 10) echo "checked"; ?> disabled>
                                    <label>Assembly</label>
                                </div>
                            </div>
                            <div class="col checkbox" style="float:left; margin-left:20px;">
                                <br>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="1" id="cnc_chk" name="cnc_chk" <?php if ($row2['cnc_chk'] == 1 || $row2['cnc_chk'] == 10) echo "checked"; ?> disabled>
                                    <label>CNC</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="1" id="welding_chk" name="welding_chk" <?php if ($row2['welding_chk'] == 1 || $row2['welding_chk'] == 10) echo "checked"; ?> disabled>
                                    <label>Welding</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="1" id="finishing_chk" name="finishing_chk" <?php if ($row2['finishing_chk'] == 1 || $row2['finishing_chk'] == 10) echo "checked"; ?> disabled>
                                    <label>Finishing</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="1" id="qa_chk" name="qa_chk" checked disabled>
                                    <label>QA</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <body>
            <br>           
            <div class="container" id="container">

                <?php for ($i = 0; $i < $numRows; $i += 3) {
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
                                <img src="../src/img/sign/<?php echo $row2['sales_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['sales_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="sales_date" name="sales_date" value="<?php echo $row2['sales_date']; ?>" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">CUSTOMER SERVICE</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['cs_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['cs_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="cs_date" name="cs_date" value="<?php echo $row2['cs_date']; ?>" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">ENGINEERING DEPT</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['engineer_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['engineer_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="engineer_date" name="engineer_date" value="<?php echo $row2['engineer_date']; ?>" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">PLANNING DEPT</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['planner_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['planner_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="planner_date" name="planner_date" value="<?php echo $row2['planner_date']; ?>" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">PURCHASE DEPT</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['purchase_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['purchase_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="purchase_date" name="purchase_date" value="<?php echo $row2['purchase_date']; ?>" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">CAM DEPT</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['cam_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['cam_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="cam_date" name="cam_date" value="<?php echo $row2['cam_date']; ?>" readonly></input>
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
                                <img src="../src/img/sign/<?php echo $row2['bending_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['bending_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="bending_date" name="bending_date" value="<?php echo $row2['bending_date']; ?>" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">ASSEMBLY DEPT</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['assembly_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['assembly_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="assembly_date" name="assembly_date" value="<?php echo $row2['assembly_date']; ?>" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">CNC DEPT</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['cnc_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['cnc_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="cnc_date" name="cnc_date" value="<?php echo $row2['cnc_date']; ?>" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">WELDING DEPT</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['welding_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['welding_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="welding_date" name="welding_date" value="<?php echo $row2['welding_date']; ?>" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">FINISHING DEPT</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['finishing_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['finishing_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="finishing_date" name="finishing_date" value="<?php echo $row2['finishing_date']; ?>" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">QA DEPT</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['qa_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['qa_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <input type="date" class="form-control" id="qa_date" name="qa_date" value="<?php echo $row2['qa_date']; ?>" readonly></input>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </footer>
</html>
