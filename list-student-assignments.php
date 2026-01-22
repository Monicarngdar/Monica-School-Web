<?php 
 include "includes/functions.php";
include "includes/dbh.php";
include "includes/student-assign-inc.php";
include "includes/header.php";
studentPage();//Inforce student in this page
 ?>


<script>
function submitForm(Id,action){
    
    form = document.getElementById('form' + Id);
    form.action.value=action;
    document.getElementById('form' + Id).submit();
}
</script>

<div style="overflow-x: hidden;">
<?php
             if(isset($_GET["success"])) { 
                 $message = "Assignment Submitted Successfully";
                 include "includes/show-success.php";
            }
      ?>
</div>

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
  <div class="col-3 text-left">Course</div>
  <div class="col-3 text-left ">Unit</div>
  <div class="col-2 text-left">Task</div>
  <div class="col-2 text-left">Due Date</div>
  <div class="col-2 text-center">Upload</div>
</div>

 <?php foreach($studentAssignments as $assignments):?>
<form action="student-assign-deadlines.php" method="post" id="form<?php echo $assignments["assignmentId"] ?>" class="mt-4">
  <div class="row align-items-center mb-3 border-bottom pb-2">
    <input type="hidden" name = "id" value="<?php echo  $assignments["assignmentId"] ?>" >
   <input type="hidden" name = "action" id ="action" value="">

<div class="col-3">
    <?php echo $assignments["courseName"]; ?>
</div>

<div class="col-3">
    <?php echo $assignments["unitName"]; ?>
</div>

<div class="col-2">
    <?php echo $assignments["taskTitle"]; ?>
</div>

<div class="col-2">
    <?php echo $assignments["dueDate"]; ?>
</div>
  

       <div class="col-2 text-center">
        <?php if(!isAssignmentSubmitted($conn, $userId, $assignments["assignmentId"])):?>
      <i class="fa-solid fa-upload" style="color: #007bff;; cursor: pointer;" onclick="submitForm(<?php echo $assignments["assignmentId"] ?>,'upload');"></i>
     <?php else: ?>  <div class = "fw-bold text-success">Done</div>
    <?php endif?>
</div>
    
  </div>
</form>
<?php endforeach?>
</main>

<?php include "includes/footer.php"; ?>