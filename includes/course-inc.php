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
        header("location: list-courses.php?deleted=true&action=list");   
        exit();
    }

      if(isset($_POST["action"]) && $_POST["action"] == "edit"){
    $course = getCourse($conn, $_POST["id"]);
    $courseId  = $course ['courseId'];
    $courseName  = $course ['courseName'];
    $courseDescription  =  $course['courseDescription'];
    $credits = $course['credits'];
    $pageTitle = "Edit Course";

  }

  //This trigger for the save unit
    if (isset($_POST['submit'])&& $_POST ["submit"] == "save") {  
    $courseId = $_POST['courseId'];
    $courseName = $_POST['courseName'];
    $courseDescription = $_POST['courseDescription'];
    $credits = $_POST['credits'];
    $_GET["action"] = "save";
    saveCourse($conn, $courseId, $courseName, $courseDescription, $credits);

      header("location:  list-courses.php?success=true&action=list");   
        exit();
    
}

  if (isset($_POST['submit'])) {  
    $courseName = $_POST['courseName'];
    $courseDescription = $_POST['courseDescription'];
    $credits = $_POST['credits'];
    addCourse($conn, $courseName, $courseDescription, $credits);

      header("location:  list-courses.php?success=true");   
        exit();
    
}

  



?>