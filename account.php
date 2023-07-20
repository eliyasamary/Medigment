<?php
    include "db.php";

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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">        <title>Account</title>
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
                  <a class="nav-link top-nav-link" href="#">Home Page</a>
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
                  <a class="nav-link top-nav-link active" href="account.php"><img class="user-nav-img" src="images/patient.png">Account</a>
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
              <a class="nav-link" href="homePage.php">Home Page</a>
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
          <form action="saveAccount.php" id="edit-account-form">
                <div class="flex-form-container account-container">
                  <div class="form-column">
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="userFname" value="<?php echo $_SESSION["user_name"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="userLname" value="<?php echo $_SESSION["user_Lname"]; ?>" id="userLname1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID Number</label>
                        <input type="number" class="form-control" name="userIdNum" value="<?php echo $_SESSION["user_idNum"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="userEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="userEmail" value="<?php echo $_SESSION["user_email"]; ?>" placeholder="Enter your Email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="passInput" name="userPass" value="<?php echo $_SESSION["user_pass"]; ?>" placeholder="Enter Password">
                    </div>
                  </div>
                  <div class="form-column">
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" name="phoneNum" value="<?php echo $_SESSION["user_phone"]; ?>" placeholder="Enter Phone Number">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select name="userGender" data-selected="<?php echo $_SESSION["user_gender"]; ?>" class="form-select">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="transgender">transgender</option>
                          <option value="Non-binary">Non-binary</option>
                          <option value="other">Prefer not to respond</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">HMO</label>
                        <select name="userHMO" data-selected="<?php echo $_SESSION["user_hmo"]; ?>" class="form-select">
                          <option value="Maccabi">Maccabi</option>
                          <option value="Meuhedet">Meuhedet</option>
                          <option value="Leumit">Leumit</option>
                          <option value="Clalit">Clalit</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">User Type</label>
                        <span class="form-control" disabled><?php echo $_SESSION["user_type"]; ?></span>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary landing-btn save-account-btn">Save</button>
          </form>
        </div>
      </main>
    </body>
</html>