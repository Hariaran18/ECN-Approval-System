<?php
  include ("dbconnection.php");
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Include Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
		/* Custom CSS to change dropdown background color on hover */
		.dropdown-menu a:hover {
			background-color: #757575;
			color: #fff;
		}
	</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  <a class="navbar-brand" href="#"><b><I>E-ECN & IECN</I></b></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
		  <!-- <li class="nav-item active">
            <a class="nav-link" href="dashboard.php">DASHBOARD<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="form.php">CREATE NCMR<span class="sr-only">(current)</span></a>
          </li> -->
            <li class="nav-item active">
              <a class="nav-link" href="../view/manage_user.php">MANAGE USER<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="../view/create_user.php">CREATE USER<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="../view/form.php">FORM<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="../view/list_view.php">LIST<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="../view/form_view.php">VIEW<span class="sr-only">(current)</span></a>
            </li>
          <!-- <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              APPLICATIONS
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="list_view_pending.php">PENDING</a>
              <a class="dropdown-item" href="list_view_closed.php">CLOSED</a>
            </div>
          </li>
            <li class="nav-item active">
              <a class="nav-link" href="approval_list.php">APPROVAL<span class="sr-only">(current)</span></a>
            </li>
          <li class="nav-item active">
            <a class="nav-link" href="report.php">REPORT<span class="sr-only">(current)</span></a>
          </li> -->
        </ul>
        <ul class="navbar-nav">
	        <li class="nav-item dropdown active">
	          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['name']; ?>
	          </a>
	          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              	<a class="dropdown-item" href="../view/profile.php">Profile</a>
	            <a class="dropdown-item" href="logout.php" onclick="return confirm('Are you sure want to logout?');">Log Out <span class="sr-only">(current)</span></a>
	          </div>
	        </li>
	      </ul>
	    </div>
	</nav>


	<!-- Include Bootstrap JavaScript -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
