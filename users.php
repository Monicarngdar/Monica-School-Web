<?php 
    include "includes/header.php";
    include "includes/course-inc.php";

?>

<?php
             if(isset($_GET["success"])) { 
                 $message = "Course Created Successfully";
                 include "includes/show-success.php";
            }
      ?>

<div class="container user-register mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6"> 
            
            <div class="row">
                <div class="col">
                    <h2 class="text-center mb-5"><?php echo $pageTitle?></h2>
                </div>
            </div>
        
            <form action="course.php" method="post" class="mt-4">
            <input type="hidden" name ="courseId" value ="<?php echo $courseId?>">

                <!--Username and Password-->
                        <div class="mb-3">
        <input type="text" name="username" id="username" placeholder="Username" class="form-control" value = "<?php echo $username?>" >
            </div>

               <div class="mb-3">
            <input type="password" name="password" id="password" placeholder="Password" class="form-control"  value = "<?php echo $password?>" >
            </div>

               <div class="mb-3">
            <<input type="password" name="confpass" id="confpass" placeholder="Confirm Password" class="form-control"   value = "<?php echo $confpass?>" >
            </div>

            <!--Name and Surname-->
               <div class="mb-3">
        <input type="text"  name="name"   id="name" placeholder="Name" class="form-control" value = "<?php echo $firstName?>" >
            </div>

                 <div class="mb-3">
        <input type="text"  name="surname"   id="surname" placeholder="Surname" class="form-control" value = "<?php echo $lastName?>" >
            </div>

             <!--Role-->
                      <div class="mb-3">
         <select name="role" id="role" class="form-select">
                <option value="1" selected>Student</option>
                <option value="2">Lecturer</option>
                <option value="3">Admin</option>
            </select>
            </div>

            

                 <!--Date of Birth-->
                      <div class="mb-3">
        <input type="date" name="date_of_birth" id="date_of_birth" value="Date of Birth" placeholder="Date of Birth" class="form-control" value = "<?php echo $date_of_birth?>" >
            </div>




   
         <!--Buttons-->
               <div class="row">
        <div class="col">
            <button type="submit" name="submit" class="btn btn-primary w-100"><?php if(isset($_GET["action"])&& $_GET["action"]=="add") {echo "CREATE";} else {echo "SAVE"; }?></button>
        </div>
            <div class="col">
            <button type="reset" class="btn btn-secondary w-100"> CANCEL</button>
        </div>
    </div>

            </form>
        </div>
    </div>

       <?php  include "includes/footer.php";?>
