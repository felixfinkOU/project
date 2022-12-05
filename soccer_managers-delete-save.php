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

$sql = "delete from SoccerManagers where CoachID=?";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_POST['iCoachID']);
    $stmt->execute();
?>
    
    <h1>Delete Manager</h1>
<div class="alert alert-success" role="alert">
  Manager deleted.
</div>

    <a href="soccer_managers.php" class="btn btn-primary">Go back</a>
    
<?php include 'footer.php';?>