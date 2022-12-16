<?php include 'header.php';?>

<h1>Create a New League</h1>

<img src="img/league.jpg" class="img-fluid" alt="..." width="100%">

<!-- Add button -->
<div>
  <button type="button" style="color:white;background-color:green;" class="btn" data-bs-toggle="modal" data-bs-target="#addLeague">
    Add new
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
