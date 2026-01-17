<?php
include "includes/functions.php";
include "includes/user-inc.php";
include "includes/header.php";
adminPage(); //Inforce admin only in this page

?>

<!--- Errors Message in form -->
      <?php 

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

     <!--Profile form with the users fields-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6"> 
            
            <div class="row">
                <div class="col">
                    <h2 class="text-center mt-4 mb-5"><?php echo $pageTitle?></h2>
                </div> 
            </div>
<div class="text-center mb-4">
    

        <?php if($roleId == 1):?>
            <h4 class="mt-3 mb-0">Student</h4>
        <?php elseif($roleId == 2):?>
            <h4 class="mt-3 mb-0">Lecturer</h4>
        <?php elseif($roleId == 3): ?>
            <h4 class="mt-3 mb-0">Admin</h4>
        <?php endif ?>
</div>

    <div class="row">
        <div class="col">
            <form action="includes/user-inc.php" method="post" class="mt-4">
            <input type="hidden" name ="userId" value ="<?php echo $userId?>">
            <input type="hidden" name ="action" value ="<?php echo $action?>">
    <!--Name, Surname, Email, Username, Password and Date of Birth-->
   <div class="row">
    <div class="col-md-6">
        <input type="text" name="name" placeholder="Name" value="<?php echo $name ?>" class="form-control mb-3">
        <input type="text" name="surname" placeholder="Surname" value="<?php echo $surname ?>" class="form-control mb-3">
        <input type="text" name="username" id="username" placeholder="Username" class="form-control mb-3" value="<?php echo $username ?>">
        <input type="email" name="email" placeholder="Email" value="<?php echo $email ?>" class="form-control mb-3">
        <input type="date" name="date_of_birth" placeholder="Date of Birth" value="<?php echo $date_of_birth ?>" class="form-control mb-3">

          
    </div>

             

    <div class="col-md-6">
        <input type="text" id="street1" name="street1" placeholder="Street 1" value="<?php echo $street1 ?>" class="form-control mb-3">
        <input type="text" id="street2" name="street2" placeholder="Street 2" value="<?php echo $street2 ?>" class="form-control mb-3">
        <input type="text" id="city" name="city" placeholder="City" value="<?php echo $city ?>" class="form-control mb-3">
        <input type="text" id="postCode" name="postCode" placeholder="Post Code" value="<?php echo $postCode ?>" class="form-control mb-3">
        
               <select name="courseId" id="courseId" class="form-control mb-3" >
                        <option value="">Select Course</option>
                        <?php foreach($courses as $course):?>
                        <option value="<?php echo $course["courseId"]?>"
                        <?php if($course["courseId"]== $courseId) echo "selected = selected" ?>>
                        <?php echo $course["courseName"]?></option>

                        <?php endforeach?>
                    </select>

    </div>
</div> 

<div class ="row">
    <div class="col-12">
                    <select name="classId" id="classId" class="form-control mb-3"  required>
                        <option value="" selected disabled>Select Class</option>
                        <?php foreach($classes as $class):?>
                        <option value="<?php echo $class["classId"]?>"
                        <?php if($class["classId"]== $classId) echo "selected = selected" ?>>
                        <?php echo $class["className"]?></option>
                      <?php endforeach?>
                    </select>
       </div>
</div>

<div class="row">
    <div class="col-md-6">
        <input type="password" name="password" id="password" placeholder="Password" class="form-control mb-3">
    </div>
    <div class="col-md-6">
        <input type="password" name="confpass" id="confpass" placeholder="Confirm Password" class="form-control mb-3">
    </div>
</div>

 <!--Buttons-->
                <div class="row">
                    <div class="col">
                        <button type="submit" name="submit" class="btn btn-primary w-100">SAVE</button>
                    </div>
                    <div class="col">
                        <button type="reset" class="btn btn-secondary w-100"> CANCEL</button>
                    </div>
                </div>


</div>
            </div>
        </div>
    </div>

</main>
<?php include "includes/footer.php"; ?>