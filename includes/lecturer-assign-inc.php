<?php 
    require_once "dbh.php";
    require_once "functions.php";

if(isset($_GET["action"]) && $_GET["action"]=="list")
    {
         $lecturerAssignments = getLecturerAssignments($conn);
    } 

     if(isset($_GET["action"]) && $_GET["action"] == "add"){
    $courses= getCourses($conn);
     if(!isset($_POST["courseId"])){
        $courseId = 0;
     } else{
        $courseId = $_POST ["courseId"];
        $courseUnits = getCourseUnits($conn, $courseId);
     }
    $unitId= "";
    $unitName = "";
    $taskSubject = "";
    $taskDescription = "";
    $maxMark = "";
    $dueDate = "";
    $assignmentFile= "";
    $action = "add";

    }

     if(isset($_POST["action"]) && $_POST["action"] == "courseFieldSelection"){
    $courses= getCourses($conn);
     if(!isset($_POST["courseId"])){
        $courseId = 0;
     } else{
        $courseId = $_POST ["courseId"];
        $courseUnits = getCourseUnits($conn, $courseId);
     }
    $unitId= "";
    $unitName = "";
    $taskSubject = "";
    $taskDescription = "";
    $maxMark = "";
    $dueDate = "";
    $assignmentFile= "";
    $action = "add";

    }

 if(isset($_POST["action"]) && $_POST["action"] == "save"){
   
   $courseId = $_POST ["courseId"];
   $unitId = $_POST ["unitId"];
   $taskTitle = $_POST ["taskTitle"];
   $taskDescription = $_POST ["taskDescription"];
   $maxMark = $_POST ["maxMark"];
   $dueDate = $_POST ["dueDate"];
   $assignmentFile = $_POST ["assignmentFile"];
   addAssignment($conn, $assignmentFile, $unitId, $taskTitle, $taskDescription, $maxMark, $dueDate);
      }











    ?>