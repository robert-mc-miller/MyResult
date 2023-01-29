<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding Journal</title>
</head>
<body>
    <h1>Adding Journal</h1>
    <?php
    $name = $_GET['name'];
    $date = $_GET['date'];
    $entry = $_GET['entry'];
    $sql = "INSERT INTO journal(name, entry) VALUES ('$name', '$entry')";
    $db = mysqli_connect('localhost', 'diana_prince', 'wonder_woman', 'pet_journal') OR die(mysqli_connect_error());
    mysqli_query($db, $sql);
    mysqli_close($db);
    echo"The following SQL quuery should have just been executed:<br><br>$sql<br><br>Check the database to see if the record has been successfully added.";
    ?>
</body>
</html>