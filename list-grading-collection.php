<?php 
    include "includes/functions.php";
     include "includes/dbh.php";
    include "includes/header.php";
    include "includes/lecturer-grading-inc.php";
    lecturerPage() //Inforce lecturer  only in this page
?>

<div style="overflow-x: hidden;">
<?php
             if(isset($_GET["success"])) { 
                 $message = "Assignment Graded Successfully";
                 include "includes/show-success.php";
            }
      ?>
</div>

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
                    <h2 class="text-center mb-5">Grading</h2>
                </div>
            </div>
        
   <div class="row fw-bold border-bottom pb-2 mb-3">
  <div class="col-3 text-left">First Name</div>
  <div class="col-3 text-left ">Last Name</div>
  <div class="col-3 text-left">Unit</div>
  <div class="col-3 text-left">Grade</div>
</div>

<?php foreach($lecturerGradingAssignnments as $grading): ?>
<form action="lecturer-grading.php" method="post" id="form<?php echo $grading["submissionId"] ?>"  class="mt-4">
  <div class="row align-items-center mb-3 border-bottom pb-2">
    
    <input type="hidden" name="id" value="<?php echo  $grading["submissionId"] ?>">

    <input type="hidden" name="action" value="edit">

       <div class="col-3">
        <?php echo $grading["name"]; ?>
    </div>

    <div class="col-3">
      <?php echo $grading["surname"]; ?>
    </div>

    <div class="col-3">
        <?php echo $grading["unitName"]; ?>
    </div>

<?php //If the lecturer already these assignment show the marks else show the edit button?>
  <?php $grade = getGrade($conn, $grading["assignmentId"],$grading["studentId"] )?>
  <?php if ($grade): ?> 
   <div class="col-1 text-center">
  <?php echo ($grade['marksEarned']); ?>
  </div>
  <?php else: ?>
    <div class="col-1 text-center"> <i class="fa-solid fa-pen" style="color: #007bff; cursor: pointer;"  onclick="submitForm(<?php echo  $grading["submissionId"] ?>,'edit');" ></i>
    </div> 
    <?php endif ?>

  </div>
</form>
<?php endforeach?>
</main>




  <?php  include "includes/footer.php";?>