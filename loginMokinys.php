<?php
$mokinio_vartotojo_vardas = $_POST["mokinio_vartotojo_vardas"];
$mokinio_slaptazodis = $_POST["mokinio_slaptazodis"];

$mysqli = new mysqli("localhost", "root", "", "bakalauras");

$result = $mysqli->query("SELECT * FROM mokinys WHERE mokinio_vartotojo_vardas='$mokinio_vartotojo_vardas' AND mokinio_slaptazodis='$mokinio_slaptazodis'");

if ($result->num_rows > 0) {
    echo "true";
} else {
    echo "false";
}

$mysqli->close();
?>