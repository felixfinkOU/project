<?php include 'header.php';?>
    
<?php
$servername = "localhost";
$username = "felixfin_user2";
$password = "O-,GXdw4e3QG";
$dbname = "felixfin_homework3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$iCoachID = $_POST['iCoachID'];
$iFirstName = $_POST['iFirstName'];
$iLastName = $_POST['iLastName'];
$iClub = $_POST['iClub'];

$sql = "UPDATE SoccerManagers set FirstName=?, LastName=?, Club=? where CoachID=?";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $iFirstName, $iLastName, $iClub, $iCoachID);
    $stmt->execute();
?>
    
    <h1>Edit Manager</h1>
<div class="alert alert-success" role="alert">
  Manager edited.
</div>

<a href="soccer_managers.php" class="btn btn-primary">Go back</a>
    
<?php include 'footer.php';?>