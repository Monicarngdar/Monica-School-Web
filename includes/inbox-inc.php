<?php 
    require_once "dbh.php";
    require_once "functions.php";

if(isset($_GET["action"]) && $_GET["action"]=="list")
    {
         $inbox = getInbox($conn, $_SESSION["userId"]);
        
    } 

    if(isset($_POST["action"]) && $_POST["action"]=="viewinbox")
    {

         header("location: view-message.php?action=viewinbox&messageId={$_POST["messageId"]}");   
        exit();
    } 
    
    


?>