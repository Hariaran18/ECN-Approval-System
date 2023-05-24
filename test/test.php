<!DOCTYPE html>
<html>
    <head>
        <title>E-ECN & IECN</title>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Listen to the button click event
                $('#clone-row').on('click', function() {
                    // Clone the first row in the container
                    var newRow = $('#container .row').first().clone();

                    // Update the IDs and names of the input fields in the cloned row
                    var rowNumber = $('#container .row').length + 1;
                    newRow.find('[id^=b_]').each(function() {
                        $(this).attr('id', 'b_' + this.id.split('_')[1] + '_' + rowNumber);
                        $(this).attr('name', 'b_' + this.name.split('_')[1] + '_' + rowNumber);
                    });
                    newRow.find('[id^=a_]').each(function() {
                        $(this).attr('id', 'a_' + this.id.split('_')[1] + '_' + rowNumber);
                        $(this).attr('name', 'a_' + this.name.split('_')[1] + '_' + rowNumber);
                    });

                    // Append the cloned row to the container
                    $('#container').append(newRow);
                });
            });
        </script>

        <style>
            @media print {
                header, footer {
                    position: fixed;
                    left: 0;
                    right: 0;
                }
                header {
                    top: 0;
                }
                footer {
                    bottom: 0;
                }
            }
        </style>

    </head>
    
    <header>
    <br><br>
        <h1>This is a Header</h1>
    </header>
    <body>
        <div class="container" id="container">
            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title d-flex justify-content-center">BEFORE</h5>
                        </div>
                        <div class="card-body">
                            Upload Picture:
                            <input type="file" id="b_pic_1" name="b_pic_1" class="form-control">
                            <br>
                            Details of Change:
                            <input type="text" id="b_details_1" name="b_details_1" class="form-control">
                            <div class="row">
                                <div class="col">
                                    PART NO:
                                    <input type="text" id="b_partno_1" name="b_partno_1" class="form-control">
                                </div>
                                <div class="col">
                                    REVISION:
                                    <input type="text" id="b_rev_1" name="b_rev_1" class="form-control">
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
                            <input type="file" id="a_pic_1" name="upload-box-1" class="form-control">
                            <br>
                            Details of Change:
                            <input type="text" id="a_details_1" name="a_details_1" class="form-control">
                            <div class="row">
                                <div class="col">
                                    PART NO:
                                    <input type="text" id="a_partno_1" name="a_partno_1" class="form-control">
                                </div>
                                <div class="col">
                                    REVISION:
                                    <input type="text" id="a_rev_1" name="a_rev_1" class="form-control">
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
                            <input type="file" id="b_pic_2" name="b_pic_2" class="form-control">
                            <br>
                            Details of Change:
                            <input type="text" id="b_details_2" name="b_details_2" class="form-control">
                            <div class="row">
                                <div class="col">
                                    PART NO:
                                    <input type="text" id="b_partno_2" name="b_partno_2" class="form-control">
                                </div>
                                <div class="col">
                                    REVISION:
                                    <input type="text" id="b_rev_2" name="b_rev_2" class="form-control">
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
                            <input type="file" id="a_pic_2" name="upload-box-2" class="form-control">
                            <br>
                            Details of Change:
                            <input type="text" id="a_details_2" name="a_details_2" class="form-control">
                            <div class="row">
                                <div class="col">
                                    PART NO:
                                    <input type="text" id="a_partno_2" name="a_partno_2" class="form-control">
                                </div>
                                <div class="col">
                                    REVISION:
                                    <input type="text" id="a_rev_2" name="a_rev_2" class="form-control">
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
                            <input type="file" id="b_pic_3" name="b_pic_3" class="form-control">
                            <br>
                            Details of Change:
                            <input type="text" id="b_details_3" name="b_details_3" class="form-control">
                            <div class="row">
                                <div class="col">
                                    PART NO:
                                    <input type="text" id="b_partno_3" name="b_partno_3" class="form-control">
                                </div>
                                <div class="col">
                                    REVISION:
                                    <input type="text" id="b_rev_3" name="b_rev_3" class="form-control">
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
                            <input type="file" id="a_pic_3" name="upload-box-3" class="form-control">
                            <br>
                            Details of Change:
                            <input type="text" id="a_details_3" name="a_details_3" class="form-control">
                            <div class="row">
                                <div class="col">
                                    PART NO:
                                    <input type="text" id="a_partno_3" name="a_partno_3" class="form-control">
                                </div>
                                <div class="col">
                                    REVISION:
                                    <input type="text" id="a_rev_3" name="a_rev_3" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button id="clone-row" type="button">Add row</button>
    </body>
    <footer>
        <h1>This is a Footer</h1>
    </footer>
</html>
