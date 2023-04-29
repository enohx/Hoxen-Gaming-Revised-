<?php
$servername = "localhost"; // Change this to your server name
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password

$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS project_db";
if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select database
$conn->select_db("project_db");

// Create user table
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
username VARCHAR(30) NOT NULL, 
password VARCHAR(30) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql = "SELECT * FROM users WHERE username = 'admin'";

$result = $conn->query($sql);
if ($result->num_rows < 1) {
    $sql = "INSERT INTO users (name,lastname, username, password) VALUES ('admin','admin','admin','admin')";                    
}



// Create games table
$sql = "CREATE TABLE IF NOT EXISTS games (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    price FLOAT(4) NOT NULL,
    rating FLOAT(3) NOT NULL, 
    description VARCHAR(70) NOT NULL
    )";
    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error creating table: " . $conn->error;
    }


    // Create usergames table
$sql = "CREATE TABLE IF NOT EXISTS usergames (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    ownedgames VARCHAR(120) NOT NULL
    )";
    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error creating table: " . $conn->error;
    }


$conn->close();
?>
