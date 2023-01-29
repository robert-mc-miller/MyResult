<?php

    session_start();
    if (isset($_SESSION['uname'])){
        session_destroy();
    }

    echo "<h1>A secret Session</h1>
    <p>Log in here</p>
    <form action='my_page.php' method='post'>
        <label>Username:</label>
        <input type='text' name='uname'>
        <br>
        <br>
        <label>Password:</label>
        <input type='password' name='pass'>
        <br>
        <br>
        <input type='submit' value='Login'>
        </form>";



?>