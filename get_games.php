<?php
// connect to database
$mysqli = new mysqli('localhost', 'root', '', 'project_db');

// query to retrieve games data
$result = $mysqli->query("SELECT name, price, rating, description FROM games");

// create array to store games data
$games = array();

// loop through results and add each game to array
while ($row = $result->fetch_assoc()) {
    $games[] = $row;
}

// encode array as JSON and output it
echo json_encode($games);
?>
