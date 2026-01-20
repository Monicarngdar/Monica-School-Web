<?php 
    require_once "dbh.php";
    require_once "functions.php";
            if (session_status() !== PHP_SESSION_ACTIVE ) {
             session_start();
              }

    //Submit Email
    if (isset($_POST['submit'])) {  
    $recipients = $_POST['recipients'];
    $subject = $_POST['subject'];
    $messageBody = $_POST['messageBody'];
    
    $file= $_FILES['file'];

    $recipients = str_replace(' ', '', $recipients); //clear white spaces
    $recipients= validateRecipients($conn, $recipients); //eventually we could get all users or course users or class users
 
    $sender = getUser($conn, $_SESSION["userId"]);

     createMessage($conn, $sender["username"], $recipients, $subject, $messageBody, $file);

      header("location: ../inbox.php?action=list&success=true");   
        exit();
    
}

       if(isset($_GET["action"]) && $_GET["action"] == "viewinbox"){
         //Always get user from session to prevent other users from seeing others messages by using inspect by the browser
    $toUser = getUser ($conn, $_SESSION ['userId']);
    $message = getMessageInbox($conn, $toUser ['username'], $_GET ['messageId']);
    //$fromUser = getUser ($conn, $message['senderUserId']);
    //$toUser = getUser ($conn, $message['recipientUserId']);
    $from = $message["senderUsername"];//$fromUser['username'];
    $to = $toUser['username'];
    $subject= $message['messageSubject'];
    $date= $message['sendDateTime'];
    $message = $message['messageBody'];
     }

     
       if(isset($_GET["action"]) && $_GET["action"] == "viewoutbox"){
        //Always get user from session to prevent other users from seeing others messages by using inspect by the browser
     $fromUser = getUser ($conn, $_SESSION ['userId']);
     $message = getMessageOutbox($conn,   $fromUser ['username'], $_GET ['messageId']);
     //$toUser = getUser ($conn, $message['recipientUserId']);
    $from = $fromUser['username'];
    $to = $message['recipientUsername'];
    $subject= $message['messageSubject'];
    $date= $message['sendDateTime'];
    $message = $message['messageBody'];
     }





    ?>