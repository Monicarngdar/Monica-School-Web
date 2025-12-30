<?php

// Insert into the user_profile
function registerUser($conn, $username,$password,$firstName,$lastName,$role,$date_of_birth,$email){
// Insert into the user_account
   $sql1 = "INSERT INTO user_account (roleId, username, password) VALUES (?, ?, ?)";
   $stmt1 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt1, $sql1)) {
        return "Error preparing user_account";

    }
    //Hashed password making our user's passwords secure
     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt1, "iss", $role, $username, $hashedPassword);
    mysqli_stmt_execute($stmt1);

     // Get the userId of the newly inserted user
    $user = userExists($conn,$username);
    $userId = $user["userId"];

   // Insert into the user_profile table
   $sql2 = "INSERT INTO user_profile (userId,name,surname,email,date_of_birth) VALUES (?,?,?,?,?)";
   $stmt2 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt2, $sql2)) {
        return "Error preparing user_profile";
    }

     // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt2, "issss", $userId, $firstName, $lastName, $email, $date_of_birth);
    mysqli_stmt_execute($stmt2);
}



// Function to log in a user
 function login($conn, $username, $password){
        $user = userExists($conn, $username);
        
        if(!$user){
            header("location: ../login.php?error=incorrectlogin");
            exit();
        }

        $userId = $user["userId"];

        $user = getUser($conn, $userId);
        $dbPassword = $user["password"];
        if (password_verify($password, $dbPassword)){
            $checkedPassword = true;
        }

         // If password is incorrect, redirect with error
        if(!$checkedPassword){
            header("location: ../login.php?error=incorrectlogin");
            exit();
        }

         // Start session and store user data
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["userId"] = $userId;
        $_SESSION["userRole"] = $user["roleId"];

        header("location: ../profile.php");
        exit();
    }

    // Function to check if a user exists by username
    function userExists($conn, $username){
        $sql = "SELECT userId FROM user_account WHERE username = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../login.php?error=stmtfailed");
            exit();
        }

          // Bind the username parameter and execute
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        }
        else{
            return false;
        }
    }

    // Function to get user account data by userId
    function getUser($conn, $userId){    
        $sql = "SELECT * FROM user_account WHERE userId = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load user.</p>";
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $userId);
        
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        }
        else{
            return false;
        }
    }

    //Get users
     function getUsers($conn){
   
        $sql = "SELECT user_account.userId as userId, username, roleId, name, surname FROM user_account, user_profile WHERE user_account.userId = user_profile.userId";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load users.</p>";
            exit();
        }

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return $result;
    }


        //Save Profile Admin
       function saveProfileAdmin($conn, $userId, $name, $surname, $email, $date_of_birth, $street1, $street2, $city, $postCode){
        $sql = "UPDATE user_profile SET name = ?, surname = ?, email = ?, date_of_birth = ?, street1= ?,  street2= ?,  city= ?, postCode= ? WHERE userId = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: user.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssssssssi", $name, $surname, $email, $date_of_birth, $street1, $street2, $city, $postCode, $userId);
   
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    //Save Account Admin
           function saveAccountAdmin($conn, $userId, $username){
        $sql = "UPDATE user_account SET username = ? WHERE userId = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: user.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "si", $username, $userId);
        
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



    // Function to get user profile data by userId
    function getUserProfile($conn, $userId){
            $sql = "SELECT * FROM user_profile WHERE userId = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load user.</p>";
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $userId);
        
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        }
        else{
            return false;
        }
    }

    //Profile Edit
       function editProfile($conn, $userId,  $street1, $street2, $city, $postCode){
        $sql = "UPDATE user_profile SET street1= ?,  street2= ?,  city= ?, postCode= ? WHERE userId = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssssi", $street1, $street2, $city, $postCode, $userId);
        
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }


    //Update user profile password
        function updatePassword($conn, $userId, $passwordl){
            $sql = "UPDATE user_account SET password = ?, WHERE userId = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not set password.</p>";
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $userId);
        
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

    }

    
        //Delete User
    function deleteUser($conn, $userId){
        $sql = "DELETE FROM user_account WHERE userId = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../list-users.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $userId);
        
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }


       // Empty User Inputs
    function emptyUserInput($username, $name,$surname,$date_of_birth ,$email){
  
        if(empty($username) ||empty($name) || empty($surname) || empty ($date_of_birth) || empty ($email)){
            return true;
        }
    }


    // Registration Form
    function emptyRegistrationInput($username,$password, $confpass, $firstName,$lastName, $role,$date_of_birth ,$email){
  
        if(empty($username) || empty($password) || empty ($confpass) || empty($firstName) || empty($lastName) || empty ($role) || empty ($date_of_birth) || empty ($email)){
            return true;
        }
    }


    //Invalid Forms 
     function invalidUsername($username){
        if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
            return true;
        }
    }
    function passwordsDoNotMatch($password, $confpass){
        // check if passwords have the same value
        if($password != $confpass){
            return true;
        }
    }
    function invalidEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
    }

    //Manage Courses
    function addCourse($conn, $courseName, $courseDescription, $credits){
    $sql = "INSERT INTO course (courseName, courseDescription, credits) VALUES (?, ?, ?)";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("location: ../course.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssd", $courseName, $courseDescription, $credits);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

    //Manage Units
    function addUnit($conn, $unitName, $unitDescription, $courseId, $semester){
    $sql = "INSERT INTO unit (unitName, unitDescription, courseId, semester) VALUES (?, ?, ?, ?)";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("location: ../unit.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssis", $unitName, $unitDescription, $courseId, $semester);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

//Get Courses
    function getCourses($conn){
      
        $sql = "SELECT * FROM course";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load courses.</p>";
            exit();
        }

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return $result;
    }

    //Get Course
    function getCourse($conn, $courseId){    
        $sql = "SELECT * FROM course WHERE courseId = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load course.</p>";
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $courseId);
        
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        }
        else{
            return false;
        }
    }

            //Delete Courses
    function deleteCourse($conn, $courseId){
        $sql = "DELETE FROM course WHERE courseId = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: list-courses.php?error=stmtfailed");
            exit();
        }
        
        try{
        mysqli_stmt_bind_param($stmt, "i", $courseId);
         mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
} catch (mysqli_sql_exception $e){
    if ($e->getCode() === 1451) {
            header("location: list-courses.php?error=courseinuse");
            exit();
        }
        }
    }


    //Get Units
    function getUnits($conn){
      
        $sql = "SELECT * FROM unit";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load units.</p>";
            exit();
        }

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return $result;
    }


     // Get Unit
    function getUnit($conn, $unitId){    
        $sql = "SELECT * FROM unit WHERE unitId = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load unit.</p>";
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $unitId);
        
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        }
        else{
            return false;
        }
    }

        //Delete Units
    function deleteUnit($conn, $unitId){
        $sql = "DELETE FROM unit WHERE unitId = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../list-units.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $unitId);
        
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    
    //Save Units
    function saveUnit($conn, $unitName, $unitId, $unitDescription, $courseId, $semester){
    $sql = "UPDATE  unit SET  unitName = ?, unitDescription = ?, courseId = ?, semester = ?  WHERE unitId = ?;";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("location: ../unit.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssisi", $unitName,  $unitDescription, $courseId, $semester, $unitId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

//Email Screen
//Create a Message
    function createMessage($conn, $senderUserId, $Ids , $subject, $messageBody, $file ){
    $sql = "INSERT INTO message (senderUserId, messageSubject, messageBody, sendDateTime)VALUES (?, ?, ?, NOW())";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("location: ../message.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "iss", $senderUserId, $subject, $messageBody);
    mysqli_stmt_execute($stmt);
    $messageId=mysqli_insert_id($conn);


    foreach($Ids as $recipientId){
          $sql2 = "INSERT INTO recipient (messageId, recipientUserId) VALUES (?, ?)";
       if (!mysqli_stmt_prepare($stmt, $sql2)) {
            header("location: ../message.php?error=stmtfailed");
            exit();
    }
    mysqli_stmt_bind_param($stmt, "ii", $messageId, $recipientId);
    mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);

}

//Get recipients
  function getRecipientsIds($conn, $recipients){
  $list = explode(",", $recipients);
  $Ids = [];
  foreach ($list as $username)
    {
        $user=getUserByUsername($conn, $username);
        if(!$user){
             header("location: ../message.php?error=usernotfound&username=$username");
             exit();
        }
        else{
            $Ids[]=$user["userId"];
        }
    }
    return $Ids;
  }

  // Get user by username
    function getUserByUsername($conn, $username){    
        $sql = "SELECT * FROM user_account WHERE username = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load user.</p>";
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $username);
        
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        }
        else{
            return false;
        }
    }

    //Get Inbox
    function getInbox($conn, $userId){    
        $sql = "SELECT * FROM message, recipient, user_account 
        WHERE recipientUserId = ? and userId = recipientUserId  and message.messageId = recipient.messageId;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load inbox.</p>";
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $userId);
        
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        return $result;
    }

        //Sent Inbox
    function getSent($conn, $userId){    
        $sql = "SELECT * FROM message WHERE senderUserId = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load inbox.</p>";
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $userId);
        
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        return $result;
    }


       //Get Outbox
    function getOutbox($conn, $userId){    
        $sql = "SELECT * FROM message, recipient, user_account 
        WHERE senderUserId= ? and userId = senderUserId  and message.messageId = recipient.messageId;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load outbox.</p>";
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $userId);
        
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        return $result;
    }

    
    //Get Message Inbox
    function getMessageInbox($conn, $userId, $messageId){
        $sql = "SELECT * FROM message, recipient
        WHERE recipientUserId= ?  and message.messageId = ? and recipient.messageId = message.messageId;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load message.</p>";
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ii", $userId, $messageId);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        }
        else{
            return false;
        }
    }

        //Get Message Outbox. These need to be separated 
    function getMessageOutbox($conn, $userId, $messageId){
        $sql = "SELECT * FROM message, recipient 
        WHERE senderUserId= ?  and message.messageId = ? and recipient.messageId = message.messageId;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load message.</p>";
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ii", $userId, $messageId);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        }
        else{
            return false;
        }
    }

        // Get Enrolled Course
    function getEnrolledCourse($conn, $userId){    
        $sql = "SELECT * FROM enrolment WHERE userAccountId = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load enrolment.</p>";
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $userId);
        
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row['courseId'];
        }
        else{
            return 0;
        }
    }

        //Add Enrolment
    function addEnrolment($conn, $userId, $courseId){
    $sql = "INSERT INTO enrolment (userAccountId, courseId) VALUES (?, ?)";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("location: ../unit-user.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ii",  $userId, $courseId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

       //Delete Enrolment
    function deleteEnrolment($conn, $userId){
        $sql = "DELETE FROM enrolment WHERE userAccountId = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../unit-user.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $userId);
        
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    //Get Course Units
    function getCourseUnits($conn, $courseId){

        $sql = "SELECT * FROM unit WHERE courseId = ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load courses.</p>";
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $courseId);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return $result;

    }


      //Add Student Unit
    function addStudentUnit($conn, $studentId, $unitId){
    $sql = "INSERT INTO unit_student (studentId, unitId) VALUES (?, ?)";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("location: ../unit-user.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ii",  $studentId, $unitId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

       //Delete Student Units
    function deleteStudentUnits($conn, $userId){
        $sql = "DELETE FROM unit_student WHERE studentId = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../unit-user.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $userId);
        
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

      //Get Student Units
    function getStudentUnits($conn, $studentId){

        $sql = "SELECT * FROM unit_student WHERE studentId = ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load student units.</p>";
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $studentId);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return $result;

    }

          //Add Lecturer Unit
    function addLecturerUnit($conn, $lecturerId, $unitId){
    $sql = "INSERT INTO unit_lecturer (lecturerId, unitId) VALUES (?, ?)";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("location: ../unit-user.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ii",  $lecturerId, $unitId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

         //Delete Lecturer Units
    function deleteLecturerUnits($conn, $userId){
        $sql = "DELETE FROM unit_lecturer WHERE lecturerId = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../unit-user.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $userId);
        
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

      //Get Lecturer Units
    function getLecturerUnits($conn, $lecturerId){

        $sql = "SELECT * FROM unit_lecturer WHERE lecturerId = ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load lecturer units.</p>";
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $lecturerId);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return $result;

    }


    //Admin Page
    function adminPage(){
        if (session_status() !== PHP_SESSION_ACTIVE ) {
             session_start();
       }
                if ($_SESSION['userRole']!=3 ){
            session_destroy();
             header("location: login.php?error=adminnotloggedin");
             exit();   
             }
    }

        //Lecturer Page
    function lecturerPage(){
        if (session_status() !== PHP_SESSION_ACTIVE ) {
             session_start();
       }
            if ($_SESSION['userRole']!=2 ){
                session_destroy();
                header("location: login.php?error=lecturernotloggedin");
                exit();
            }   
    }

         //Student Page
    function studentPage(){
        if (session_status() !== PHP_SESSION_ACTIVE ) {
             session_start();
       }
        if ($_SESSION['userRole']!=1 ){
            session_destroy();
             header("location: login.php?error=studentnotloggedin");
             exit();   
        }
    }

    function getLecturerAssignments(){
        
    }


     //Add Lecturer Assignments
    function addAssignment($conn, $assignmentId, $unitId, $taskTitle, $taskDescription, $maxMark, $dueDate){
    $sql = "INSERT INTO assignments (assignmentId, unitId, taskTitle, taskDescription, maxMark, dueDate) VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("location: ../lecturer-assign.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "iissis",  $assignmentId, $unitId, $taskTitle, $taskDescription, $maxMark, $dueDate);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

//Get Lecturer Assignments
    function getAssignments($conn){
      
        $sql = "SELECT * FROM assignments, unit, course WHERE assignments.unitId = unit.unitid and course.courseId = unit.courseId";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load assignments.</p>";
            exit();
        }

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return $result;
    }

     // Get Unit Course
    function getUnitCourse($conn, $unitId){    
        $sql = "SELECT * FROM course, unit WHERE unit.unitId = ? and course.courseId = unit.courseId;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load course.</p>";
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $unitId);
        
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        }
        else{
            return false;
        }
    }







?>