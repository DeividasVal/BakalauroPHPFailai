<?php

$mokinio_id = $_POST['mokinio_id'];
$korepetitoriaus_id = $_POST['korepetitoriaus_id'];
$būsena = $_POST['būsena'];

$conn = new mysqli("localhost", "root", "", "bakalauras");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM uzklausos WHERE mokinio_id='$mokinio_id' AND korepetitoriaus_id='$korepetitoriaus_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    echo "Jau išsiuntėte šiam korepetitoriui užklausą!";
} else {
    
    $sql = "INSERT INTO uzklausos (`mokinio_id`, `korepetitoriaus_id`, `būsena`) VALUES ('$mokinio_id', '$korepetitoriaus_id', '$būsena')";

    if ($conn->query($sql) === TRUE) {
        echo "Užklausa išsiųsta!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
