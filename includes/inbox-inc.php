<?php 
    require_once "dbh.php";
    require_once "functions.php";
            if (session_status() !== PHP_SESSION_ACTIVE ) {
             session_start();
              }

if(isset($_GET["action"]) && $_GET["action"]=="list")
    {
        
        $user = getUser($conn,$_SESSION["userId"]); // forcing userId from the session for security
        $favourite = 0; // favourites messages will not be shown in the inbox, but in the favourites tab
         $inbox = getInbox($conn, $user["username"], $favourite);
        
    } 

    if(isset($_GET["action"]) && $_GET["action"]=="favourites")
    {
    
        $user = getUser($conn,$_SESSION["userId"]); // forcing userId from the session for security
        $favourite = 1; // this wil shown only favourite messages
         $favourites = getInbox($conn, $user["username"], $favourite);
        
    } 


    if(isset($_POST["action"]) && $_POST["action"]=="viewinbox")
    {

         header("location: view-message.php?action=viewinbox&messageId={$_POST["messageId"]}");   
        exit();
    } 

    
         if(isset($_POST["action"]) && $_POST["action"] == "favourite"){
         //Always get user from session to prevent other users from seeing others messages by using inspect by the browser
    $toUser = getUser ($conn, $_SESSION ['userId']);
    $message = saveFavouriteMessage($conn, $toUser ['username'], $_POST ['messageId'], 1); // 1 is favourite = true

        header("location: favourites.php?action=list");   
        exit();
     }
    
         if(isset($_POST["action"]) && $_POST["action"] == "unfavourite"){
         //Always get user from session to prevent other users from seeing others messages by using inspect by the browser
    $toUser = getUser ($conn, $_SESSION ['userId']);
    $message = saveFavouriteMessage($conn, $toUser ['username'], $_POST ['messageId'], 0); // 0 is unfavourite

        header("location: favourites.php?action=list");   
        exit();
     }
    
       if(isset($_POST["action"]) && $_POST["action"] == "delete"){
         //Always get user from session to prevent other users from seeing others messages by using inspect by the browser
    $toUser = getUser ($conn, $_SESSION ['userId']);
    $message = getMessageInbox($conn, $toUser["username"], $_POST ['messageId']); // geting the message to delete its attachment file
     if(!empty($message ["attachment"])){
        unlink($message ["attachment"]); 
    }
    deleteMessage($conn, $toUser ['username'], $_POST ['messageId']); 

        header("location: inbox.php?action=list");   
        exit();
     }
    
    


?>