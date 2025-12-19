<?php 
    include "includes/header.php";

?>


<!--- User Register -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content-wrapper">

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
        

<div class="container user-register mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6"> 
            
            <div class="row">
                <div class="col">
                    <h2 class="text-center mb-5">Register a User</h2>
                </div>
            </div>

    <div class="row">
        <div class="col">
        
            <form action="includes/register-inc.php" method="post" class="mt-4">
                <div class="row">
                    <div class="col">
                        <input type="text" name="username" id="username" placeholder="Username" class="w-100 m-2">
                    </div>
                    <div class="col">
                        <input type="email" name="email" id="email" placeholder="Email Address" class="w-100 m-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="password" name="password" id="password" placeholder="Password" class="w-100 m-2">
                    </div>
                    <div class="col">
                        <input type="password" name="confpass" id="confpass" placeholder="Confirm Password" class="w-100 m-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" name="name" id="name" placeholder="Name" class="w-100 m-2">
                    </div>
                    <div class="col">
                        <input type="text" name="surname" id="surname" placeholder="Surname" class="w-100 m-2">
                    </div>
                </div>

                        <div class="row">
                        <div class="col">
                        <select name="role" id="role" class="w-100 m-2" >
      <option value="1" selected="selected">Student</option>
      <option value="2">Lecturer</option>
      <option value="3">Admin</option>
    
    
    </select>
  </div>
</div>

                 <div class="row">
            <div class="col">
                <input type="date" name="date_of_birth" id="date_of_birth"  value="Date of Birth" placeholder="Date of Birth" class="w-100 m-2">
            </div>
        </div>

                
                <div class="row my-3">
                    <div class="col">
                        <button class="btn btn-primary w-100 m-2" type="submit" name="submit" id="submit">SUBMIT</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-secondary w-100 m-2" type="reset" name="reset" id="reset">CANCEL</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</main>
