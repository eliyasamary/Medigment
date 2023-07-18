<?php
    include "db.php";
    include "config.php";

    session_start();
    if(!empty($_POST["loginEmail"])){

	    $query 	= "SELECT * FROM tbl_204_users WHERE email='" . $_POST["loginEmail"] . "' and password ='" . $_POST["loginPass"] ."'";

        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result);

        if(is_array($row)){
            $_SESSION["user_id"] = $row['user_id'];
            $_SESSION["user_type"] = $row['user_type'];
            $_SESSION["user_name"] = $row['first_name'];
            $_SESSION["user_img"] = $row['img_url'];
            
            header('Location: ' . URL . 'homePage.php');
        } else {
            $message = "Invalid Email or Password";
        }
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
        <title>Login</title>
    </head>
    <body id="login-page">
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
              <ul class="navbar-nav flex-column me-auto">
                <li class="nav-item">
                  <a class="nav-link top-nav-link" href="#">Home Page</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link top-nav-link" href="#">Search Medicine</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link top-nav-link active" href="#">Patients</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link top-nav-link" href="#">Status</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link top-nav-link" href="#">Settings</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div id="header-container">
          <a href="#" id="logo"></a>
        </div>
        <div id="sm-h1"><span>Patients</span></div>
      </header>
      <main>
        <form action="#" method="post">
            <div class="mb-3">
                <label for="loginEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" name="loginEmail" id="loginEmail" placeholder="Enter your Email">
            </div>
            <div class="mb-3">
                <label for="loginPass" class="form-label">Password</label>
                <input type="password" class="form-control" name="loginPass" id="loginPass" placeholder="Enter your Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <div><?php if(isset($message)){echo $message;} ?></div>
        </form>
      </main>
    <?php 
      if(!empty($_POST["loginEmail"])){
        mysqli_free_result($result);
      }
    ?>
    </body>
</html>
<?php
mysqli_close($connection);
?>