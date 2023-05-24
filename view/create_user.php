<?php
    include ("../config/dbconnection.php");
    include ("../config/navigationbar.php");

	// if($_SESSION["username"]) {
	//     if(($_SESSION['access'] == "admin") || ($_SESSION['access'] == "superuser")) {
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
                <h1 class="text-center">E-ECN & IECN SYSTEM</h1>
                <h4 class="text-center">Create User</h4>
                <hr width="80%">
                <form class="form-group" action="../controller/create_user_controller.php" method="post" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <td><label for="username">Username</label></td>
                            <td><input type="text" class="form-control" id="username" name="username" required></td>
                            <td><label for="password">Password</label></td>
                            <td><input type="password" class="form-control" id="password" name="password" required></td>
                        </tr>
                        <tr>
                            <td><label for="name">Name</label></td>
                            <td><input type="text" class="form-control" id="name" name="name" required></td>
                            <td><label for="email">Email</label></td>
                            <td><input type="email" class="form-control" id="email" name="email"></td>
                        </tr>
                        <tr>
                            <td><label for="emp_id">Employee ID</label></td>
                            <td><input type="text" class="form-control" id="emp_id" name="emp_id" required></td>
                            <td><label for="access">Department</label></td>
                            <td><input type="text" class="form-control" id="department" name="department"></td>
                        </tr>
                        <tr>
                            <td><label for="role">Signature</label></td>
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
    //     } else {
    //         header("Location: ./message/general/access_denied.php");
    //     }
    // } else {
    //     header("Location: ./message/general/page_not_found.php");
    // }

?>