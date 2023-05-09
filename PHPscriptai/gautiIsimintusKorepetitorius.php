<?php
$conn = new mysqli("localhost", "root", "", "bakalauras");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$mokinio_id = $_GET['mokinio_id'];

$sql = "SELECT k.pilnas_korepetitoriaus_vardas, k.korepetitoriaus_nuotrauka, p.profilio_dalykai, p.profilio_val, p.korepetitoriaus_id, p.profilio_id, p.profilio_mokymo_tipas, AVG(a.ivertinimas) AS average_ivertinimas
FROM korepetitorius k
JOIN korepetitorius_profilis p ON k.korepetitoriaus_id = p.korepetitoriaus_id
LEFT JOIN atsiliepimas a ON k.korepetitoriaus_id = a.korepetitoriaus_id
JOIN isimena ON isimena.profilio_id = p.profilio_id
WHERE isimena.mokinio_id = '$mokinio_id'
GROUP BY k.pilnas_korepetitoriaus_vardas, p.profilio_dalykai, p.profilio_val, p.korepetitoriaus_id, p.profilio_mokymo_tipas";

$result = mysqli_query($conn, $sql);

if ($result === false) {
    die("Query failed: " . mysqli_error($conn));
}

$json_data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $row['profilio_dalykai'] = json_decode($row['profilio_dalykai']);
    $json_data[] = $row;
}

if (count($json_data) > 0) {
    echo json_encode($json_data);
} else {
    echo "0 results";
}
$conn->close();
?>
