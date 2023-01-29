<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend List</title>
</head>
<body>
    <?php
        $name = $_GET['name'];
        echo "<h1>$name's friends</h1>";
        $sql = "SELECT friend FROM friendships WHERE name = '$name'";
        $friends_db = mysqli_connect('localhost', 'bob', 'help', 'friends') OR die(mysqli_connect_error());
        $result = mysqli_query($friends_db, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                echo "$row[0]<br>";
            }
        } else{
            echo "$name does not appear to have any friends!";
        }
        ?>

</body>
</html>