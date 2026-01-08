<?php 
    require_once "dbh.php";
    require_once "functions.php";

    //Form to list the student submissions
if(isset($_GET["action"]) && $_GET["action"]=="list")
    {
         $lecturerGradingAssignnments = getGradingAssignments($conn, $_SESSION["userId"]);
    } 

    
//Form to edit the mark
       if(isset($_POST["action"]) && $_POST["action"] == "edit"){
             $submission = getSubmission($conn, $_POST["id"]); //get the student submission
             $studentId = $submission['studentId'];
             $assignmentId = $submission['assignmentId'];
             $assignment = getAssignment($conn, $assignmentId); //get the assignmentId to get the unitId, userId and assignment Information
             $unitId = $assignment['unitId'];
             $lecturerId = $assignment ['userId'];
             $unit = getUnit($conn, $unitId); //get the unit, to get the unit name and course
             $courseId = $unit ['courseId'];
             $course = getCourse($conn, $courseId); //get the course information
             $user = getUserProfile($conn, $studentId); //get the name and surname of the student
             $name = $user['name'];
             $surname = $user['surname'];
             $unitName = $unit['unitName'];
             $courseName = $course['courseName'];
             $taskTitle = $assignment['taskTitle'];
             $maxMark = $assignment['maxMark'];
             $dueDate  =  $assignment['dueDate'];
              $files = getStudentAssignmentsFiles($conn, $studentId, $assignmentId); //get the files submiited by the student from the assignments

  }

  //Form submission to save the marks and lecturer comments
   if(isset($_POST["action"]) && $_POST["action"] == "save"){

             $assignmentId = $_POST['assignmentId'];
             $lecturerId = $_POST['lecturerId'];
             $studentId = $_POST['studentId'];
             $marksEarned	= $_POST['marksEarned'];
             $lecturerComment = $_POST['lecturerComment'];
            addGrading($conn, $studentId, $assignmentId, $lecturerId, $marksEarned, $lecturerComment );
             header("location: list-grading-collection.php?success=true&action=list");   
             exit();

  }





















    ?>