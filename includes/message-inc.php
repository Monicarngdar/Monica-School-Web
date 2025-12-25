<?php 
    require_once "dbh.php";
    require_once "functions.php";

    //Submit Email
    if (isset($_POST['submit'])) {  
    $recipients = $_POST['recipients'];
    $subject = $_POST['subject'];
    $messageBody = $_POST['messageBody'];
    $file= $_POST['file'];

    $recipients = str_replace(' ', '', $recipients);
    $Ids=getRecipientsIds($conn, $recipients);


   if (session_status() !== PHP_SESSION_ACTIVE ) {
             session_start();
       }
    createMessage($conn, $_SESSION["userId"], $Ids , $subject, $messageBody, $file);

      header("location: message.php?success=true");   
        exit();
    
}




    ?>