<?php

$mokinio_el_pastas = $_POST['mokinio_el_pastas'];
$mokinio_slaptazodis = $_POST['mokinio_slaptazodis'];
$pilnas_mokinio_vardas = $_POST['pilnas_mokinio_vardas'];
$mokinio_vartotojo_vardas = $_POST['mokinio_vartotojo_vardas'];

$conn = new mysqli("localhost", "root", "", "bakalauras");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO mokinys (`mokinio_el_pastas`, `mokinio_slaptazodis`, `pilnas_mokinio_vardas`, `mokinio_vartotojo_vardas`) VALUES ('$mokinio_el_pastas', '$mokinio_slaptazodis', '$pilnas_mokinio_vardas', '$mokinio_vartotojo_vardas')";

if ($conn->query($sql) === TRUE) {
    echo "Registracija sėkminga!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>