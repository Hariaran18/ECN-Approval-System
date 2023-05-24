<?php
// Retrieve form data
$groupName = $_POST['group_name'];
$names = $_POST['name'];
$ages = $_POST['age'];
$genders = $_POST['gender'];

// Database connection configuration
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "ecn";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert group name into the database
$sql = "INSERT INTO groups (group_name) VALUES ('$groupName')";
$conn->query($sql);
$groupId = $conn->insert_id;

// Insert people data into the database
for ($i = 0; $i < count($names); $i++) {
    $name = $conn->real_escape_string($names[$i]);
    $age = $conn->real_escape_string($ages[$i]);
    $gender = $conn->real_escape_string($genders[$i]);

    $sql = "INSERT INTO people (group_id, name, age, gender) VALUES ('$groupId', '$name', '$age', '$gender')";
    $conn->query($sql);
}

// Close the database connection
$conn->close();

// Redirect back to the form page or any other page
header("Location: form.php");
exit();
?>
