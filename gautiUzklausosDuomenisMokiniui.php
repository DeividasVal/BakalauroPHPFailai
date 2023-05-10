<?php
	$conn = new mysqli("localhost", "root", "", "bakalauras");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

	$mokinio_id = $_GET['mokinio_id'];

    $sql = "SELECT k.pilnas_korepetitoriaus_vardas, k.korepetitoriaus_nuotrauka, u.būsena, u.id FROM korepetitorius k JOIN uzklausos u ON k.korepetitoriaus_id = u.korepetitoriaus_id WHERE u.mokinio_id = '$mokinio_id'";

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