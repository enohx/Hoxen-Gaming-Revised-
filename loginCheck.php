<?php

// Get the username and password from the POST request
$username = $_POST['username'];
$password = $_POST['password'];

// Connect to the database
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "project_db";
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL query to retrieve the user with the given username and password
$sql = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

// Get the query results
$result = $stmt->get_result();

// Check if the user was found and the password is correct
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // If the username is "admin", redirect to the admin page, otherwise redirect to the index page
    if ($username == "admin") {
        header("Location: admin.php");
        exit();
    } else {
        session_start();
        $_SESSION['CurrentUser'] = $username;
        header("Location: index.php");
        exit();
    }

} else {
    echo "Username not found.";
}

// Close the database connection
$conn->close();

?>
