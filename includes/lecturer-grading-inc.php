<?php 
    require_once "dbh.php";
    require_once "functions.php";

if(isset($_GET["action"]) && $_GET["action"]=="list")
    {
         $lecturerGradingAssignnments = getGradingAssignments($conn, $_SESSION["userId"]);
    } 


       if(isset($_POST["action"]) && $_POST["action"] == "edit"){
             $submission = getSubmission($conn, $_POST["id"]);
             $studentId = $submission['studentId'];
             $assignmentId = $submission['assignmentId'];
             $assignment = getAssignment($conn, $assignmentId);
             $unitId = $assignment['unitId'];
             $unit = getUnit($conn, $unitId);
             $courseId = $unit ['courseId'];
             $course = getCourse($conn, $courseId);
             $user = getUserProfile($conn, $studentId);
             $name = $user['name'];
             $surname = $user['surname'];
             $unitName = $unit['unitName'];
             $courseName = $course['courseName'];
             $taskTitle = $assignment['taskTitle'];
             $maxMark = $assignment['maxMark'];
             $dueDate  =  $assignment['dueDate'];
              $files = getStudentAssignmentsFiles($conn, $studentId, $assignmentId);



    //$assignmentFile = $assignment['assignmentFile'];//

  }




















    ?>