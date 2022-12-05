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

$sql = "delete from Teams where Club=?";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['iClub']);
    $stmt->execute();
?>
    
    <h1>Delete Club</h1>
<div class="alert alert-success" role="alert">
  Club deleted.
</div>
    <a href="index.php" class="btn btn-primary">Go back</a>
    
<?php include 'footer.php';?>