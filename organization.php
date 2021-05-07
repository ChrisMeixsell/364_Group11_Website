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

$type = mysqli_real_escape_string($link, $_REQUEST['type']);
$orgname = mysqli_real_escape_string($link, $_REQUEST['orgname']);
$desc = mysqli_real_escape_string($link, $_REQUEST['desc']);

$sql = "INSERT INTO member (type, orgname, desc)
        VALUES ('$type', '$orgname', '$desc')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
