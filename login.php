
<?php  include "includes/header.php";?>


<!--- User Log in -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content-wrapper">

    <?php 
        if(isset($_GET["error"])) { 
            $message = "";
            if ($_GET["error"] == "incorrectlogin"){
                $message = "Incorrect Login";
            }
            ?>
            <div class="row">
                <div class="col"></div>
                <div class="col border border-danger text-danger">
                    <p><?php echo $message; ?></p>
                </div>
                <div class="col"></div>
            </div>
    <?php } ?>

    <?php 
        if(isset($_GET["error"])) { 
            $message = "";
            if ($_GET["error"] == "stmtfailed"){
                $message = "error with sql query";
            }
            ?>
            <div class="row">
                <div class="col"></div>
                <div class="col border border-danger text-danger">
                    <p><?php echo $message; ?></p>
                </div>
                <div class="col"></div>
            </div>
    <?php } ?>

    


<div class = "login-container mx-auto">
<h2 class="user-login text-center ">User Log in</h2>

     <form action="includes/login-inc.php" method= "POST">

     <div class = "mb-3"> 
         <input type="text" id="username" name="username" class = "user-login-form" placeholder = "Username"> 
         </div>

     <div class = "mb-4"> 
         <input type="text" id="password" name="password" class = "user-login-form" placeholder = "Password"> 
        

            </div>
            </div>

    
<div class="d-flex justify-content-center gap-3">
    <button type="button" class="btn btn-secondary">BACK</button>                
     <button type="submit" class="btn btn-primary">LOG IN</button>
     </div>


  </div>
</div>

</form>

            </main>

    <?php  include "includes/footer.php";?>

