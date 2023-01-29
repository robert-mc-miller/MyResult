<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/index.css">
    <title>MyResult</title>
</head>
<body>

    <?php
    session_start();  
    if(isset($_SESSION["username"])){
        $db = mysqli_connect("localhost", "MyResult", "MYR123!", "MyResult") or die(mysqli_connect_error());
        $query = "SELECT * FROM user WHERE username = '".$_SESSION['username']."'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        if ($row[3] == 'Teacher'){
             echo "<nav>
             <h1>MyResult</h1>
             <a href='addTest.php'><button id='addTest'>Add Test</button></a>
             <a href='login.php'><button>Logout</button></a>
         </nav>";
        } else {
            echo "<nav>
             <h1>MyResult</h1>
             <a href='login.php'><button>Logout</button></a>
         </nav>";
        }



        // query and database connection
        
        $query = "SELECT * FROM test WHERE studentUsername = '" . $_SESSION["username"] . "' OR teacherUsername = '" . $_SESSION["username"] . "'";
        $result = mysqli_query($db, $query)     ;


        // checks if the user has any tests added
        $total = 0;
        $score = 0;
        $out = "";
        if(mysqli_num_rows($result) >= 1){
            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                $out = $out . "<tr>
                <td><a href='detailedTest.php?id=$row[0]'>
                ".$row[1]."</a></td>
                <td>".round(($row[2]/$row[3])*100, 1)."%</td>
                <td>".$row[6]."</td>
                </tr>";
                $score += $row[2];
                $total += $row[3];
            }
        } else{
            echo "<h1 id='top'>You don't have any tests right now.</h2>";
        }

        if ($total > 0) {
            echo "<div class='summary'><h1>" . round(($score/$total)*100, 1) . "%</h1>";
        } else{
            echo "<div class='summary'><h1>0%</h1>";
        }
        echo "<h2>Overall</h2></div>";
        echo "<table><tr><th>Title</th><th>Percentage</th><th>Comments</th></tr>$out</table>";


    } else {
        // redirects user to login.php if they are not already logged in
        header("location: login.php");
    }


    ?>
</body>
</html>