<?php

$gavejo_id = $_POST['gavejo_id'];
$siuntejo_id = $_POST['siuntejo_id'];
$tekstas_zinutes = $_POST['tekstas_zinutes'];
$laikas_zinutes = $_POST['laikas_zinutes'];

$conn = new mysqli("localhost", "root", "", "bakalauras");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO zinutes (`gavejo_id`, `siuntejo_id`, `tekstas_zinutes`, `laikas_zinutes`) VALUES ('$gavejo_id', '$siuntejo_id', '$tekstas_zinutes', '$laikas_zinutes')";

if ($conn->query($sql) === TRUE) {
    echo "Zinute iterpta";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>