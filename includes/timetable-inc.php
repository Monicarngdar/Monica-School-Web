<?php 
    require_once "dbh.php";
    require_once "functions.php";

    if(isset($_GET["action"]) && $_GET["action"]=="list")
    { 
         $timetable = getTimetables($conn);
    } 

    if(isset($_GET["action"]) && $_GET["action"] == "add"){
    $courses = getCourses($conn);
    $courseUnits = getUnits($conn);
    $classes = getClasses($conn);
    $lecturers = getLecturers($conn);
    $courseId = "";
    $unitId = "";
    $lecturerId = "";;
    $pageTitle = "Add Timetable";

}
    

    if(isset($_POST["action"]) && $_POST["action"] == "delete"){
       $classId = $_POST['id'];
       deleteClass($conn, $classId);
        header("location: list-class.php?deleted=true&action=list");   
        exit();
    }

      if(isset($_POST["action"]) && $_POST["action"] == "edit"){
    $class = getClass($conn, $_POST["id"]);
    $courses = getCourses($conn);
    $classId =  $class ['classId'];
    $courseId =  $class ['courseId'];
    $className  = $class ['className'];
    $classDescription  =  $class['classDescription'];
    $pageTitle = "Edit Class";

  }

  //This trigger for the save a class
    if (isset($_POST['submit'])&& $_POST ["submit"] == "save") {  
    $courseId = $_POST['courseId'];
    $classId = $_POST['classId'];
    $className = $_POST['className'];
    $classDescription = $_POST['classDescription'];
    $_GET["action"] = "save";
    saveClass($conn, $classId, $courseId, $className, $classDescription);

      header("location:  list-class.php?success=true&action=list");   
        exit();
    
}

  if (isset($_POST['submit'])&& $_POST ["submit"] == "add") {  
    $courseId = $_POST['courseId'];
    $className = $_POST['className'];
    $classDescription = $_POST['classDescription'];
    addClass($conn, $courseId, $className, $classDescription);

      header("location:  list-class.php?success=true&action=list");   
        exit();
    
}

  



?>