<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

     <?php
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0',false);
        header('Pragma: no-cache');
    ?>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myskolar Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" >
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-myskolar flex-md-nowrap z-3 main-header">
        
        <div class="d-flex align-items-center navbar-brand-wrapper"> 
            <a class="navbar-brand px-2" href="#">MYSKOLAR</a>

   <!--When the user is logged in, the dashboard and email link would be shown -->
        <?php if (isset($_SESSION["username"])) {   ?>
            <a class="nav-link text-white mx-3 fw-semibold" href="#">Dashboard</a>
            <a class="nav-link text-white fw-semibold" href="#">Emails</a>
        <?php }  ?>
       
        
            </div>


        <div class="w-100 d-none d-md-block"></div>

        <div class="d-flex align-items-center me-3">

    <!--When the user is logged in, the profile would be shown -->
        <?php if (isset($_SESSION["username"])) {   ?>
            <img src="images/circle.png" /> &nbsp;
             <?php }  ?>
            <button class="navbar-toggler d-md-none" type="button"  data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="width: 1em; height: 1em;"></span> 
            </button>
        </div>
    </header>

    
    <!--When the user is logged in, my academics would be shown -->
    <?php if (isset($_SESSION["username"])) {   ?>
    <div class="container-fluid">
        <div class="row">
            
            <nav id="sidebarMenu" class="d-md-block bg-skolar sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" >My Academics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Timetable</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">My Units</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Attendance</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="#">Assignments</a>
                        </li>
                       <li class="nav-item">
                            <a class="nav-link" href="#">Grades</a>
                        </li>
                    </ul>
                </div>
                 <?php }  ?>
                
            </nav>