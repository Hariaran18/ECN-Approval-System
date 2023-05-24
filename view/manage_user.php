<!DOCTYPE html>

<?php
    include ("../config/dbconnection.php");
    include ("../config/navigationbar.php");

	$query = "SELECT * FROM user ORDER BY emp_id DESC";    

	if ($result = $conn->query($query)) {
?>

<html>
    <head>
        <title>E-ECN & IECN</title>
		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">.
		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->


		<style>
			body{
				background:#FFFFFF;    
			}
			/* .main-box.no-header {
				padding-top: 20px;
			} */
			.main-box {
				background: #FFFFFF;
				-webkit-box-shadow: 1px 1px 2px 0 #CCCCCC;
				-moz-box-shadow: 1px 1px 2px 0 #CCCCCC;
				-o-box-shadow: 1px 1px 2px 0 #CCCCCC;
				-ms-box-shadow: 1px 1px 2px 0 #CCCCCC;
				box-shadow: 1px 1px 2px 0 #CCCCCC;
				margin-bottom: 16px;
				-webikt-border-radius: 3px;
				-moz-border-radius: 3px;
				border-radius: 3px;
			}
			.table a.table-link.danger {
				color: #e74c3c;
			}
			/* .label {
				border-radius: 3px;
				font-size: 0.875em;
				font-weight: 600;
			} */
			.user-list tbody td .user-subhead {
				font-size: 0.875em;
				font-style: italic;
			}
			.user-list tbody td .user-link {
				display: block;
				font-size: 1.25em;
				padding-top: 3px;
				margin-left: 60px;
			}
			a {
				color: #3498db;
				outline: none!important;
			}
			.user-list tbody td>img {
				position: relative;
				max-width: 50px;
				float: left;
				margin-right: 15px;
			}

			.table thead tr th {
				text-transform: uppercase;
				font-size: 0.875em;
			}
			.table thead tr th {
				border-bottom: 2px solid #e7ebee;
			}
			.table tbody tr td:first-child {
				font-size: 1.125em;
				font-weight: 300;
			}
			.table tbody tr td {
				font-size: 0.875em;
				vertical-align: middle;
				border-top: 1px solid #e7ebee;
				padding: 12px 8px;
			}
			a:hover{
			text-decoration:none;
			}
		</style>
	</head>

	<hr>
	<div class="container bootstrap snippets bootdey">
		<div class="row">
			<div class="col-lg-12">
				<div class="main-box no-header clearfix">
					<div class="main-box-body clearfix">
						<div class="table-responsive">
							<table class="table user-list">
								<thead>
									<tr>
										<th>Employee ID</th>
										<th>Username</th>
										<th>Name</th>
										<th>Email</th>
										<th>Department</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
										while ($row = $result->fetch_assoc()) {
									?>
										<tr>
											<td><?php echo($row["emp_id"]);?></td>
											<td><?php echo($row["username"]);?></td>
											<td><?php echo($row["name"]);?></td>
											<td><?php echo($row["email"]);?></td>
											<td><?php echo($row["department"]);?></td>
											<td style="width: 20%;">
												<a href="edit_user.php?emp_id=<?php echo $row['emp_id'] ?>" class="table-link  text-info">
													<span class="fa-stack">
														<i class="fa fa-square fa-stack-2x"></i>
														<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
													</span>
												</a>
												<a href="../controller/delete_user.php?emp_id=<?php echo $row['emp_id'] ?>" class="table-link danger">
													<span class="fa-stack">
														<i class="fa fa-square fa-stack-2x"></i>
														<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
													</span>
												</a>
											</td>
										</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</html>
<?php    
	$result->free();
			
	} else {
		echo "No user found!";
	}

	// } else {
	// 	header("Location: ./message/general/access_denied.php");
	// }

?>
