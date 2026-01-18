<?php
 include "includes/header.php";
 include "includes/functions.php";
 include "includes/lecturer-assign-inc.php";
lecturerPage() //Inforce lecturer only in this page
?>

<?php
             if(isset($_GET["success"])) { 
                 $message = "Assignment Saved Successfully";
                 include "includes/show-success.php";
            }
      ?>

      <?php
             if(isset($_GET["deleted"])) { 
                 $message = "Assignment Deleted Successfully";
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
        <div class="col-12 col-md-8"> 
            
            <div class="row">
                <div class="col">
                    <h2 class="text-center mb-5">Assignments</h2>
                </div>
            </div>

  <div class="row fw-bold border-bottom pb-2 mb-3">
  <div class="col-3  text-left">Course</div>
  <div class="col-3  text-left">Unit</div>
  <div class="col-2  text-left">Task</div>
  <div class="col-2 text-center">Edit</div>
  <div class="col-2 text-center">Delete</div>
</div>

 <?php foreach($lecturerAssignments as $assignments):?>
<form action="lecturer-assign.php" method="post" id="form<?php echo $assignments["assignmentId"] ?>" class="mt-4">
  <div class="row align-items-center mb-3 border-bottom pb-2">
    <input type="hidden" name = "id" value="<?php echo  $assignments["assignmentId"] ?>" >
    <input type="hidden" name = "action"  value = "edit">


<div class="col-3">
    <?php echo $assignments["courseName"]; ?>
</div>

<div class="col-3">
    <?php echo $assignments["unitName"]; ?>
</div>

<div class="col-2">
    <?php echo $assignments["taskTitle"]; ?>
</div>
  
    <div class="col-2 text-center">
      <i class="fa-solid fa-pen" style="color: #007bff; cursor: pointer;"  onclick="submitForm(<?php echo  $assignments["assignmentId"] ?>,'edit');" ></i>
    </div> 

       <div class="col-2 text-center">
      <i class="fa-solid fa-x" style="color: #dc3545; cursor: pointer;" onclick="submitForm(<?php echo $assignments["assignmentId"] ?>,'delete');"></i>
    </div>
    
  </div>
</form>
<?php endforeach?>
</main>
          





<?php include "includes/footer.php";?>