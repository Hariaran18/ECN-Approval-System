<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<header>
    <h2 class="card-title">ECN LAUNCHING</h2>
</header>
<body>
	<div id="container">
		<div class="row" id="row-1">
			<div class="col-md">
				<div class="card">
					<div class="card-body">
						<label for="text-box-1" class="form-label">Text Field 1:</label>
						<input type="text" id="text-box-1" name="text-box-1" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="card">
					<div class="card-body">
						<label for="text-box-2" class="form-label">Text Field 2:</label>
						<input type="text" id="text-box-2" name="text-box-2" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="card">
					<div class="card-body">
						<label for="text-box-3" class="form-label">Text Field 3:</label>
						<input type="text" id="text-box-3" name="text-box-3" class="form-control">
					</div>
				</div>
			</div>
		</div>
	</div>

	<button id="clone-button">Add Section</button>

	<script>
		$(document).ready(function() {
			var counter = 1;
			$("#clone-button").click(function() {
				counter++;
				var newRow = $("#row-1").clone().attr("id", "row-" + counter);
				newRow.find("input").each(function() {
					var newId = $(this).attr("id") + "-" + counter;
					$(this).attr("id", newId).attr("name", newId);
				});
				$("#container").append(newRow);
			});
		});
	</script>

</body>
<footer>
    <h2 class="card-title">ECN LAUNCHING</h2>
</footer>
</html>
