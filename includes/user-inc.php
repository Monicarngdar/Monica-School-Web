<?php
 require_once "dbh.php";
 require_once "functions.php";

 $user = getUser($conn, $_SESSION["userId"]);
 $userProfile = getUserProfile($conn, $_SESSION["userId"]);


    $username = $user['username'];
    $password = $user['password'];
    $roleId = $user['roleId'];
    $name = $userProfile['name'];
    $surname = $userProfile['surname'];
    $email = $userProfile['email'];
    $date_of_birth = $userProfile['date_of_birth'];
    $street1 = $userProfile['street1'];
    $street2 = $userProfile['street2'];
    $city =$userProfile['city'];
    $postCode = $userProfile['postCode'];




?>
