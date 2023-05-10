<?php

$korepetitoriaus_id = $_POST['korepetitoriaus_id'];
$profilio_id = $_POST['profilio_id'];
$mokinio_id = $_POST['mokinio_id'];
$atsiliepimo_tekstas = $_POST['atsiliepimo_tekstas'];
$ivertinimas = $_POST['ivertinimas'];
$laikas = $_POST['laikas'];

$conn = new mysqli("localhost", "root", "", "bakalauras");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM atsiliepimas WHERE mokinio_id = '$mokinio_id' AND korepetitoriaus_id = '$korepetitoriaus_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Šiam korepetitoriui jau parašėte atsiliepimą!";
} else {
    $sql = "INSERT INTO atsiliepimas (`korepetitoriaus_id`, `profilio_id`, `mokinio_id`, `atsiliepimo_tekstas`, `ivertinimas`, `laikas`) VALUES ('$korepetitoriaus_id', '$profilio_id', '$mokinio_id', '$atsiliepimo_tekstas', '$ivertinimas', '$laikas')";
    if ($conn->query($sql) === TRUE) {
        echo "Atsiliepimas sėkmingai paskelbtas!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>
