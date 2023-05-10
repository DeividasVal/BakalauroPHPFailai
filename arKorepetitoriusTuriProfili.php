<?php

$korepetitoriaus_id = $_GET['korepetitoriaus_id'];

$conn = new mysqli("localhost", "root", "", "bakalauras");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM korepetitorius_profilis WHERE korepetitoriaus_id = '$korepetitoriaus_id'";;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "true";
} else {
    echo "false";
}

$conn->close();

?>
