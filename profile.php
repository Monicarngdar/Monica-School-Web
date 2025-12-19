<?php
include "includes/header.php";
include "includes/user-inc.php";

if (!isset($_SESSION["userId"])) {
    header("location: login.php");
    exit();
}
?>

<!--
<div class="container mt-2">
    <div class="row">
        <div class="col-2">
            <img 
                src="images/profile-image.webp" 
                alt="Default User Icon"
                style="height:100px;width:100px;"
            >
        </div>
        <div class="col-10">
            <p><b>Username:</b> <?php echo $username; ?></p>
            <p><b>Name:</b> <?php echo "{$name}"; ?></p>
            <p><b>Surname:</b> <?php echo "{$surname}"; ?></p>
             <p><b>Email:</b> <?php echo $email; ?></p>
            <p><b>Date of birth:</b> <?php echo $date_of_birth; ?></p>//
        </div>
    </div>
</div>  -->


<!--Java scrpit to make the fields editable when the user clicks on edit-->
<script>
        $(document).ready(function() {
            $("#edit").on("click", function(e) {
                e.preventDefault();
            
        $("#street1").prop("disabled", false);
        $("#street2").prop("disabled", false);
        $("#city").prop("disabled", false);
        $("#postCode").prop("disabled", false);

        
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
    
    <h4 class="mt-3 mb-0">Student</h4>
    <p class="text-muted"><?php echo $username; ?></p>    
</div>

    <div class="row">
        <div class="col">
            <form action="" method="post" class="mt-4">
          
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
        <div class="col"> <button class="btn btn-primary w-100 m-2" type="button" name="edit" id="edit">EDIT</button>
</div> 
    <div class="col">
     <button class="btn btn-secondary w-100 m-2" type="reset" name="reset" id="reset">CANCEL</button> 
                </div> 
            </div>
        </div>
    </div>

</main>
<?php include "includes/footer.php"; ?>