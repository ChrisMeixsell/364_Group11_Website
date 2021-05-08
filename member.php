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

$fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
$lname = mysqli_real_escape_string($conn, $_REQUEST['lname']);
$age = mysqli_real_escape_string($conn, $_REQUEST['age']);
$org = mysqli_real_escape_string($conn, $_REQUEST['org']);
$vet = mysqli_real_escape_string($conn, $_REQUEST['vet']);

$sql = "INSERT INTO Donor (MemID, FirstName, LastName, Age, TotalDonations, OrgName, Veteran)
        VALUES (0, '$fname', '$lname', '$age', 0, '$org', '$vet')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
