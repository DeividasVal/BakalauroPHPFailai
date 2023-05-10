<?php

$korepetitoriaus_id = $_POST['korepetitoriaus_id'];

$conn = new mysqli("localhost", "root", "", "bakalauras");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE isimena FROM isimena 
        JOIN atsiliepimas ON isimena.profilio_id = atsiliepimas.profilio_id 
        WHERE atsiliepimas.korepetitoriaus_id = $korepetitoriaus_id;";
$sql .= "DELETE FROM atsiliepimas WHERE korepetitoriaus_id = '$korepetitoriaus_id';"
$sql .= "DELETE FROM korepetitorius_profilis WHERE korepetitoriaus_id = '$korepetitoriaus_id';";
$sql .= "DELETE FROM korepetitorius WHERE korepetitoriaus_id = '$korepetitoriaus_id';";
$sql .= "DELETE FROM pamoku_medziaga WHERE korepetitoriaus_id = '$korepetitoriaus_id';";
$sql .= "DELETE FROM uzklausos WHERE korepetitoriaus_id = '$korepetitoriaus_id';";
$sql .= "DELETE FROM zinutes 
        WHERE gavejo_id = $korepetitoriaus_id OR siuntejo_id = $korepetitoriaus_id";

if ($conn->multi_query($sql) === TRUE) {
    echo "Profilis pašalintas sėkmingai!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>