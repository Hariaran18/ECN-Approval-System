<?php
    include ("../config/dbconnection.php");
    include ("../config/navigationbar.php");

	if($_SESSION["username"]) {

        $username = $_SESSION['username'];

        $sql = "SELECT * FROM `user` WHERE username = '".$username."'";
        $qry = mysqli_query($conn,$sql);

        $query = mysqli_fetch_assoc($qry);

        $username = $query['username'];
        $name = $query['name'];
        $email = $query['email'];
        $emp_id = $query['emp_id'];
        $department = $query['department'];
        $sign = $query['sign'];
        $password = $query['password'];
        $img_path = "../src/img/sign/"
?>


<!DOCTYPE html>
    <html>
        <head>
            <title>E-ECN & IECN - Profile</title>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" type="text/css" href="list_view_style.css"/>
        </head>
        <body>
            <div class="container">
                <br>
                <h1 class="text-center">E-ECN & IECN SYSTEM</h1>
                <h4 class="text-center">Profile</h4>
                <hr width="80%">
                <table class="table">
                    <tr>
                        <td><label for="emp_id">Employee ID</label></td>
                        <td><input type="text" class="form-control" id="emp_id" name="emp_id" value="<?php echo $emp_id; ?>" readonly></td>
                        <td><label for="username">Username</label></td>
                        <td><input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="name">Name</label></td>
                        <td><input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" readonly></td>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="access">Department</label></td>
                        <td><input type="text" class="form-control" id="department" name="department" value="<?php echo $department; ?>" readonly></td>
                        <td><label for="role">Sign</label></td>
                        <td>
                            <?php if (!empty($sign)): ?>
                                <img src="<?php echo $img_path.$sign.'?t='.time(); ?>" width="200" height="auto">
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
                <hr width="80%">
                <br>
            </div>

            <div class="container">
                <br>
                <h4 class="text-center">Reset Password</h4>
                <hr width="80%">
                <form class="form-group" action="../controller/reset_password.php" method="post" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <td><label for="current_password">Current Password</label></td>
                            <td><input type="password" class="form-control" id="current_password" name="current_password"></td>
                        </tr>
                        <tr>
                            <td><label for="new_password">New Password</label></td>
                            <td><input type="password" class="form-control" id="new_password" name="new_password"></td>
                            <td><label for="confirm_password">Confirm New Password</label></td>
                            <td><input type="password" class="form-control" id="confirm_password" name="confirm_password"></td>
                        </tr>
                    </table>
                    <br>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" name="reset_password" id="reset_password">Reset Password</button>
                    </div>
                </form>
            </div>
        </body>
    </html>
<script>
    
</script>


<?php
    } else {
        echo '<script>window.location.href = "../page/404.php";</script>';
    }

?>
