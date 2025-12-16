<?php

// Insert into the user_profile
function createUser($conn, $username, $password, $roleId, $name, $surname, $date_of_brith = null, $street1 = null, $street2 = null, $city = null, $postCode = null){
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
}

 function login($conn, $username, $password){
        $user = userExists($conn, $username);
        
        if(!$user){
            header("location: ../login.php?error=incorrectlogin");
            exit();
        }

        $userId = $user["userId"];

        $user = getUser($conn, $userId);
        $dbPassword = $user["password"];
        if ($dbPassword == $password){
            $checkedPassword = true;
        }
       // $checkedPassword = password_verify($password, $dbPassword);

        if(!$checkedPassword){
            header("location: ../login.php?error=incorrectlogin");
            exit();
        }

        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["userId"] = $userId;
        $_SESSION["userRole"] = $user["roleId"];

        header("location: ../profile.php");
        exit();
    }

    function userExists($conn, $username){
        $sql = "SELECT userId FROM user_account WHERE username = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../login.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $username);
        
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        }
        else{
            return false;
        }

    }

    function getUser($conn, $userId){
        /*
            This function is very similar to the one above. It gets all details from the users table, but only for one user.
            We add a userId parameter to be able to receive it from elsewhere, and then we can use it to filter out the results through SQL. 
        */
        $sql = "SELECT * FROM user_account WHERE userId = ?;";
        // The ? above is called a wildcard. It's used to test the SQL statement and then replace it with an actual value.
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load user.</p>";
            exit();
        }

        // Here, we replace the ? wildcard with an integer, its value being in the userId variable
        mysqli_stmt_bind_param($stmt, "i", $userId);
        
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        }
        else{
            return false;
        }
    }
    
?>