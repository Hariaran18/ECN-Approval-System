<?php
    include ("../config/dbconnection.php");
    include ("../config/navigationbar.php");

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

    <script>
        $(document).ready(function() {
            var addButton = $('#add_button');
            var wrapper = $('#input_wrapper');
            var fieldIndex = 4;

            $(addButton).click(function(e) {
                e.preventDefault();
                var fieldHTML =
                    '<hr>' +
                    '<br>' +
                    '<div class="row input-group">' +
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
                            <label for="ecr-no" class="form-label">Type</label>
                            <input type="text" id="type" name="type" class="form-control">
                            </div>
                            <div class="col">
                            <label for="ecn-no" class="form-label">ECN No:</label>
                            <input type="text" id="ecn_no" name="ecn_no" class="form-control">
                            </div>
                            <div class="col">
                            <label for="model" class="form-label">Model/Top Level:</label>
                            <input type="text" id="model" name="model" class="form-control">
                            </div>
                            <div class="col">
                            <label for="running-no" class="form-label">Running number:</label>
                            <input type="text" id="running_no" name="running_no" class="form-control">
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
                    <button type="button" id="add_button" class="btn btn-dark btn-lg">Add Row</button>
                    <input type="submit" class="btn btn-primary btn-lg" value="Submit" />
                </div>
            </div> 
        </body>
    </form>

    <br><br>
    <!-- <footer>
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
    </footer> -->
</html>
