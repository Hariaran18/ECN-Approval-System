<?php
    include ("../config/dbconnection.php");
    include ("../config/navigationbar.php");

	// if($_SESSION["username"]) {
	//     if(($_SESSION['access'] == "admin") || ($_SESSION['access'] == "superuser")) {

    $emp_id = $_GET['emp_id'];

    $sql = "SELECT * FROM `user` WHERE emp_id = '".$emp_id."'";
    $qry = mysqli_query($conn,$sql);

    $query = mysqli_fetch_assoc($qry);

    $username = $query['username'];
    $password = $query['password'];
    $name = $query['name'];
    $email = $query['email'];
    $emp_id = $query['emp_id'];
    $department = $query['department'];
    $sign = $query['sign'];
    $img_path = "../src/img/sign/"

?>


<!DOCTYPE html>
    <html>
        <head>
            <title>E-ECN & IECN</title>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <!-- <link rel="stylesheet" type="text/css" href="list_view_style.css"/> -->
        </head>
        <body>
            <div class="container">
                <br>
                <h1 class="text-center">E-ECN & IECN SYSTEM</h1>
                <h4 class="text-center">EDIT USER</h4>
                <hr width="80%">
                <form class="form-group" action="../controller/edit_user_controller.php" method="post" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <td><label for="emp_id">Employee ID</label></td>
                            <td><input type="text" class="form-control" id="emp_id" name="emp_id" value="<?php echo $emp_id; ?>" readonly></td>
                            <td><label for="username">Username</label></td>
                            <td><input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td><label for="name">Name</label></td>
                            <td><input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>"></td>
                            <td><label for="email">Email</label></td>
                            <td><input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="access">Department</label></td>
                            <td>
                                <input type="text" class="form-control" id="department" name="department" value="<?php echo $department; ?>">
                            </td>
                            <td><label for="role">Signature</label></td>
                            <td>
                                <?php if (!empty($sign)): ?>
                                    <img src="<?php echo $img_path.$sign.'?t='.time(); ?>" width="200" height="auto" style="border: 1px solid black;">
                                <?php endif; ?><input type="file" id="sign" name="sign">
                            </td>
                        </tr>
                    </table>
                    <br>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
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