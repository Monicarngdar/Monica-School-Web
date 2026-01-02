<?php 
    require_once "dbh.php";
    require_once "functions.php";

if(isset($_GET["action"]) && $_GET["action"]=="list")
    {
         $lecturerAssignments = getAssignments($conn, $_SESSION["userId"]);
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
   $assignmentId = "";
    $taskTitle = "";
    $taskDescription = "";
    $maxMark = "";
    $dueDate = "";
    $assignmentFile= "";
    $action = "add";

    }

       if(isset($_POST["action"]) && $_POST["action"] == "delete"){
       $assignmentId = $_POST['id'];
        deleteAssignment($conn, $assignmentId);
        header("location: list-lecturer-assignments.php?deleted=true&action=list");   
        exit();
    }

        if(isset($_POST["action"]) && $_POST["action"] == "edit"){
             $courses= getCourses($conn);
             $assignment = getAssignment($conn, $_POST["id"]);
            

   $assignmentId  = $assignment ['assignmentId'];
    $courseId  = $assignment['courseId'];
    $courseUnits = getCourseUnits($conn, $courseId);
    $unitId  =  $assignment['unitId'];
    $taskTitle = $assignment['taskTitle'];
    $taskDescription = $assignment['taskDescription'];
    $maxMark = $assignment['maxMark'];
    $dueDate  =  $assignment['dueDate'];
    //$assignmentFile = $assignment['assignmentFile'];//

  }


     if(isset($_POST["courseFormAction"]) && $_POST["courseFormAction"] == "courseFieldSelection"){
    $courses= getCourses($conn);
     if(!isset($_POST["courseId"])){
        $courseId = 0;
     } else{
        $courseId = $_POST ["courseId"];
        $courseUnits = getCourseUnits($conn, $courseId);
     }
    $unitId=(empty($_POST ["unitId"]))?'':$_POST ["unitId"];
    $assignmentId=(empty($_POST ["assignmentId"]))?'':$_POST ["assignmentId"];
    $taskTitle = (empty($_POST ["taskTitle"]))?'':$_POST ["taskTitle"];
    $taskDescription = (empty($_POST ["taskDescription"]))?'':$_POST ["taskDescription"];
    $maxMark = (empty($_POST ["maxMark"]))?'':$_POST ["maxMark"];
    $dueDate =(empty($_POST ["dueDate"]))?'': $_POST ["dueDate"];
    $assignmentFile =(empty($_POST ["assignmentFile"]))?'': $_POST ["assignmentFile"];
    $action = "add";

    }

 if(isset($_POST["action"]) && $_POST["action"] == "save"){
   
   $courseId = $_POST ["courseId"];
   $assignmentId = $_POST ["assignmentId"];
   $unitId = $_POST ["unitId"]; 
   $taskTitle = $_POST ["taskTitle"];
   $taskDescription = $_POST ["taskDescription"];
   $maxMark = $_POST ["maxMark"];
   $dueDate = $_POST ["dueDate"];
   $assignmentFile = $_POST ["assignmentFile"];
   if(empty ($assignmentId)) {  
   addAssignment($conn, $unitId, $taskTitle, $taskDescription, $maxMark, $dueDate, $_SESSION["userId"]);

   } else{
   saveAssignment($conn, $assignmentId, $unitId, $taskTitle, $taskDescription, $maxMark, $dueDate, $_SESSION["userId"]);
   }
   
      header("location: list-lecturer-assignments.php?success=true&action=list");   
      exit();
      }











    ?>