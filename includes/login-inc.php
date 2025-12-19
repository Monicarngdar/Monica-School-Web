<?php 

// if (session_status() !== PHP_SESSION_ACTIVE ) {
    // if (isset($_SESSION["username"])) { //
  //  header("location: ../logout-inc.php"); //
   // exit();//
 //} }//

// If a user ended up executing this code without submitting a form, we redirect them back to the login page itself
if(!isset($_POST["submit"])){
    header("location: ../login.php");
    exit();
}
else {
    // Get the user's submitted credentials
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate user's input
    if(empty($username) || empty($password)){
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    require_once "dbh.php";
    require_once "functions.php";

    // Call the login function
    login($conn, $username, $password);
}


?>