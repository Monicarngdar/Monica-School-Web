<?php 
    require_once "dbh.php";
    require_once "functions.php";

    if(isset($_GET["action"]) && $_GET["action"]=="list")
    { 
         $timetables = getTimetables($conn);
    } 

    if(isset($_GET["action"]) && $_GET["action"] == "add"){
    $courseUnits = getUnits($conn);
    $classes = getClasses($conn);
    $lecturers = getLecturers($conn);
    $unitTimetableId = "";
    $classId = "";
    $courseId = "";
    $unitId = "";
    $lecturerId = "";
    $startTime = "";
    $room = "";
    $day = "";
    $endTime = "";
    $pageTitle = "Add Timetable";

}
    

    if(isset($_POST["action"]) && $_POST["action"] == "delete"){
       $unitTimetableId = $_POST['id'];
       deleteTimetable($conn, $unitTimetableId);
        header("location: list-timetables.php?deleted=true&action=list");   
        exit();
    }

      if(isset($_POST["action"]) && $_POST["action"] == "edit"){
    $timetable = getTimetable($conn, $_POST["id"]);
    $courseUnits = getUnits($conn);
    $classes = getClasses($conn);
    $lecturers = getLecturers($conn);

    $unitTimetableId =  $timetable['unitTimetableId'];
    $classId =  $timetable['classId'];
    $unitId =  $timetable['unitId'];
    $lecturerId =  $timetable ['lecturerId'];
    $room=  $timetable ['room'];
    $day =  $timetable ['day'];
    $startTime =  date("H:i", strtotime($timetable["startTime"]));
    $endTime =  date("H:i", strtotime($timetable["endTime"]));
    $pageTitle = "Edit Timetable";

  }

  //This trigger for the save a timetable 
    if (isset($_POST['submit'])&& $_POST ["submit"] == "save") {  
    $classId = $_POST['classId'];
    $unitId = $_POST['unitId'];
    $lecturerId = $_POST['lecturerId'];
    $room = $_POST['room'];
    $day = $_POST['day'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $unitTimetableId = $_POST['id'];

  
    $_GET["action"] = "save";
    saveTimetable($conn, $classId, $unitId, $lecturerId, $room, $day, $startTime, $endTime, $unitTimetableId);

      header("location:  list-timetables.php?success=true&action=list");   
        exit();
    
}

  if (isset($_POST['submit'])&& $_POST ["submit"] == "add") {  
    $unitId = $_POST['unitId'];
    $lecturerId = $_POST['lecturerId'];
    $classId = $_POST['classId'];
    $room = $_POST['room'];
    $day = $_POST['day'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    addTimetable($conn, $unitId, $classId,  $room, $day, $startTime, $endTime, $lecturerId,);

      header("location:  list-timetables.php?success=true&action=list");   
        exit();
    
}

  



?>