<?php
    session_start();
    if (isset($_SESSION["uname"])){
        $uname = $_SESSION["uname"];
        echo "<h1>Hello $uname</h1>
            <h2>Where do you want to go?</h2>
            <a href='main_session.php'>To main page</a>
            <a href='login_session.php'>LOGOUT</a>";
    } 
    else if(isset($_POST['uname'])){
        $_SESSION["uname"] = $_POST["uname"];
        $uname = $_SESSION["uname"];
        echo "<h1>Hello $uname</h1>
        <h2>Where do you want to go?</h2>
        <a href='main_session.php'>To main page</a>
        <a href='login_session.php'>LOGOUT</a>";
    }


    else{
        echo "<h1>You do not have permission to access this area</h1>
        <a href='login_session.php'>LOGIN</a>";
    }

?>