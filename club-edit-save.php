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
$iStandings = $_POST['iStandings'];

$sql = "UPDATE Teams set Standings=? where Club=?";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $iStandings, $_POST['iClub']);
    $stmt->execute();
?>
    
    <h1>Edit Club</h1>
<div class="alert alert-success" role="alert">
  Club edited.
</div>
    <a href="index.php" class="btn btn-primary">Go back</a>

<?php include 'footer.php';?>