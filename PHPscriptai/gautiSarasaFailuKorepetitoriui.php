<?php
$conn = new mysqli("localhost", "root", "", "bakalauras");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$korepetitoriaus_id = $_GET['korepetitoriaus_id'];

$sql = "SELECT pm.failas, pm.pam_mok_id, pm.pavadinimas, pm.laikas_issiusta, m.pilnas_mokinio_vardas, pm.pam_mok_id
FROM pamoku_medziaga pm
JOIN mokinys m ON pm.mokinio_id = m.mokinio_id
WHERE pm.korepetitoriaus_id = '$korepetitoriaus_id'";

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