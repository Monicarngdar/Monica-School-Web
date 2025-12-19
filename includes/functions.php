<?php

// Insert into the user_profile
function registerUser($conn, $username,$password,$firstName,$lastName,$role,$date_of_birth,$email){
// Insert into the user_account
   $sql1 = "INSERT INTO user_account (roleId, username, password) VALUES (?, ?, ?)";
   $stmt1 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt1, $sql1)) {
        return "Error preparing user_account";

    }
    //Hashed password making our user's passwords secure
     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt1, "iss", $role, $username, $hashedPassword);
    mysqli_stmt_execute($stmt1);

    $user = userExists($conn,$username);
    $userId = $user["userId"];

    //Insert into the user profile
   $sql2 = "INSERT INTO user_profile (userId,name,surname,email,date_of_birth) VALUES (?,?,?,?,?)";
   $stmt2 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt2, $sql2)) {
        return "Error preparing user_profile";

    }
    
    mysqli_stmt_bind_param($stmt2, "issss", $userId, $firstName, $lastName, $email, $date_of_birth);
    mysqli_stmt_execute($stmt2);
}



//Log in 
 function login($conn, $username, $password){
        $user = userExists($conn, $username);
        
        if(!$user){
            header("location: ../login.php?error=incorrectlogin");
            exit();
        }

        $userId = $user["userId"];

        $user = getUser($conn, $userId);
        $dbPassword = $user["password"];
        if (password_verify($password, $dbPassword)){
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
       
        //
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


    // Registration Form
    function emptyRegistrationInput($username,$password, $confpass, $firstName,$lastName, $role,$date_of_birth ,$email){
  
        if(empty($username) || empty($password) || empty ($confpass) || empty($firstName) || empty($lastName) || empty ($role) || empty ($date_of_birth) || empty ($email)){
            return true;
        }
    }


    //Invalid Forms 
     function invalidUsername($username){
        // allow letters and numbers, but nothing else
        if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
            return true;
        }
    }

    function passwordsDoNotMatch($password, $confpass){
        // check if passwords have the same value
        if($password != $confpass){
            return true;
        }
    }

    function invalidEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
    }
    
?>