<?php
    include "db.php";

    session_start();

    $query 	= "SELECT * FROM tbl_204_carer_patient as cp 
    INNER JOIN tbl_204_users as u ON cp.patient_id = u.user_id
    INNER JOIN tbl_204_medicine_patient as mp ON cp.patient_id = mp.user_id
    INNER JOIN tbl_204_medicine as m ON mp.med_id = m.med_id
    WHERE cp.carer_id= " . $_SESSION["user_id"];

    $result = mysqli_query($connection, $query);

    if(!$result) {
      die("DB query failed.");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="js/script.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
        <title>Home Page</title>
    </head>
    <body id="home-page">
      <header class="sticky-top">
        <nav id="top-nav" class="navbar navbar-dark">
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end text-bg-dark bg-dark" tabindex="-1" id="offcanvasDarkNavbar">
            <div class="offcanvas-header">
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="user" id="hamburger-nav-user">
                <?php
                echo '<img class="user-photo" src="' . $_SESSION["user_img"] . '" alt="user">';
                echo '<span id="user-name">' . $_SESSION["user_name"] . '</span>';
                ?>
                </div> 
              <ul class="navbar-nav flex-column me-auto">
                <li class="nav-item">
                  <a class="nav-link top-nav-link active" href="#">Home Page</a>
                </li>
                <?php 
                if($_SESSION["user_type"] == "carer"){
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link top-nav-link" href="list.php">Patients</a>';
                    echo '</li>';
                }
                if($_SESSION["user_type"] == "patient"){
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link top-nav-link" href="list.php">Medicines</a>';
                    echo '</li>';
                }
                ?>
                <li class="nav-item">
                  <a class="nav-link top-nav-link" href="account.php"><img class="user-nav-img" src="images/patient.png">Account</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link top-nav-link" href="#"><img class="user-nav-smaller" src="images/settings.png">Settings</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link top-nav-link" href="logout.php"><img class="user-nav-img" src="images/logout.png">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div id="header-container">
          <a href="#" id="logo"></a>
          <div class="user" id="main-nav-user">
            <?php echo '<span id="user-name">' . $_SESSION["user_name"] . '</span>'; ?>
            <div class="dropdown-img">
            <?php echo '<img class="user-photo" src="' . $_SESSION["user_img"] . '" alt="user">'; ?>
              <div class="dropdown-img-content">
                  <ul class="navbar-nav me-auto user-nav">
                  <li class="user-nav-item">
                      <a class="user-nav-link" href="account.php"><img class="user-nav-img" src="images/patient.png">Account</a>
                    </li>
                    <li class="user-nav-item">
                      <a class="user-nav-link" href="#"><img class="user-nav-smaller" src="images/settings.png">Settings</a>
                    </li>
                    <li class="user-nav-item">
                      <a class="user-nav-link" href="logout.php"><img class="user-nav-img" src="images/logout.png">Logout</a>
                    </li>
                  </ul>
              </div>
            </div>
          </div>  
        </div>
        <div id="sm-h1"><span></span></div>
      </header>
      <main>
        <nav id="main-nav">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">Home Page</a>
            </li>
            <?php 
            if($_SESSION["user_type"] == "carer"){
                echo '<li class="nav-item">';
                echo '<a class="nav-link" aria-current="page" href="list.php">Patients</a>';
                echo '</li>';
            }
            if($_SESSION["user_type"] == "patient"){
                echo '<li class="nav-item">';
                echo '<a class="nav-link" aria-current="page" href="list.php">Medicines</a>';
                echo '</li>';
            }
            ?>
          </ul>
        </nav>
        <div id="content">
            <div id="schedule" class="home-page-box">
            <?php 
              while($row = mysqli_fetch_assoc($result)) {
                echo '<div>';
                echo    '<span>' . $row["first_name"] . ' ' . $row["last_name"] . '</span>';
                echo    '<span>' . $row["med_name"] . '</span>';
                echo    '<span>' . $row["strengh"] . ' ' . $row["units"] . '</span>';
              }
            ?> 
            </div>
            <div id="progress" class="home-page-box"></div>
        </div>
      </main>
    </body>
</html>