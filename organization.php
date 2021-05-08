<?php
//Code taken from W3 schools, editted by C2C Herrington and C2C Meixsell
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

$orgType = mysqli_real_escape_string($conn, $_REQUEST['orgType']);
$orgname = mysqli_real_escape_string($conn, $_REQUEST['orgname']);
$description = mysqli_real_escape_string($conn, $_REQUEST['description']);

$sql = "INSERT INTO Organization (OrgType, OrgName, Description, TotalOrgDonation)
        VALUES ('$orgType', '$orgname', '$desc', 0)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
