<?php
header('Content-Type: application/json');

// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Execute a SELECT query to fetch all game records from the games table
$sql = "SELECT id, name, price, rating, description FROM games";
$result = $conn->query($sql);

// Close the database connection
$conn->close();

// Display the game card views
echo json_encode($result->fetch_all(MYSQLI_ASSOC));
?>
