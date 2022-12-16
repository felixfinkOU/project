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
$iName = $_POST['iName'];
$iAbbreviation = $_POST['iAbbreviation'];

$sql = "insert into Leagues (Name, Abbreviation) value (?,?)";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $iName, $iAbbreviation);
    $stmt->execute();
?>
    
    <h1>Add League</h1>
<div class="alert alert-success" role="alert">
  New league added.
</div>
<!-- Go Back Button -->
  <form method="get" action="teams.php">
    <input type="hidden" name="leagueAbb" value=<?=$iAbbreviation?>>                 
    <input type="submit" class="btn btn-primary" value="Go to League">
  </form>    
<?php include 'footer.php';?>