<?php

$mokinio_id = $_POST['mokinio_id'];
$korepetitoriaus_id = $_POST['korepetitoriaus_id'];
$pavadinimas = $_POST['pavadinimas'];
$laikas_issiusta = $_POST['laikas_issiusta'];

// Store the uploaded file
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
	
} else {
    echo "Klaida bandat įkelti failą.";
}

$conn = new mysqli("localhost", "root", "", "bakalauras");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO pamoku_medziaga (`mokinio_id`, `korepetitoriaus_id`, `pavadinimas`, `laikas_issiusta`, `failas`) VALUES ('$mokinio_id', '$korepetitoriaus_id', '$pavadinimas', '$laikas_issiusta', '$target_file')";

if ($conn->query($sql) === TRUE) {
    echo "Failas prisegtas mokiniui!";
} else {
    echo "Klaida: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>