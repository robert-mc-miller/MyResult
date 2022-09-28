<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Form Data</title>
</head>
<body>
    <?php
    $name = $_GET["name"];
    $pet = $_GET["pet"];
    $score1 = $_GET["score1"];
    $score2 = $_GET["score2"];
    $score3 = $_GET["score3"];
    $final = ($score1 + $score2 + $score3)/3;
    echo "<h1>$name and $pet</h1>";
    echo "<p>After all the judges have given their score we calculate the final score by calculating the mean and rounding it off to the nearest integer. $pet has been given a final score of $final!</p>";

        ?>
</body>
</html>