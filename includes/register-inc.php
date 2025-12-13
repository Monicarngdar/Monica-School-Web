<?php 
    require_once "dbh.php";
    require_once "functions.php";

    if(!isset($_POST["submit"])){
     
        header("location: ../register.php");
        exit();
    }
    else{

        $username = $_POST["username"];
        $nationality = $_POST["nationality"];
        $password = $_POST["password"];
        $confpass = $_POST["confpass"];
        $firstName = $_POST["name"];
        $lastName = $_POST["surname"];
        $email = $_POST["email"];
        $age = $_POST["age"];

        $error = "";

        if(emptyRegistrationInput($username,$password,$firstName,$lastName,$age,$nationality,$email)){
y
            $error = $error."emptyinput=true&";
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

        registerUser($conn,$username,$password,$firstName,$lastName,$age,$nationality,$email);

       
        header("location: ../register.php?success=true");
        exit();
    }





?>