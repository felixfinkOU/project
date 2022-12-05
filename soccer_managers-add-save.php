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
$iFirstName = $_POST['iFirstName'];
$iLastName = $_POST['iLastName'];
$iClub = $_POST['iClub'];

$sql = "insert into SoccerManagers (FirstName, LastName, Club) value (?,?,?)";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $iFirstName, $iLastName, $iClub);
    $stmt->execute();
?>
    
    <h1>Add Manager</h1>
<div class="alert alert-success" role="alert">
  New manager added.
</div>

    <a href="soccer_managers.php" class="btn btn-primary">Go back</a>
    
<?php include 'footer.php';?>