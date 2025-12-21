<?php
include "includes/header.php";
include "includes/user-inc.php";

if (!isset($_SESSION["userId"])) {
    header("location: login.php");
    exit();
}
?>

<!--Java script to make the fields editable when the user clicks on edit-->
<script>
        $(document).ready(function() {
            $("#edit").on("click", function(e) {
                e.preventDefault();
            
        $("#street1").prop("disabled", false);
        $("#street2").prop("disabled", false);
        $("#city").prop("disabled", false);
        $("#postCode").prop("disabled", false);
 
        $("#dsave").removeClass('d-none');
        $("#dcancel").removeClass('d-none');
        $("#dedit").addClass('d-none');
        $("#dlogout").addClass('d-none');

        $("#street1").focus();
            });
        });
    </script>



     <!--Profile form with the users fields-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6"> 
            
            <div class="row">
                <div class="col">
                    <h2 class="text-center mb-5">Profile</h2>
                </div>
            </div>
<div class="text-center mb-4">
    
    <img src="images/profile-image.webp" 
         alt="Default User Icon" 
         class="rounded-circle img-thumbnail"
         style="height: 250px; width: 250px; object-fit: cover; background-color: #a0a0a0; border: none;">

        <?php if($roleId == 1):?>
            <h4 class="mt-3 mb-0">Student</h4>
        <?php elseif($roleId == 2):?>
            <h4 class="mt-3 mb-0">Lecturer</h4>
        <?php elseif($roleId == 3): ?>
            <h4 class="mt-3 mb-0">Admin</h4>
        <?php endif ?>
      
    <p class="text-muted"><?php echo $username; ?></p>    
</div>

    <div class="row">
        <div class="col">
            <form action="includes/user-inc.php" method="post" class="mt-4">
          
    <!--Name, Surname, Email and Date of Birth-->
   <div class="row">
        <div class="col-md-6">
            <input type="text"  name="name"  placeholder="Name" value="<?php echo $name ?>" disabled class="form-control mb-3">
             <input type="text" name="surname"placeholder="Surname"  value="<?php echo $surname ?>" disabled class="form-control mb-3">
             <input type="email" name="email" placeholder="Email" value="<?php echo $email ?>" disabled class="form-control mb-3">
             <input type="date"  name="date_of_birth"  placeholder= "Date of Birth" value="<?php echo $date_of_birth ?>" disabled class="form-control mb-3">
</div>

    <!--Editable Address Details-->
    <div class="col-md-6">
          <input type="text" id="street1" name="street1" placeholder="Street 1"  value="<?php echo $street1 ?>" disabled class="form-control mb-3">
          <input type="text" id="street2" name="street2"  placeholder="Street 2"value="<?php echo $street2 ?>" disabled class="form-control mb-3">
          <input type="text" id="city" name="city" placeholder="City"value="<?php echo $city ?>" disabled class="form-control mb-3">
          <input type="text" id="postCode" name="postCode" placeholder="Post Code" value="<?php echo $postCode ?>" disabled class="form-control mb-3">
</div>

 <!--Buttons-->
    <div class="row my-3"> 
        <div class="col" id = "dedit"> <button class="btn btn-primary w-100 m-2" type="button" name="edit" id="edit">EDIT</button>
    </div>
         <div class="col d-none" id = "dsave"> <button class="btn btn-primary w-100 m-2" type="submit" name="submit" id="save">SAVE</button>
</div> 

    <div class="col" id = "dlogout">
        <a href="logout.php" class="btn btn-secondary w-100 m-2"> LOG OUT </a>
    </div>

     <div class="col d-none"  id = "dcancel">
        <a href="profile.php" class="btn btn-secondary w-100 m-2">CANCEL </a>
    </div>


</div>
            </div>
        </div>
    </div>

</main>
<?php include "includes/footer.php"; ?>