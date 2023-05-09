<?php

// Get the data from the POST request
$pam_mok_id = $_POST['pam_mok_id'];

$conn = new mysqli("localhost", "root", "", "bakalauras");

// Check for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the filename from the database
$sql = "SELECT failas FROM pamoku_medziaga WHERE pam_mok_id = '$pam_mok_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$filename = $row['failas'];

// Delete the file from the server
if (unlink($filename)) {
    // File deleted successfully
} else {
    // Failed to delete file
}

// Insert the data into the database
$sql = "DELETE FROM pamoku_medziaga WHERE pam_mok_id = '$pam_mok_id'";

if ($conn->query($sql) === TRUE) {
    echo "Failas pašalintas sėkmingai!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

?>