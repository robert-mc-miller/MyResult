<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding Friendship</title>
</head>
<body>
    <h1>Adding a friendship</h1>
    <?php
    $name = $_GET['name'];
    $friend = $_GET['friend'];
    $sql = "INSERT INTO friendships(name, friend) VALUES ('$name', '$friend')";
    $friendship_db = mysqli_connect('localhost', 'peter_parker', 'superman', 'friends') OR die(mysqli_connect_error());
    mysqli_query($friendship_db, $sql);
    mysqli_close($friendship_db);
    echo"The following SQL quuery should have just been executed:<br><br>$sql<br><br>Check the database to see if the record has been successfully added.";
    ?>
</body>
</html>