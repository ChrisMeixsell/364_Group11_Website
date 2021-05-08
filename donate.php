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

$memID = mysqli_real_escape_string($conn, $_REQUEST['memID']);
$exhibName = mysqli_real_escape_string($conn, $_REQUEST['exhibName']);
$donation = mysqli_real_escape_string($conn, $_REQUEST['donation']);

$stmt = $conn->prepare("INSERT INTO Donation (MemID, ExhibitName, Amount)
        VALUES (?, ?, ?)");
$stmt->bind_param("isi",$memID,$exhibName,$donation); 
$stmt->execute();

$sql = "SELECT SUM(Amount) as Total, FirstName, LastName
	FROM Donation 
	INNER JOIN Donor On Donation.MemId = Donor.MemId
	Where Donor.MemId = '$memID'";
$result = mysqli_query($conn,$sql);
$row = $result->fetch_assoc();

  echo $row["FirstName"] . " " . $row["LastName"] . " has donated ". $row["Total"] . " in total";
  echo "<br>";

$sql = "SELECT SUM(Amount) as OrgTotal, OrgName  
	FROM Donation
	INNER JOIN Donor On Donation.MemId = Donor.MemId
	Where Donor.MemId = '$memID'";
$result = mysqli_query($conn,$sql);
$row = $result->fetch_assoc();
	

echo "Your organization, " . $row["OrgName"] . ", has donated " . $row["OrgTotal"] . " in total";
echo "<br>";

$sql = "SELECT SUM(Amount) as ExTotal FROM Donation WHERE ExhibitName = '$exhibName'";
$result = mysqli_query($conn,$sql);
$row = $result->fetch_assoc();

echo $exhibName . " has received " . $row["ExTotal"] . " in donations";

$stmt->close();
$conn->close();
?>
