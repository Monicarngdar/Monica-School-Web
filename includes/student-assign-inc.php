<?php 
    session_start();
    require_once "dbh.php";
    require_once "functions.php";

      if (!isset($_POST['submit'])&& !isset($_REQUEST ["action"])) {   // this will enforce the user to get redirected to the list page when there is no form data
             header("location: list-student-assignments.php?action=list");
            exit();
   }
    

if(isset($_GET["action"]) && $_GET["action"]=="list")
{
    $userId = $_SESSION["userId"];
    $studentAssignments = getStudentAssignments($conn, $userId );
} 

 if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "upload"){
        $assignment = getAssignment($conn, $_REQUEST["id"]);
        $assignmentId = $assignment ["assignmentId"];
        $courseName = $assignment ["courseName"];
        $unitName = $assignment ["unitName"];
        $taskTitle = $assignment ["taskTitle"];
        $taskDescription = $assignment ["taskDescription"];
        $maxMark = $assignment ["maxMark"];
        $dueDate = $assignment ["dueDate"];
         $userId = $_SESSION["userId"];
         $assignmentFile = getAssignmentFile($conn, $assignmentId);
   
         if($assignmentFile){
         $filePath = $assignmentFile['filePath'];
        $fileName = $assignmentFile['originalFileName'];
         }

      //  $assignmentFile = $assignment ["assignmentFile"];//
         $action = "upload";
          $files = getStudentAssignmentsFiles($conn, $userId, $assignmentId);
    }

        if(isset($_POST["action"]) && $_POST["action"] == "delete"){
        $fileName = $_POST['fileName'];
        $filePath = $_POST['filePath'];
        $fileId = $_POST['fileId'];
        $assignmentId = $_POST['assignmentId'];

        deleteStudentAssignmentFile($conn, $fileId);
        unlink($filePath);
        header("location: student-assign-deadlines.php?deleted=true&action=upload&id=$assignmentId");   
        exit();
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
        saveStudentAssignmentFile($conn, $assignmentId, $userId, $fileName, $newFileName, $uploadDir);
        $files = getStudentAssignmentsFiles($conn, $userId, $assignmentId);
      }
    }
  }


     if(isset($_POST["action"]) && $_POST["action"] == "submit"){
   

   $assignmentId = $_POST ["assignmentId"];
   $userId = $_SESSION["userId"];

   saveStudentSubmission($conn, $userId, $assignmentId);

     header("location: list-student-assignments.php?action=list&success=true");
      exit();
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