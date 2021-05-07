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

$fname = mysqli_real_escape_string($link, $_REQUEST['fname']);
$lname = mysqli_real_escape_string($link, $_REQUEST['lname']);
$age = mysqli_real_escape_string($link, $_REQUEST['age']);
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
$exhibName = mysqli_real_escape_string($link, $_REQUEST['exhibName']);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);
$org = mysqli_real_escape_string($link, $_REQUEST['org']);
$vet = mysqli_real_escape_string($link, $_REQUEST['vet']);

$sql = "INSERT INTO member (fname, lname, age, phone, exhibName, address, org, vet)
        VALUES ('$fname', '$lname', '$age', '$phone', '$exhibName', '$address', '$org', '$vet')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
