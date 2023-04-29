<?php

// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the "Delete" button was clicked, and if so, delete the user from the database
if (isset($_POST['delete_user'])) {
  $id = $_POST['delete_user'];
  $sql = "DELETE FROM users WHERE id = $id";
  $conn->query($sql);
}

// Execute a SELECT query to fetch all user records from the users table
$sql = "SELECT id, name, lastname, username, password FROM users";
$result = $conn->query($sql);

// Close the database connection
$conn->close();

// Display the card views on the admin page
echo json_encode($result->fetch_all(MYSQLI_ASSOC));

?>
