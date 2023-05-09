<?php

$mokinio_el_pastas = $_POST['mokinio_el_pastas'];
$mokinio_slaptazodis = $_POST['mokinio_slaptazodis'];
$pilnas_mokinio_vardas = $_POST['pilnas_mokinio_vardas'];
$mokinio_vartotojo_vardas = $_POST['mokinio_vartotojo_vardas'];

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

$sql = "INSERT INTO mokinys (`mokinio_el_pastas`, `mokinio_slaptazodis`, `pilnas_mokinio_vardas`, `mokinio_vartotojo_vardas`, `mokinio_nuotrauka`) VALUES ('$mokinio_el_pastas', '$mokinio_slaptazodis', '$pilnas_mokinio_vardas', '$mokinio_vartotojo_vardas', '$target_file')";

if ($conn->query($sql) === TRUE) {
    echo "Registracija sėkminga!";
} else {
    echo "Toks mokinys jau yra!";
}

$conn->close();

?>