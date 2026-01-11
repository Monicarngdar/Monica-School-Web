<!DOCTYPE html>
<html lang="en">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<head>
    <meta charset="UTF-8">

     <?php
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0',false);
        header('Pragma: no-cache');

        if (session_status() !== PHP_SESSION_ACTIVE ) {
             session_start();
       }

      
    ?>
    


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myskolar Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" >
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <header class="navbar navbar-dark overflow-hidden sticky-top bg-myskolar flex-md-nowrap z-3 main-header">
        
        <div class="d-flex align-items-center navbar-brand-wrapper"> 
            <a class="navbar-brand px-2" href="index.php">MYSKOLAR</a>

   <!--When the user is logged in, the dashboard and email link would be shown -->
        <?php if (isset($_SESSION["username"])) {   ?>
            <a class="nav-link text-white mx-3 fw-semibold" href="calendar.php">Dashboard</a>
            <a class="nav-link text-white fw-semibold" href="message.php">Emails</a>
        <?php }  ?>
       
        
            </div>


        <div class="w-100 d-none d-md-block"></div>
        <div class="d-flex align-items-center me-3">

    <!--When the user is logged in, the profile would be shown -->
        <?php if (isset($_SESSION["username"])) {   ?>
            <a href = "profile.php" > <img src="images/circle.png" /></a>
             <?php }  ?>
            <button class="navbar-toggler d-md-none" type="button"  data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="width: 1em; height: 1em;"></span> 
            </button>
        </div>
    </header>

    
    <!--When the user is logged in, my academics would be shown -->
    <?php if (isset($_SESSION["username"])) {   ?>
 
            <nav id="sidebarMenu" class="d-md-block bg-skolar sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <h5 style="color: white; font-weight: bold;  margin-left: 10px;">My Academics</h5>
                        </li>
                        <?php  if ($_SESSION ['userRole']==3 ):?>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php?action=add"> 
                            <i class="fa-solid fa-user-plus me-2"></i> Register a User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="list-users.php?action=list">
                            <i class="fa-solid fa-user-gear me-2"></i>Manage Users</a>
                        </li>
                           <li class="nav-item">
                            <a class="nav-link" href="list-courses.php?action=list"> 
                            <i class="fa-solid fa-layer-group me-2"></i> Manage Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="course.php?action=add"> 
                            <i class="fa-solid fa-circle-plus me-2"></i> Add Course</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="list-units.php?action=list"> 
                            <i class="fa-solid fa-layer-group me-2"></i> Manage Units</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="unit.php?action=add">
                            <i class="fa-solid fa-circle-plus me-2"></i> Add Unit</a>
                        </li>
                        <?php endif ?>

                        <?php  if ($_SESSION ['userRole']==2 ):?>
                         <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-calendar-days me-2"></i> Timetable</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-book-open me-2"></i> My Units</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-user-clock me-2"></i> Attendance</a>
                        </li>
                          <li class="nav-item">
                            <a class="nav-link" href="list-lecturer-assignments.php?action=list">
                             <i class="fa-solid fa-list-check me-2"></i> Assignments</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="lecturer-assign.php?action=add">
                             <i class="fa-solid fa-pen me-2"></i> Add Assignment</a>
                        </li>
                       <li class="nav-item">
                            <a class="nav-link" href="list-grading-collection.php?action=list">
                            <i class="fa-solid fa-circle-check me-2"></i> Grading</a>
                        </li>
                         <?php endif ?>
      

                        <?php  if ($_SESSION ['userRole']==1 ):?>
                            <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-calendar-days me-2"></i> Timetable</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-book-open me-2"></i> My Units</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-user-clock me-2"></i> Attendance</a>
                        </li>
                          <li class="nav-item">
                            <a class="nav-link" href="list-student-assignments.php?action=list">   
                            <i class="fa-solid fa-list-check me-2"></i> Assignments</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="student-grades.php?action=list"> 
                            <i class="fa-solid fa-circle-check me-2"></i> Grades</a>
                        </li>
                         <?php endif ?>
      
                 <?php }  ?>
                
            </nav>