# Monica-School-Web
Php & Databases - MySkolar

## Overview
MYSKOLAR is a school management system built with PHP scripts and MySQL for data management. This manages students, lecturers, courses, units, grades, attendance, and messages. The system simplifies and digitises academic workflows, enabling students, lecturers, and administrators to interact efficiently through a web interface.

## Login INFO for testing
* Admin: **username**: adminuser **password**:  123456
* Lecturer: **username**: zoelecturer **password**: 123456
* Student: **username**: kiarastudent **password**: 123456

## Installation Instructions
* It is assumed that XAMPP for windows is installed. 
* Start Apache and MySql Database.
* Myskolar repository is https://github.com/Monicarngdar/Monica-School-Web/
* Add the myskolar repository in the XAMPP/htdocs folder.
* Create a new Database uing **phpmyadmin**. Example: 2025-schoolweb.
* Import databaseExport/2025-schoolweb.sql into the database that was created.
* Check and configure the database configuration file: includes/dbh.php.
* Load the website using http://localhost:8080/Monica-School-Web/
* The website URL could be different if the repository was placed in a different folder ot XAMPP is confirgured in a different path. 
* Log in to the site using one of the login info above. 


## Admin Dashboard
* The admin my academics shows register users, manage users, add course, add units, add timetable, manage courses, manage units.
* The Admin can register or deregister users. 
* Create, Update and Delete Courses and Units.
* Assign users to courses and units.
* Assign Calendar Events.
* Recieve and Send Messages.

## Student Dashboard
* Students can access their academic management, including timetable, enrolled units, attendance, assignments, and grades.
* Units display lecturer name, unit title, and description.
* Assignments display a list of assignments with an upload icon that opens a form for submitting details and attachments.
* Grades show assignment feedback and marks.
* Students can view their attendance.
* Recieve and Send Messages.

## Lecturer Dashboard
* Lecturers can access their academic management, including timetable, assigned units, attendance, assignments, and grades.
* Units display unit title and description.
* Assignments display a list of assignments with an upload icon that opens a form for details and file attachments.
* Grades allow lecturers to assign final marks and provide feedback to students.
* Lecturers marks the attendance of the students.
* Recieve and Send Messages.


## Technical Documentation for Modifying the Site
### Functions and Database Handler
* Created a functions.php to handle SQL queries.
* Created a dbh.php to handle the database handler to connect through the database.

```php
<?php 
$server = "localhost";
$dbName = "2025-schoolweb";
$dbUsername = "root";
$dbPassword = "";

$conn = mysqli_connect($server, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}
?>
 ```

 #### Includes Folder
* Created an include folder
* Everytime a include file is created, always include the dbh.php and functions.php files
```php
    require_once "dbh.php";
    require_once "functions.php";
  ```

### Error and Success Messages
* Error Messages **show-error.php** are shown in a includes folder that can be easily be added. 
```php
    <div class="row">
                <div class="col"></div>
                <div class="col-12 bg-danger text-white text-center py-2">
                    <p><?php echo $message; ?></p>
                </div>
                <div class="col"></div>
            </div>
  ```
* Success Messages **show-success.php**  are shown in a includes folder that can be easily be added. 
  ```php
   <div class="row">
                <div class="col"></div>
                <div class="col-12 bg-success text-white text-center py-2">
                    <p><?php echo $message; ?></p>
                </div>
                <div class="col"></div>
            </div>
  ```

* An Example on how Its used
```php
<?php
             if(isset($_GET["success"])) { 
                 $message = "User Saved Successfully";
                 include "includes/show-success.php";
            }
      ?>
 ```

### Main Features
* User Authentication
* Users can log in and log out using **login.php** and **logout.php**
* Profile management is handled via **profile-inc.php** and **profile.php**

### Log in 
The log in works as depended on the userRole Id that would be logged in.
Shown Example as:
```php
// Student
 <?php  if ($_SESSION ['userRole']==1 ):?>
// Lecturer
 <?php  if ($_SESSION ['userRole']==2 ):?>
// Admin
 <?php  if ($_SESSION ['userRole']==3 ):?>
 ```

 #### Role Dashboard
This reinforces page of the proper user role,  This always get user from session to prevent other users from typing the page in the browser.
  Shown Example as: 
  ```php
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
```

 This is placed above the page. 
 Example on how it is used: 
 ```php
   <?php 
    include "includes/functions.php";
    include "includes/header.php";
    adminPage(); 
?>
```

### Dynamic Web Application Techniques
To show the list. 

 ```php
 <?php foreach($studentAssignments as $assignments):?>
<form action="student-assign-deadlines.php" method="post" id="form<?php echo $assignments["assignmentId"] ?>" class="mt-4">
  <div class="row align-items-center mb-3 border-bottom pb-2">
    <input type="hidden" name = "id" value="<?php echo  $assignments["assignmentId"] ?>" >
   <input type="hidden" name = "action" id ="action" value="">

<div class="col-3">
    <?php echo $assignments["courseName"]; ?>
</div>

<div class="col-3">
    <?php echo $assignments["unitName"]; ?>
</div>

<div class="col-2">
    <?php echo $assignments["taskTitle"]; ?>
</div>

<div class="col-2">
    <?php echo $assignments["dueDate"]; ?>
</div>
```

To get the attendance status

 ```php
<?php foreach ($attendances as $attendance): ?>
    <?php 
        // Get the user profile linked to the attendance record
        $profile = getUserProfile($conn, $attendance["userAccountId"]); 
    ?>

    <div class="row align-items-center mb-3">
        <div class="col-6">
            <p class="form-control-plaintext border-bottom pb-1 mb-0">
                <?php echo $profile["name"]; ?> <?php echo $profile["surname"]; ?>
            </p>
        </div>

        <div class="col-6">
            <select name="status[<?php echo $attendance['userAccountId']; ?>]" class="form-select">
                <option value="" selected disabled>Select Status</option>
                <option value="present">Present</option>
                <option value="absent">Absent</option>
                <option value="late">Late</option>
            </select>
        </div>
    </div>
<?php endforeach; ?>
```
Explanation:
* $attendances contains multiple attendance records retrieved from the database.
* foreach loops through each record and outputs a row dynamically.
* getUserProfile() retrieves the student’s details using their userAccountId.
* The name="status[userId]" structure allows multiple attendance values to be submitted in one form.
* This approach improves scalability and ensures the interface updates automatically when data changes.

#### Profile 
The profile shows depended on the roleId that has currenlty logged in.
Shown Example as:
```php
    <?php if($roleId == 1):?>
            <h4 class="mt-3 mb-0">Student</h4>
        <?php elseif($roleId == 2):?>
            <h4 class="mt-3 mb-0">Lecturer</h4>
        <?php elseif($roleId == 3): ?>
            <h4 class="mt-3 mb-0">Admin</h4>
        <?php endif ?>
      
    <p class="text-muted"><?php echo $username; ?></p>    
 ```

#### My Academics
* Student Dashboard shows assignments, grades, timetable, and attendance.
* Lecturer Dashboard shows student assignments, grading, and timetable.
* Admin Dashboard manages users, courses, and units.

### Calendar System
* A build it calendar using **calendar.php** and **calendar-event.php** 

Example: Add Calendar Event
This function adds a new event to the school calendar:

```php
function addCalendar($conn, $eventDate, $eventDescription, $eventType){
    $sql = "INSERT INTO school_calendar (eventDate, eventDescription, eventType) VALUES (?, ?, ?)";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../calendar.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sss", $eventDate, $eventDescription, $eventType);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
```

#### Email / Messaging System
* Inbox, Outbox, and Favourites implemented with **inbox.php**, **outbox.php**, **archives.php** and **favourites.php**
This include file **message-menu-inc.php**  that can be asily be includes on all messaging files.

```php 
    <?php include "includes/message-menu-inc.php"; ?>
 ```
```php
    <div class="col-12 col-md-3 p-0" style="background-color:#8296A3;">
            <div class="list-group list-group-flush">
                <a href="message.php" class="list-group-item text-white py-3 email-item">
                    <i class="fa-solid fa-pen-to-square me-2"></i>Compose
                </a>
                <a href="inbox.php?action=list" class="list-group-item text-white py-3 email-item">
                    <i class="fa-solid fa-inbox me-2"></i> Inbox
                </a>
                    <a href="outbox.php?action=list" class="list-group-item text-white py-3 email-item">
                    <i class="fa-solid fa-box me-2"></i> Outbox 
                </a>
                <a href="favourites.php?action=favourites" class="list-group-item text-white py-3 email-item">
                    <i class="fa-solid fa-star me-2"></i> Favourites
                </a>
            </div>
        </div>
```

* Message handling is managed with **message.php** and **message-inc.php** 
This always get user from session to prevent other users from seeing others messages by using inspect by the browser.
```php
       if(isset($_GET["action"]) && $_GET["action"] == "viewinbox"){

    $message = getMessageInbox($conn, $_SESSION ['userId'], $_GET ['messageId']);
    $fromUser = getUser ($conn, $message['senderUserId']);
    $toUser = getUser ($conn, $message['recipientUserId']);
    $from = $fromUser['username'];
    $to = $toUser['username'];
    $subject= $message['messageSubject'];
    $date= $message['sendDateTime'];
    $message = $message['messageBody'];
     }
```

#### Register User
* When registering a user, the role is automatically listed from the functions and database to the form.
```php
 <select name="role" id="role" class="form-select">
                <option value="1" selected>Student</option>
                <option value="2">Lecturer</option>
                <option value="3">Admin</option>
            </select>
```












