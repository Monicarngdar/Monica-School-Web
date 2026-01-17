<?php
 require_once "dbh.php";
 require_once "functions.php";

  if(isset($_GET["action"]) && $_GET["action"]=="list")
    {
         $users = getUsers($conn);
    }

    //This trigger for the save a user
    if (isset($_POST['submit'])&& $_POST ["action"] == "save") {  
    $userId =  $_POST['userId'];
    $username =  $_POST['username'];
    $password =  $_POST['password'];
    $confpass=  $_POST['confpass'];
    $name =  $_POST['name'];
    $surname =  $_POST['surname'];
    $email =  $_POST['email'];
    $date_of_birth =  $_POST['date_of_birth'];
    $street1 =  $_POST['street1'];
    $street2 =  $_POST['street2'];
    $city = $_POST['city'];
    $postCode =  $_POST['postCode'];
    $courseId = $_POST['courseId'];
    $classId = $_POST['classId'];

    $pageTitle = "Edit User";

    
     $error = "";

        if(emptyUserInput($username, $name,$surname,$date_of_birth ,$email)){
            $error = $error."missingFields=true&";
        }

        if(invalidUsername($username)){
            $error = $error."invalidUsername=true&";
        }

        if(invalidEmail($email)){
            $error = $error."invalidEmail=true&";
        }

        if(passwordsDoNotMatch($password, $confpass)){
            $error = $error."passwordsDoNotMatch=true&";
        }

        if($error != ""){
            header("location: ../user.php?error=true&id=$userId&action=edit&$error");
            exit();
        }

    saveProfileAdmin($conn, $userId, $name, $surname, $email, $date_of_birth, $street1, $street2, $city, $postCode);
    saveAccountAdmin($conn, $userId, $username);
    deleteEnrolment($conn, $userId);
     if(!empty ($courseId)){
    addEnrolment($conn, $userId, $courseId);
     }
     deleteUserClass($conn, $userId);
     if(!empty ($classId)){
    addUserClass($conn,  $classId, $userId);
     }


      header("location:  ../list-users.php?success=true&action=list");   
        exit();
}
/*
//This condition will trigger when there is an error in the save page
  if(isset($_GET["action"]) && $_GET["action"] == "edit"){
    $user = getUser($conn, $_GET["id"]);
    $profile = getUserProfile($conn, $_GET["id"]);
  
    $userId =  $user ['userId'];
    $username =  $user ['username'];
    $password =  $user['password'];
    $roleId =  $user['roleId'];
    $name =  $profile['name'];
    $surname =  $profile['surname'];
    $email =   $profile['email'];
    $date_of_birth =  $profile['date_of_birth'];
    $street1 =  $profile['street1'];
    $street2 = $profile['street2'];
    $city =  $profile['city'];
    $postCode = $profile['postCode'];
    $pageTitle = "Edit User";
    $courses = getCourses($conn);
    $courseId = getEnrolledCourse($conn, $_GET["id"]);
    $action ="save";
    }
*/

//This condition will trigger when the user will click edit from the list page
// chnaged from $_POST to $_REQUEST to avoid duplicate code when redirected with errors
  if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "edit"){

    $user = getUser($conn, $_REQUEST["id"]);
    $profile = getUserProfile($conn, $_REQUEST["id"]);
    $userClass = getUserClass($conn, $_REQUEST["id"]);
    
    if(!$userClass){ 
        $classId = "";
    } else {
        $classId =  $userClass ['classId'];
    }
    $userId =  $user ['userId'];
    $username =  $user ['username'];
    $password =  $user['password'];
    $roleId =  $user['roleId'];
    $name =  $profile['name'];
    $surname =  $profile['surname'];
    $email =   $profile['email'];
    $date_of_birth =  $profile['date_of_birth'];
    $street1 =  $profile['street1'];
    $street2 = $profile['street2'];
    $city =  $profile['city'];
    $postCode = $profile['postCode'];
    $pageTitle = "Edit User";
    $courses = getCourses($conn);
    $courseId = getEnrolledCourse($conn, $_REQUEST["id"]);
    $classes = getClasses($conn);

   
    $action ="save";
    }

    //Delete a user
    if(isset($_POST["action"]) && $_POST["action"] == "delete"){
       $userId = $_POST['id'];
       deleteUser($conn, $userId);
        header("location: list-users.php?deleted=true&action=list");   
        exit();
    }

        //Unit user. This is triggered from the button in the list users
    if(isset($_POST["action"]) && $_POST["action"] == "unit"){
       $userId = $_POST['id'];
        header("location: unit-user.php?action=unit&userId=$userId");   
        exit();
    }


  //This would show the unit-user form as it is redirected from the button. 
 if(isset($_GET["action"]) && $_GET["action"] == "unit" ){
    $user = getUser($conn, $_GET["userId"]);
    $profile = getUserProfile($conn, $_GET["userId"]);
    $courseId = getEnrolledCourse($conn, $_GET["userId"]);

    
    $userId = $user ['userId'];
    $username = $user ['username'];
    $roleId =  $user['roleId'];
    $name =  $profile['name'];
    $surname =  $profile['surname'];
if($roleId == 1) {
 $courseUnits =  getCourseUnits($conn, $courseId);
 $studentUnitsRecord =  getStudentUnits($conn, $_GET["userId"]);
    $selectedUnits = [];
    foreach($studentUnitsRecord as $student){
        $selectedUnits[] = $student['unitId'];
    }

} else{
      $courseUnits =  getUnits($conn);
     $lecturerUnitsRecord =  getLecturerUnits($conn, $_GET["userId"]);
    $selectedUnits = [];
    foreach($lecturerUnitsRecord as $lecturer){
        $selectedUnits[] = $lecturer['unitId'];
    }
}
   
   }


   if(isset($_POST["action"]) && $_POST["action"] == "saveuserunit"){
    $userId =  ($_POST["userId"]);
    $user = getUser($conn, $userId);
     $roleId =  $user['roleId'];
// Delete the student units before adding the new one or they will be duplicates 

    if($roleId == 1){

            deleteStudentUnits($conn, $userId);
        if(!empty ($_POST["unitId"])){
            $IdArray =  ($_POST["unitId"]);
            foreach($IdArray as $unitId){ 
                addStudentUnit($conn, $userId, $unitId);
            }
         }    
    } else{
    deleteLecturerUnits($conn, $userId);
     if(!empty ($_POST["unitId"])){
        $IdArray =  ($_POST["unitId"]);
        foreach($IdArray as $unitId){
         addLecturerUnit($conn, $userId, $unitId);
        }
    }
}
         header("location:  list-users.php?success=true&action=list");   
        exit();
 
   }





?>
