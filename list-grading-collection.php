<?php 
    include "includes/functions.php";
    include "includes/header.php";
    include "includes/lecturer-grading-inc.php";
    lecturerPage() //Inforce lecturer  only in this page
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

  
    <div class="col-1 text-center"> <i class="fa-solid fa-pen" style="color: #007bff; cursor: pointer;"  onclick="submitForm(<?php echo  $grading["submissionId"] ?>,'edit');" ></i>
    </div> 

  </div>
</form>
<?php endforeach?>
   
   















  <?php  include "includes/footer.php";?>