<?php 
    require_once "dbh.php";
    require_once "functions.php";
    studentPage();//Inforce student in this page

    //Get graded assignments to show in the page
    $grades = getStudentGrades($conn, $_SESSION['userId']);


    ?>