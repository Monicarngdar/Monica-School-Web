<?php 
    include "includes/header.php";
     include "includes/functions.php";
    include "includes/dbh.php";
    $courses = getCourses($conn);

?>

<div class="container user-register mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6"> 
            
            <div class="row">
                <div class="col">
                    <h2 class="text-center mb-5">Courses</h2>
                </div>
            </div>
        
            <form action="includes/course-inc.php" method="post" class="mt-4">

        
      <div class="container mt-3">
  <div class="row fw-bold border-bottom pb-2 mb-3">
    <div class="col-6">Course Name</div>
    <div class="col-3 text-center">Edit</div>
    <div class="col-3 text-center">Delete</div>
  </div>

  <div class="row align-items-center mb-3 border-bottom pb-2">
    <div class="col-6">Interactive Media</div>
    <div class="col-3 text-center">
      <i class="fa-solid fa-pen" style="color: #007bff; cursor: pointer;"></i>
    </div>
    <div class="col-3 text-center">
      <i class="fa-solid fa-x" style="color: #dc3545; cursor: pointer;"></i>
    </div>
  </div>

  <div class="row align-items-center mb-3 border-bottom pb-2">
    <div class="col-6">Photography</div>
    <div class="col-3 text-center">
      <i class="fa-solid fa-pen" style="color: #007bff; cursor: pointer;"></i>
    </div>
    <div class="col-3 text-center">
      <i class="fa-solid fa-x" style="color: #dc3545; cursor: pointer;"></i>
    </div>
  </div>

  <div class="row align-items-center mb-3 border-bottom pb-2">
    <div class="col-6">Graphic Design</div>
    <div class="col-3 text-center">
      <i class="fa-solid fa-pen" style="color: #007bff; cursor: pointer;"></i>
    </div>
    <div class="col-3 text-center">
      <i class="fa-solid fa-x" style="color: #dc3545; cursor: pointer;"></i>
    </div>
  </div>
</div>

     
      

            </form>
        </div>
    </div>

       <?php  include "includes/footer.php";?>
