<?php
// check if first form has been submited
if (isset($_POST["email"])){
    $email = $_POST["email"];
    
    // check if the email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: forgotPassword.php?error=mustinclude@');
    }

    // check if email exists in database
    $db = mysqli_connect("localhost", "MyResult", "MYR123!", "MyResult") or die(mysqli_connect_error());
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result) < 1){
        header('Location: forgotPassword.php?error=DoesNotExist');
    } else{
        // generate and email password reset code
        session_start();
        $_SESSION['resetEmail'] = $email;
        $_SESSION["ResetCode"] = rand(100000, 999999);

        $to_email = $email;
        $subject = "Your password reset code";
        $body = "Hi,<br> This is your password reset code for MyResult. <h1>".$_SESSION['ResetCode']."</h1>";
        $headers = "Content-type: text/html\r\n";

        // if email is successful move user to next form
        // else display email failed error message
        if (mail($to_email, $subject, $body, $headers)){
                header('Location: forgotPassword.php?email=success');
        }   
        else{
                header('Location: forgotPassword.php?error=EmailFailed');
            }

    }

} 

// if the first form hasn't been submitted
else{

    // check if user has entered code
    session_start();
    if (isset($_POST['code'])){
        // check if reset code is correct. If so move user to next stage
        // otherwise display wrong code error message
        if(strcmp($_POST['code'], $_SESSION['ResetCode']) == 0){
            header('Location: forgotPassword.php?reset=True');
        } else{
            header('Location: forgotPassword.php?email=success&error=WrongCode');
        }

    // check if user has entered new password
    } else if(isset($_POST['pass'])){
        // check if passwords entered match and if so update the database
        if($_POST['pass'] == $_POST['confirm-pass']){
            session_start();
            $db = mysqli_connect("localhost", "MyResult", "MYR123!", "MyResult") or die(mysqli_connect_error());
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