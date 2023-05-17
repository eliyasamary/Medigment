<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
</head>
<body>
    <h3>First name: 
        <?php echo $_GET["firstName"]; ?>
    </h3>
    <h3>Last name:
        <?php echo $_GET["lastName"]; ?>
    </h3>
    <h3>ID: 
        <?php echo $_GET["idNum"]; ?>
    </h3>
    <h3>Gender: 
        <?php
            if ($_GET["gender"] == 1) 
                    echo " Male"; 
            else echo " Female";          
        ?>
    </h3>
    <h3>HMO: 
        <?php 
            if($_GET["HMO"] == 1)
                echo " Maccabi";
            else if ($_GET["HMO"] == 2)
                echo " Clalit";
            else if ($_GET["HMO"] == 3)
                echo " Meuhedet";
            else echo " Leumit";
        ?>
    </h3>
    <h3>Phone Number: 
        <?php 
            echo $_GET["phoneNumber"];
        ?>
    </h3>
    <h3>Department: 
        <?php 
        ?>
    </h3>
    <h3>Room Number: 
        <?php 
            echo $_GET["room"];
        ?>
    </h3>
    <h3>Bed Number: 
        <?php 
            echo $_GET["bed"];
        ?>
    </h3>
</body>
</html>