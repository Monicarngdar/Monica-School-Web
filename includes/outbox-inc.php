<?php 
    require_once "dbh.php";
    require_once "functions.php";

if(isset($_GET["action"]) && $_GET["action"]=="list")
    {
     $outbox = getOutbox($conn, $_SESSION["userId"]);
       
    } 

    if(isset($_POST["action"]) && $_POST["action"]=="viewoutbox")
    {

         header("location: view-message.php?action=viewoutbox&messageId={$_POST["messageId"]}");   
        exit();
    } 



?>