<?php

$korepetitoriaus_el_pastas = $_POST['korepetitoriaus_el_pastas'];
$korepetitoriaus_slaptazodis = $_POST['korepetitoriaus_slaptazodis'];
$pilnas_korepetitoriaus_vardas = $_POST['pilnas_korepetitoriaus_vardas'];
$korepetitoriaus_vartotojo_vardas = $_POST['korepetitoriaus_vartotojo_vardas'];

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

$sql = "INSERT INTO korepetitorius (`korepetitoriaus_el_pastas`, `korepetitoriaus_slaptazodis`, `pilnas_korepetitoriaus_vardas`, `korepetitoriaus_vartotojo_vardas`, `korepetitoriaus_nuotrauka`) VALUES ('$korepetitoriaus_el_pastas', '$korepetitoriaus_slaptazodis', '$pilnas_korepetitoriaus_vardas', '$korepetitoriaus_vartotojo_vardas', '$target_file')";

if ($conn->query($sql) === TRUE) {
    echo "Registracija sekminga!";
} else {
    echo "Toks korepetitorius jau yra!";
}

$conn->close();

?>