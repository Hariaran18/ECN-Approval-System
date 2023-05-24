<!DOCTYPE html>
<html>
<head>
    <title>Group List</title>
</head>
<body>
    <h1>Group List</h1>
    
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

    // Retrieve all group names
    $sql = "SELECT * FROM groups";
    $result = $conn->query($sql);

    // Check if any records exist
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $groupId = $row['group_id'];
            $groupName = $row['group_name'];

            // Display the group name as a link to the view page
            echo "<a href='test5.php?group_id=$groupId'>$groupName</a><br/>";
        }
    } else {
        echo "No records found.";
    }

    // Close the database connection
    $conn->close();
    ?>
    
</body>
</html>
