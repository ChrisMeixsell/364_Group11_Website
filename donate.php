<?php
//Code taken from W3 schools, editted by C2C Herrington
$servername = "PostgreSQL";
$username = "student";
$password = "CompSci364";
$dbname = "WebAppWIIMuseum";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$memID = mysqli_real_escape_string($link, $_REQUEST['memID']);
$exhibName = mysqli_real_escape_string($link, $_REQUEST['exhibName']);
$donation = mysqli_real_escape_string($link, $_REQUEST['donation']);

$sql = "INSERT INTO donation (memID, exhibName, donation)
        VALUES ('$memID', '$exhibName', '$donation')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
