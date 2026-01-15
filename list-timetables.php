<?php  include "includes/header.php";
     include "includes/functions.php";
    include "includes/dbh.php";
    adminPage(); //Inforce admin only in this page
?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="container user-register mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6"> 
            <div class="row">
                <div class="col">
                 <h2 class="text-center mt-4 mb-5">Manage Timetables</h2>
                </div>
            </div>
        
         
      <div class="container mt-3">
  <div class="row fw-bold border-bottom pb-2 mb-3">
    <div class="col-6">Course Name</div>
    <div class="col-3 text-center">Edit</div>
    <div class="col-3 text-center">Delete</div>
  </div>

  <form action="timetable.php" method="post" id="form1" class="mt-4">
  <div class="row align-items-center mb-3 border-bottom pb-2">
    <input type="hidden" name="id" value="1">
    <input type="hidden" name="action" value="edit">

    <div class="col-6">xx</div>

    <div class="col-3 text-center">
      <i class="fa-solid fa-pen" style="color: #007bff; cursor: pointer;" onclick="submitForm(1, 'edit');"></i>
    </div>

    <div class="col-3 text-center"> <i class="fa-solid fa-x" style="color: #dc3545; cursor: pointer;" onclick="submitForm(1, 'delete');"></i>
    </div>
  </div>
</form>

      </div>
   </div>
</div>
</main>

<?php  include "includes/footer.php";?>