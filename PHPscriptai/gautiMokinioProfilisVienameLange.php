<?php
    $mokinio_id = $_GET['mokinio_id'];

	$conn = new mysqli("localhost", "root", "", "bakalauras");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM mokinys WHERE mokinio_id = '$mokinio_id'";
;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
		$data[] = $row;
        echo json_encode($row);
    } else {
        echo "0 results";
    }
    $conn->close();
?>