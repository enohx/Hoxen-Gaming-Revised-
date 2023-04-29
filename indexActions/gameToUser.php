<?php
session_start(); // start a session to retrieve the current user's name
$userName = $_SESSION['CurrentUser']; // retrieve the current user's name from the session
$gameName = $_POST['gameName']; // retrieve the game name from the POST request

// Connect to database
$servername = "localhost"; // server name or IP address
$username = "root"; // database username
$password = ""; // database password
$dbname = "project_db"; // database name
$conn = mysqli_connect($servername, $username, $password, $dbname); // create a new MySQLi connection object

// Check if the user already has the game
$sql_check = "SELECT * FROM usergames WHERE username='$userName' AND ownedgames='$gameName'"; // SQL query to check if the user already has the game
$result_check = mysqli_query($conn, $sql_check); // execute the SQL query and store the result in $result_check
if (mysqli_num_rows($result_check) > 0) { // if the user already has the game
    echo "<script>alert('game already added');</script>"; // display an alert message using JavaScript
} else { // if the user does not have the game
  // Insert values into usergames table
  $sql_insert = "INSERT INTO usergames (username, ownedgames) VALUES ('$userName', '$gameName')"; // SQL query to insert the game into the usergames table
  if (mysqli_query($conn, $sql_insert)) { // if the SQL query is successful
    echo "Game added to user: " . $userName; // display a success message
  } else { // if the SQL query fails
    echo "Error adding game to user: " . mysqli_error($conn); // display an error message with the error details
  }
}

mysqli_close($conn); // close the MySQLi connection object to free up resources
?>
