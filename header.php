<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
    
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

      $sql = "SELECT * from Leagues";
      $result = $conn->query($sql);
    ?>
    <nav class="navbar navbar-expand-lg" style="background-color:green;">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><b>MySoccer</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!-- Return to Homepage -->
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Homepage</a>
            </li>
            <!-- Dropdown menu for different leagues -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Leagues
              </a>
              <ul class="dropdown-menu">
                <?php
                    while($leagueRow = $result->fetch_assoc()) {
                ?>
                  <li>
                    
                    <form method="get" action="teams.php">
                      <input type="hidden" name="leagueAbb" value="<?=$leagueRow["Abbreviation"]?>">                 
                      <input type="submit" class="dropdown-item" value="<?=$leagueRow["Name"]?>">
                    </form>
                  </li>
                <?php
                    }
                ?>
              </ul>
            </li>
            <!-- Create new league -->
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="create-new-league.php">Create New League</a>
            </li>
          </ul>
        </div>
        <!-- Search bar for teams -->
        <form action="soccer_teams.php" method="post">
          <input type="text" name="team" placeholder="Search for a Team">
          <input type="submit">
        </form>
      </div>
    </nav>
