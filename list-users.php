<?php 
    include "includes/header.php";
    include "includes/user-inc.php";
    adminPage() //Inforce admin only in this page
?>

<?php
             if(isset($_GET["success"])) { 
                 $message = "User Saved Successfully";
                 include "includes/show-success.php";
            }
      ?>

      <?php
             if(isset($_GET["deleted"])) { 
                 $message = "User Deleted Successfully";
                 include "includes/show-success.php";
            }
      ?>


<script>
function submitForm(Id,action){
    
    form = document.getElementById('form' + Id);
    form.action.value=action;
    document.getElementById('form' + Id).submit();
}
</script>

<div class="container user-register mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6"> 
            
            <div class="row">
                <div class="col">
                    <h2 class="text-center mb-5">Manage Users</h2>
                </div>
            </div>
        
   <div class="row fw-bold border-bottom pb-2 mb-3">
  <div class="col-6">Users Name</div>
  <div class="col-2 text-center">Edit</div>
  <div class="col-2 text-center">Units</div>
  <div class="col-2 text-center">Delete</div>
</div>


   <?php foreach($users as $user):?>
    <form action="user.php" method="post" id = "form<?php echo $user["userId"] ?>" class="mt-4">
  <div class="row align-items-center mb-3 border-bottom pb-2">
    <input type="hidden" name = "id" value="<?php echo $user["userId"] ?>" >
    <input type="hidden" name = "action"  value = "edit">
    <div class="col-6"><?php echo $user["username"] ?></div>
    <div class="col-2 text-center">
      <i class="fa-solid fa-pen" style="color: #007bff; cursor: pointer;" onclick="submitForm(<?php echo $user["userId"] ?>,'edit');" ></i>
    </div> 
    <div class="col-2 text-center">
      <i class="fa-solid fa-book" style="color: #007bff; cursor: pointer;" onclick="submitForm(<?php echo $user["userId"] ?>,'unit');" ></i>
    </div> 
    <div class="col-2 text-center">
      <i class="fa-solid fa-x" style="color: #dc3545; cursor: pointer;" onclick="submitForm(<?php echo $user["userId"] ?>,'delete');"></i>
    </div>
  </div>
    </form>
    <?php endforeach?>
   
            </div>
        </div>
    </div>

       <?php  include "includes/footer.php";?>
