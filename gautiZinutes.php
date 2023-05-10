<?php
    $conn = new mysqli("localhost", "root", "", "bakalauras");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $gavejo_id = $_GET['gavejo_id'];
    $dabartinis_id = $_GET['dabartinis_id'];

    $sql = "SELECT * FROM zinutes WHERE (gavejo_id = '$gavejo_id' AND siuntejo_id = '$dabartinis_id') OR (gavejo_id = '$dabartinis_id' AND siuntejo_id = '$gavejo_id')";


    $result = mysqli_query($conn, $sql);

    if ($result === false) {
        die("Query failed: " . mysqli_error($conn));
    }
    
    $json_data = array();
    
    while($row = mysqli_fetch_assoc($result))
    {
        $json_data[] = $row;
    }

    echo json_encode($json_data);

    $conn->close();
?>
