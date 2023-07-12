<?php
    include ("../config/dbconnection.php");
    include ("../config/navigationbar.php");

	if($_SESSION["username"]) {
	    if($_SESSION['access'] == "Admin") {

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
            $access = $query['access'];
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
                <h1 class="text-center">EDIT USER</h1>
                <hr width="80%">
                <form class="form-group" action="../controller/edit_user_controller.php" method="post" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <td><label>Employee ID</label></td>
                            <td><input type="text" class="form-control" id="emp_id" name="emp_id" value="<?php echo $emp_id; ?>" readonly></td>
                            <td><label>Username</label></td>
                            <td><input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td><label>Name</label></td>
                            <td><input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>"></td>
                            <td><label>Email</label></td>
                            <td><input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>"></td>
                        </tr>
                        <tr>
                            <td><label>Department</label></td>
                            <td>
                                <select class="form-control" id="department" name="department">
                                    <option value="" <?php if ($department == '') echo 'selected'; ?>></option>
                                    <option value="NPI1" <?php if ($department == 'NPI1') echo 'selected'; ?>>NPI1</option>
                                    <option value="NPI2" <?php if ($department == 'NPI2') echo 'selected'; ?>>NPI2</option>
                                    <option value="Planner" <?php if ($department == 'Planner') echo 'selected'; ?>>Planner</option>
                                    <option value="Sales" <?php if ($department == 'Sales') echo 'Sales'; ?>>Controller</option>
                                    <option value="CS" <?php if ($department == 'CS') echo 'selected'; ?>>CS</option>
                                    <option value="Purchasing" <?php if ($department == 'Purchasing') echo 'selected'; ?>>Purchasing</option>
                                    <option value="CAM" <?php if ($department == 'CAM') echo 'selected'; ?>>CAM</option>
                                    <option value="Bending" <?php if ($department == 'Bending') echo 'selected'; ?>>Bending</option>
                                    <option value="Assembly" <?php if ($department == 'Assembly') echo 'selected'; ?>>Assembly</option>
                                    <option value="CNC" <?php if ($department == 'CNC') echo 'selected'; ?>>CNC</option>
                                    <option value="Welding" <?php if ($department == 'Welding') echo 'selected'; ?>>Welding</option>
                                    <option value="Finishing" <?php if ($department == 'Finishing') echo 'selected'; ?>>Finishing</option>
                                    <option value="QA" <?php if ($department == 'QA') echo 'selected'; ?>>QA</option>
                                </select>
                            </td>
                            <td><label>access</label></td>
                            <td>
                                <select class="form-control" id="access" name="access">
                                    <option value="User" <?php if ($access == 'User') echo 'selected'; ?>>User</option>
                                    <option value="Admin" <?php if ($access == 'Admin') echo 'selected'; ?>>Admin</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Signature</label></td>
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
        } else {
            echo '<script>window.location.href = "../page/access_denied.php";</script>';
        }
    } else {
        echo '<script>window.location.href = "../page/access_denied.php";</script>';
    }

?>