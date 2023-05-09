<?php

$mokinio_id = $_POST['mokinio_id'];
$id = $_POST['id'];

$conn = new mysqli("localhost", "root", "", "bakalauras");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM uzklausos WHERE mokinio_id = '$mokinio_id' AND id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "Korepetitorius atšauktas sėkmingai!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>