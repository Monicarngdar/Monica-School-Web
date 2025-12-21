<?php  include "includes/header.php";?>


<!--- User Log in -->
            <main>

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


<form action="includes/login-inc.php" method="POST">
    <div class="container">
        <h2 class="user-login text-center">User Log in</h2>

        <!-- Username -->
        <div class="row mb-3">
            <div class="col">
                <input type="text" id="username"  name="username"  class="user-login-form form-control"  placeholder="Username"> </div>
        </div>

        <!-- Password -->
        <div class="row mb-4">
            <div class="col">
                <input   type="password"   id="password"  name="password"  class="user-login-form form-control" placeholder="Password"></div>
        </div>

        <!-- Button -->
        <div class="row">
            <div class="col">
                <button   type="submit"   name="submit"  id="submit"  class="btn btn-primary w-100"> LOG IN</button>
            </div>
        </div>
    </div>
</form>
 </main>
    


    <?php  include "includes/footer.php";?>

