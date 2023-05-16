<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
</head>
<body>
    <span>First name: 
    <?php echo $_GET["firstName"]; ?>
    </span>
    <span>Last name:
    <?php echo $_GET["lastName"]; ?>
    </span>
    <span>ID: 
    <?php echo $_GET["idNum"]; ?>
    </span>
</body>
</html>