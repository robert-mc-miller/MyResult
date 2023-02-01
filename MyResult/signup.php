<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styling/main.css">
    <title>Sign Up</title>
</head>
<body id="signupBody">
    <?php
    session_start();
    // logs out user if they are still logged in when landing on the page
    if(isset($_SESSION["username"])){
    session_destroy();
    }

    ?>
    <div id="title">
    <h1>MyResult</h1>
    <p style='display: none;' id='emailAt'>Email must include @</p>
    <?php

        if(isset($_GET["error"])){
            if (strcmp($_GET["error"], "notunique") == 0){
                echo"<p id='error'>ERROR: Username/email is not unique</p>";
            } else if (strcmp($_GET["error"], "nomatch") == 0){
                echo"<p id='error'>ERROR: Passwords do not match</p>";
            } else if (strcmp($_GET["error"], "mustinclude@") == 0) {
                echo"<p id='error'>ERROR: Email not formatted corectly<p>";
            }
        }

    ?>
    </div>
    <form action="register.inc.php" method="post" id='signup'>
        <h1>Sign Up</h1>
        <p class="emailInput" >Username:</p>
        <input type="text" name="username" maxlength="50" autocomplete="off" required>
        <p>Email:</p>
        <input id="email" type="text" name="email" maxlength="50" autocomplete="off" required>
        <p>Password:</p>
        <input type="password" name="pass" maxlength="50" minlength="6" required>
        <p>Confirm Password:</p>
        <input type="password" name="confirm-pass" maxlength="50" minlength="6" required>
        <p>Account Type:</p>
        <input class="inline" type="radio" name="account" value="Teacher" required>
        <p class="inline">Teacher</p>
        <input class="inline" type="radio" name="account" value="Student" required>
        <p class="inline">Student</p>
        <br>
        <input type="submit" value="Sign Up" class="submit"><br>
        <a href="login.php">Already have an account?</a>
    </form>
    

    <script src="./javascript/signup.js"></script>


</body>
</html>