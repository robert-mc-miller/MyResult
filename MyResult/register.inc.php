<?php

// checks if the form has been submitted
if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["confirm-pass"]) && isset($_POST["account"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $confirm_pass = $_POST["confirm-pass"];
    $type = $_POST["account"];

    // checks if the password and confirm password fields match
    if($pass == $confirm_pass){

    // query and database connection
    $db = mysqli_connect("localhost", "MyResult", "MYR123!", "MyResult") or die(mysqli_connect_error());
    $query = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($db, $query);

    // if the username and/or email have not already been used then account will be created
    // and user will be redirected to index.php
    if(mysqli_num_rows($result) < 1){
        $query = "INSERT INTO user VALUES('$username', '$email', '$pass', '$type')";
        mysqli_query($db, $query);
        mysqli_close($db);
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["type"] = $type; 
        header('Location: index.php');
    } else {
        // redirects user back to signup.php with error message if the 
        // username/email is not unique
        mysqli_close($db);
        header('Location: signup.php?error=notunique');
    }
    } else {
        // redirects user to login.php with error message if passwords don't match
        header('Location: signup.php?error=nomatch'); 
    }
}  
else {
    // if the form has not been submitted the user is redirected to signup.php
    header('Location: signup.php');
}

?>