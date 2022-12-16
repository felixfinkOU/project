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

$sql = "delete from Leagues where Abbreviation=?";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_GET['iLeague']);
    $stmt->execute();
?>
    
    <h1>Unfollow League</h1>
<div class="alert alert-success" role="alert">
  League unfollowed.
</div>
    <a href="index.php" class="btn btn-primary" style="color:white;background-color:red;">Go back</a>
    
<?php include 'footer.php';?>