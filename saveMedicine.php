<?php
session_start();

include "db.php";

if (!empty($_GET["update"])) {
    $query = "UPDATE `dbShnkr23stud2`.`tbl_204_medicine_patient` SET `type` = '" . $_GET["type"] . "', strengh = '" . $_GET["strengh"] . "', units = '" . $_GET["units"] . "', frequency = '" . $_GET["frequency"] . "', inventory = '" . $_GET["inventory"] . "', hour = '" . $_GET["time"] . "', for_how_long = '" . $_GET["for_how_long"] . "' WHERE (user_id = '" . $_SESSION["user_id"] . "') and (med_id ='" . $_GET["med_id"] . "');";

    $firstcrumb = "Patient";
} else if (!empty($_GET["med_id"])) {

    $query = "INSERT INTO `dbShnkr23stud2`.`tbl_204_medicine_patient` (`user_id`, `med_id`, `type`, `strengh`, `units`, `frequency`, `inventory`, `hour`, `for_how_long`) VALUES ('" . $_SESSION["user_id"] . "', '" . $_GET["med_id"] . "', '" . $_GET["type"] . "', '" . $_GET["strengh"] . "', '" . $_GET["units"] . "', '" . $_GET["frequency"] . "', '" . $_GET["inventory"] . "', '" . $_GET["time"] . "', '" . $_GET["for_how_long"] . "');";
}

$result = mysqli_query($connection, $query);

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
                        <li class="breadcrumb-item breadcrumb-add"><a href="./list.php">Patients</a></li>
                        <li class="breadcrumb-item breadcrumb-add"><a href="#"> <?php if (!empty($_GET["patient_id"])) {
                                                                                    echo $_GET["firstName"] . " " . $_GET["lastName"];
                                                                                } else echo "Add Patient" ?> </a></li>
                    </ol>
                </nav>
                <div class="options-h1-container">
                    <h1 class="title-h1"> <?php if (!empty($_GET["patient_id"])) {
                                                echo $_GET["firstName"] . " " . $_GET["lastName"];
                                            } else echo "Add Patient" ?> </h1>
                </div>
            </div>
            <div class="patient-info-container">
                <div class="card">
                    <div class="card-body">
                        <span class="title"><?php if (!empty($_GET["patient_id"])) echo "Patient's Medications";
                                            else if (!empty($_GET["searchPatient"])) echo "Search for Patient";
                                            else if (!empty($_GET["user_id"])) echo "Results";
                                            else if (!empty($_GET["med_id"])) echo "Medication Details";
                                            else echo "Search for Medication";
                                            ?></span>
                        <hr>
                        <div class="grid text-start">
                            <?php
                            if (!empty($_GET["patient_id"])) {
                                if ($result) {
                                    echo "<div>Request sent successfully</div>";
                                    echo '<a href="./list.php"><button type="button" class="btn btn-outline-secondary">Go back</button></a></form>';;
                                }
                            }
                            if (!empty($_GET["med_id"])) {
                                if ($result) {
                                    echo "<div>Medicine added successfully</div>";
                                    echo '<a href="./list.php"><button type="button" class="btn btn-outline-secondary">Go back</button></a></form>';;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>