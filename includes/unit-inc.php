<?php 
    require_once "dbh.php";
    require_once "functions.php";

if(isset($_POST["action"])){
    if($_POST["action"] == "delete");
       $unitId = $_POST['id'];
       deleteUnit($conn, $unitId);

         header("location: ../list-units.php");   
        exit();

}

if (isset($_POST['submit'])) {  
    $unitName = $_POST['unitName'];
    $unitDescription = $_POST['unitDescription'];
    $courseId = $_POST['courseId'];
    $semester = $_POST['semester'];
    addUnit($conn, $unitName, $unitDescription, $courseId, $semester);

      header("location: ../unit.php");   
        exit();
    
}
    
    
    


?>