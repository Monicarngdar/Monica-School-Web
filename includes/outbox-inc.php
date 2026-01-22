<?php 
    require_once "dbh.php";
    require_once "functions.php";
                if (session_status() !== PHP_SESSION_ACTIVE ) {
             session_start();
              }

if(isset($_GET["action"]) && $_GET["action"]=="list")
    {
    
      $user = getUser($conn,$_SESSION["userId"]); // forcing userId from the session for security
      $outbox = getOutbox($conn, $user["username"]);
    } 

    if(isset($_POST["action"]) && $_POST["action"]=="viewoutbox")
    {
         header("location: view-message.php?action=viewoutbox&messageId={$_POST["messageId"]}");   
        exit();
    } 

   if(isset($_POST["action"]) && $_POST["action"] == "delete"){
         //Always get user from session to prevent other users from seeing others messages by using inspect by the browser
    $toUser = getUser ($conn, $_SESSION ['userId']);
    $message = getMessageOutbox($conn, $toUser["username"], $_POST ['messageId']); // geting the message to delete its attachment file
     if(!empty($message ["attachment"])){
       unlink($message ["attachment"]); 
    }
    deleteOutboxMessage($conn, $toUser ['username'], $_POST ['messageId']); 

        header("location: outbox.php?action=list");   
        exit();
     }
    



?>