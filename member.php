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
$org = mysqli_real_escape_string($link, $_REQUEST['org']);
$vet = mysqli_real_escape_string($link, $_REQUEST['vet']);

$sql = "INSERT INTO donor (memID, fname, lname, age, totaldonations, org, vet)
        VALUES (0, '$fname', '$lname', '$age', 0, '$org', '$vet')
        UPDATE donor
        SET memID = SELECT FLOOR(RAND()*(99999-1+1))+1
        WHERE memID = 0
        UPDATE donor
        SET totaldonations = SUM(donation.amount)
        WHERE donation.memID = donor.memID";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
