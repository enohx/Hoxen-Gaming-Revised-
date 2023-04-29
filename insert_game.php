<?php
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

// Check if form has been submitted
if (isset($_POST['add_game'])) {
    // Get form data
    $name = $_POST['name'];
    $price = $_POST['price'];
    $rating = $_POST['rating'];
    $description = $_POST['description'];

    // Check if user already exists
    $sql = "SELECT * FROM games WHERE name = '$name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="alert alert-danger" role="alert">
                Game already registered.
            </div>';
    } else {
        // Insert data into user table
        $sql = "INSERT INTO games (name, price, rating, description) 
                VALUES ('$name', '$price', '$rating', '$description')";

        if ($conn->query($sql) === TRUE) {
            echo '<div class="alert alert-success" role="alert">
                    Game added successfully.
                </div>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();

$name = "";
$price = "";
$rating = "";
$description = "";
?>
