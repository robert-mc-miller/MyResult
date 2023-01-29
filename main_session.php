<?php
    session_start();
    if (isset($_SESSION["uname"])){
        $uname = $_SESSION["uname"];
        echo "<h1>Welcome to the main Page $uname</h1>
            <h2>Where do you want to go?</h2>
            <a href='options_session.php'>Options</a>
            <a href='login_session.php'>LOGOUT</a>";
    } 

    else{
        echo "<h1>You do not have permission to access this area</h1>
        <a href='login_session.php'>LOGIN</a>";
    }

?>