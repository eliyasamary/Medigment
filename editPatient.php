<?php
session_start();

if (!empty($_GET["patient_id"])) {
    include "db.php";

    $query = "SELECT * FROM tbl_204_users WHERE user_id = " . $_GET["patient_id"] . ";";

    $result = mysqli_query($connection, $query);

    $row = mysqli_fetch_assoc($result);

    $userId = $row["user_id"];
    $firstName = $row["first_name"];
    $lastName = $row["last_name"];
    $idNum = $row["num_id"];
    $gender = $row["gender"];
    $hmo = $row["hmo"];
    $phoneNum = $row["phone"];
} else {
    $userId = "";
    $firstName = "";
    $lastName = "";
    $idNum = "";
    $gender = "";
    $hmo = "";
    $phoneNum = "";
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
                            <a class="nav-link top-nav-link active" href="./homePage.php">Home Page</a>
                        </li>
                        <?php
                        if ($_SESSION["user_type"] == "carer") {
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link top-nav-link" href="./list.php">Patients</a>';
                            echo '</li>';
                        }
                        if ($_SESSION["user_type"] == "patient") {
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link top-nav-link" href="./list.php">Medicines</a>';
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
                    <a class="nav-link active" href="./homePage.php">Home Page</a>
                </li>
                <?php
                if ($_SESSION["user_type"] == "carer") {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" aria-current="page" href="./list.php">Patients</a>';
                    echo '</li>';
                }
                if ($_SESSION["user_type"] == "patient") {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" aria-current="page" href="./list.php">Medicines</a>';
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
                        <li class="breadcrumb-item breadcrumb-add"><a href="#">Edit Patient</a></li>
                    </ol>
                </nav>
                <div class="options-h1-container">
                    <h1 class="title-h1"> <?php if (!empty($_GET["patient_id"])) {
                                                echo $firstName . " " . $lastName;
                                            } else echo "New Patient" ?> </h1>
                </div>
            </div>
            <form action="./savePatient.php" method="get">
                <div class="patient-info-container">
                    <!-- <div class="card-body">
                            <span class="title">Patient's Medications </span>
                            <hr>
                            <div class="grid text-start">
                                <?php
                                if (!empty($_GET["patient_id"])) {
                                    // edit to text sections
                                    $query2 = "SELECT * FROM tbl_204_medicine_patient
                                    INNER JOIN tbl_204_medicine USING(med_id)
                                    WHERE user_id = " . $_GET['patient_id'] . ";";

                                    $result2 = mysqli_query($connection, $query2);

                                    while ($row2 = mysqli_fetch_array($result2)) {
                                        echo '<div class="row">
                                        <div class="col-12">' . $row2["med_name"]  .
                                            '<div class="data">
                                            <div class="col-4">' . $row2["strengh"] . " " . $row2["units"] . '</div>
                                            <div class="col-4">' . $row2["frequency"] . '</div>
                                            <div class="col-4"> ' . $row2["many_times"] . ' </div>
                                        </div>
                                        </div>
                                    </div>';
                                    }
                                }
                                ?>
                            </div>
                        </div> -->
                    <div class="card">
                        <div class="card-body">
                            <span class="title">Patient's Personal Details</span>
                            <hr>
                            <div class="grid text-start">
                                <div class="row">
                                    <div class="col-6">First Name
                                        <input type="text" class="form-control" name="firstName" id="inputFirstName4" value="<?php echo $firstName; ?>">
                                    </div>
                                    <div class="col-6">Last Name
                                        <input type="text" class="form-control" name="lastName" id="inputLastName4" value="<?php echo $lastName; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">ID Number
                                        <input type="tel" class="form-control" name="idNum" id="inputID4" value="<?php echo $idNum; ?>">
                                    </div>
                                    <div class="col-6">Gender
                                        <select class="form-select" name="gender">
                                            <option <?php if (empty($gender)) echo "selected"; ?>>select</option>
                                            <option <?php if ($gender == "Male") echo "selected"; ?> value="Male">Male</option>
                                            <option <?php if ($gender == "Female") echo "selected"; ?> value="Female">Female</option>
                                            <option <?php if ($gender == "Non-binary") echo "selected"; ?> value="Non-binary">Non-binary</option>
                                            <option <?php if ($gender == "Transgender") echo "selected"; ?> value="Transgender">Transgender</option>
                                            <option <?php if ($gender == "Intersex") echo "selected"; ?> value="Intersex">Intersex</option>
                                            <option <?php if ($gender == "Perfer not to say") echo "selected"; ?> value="Perfer not to say">Perfer not to say</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">HMO
                                        <select class="form-select" name="hmo">
                                            <option>select</option>
                                            <option <?php if ($hmo = "Maccabi") echo " selected"; ?> value="Maccabi">Maccabi</option>
                                            <option <?php if ($hmo = "Clalit") echo " selected"; ?> value="Clalit">Clalit</option>
                                            <option <?php if ($hmo = "Meuhedet") echo " selected"; ?> value="Meuhedet">Meuhedet</option>
                                            <option <?php if ($hmo = "Leumit") echo " selected"; ?> value="Leumit">Leumit</option>
                                        </select>
                                    </div>
                                    <div class="col-6">Phone Number
                                        <input type="tel" class="form-control" name="phoneNumber" id="inputPhoneNumber4" value="<?php echo $phoneNum; ?>">
                                    </div>
                                    <div class="col-6">
                                        <input type="hidden" class="form-control" name="patient_id" id="inputuserId4" value="<?php echo $userId; ?>">
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