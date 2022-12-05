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

  $sql = "delete from Matches where MatchID=?";
  //echo $sql;
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $_POST['iMatchID']);
      $stmt->execute();
  ?>
      
      <h1>Delete Match</h1>
  <div class="alert alert-success" role="alert">
    Match deleted.
  </div>

      <a href="matches.php" class="btn btn-primary">Go back</a>
      
  <?php include 'footer.php';?>