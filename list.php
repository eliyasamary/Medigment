<?php
    session_start();
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
        <title>List</title>
    </head>
    <body id="list-page">
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
                  <a class="nav-link top-nav-link" href="./homePage.php">Home Page</a>
                </li>
                <?php 
                if($_SESSION["user_type"] == "carer"){
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link top-nav-link active" href="list.php">Patients</a>';
                    echo '</li>';
                }
                if($_SESSION["user_type"] == "patient"){
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link top-nav-link active" href="list.php">Medicines</a>';
                    echo '</li>';
                }
                ?>
                <li class="nav-item">
                  <a class="nav-link top-nav-link" href="#"><img class="logout-btn" src="images/settings.png">Settings</a>
                </li>
                <li>
                  <a class="nav-link" href="logout.php"><img class="logout-btn" src="images/logout.png">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div id="header-container">
          <a href="homePage.php" id="logo"></a>
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
              <a class="nav-link" href="homePage.php">Home Page</a>
            </li>
            <?php 
            if($_SESSION["user_type"] == "carer"){
                echo '<li class="nav-item">';
                echo '<a class="nav-link active" aria-current="page" href="list.php">Patients</a>';
                echo '</li>';
            }
            if($_SESSION["user_type"] == "patient"){
                echo '<li class="nav-item">';
                echo '<a class="nav-link active" aria-current="page" href="list.php">Medicines</a>';
                echo '</li>';
            }
            ?>
          </ul>
        </nav>
        <div id="content">
          <div id="BC-H1"> 
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item breadcrumb-add"><a href="#"></a></li>
              </ol>
            </nav>
            <?php 
                if($_SESSION["user_type"] == "carer"){
                    echo '<h1 class="title-h1">Patients</h1>';
                }
                if($_SESSION["user_type"] == "patient"){
                    echo '<h1 class="title-h1">Medicines</h1>';
                }
                ?>
          </div>
          <div class="modify">
            <div id="modify-btns">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Sort
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" id="nav-place">
                </ul>
              </div>
            </div>
          </div>
          <section id="list">
            <div class="list-group">
              <ul class="list-group">
              <?php 
                include "db.php";
                $query1 = '';
                $sortfield = '';
                $query2 = ';';

                if($_SESSION["user_type"] == "carer"){

                  $query1 = "SELECT * FROM tbl_204_carer_patient as c 
                  INNER JOIN tbl_204_users as u ON c.patient_id = u.user_id
                  WHERE c.carer_id= " . $_SESSION["user_id"];

                  $sortfield = "u.first_name";

                  $name = 1;

                }
                else if ($_SESSION["user_type"] == "patient"){

                  $query1 = "SELECT * FROM tbl_204_medicine_patient
                  INNER JOIN tbl_204_medicine USING(med_id)
                  WHERE user_id = " . $_SESSION["user_id"];

                  $sortfield = "med_name";

                  $name = 0;

                }
                if(!empty($_GET["sort"])){
                  if($_GET["sort"] == 1){
                    $query2 = " ORDER BY " . $sortfield . " ASC;" ;
                  } else if($_GET["sort"] == 2){
                    $query2 = " ORDER BY " . $sortfield . " DESC;" ;
                  } else if($_GET["sort"] == 3){
                    $query2 = " ORDER BY date DESC;" ;
                  } else $query2 = ";";
                }
                else {$query2 = ";";}
                
                $query = $query1 . $query2;

                $result = mysqli_query($connection, $query);

                if($result->num_rows > 0) {
                  if($name == 1) {
                    while($row = mysqli_fetch_array($result)) {
                      echo '<li class="list-group-item">
                      <div class="object-details">
                      <img class="obj-list-img" src="images/patient.png">
                        <a class="dropdown-item object-name" href="object.html?patientId=' . $row["user_id"] . '"><span>' . $row["first_name"]  .  '</span></a>
                      </div>                        
                    </li>';
                    } 
                  } else {
                    while($row = mysqli_fetch_array($result)) {
                    echo '<li class="list-group-item">
                    <div class="object-details">
                      <img class="obj-list-img" src="images/med.png">
                      <a class="dropdown-item object-name" href="object.html?medId=' . $row["med_id"] . '"><span>' . $row["med_name"]  .  '</span></a>
                    </div>                        
                  </li>';
                    }
                  }
                }
              ?>
              </ul>
            </div>
          </section>
        </div>
      </main>
    </body>
</html>