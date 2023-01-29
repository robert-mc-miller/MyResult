<?php

    session_start();
    if (isset($_SESSION['uname'])){
        session_destroy();
    }

    echo "<form action='options_session.php' method='post'>
        <input type='text' name='uname'>
        <input type='submit'>
        </form>";



?>
<a href="options_session.php">options</a>
<a href="main_session.php">main</a>