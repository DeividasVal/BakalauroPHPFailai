<?php
$conn = new mysqli("localhost", "root", "", "bakalauras");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$mokinio_id = $_GET['mokinio_id'];

$sql = "SELECT k.profilio_val, kp.pilnas_korepetitoriaus_vardas, k.profilio_adresas, k.profilio_dalykai, u.id, kp.korepetitoriaus_id, kp.korepetitoriaus_nuotrauka, k.profilio_id
        FROM uzklausos u 
        JOIN korepetitorius kp ON u.korepetitoriaus_id = kp.korepetitoriaus_id 
        JOIN korepetitorius_profilis k ON kp.korepetitoriaus_id = k.korepetitoriaus_id 
        WHERE u.mokinio_id = '$mokinio_id' AND u.būsena = 1";

$result = mysqli_query($conn, $sql);

if ($result === false) {
    die("Query failed: " . mysqli_error($conn));
}

$json_data = array();

while($row = mysqli_fetch_assoc($result))
{
    $dalykai = json_decode($row['profilio_dalykai']);
    if (json_last_error() === JSON_ERROR_NONE) {
        $row['profilio_dalykai'] = $dalykai;
    } else {
        $row['profilio_dalykai'] = array();
    }
    $json_data[] = $row;
}

if (count($json_data) > 0) {
    echo json_encode($json_data);
} else {
    echo "0 results";
}
$conn->close();
?>