<?php 
    include "includes/functions.php";
    include "includes/header.php";
    adminPage() //Inforce admin only in this page

?>
<main>

<!--- Success and Errors Message in form -->
      <?php 
              if(isset($_GET["success"])) { 
                 $message = "User Created Successfully";
                 include "includes/show-success.php";
            }

        if(isset($_GET["error"])) { 
            $message = "";

             if (isset($_GET["missingFields"])) {
                 $message = "Missing Fields";
                 include "includes/show-error.php";
            }
            if (isset($_GET["invalidUsername"])) {
                $message = "Invalid Username";
                include "includes/show-error.php";
            }
             if (isset($_GET["userExists"])) {
                $message = "User Already Exists, Please change the username";
                include "includes/show-error.php";
            }
             if (isset($_GET["invalidEmail"])) {
                $message = "Invalid Email";
                 include "includes/show-error.php";
            }
            if (isset($_GET["passwordsDoNotMatch"])) {
                 $message = "Passwords Do Not Match";
                 include "includes/show-error.php";
            }
            ?>

    <?php } ?>    
        
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="container user-register mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6"> 
            
            <div class="row">
                <div class="col">
                    <h2 class="text-center mt-4 mb-5">Register a User</h2>
                </div>
            </div>


        <form action="includes/register-inc.php" method="post" class="mt-4">
          <div class="row mb-3">
        <div class="col">
            <input type="text" name="username" id="username" placeholder="Username" class="form-control" >
        </div>
        <div class="col">
            <input type="email" name="email" id="email" placeholder="Email Address" class="form-control" >
        </div>
        </div>

             <div class="row mb-3">
        <div class="col">
            <input type="password" name="password" id="password" placeholder="Password" class="form-control" >
        </div>
        <div class="col">
            <input type="password" name="confpass" id="confpass" placeholder="Confirm Password" class="form-control" >
        </div>
    </div>

                <div class="row mb-3">
        <div class="col">
            <input type="text" name="name" id="name" placeholder="Name" class="form-control" >
        </div>
        <div class="col">
            <input type="text" name="surname" id="surname" placeholder="Surname" class="form-control">
        </div>
    </div>

         <div class="row mb-3">
        <div class="col">
            <select name="role" id="role" class="form-select">
                <option value="1" selected>Student</option>
                <option value="2">Lecturer</option>
                <option value="3">Admin</option>
            </select>
        </div>
    </div>

           <div class="row mb-3">
        <div class="col">
            <input type="date" name="date_of_birth" id="date_of_birth" value="Date of Birth" placeholder="Date of Birth" class="form-control" >
        </div>
    </div>
        
             <div class="row">
        <div class="col">
            <button type="submit" name="submit" class="btn btn-primary w-100">SUBMIT</button>
        </div>
        <div class="col">
            <button type="reset" class="btn btn-secondary w-100">CANCEL</button>
        </div>
    </div>

            </form>
        </div>
    </div>

</main>

   <?php  include "includes/footer.php";?>

