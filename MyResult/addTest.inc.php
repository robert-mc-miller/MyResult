<?php
session_start();
// check form was submitted
if (isset($_POST["title"])&&isset($_POST["score"])&&isset($_POST["totalMarks"])&&isset($_POST["studentsUsername"])){
    
    // select the details of students with the given username 
    $db = mysqli_connect("localhost", "MyResult", "MYR123!", "MyResult") or die(mysqli_connect_error());
    $query = "SELECT * FROM user WHERE username = '".$_POST['studentsUsername']."' AND accountType = 'Student'";
    $result = mysqli_query($db, $query);

    // check that the users score is less than or equal to the number of marks
    // that the test was out of
    if ($_POST['score'] > $_POST['totalMarks']){
        header("location: addTest.php?error=score");
    } 

    // check that the entered students username does exist
    else if(mysqli_num_rows($result) < 1){
        header("location: addTest.php?error=userDoesNotExist");
    } else{

    // Add the test details to the database
    $title = $_POST['title'];
    $score = $_POST['score'];
    $outOf = $_POST['totalMarks'];
    $studentUsername = $_POST['studentsUsername'];
    $teacherUsername = $_SESSION['username'];
    $comments = $_POST['comments'];
    $query = "INSERT INTO test(title, score, outOf, studentUsername, teacherUsername, comments) VALUES('$title', $score, $outOf, '$studentUsername', '$teacherUsername', '$comments');";
    $result = mysqli_query($db, $query);    
    header("location: addTest.php?added=True");
    }

// send user back to login.php if they try to access the page without submitting the form
} else {
    header("location: login.php");
}























?>