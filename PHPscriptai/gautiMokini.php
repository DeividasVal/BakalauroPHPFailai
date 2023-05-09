<?php
$conn = mysqli_connect("localhost", "root", "", "bakalauras");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the specific row based on the given ID
$mokinio_vartotojo_vardas = $_GET['mokinio_vartotojo_vardas'];
$sql = "SELECT * FROM mokinys WHERE mokinio_vartotojo_vardas = '$mokinio_vartotojo_vardas'";
$result = mysqli_query($conn, $sql);

if (!$result) {
  die("Error: " . mysqli_error($conn));
}

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
  // Output the data in JSON format
  $row = mysqli_fetch_assoc($result);
  echo json_encode($row);
} else {
  echo "No data found";
}

mysqli_close($conn);
?>