<?php include 'header.php';?>

<h1>Teams</h1>
<div>
  <a class="btn btn-primary" type="button" href="matches.php">Show Matches</a>
  <a class="btn btn-primary" type="button" href="soccer_managers.php">Show Managers</a>
  <a class="btn btn-primary" type="button" href="soccer_players.php">Show Players</a>
</div>
<br></br>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Club</th>
      <th>Standings</th>
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

$sql = "SELECT Club, Standings FROM Teams";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><a href="matches.php?Team=<?=$row["Club"]?>"><?=$row["Club"]?></a></td>
    <td><?=$row["Standings"]?></td>
    <td>
      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editClub<?=$row["Club"]?>">
        Edit
      </button>
      <div class="modal fade" id="editClub<?=$row["Club"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editClub<?=$row["Club"]?>Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="editClub<?=$row["Club"]?>Label">Edit Club</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="club-edit-save.php">
                <div class="mb-3">
                  <label for="editClub<?=$row["Club"]?>Name" class="form-label">Standings</label>
                  <input type="text" class="form-control" id="editClub<?=$row["Club"]?>Name" aria-describedby="editClub<?=$row["Club"]?>Help" name="iStandings" value="<?=$row['Standings']?>">
                  <div id="editClub<?=$row["Club"]?>Help" class="form-text">Enter the Club's current standings.</div>
                </div>
                <input type="hidden" name="iClub" value="<?=$row['Club']?>">
                <input type="hidden" name="saveType" value="Edit">
                <input type="submit" class="btn btn-primary" value="Submit">
              </form>
            </div>
          </div>
        </div>
      </div>
    </td>
    <td>
      <form method="post" action="club-delete-save.php">
        <input type="hidden" name="iClub" value="<?=$row["Club"]?>" />
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

<!-- Add button -->
<div>
  <button type="button" style="color:white;background-color:green;" class="btn" data-bs-toggle="modal" data-bs-target="#addClub">
    Add new
  </button>
  <div class="modal fade" id="addClub" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addClubLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addClubLabel">Add Club</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="club-add-save.php">
            <div class="mb-3">
              <label for="Club" class="form-label">Club Name</label>
              <input type="text" class="form-control" id="Club" aria-describedby="clubHelp" name="iClub">
              <div id="clubHelp" class="form-text">Enter the Club's name.</div>
            </div>
            <div class="mb-3">
              <label for="Standings" class="form-label">Club Standings</label>
              <input type="text" class="form-control" id="Standings" aria-describedby="standingsHelp" name="iStandings">
              <div id="standingsHelp" class="form-text">Enter the Club's current standing in the league.</div>
            </div>
            <input type="hidden" name="saveType" value="Add">
            <input type="submit" class="btn btn-primary" value="Submit">
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
