<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/addTest.css">
    <title>Add Test</title>
</head>
<body>
    <nav>
        <h1>MyResult</h1>
        <a href="index.php"><button id='viewTests'>View Tests</button></a>
        <a href="login.php"><button>Logout</button></a>
    </nav>

    <main>
    <?php
        if(isset($_GET["error"])){
            if (strcmp($_GET["error"], "score") == 0){
                echo"<p id='error'>ERROR: score must be less than or equal to the total marks</p>";
            } else if (strcmp($_GET["error"], "userDoesNotExist") == 0){
                echo"<p id='error'>ERROR: Student Username does not exist</p>";
            }
        } else if(isset($_GET["added"])){
            if (strcmp($_GET["added"], "True") == 0){
                echo"<p id='added'>TEST ADDED</p>";
            }
        }

    ?>

    <form action="addTest.inc.php" method="post">
        <p>Test Title:</p>
        <input type="text" name="title" maxlength="40" required>
        <p>Test Score:</p>
        <input type="number" name="score" required>
        <p>out of:</p>
        <input type="number" name="totalMarks" max="10000" required>
        <p>Student's Username:</p>
        <input type="text" name="studentsUsername" maxlength="50" required>
        <p>Comments</p>
        <textarea name="comments" rows="4" cols="50" maxlength="250"></textarea>
        <input type="submit" value="Add Test">
    </form>
    </main>
</body>
</html>