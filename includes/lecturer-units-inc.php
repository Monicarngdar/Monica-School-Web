<?php 
    require_once "dbh.php";
    require_once "functions.php";
  lecturerPage();//Inforce lecturer in this page

    //Get student unit lists to show in the page
    $lecturerUnits = getLecturerMyUnits($conn, $_SESSION['userId']);



   ?>