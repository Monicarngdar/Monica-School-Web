<?php 
    require_once "dbh.php";
    require_once "functions.php";
            if (session_status() !== PHP_SESSION_ACTIVE ) {
             session_start();
              }

if(isset($_GET["action"]) && $_GET["action"]=="list")
    {
        
        $user = getUser($conn,$_SESSION["userId"]); // forcing userId from the session for security
         $inbox = getInbox($conn, $user["username"]);
        
    } 

    if(isset($_POST["action"]) && $_POST["action"]=="viewinbox")
    {

         header("location: view-message.php?action=viewinbox&messageId={$_POST["messageId"]}");   
        exit();
    } 
    
    


?>