<?php
 include "includes/header.php";
 include "includes/functions.php";
 include "includes/lecturer-assign-inc.php";
lecturerPage() //Inforce lecturer only in this page
?>

<div class="container user-register mt-5">
    <div class="row justify-content-center">
        <di class="col-12 col-md-8 col-lg-6"> 
            
            <div class="row">
                <div class="col">
                    <h2 class="text-center mb-5">Assignments</h2>
                </div>
            </div>

  <div class="row fw-bold border-bottom pb-2 mb-3">
  <div class="col-3">Course</div>
  <div class="col-3">Unit</div>
  <div class="col-4">Assignments</div>
  <div class="col-2 text-center">Edit</div>
</div>

<form action="list-lecturer-assignments.php" method="post" id="form" class="mt-4">
  <div class="row align-items-center mb-3 border-bottom pb-2">
    <div class="col-3"></div> 
    <div class="col-3"></div>
    <div class="col-4"></div>
    
    <div class="col-2 text-center">
      <i class="fa-solid fa-pen" style="color: #007bff; cursor: pointer;" onclick="submitForm();"></i>
    </div> 
  </div>
</form>
   
          





<?php include "includes/footer.php";?>