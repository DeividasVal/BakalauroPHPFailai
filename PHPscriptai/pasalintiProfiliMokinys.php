<?php

$mokinio_id = $_POST['mokinio_id'];

$conn = new mysqli("localhost", "root", "", "bakalauras");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM isimena WHERE mokinio_id = '$mokinio_id';";
$sql .= "DELETE FROM atsiliepimas WHERE mokinio_id = '$mokinio_id';";
$sql .= "DELETE FROM mokinys WHERE mokinio_id = '$mokinio_id';";
$sql .= "DELETE FROM pamoku_medziaga WHERE mokinio_id = '$mokinio_id';";
$sql .= "DELETE FROM uzklausos WHERE mokinio_id = '$mokinio_id';";
$sql .= "DELETE FROM zinutes 
        WHERE gavejo_id = $mokinio_id OR siuntejo_id = $mokinio_id";

if ($conn->multi_query($sql) === TRUE) {
    echo "Profilis pašalintas sėkmingai!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>