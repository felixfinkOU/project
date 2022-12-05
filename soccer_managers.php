<?php include 'header.php';?>

    <h1>Managers</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>CoachID</th>
      <th>FirstName</th>
      <th>LastName</th>
      <th>Club</th>
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

$sql = "SELECT * from SoccerManagers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["CoachID"]?></td>
    <td><?=$row["FirstName"]?></td>
    <td><?=$row["LastName"]?></td>
    <td><?=$row["Club"]?></td>
    <td>
      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editManager<?=$row["CoachID"]?>">
        Edit
      </button>
      <div class="modal fade" id="editManager<?=$row["CoachID"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editManager<?=$row["CoachID"]?>Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="editManager<?=$row["CoachID"]?>Label">Edit Manager</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="soccer_managers-edit-save.php">
                <div class="mb-3">
                  <label for="editManager<?=$row["CoachID"]?>FirstName" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="editManager<?=$row["CoachID"]?>FirstName" aria-describedby="editManager<?=$row["CoachID"]?>Help" name="iFirstName" value="<?=$row['FirstName']?>">
                  <div id="editManager<?=$row["CoachID"]?>Help" class="form-text">Enter the Managers's First Name.</div>
                </div>
                <div class="mb-3">
                  <label for="editManager<?=$row["CoachID"]?>LastName" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="editManager<?=$row["CoachID"]?>LastName" aria-describedby="editManager<?=$row["CoachID"]?>Help" name="iLastName" value="<?=$row['LastName']?>">
                  <div id="editManager<?=$row["CoachID"]?>Help" class="form-text">Enter the Managers's Last Name.</div>
                </div>
                <div class="mb-3">
                  <label for="editManager<?=$row["CoachID"]?>Club" class="form-label">Club</label>
                  <select class="form-select" id="editManager<?=$row["CoachID"]?>Club" aria-label="Select Club" name="iClub" value="<?=$row['Club']?>">
                  <?php
                      $clubSql = "select * from Teams order by Club";
                      $clubResult = $conn->query($clubSql);
                      while($clubRow = $clubResult->fetch_assoc()) {
                        if ($clubRow['Club'] == $row['Club']) {
                          $selText = " selected";
                        } else {
                          $selText = "";
                        }
                  ?>
                    <option value="<?=$clubRow['Club']?>"<?=$selText?>><?=$clubRow['Club']?></option>
                  <?php
                      }
                  ?>
                  </select>
                </div>
                <input type="hidden" name="iCoachID" value="<?=$row['CoachID']?>">
                <input type="hidden" name="saveType" value="Edit">
                <input type="submit" class="btn btn-primary" value="Submit">
              </form>
            </div>
          </div>
        </div>
      </div>
    </td>
    <td>
      <form method="post" action="soccer_managers-delete-save.php">
        <input type="hidden" name="iCoachID" value="<?=$row["CoachID"]?>" />
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

<!-- Go-back button  -->
<a class="btn btn-primary" type="button" href="index.php">Go Back</a>

<!-- Add button -->
<div>
  <button type="button" style="color:white;background-color:green;" class="btn" data-bs-toggle="modal" data-bs-target="#addManager">
    Add new
  </button>
  <div class="modal fade" id="addManager" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addManagerLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addManagerLabel">Add Manager</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="soccer_managers-add-save.php">
            <div class="mb-3">
              <label for="FirstName" class="form-label">First Name</label>
              <input type="text" class="form-control" id="FirstName" aria-describedby="firstNameHelp" name="iFirstName">
              <div id="firstNameHelp" class="form-text">Enter the first name of the manager.</div>
            </div>
            <div class="mb-3">
              <label for="LastName" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="LastName" aria-describedby="lastNameHelp" name="iLastName">
              <div id="lastNameHelp" class="form-text">Enter the last name of the manager.</div>
            </div>
            <div class="mb-3">
              <label for="editManager<?=$row["CoachID"]?>Club" class="form-label">Club</label>
              <select class="form-select" id="editManager<?=$row["CoachID"]?>Club" aria-label="Select Club" name="iClub" value="<?=$row['Club']?>">
              <?php
                  $clubSql = "select * from Teams order by Club";
                  $clubResult = $conn->query($clubSql);
                  while($clubRow = $clubResult->fetch_assoc()) {
                    if ($clubRow['Club'] == $row['Club']) {
                      $selText = " selected";
                    } else {
                      $selText = "";
                    }
              ?>
                <option value="<?=$clubRow['Club']?>"<?=$selText?>><?=$clubRow['Club']?></option>
              <?php
                  }
              ?>
              </select>
            </div>
            <input type="hidden" name="saveType" value="Add">
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