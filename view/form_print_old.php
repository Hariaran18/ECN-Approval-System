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
                /* padding-bottom: 20px; */
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
                text-align: center;
                padding-left: 10px;
                padding-right: 10px;
            }

            @media print {
                @page {
                    size: A3 landscape;
                    margin: 20px;
                }
                .print-button {
                    display: none;
                }
                .avoid-break {
                    page-break-inside: avoid;
                }
            }
            
            .container {
            max-width: 100%;
            margin-right: auto;
            margin-left: auto;
            }
        </style>

    </head>
    
    <header>
        <table style="width: 95%; border-collapse: collapse; border: 1px solid black; margin: 0 auto;">
            <tr>
                <td style="width: 30%; border: 1px solid black;" rowspan="2">
                    <div style="display: flex; align-items: center;">
                        <img src="../src/img/logo.png" alt="Logo" style="width: 50px; height: 50px; margin-right: 10px; margin-left: 10px;">
                        <div>
                            <b>ECN LAUNCHING</b><br>
                            <span>Wentel Engineering Sdn. Bhd.</span>
                        </div>
                    </div>
                </td>
                <td style="width: 10%; border: 1px solid black; padding-left: 10px;"><b>Job No:</b><br><?php echo $row2['job_no']; ?></td>
                <td style="width: 15%; border: 1px solid black; padding-left: 10px;"><b>ETD No/Implement Date:</b><br><?php echo $row2['etd_no'] . '/' . date('d-m-Y', strtotime($row2['implement_date'])); ?></td>
                <td style="width: 10%; border: 1px solid black; padding-left: 10px;"><b>ECR No:</b><br><?php echo $row2['ecr_no']; ?></td>
                <td style="width: 10%; border: 1px solid black; padding-left: 10px;"><b>ECN No:</b><br><?php echo $row2['ecn_no']; ?></td>
                <td style="width: 15%; border: 1px solid black; padding-left: 10px;"><b>Model/Top Level:</b><br><?php echo $row2['model']; ?></td>
                <td style="width: 10%; border: 1px solid black; padding-left: 10px;" rowspan=2><b>WE-ENG-F55-07</b><br></td>
            </tr>
        </table>
    </header>

    <body>
        <br>           
        <div class="container" id="container" style="width: 95%; border-collapse: collapse; border: 1px solid black; margin: 0 auto; font-size: 14px;">

            <?php for ($i = 0; $i < $numRows; $i += 3) {
                    // Start of the row
                    echo '<div class="row input-group">';
                    for ($j = 1; $j <= 3; $j++) {
                        $row = $result->fetch_assoc(); // Fetch the next row

                        if (!$row) {
                            break; // If there are no more rows, exit the loop
                        }
            ?>
                    <div class="col-md">
                        <br>
                        <div>
                            <div>
                                <h6 class="d-flex justify-content-center">BEFORE</h6>
                            </div>
                            <div>
                                <div class="image-box">
                                    <a href="../src/img/form/<?php echo $row2['ecn_no']; ?>/<?php echo $row['b_pic']; ?>" target="_blank">
                                        <img src="../src/img/form/<?php echo $row2['ecn_no']; ?>/<?php echo $row['b_pic']; ?>" class="img-size" style="display:<?php echo empty($row['b_pic']) ? 'none' : 'block'; ?>;">
                                    </a>
                                </div>
                                Details of Change:
                                <input type="text" class="form-control" value="<?php echo $row['b_details']; ?>" readonly>
                                <div class="row">
                                    <div class="col">
                                        PART NO:
                                        <input type="text" class="form-control" value="<?php echo $row['b_partno']; ?>" readonly>
                                    </div>
                                    <div class="col">
                                        REVISION:
                                        <input type="text" class="form-control" value="<?php echo $row['b_rev']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div>
                            <div>
                                <h6 class="d-flex justify-content-center">AFTER</h6>
                            </div>
                            <div>
                                <div class="image-box">
                                    <a href="../src/img/form/<?php echo $row2['ecn_no']; ?>/<?php echo $row['a_pic']; ?>" target="_blank">
                                        <img src="../src/img/form/<?php echo $row2['ecn_no']; ?>/<?php echo $row['a_pic']; ?>" class="img-size" style="display:<?php echo empty($row['a_pic']) ? 'none' : 'block'; ?>;">
                                    </a>
                                </div>
                                Details of Change:
                                <input type="text" class="form-control" value="<?php echo $row['a_details']; ?>" readonly>
                                <div class="row">
                                    <div class="col">
                                        PART NO:
                                        <input type="text" class="form-control" value="<?php echo $row['a_partno']; ?>" readonly>
                                    </div>
                                    <div class="col">
                                        REVISION:
                                        <input type="text" class="form-control" value="<?php echo $row['a_rev']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>

                <?php
                    }
                    // End of the row
                    echo '</div>';
                    $rowIndex += 3; // Increment the row index
                }
            ?>
        </div> 
    </body>

    <br>
    <footer class="avoid-break">
        <table style="width: 95%; border-collapse: collapse; margin: 0 auto; border: 1px solid black; font-size: 12px;">
            <tr style="border: 1px solid black;">
                <td style="width: 16.666%; border: 1px solid black;" class="text-center">
                    <div>
                        <div>
                            <label class="font-weight-bold">SALES</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['sales_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['sales_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <span><?php echo date('d-m-Y', strtotime($row2['sales_date'])); ?></span>
                        </div>
                    </div>
                </td>
                <td style="width: 16.666%; border: 1px solid black;" class="text-center">
                    <div>
                        <div>
                            <label class="font-weight-bold">CUSTOMER SERVICE</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['cs_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['cs_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <span><?php echo date('d-m-Y', strtotime($row2['cs_date'])); ?></span>
                        </div>
                    </div>
                </td>
                <td style="width: 16.666%; border: 1px solid black;" class="text-center">
                    <div>
                        <div>
                            <label class="font-weight-bold">ENGINEERING</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['engineer_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['engineer_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <span><?php echo date('d-m-Y', strtotime($row2['engineer_date'])); ?></span>
                        </div>
                    </div>
                </td>
                <td style="width: 16.666%; border: 1px solid black;" class="text-center">
                    <div>
                        <div>
                            <label class="font-weight-bold">PLANNER</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['planner_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['planner_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <span><?php echo date('d-m-Y', strtotime($row2['planner_date'])); ?></span>
                        </div>
                    </div>
                </td>
                <td style="width: 16.666%; border: 1px solid black;" class="text-center">
                    <div>
                        <div>
                            <label class="font-weight-bold">PURCHASING</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['purchase_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['purchase_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <span><?php echo date('d-m-Y', strtotime($row2['purchase_date'])); ?></span>
                        </div>
                    </div>
                </td>
                <td style="width: 16.666%; border: 1px solid black;" class="text-center">
                    <div>
                        <div>
                            <label class="font-weight-bold">CAM</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['cam_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['cam_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <span><?php echo date('d-m-Y', strtotime($row2['cam_date'])); ?></span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 16.666%; border: 1px solid black;" class="text-center">
                    <div>
                        <div>
                            <label class="font-weight-bold">BENDING</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['bending_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['bending_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <span><?php echo date('d-m-Y', strtotime($row2['bending_date'])); ?></span>
                        </div>
                    </div>
                </td>
                <td style="width: 16.666%; border: 1px solid black;" class="text-center">
                    <div>
                        <div>
                            <label class="font-weight-bold">ASSEMBLY</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['assembly_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['assembly_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <span><?php echo date('d-m-Y', strtotime($row2['assembly_date'])); ?></span>
                        </div>
                    </div>
                </td>
                <td style="width: 16.666%; border: 1px solid black;" class="text-center">
                    <div>
                        <div>
                            <label class="font-weight-bold">CNC</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['cnc_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['cnc_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <span><?php echo date('d-m-Y', strtotime($row2['cnc_date'])); ?></span>
                        </div>
                    </div>
                </td>
                <td style="width: 16.666%; border: 1px solid black;" class="text-center">
                    <div>
                        <div>
                            <label class="font-weight-bold">WELDING</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['welding_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['welding_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <span><?php echo date('d-m-Y', strtotime($row2['welding_date'])); ?></span>
                        </div>
                    </div>
                </td>
                <td style="width: 16.666%; border: 1px solid black;" class="text-center">
                    <div>
                        <div>
                            <label class="font-weight-bold">FINISHING</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['finishing_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['finishing_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <span><?php echo date('d-m-Y', strtotime($row2['finishing_date'])); ?></span>
                        </div>
                    </div>
                </td>
                <td style="width: 16.666%; border: 1px solid black;" class="text-center">
                    <div>
                        <div>
                            <label class="font-weight-bold">QA</label>
                            <div class="sign-box">
                                <img src="../src/img/sign/<?php echo $row2['qa_sign']; ?>" class="img-fluid sign-box" style="display:<?php echo empty($row2['qa_sign']) ? 'none' : 'block'; ?>;">
                            </div>
                            <span><?php echo date('d-m-Y', strtotime($row2['qa_date'])); ?></span>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </footer>

</html>
