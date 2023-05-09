<?php
$conn = new mysqli("localhost", "root", "", "bakalauras");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$mokinio_id = $_GET['mokinio_id'];

$sql = "SELECT pm.failas, pm.pam_mok_id, pm.pavadinimas, pm.laikas_issiusta, k.pilnas_korepetitoriaus_vardas
FROM pamoku_medziaga pm
JOIN korepetitorius k ON pm.korepetitoriaus_id = k.korepetitoriaus_id
WHERE pm.mokinio_id = '$mokinio_id'";

$result = mysqli_query($conn, $sql);

if ($result === false) {
    die("Query failed: " . mysqli_error($conn));
}

$json_data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $json_data[] = $row;
}

if (count($json_data) > 0) {
    echo json_encode($json_data);
} else {
    echo "0 results";
}
$conn->close();
?>