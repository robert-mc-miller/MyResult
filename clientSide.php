<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="clientSide1.css">
    <title>Form Submitted</title>
</head>
<body>
    <h1>Form Submitted</h1>

    <?php

    echo "<h2>Username: " . $_GET['username'];
    echo "<h2>Date of Birth: " . $_GET['dob'];
    echo "<h2>Comments: " . $_GET['date'];
    echo "<h2>Phone Number: " . $_GET['phoneNumber'];
    echo "<h2>Contact: " . $_GET['Contact'];
    echo "<h2>Day: " . $_GET['day'];
    ?>
</body>
</html>