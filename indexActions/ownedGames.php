<?php
// Set the content type of the response to be JSON
header('Content-Type: application/json');

// Connect to the MySQL database
$servername = "localhost"; // Database server name
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "project_db"; // Database name

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve all game records for the currently logged in user from the usergames table
session_start(); // Start a new or resume an existing session
$userName = $_SESSION['CurrentUser']; // Get the username of the currently logged in user
$sql = "SELECT ownedgames FROM usergames WHERE username = '$userName'"; // Select all owned games for this user
$result = $conn->query($sql); // Execute the query and get the result set

// Close the database connection
$conn->close();

// Extract the game names from the query result and return them as a JSON array
$games = array(); // Create an empty array to store the game names
while ($row = $result->fetch_assoc()) {
  $games[] = $row['ownedgames']; // Add each game name to the array
}
echo json_encode($games); // Encode the array as a JSON object and return it as the response
?>
