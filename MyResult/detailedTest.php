<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/detailedTest.css">
    <title>MyResult</title>
</head>
<body>
    <nav>
        <h1>MyResult</h1>
        <a href="index.php"><button id='viewTests'>View Tests</button></a>
        <a href="login.php"><button>Logout</button></a>
    </nav>

    <?php

    if(isset($_GET["id"])){
        session_start();
        $db = mysqli_connect("localhost", "MyResult", "MYR123!", "MyResult") or die(mysqli_connect_error());
        $query = "SELECT * FROM test WHERE (studentUsername ='".$_SESSION['username']."' OR teacherUsername = '".$_SESSION['username']."') AND testID = ".$_GET['id'].";";
        $result = mysqli_query($db, $query);    

        if(mysqli_num_rows($result) < 1){
            header("Location: detailedTest.php?error=dberror");
        }

        while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
        echo "<h3 id='top'>Test Title:</h3>
        <h2>$row[1]</h2>
        <h3>Test Score:</h3>
        <h2>$row[2]</h2>
        <h3>out of:</h3>
        <h2>$row[3]</h2>";
        
        if($_SESSION["type"] == "Student"){
            echo"
            <h3>Teacher's Username:</h3>
            <h2>$row[5]</h2>";  
        } else{
        echo"
        <h3>Student's Username:</h3>
        <h2>$row[4]</h2>";
            }       
        echo "<h3>Comments:</h3>
        <h2>$row[6]</h2>";
        }
    } else{
        echo"<p style='color: red;' id='error'>ERROR: retreiving detailis from database</p>";
    }



    ?>






</body>
</html>