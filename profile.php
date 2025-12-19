<?php
include "includes/header.php";
include "includes/user-inc.php";

if (!isset($_SESSION["userId"])) {
    header("location: login.php");
    exit();
}
?>

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
            <p><b><?php echo $username; ?></b></p>
            <p><?php echo "{$name} {$surname}"; ?></p>
             <p><b>Email:</b> <?php echo $email; ?></p>
            <p><b>Date of birth:</b> <?php echo $date_of_birth; ?></p>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>