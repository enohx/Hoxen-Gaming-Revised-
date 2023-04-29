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

// Check if the ID of the game to be deleted was passed in the AJAX request
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Execute a DELETE query to remove the game record from the games table
    $sql = "DELETE FROM games WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Game record deleted successfully";
    } else {
        echo "Error deleting game record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();

?>
