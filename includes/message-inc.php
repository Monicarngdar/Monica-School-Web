<?php 
    require_once "dbh.php";
    require_once "functions.php";

    //Submit Email
    if (isset($_POST['submit'])) {  
    $recipients = $_POST['recipients'];
    $subject = $_POST['subject'];
    $messageBody = $_POST['messageBody'];
    $file= $_FILES['file'];

    $recipients = str_replace(' ', '', $recipients);
    $Ids=getRecipientsIds($conn, $recipients);


   if (session_status() !== PHP_SESSION_ACTIVE ) {
             session_start();
       }
    createMessage($conn, $_SESSION["userId"], $Ids , $subject, $messageBody, $file);

      header("location: message.php?success=true");   
        exit();
    
}

       if(isset($_GET["action"]) && $_GET["action"] == "viewinbox"){
         //Always get user from session to prevent other users from seeing others messages by using inspect by the browser
    $message = getMessageInbox($conn, $_SESSION ['userId'], $_GET ['messageId']);
    $fromUser = getUser ($conn, $message['senderUserId']);
    $toUser = getUser ($conn, $message['recipientUserId']);
    $from = $fromUser['username'];
    $to = $toUser['username'];
    $subject= $message['messageSubject'];
    $date= $message['sendDateTime'];
    $message = $message['messageBody'];
     }

     
       if(isset($_GET["action"]) && $_GET["action"] == "viewoutbox"){
        //Always get user from session to prevent other users from seeing others messages by using inspect by the browser
    $message = getMessageOutbox($conn, $_SESSION ['userId'], $_GET ['messageId']);
     $fromUser = getUser ($conn, $message['senderUserId']);
     $toUser = getUser ($conn, $message['recipientUserId']);
    $from = $fromUser['username'];
    $to = $toUser['username'];
    $subject= $message['messageSubject'];
    $date= $message['sendDateTime'];
    $message = $message['messageBody'];
     }





    ?>