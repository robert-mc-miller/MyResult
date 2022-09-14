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
        $driver = $_GET["driver"];
        $start_mileage = $_GET["start_mileage"];
        $end_mileage = $_GET["end_mileage"];

        $today_mileage = $end_mileage - $start_mileage;

        echo "$driver drove $today_mileage miles today";

    ?>
</body>
</html>