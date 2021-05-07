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

$orgType = mysqli_real_escape_string($link, $_REQUEST['orgType']);
$orgname = mysqli_real_escape_string($link, $_REQUEST['orgname']);
$description = mysqli_real_escape_string($link, $_REQUEST['description']);

$sql = "INSERT INTO organization (orgType, orgname, description, totalorgdonations)
        VALUES ('$orgType', '$orgname', '$desc', 0)
        UPDATE organization
        SET totalorgdonations = SELECT SUM(
        WHERE orgname = $orgname;";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
