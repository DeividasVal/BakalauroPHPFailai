<?php

$mokinio_id = $_POST['mokinio_id'];
$mokinio_el_pastas = $_POST['mokinio_el_pastas'];
$mokinio_slaptazodis = $_POST['mokinio_slaptazodis'];
$pilnas_mokinio_vardas = $_POST['pilnas_mokinio_vardas'];
$mokinio_vartotojo_vardas = $_POST['mokinio_vartotojo_vardas'];


$conn = new mysqli("localhost", "root", "", "bakalauras");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE mokinys SET `mokinio_el_pastas`='$mokinio_el_pastas', `mokinio_slaptazodis`='$mokinio_slaptazodis', `pilnas_mokinio_vardas`='$pilnas_mokinio_vardas', `mokinio_vartotojo_vardas`='$mokinio_vartotojo_vardas' WHERE `mokinio_id`='$mokinio_id'";

if ($conn->query($sql) === TRUE) {
    echo "Atnaujinimas sėkmingas!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>