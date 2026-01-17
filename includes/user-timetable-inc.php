<?php 
    require_once "dbh.php";
    require_once "functions.php";

      $slots = [
                            "08:00 - 08:30",
                            "08:30 - 09:00",
                            "09:00 - 09:30",
                            "09:30 - 10:00",
                            "10:00 - 10:30",
                            "10:30 - 11:00",
                            "11:00 - 11:30",
                            "11:30 - 12:00",
                            "12:00 - 12:30",
                            "12:30 - 13:00",
                            "13:00 - 13:30",
                            "13:30 - 14:00",
                            "14:00 - 14:30",
                            "14:30 - 15:00",
                            "15:00 - 15:30",
                            "15:30 - 16:00",
                            "16:00 - 16:30",
                            "16:30 - 17:00",
                            "17:00 - 17:30",
                            "17:30 - 18:00",
                            "18:00 - 18:30",
                            "18:30 - 19:00",
                        ];
                        

$userType = $_SESSION['userRole'];
$userId =  $_SESSION["userId"] ;

$userClass = getUserClass($conn, $userId);
$classId = $userClass["classId"];

$monSlotNumber = 0;
$tueSlotNumber = 0;


$monHalfHours = 0;
$tueHalfHours = 0;
$wedHalfHours = 0;
$thursHalfHours = 0;
$friHalfHours = 0;


$wedSlotNumber = 0;
$thursSlotNumber = 0;
$friSlotNumber = 0;







    ?>