<?php

if (isset($_POST["email"])){
    $email = $_POST["email"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: forgotPassword.php?error=mustinclude@');
    }

// check if email exists in database error if not
    // send email with code
    // return to fogotonPassword with number box for code  (warn not to close page)
    $db = mysqli_connect("localhost", "root", "", "MyResult") or die(mysqli_connect_error());
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result) < 1){
        header('Location: forgotPassword.php?error=DoesNotExist');
    } else{

    session_start();
    $_SESSION['resetEmail'] = $email;
    $_SESSION["ResetCode"] = rand(100000, 999999);

    $to_email = $email;
    $subject = "Your password reset code";
    $body = "Hi,<br> This is your password reset code for MyResult. <h1>".$_SESSION['ResetCode']."</h1>";
    $headers = "Content-type: text/html\r\n";

    if (mail($to_email, $subject, $body, $headers)){
            header('Location: forgotPassword.php?email=success');
    }   
    else{
            header('Location: forgotPassword.php?error=EmailFailed');
        }

    }

} else{
    session_start();
    if (isset($_POST['code'])){
        if(strcmp($_POST['code'], $_SESSION['ResetCode']) == 0){
            header('Location: forgotPassword.php?reset=True');
        } else{
            header('Location: forgotPassword.php?email=success&error=WrongCode');
        }
    } else if(isset($_POST['pass'])){
        if($_POST['pass'] == $_POST['confirm-pass']){
            session_start();
            $db = mysqli_connect("localhost", "root", "", "MyResult") or die(mysqli_connect_error());
            $md5pass = md5($_POST['pass'],0);
            $query = "UPDATE user SET user.password = '".$md5pass."' WHERE email = '".$_SESSION['resetEmail']."';";
            mysqli_query($db, $query);
            mysqli_close($db);
            session_destroy();
            header("Location: forgotPassword.php?complete=True");
        } else {
            header("Location: forgotPassword.php?reset=True&error=passwordsDontMatch");
        }
    }
    
    else{
        header('Location: forgotPassword.php');
    }
}



?>