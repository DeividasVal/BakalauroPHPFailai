<?php
    $korepetitoriaus_id = $_GET['korepetitoriaus_id'];

	$conn = new mysqli("localhost", "root", "", "bakalauras");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT korepetitorius_profilis.*, korepetitorius.korepetitoriaus_nuotrauka, AVG(atsiliepimas.ivertinimas) as average_ivertinimas, COUNT(atsiliepimas.korepetitoriaus_id) as count_korepetitoriaus_id 
        FROM korepetitorius_profilis 
        LEFT JOIN atsiliepimas ON korepetitorius_profilis.korepetitoriaus_id = atsiliepimas.korepetitoriaus_id 
        LEFT JOIN korepetitorius ON korepetitorius_profilis.korepetitoriaus_id = korepetitorius.korepetitoriaus_id 
        WHERE korepetitorius_profilis.korepetitoriaus_id = $korepetitoriaus_id 
        GROUP BY korepetitorius_profilis.korepetitoriaus_id";
;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $row['profilio_prieinamumas'] = json_decode($row['profilio_prieinamumas']);
        $row['profilio_dalykai'] = json_decode($row['profilio_dalykai']);
    $data[] = $row;
        echo json_encode($row);
    } else {
        echo "0 results";
    }
    $conn->close();
?>