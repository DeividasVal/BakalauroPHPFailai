<?php
    $korepetitoriaus_id = $_GET['korepetitoriaus_id'];

	$conn = new mysqli("localhost", "root", "", "bakalauras");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM korepetitorius INNER JOIN korepetitorius_profilis ON korepetitorius.korepetitoriaus_id = korepetitorius_profilis.korepetitoriaus_id WHERE korepetitorius.korepetitoriaus_id = '$korepetitoriaus_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $row['profilio_prieinamumas'] = json_decode($row['profilio_prieinamumas']);
    $data[] = $row;
        echo json_encode($row);
    } else {
        echo "0 results";
    }
    $conn->close();
?>