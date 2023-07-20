<?php
session_start();

include "db.php";

if ((!empty($_GET["med_id"])) && (!empty($_GET["user_id"]))) {

    $query = "SELECT * FROM tbl_204_users
    INNER JOIN tbl_204_medicine_patient USING(user_id)
    INNER JOIN tbl_204_medicine USING(med_id)
     WHERE med_id = " . $_GET["med_id"] . " and user_id = " . $_GET["user_id"] . ";";

    $result = mysqli_query($connection, $query);

    $row = mysqli_fetch_assoc($result);

    $medName = $row["med_name"];
    $type = $row["type"];

    $liquid = ($type == "liquid") ? " selected" : "";
    $tablet = ($type == "tablet") ? " selected" : "";
    $capsules = ($type == "capsules") ? " selected" : "";
    $drops = ($type == "drops") ? " selected" : "";
    $injections = ($type == "injections") ? " selected" : "";
    $inhalers = ($type == "inhalers") ? " selected" : "";
    $pill = ($type == "pill") ? " selected" : "";

    $strength = $row["strength"];
    $units = $row["units"];
    $frequency = $row["frequency"];
    $hour = $row["hour"];
    $for_how_long = $row["for_how_long"];
    $inventory = $row["inventory"];
} else if (!empty($_GET["med_id"])) {

    $query = "SELECT * FROM tbl_204_medicine WHERE med_id = " . $_GET["med_id"] . ";";

    $result = mysqli_query($connection, $query);

    $row = mysqli_fetch_assoc($result);

    $medName = $row["med_name"];
    $type = "";
    $strength = "";
    $units = "";
    $frequency = "";
    $hour = "";
    $for_how_long = "";
    $inventory = "";
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
                        <?php if (!empty($_GET["patient_id"])) {
                            echo '<li class="breadcrumb-item breadcrumb-add"><a href="./object.php?patient_id=' . $_GET["patient_id"] . '">' . $firstName . " " . $lastName . '</a></li>';
                        } ?>
                        <li class="breadcrumb-item breadcrumb-add"><a href="#">Edit Patient</a></li>
                    </ol>
                </nav>
                <div class="options-h1-container">
                    <h1 class="title-h1"> <?php if (!empty($_GET["patient_id"])) {
                                                echo $medName;
                                            } else echo "New Medicine"; ?> </h1>
                </div>
            </div>
            <form action="./saveMedicine.php" method="get">
                <div class="patient-info-container">
                    <div class="card">
                        <div class="card-body">
                            <span class="title">Patient's Personal Details</span>
                            <hr>
                            <div class="grid text-start">
                                <div class="row">
                                    <div class="col-6">Medicine Name
                                        <input type="text" class="form-control" name="medicineName" id="inputMedicineName4" value="<?php echo $medName; ?>" disabled>
                                    </div>
                                    <div class="col-6">Type
                                        <!-- load data from row - types -->
                                        <select class="form-select" name="type">
                                            <option>Select</option>

                                            <?php if ($row["liquid"]) {
                                                echo "<option" . $liquid . " value='liquid'>Liquid</option>";
                                            } ?>
                                            <?php if ($row["tablet"]) {
                                                echo "<option" . $tablet . " value='tablet'>Tablet</option>";
                                            } ?>
                                            <?php if ($row["capsules"]) {
                                                echo "<option" . $capsules . " value='capsules'>Capsules</option>";
                                            } ?>
                                            <?php if ($row["drops"]) {
                                                echo "<option" . $drops . " value='drops'>Drops</option>";
                                            } ?>
                                            <?php if ($row["injections"]) {
                                                echo "<option" . $injections . " value='Injections'>injections</option>";
                                            } ?>
                                            <?php if ($row["inhalers"]) {
                                                echo "<option" . $inhalers . " value='Inhalers'>inhalers</option>";
                                            } ?>
                                            <?php if ($row["pill"]) {
                                                echo "<option" . $pill . " value='pill'>Pill</option>";
                                            } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">Strength
                                        <input type="tel" class="form-control" name="strength" id="inputID4" value="<?php echo $strength; ?>">
                                    </div>
                                    <div class="col-6">Units
                                        <select class="form-select" name="units">
                                            <option <?php if (empty($units)) echo "selected"; ?>>select</option>
                                            <option <?php if ($units == "mg") echo "selected"; ?> value="mg">mg</option>
                                            <option <?php if ($units == "gr") echo "selected"; ?> value="gr">gr</option>
                                            <option <?php if ($units == "ml") echo "selected"; ?> value="ml">ml</option>
                                            <option <?php if ($units == "oz") echo "selected"; ?> value="oz">oz</option>
                                            <option <?php if ($units == "drop") echo "selected"; ?> value="drop">drop</option>
                                            <option <?php if ($units == "piece") echo "selected"; ?> value="piece">piece</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- write - freq -->
                                    <div class="col-6">Frequency
                                        <select class="form-select" name="frequency">
                                            <option <?php if (empty($frequency)) echo "selected"; ?>>Select</option>
                                            <option <?php if ($frequency == "daily") echo "selected"; ?> value="daily">Daily</option>
                                            <option <?php if ($frequency == "weekly") echo "selected"; ?> value="weekly">Weekly</option>
                                            <option <?php if ($frequency == "twice a week") echo "selected"; ?> value="twice a week">Twice a week</option>
                                            <option <?php if ($frequency == "monthly") echo "selected"; ?> value="monthly">Monthly</option>
                                        </select>
                                    </div>
                                    <div class="col-6">Time
                                        <input type="time" class="form-control" name="time" id="inputTime4" value="<?php echo $hour; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- write - for how -->
                                    <div class="col-6">For How Long
                                        <select class="form-select" name="for_how_long">
                                            <option <?php if (empty($for_how_long)) echo "selected"; ?>>Select</option>
                                            <option <?php if ($for_how_long == "week") echo "selected"; ?> value="week">Week</option>
                                            <option <?php if ($for_how_long == "2 weeks") echo "selected"; ?> value="2 weeks">2 Weeks</option>
                                            <option <?php if ($for_how_long == "month") echo "selected"; ?> value="month">Month</option>
                                            <option <?php if ($for_how_long == "3 months") echo "selected"; ?> value="3 months">3 Months</option>
                                        </select>
                                    </div>
                                    <div class="col-6">inventory (Same units)
                                        <input type="tel" class="form-control" name="inventory" id="inputTime4" value="<?php echo $inventory; ?>">
                                    </div>
                                    <div class="col-6">
                                        <input type="hidden" class="form-control" name="update" id="inputUpdate4" value="<?php if ((!empty($_GET["med_id"])) && (!empty($_GET["user_id"]))) {
                                                                                                                                echo 1;
                                                                                                                            } ?>">
                                    </div>
                                    <div class="col-6">
                                        <input type="hidden" class="form-control" name="med_id" id="inputUpdate4" value="<?php echo $_GET["med_id"] ?>">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-secondary">Submit</button>
                            <a href="<?php if (!empty($_GET["user_id"])) {
                                            echo "./object.php?med_id=" . $_GET["med_id"] . "&user_id=" . $_GET["user_id"];
                                        } else {
                                            echo "./list.php";
                                        } ?>"><button type="button" class="btn btn-outline-secondary">Cancel</button></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>