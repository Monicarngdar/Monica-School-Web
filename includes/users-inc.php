<?php

 require_once "dbh.php";
 require_once "functions.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $roleId = $_POST['roleId'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $date_of_birth = $_POST['date_of_birth'];
    $addressId = $_POST['addressId'];
    $street1 = $_POST['street1'];
    $street2 = $_POST['street2'];
    $city = $_POST['city'];
    $postCode = $_POST['postCode'];


     $result = createUser( $username, $password, $roleId, $name, $surname,$date_of_birth, $addressId, $street1, $street2, $city, $postCode
    );

     if ($result === true) {
        echo "User account and profile created successfully!";
    } else {
        echo $result; 
    }

?>
