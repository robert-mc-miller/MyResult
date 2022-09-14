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
    $type = $_GET["type"];
    $name = $_GET["name"];
    $age = $_GET["age"];

    echo "$name is a $type who is $age years old";
    ?>
</body>
</html>