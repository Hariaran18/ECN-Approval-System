<?php
    include ("../config/dbconnection.php");
    include ("../config/navigationbar.php");

    // Check if the session has expired
    if (isset($_SESSION['LAST_ACTIVITY']) && time() - $_SESSION['LAST_ACTIVITY'] > 1800) {
        // Session expired, perform logout
        unset($_SESSION["username"]);
        unset($_SESSION["name"]);
        unset($_SESSION["email"]);
        unset($_SESSION["emp_id"]);
        unset($_SESSION["department"]);
        unset($_SESSION["sign"]);
        unset($_SESSION["access"]);
        echo '<script> location.replace("login.php"); </script>';
    }

    // Update the last activity timestamp
    $_SESSION['LAST_ACTIVITY'] = time();

    $fid = $_GET['form_id'];

    // Query to fetch group details and related form records
    $sql = "SELECT f.form_id, f.ecn_no, f.type, f.model
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

            @media print {
                @page {
                    /* size: landscape;
                    margin: 0; */
                }
                html, body {
                    /* width: 125%;
                    height: 100%; */
                    /* overflow: hidden; */
                }
                body {
                    /* transform: scale(0.5);
                    transform-origin: 0 0;
                    page-break-after: avoid; */
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
                            <label for="ecr-no" class="form-label">Type</label>
                            <input type="text" id="type" name="type" class="form-control" value="<?php echo $row2['type'];?>" readonly>
                            </div>
                            <div class="col">
                            <label for="ecn-no" class="form-label">ECN No:</label>
                            <input type="text" id="ecn_no" name="ecn_no" class="form-control" value="<?php echo $row2['ecn_no'];?>" readonly>
                            </div>
                            <div class="col">
                            <label for="model" class="form-label">Model/Top Level:</label>
                            <input type="text" id="model" name="model" class="form-control" value="<?php echo $row2['model'];?>" readonly>
                            </div>
                            <div class="col">
                            <label for="running-no" class="form-label">Running number:</label>
                            <input type="text" id="running_no" name="running_no" class="form-control" value="<?php echo $row2['form_id'];?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <body>
            <br>           
            <div class="container" id="container">
                <div class="row" id="input_wrapper">

                <?phpfor ($i = 0; $i < $numRows; $i += 3) {
                        // Start of the row
                        echo '<div class="row input-group">';
                ?>
                        <div class="row input-group">
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title d-flex justify-content-center">BEFORE</h5>
                                    </div>
                                    <div class="card-body">
                                        Upload Picture:
                                        <input type="text" id="b_pic_1" name="b_pic[]" class="form-control" value="<?php echo $row['b_pic']; ?>">
                                        <br>
                                        Details of Change:
                                        <input type="text" id="b_details_1" name="b_details[]" class="form-control" value="<?php echo $row['b_details']; ?>">
                                        <div class="row">
                                            <div class="col">
                                                PART NO:
                                                <input type="text" id="b_partno_1" name="b_partno[]" class="form-control" value="<?php echo $row['b_partno']; ?>">
                                            </div>
                                            <div class="col">
                                                REVISION:
                                                <input type="text" id="b_rev_1" name="b_rev[]" class="form-control" value="<?php echo $row['b_rev']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title d-flex justify-content-center">AFTER</h5>
                                    </div>
                                    <div class="card-body">
                                        Upload Picture:
                                        <input type="text" id="a_pic_1" name="a_pic[]" class="form-control" value="<?php echo $row['a_pic']; ?>">
                                        <br>
                                        Details of Change:
                                        <input type="text" id="a_details_1" name="a_details[]" class="form-control" value="<?php echo $row['a_details']; ?>">
                                        <div class="row">
                                            <div class="col">
                                                PART NO:
                                                <input type="text" id="a_partno_1" name="a_partno[]" class="form-control" value="<?php echo $row['a_partno']; ?>">
                                            </div>
                                            <div class="col">
                                                REVISION:
                                                <input type="text" id="a_rev_1" name="a_rev[]" class="form-control" value="<?php echo $row['a_rev']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title d-flex justify-content-center">BEFORE</h5>
                                    </div>
                                    <div class="card-body">
                                        Upload Picture:
                                        <input type="text" id="b_pic_2" name="b_pic[]" class="form-control" value="<?php echo $row['b_pic']; ?>">
                                        <br>
                                        Details of Change:
                                        <input type="text" id="b_details_2" name="b_details[]" class="form-control" value="<?php echo $row['b_details']; ?>">
                                        <div class="row">
                                            <div class="col">
                                                PART NO:
                                                <input type="text" id="b_partno_2" name="b_partno[]" class="form-control" value="<?php echo $row['b_partno']; ?>">
                                            </div>
                                            <div class="col">
                                                REVISION:
                                                <input type="text" id="b_rev_2" name="b_rev[]" class="form-control" value="<?php echo $row['b_rev']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title d-flex justify-content-center">AFTER</h5>
                                    </div>
                                    <div class="card-body">
                                        Upload Picture:
                                        <input type="text" id="a_pic_2" name="a_pic[]" class="form-control" value="<?php echo $row['a_pic']; ?>">
                                        <br>
                                        Details of Change:
                                        <input type="text" id="a_details_2" name="a_details[]" class="form-control" value="<?php echo $row['a_details']; ?>">
                                        <div class="row">
                                            <div class="col">
                                                PART NO:
                                                <input type="text" id="a_partno_2" name="a_partno[]" class="form-control" value="<?php echo $row['a_partno']; ?>">
                                            </div>
                                            <div class="col">
                                                REVISION:
                                                <input type="text" id="a_rev_2" name="a_rev[]" class="form-control" value="<?php echo $row['a_rev']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title d-flex justify-content-center">BEFORE</h5>
                                    </div>
                                    <div class="card-body">
                                        Upload Picture:
                                        <input type="text" id="b_pic_3" name="b_pic[]" class="form-control" value="<?php echo $row['b_pic']; ?>">
                                        <br>
                                        Details of Change:
                                        <input type="text" id="b_details_3" name="b_details[]" class="form-control" value="<?php echo $row['b_details']; ?>">
                                        <div class="row">
                                            <div class="col">
                                                PART NO:
                                                <input type="text" id="b_partno_3" name="b_partno[]" class="form-control" value="<?php echo $row['b_partno']; ?>">
                                            </div>
                                            <div class="col">
                                                REVISION:
                                                <input type="text" id="b_rev_3" name="b_rev[]" class="form-control" value="<?php echo $row['b_rev']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title d-flex justify-content-center">AFTER</h5>
                                    </div>
                                    <div class="card-body">
                                        Upload Picture:
                                        <input type="text" id="a_pic_3" name="a_pic[]" class="form-control" value="<?php echo $row['a_pic']; ?>">
                                        <br>
                                        Details of Change:
                                        <input type="text" id="a_details_3" name="a_details[]" class="form-control" value="<?php echo $row['a_details']; ?>">
                                        <div class="row">
                                            <div class="col">
                                                PART NO:
                                                <input type="text" id="a_partno_3" name="a_partno[]" class="form-control" value="<?php echo $row['a_partno']; ?>">
                                            </div>
                                            <div class="col">
                                                REVISION:
                                                <input type="text" id="a_rev_3" name="a_rev[]" class="form-control" value="<?php echo $row['a_rev']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    <br>
                </div>
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
                            <img src="../src/img/sign/img1.jpg" alt="Description of the image" class="img-fluid">
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">CUSTOMER SERVICE</label>
                            <img src="../src/img/sign/img2.jpg" alt="Description of the image" class="img-fluid">
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">ENGINEERING DEPT</label>
                            <img src="../src/img/sign/img3.jpg" alt="Description of the image" class="img-fluid">
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">PLANNING DEPT</label>
                            <img src="../src/img/sign/img4.jpg" alt="Description of the image" class="img-fluid">
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">PURCHASE DEPT</label>
                            <img src="../src/img/sign/img1.jpg" alt="Description of the image" class="img-fluid">
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">CAM DEPT</label>
                            <img src="../src/img/sign/img2.jpg" alt="Description of the image" class="img-fluid">
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
                            <input type="text" class="form-control" id="issued_name" name="issued_name" readonly></input>
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">ASSEMBLY DEPT</label>
                            <input type="text" class="form-control" id="issued_name" name="issued_name" readonly></input>
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">CNC DEPT</label>
                            <input type="text" class="form-control" id="issued_name" name="issued_name" readonly></input>
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">WELDING DEPT</label>
                            <input type="text" class="form-control" id="issued_name" name="issued_name" readonly></input>
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">FINISHING DEPT</label>
                            <input type="text" class="form-control" id="issued_name" name="issued_name" readonly></input>
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <label class="font-weight-bold">QA DEPT</label>
                            <input type="text" class="form-control" id="issued_name" name="issued_name" readonly></input>
                            <input type="date" class="form-control" id="issued_date" name="issued_date" readonly></input>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </footer>
</html>
