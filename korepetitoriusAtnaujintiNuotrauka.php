<?php
$korepetitoriaus_id = $_POST['korepetitoriaus_id'];

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

$sql = "UPDATE korepetitorius SET korepetitoriaus_nuotrauka = '$target_file' WHERE korepetitoriaus_id = '$korepetitoriaus_id'";


if ($conn->query($sql) === TRUE) {
    echo "Duomenys atnaujinti sėkmingai!";
} else {
    echo "Klaida!";
}

$conn->close();

?>