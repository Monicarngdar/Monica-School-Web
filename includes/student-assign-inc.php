<?php 
    require_once "dbh.php";
    require_once "functions.php";
    

if(isset($_GET["action"]) && $_GET["action"]=="list")
{
         $studentAssignments = getStudentAssignments($conn, $_SESSION["userId"]);
} 

 if(isset($_POST["action"]) && $_POST["action"] == "upload"){
        $assignment = getAssignment($conn, $_POST["id"]);
        $assignmentId = $assignment ["assignmentId"];
        $courseName = $assignment ["courseName"];
        $unitName = $assignment ["unitName"];
        $taskTitle = $assignment ["taskTitle"];
        $taskDescription = $assignment ["taskDescription"];
        $maxMark = $assignment ["maxMark"];
        $dueDate = $assignment ["dueDate"];
         $userId = $_SESSION["userId"];
      //  $assignmentFile = $assignment ["assignmentFile"];//
         $action = "upload";
          $files = getStudentAssignmentsFiles($conn, $userId, $assignmentId);

    }

     if(isset($_POST["action"]) && $_POST["action"] == "uploadFiles"){
        $assignment = getAssignment($conn, $_POST["assignmentId"]);
        $assignmentId = $assignment ["assignmentId"];
        $courseName = $assignment ["courseName"];
        $unitName = $assignment ["unitName"];
        $taskTitle = $assignment ["taskTitle"];
        $taskDescription = $assignment ["taskDescription"];
        $maxMark = $assignment ["maxMark"];
        $dueDate = $assignment ["dueDate"];
         $userId = $_SESSION["userId"];

if (isset($_FILES['assignmentFile'])){
  $fileCount = count ($_FILES["assignmentFile"]["name"]);

}
for ($i = 0; $i < $fileCount; $i++) {
        if ( $_FILES['assignmentFile']['error'] [$i] === UPLOAD_ERR_OK){

        $fileName = $_FILES["assignmentFile"]["name"] [$i];
        $fileTmpName = $_FILES["assignmentFile"]["tmp_name"] [$i];
        $fileSize = $_FILES["assignmentFile"]["size"] [$i];
        $fileError = $_FILES["assignmentFile"]["error"] [$i];
        $fileType = $_FILES["assignmentFile"]["type"] [$i];

        $allowed = array("pdf", "jpg", "jpeg", "png" ,"docx", "pptx" ,"txt");
        $fileTypeArray = explode(".",$fileName);
        $fileExtActual = end($fileTypeArray);
        $fileExt = strtolower($fileExtActual);
       

        if(!in_array($fileExt, $allowed)){
            header("location: ../student-assign-deadlines.php?error=filetype");
            exit();
        }

        if($fileError!=0){
            header("location: ../student-assign-deadlines.php?error=fileUpload");
            exit();
        }

        if($fileSize > 1000000000){
       
            header("location: ../student-assign-deadlines.php?error=fileSize");
            exit();
        }

        $newFileName = uniqid($userId."-".$fileName,true).".".$fileExt;
        $uploadDir = "studentAssignment/".$newFileName;
        
        move_uploaded_file($fileTmpName, $uploadDir);
        saveStudentAssignmentFile($conn, $assignmentId, $userId, $newFileName, $uploadDir);
        $files = getStudentAssignmentsFiles($conn, $userId, $assignmentId);
      }
    }
  }


     if(isset($_POST["action"]) && $_POST["action"] == "save"){
   
   $courseId = $_POST ["courseId"];
   $assignmentId = $_POST ["assignmentId"];
   $unitId = $_POST ["unitId"]; 
   $taskTitle = $_POST ["taskTitle"];
   $taskDescription = $_POST ["taskDescription"];
   $maxMark = $_POST ["maxMark"];
   $dueDate = $_POST ["dueDate"];
   if(empty ($assignmentId)) {  
    $assignmentId = addAssignment($conn, $unitId, $taskTitle, $taskDescription, $maxMark, $dueDate, $_SESSION["userId"]);
   } else{
   saveAssignment($conn, $assignmentId, $unitId, $taskTitle, $taskDescription, $maxMark, $dueDate, $_SESSION["userId"]);
   }
}

/*(
    [assignmentFile] => Array
        (
            [name] => Array
                (
                    [0] => Academic Integrity and AI Policy_V1_0 1.pdf
                    [1] => test-php.pdf
                )

            [full_path] => Array
                (
                    [0] => Academic Integrity and AI Policy_V1_0 1.pdf
                    [1] => test-php.pdf
                )

            [type] => Array
                (
                    [0] => application/pdf
                    [1] => application/pdf
                )

            [tmp_name] => Array
                (
                    [0] => C:\Users\monic\Desktop\XAMPP\tmp\php975E.tmp
                    [1] => C:\Users\monic\Desktop\XAMPP\tmp\php975F.tmp
                )

            [error] => Array
                (
                    [0] => 0
                    [1] => 0
                )

            [size] => Array
                (
                    [0] => 164653
                    [1] => 29635
                )

        ) */

     ?>