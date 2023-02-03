<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styling/main.css">
    <title>Forgot Password</title>
</head>
<body>
    <nav>
        <h1>MyResult</h1>
        <a href="login.php"><button>Login</button></a>
    </nav>

    <?php
        session_start();
        if (isset($_GET['email'])){
            echo "<form action='forgotPassword.inc.php' method='post' class='forgotPass'>
            <h1>Forgot Password</h1>
            <p class='emailInput'>Code:</p>
            <input type='number' name='code' autocomplete='off' min='0' required>
            <br>
            <input type='submit' value='Enter' class='submit'>
        </form>";

        } else if(isset($_GET['reset'])){
            echo "<form action='forgotPassword.inc.php' method='post' class='forgotPass'>
            <h1>Forgot Password</h1>
            <p class='emailInput'>Password:</p>
            <input type='password' name='pass' maxlength='50' minlength='6' required>
            <p class='emailInput'>Confirm Password:</p>
            <input type='password' name='confirm-pass' maxlength='50' minlength='6' required>
            <br>
            <input type='submit' value='Enter' class='submit'>
        </form>";
        } else if (isset($_GET["complete"])){
            if ($_GET["complete"] == "True"){
                echo "<p id='added' style='margin-top: 20vh'>Password reset succesful<p>";
            }
        }
        else {
            echo "<form action='forgotPassword.inc.php' method='post' class='forgotPass'>
            <h1>Forgot Password</h1>
            <p class='emailInput'>Email:</p>
            <input type='text' name='email' maxlength='50' autocomplete='off' required>
            <br>
            <input type='submit' value='Receive Reset Code' class='submit'>
        </form>";
         }

        if(isset($_GET["error"])){
            if (strcmp($_GET["error"], "mustinclude@") == 0) {
                echo"<p id='error' style='margin-top: 20vh'>ERROR: Email not formatted corectly<p>";
            } else if (strcmp($_GET["error"], "DoesNotExist") == 0) {
                echo"<p id='error' style='margin-top: 20vh'>ERROR: Email does not exist in database<p>";
            } else if (strcmp($_GET["error"], "EmailFailed") == 0) {
                echo"<p id='error' style='margin-top: 20vh'>ERROR: Something went wrong. Try again<p>";
            } else if (strcmp($_GET["error"], "WrongCode") == 0){
                echo"<p id='error' style='margin-top: 20vh'>ERROR: Incorrect code<p>";
            } else if (strcmp($_GET["error"], "passwordsDontMatch") == 0){
                echo"<p id='error' style='margin-top: 2.5vh'>ERROR: Passwords don't match<p>";
            }
        }



    ?>
</body>
</html>