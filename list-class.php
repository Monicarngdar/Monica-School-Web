<?php  
    include "includes/header.php";
     include "includes/functions.php";
     include "includes/dbh.php";
      include "includes/class-inc.php";
     adminPage(); //Inforce admin only in this page
?>

       <?php
             if(isset($_GET["success"])) { 
                 $message = "Class Saved Successfully";
                 include "includes/show-success.php";
            }
      ?>

      <?php
             if(isset($_GET["deleted"])) { 
                 $message = "Class Deleted Successfully";
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

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="container user-register mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6"> 
            <div class="row">
                <div class="col">
                 <h2 class="text-center mt-4 mb-5">Manage Class</h2>
                </div>
            </div>
        
        <div class="container mt-3">
          <div class="row fw-bold border-bottom pb-2 mb-3">
            <div class="col-6 text-start">Class Name</div>
            <div class="col-3 text-center">Edit</div>
            <div class="col-3 text-center">Delete</div>
          </div>

  
      <?php foreach($classes as $class):?>
          <form action="class.php" method="post" id="form<?php echo $class["classId"] ?>"  class="mt-4">
            <div class="row align-items-center mb-3 border-bottom pb-2">
              <input type="hidden" name="id" value="<?php echo $class["classId"] ?>">
              <input type="hidden" name="action" value="edit">

              <div class="col-6 text-start"><?php echo $class["className"] ?></div>

              <div class="col-3 text-center">
                <i class="fa-solid fa-pen" style="color: #007bff; cursor: pointer;" onclick="submitForm(<?php echo $class["classId"] ?>,'edit');" ></i>
              </div>

              <div class="col-3 text-center">
                <i class="fa-solid fa-x" style="color: #dc3545; cursor: pointer;" onclick="submitForm(<?php echo $class["classId"] ?>,'delete');"></i>
              </div>
            </div>
          </form>
     <?php endforeach?>
        </div>

       </div>
    </div>
</div>
</main>

<?php  include "includes/footer.php";?>