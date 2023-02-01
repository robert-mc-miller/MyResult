<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/main.css">
    <title>Login</title>
</head>
<body id="loginBody">
    <?php
    session_start();
    // logs out user if they are still logged in when landing on the page
    if(isset($_SESSION["username"])){
    session_destroy();
    }

    ?>  

    <div id="title">
    <h1>MyResult</h1>
    
    <?php
        if(isset($_GET["error"])){
            if (strcmp($_GET["error"], "wrong") == 0){
                echo"<p id='error'>ERROR: Incorrect username or password</p>";
                }
            }

    ?>

    </div>
    <form action="login.inc.php" method="post" id='login'>
        <h1>Login</h1>
        <p class='emailInput'>Email/Username:</p>
        <input type="text" name="username" maxlength="50" autocomplete="off" required>
        <p>Password:</p>
        <input type="password" name="pass" maxlength="50" minlength="6" required>
        <br>
        <input type="submit" value="Login" class="submit">
        <br>
        <a href="signup.php">Don't already have an account?</a>
    </form>
    


</body>
</html>