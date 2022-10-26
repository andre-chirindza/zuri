<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>welcome</title>
  <link rel="stylesheet" href="assets/style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>
</head>

<body>
  <?php 
    session_start();
    $username = "";
    if (isset($_SESSION['login_file'])) {
      $username = $_SESSION['login_file']['username'];
    } else {
      header('Location: https://localhost/zuri/userAuthMySQL/forms/login.html');
      exit;
    }
    $display = isset($_SESSION['error']) ? true : false;
  ?>
  <!-- Image and text -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light clearfix">
    <a class="navbar-brand" href="#">
      <h2>ZURI-PHP</h2>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav d-flex">
        <li class="nav-item">
          <a class="nav-link" href="php/logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container-fluid justify-content-center">
    <h1>
      Welcome to Zuri Authentication
      <span class="info">
          <?php echo $username ?>
      </span>
    </h1>
    <div>
      <?php
      if ($display) {
        include_once "./php/helpers.php";
        alert_with_timeout_generator($_SESSION['error']['type'], $_SESSION['error']['message']);
        unset($_SESSION['error']);
      }
      ?>
    </div>
    <form class="d-flex justify-content-center" action="php/action.php" method="GET">
      <button class="btn btn-primary" name="all" type="submit" id="all">
        Show All Users
      </button>
    </form>

  </div>

</body>

</html>