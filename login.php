
<?php  include "includes/header.php";?>

<!--- User Log in -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content-wrapper">

              <form action="includes/login-inc.php" method= "POST">
<div class = "container">
    <div class = "row">
        <div class ="col">          
            <label for="username">Username:</label>  
            <input type="text" id="username" name="username">
        </div>

           <div class ="col">          
            <label for="password">Password:</label>  
            <input type="password" id="password" name="password">
        </div>
    </div>

    <div class = "row">
        <div class ="col">          
           <button type ="submit" name ="submit" id="submit">Login</button>
     </div>
  </div>
</div>

</form>

            </main>

    <?php  include "includes/footer.php";?>

