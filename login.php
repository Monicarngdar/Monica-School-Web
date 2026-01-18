<?php  include "includes/header.php";?>


<!--- User Log in -->

       
<div style="overflow-x: hidden;">
    <?php 
        if(isset($_GET["error"])) { 
            $message = "";
            if ($_GET["error"] == "incorrectlogin"){
                $message = "Incorrect Login";
                include "includes/show-error.php";
            }

            //Wrong log in as student
             if ($_GET["error"] == "studentnotloggedin"){
                $message = "Please log in as a student";
                 include "includes/show-error.php";
            }

             //Wrong log in as lecturer
             if ($_GET["error"] == "lecturernotloggedin"){
                $message = "Please log in as a lecturer";
                include "includes/show-error.php";
            }

             //Wrong log in as admin
             if ($_GET["error"] == "adminnotloggedin"){
                $message = "Please log in as an admin";
                  include "includes/show-error.php";
            }
            ?>
       </div>     
       
    <?php } ?>
 <main>
<div class="container mt-5">
<form action="includes/login-inc.php" method="POST" >
    <div class="container" style="max-width: 450px;">
        <h2 class= "text-center mt-4 mb-5">Log in to your Account</h2>

        <!-- Username -->
        <div class="row mb-3">
            <div class="col">
                <input type="text" id="username"  name="username"  class="form-control"  placeholder="Username"> </div>
        </div>

        <!-- Password -->
        <div class="row mb-4">
            <div class="col">
                <input   type="password"   id="password"  name="password"  class="form-control" placeholder="Password"></div>
        </div>

        <!-- Button -->
         <div class="row">
        <div class="col d-flex justify-content-center">
            <button type="submit" name="submit" id="submit" class="btn btn-primary w-50">LOG IN</button>
        </div>
    </div>
    </div>
</form>
</div>
 </main>
    


    <?php  include "includes/footer.php";?>

