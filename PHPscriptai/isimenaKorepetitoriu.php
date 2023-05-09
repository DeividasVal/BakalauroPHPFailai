<?php

$profilio_id = $_POST['profilio_id'];
$mokinio_id = $_POST['mokinio_id'];

$conn = new mysqli("localhost", "root", "", "bakalauras");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO isimena (`profilio_id`, `mokinio_id`) VALUES ('$profilio_id', '$mokinio_id')";

if ($conn->query($sql) === TRUE) {
    echo "Korepetitorius įsimintas sėkmingai!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>