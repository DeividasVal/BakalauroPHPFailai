<?php
$conn = new mysqli("localhost", "root", "", "bakalauras");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$gavejo_id = $_GET['gavejo_id'];

$sql = "SELECT zinutes.zinutes_id, zinutes.gavejo_id, zinutes.siuntejo_id, zinutes.tekstas_zinutes, zinutes.laikas_zinutes, korepetitorius.pilnas_korepetitoriaus_vardas, korepetitorius.korepetitoriaus_nuotrauka
FROM zinutes 
LEFT JOIN korepetitorius ON korepetitorius.korepetitoriaus_id = zinutes.gavejo_id OR korepetitorius.korepetitoriaus_id = zinutes.siuntejo_id
WHERE zinutes.zinutes_id IN (
    SELECT MAX(zinutes.zinutes_id)
    FROM zinutes
    WHERE zinutes.gavejo_id = '$gavejo_id' OR zinutes.siuntejo_id = '$gavejo_id'
    GROUP BY 
        LEAST(zinutes.gavejo_id, zinutes.siuntejo_id), 
        GREATEST(zinutes.gavejo_id, zinutes.siuntejo_id)
)
ORDER BY zinutes.laikas_zinutes DESC;
";

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