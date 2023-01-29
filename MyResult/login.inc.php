<?php

// Checks if form has been submitted 
if(isset($_POST["username"]) && isset($_POST["pass"])){
    session_start();
    $username = $_POST["username"];
    $pass = $_POST["pass"];

    // database connection and query
    $db = mysqli_connect("localhost", "MyResult", "MYR123!", "MyResult") or die(mysqli_connect_error());
    $query = "SELECT * FROM user WHERE username = '$username' OR email = '$username'";
    $result = mysqli_query($db, $query);

    $match = False;
    // check if password from the query result matches the entered password
    // if so the user is redirected to index.php
    while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
        if (strcmp($pass, $row[2]) == 0){
            $_SESSION["username"] = $username;
            $_SESSION["type"] = $row[3];
            $match = True;
        }   
    }

    // Redirects user to login.php with an error if the password entered does
    // not match the password from the query
    if ($match == False){ 
        header('Location: login.php?error=wrong');
    } else {
        header('Location: index.php');
    }

} else{
    // If the form has not been submited the user will be redirected to the login page
    header('Location: login.php');
}





?>