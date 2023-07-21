<?php
    include "db.php";
    include "config.php";

    session_start();
    if(!empty($_POST["loginEmail"])){

	    $query 	= "SELECT * FROM tbl_204_users WHERE email='" . $_POST["loginEmail"] . "' and password ='" . $_POST["loginPass"] ."';";

        $result = mysqli_query($connection, $query);
        if(!$result) {
          die("DB query failed.");
        }

        $row = mysqli_fetch_array($result);

        if(is_array($row)){
            $_SESSION["user_id"] = $row['user_id'];
            $_SESSION["user_type"] = $row['user_type'];
            $_SESSION["user_name"] = $row['first_name'];
            $_SESSION["user_Lname"] = $row['last_name'];
            $_SESSION["user_idNum"] = $row['num_id'];
            $_SESSION["user_email"] = $row['email'];
            $_SESSION["user_pass"] = $row['password'];
            $_SESSION["user_phone"] = $row['phone'];
            $_SESSION["user_gender"] = $row['gender'];
            $_SESSION["user_hmo"] = $row['hmo'];
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
        <title>Medigment</title>
    </head>
    <body id="login-page">
      <header class="sticky-top">
      <div id="header-container">
          <a href="#" id="login-header-logo"></a>
      </div>
      </header>
      <main>
        <div id="landing-content">
          <div id="login-box">
            <div id="login">
              <form id="login-form" action="#" method="post">
                <h2>Login</h2>
                  <div class="mb-3">
                      <label for="loginEmail" class="form-label">Email address</label>
                      <input type="email" class="form-control" name="loginEmail" value="" id="loginEmail" placeholder="Enter your Email">
                  </div>
                  <div class="mb-3">
                      <label for="loginPass" class="form-label">Password</label>
                      <input type="password" class="form-control" name="loginPass" value="" id="loginPass" placeholder="Enter your Password">
                  </div>
                  <button type="submit" class="btn btn-primary landing-btn" id="login-submit-btn">Login</button>
              </form>
              <form id="register-form" action="saveUser.php">
                <h2>Sign-up</h2>
                <div class="flex-form-container">
                  <div class="form-column">
                    <div class="mb-3">
                        <label for="userFname1" class="form-label">First Name</label>
                        <input type="text" required class="form-control" name="userFname" id="userFname1" placeholder="Enter your First Name">
                    </div>
                    <div class="mb-3">
                        <label for="userLname1" class="form-label">Last Name</label>
                        <input type="text" required class="form-control" name="userLname" id="userLname1" placeholder="Enter your Last Name">
                    </div>
                    <div class="mb-3">
                        <label for="userIdNum1" class="form-label">ID Number</label>
                        <input type="number" required class="form-control" name="userIdNum" id="userFname1" min="1" placeholder="Enter your Id Number">
                    </div>
                    <div class="mb-3">
                        <label for="userEmail1" class="form-label">Email address</label>
                        <input type="email" required class="form-control" name="userEmail" id="userEmail1" placeholder="Enter your Email">
                    </div>
                    <div class="mb-3">
                        <label for="userPass1" class="form-label">Password</label>
                        <input type="password" required class="form-control" name="userPass" id="userPass1" placeholder="Enter Password">
                    </div>
                  </div>
                  <div class="form-column">
                    <div class="mb-3">
                        <label for="phoneNum" class="form-label">Phone Number</label>
                        <input type="tel" required class="form-control" name="phoneNum" id="phoneNum" placeholder="Enter Phone Number">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select name="userGender" class="form-select">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Non-binary">Non-binary</option>
                          <option value="transgender">transgender</option>
                          <option value="transgender">intersex</option>
                          <option value="other">Prefer not to respond</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">HMO</label>
                        <select name="userHMO" class="form-select">
                          <option value="Maccabi">Maccabi</option>
                          <option value="Meuhedet">Meuhedet</option>
                          <option value="Leumit">Leumit</option>
                          <option value="Clalit">Clalit</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">User Type</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" required name="userType" value="patient">
                          <label class="form-check-label text-style2">Patient</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" required name="userType" value="carer">
                          <label class="form-check-label text-style2">Carer</label>
                        </div>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary landing-btn sign-up-btn" id="register-submit-btn">Sign Up</button>
                <a href="index.php">Go back to login</a>
              </form>
              <button class="btn btn-primary landing-btn" id="register-btn">Register</button>
              <div><?php if(isset($message)){echo $message;} ?></div>
            </div>
          </div>
          <div id="landing-img">
            <a href="#" id="landing-logo"></a>
          </div>
        </div>
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