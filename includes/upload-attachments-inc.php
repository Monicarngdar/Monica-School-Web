<?php 

require_once "dbh.php";
require_once "functions.php";

if(!isset($_POST["uploadFile"])){
    header("location: ../edit-profile.php");
    exit();
}
else{
    session_start();

    // We can have multiple forms on the same page, each of them pointing to the same PHP file through their action. If we add the value attribute to the submit buttons of these forms, we can check which form was submitted. 

    // If the submitted form's submit button's value is 'upload' :
    if($_POST["uploadFile"] == "upload"){
        $userId = $_SESSION["userId"];

        // The $_FILES global variable is used for files uploaded by the user
        // This is a temporary upload within the project's memory, however, and is not added to the project yet as a permanent addition

        // print_r($_FILES);
        // die();
        $fileName = $_FILES["userFile"]["name"];
        $fileTmpName = $_FILES["userFile"]["tmp_name"];
        $fileSize = $_FILES["userFile"]["size"];
        $fileError = $_FILES["userFile"]["error"];
        $fileType = $_FILES["userFile"]["type"];

        // We can select what types of files we allow 
        $allowed = array("jpg","jpeg","png","webp");
        $fileTypeArray = explode(".",$fileName);
        $fileExtActual = end($fileTypeArray);
        $fileExt = strtolower($fileExtActual);

        // Validation of the chosen file types
        if(!in_array($fileExt, $allowed)){
            header("location: ../edit-profile.php?error=filetype");
            exit();
        }

        // Check if file upload had any errors (such as network issues)
        if($fileError!=0){
            header("location: ../edit-profile.php?error=fileUpload");
            exit();
        }

        if($fileSize > 1000000000){
            // Calculated in bytes
            // 1024 bytes = 1kb
            // 1024kb = 1mb
            header("location: ../edit-profile.php?error=fileSize");
            exit();
        }

        // creates a unique id so that all uploaded files have a unique file name
        // we also add the User Id to the name so that we can identify it later on
        $newFileName = uniqid($userId."-",true).".".$fileExt;
        $uploadDir = "../imageUploads/".$newFileName;
        // echo $newFileName;
        // die();

        // The move_uploaded_file actually adds the chosen file into the project, 
        // depending on the directory we pass as a parameter 
        move_uploaded_file($fileTmpName, $uploadDir);

        // Here we should add a link between the image and the user
        // This should be done in the database and requires a new field in the User table 
        $imageId = createProfileImage($conn, $userId, $newFileName);
        editProfileImage($conn, $userId, $imageId);

        header("location: ../edit-profile.php?succes=true");
        exit();



    }
}




?>