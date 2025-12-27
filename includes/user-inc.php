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

      header("location:  ../list-users.php?success=true&action=list");   
        exit();
}

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
    $action ="save";
    }

//This condition will trigger when the user will click edit from the list page
  if(isset($_POST["action"]) && $_POST["action"] == "edit"){

    $user = getUser($conn, $_POST["id"]);
    $profile = getUserProfile($conn, $_POST["id"]);
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
    $action ="save";
    }

    //Delete a user
    if(isset($_POST["action"]) && $_POST["action"] == "delete"){
       $userId = $_POST['id'];
       deleteUser($conn, $userId);
        header("location: list-users.php?deleted=true&action=list");   
        exit();
    }






?>
