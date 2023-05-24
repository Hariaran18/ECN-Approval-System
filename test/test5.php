<?php
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

// Retrieve the group ID from the URL query parameter
$groupId = $_GET['group_id'];

// Retrieve the group record
$sql = "SELECT * FROM groups WHERE group_id = '$groupId'";
$result = $conn->query($sql);

// Check if the group record exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $groupName = $row['group_name'];

    // Display the group name
    echo "<h2>Group Name: $groupName</h2>";

    // Retrieve the people records for the group
    $peopleSql = "SELECT * FROM people WHERE group_id = '$groupId'";
    $peopleResult = $conn->query($peopleSql);

    // Check if any people records exist
    if ($peopleResult->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Age</th><th>Gender</th></tr>";

        while ($peopleRow = $peopleResult->fetch_assoc()) {
            $name = $peopleRow['name'];
            $age = $peopleRow['age'];
            $gender = $peopleRow['gender'];

            // Display the people records
            echo "<tr><td>$name</td><td>$age</td><td>$gender</td></tr>";
        }

        echo "</table>";
    } else {
        echo "No people records found for this group.";
    }
} else {
    echo "Group record not found.";
}

// Close the database connection
$conn->close();
?>
