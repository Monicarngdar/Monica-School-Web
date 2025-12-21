<?php 
    require_once "dbh.php";
    require_once "functions.php";

    if(isset($_GET["action"]) && $_GET["action"]=="list")
    {
         $courses = getCourses($conn);
    } 

    if(isset($_GET["action"]) && $_GET["action"] == "add"){
    $courseName = "";
    $courseDescription = "";
    $credits = "";
    $pageTitle = "Add Course";
}
    

    if(isset($_POST["action"]) && $_POST["action"] == "delete"){
       $courseId = $_POST['id'];
       deleteCourse($conn, $courseId);
        header("location: ../list-courses.php");   
        exit();
    }

      if(isset($_POST["action"]) && $_POST["action"] == "edit"){
    $course = getCourse($conn, $_POST["id"]);

    $courseName  = $course ['courseName'];
    $courseDescription  =  $course['courseDescription'];
    $credits = $course['credits'];
    $pageTitle = "Edit Course";

  }

  if (isset($_POST['submit'])) {  
    $courseName = $_POST['courseName'];
    $courseDescription = $_POST['courseDescription'];
    $credits = $_POST['credits'];
    addCourse($conn, $courseName, $courseDescription, $credits);

      header("location: ../course.php?success=true");   
        exit();
    
}

  



?>