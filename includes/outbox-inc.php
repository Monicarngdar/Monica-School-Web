<?php 
    require_once "dbh.php";
    require_once "functions.php";

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



?>