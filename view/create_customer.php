<?php
    include ("../config/dbconnection.php");
    include ("../config/navigationbar.php");

    if($_SESSION["username"]) {
	    if($_SESSION['access'] == "Admin") {

        $query = "SELECT name, email FROM user";
        $result = mysqli_query($conn, $query);
        $query2 = "SELECT name, email FROM user";
        $result2 = mysqli_query($conn, $query2);
        $query3 = "SELECT name, email FROM user";
        $result3 = mysqli_query($conn, $query3);
        $query4 = "SELECT name, email FROM user";
        $result4 = mysqli_query($conn, $query4);
        $query5 = "SELECT name, email FROM user";
        $result5 = mysqli_query($conn, $query5);
        $query6 = "SELECT name, email FROM user";
        $result6 = mysqli_query($conn, $query6);
        $query7 = "SELECT name, email FROM user";
        $result7 = mysqli_query($conn, $query7);
        $query8 = "SELECT name, email FROM user";
        $result8 = mysqli_query($conn, $query8);
        $query9 = "SELECT name, email FROM user";
        $result9 = mysqli_query($conn, $query9);
        $query10 = "SELECT name, email FROM user";
        $result10 = mysqli_query($conn, $query10);
        $query11 = "SELECT name, email FROM user";
        $result11 = mysqli_query($conn, $query11);
        $query12 = "SELECT name, email FROM user";
        $result12 = mysqli_query($conn, $query12);
        $query13 = "SELECT name, email FROM user";
        $result13 = mysqli_query($conn, $query13);

?>


<!DOCTYPE html>
    <html>
        <head>
            <title>E-ECN & IECN</title>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <!-- <link rel="stylesheet" type="text/css" href="list_view_style.css"/> -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


        </head>
        <body>
            <div class="container">
                <br>
                <h1 class="text-center">CREATE CUSTOMER</h1>
                <br>
                <form class="form-group" action="../controller/create_customer_controller.php" method="post" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <td><label for="username">Customer Name <span style="color:red">*</span></label></td>
                            <td><input type="text" class="form-control" id="name" name="name" required></td>
                        </tr>
                        <tr>
                            <td><label for="username">NPI 1</label></td>
                            <td>
                                <?php
                                    if (mysqli_num_rows($result12) > 0) {
                                        // Create the select box HTML
                                        echo '<select class="form-control" name="npi1_list" id="npi1_list">';

                                        // Iterate over the rows and create the options
                                        while ($row = mysqli_fetch_assoc($result12)) {
                                            $name = $row['name'];
                                            $email = $row['email'];
                                            echo '<option value="' . $email . '">' . $name . '</option>';
                                        }

                                        echo '</select>';
                                    } else {
                                        echo 'No customers found.';
                                    }
                                ?>
                            </td>

                            <td>
                                <textarea type="text" class="form-control" id="npi1" name="npi1" style="height: 120px;" readonly></textarea>
                                <input type="button" class="btn btn-sm btn-danger" id="npi1_delete" value="Delete Last Email"></input>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="username">NPI 2</label></td>
                            <td>
                                <?php if (mysqli_num_rows($result13) > 0) {
                                        // Create the select box HTML
                                        echo '<select class="form-control" name="npi2_list" id="npi2_list">';
                                        
                                        // Iterate over the rows and create the options
                                        while ($row = mysqli_fetch_assoc($result13)) {
                                            $name = $row['name'];
                                            $email = $row['email'];
                                            echo '<option value="' . $email . '">' . $name . '</option>';
                                        }

                                        echo '</select>';
                                    } else {
                                        echo 'No customers found.';
                                    }
                                ?>
                            </td>
                            <td>
                                <textarea type="text" class="form-control" id="npi2" name="npi2" style="height: 120px;" readonly></textarea>
                                <input type="button" class="btn btn-sm btn-danger" id="npi2_delete" value="Delete Last Email"></input>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="username">Planner Email</label></td>
                            <td>
                                <?php if (mysqli_num_rows($result) > 0) {
                                        // Create the select box HTML
                                        echo '<select class="form-control" name="planner_list" id="planner_list">';
                                        
                                        // Iterate over the rows and create the options
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $name = $row['name'];
                                            $email = $row['email'];
                                            echo '<option value="' . $email . '">' . $name . '</option>';
                                        }
                                        
                                        echo '</select>';
                                    } else {
                                        echo 'No customers found.';
                                    }
                                ?>
                            </td>
                            <td>
                                <textarea type="text" class="form-control" id="planner" name="planner" style="height: 120px;" readonly></textarea>
                                <input type="button" class="btn btn-sm btn-danger" id="planner_delete" value="Delete Last Email"></input>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="username">Sales Email</label></td>
                            <td>
                                <?php if (mysqli_num_rows($result2) > 0) {
                                        // Create the select box HTML
                                        echo '<select class="form-control" name="sales_list" id="sales_list">';
                                        
                                        // Iterate over the rows and create the options
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                            $name = $row2['name'];
                                            $email = $row2['email'];
                                            echo '<option value="' . $email . '">' . $name . '</option>';
                                        }
                                        
                                        echo '</select>';
                                    } else {
                                        echo 'No customers found.';
                                    }
                                ?>
                            </td>
                            <td>
                                <textarea type="text" class="form-control" id="sales" name="sales" style="height: 120px;" readonly></textarea>
                                <input type="button" class="btn btn-sm btn-danger" id="sales_delete" value="Delete Last Email"></input>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="username">Customer Service Email</label></td>
                            <td>
                                <?php if (mysqli_num_rows($result3) > 0) {
                                        // Create the select box HTML
                                        echo '<select class="form-control" name="cs_list" id="cs_list">';
                                        
                                        // Iterate over the rows and create the options
                                        while ($row3 = mysqli_fetch_assoc($result3)) {
                                            $name = $row3['name'];
                                            $email = $row3['email'];
                                            echo '<option value="' . $email . '">' . $name . '</option>';
                                        }
                                        
                                        echo '</select>';
                                    } else {
                                        echo 'No customers found.';
                                    }
                                ?>
                            </td>
                            <td>
                                <textarea type="text" class="form-control" id="cs" name="cs" style="height: 120px;" readonly></textarea>
                                <input type="button" class="btn btn-sm btn-danger" id="cs_delete" value="Delete Last Email"></input>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="username">Purchasing Email</label></td>
                            <td>
                                <?php if (mysqli_num_rows($result4) > 0) {
                                        // Create the select box HTML
                                        echo '<select class="form-control" name="purchasing_list" id="purchasing_list">';
                                        
                                        // Iterate over the rows and create the options
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $name = $row4['name'];
                                            $email = $row4['email'];
                                            echo '<option value="' . $email . '">' . $name . '</option>';
                                        }
                                        
                                        echo '</select>';
                                    } else {
                                        echo 'No customers found.';
                                    }
                                ?>
                            </td>
                            <td>
                                <textarea type="text" class="form-control" id="purchasing" name="purchasing" style="height: 120px;" readonly></textarea>
                                <input type="button" class="btn btn-sm btn-danger" id="purchasing_delete" value="Delete Last Email"></input>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="username">CAM Email</label></td>
                            <td>
                                <?php if (mysqli_num_rows($result5) > 0) {
                                        // Create the select box HTML
                                        echo '<select class="form-control" name="cam_list" id="cam_list">';
                                        
                                        // Iterate over the rows and create the options
                                        while ($row5 = mysqli_fetch_assoc($result5)) {
                                            $name = $row5['name'];
                                            $email = $row5['email'];
                                            echo '<option value="' . $email . '">' . $name . '</option>';
                                        }
                                        
                                        echo '</select>';
                                    } else {
                                        echo 'No customers found.';
                                    }
                                ?>
                            </td>
                            <td>
                                <textarea type="text" class="form-control" id="cam" name="cam" style="height: 120px;" readonly></textarea>
                                <input type="button" class="btn btn-sm btn-danger" id="cam_delete" value="Delete Last Email"></input>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="username">Bending Email</label></td>
                            <td>
                                <?php if (mysqli_num_rows($result6) > 0) {
                                        // Create the select box HTML
                                        echo '<select class="form-control" name="bending_list" id="bending_list">';
                                        
                                        // Iterate over the rows and create the options
                                        while ($row6 = mysqli_fetch_assoc($result6)) {
                                            $name = $row6['name'];
                                            $email = $row6['email'];
                                            echo '<option value="' . $email . '">' . $name . '</option>';
                                        }
                                        
                                        echo '</select>';
                                    } else {
                                        echo 'No customers found.';
                                    }
                                ?>
                            </td>
                            <td>
                                <textarea type="text" class="form-control" id="bending" name="bending" style="height: 120px;" readonly></textarea>
                                <input type="button" class="btn btn-sm btn-danger" id="bending_delete" value="Delete Last Email"></input>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="username">Assembly Email</label></td>
                            <td>
                                <?php if (mysqli_num_rows($result7) > 0) {
                                        // Create the select box HTML
                                        echo '<select class="form-control" name="assembly_list" id="assembly_list">';
                                        
                                        // Iterate over the rows and create the options
                                        while ($row7 = mysqli_fetch_assoc($result7)) {
                                            $name = $row7['name'];
                                            $email = $row7['email'];
                                            echo '<option value="' . $email . '">' . $name . '</option>';
                                        }
                                        
                                        echo '</select>';
                                    } else {
                                        echo 'No customers found.';
                                    }
                                ?>
                            </td>
                            <td>
                                <textarea type="text" class="form-control" id="assembly" name="assembly" style="height: 120px;" readonly></textarea>
                                <input type="button" class="btn btn-sm btn-danger" id="assembly_delete" value="Delete Last Email"></input>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="username">CNC Email</label></td>
                            <td>
                                <?php if (mysqli_num_rows($result8) > 0) {
                                        // Create the select box HTML
                                        echo '<select class="form-control" name="cnc_list" id="cnc_list">';
                                        
                                        // Iterate over the rows and create the options
                                        while ($row8 = mysqli_fetch_assoc($result8)) {
                                            $name = $row8['name'];
                                            $email = $row8['email'];
                                            echo '<option value="' . $email . '">' . $name . '</option>';
                                        }
                                        
                                        echo '</select>';
                                    } else {
                                        echo 'No customers found.';
                                    }
                                ?>
                            </td>
                            <td>
                                <textarea type="text" class="form-control" id="cnc" name="cnc" style="height: 120px;" readonly></textarea>
                                <input type="button" class="btn btn-sm btn-danger" id="cnc_delete" value="Delete Last Email"></input>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="username">Welding Email</label></td>
                            <td>
                                <?php if (mysqli_num_rows($result9) > 0) {
                                        // Create the select box HTML
                                        echo '<select class="form-control" name="welding_list" id="welding_list">';
                                        
                                        // Iterate over the rows and create the options
                                        while ($row9 = mysqli_fetch_assoc($result9)) {
                                            $name = $row9['name'];
                                            $email = $row9['email'];
                                            echo '<option value="' . $email . '">' . $name . '</option>';
                                        }
                                        
                                        echo '</select>';
                                    } else {
                                        echo 'No customers found.';
                                    }
                                ?>
                            </td>
                            <td>
                                <textarea type="text" class="form-control" id="welding" name="welding" style="height: 120px;" readonly></textarea>
                                <input type="button" class="btn btn-sm btn-danger" id="welding_delete" value="Delete Last Email"></input>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="username">Finishing Email</label></td>
                            <td>
                                <?php if (mysqli_num_rows($result10) > 0) {
                                        // Create the select box HTML
                                        echo '<select class="form-control" name="finishing_list" id="finishing_list">';
                                        
                                        // Iterate over the rows and create the options
                                        while ($row10 = mysqli_fetch_assoc($result10)) {
                                            $name = $row10['name'];
                                            $email = $row10['email'];
                                            echo '<option value="' . $email . '">' . $name . '</option>';
                                        }
                                        
                                        echo '</select>';
                                    } else {
                                        echo 'No customers found.';
                                    }
                                ?>
                            </td>
                            <td>
                                <textarea type="text" class="form-control" id="finishing" name="finishing" style="height: 120px;" readonly></textarea>
                                <input type="button" class="btn btn-sm btn-danger" id="finishing_delete" value="Delete Last Email"></input>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="username">QA Email</label></td>
                            <td>
                                <?php if (mysqli_num_rows($result11) > 0) {
                                        // Create the select box HTML
                                        echo '<select class="form-control" name="qa_list" id="qa_list">';
                                        
                                        // Iterate over the rows and create the options
                                        while ($row11 = mysqli_fetch_assoc($result11)) {
                                            $name = $row11['name'];
                                            $email = $row11['email'];
                                            echo '<option value="' . $email . '">' . $name . '</option>';
                                        }
                                        
                                        echo '</select>';
                                    } else {
                                        echo 'No customers found.';
                                    }
                                ?>
                            </td>
                            <td>
                                <textarea type="text" class="form-control" id="qa" name="qa" style="height: 120px;" readonly></textarea>
                                <input type="button" class="btn btn-sm btn-danger" id="qa_delete" value="Delete Last Email"></input>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <div class="text-right">
                        <button type="submit" name="submit" class="btn btn-primary">CREATE</button>
                    </div>
                </form>
            </div>
        </body>
    </html>

    <script>
        $(document).ready(function() {
            // When an option is selected
            $('#planner_list').change(function() {
                // Get the selected option value (email)
                var selectedEmail = $(this).val();
                
                // Check if the textarea is empty
                if ($('#planner').val() === '') {
                    // If it's empty, set the selected email as the textarea value
                    $('#planner').val(selectedEmail);
                } else {
                    // If it's not empty, append the selected email with a comma separator
                    var currentText = $('#planner').val();
                    $('#planner').val(currentText + ', ' + selectedEmail);
                }
            });

            // Delete button event handler
            $('#planner_delete').click(function() {
                // Get the current value of the textarea
                var currentText = $('#planner').val();
                
                // Split the text into an array using comma and space separator
                var emailsArray = currentText.split(', ');
                
                // Remove the last element (email) and the preceding comma if exists
                var updatedText = emailsArray.slice(0, -1).join(', ');
                
                // Set the updated text as the textarea value
                $('#planner').val(updatedText);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#sales_list').change(function() {

                var selectedEmail = $(this).val();

                if ($('#sales').val() === '') {
                    $('#sales').val(selectedEmail);
                } else {
                    var currentText = $('#sales').val();
                    $('#sales').val(currentText + ', ' + selectedEmail);
                }
            });

            $('#sales_delete').click(function() {
                var currentText = $('#sales').val();
                var emailsArray = currentText.split(', ');
                var updatedText = emailsArray.slice(0, -1).join(', ');
                $('#sales').val(updatedText);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#cs_list').change(function() {

                var selectedEmail = $(this).val();

                if ($('#cs').val() === '') {
                    $('#cs').val(selectedEmail);
                } else {
                    var currentText = $('#cs').val();
                    $('#cs').val(currentText + ', ' + selectedEmail);
                }
            });

            $('#cs_delete').click(function() {
                var currentText = $('#cs').val();
                var emailsArray = currentText.split(', ');
                var updatedText = emailsArray.slice(0, -1).join(', ');
                $('#cs').val(updatedText);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#purchasing_list').change(function() {

                var selectedEmail = $(this).val();

                if ($('#purchasing').val() === '') {
                    $('#purchasing').val(selectedEmail);
                } else {
                    var currentText = $('#purchasing').val();
                    $('#purchasing').val(currentText + ', ' + selectedEmail);
                }
            });

            $('#purchasing_delete').click(function() {
                var currentText = $('#purchasing').val();
                var emailsArray = currentText.split(', ');
                var updatedText = emailsArray.slice(0, -1).join(', ');
                $('#purchasing').val(updatedText);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#cam_list').change(function() {

                var selectedEmail = $(this).val();

                if ($('#cam').val() === '') {
                    $('#cam').val(selectedEmail);
                } else {
                    var currentText = $('#cam').val();
                    $('#cam').val(currentText + ', ' + selectedEmail);
                }
            });

            $('#cam_delete').click(function() {
                var currentText = $('#cam').val();
                var emailsArray = currentText.split(', ');
                var updatedText = emailsArray.slice(0, -1).join(', ');
                $('#cam').val(updatedText);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#bending_list').change(function() {

                var selectedEmail = $(this).val();

                if ($('#bending').val() === '') {
                    $('#bending').val(selectedEmail);
                } else {
                    var currentText = $('#bending').val();
                    $('#bending').val(currentText + ', ' + selectedEmail);
                }
            });

            $('#bending_delete').click(function() {
                var currentText = $('#bending').val();
                var emailsArray = currentText.split(', ');
                var updatedText = emailsArray.slice(0, -1).join(', ');
                $('#bending').val(updatedText);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#assembly_list').change(function() {

                var selectedEmail = $(this).val();

                if ($('#assembly').val() === '') {
                    $('#assembly').val(selectedEmail);
                } else {
                    var currentText = $('#assembly').val();
                    $('#assembly').val(currentText + ', ' + selectedEmail);
                }
            });

            $('#assembly_delete').click(function() {
                var currentText = $('#assembly').val();
                var emailsArray = currentText.split(', ');
                var updatedText = emailsArray.slice(0, -1).join(', ');
                $('#assembly').val(updatedText);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#cnc_list').change(function() {

                var selectedEmail = $(this).val();

                if ($('#cnc').val() === '') {
                    $('#cnc').val(selectedEmail);
                } else {
                    var currentText = $('#cnc').val();
                    $('#cnc').val(currentText + ', ' + selectedEmail);
                }
            });

            $('#cnc_delete').click(function() {
                var currentText = $('#cnc').val();
                var emailsArray = currentText.split(', ');
                var updatedText = emailsArray.slice(0, -1).join(', ');
                $('#cnc').val(updatedText);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#welding_list').change(function() {

                var selectedEmail = $(this).val();

                if ($('#welding').val() === '') {
                    $('#welding').val(selectedEmail);
                } else {
                    var currentText = $('#welding').val();
                    $('#welding').val(currentText + ', ' + selectedEmail);
                }
            });

            $('#welding_delete').click(function() {
                var currentText = $('#welding').val();
                var emailsArray = currentText.split(', ');
                var updatedText = emailsArray.slice(0, -1).join(', ');
                $('#welding').val(updatedText);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#finishing_list').change(function() {

                var selectedEmail = $(this).val();

                if ($('#finishing').val() === '') {
                    $('#finishing').val(selectedEmail);
                } else {
                    var currentText = $('#finishing').val();
                    $('#finishing').val(currentText + ', ' + selectedEmail);
                }
            });

            $('#finishing_delete').click(function() {
                var currentText = $('#finishing').val();
                var emailsArray = currentText.split(', ');
                var updatedText = emailsArray.slice(0, -1).join(', ');
                $('#finishing').val(updatedText);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#qa_list').change(function() {

                var selectedEmail = $(this).val();

                if ($('#qa').val() === '') {
                    $('#qa').val(selectedEmail);
                } else {
                    var currentText = $('#qa').val();
                    $('#qa').val(currentText + ', ' + selectedEmail);
                }
            });

            $('#qa_delete').click(function() {
                var currentText = $('#qa').val();
                var emailsArray = currentText.split(', ');
                var updatedText = emailsArray.slice(0, -1).join(', ');
                $('#qa').val(updatedText);
            });
        });
    </script>
    
    <script>
        $(document).ready(function() {
            $('#npi1_list').change(function() {

                var selectedEmail = $(this).val();

                if ($('#npi1').val() === '') {
                    $('#npi1').val(selectedEmail);
                } else {
                    var currentText = $('#npi1').val();
                    $('#npi1').val(currentText + ', ' + selectedEmail);
                }
            });

            $('#npi1_delete').click(function() {
                var currentText = $('#npi1').val();
                var emailsArray = currentText.split(', ');
                var updatedText = emailsArray.slice(0, -1).join(', ');
                $('#npi1').val(updatedText);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#npi2_list').change(function() {

                var selectedEmail = $(this).val();

                if ($('#npi2').val() === '') {
                    $('#npi2').val(selectedEmail);
                } else {
                    var currentText = $('#npi2').val();
                    $('#npi2').val(currentText + ', ' + selectedEmail);
                }
            });

            $('#npi2_delete').click(function() {
                var currentText = $('#npi2').val();
                var emailsArray = currentText.split(', ');
                var updatedText = emailsArray.slice(0, -1).join(', ');
                $('#npi2').val(updatedText);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#npi1_list").select2();
            $("#npi2_list").select2();
            $("#planner_list").select2();
            $("#sales_list").select2();
            $("#cs_list").select2();
            $("#purchasing_list").select2();
            $("#cam_list").select2();
            $("#bending_list").select2();
            $("#assembly_list").select2();
            $("#cnc_list").select2();
            $("#welding_list").select2();
            $("#finishing_list").select2();
            $("#qa_list").select2();
        });
    </script>


<?php
        } else {
            echo '<script>window.location.href = "../page/access_denied.php";</script>';
        }
    } else {
        echo '<script>window.location.href = "../page/access_denied.php";</script>';
    }

?>