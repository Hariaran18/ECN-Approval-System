<?php
    include ("../config/dbconnection.php");
    include ("../config/navigationbar.php");

// Retrieve form data
$date = $_POST['date'];
$created_by = $_POST['created_by'];
$type = $_POST['type'];
$model = $_POST['model'];
$ecn_no = $_POST['ecn_no'];
$ecr_no = $_POST['ecr_no'];
$etd_no = $_POST['etd_no'];
$customer = $_POST['customer'];
$job_no = $_POST['job_no'];
$implement_date = $_POST['implement_date'];
$status = $_POST['status'];
// $running_no = $_POST['running_no'];
$b_details1 = $_POST['b_details'];
$b_partno1 = $_POST['b_partno'];
$b_rev1 = $_POST['b_rev'];
$a_details1 = $_POST['a_details'];
$a_partno1 = $_POST['a_partno'];
$a_rev1 = $_POST['a_rev'];

// Retrieve uploaded images
$before_pic = isset($_FILES['b_pic']) ? $_FILES['b_pic'] : null;
$after_pic = isset($_FILES['a_pic']) ? $_FILES['a_pic'] : null;

// Create a folder for each submission
$imgDir = "../src/img/form/" . $ecn_no . "/";
if (!file_exists($imgDir)) {
    mkdir($imgDir, 0777, true);
}

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert group name into the database
$sql = "INSERT INTO form_list (form_id, date, created_by, type, model, ecn_no, ecr_no, etd_no, customer, job_no, implement_date, status) VALUES ('$'$formId'','$date','$created_by','$type','$model','$ecn_no','$ecr_no','$etd_no','$customer','$job_no','$implement_date','$type')";
$conn->query($sql);status
$formId = $conn->insert_id;

// // Insert people data into the database
for ($i = 0; $i < count($b_partno1); $i++) {
    $b_details = $conn->real_escape_string($b_details1[$i]);
    $b_partno = $conn->real_escape_string($b_partno1[$i]);
    $b_rev = $conn->real_escape_string($b_rev1[$i]);
    $a_details = $conn->real_escape_string($a_details1[$i]);
    $a_partno = $conn->real_escape_string($a_partno1[$i]);
    $a_rev = $conn->real_escape_string($a_rev1[$i]);

    // Before Picture
    $filetoupload1 = basename($before_pic["name"][$i]);
    if($filetoupload1 == "") {
        $newFileName1 = "";
    } else {
        $imageFileType1 = pathinfo($filetoupload1,PATHINFO_EXTENSION);
        $newFileName1 = $ecn_no . '_before_' . ($i+1) . '.' . $imageFileType1;
        $target_file1 = $imgDir . $newFileName1;
        $file1= $before_pic["tmp_name"][$i];

        if (move_uploaded_file($file1, $target_file1)) {
            echo "Success";
        } else {
            echo "<p>Failed to upload the before image.</p>";
        }
    }

    // After Picture
    $filetoupload2 = basename($after_pic["name"][$i]);
    if($filetoupload2 == "") {
        $newFileName2 = "";
    } else {
        $imageFileType2 = pathinfo($filetoupload2,PATHINFO_EXTENSION);
        $newFileName2 = $ecn_no . '_after_' . ($i+1) . '.' . $imageFileType1;
        $target_file2 = $imgDir . $newFileName2;
        $file2= $after_pic["tmp_name"][$i];

        if (move_uploaded_file($file2, $target_file2)) {
            echo "Success";
        } else {
            echo "<p>Failed to upload the before image.</p>";
        }
    }



    $sql2 = "INSERT INTO form (form_id, b_details, b_partno, b_rev, a_details, a_partno, a_rev, b_pic, a_pic) VALUES ('$formId', '$b_details', '$b_partno', '$b_rev', '$a_details', '$a_partno', '$a_rev', '$newFileName1', '$newFileName2')";
    $conn->query($sql2);
}

// Close the database connection
$conn->close();

// Redirect back to the form page or any other page
// header("Location: form.php");
exit();
?>
