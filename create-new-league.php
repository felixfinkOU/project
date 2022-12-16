<?php include 'header.php';?>

<!-- Layout -->
<style>
    .container {
    position: relative;
    width: 100%;
}
.container .img {
    width: 100%;
    height: auto;
}
    .container .addLeagueButton {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: #555;
    color: white;
    font-size: 20px;
    padding: 12px 24px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}
.container .addLeagueButton:hover {
    background-color: black;
}
</style>

<!-- Add button -->
<div class="container" width="100%">
  <img src="img/league.jpg" alt="..." width="100%">
  <button type="button" class="addLeagueButton" data-bs-toggle="modal" data-bs-target="#addLeague">
    Create New League
  </button>
  <div class="modal fade" id="addLeague" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addLeagueLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addLeagueLabel">Add League</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="league-add-save.php">
            <div class="mb-3">
              <label for="Name" class="form-label">League Name</label>
              <input type="text" class="form-control" id="Name" aria-describedby="nameHelp" name="iName">
              <div id="nameHelp" class="form-text">Enter the League's name.</div>
            </div>
            <div class="mb-3">
              <label for="Abbreviation" class="form-label">League's Abbreviation</label>
              <input type="text" class="form-control" id="Abbreviation" aria-describedby="abbreviationHelp" name="iAbbreviation">
              <div id="abbreviationHelp" class="form-text">Enter the League's Abbreviation.</div>
            </div>
            <input type="hidden" name="saveType" value="Add">
            <input type="submit" class="btn btn-primary" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include 'footer.php';?>
