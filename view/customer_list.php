<?php
    include ("../config/dbconnection.php");
    include ("../config/navigationbar.php");

    if($_SESSION["username"]) {
	    if($_SESSION['access'] == "Admin") {

            $query = "SELECT name, cus_id FROM customer";    

            if ($result = $conn->query($query)) {
?>

<html>
    <head>
        <title>E-ECN & IECN SYSTEM</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <style>
            input[type="search"] {
                width: 100%;
                padding: 10px;
                border: 2;
                border-radius: 5px;
                font-size: 14px;
                outline: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <br>
            <h1 class="text-center">CUSTOMER LIST</h1>
            <hr width="80%">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="card-actions float-right search-container">
                            <input class="form-outline" id="searchInput" type="search" onkeyup="searchFunction()" placeholder="Search...">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" style="width:100%" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Customer Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo ($row["cus_id"]); ?></td>
                                    <td><?php echo ($row["name"]); ?></td>
                                    <td>
                                        <a href="edit_customer.php?cus_id=<?php echo $row['cus_id'] ?>" class="btn btn-dark btn-sm">Edit</a>
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
            echo "No result found";
        }

    } else {
        echo '<script>window.location.href = "../page/access_denied.php";</script>';
    }
} else {
    echo '<script>window.location.href = "../page/access_denied.php";</script>';
}

?>
