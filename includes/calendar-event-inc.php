<?php
    require_once "dbh.php";
    require_once "functions.php";

    if (isset($_POST['action'])&& $_POST ["action"] == "save") {  
    $eventDate = $_POST['eventDate'];
    $eventDescription  = $_POST['eventDescription'];
    $eventType = $_POST['eventType'];
    $_GET["action"] = "save";
    addCalendar($conn, $eventDate, $eventDescription, $eventType);

      header("location: calendar.php?success=true&date=$eventDate");   
        exit();
    
}



?>