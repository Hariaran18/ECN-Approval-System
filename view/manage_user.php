<!DOCTYPE html>

<?php
    include ("../config/dbconnection.php");
    include ("../config/navigationbar.php");

	if($_SESSION["username"]) {
	    if($_SESSION['access'] == "Admin") {

			$query = "SELECT * FROM user ORDER BY emp_id DESC";    

			if ($result = $conn->query($query)) {
?>

<html>
    <head>
        <title>E-ECN & IECN</title>
		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">.
		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->


		<style>
            input[type="search"] {
                width: 100%;
                padding: 10px;
                border: 2;
                border-radius: 5px;
                font-size: 14px;
                outline: none;
            }
			.table a.table-link.danger {
				color: #e74c3c;
			}
			a {
				color: #3498db;
				outline: none!important;
			}
			a:hover{
			text-decoration:none;
			}
		</style>
	</head>
	<body>
		<div class="container"></div>
			<br>
			<h1 class="text-center">EDIT USER</h1>
			<hr width="80%">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header pb-0">
						<div class="card-actions float-right search-container">
							<input class="form-outline" id="searchInput" type="search" onkeyup="searchFunction()" placeholder="Search...">
						</div>
					</div>
					<div class="card-body">
						<table class="table user-list" id="table">
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

		<script>
            function searchFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("searchInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("table");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td");
                    for (j = 0; j < td.length; j++) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break;
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>


	</body>
</html>
<?php
	$result->free();
			
			} else {
				echo "No user found!";
			}

		} else {
			echo '<script>window.location.href = "../page/access_denied.php";</script>';
		}
	} else {
		echo '<script>window.location.href = "../page/access_denied.php";</script>';
	}

?>
