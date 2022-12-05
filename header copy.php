<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg" style="background-color:green;">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Soccer</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">Homepage</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Leagues
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="pl_teams.php">Premier League</a></li>
                <li><a class="dropdown-item" href="pl_teams.html">OU Intramural Soccer</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="soccer.html">Create New League</a></li>
              </ul>
            </li>
            <li>
              <form action="soccer_players.php" method="post">
                <input type="text" name="position">
              <input type="submit">
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>