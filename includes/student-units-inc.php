<?php 
    require_once "dbh.php";
    require_once "functions.php";
  studentPage();//Inforce student in this page

    //Get student unit lists to show in the page
    $studentUnits = getStudentMyUnits($conn, $_SESSION['userId']);



   ?>