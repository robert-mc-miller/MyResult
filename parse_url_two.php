<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parse URL</title>
</head>
<body>
    <?php
    $username = $_GET["username"];
    $pass = $_GET["password"];
    $hiddenpass = "";
    for ($i = 0; $i < strlen($pass); $i++){
        $hiddenpass = $hiddenpass . "*";
    }
    
    echo "Welcome $username ($hiddenpass) to ZORK!";


    ?>
</body>
</html>