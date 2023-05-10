<?php
header('Content-Type: text/html; charset=utf-8');

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
$pilnas_korepetitoriaus_vardas = $_POST['pilnas_korepetitoriaus_vardas'];
$korepetitoriaus_vartotojo_vardas =$_POST['korepetitoriaus_vartotojo_vardas'];
$korepetitoriaus_slaptazodis = $_POST['korepetitoriaus_slaptazodis'];
$korepetitoriaus_el_pastas =$_POST['korepetitoriaus_el_pastas'];

$conn = new mysqli("localhost", "root", "", "bakalauras");
mysqli_set_charset($conn,"utf8mb4");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE korepetitorius_profilis SET profilio_miestas = '$profilio_miestas', profilio_adresas = '$profilio_adresas',
profilio_mokymo_tipas = '$profilio_mokymo_tipas', profilio_val = '$profilio_val', profilio_aprasymas = '$profilio_aprasymas',
profilio_istaiga = '$profilio_istaiga', profilio_dalykai_istaigoj = '$profilio_dalykai_istaigoj',
profilio_prieinamumas = '".json_encode($profilio_prieinamumas)."', profilio_dalykai = '".json_encode($profilio_dalykai)."' WHERE korepetitoriaus_id = '$korepetitoriaus_id'";

$sql2 = "UPDATE korepetitorius SET pilnas_korepetitoriaus_vardas = '$pilnas_korepetitoriaus_vardas', korepetitoriaus_vartotojo_vardas = '$korepetitoriaus_vartotojo_vardas',
korepetitoriaus_slaptazodis = '$korepetitoriaus_slaptazodis', korepetitoriaus_el_pastas = '$korepetitoriaus_el_pastas' WHERE korepetitoriaus_id = '$korepetitoriaus_id'";


if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
    echo "Duomenys atnaujinti sėkmingai!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>