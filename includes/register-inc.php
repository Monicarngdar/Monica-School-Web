<?php 
    require_once "dbh.php";
    require_once "functions.php";

    if(!isset($_POST["submit"])){
     
        header("location: ../register.php");
        exit();
    }
    else{

        $username = $_POST["username"];
        $password = $_POST["password"];
        $confpass = $_POST["confpass"];
        $firstName = $_POST["name"];
        $lastName = $_POST["surname"];
        $role = $_POST["role"];
        $date_of_birth = $_POST["date_of_birth"];
        $email = $_POST["email"];
    

        $error = "";

        if(emptyRegistrationInput($username,$password, $confpass, $firstName,$lastName,$role,$date_of_birth ,$email)){

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
            header("location: ../register.php?error=true&{$error}");
            exit();
        }

        registerUser($conn,$username,$password,$firstName,$lastName,$role,$date_of_birth,$email);

       
        header("location: ../list-users.php?success=true&action=list");
        exit();
    }





?>