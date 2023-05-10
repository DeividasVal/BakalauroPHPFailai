<?php
$conn = new mysqli("localhost", "root", "", "bakalauras");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$korepetitoriaus_id = $_GET['korepetitoriaus_id'];

$sql = "SELECT DISTINCT mokinys.pilnas_mokinio_vardas, mokinys.mokinio_nuotrauka, atsiliepimas.ivertinimas, atsiliepimas.laikas, atsiliepimas.atsiliepimo_tekstas, atsiliepimas.korepetitoriaus_id, atsiliepimas.profilio_id, mokinys.mokinio_id FROM atsiliepimas JOIN mokinys ON atsiliepimas.mokinio_id = mokinys.mokinio_id JOIN korepetitorius ON atsiliepimas.korepetitoriaus_id = '$korepetitoriaus_id'";

$result = mysqli_query($conn, $sql);

if ($result === false) {
    die("Query failed: " . mysqli_error($conn));
}

$json_data = array();

while($row = mysqli_fetch_assoc($result))
{
    $json_data[] = $row;
}

if (count($json_data) > 0) {
    echo json_encode($json_data);
} else {
    echo "0 results";
}
$conn->close();
?>
