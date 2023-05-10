<?php
header('Content-Type: text/html; charset=utf-8');

// Get the data from the POST request
$korepetitoriaus_id = $_POST['korepetitoriaus_id'];
$profilio_miestas = $_POST['profilio_miestas'];
$profilio_adresas = $_POST['profilio_adresas'];
$profilio_mokymo_tipas = $_POST['profilio_mokymo_tipas'];
$profilio_val = $_POST['profilio_val'];
$profilio_aprasymas = $_POST['profilio_aprasymas'];
$profilio_istaiga = $_POST['profilio_istaiga'];
$profilio_dalykai_istaigoj = $_POST['profilio_dalykai_istaigoj'];
$profilio_prieinamumas = json_decode($_POST['profilio_prieinamumas']);
$profilio_dalykai = json_decode($_POST['profilio_dalykai']);

$conn = new mysqli("localhost", "root", "", "bakalauras");
mysqli_set_charset($conn,"utf8mb4");

// Check for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert the data into the database
$sql = "INSERT INTO korepetitorius_profilis (`korepetitoriaus_id`, `profilio_miestas`, `profilio_adresas`, `profilio_mokymo_tipas`, `profilio_val`, `profilio_aprasymas`, `profilio_istaiga`, `profilio_dalykai_istaigoj`, `profilio_prieinamumas`, `profilio_dalykai`) VALUES ('$korepetitoriaus_id', '$profilio_miestas', '$profilio_adresas', '$profilio_mokymo_tipas', '$profilio_val', '$profilio_aprasymas', '$profilio_istaiga', '$profilio_dalykai_istaigoj', '".json_encode($profilio_prieinamumas)."', '".json_encode($profilio_dalykai)."')";

if ($conn->query($sql) === TRUE) {
    echo "Profilis sukurtas sėkmingai!";
} else {
    echo "Klaida! Jūs jau turite profilį!";
}

// Close the database connection
$conn->close();

?>