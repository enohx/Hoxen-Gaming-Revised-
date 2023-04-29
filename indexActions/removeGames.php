<?php
// Retrieve the game name from the request
$gameName = $_POST['game'];

// Connect to the database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'project_db';

$conn = new mysqli($host, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Delete the game from the usergames table
$sql = "DELETE FROM usergames WHERE ownedgames = ?";
$stmt = $conn->prepare($sql); // prepare the SQL statement
$stmt->bind_param("s", $gameName); // bind the game name parameter
$stmt->execute(); // execute the statement

// Close the database connection
$conn->close();

// Return a success response
$response = ['success' => true];
header('Content-Type: application/json');
echo json_encode($response); // encode the response as JSON and output it
?>
