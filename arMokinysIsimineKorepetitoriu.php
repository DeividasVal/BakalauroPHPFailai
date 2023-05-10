<?php

$profilio_id = $_POST['profilio_id'];
$mokinio_id = $_POST['mokinio_id'];

$conn = new mysqli("localhost", "root", "", "bakalauras");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM isimena WHERE mokinio_id = '$mokinio_id' AND profilio_id = '$profilio_id'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "true";
} else {
    echo "false";
}

$conn->close();

?>
