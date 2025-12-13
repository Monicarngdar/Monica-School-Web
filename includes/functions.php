<?php

// Insert into the user_profile
function createUser($conn, $username, $password, $roleId, $name, $surname, $date_of_brith = null, $addressId = null, $street1 = null, $street2 = null, $city = null, $postCode = null){

}

// Insert into the user_account
   $sql1 = "INSERT INTO user_account (roleId, username, password) VALUES (?, ?, ?)";
   $stmt1 = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt1, $sql1)) {
        return "Error preparing user_account";

    }

    //Hashed password making our user's passwords secure
     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt1, "iss", $roleId, $username, $hashedPassword);
    mysqli_stmt_execute($stmt1);


    
?>