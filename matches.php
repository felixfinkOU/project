<?php include 'header.php';?>

    <h1>Matches</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>MatchID</th>
      <th>HomeTeam</th>
      <th>AwayTeam</th>
      <th>HomeTeamGoals</th>
      <th>AwayTeamGoals</th>
      <th>Matchday</th>
    </tr>
  </thead>
  <tbody>
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

if (isset($_GET['Team'])) {
    $var = $_GET['Team'];
    $sql = "SELECT * from Matches where HomeTeam='$var' OR AwayTeam='$var'";
}
else {
    $sql = "SELECT * from Matches";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["MatchID"]?></td>
    <td><?=$row["HomeTeam"]?></td>
    <td><?=$row["AwayTeam"]?></td>
    <td><?=$row["HomeTeamGoals"]?></td>
    <td><?=$row["AwayTeamGoals"]?></td>
    <td><?=$row["Matchday"]?></td>
    <td>
      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editMatch<?=$row["MatchID"]?>">
        Edit
      </button>
      <div class="modal fade" id="editMatch<?=$row["MatchID"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editMatch<?=$row["MatchID"]?>Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="editMatch<?=$row["MatchID"]?>Label">Edit Match</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="matches-edit-save.php">
                <div class="mb-3">
                  <label for="editMatch<?=$row["MatchID"]?>HomeTeam" class="form-label">Home Team</label>
                  <select class="form-select" id="editMatch<?=$row["MatchID"]?>HomeTeam" aria-label="Select HomeTeam" name="iHomeTeam" value="<?=$row['HomeTeam']?>">
                  <?php
                      $homeTeamSql = "select * from Teams order by Club";
                      $homeTeamResult = $conn->query($homeTeamSql);
                      while($homeTeamRow = $homeTeamResult->fetch_assoc()) {
                        if ($homeTeamRow['Club'] == $row['HomeTeam']) {
                          $selText = " selected";
                        } else {
                          $selText = "";
                        }
                  ?>
                    <option value="<?=$homeTeamRow['Club']?>"<?=$selText?>><?=$homeTeamRow['Club']?></option>
                  <?php
                      }
                  ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="editMatch<?=$row["MatchID"]?>AwayTeam" class="form-label">Away Team</label>
                  <select class="form-select" id="editMatch<?=$row["MatchID"]?>AwayTeam" aria-label="Select AwayTeam" name="iAwayTeam" value="<?=$row['AwayTeam']?>">
                  <?php
                      $awayTeamSql = "select * from Teams order by Club";
                      $awayTeamResult = $conn->query($awayTeamSql);
                      while($awayTeamRow = $awayTeamResult->fetch_assoc()) {
                        if ($awayTeamRow['Club'] == $row['AwayTeam']) {
                          $selText = " selected";
                        } else {
                          $selText = "";
                        }
                  ?>
                    <option value="<?=$awayTeamRow['Club']?>"<?=$selText?>><?=$awayTeamRow['Club']?></option>
                  <?php
                      }
                  ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="editMatch<?=$row["MatchID"]?>HomeTeamGoals" class="form-label">HomeTeamGoals</label>
                  <input type="text" class="form-control" id="editMatch<?=$row["MatchID"]?>HomeTeamGoals" aria-describedby="editMatch<?=$row["MatchID"]?>Help" name="iHomeTeamGoals" value="<?=$row['HomeTeamGoals']?>">
                  <div id="editMatch<?=$row["MatchID"]?>Help" class="form-text">Enter the Home Team's Goals.</div>
                </div>
                <div class="mb-3">
                  <label for="editMatch<?=$row["MatchID"]?>AwayTeamGoals" class="form-label">AwayTeamGoals</label>
                  <input type="text" class="form-control" id="editMatch<?=$row["MatchID"]?>AwayTeamGoals" aria-describedby="editMatch<?=$row["MatchID"]?>Help" name="iAwayTeamGoals" value="<?=$row['AwayTeamGoals']?>">
                  <div id="editMatch<?=$row["MatchID"]?>Help" class="form-text">Enter the Away Team's Goals.</div>
                </div>
                <div class="mb-3">
                  <label for="editMatch<?=$row["MatchID"]?>Matchday" class="form-label">Matchday</label>
                  <input type="text" class="form-control" id="editMatch<?=$row["MatchID"]?>Matchday" aria-describedby="editMatch<?=$row["MatchID"]?>Help" name="iMatchday" value="<?=$row['Matchday']?>">
                  <div id="editMatch<?=$row["MatchID"]?>Help" class="form-text">Enter the Matchday.</div>
                </div>
                <input type="hidden" name="iMatchID" value="<?=$row['MatchID']?>">
                <input type="hidden" name="saveType" value="Edit">
                <input type="submit" class="btn btn-primary" value="Submit">
              </form>
            </div> 
          </div>
        </div>
      </div>
    </td>
    <td>
      <form method="post" action="matches-delete-save.php">
        <input type="hidden" name="iMatchID" value="<?=$row["MatchID"]?>" />
        <input type="submit" value="Delete" class="btn" />
      </form>
    </td>
  </tr>
<?php
  }
} else {
  echo "0 results";
}
?>
  </tbody>
    </table>

<!-- Go-back button -->
<a class="btn btn-primary" type="button" href="index.php">Go Back</a>

<!-- Add button -->
<div>
  <button type="button" style="color:white;background-color:green;" class="btn" data-bs-toggle="modal" data-bs-target="#addMatch">
    Add new
  </button>
  <div class="modal fade" id="addMatch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addMatchLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addMatchLabel">Add Match</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="matches-add-save.php">
            <div class="mb-3">
              <label for="HomeTeam" class="form-label">HomeTeam</label>
              <select class="form-select" aria-label="Select HomeTeam" id="HomeTeam" name="iHomeTeam">
              <?php
                  $homeTeamSql = "select * from Teams order by Club";
                  $homeTeamResult = $conn->query($homeTeamSql);
                  while($homeTeamRow = $homeTeamResult->fetch_assoc()) {
                    if ($homeTeamRow['Club'] == $row['Club']) {
                      $selText = " selected";
                    } else {
                      $selText = "";
                    }
              ?>
                <option value="<?=$homeTeamRow['Club']?>"<?=$selText?>><?=$homeTeamRow['Club']?></option>
              <?php
                  }
              ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="AwayTeam" class="form-label">AwayTeam</label>
              <select class="form-select" aria-label="Select AwayTeam" id="AwayTeam" name="iAwayTeam">
              <?php
                  $awayTeamSql = "select * from Teams order by Club";
                  $awayTeamResult = $conn->query($awayTeamSql);
                  while($awayTeamRow = $awayTeamResult->fetch_assoc()) {
                    if ($awayTeamRow['Club'] == $row['Club']) {
                      $selText = " selected";
                    } else {
                      $selText = "";
                    }
              ?>
                <option value="<?=$awayTeamRow['Club']?>"<?=$selText?>><?=$awayTeamRow['Club']?></option>
              <?php
                  }
              ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="HomeTeamGoals" class="form-label">Home Team Goals</label>
              <input type="text" class="form-control" id="HomeTeamGoals" aria-describedby="homeTeamGoalsHelp" name="iHomeTeamGoals">
              <div id="homeTeamGoalsHelp" class="form-text">Enter the how many goals the home team scored.</div>
            </div>
            <div class="mb-3">
              <label for="AwayTeamGoals" class="form-label">Away Team Goals</label>
              <input type="text" class="form-control" id="AwayTeamGoals" aria-describedby="awayTeamGoalsHelp" name="iAwayTeamGoals">
              <div id="awayTeamGoalsHelp" class="form-text">Enter the how many goals the away twam scored.</div>
            </div>
            <div class="mb-3">
              <label for="Matchday" class="form-label">Matchday</label>
              <input type="text" class="form-control" id="Matchday" aria-describedby="matchdayHelp" name="iMatchday">
              <div id="matchdayHelp" class="form-text">Enter the matchday of the game. (The week the game took place)</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
$conn->close();
?>

<?php include 'footer.php';?>