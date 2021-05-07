<?php
//Code taken from W3 schools, editted by C2C Herrington
$servername = "localhost";
$username = "student";
$password = "CompSci364";
$dbname = "student";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$memID = mysqli_real_escape_string($conn, $_REQUEST['memID']);
$exhibName = mysqli_real_escape_string($conn, $_REQUEST['exhibName']);
$donation = mysqli_real_escape_string($conn, $_REQUEST['donation']);

$sql = "INSERT INTO Donation (MemID, ExhibitName, Amount)
        VALUES ('$memID', '$exhibName', '$donation')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
