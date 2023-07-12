<?php
    include ("../config/dbconnection.php");
    include ("../config/navigationbar.php");

	if($_SESSION["username"]) {
	    // if(($_SESSION['access'] == "admin") || ($_SESSION['access'] == "superuser")) {

        $dept = $_SESSION["department"];

        $cus = mysqli_query($conn,"SELECT `name` FROM `customer` ORDER BY `name` ASC" );

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

    <script>
        $(document).ready(function() {
            var addButton = $('#add_button');
            var removeButton = $('#remove_button');
            var wrapper = $('#input_wrapper');
            var fieldIndex = 4;

            $(addButton).click(function(e) {
                e.preventDefault();
                var fieldHTML =
                    '<div class="row input-group">' +
                        '<hr>' +
                        '<br>' +
                        '<div class="col-md">' +
                            '<div class="card">' +
                                '<div class="card-header">' +
                                    '<h5 class="card-title d-flex justify-content-center">BEFORE</h5>' +
                                '</div>' +
                                '<div class="card-body">' +
                                    'Upload Picture:' +
                                    '<input type="file" id="b_pic_' + fieldIndex + '" name="b_pic[]" class="form-control">' +
                                    '<br>' +
                                    'Details of Change:' +
                                    '<input type="text" id="b_details_' + fieldIndex + '" name="b_details[]" class="form-control">' +
                                    '<div class="row">' +
                                        '<div class="col">' +
                                            'PART NO:' +
                                            '<input type="text" id="b_partno_' + fieldIndex + '" name="b_partno[]" class="form-control">' +
                                        '</div>' +
                                        '<div class="col">' +
                                            'REVISION:' +
                                            '<input type="text" id="b_rev_' + fieldIndex + '" name="b_rev[]" class="form-control">' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                            '<div class="card">' +
                                '<div class="card-header">' +
                                    '<h5 class="card-title d-flex justify-content-center">AFTER</h5>' +
                                '</div>' +
                                '<div class="card-body">' +
                                    'Upload Picture:' +
                                    '<input type="file" id="a_pic_' + fieldIndex + '" name="a_pic[]" class="form-control">' +
                                    '<br>' +
                                    'Details of Change:' +
                                    '<input type="text" id="a_details_' + fieldIndex + '" name="a_details[]" class="form-control">' +
                                    '<div class="row">' +
                                        '<div class="col">' +
                                            'PART NO:' +
                                            '<input type="text" id="a_partno_' + fieldIndex + '" name="a_partno[]" class="form-control">' +
                                        '</div>' +
                                        '<div class="col">' +
                                            'REVISION:' +
                                            '<input type="text" id="a_rev_' + fieldIndex + '" name="a_rev[]" class="form-control">' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<div class="col-md">' +
                            '<div class="card">' +
                                '<div class="card-header">' +
                                    '<h5 class="card-title d-flex justify-content-center">BEFORE</h5>' +
                                '</div>' +
                                '<div class="card-body">' +
                                    'Upload Picture:' +
                                    '<input type="file" id="b_pic_' + (fieldIndex+1) + '" name="b_pic[]" class="form-control">' +
                                    '<br>' +
                                    'Details of Change:' +
                                    '<input type="text" id="b_details_' + (fieldIndex+1) + '" name="b_details[]" class="form-control">' +
                                    '<div class="row">' +
                                        '<div class="col">' +
                                            'PART NO:' +
                                            '<input type="text" id="b_partno_' + (fieldIndex+1) + '" name="b_partno[]" class="form-control">' +
                                        '</div>' +
                                        '<div class="col">' +
                                            'REVISION:' +
                                            '<input type="text" id="b_rev_' + (fieldIndex+1) + '" name="b_rev[]" class="form-control">' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                            '<div class="card">' +
                                '<div class="card-header">' +
                                    '<h5 class="card-title d-flex justify-content-center">AFTER</h5>' +
                                '</div>' +
                                '<div class="card-body">' +
                                    'Upload Picture:' +
                                    '<input type="file" id="a_pic_' + (fieldIndex+1) + '" name="a_pic[]" class="form-control">' +
                                    '<br>' +
                                    'Details of Change:' +
                                    '<input type="text" id="a_details_' + (fieldIndex+1) + '" name="a_details[]" class="form-control">' +
                                    '<div class="row">' +
                                        '<div class="col">' +
                                            'PART NO:' +
                                            '<input type="text" id="a_partno_' + (fieldIndex+1) + '" name="a_partno[]" class="form-control">' +
                                        '</div>' +
                                        '<div class="col">' +
                                            'REVISION:' +
                                            '<input type="text" id="a_rev_' + (fieldIndex+1) + '" name="a_rev[]" class="form-control">' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<div class="col-md">' +
                            '<div class="card">' +
                                '<div class="card-header">' +
                                    '<h5 class="card-title d-flex justify-content-center">BEFORE</h5>' +
                                '</div>' +
                                '<div class="card-body">' +
                                    'Upload Picture:' +
                                    '<input type="file" id="b_pic_' + (fieldIndex+2) + '" name="b_pic[]" class="form-control">' +
                                    '<br>' +
                                    'Details of Change:' +
                                    '<input type="text" id="b_details_' + (fieldIndex+2) + '" name="b_details[]" class="form-control">' +
                                    '<div class="row">' +
                                        '<div class="col">' +
                                            'PART NO:' +
                                            '<input type="text" id="b_partno_' + (fieldIndex+2) + '" name="b_partno[]" class="form-control">' +
                                        '</div>' +
                                        '<div class="col">' +
                                            'REVISION:' +
                                            '<input type="text" id="b_rev_' + (fieldIndex+2) + '" name="b_rev[]" class="form-control">' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                            '<div class="card">' +
                                '<div class="card-header">' +
                                    '<h5 class="card-title d-flex justify-content-center">AFTER</h5>' +
                                '</div>' +
                                '<div class="card-body">' +
                                    'Upload Picture:' +
                                    '<input type="file" id="a_pic_' + (fieldIndex+2) + '" name="a_pic[]" class="form-control">' +
                                    '<br>' +
                                    'Details of Change:' +
                                    '<input type="text" id="a_details_' + (fieldIndex+2) + '" name="a_details[]" class="form-control">' +
                                    '<div class="row">' +
                                        '<div class="col">' +
                                            'PART NO:' +
                                            '<input type="text" id="a_partno_' + (fieldIndex+2) + '" name="a_partno[]" class="form-control">' +
                                        '</div>' +
                                        '<div class="col">' +
                                            'REVISION:' +
                                            '<input type="text" id="a_rev_' + (fieldIndex+2) + '" name="a_rev[]" class="form-control">' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                    '<br>';
                    fieldIndex = fieldIndex+3;
                $(wrapper).append(fieldHTML);
            });

            $(removeButton).click(function(e) {
                e.preventDefault();
                var rows = $(wrapper).children('.row');
                if (rows.length > 1) {
                    rows.last().remove(); // Remove the last added row
                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            // Attach the Datepicker to the input field
            $('#implement_date').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: 'linked',
                autoclose: true
            });
        });
    </script>

    </head>
    <form action="../controller/create_form_controller.php" method="post" enctype="multipart/form-data">
        <header>
        <br><br>
            <div class="container">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title">ECN LAUNCHING</h2>
                        <div class="row">
                            <div class="col">
                                <label class="font-weight-bold">Created on</label>
                                <input type="text" id="created_on" name="created_on" class="form-control" value="<?php echo date('d/m/Y'); ?>" readonly>
                            </div>
                            <div class="col">
                                <label class="font-weight-bold">Created by</label>
                                <input type="text" id="created_by" name="created_by" class="form-control" value="<?php echo $_SESSION['name']; ?>" readonly>
                            </div>
                            <div class="col">
                                <label class="font-weight-bold">Type <span style="color:red">*</span></label>
                                <select class="form-select" name="type" id="type" required>
                                    <option value="ECN">ECN</option>
                                    <option value="IECN">IECN</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="font-weight-bold">ECN No <span style="color:red">*</span></label>
                                <input type="text" id="ecn_no" name="ecn_no" class="form-control" required>
                            </div>
                            <div class="col">
                                <label class="font-weight-bold">Model/Top Level <span style="color:red">*</span></label>
                                <input type="text" id="model" name="model" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <br>
                                <label class="font-weight-bold">ECR No <span style="color:red">*</span></label>
                                <input type="text" id="ecr_no" name="ecr_no" class="form-control" required>
                            </div>
                            <div class="col">
                                <br>
                                <label class="font-weight-bold">ETD</label>
                                <input type="text" id="etd_no" name="etd_no" class="form-control">
                            </div>
                            <div class="col">
                                <br>
                                <label class="font-weight-bold">Job No</label>
                                <input type="text" id="job_no" name="job_no" class="form-control">
                            </div>
                            <div class="col">
                                <br>
                                <label class="font-weight-bold">Implement Date</label>
                                <input type="date" id="implement_date" name="implement_date" class="form-control">
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
                                    <label class="font-weight-bold">Customer <span style="color:red">*</span></label>
                                    <select class="form-select" name="customer" id="customer" required>
                                        <option></option>
                                            <?php while($row = mysqli_fetch_array($cus)):; ?>
                                        <option value="<?php echo $row['0'];?>"><?php echo $row['0'];?></option>
                                            <?php endwhile;?>
                                    </select>
                                </div>
                                <div>
                                    <label class="font-weight-bold">FA Report</label>
                                    <input type="file" class="form-control" name="fa_report" id="fa_report" disabled>
                                </div>
                            </div>
                            <div class="col checkbox" style="float:left;">
                                <br>
                                <label class="font-weight-bold">PIC</label>
                                <br>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="10" id="npi1_chk" name="npi1_chk" <?php if ($dept == "NPI1"){echo "checked";} ?>>
                                    <label>NPI 1</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="10" id="npi2_chk" name="npi2_chk" <?php if ($dept == "NPI2"){echo "checked";} ?>>
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
                                    <input type="checkbox" class="pic_opt" value="1" id="purchasing_chk" name="purchasing_chk">
                                    <label>Purchasing</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="1" id="cam_chk" name="cam_chk">
                                    <label>CAM</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="1" id="bending_chk" name="bending_chk">
                                    <label>Bending</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="1" id="assembly_chk" name="assembly_chk">
                                    <label>Assembly</label>
                                </div>
                            </div>
                            <div class="col checkbox" style="float:left; margin-left:20px;">
                                <br>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="1" id="cnc_chk" name="cnc_chk">
                                    <label>CNC</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="1" id="welding_chk" name="welding_chk">
                                    <label>Welding</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="pic_opt" value="1" id="finishing_chk" name="finishing_chk">
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
                <div class="row" id="input_wrapper">
                    <div class="row input-group">
                        <div class="col-md">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title d-flex justify-content-center">BEFORE</h5>
                                </div>
                                <div class="card-body">
                                    Upload Picture:
                                    <input type="file" id="b_pic_1" name="b_pic[]" class="form-control">
                                    <br>
                                    Details of Change:
                                    <input type="text" id="b_details_1" name="b_details[]" class="form-control">
                                    <div class="row">
                                        <div class="col">
                                            PART NO:
                                            <input type="text" id="b_partno_1" name="b_partno[]" class="form-control">
                                        </div>
                                        <div class="col">
                                            REVISION:
                                            <input type="text" id="b_rev_1" name="b_rev[]" class="form-control">
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
                                    <input type="file" id="a_pic_1" name="a_pic[]" class="form-control">
                                    <br>
                                    Details of Change:
                                    <input type="text" id="a_details_1" name="a_details[]" class="form-control">
                                    <div class="row">
                                        <div class="col">
                                            PART NO:
                                            <input type="text" id="a_partno_1" name="a_partno[]" class="form-control">
                                        </div>
                                        <div class="col">
                                            REVISION:
                                            <input type="text" id="a_rev_1" name="a_rev[]" class="form-control">
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
                                    <input type="file" id="b_pic_2" name="b_pic[]" class="form-control">
                                    <br>
                                    Details of Change:
                                    <input type="text" id="b_details_2" name="b_details[]" class="form-control">
                                    <div class="row">
                                        <div class="col">
                                            PART NO:
                                            <input type="text" id="b_partno_2" name="b_partno[]" class="form-control">
                                        </div>
                                        <div class="col">
                                            REVISION:
                                            <input type="text" id="b_rev_2" name="b_rev[]" class="form-control">
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
                                    <input type="file" id="a_pic_2" name="a_pic[]" class="form-control">
                                    <br>
                                    Details of Change:
                                    <input type="text" id="a_details_2" name="a_details[]" class="form-control">
                                    <div class="row">
                                        <div class="col">
                                            PART NO:
                                            <input type="text" id="a_partno_2" name="a_partno[]" class="form-control">
                                        </div>
                                        <div class="col">
                                            REVISION:
                                            <input type="text" id="a_rev_2" name="a_rev[]" class="form-control">
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
                                    <input type="file" id="b_pic_3" name="b_pic[]" class="form-control">
                                    <br>
                                    Details of Change:
                                    <input type="text" id="b_details_3" name="b_details[]" class="form-control">
                                    <div class="row">
                                        <div class="col">
                                            PART NO:
                                            <input type="text" id="b_partno_3" name="b_partno[]" class="form-control">
                                        </div>
                                        <div class="col">
                                            REVISION:
                                            <input type="text" id="b_rev_3" name="b_rev[]" class="form-control">
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
                                    <input type="file" id="a_pic_3" name="a_pic[]" class="form-control">
                                    <br>
                                    Details of Change:
                                    <input type="text" id="a_details_3" name="a_details[]" class="form-control">
                                    <div class="row">
                                        <div class="col">
                                            PART NO:
                                            <input type="text" id="a_partno_3" name="a_partno[]" class="form-control">
                                        </div>
                                        <div class="col">
                                            REVISION:
                                            <input type="text" id="a_rev_3" name="a_rev[]" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <!-- <br> -->
                <div class="d-flex justify-content-between">
                    <div>
                        <button type="button" id="add_button" class="btn btn-dark btn-md">Add Row</button>
                        <button type="button" id="remove_button" class="btn btn-danger btn-md">Remove Row</button>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary btn-md" value="Submit" />
                    </div>
                </div>
            </div> 
        </body>
    </form>
    <br>
</html>

<?php
    }
?>
