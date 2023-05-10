<?php
$korepetitoriaus_vartotojo_vardas = $_POST["korepetitoriaus_vartotojo_vardas"];
$korepetitoriaus_slaptazodis = $_POST["korepetitoriaus_slaptazodis"];

$mysqli = new mysqli("localhost", "root", "", "bakalauras");

$result = $mysqli->query("SELECT * FROM korepetitorius WHERE korepetitoriaus_vartotojo_vardas='$korepetitoriaus_vartotojo_vardas' AND korepetitoriaus_slaptazodis='$korepetitoriaus_slaptazodis'");

if ($result->num_rows > 0) {
    echo "true";
} else {
    echo "false";
}

$mysqli->close();
?>