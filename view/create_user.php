<?php
    include ("../config/dbconnection.php");
    include ("../config/navigationbar.php");

	if($_SESSION["username"]) {
	    if($_SESSION['access'] == "Admin") {
?>


<!DOCTYPE html>
    <html>
        <head>
            <title>E-ECN & IECN - Create User</title>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <!-- <link rel="stylesheet" type="text/css" href="list_view_style.css"/> -->
        </head>
        <body>
            <div class="container">
                <br>
                <h1 class="text-center">CREATE USER</h1>
                <hr width="80%">
                <form class="form-group" action="../controller/create_user_controller.php" method="post" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <td><label>Username</label></td>
                            <td><input type="text" class="form-control" id="username" name="username" required></td>
                            <td><label>Password</label></td>
                            <td><input type="password" class="form-control" id="password" name="password" required></td>
                        </tr>
                        <tr>
                            <td><label>Name</label></td>
                            <td><input type="text" class="form-control" id="name" name="name" required></td>
                            <td><label>Email</label></td>
                            <td><input type="email" class="form-control" id="email" name="email"></td>
                        </tr>
                        <tr>
                            <td><label>Employee ID</label></td>
                            <td><input type="text" class="form-control" id="emp_id" name="emp_id" required></td>
                            <td><label>access</label></td>
                            <td>
                                <select class="form-control" id="access" name="access">
                                    <option value="User" selected>User</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Department</label></td>
                            <td>
                                <select class="form-control" id="department" name="department">
                                    <option value="" selected></option>
                                    <option value="NPI1">NPI1</option>
                                    <option value="NPI2">NPI2</option>
                                    <option value="Planner">Planner</option>
                                    <option value="Sales">Sales</option>
                                    <option value="CS">CS</option>
                                    <option value="Purchasing">Purchasing</option>
                                    <option value="CAM">CAM</option>
                                    <option value="Bending">Bending</option>
                                    <option value="Assembly">Assembly</option>
                                    <option value="CNC">CNC</option>
                                    <option value="Welding">Welding</option>
                                    <option value="Finishing">Finishing</option>
                                    <option value="QA">QA</option>

                                </select>
                            </td>
                            <td><label>Signature</label></td>
                            <td><input type="file" class="form-control" id="sign" name="sign"></td>
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



<?php
        } else {
            echo '<script>window.location.href = "../page/access_denied.php";</script>';
        }
    } else {
        echo '<script>window.location.href = "../page/access_denied.php";</script>';
    }

?>