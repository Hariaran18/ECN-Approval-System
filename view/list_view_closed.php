<?php
    include ("../config/dbconnection.php");
    include ("../config/navigationbar.php");

    if($_SESSION["username"]) {

        $query = "SELECT form_id, ecn_no, type, model FROM form_list WHERE status = 10 ORDER BY form_id DESC";    

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
            <h1 class="text-center">APPLICATION LIST</h1>
            <h4 class="text-center"><b>(CLOSED)</b></h4>
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
                                    <th>Form ID</th>
                                    <th>ECN No</th>
                                    <th>Type</th>
                                    <th>Model</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo ($row["form_id"]); ?></td>
                                    <td><?php echo ($row["ecn_no"]); ?></td>
                                    <td><?php echo ($row["type"]); ?></td>
                                    <td><?php echo ($row["model"]); ?></td>
                                    <td>Closed</td>
                                    <td>
                                        <a href="form_view2.php?form_id=<?php echo $row['form_id'] ?>" class="btn btn-dark btn-sm">View</a>
                                        <a href="form_print.php?form_id=<?php echo $row['form_id'] ?>" class="btn btn-dark btn-sm">Print</a>
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

?>
