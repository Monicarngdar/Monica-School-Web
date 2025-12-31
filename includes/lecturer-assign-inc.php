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
    $assignment = getAssignment($conn, $_POST["id"]);

   $assignmentId  = $assignment ['assignmentId'];
    $courseId  = $assignment['courseId'];
    $unitId  =  $assignment['unitId'];
    $taskTitle = $assignment['taskTitle'];
    $taskDescription = $assignment['taskDescription'];
    $maxMark = $assignment['maxMark'];
    $dueDate  =  $assignment['dueDate'];
    //$assignmentFile = $assignment['assignmentFile'];//

  }


     if(isset($_POST["action"]) && $_POST["action"] == "courseFieldSelection"){
    $courses= getCourses($conn);
     if(!isset($_POST["courseId"])){
        $courseId = 0;
     } else{
        $courseId = $_POST ["courseId"];
        $courseUnits = getCourseUnits($conn, $courseId);
     }
    $unitId=(empty($_POST ["unitId"]))?'':$_POST ["unitId"];
    $taskTitle = (empty($_POST ["taskTitle"]))?'':$_POST ["taskTitle"];
    $taskDescription = (empty($_POST ["taskDescription"]))?'':$_POST ["taskDescription"];
    $maxMark = (empty($_POST ["maxMark"]))?'':$_POST ["maxMark"];
    $dueDate =(empty($_POST ["dueDate"]))?'': $_POST ["dueDate"];
    $assignmentFile =(empty($_POST ["assignmentFile"]))?'': $_POST ["assignmentFile"];
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
   addAssignment($conn, $assignmentFile, $unitId, $taskTitle, $taskDescription, $maxMark, $dueDate, $_SESSION["userId"]);

      header("location: list-lecturer-assignments.php?success=true&action=list");   
      exit();
      }











    ?>