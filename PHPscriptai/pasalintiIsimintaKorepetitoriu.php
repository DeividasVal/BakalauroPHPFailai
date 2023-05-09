<?php

$mokinio_id = $_POST['mokinio_id'];
$profilio_id = $_POST['profilio_id'];

$conn = new mysqli("localhost", "root", "", "bakalauras");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM isimena WHERE mokinio_id = '$mokinio_id' AND profilio_id = '$profilio_id'";

if ($conn->query($sql) === TRUE) {
    echo "Įsimintas korepetitorius pašalintas!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>