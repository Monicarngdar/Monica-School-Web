<?php 
    require_once "dbh.php";
    require_once "functions.php";

      if (!isset($_POST['submit'])&& !isset($_REQUEST ["action"])) {   // this will enforce the user to get redirected to the list page when there is no form data
             header("location: list-units.php?action=list");
            exit();
   }

if(isset($_GET["action"]) && $_GET["action"]=="list")
    {
         $units = getUnits($conn);
    } 

     if(isset($_GET["action"]) && $_GET["action"] == "add"){
    $unitName = "";
    $unitDescription =  "";
    $courseId = "";
    $semester = "";
    $unitId = "";
    $pageTitle = "Add Unit";
    $action = "add";
    $courses = getCourses($conn);

    }
    

if(isset($_POST["action"]) && $_POST["action"] == "delete"){
       $unitId = $_POST['id'];
       deleteUnit($conn, $unitId);
        header("location: list-units.php?deleted=true&action=list");   
        exit();
    }

  if(isset($_POST["action"]) && $_POST["action"] == "edit"){
    $unit = getUnit($conn, $_POST["id"]);
     $courses = getCourses($conn);

    $unitName = $unit ['unitName'];
    $unitDescription =  $unit['unitDescription'];
    $courseId = $unit['courseId'];
    $semester = $unit['semester']; 
    $unitId = $unit["unitId"];
    $pageTitle = "Edit Unit";
    $action ="save";
    }

    if (isset($_POST['submit'])&& $_POST ["action"] == "add") {  
    $unitName = $_POST['unitName'];
    $unitDescription = $_POST['unitDescription'];
    $courseId = $_POST['courseId'];
    $semester = $_POST['semester'];
    addUnit($conn, $unitName, $unitDescription, $courseId, $semester);

      header("location: list-units.php?success=true&action=list");   
        exit();
    
}

//This trigger for the save unit
    if (isset($_POST['submit'])&& $_POST ["action"] == "save") {  
    $unitName = $_POST['unitName'];
    $unitId = $_POST["unitId"];
    $unitDescription = $_POST['unitDescription'];
    $courseId = $_POST['courseId'];
    $semester = $_POST['semester'];
    $_GET["action"] = "save";
    saveUnit($conn, $unitName, $unitId, $unitDescription, $courseId, $semester);

      header("location:  list-units.php?success=true&action=list");   
        exit();
    
}
    
    
//This trigger only for add new unit
if (isset($_POST['submit'])) {  
    $unitName = $_POST['unitName'];
    $unitDescription = $_POST['unitDescription'];
    $courseId = $_POST['courseId'];
    $semester = $_POST['semester'];
    addUnit($conn, $unitName, $unitDescription, $courseId, $semester);

      header("location: list-units.php?success=true");   
        exit();
    
}
    
    
    


?>