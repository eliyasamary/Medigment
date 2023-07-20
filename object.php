<?php
session_start();

include "db.php";

if ($_SESSION["user_type"] == "carer") {
  if (!empty($_GET["patient_id"])) {
    $query = "SELECT * FROM tbl_204_users WHERE user_id = " . $_GET["patient_id"] . ";";
  }

  if (!empty($_GET["patient_idNum"])) {
    $query = "SELECT * FROM tbl_204_users WHERE user_id = " . $_GET["patient_idNum"] . " and user_type = 'patient';";
  }

  $firstcrumb = "Patients";
  $secondcrumb = "Add Patient";
} else {
  if ((!empty($_GET["med_id"])) && (!empty($_GET["user_id"]))) {
    $query = "SELECT * FROM tbl_204_users
    INNER JOIN tbl_204_medicine_patient USING(user_id)
    INNER JOIN tbl_204_medicine USING(med_id)
     WHERE med_id = " . $_GET["med_id"] . " and user_id = " . $_GET["user_id"] . ";";
  }

  $firstcrumb = "Medicines";
  $secondcrumb = "Add Medicine";
}

$result = mysqli_query($connection, $query);

if(!$result) {
  die("DB query failed.");
}

$row = mysqli_fetch_assoc($result);
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
  <title>Medigment</title>
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
              <a class="nav-link top-nav-link" href="./homePage.php">Home Page</a>
            </li>
            <?php
            if ($_SESSION["user_type"] == "carer") {
              echo '<li class="nav-item">';
              echo '<a class="nav-link top-nav-link active" href="list.php">Patients</a>';
              echo '</li>';
            }
            if ($_SESSION["user_type"] == "patient") {
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
        if ($_SESSION["user_type"] == "carer") {
          echo '<li class="nav-item">';
          echo '<a class="nav-link active" aria-current="page" href="list.php">Patients</a>';
          echo '</li>';
        }
        if ($_SESSION["user_type"] == "patient") {
          echo '<li class="nav-item">';
          echo '<a class="nav-link active" aria-current="page" href="list.php">Medicines</a>';
          echo '</li>';
        }
        ?>
      </ul>
    </nav>
    <div id="content" class="centerd">
      <div id="BC-H1">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
          <ol class="breadcrumb BC-style">
            <li class="breadcrumb-item breadcrumb-add"><a href="./list.php"> <?php echo $firstcrumb; ?> </a></li>
            <li class="breadcrumb-item breadcrumb-add"><a href="#"> <?php if (!empty($_GET["patient_id"])) {
                                                                      echo $row["first_name"] . " " . $row["last_name"];
                                                                    } else echo $secondcrumb ?> </a></li>
          </ol>
        </nav>
        <div class="options-h1-container">
          <h1 class="title-h1"> <?php if (!empty($_GET["patient_id"])) {
                                  echo $row["first_name"] . " " . $row["last_name"];
                                } else echo $secondcrumb; ?> </h1>
          <?php if (!empty($_GET["patient_id"]))
            echo
            '<div class="paitent-options patient-info-options">
              <div class="icon-with-text"><a href="./editPatient.php?patient_id=' .  $_GET["patient_id"] . '"><img src="./images/edit.png" alt="edit" class="sm-icon"></a><span>Edit</span></div>
              <div class="icon-with-text"><a href="./savePatient.php?del=1&patient_id=' .  $_GET["patient_id"] . '"><img src="./images/delete.png" alt="delete" class="sm-icon"></a><span>Delete</span></div>
            </div>';
            else if ((!empty($_GET["med_id"]) && (!empty($_GET["user_id"])))) {
              echo
            '<div class="paitent-options patient-info-options">
              <div class="icon-with-text"><a href="./editMedicine.php?med_id=' .  $_GET["med_id"] . '&user_id=' . $_SESSION["user_id"] . '"><img src="./images/edit.png" alt="edit" class="sm-icon"></a><span>Edit</span></div>
              <div class="icon-with-text"><a href="./saveMedicine.php?del=1&med_id=' .  $_GET["med_id"] . '"><img src="./images/delete.png" alt="delete" class="sm-icon"></a><span>Delete</span></div>
            </div>';
            }
          ?>
        </div>
      </div>
      <div class="patient-info-container">
        <div class="card">
          <div class="card-body">
            <span class="title"><?php if (!empty($_GET["patient_id"])) echo "Patient's Medications";
                                else if (!empty($_GET["searchPatient"])) echo "Search for Patient";
                                else if (!empty($_GET["patient_idNum"])) echo "Results";
                                else if (!empty($_GET["med_id"])) echo "Medication Details";
                                else echo "Search for Medication";
                                ?></span>
            <hr>
            <div class="grid text-start">
              <?php
              if (!empty($_GET["patient_id"])) { // for look on patient
                if ($_SESSION["user_type"] == "carer") {
                  $query2 = "SELECT * FROM tbl_204_medicine_patient
                            INNER JOIN tbl_204_medicine USING(med_id)
                            WHERE user_id = " . $_GET['patient_id'] . ";";

                  $result2 = mysqli_query($connection, $query2);

                  while ($row2 = mysqli_fetch_array($result2)) {
                    echo '<div class="row">
                        <div class="col-12">' . $row2["med_name"]  .
                      '<div class="data">
                              <div class="col-4">' . $row2["strength"] . " " . $row2["units"] . '</div>
                              <div class="col-4">' . $row2["type"] . '</div>
                              <div class="col-4">' . $row2["frequency"] . '</div>
                          </div>
                          </div>
                        </div>';
                  }
                }
              } else if (!empty($_GET["searchPatient"])) { // for search patient

                echo '<form action="#" method="GET"><div class="col-6">Patient ID number
                        <input type="tel" class="form-control" name="patient_idNum" id="inputIDnumber4" value="">
                      </div>
                      <button type="submit" class="btn btn-secondary">Search</button>
                            <a href="./list.php"><button type="button" class="btn btn-outline-secondary">Cancel</button></a></form>';
              }
              else if ((!empty($_GET["med_id"]) && (!empty($_GET["user_id"])))) {
                echo
                '<div class="row">
                          <div class="col-6">Medicine Name
                            <div class="data">' . $row["med_name"] . '</div>
                          </div>
                          <div class="col-6">Type
                            <div class="data">' . $row["type"] . '</div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6">Strength
                            <div class="data">' . $row["strength"] . '</div>
                          </div>
                          <div class="col-6">Units
                            <div class="data">' . $row["units"] . '</div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6">Frequency
                            <div class="data">' . $row["frequency"] . '</div>
                          </div>
                          <div class="col-6">Time
                            <div class="data">' . $row["hour"] . '</div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6">For How Long
                            <div class="data">' . $row["for_how_long"] . '</div>
                          </div>
                          <div class="col-6">inventory (Same units)
                            <div class="data">' . $row["inventory"] . '</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>';
              }
              else if (!empty($_GET["patient_idNum"])) {

                $query2 = "SELECT * FROM tbl_204_users
                LEFT JOIN tbl_204_carer_patient ON tbl_204_users.user_id = tbl_204_carer_patient.patient_id
                WHERE num_id = " . $_GET["patient_idNum"] . " and user_type = 'patient';";

                $result2 = mysqli_query($connection, $query2);

                if (!empty($row2 = mysqli_fetch_array($result2))) { // success
                  if($row2["carer_id"] == $_SESSION["user_id"]){
                    echo '<li class="list-group-item">
                    <div class="object-details">
                    <img class="obj-list-img" src="images/patient.png">
                      <a class="dropdown-item object-name" href="#"><span>' . $row2["first_name"] . " " . $row2["last_name"]  . ' (Already yor patient!)' . '</span></a>
                    </div>                        
                    </li>';
                  }
                else
                  echo '<li class="list-group-item">
                      <div class="object-details">
                      <img class="obj-list-img" src="images/patient.png">
                        <a class="dropdown-item object-name" href="./savePatient.php?user_id=' . $row2["user_id"] . '"><span>' . $row2["first_name"] . " " . $row2["last_name"]  . ' (Click to send request)' . '</span></a>
                      </div>                        
                      </li>';
                } else { // no results
                  echo "<div>No Results!</div>";
                  echo '<a href="./object.php?searchPatient=1"><button type="button" class="btn btn-outline-secondary">Try Again</button></a></form>';
                }
              } else if ((!empty($_GET["med_id"])) && (!empty($_GET["user_id"]))) {
              } else { // for search med

                $query2 = "SELECT * FROM tbl_204_medicine;";

                $result2 = mysqli_query($connection, $query2);

                echo '<form action="./editMedicine.php" method="get">
                <select class="form-select" name="med_id" aria-label="Default select example">
                <option selected>Open this select menu</option>';

                while ($row2 = mysqli_fetch_assoc($result2)){
                  echo'<option value="'. $row2["med_id"] .'">'. $row2["med_name"] .'</option>'; 
                };
                echo'</select>
              <button type="submit" class="btn btn-secondary">Submit</button>
              </form>';
              }
              ?>
            </div>
          </div>
        </div>
        <?php
        if (!empty($_GET["patient_id"])) {
          echo
          '<div class="card">
              <div class="card-body">
                <span class="title">Patient\'s Personal Details</span>
                <hr>
                <div class="grid text-start">
                  <div class="row">
                    <div class="col-6">ID Number
                      <div class="data">' . $row["num_id"] . '</div>
                    </div>
                    <div class="col-6">Gender
                      <div class="data">' . $row["gender"] . '</div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">HMO
                      <div class="data">' . $row["hmo"] . '</div>
                    </div>
                    <div class="col-6">Phone Number
                      <div class="data">' . $row["phone"] . '</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>';
        } 
        ?>
      </div>
    </div>
  </main>
</body>
</html>