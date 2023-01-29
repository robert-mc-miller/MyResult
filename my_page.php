<?php
function page_content($uname){
    echo '<h1>' . $uname . ' this is the main page...</h1>
    <p>What information do you need?</p>
    <ul>
        <li><a href="passports.php">Fake passports</a></li>
        <li><a href="contacts.php">Usefull passports</a></li>
        <li><a href="tools.php">Tools</a></li>
    </ul>
    <a href="index_session.php">logout</a>';


}

function deny() {
    echo "<h1>Access Restricted</h1>
    <p>You do not have permission to access this page</p>
    <a href='index_session.php'>Login</a>";
}

$u_p = array("user1" => "pass1", "user2" => "pass2");

session_start();
if(isset($_SESSION['uname'])){
    $uname = $_SESSION['uname'];
    $pass = $_SESSION['pass'];
    if (isset($u_p[$uname])){
    if ($u_p[$uname] == $pass){
        page_content($uname);
    } else {
        deny();
    }} else {
        deny();
    }
}
 else if(isset($_POST['uname'])){
    $_SESSION['uname'] = $_POST['uname'];
    $uname = $_POST['uname'];
    $_SESSION['pass'] = $_POST['pass'];
    $pass = $_POST['pass'];
    if (isset($u_p[$uname])){
        if ($u_p[$uname] == $pass){
            page_content($uname);
        } else {
            deny();
        }} else {
            deny();
        }
    }
 else {
    deny();
}


?>