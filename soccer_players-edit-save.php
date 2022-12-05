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

$iPlayerID = $_POST['iPlayerID'];
$iFirstName = $_POST['iFirstName'];
$iLastName = $_POST['iLastName'];
$iClub = $_POST['iClub'];
$iPosition = $_POST['iPosition'];
$iNationality = $_POST['iNationality'];


$sql = "UPDATE SoccerPlayer set FirstName=?, LastName=?, Club=?, Position=?, Nationality=? where PlayerID=?";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $iFirstName, $iLastName, $iClub, $iPosition, $iNationality, $iPlayerID);
    $stmt->execute();
?>
    
    <h1>Edit Player</h1>
<div class="alert alert-success" role="alert">
  Player edited.
</div>

<a href="soccer_players.php" class="btn btn-primary">Go back</a>
    
<?php include 'footer.php';?>