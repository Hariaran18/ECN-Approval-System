<?php
// Define database connection parameters
$host = 'localhost';
$dbname = 'test';
$user = 'username';
$password = 'password';

// Create database connection
try {
  $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Database connection failed: " . $e->getMessage();
  die();
}

// Prepare database insert statement
$stmt = $db->prepare("INSERT INTO form_data (form_no, field1, field2, field3) VALUES (:form_no, :field1, :field2, :field3)");

// Iterate through submitted form rows
foreach ($_POST['text-box-1'] as $index => $value) {
  // Bind values to insert statement
  $stmt->bindParam(':form_no', $_POST['form_no']);
  $stmt->bindParam(':field1', $_POST['text-box-1'][$index]);
  $stmt->bindParam(':field2', $_POST['text-box-2'][$index]);
  $stmt->bindParam(':field3', $_POST['text-box-3'][$index]);

  // Execute insert statement
  $stmt->execute();
}

// Redirect to success page
header("Location: success.php");
exit();
?>
