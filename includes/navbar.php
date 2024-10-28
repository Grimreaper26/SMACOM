<?php
session_start();
require_once("code.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barangay Sulong</title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <style>
    .navbar-brand {
      text-align: center;
      font-size: large;
      font-family: 'Open Sans', sans-serif;
    }

    .small-text {
      font-size: 0.75em;
      font-weight: normal;
    }

    body {
      padding-top: 150px;
    }

    .headerlogo {
      height: 110px;
      width: 110px;
    }
  </style>
</head>

<body>
  <div style="background-color: #F2F4F7;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container-fluid">
              <img class="headerlogo" src="/Logo/headerlogo.png" alt="Alimodian">
              <a class="navbar-brand ms-4" href="#">BARANGAY SULONG <br> <span class="small-text">ALIMODIAN, ILOILO</span></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="sklanding.php">SK Federation</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#about">About Us</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#services">Certificate</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#rented">Rent</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#annoucement">Announcement</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#news">News</a>
                  </li>
                  <li class="nav-item">
                    <?php
                    if (isset($_SESSION['userid'])) {
                      $userid = $_SESSION['userid'];
                      $sql = "SELECT Firstname FROM residentrecord WHERE id=:uid";
                      $query = $dbh->prepare($sql);
                      $query->bindParam(':uid', $userid, PDO::PARAM_STR);
                      $query->execute();
                      $result = $query->fetch(PDO::FETCH_OBJ);
                    }
                    ?>


                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>

                      <a class="nav-link" href="profile.php?id=<?php echo htmlentities($_SESSION['userid']); ?>">Profile</a>
                  <li class="nav-item">
                    <a class="nav-link " href="logout_user.php">Logout</a>
                  </li>
                <?php else: ?>
                  <a class="nav-link" href="login_user.php">Login</a>
                <?php endif; ?>
                </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</body>

</html>