<?php
//include_once 'databaseconfig.php';

// Get form data
// $name = $_POST['name'];
// $lastname = $_POST['lastname'];
// $username = $_POST['username'];
// $password = $_POST['password'];

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Insert data into table
$sql = "INSERT INTO users (name, lastname, username, password)
        VALUES ('$name', $lastname, $username, $password)";

if (mysqli_query($conn, $sql)) {
  echo "Data inserted successfully";
} else {
  echo "Error inserting data: " . mysqli_error($conn);
}

mysqli_close($conn);
?>