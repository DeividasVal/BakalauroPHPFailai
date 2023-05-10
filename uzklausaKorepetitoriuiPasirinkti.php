<?php

$id = $_POST['id'];
$būsena = $_POST['būsena'];

$conn = new mysqli("localhost", "root", "", "bakalauras");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE uzklausos SET būsena = '$būsena' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    if ($būsena == "1") {
	    echo "Mokinio užklausa patvirtinta!";
	} else {
	    echo "Mokinio užklausa atšaukta!";
	}
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>