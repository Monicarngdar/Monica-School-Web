<?php  include "includes/header.php";?>


<!--- User Log in -->
            <main>

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
            
       
    <?php } ?>


<form action="includes/login-inc.php" method="POST">
    <div class="container">
        <h2 class="user-login text-center">User Log in</h2>

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
            <div class="col">
                <button   type="submit"   name="submit"  id="submit"  class="btn btn-primary w-100 m-2"> LOG IN</button>
            </div>
        </div>
    </div>
</form>
 </main>
    


    <?php  include "includes/footer.php";?>

