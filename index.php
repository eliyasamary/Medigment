<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
</head>
<body>
    <h1>Patient added sucssesfuly!</h1>
    <h2>Details:</h2>
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
        <?php echo $_GET["gender"]; ?>
    </h3>
    <h3>HMO: 
        <?php 
            if($_GET["hmo"] == 1)
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
            echo $_GET["department"];
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
    <h3>
        Sensetivities:
    </h3>
    <h4>
        <!-- <?php 
            echo $_GET["Sensitivity"] . " (" $_GET["SensitivityComment"] ").";
        ?> -->
    </h4>
    <h3>
        Medications:
    </h3>
    <h4>
        <!-- <?php 
            echo $_GET["medicationSlot"] . " (" $_GET["medicationComment"] ").";
        ?> -->
    </h4>
</body>
</html>