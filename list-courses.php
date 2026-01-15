<?php 
    include "includes/header.php";
    include "includes/functions.php";
    include "includes/dbh.php";
    $courses = getCourses($conn);
    adminPage(); //Inforce admin only in this page

?>
   <?php     
          if(isset($_GET["error"])) { 
            $message = "";

             if ($_GET["error"]=="courseinuse") {
                 $message = "The Course is being used by a Unit and cannot be deleted";
                 include "includes/show-error.php";
            } }

            ?>
  <?php
             if(isset($_GET["success"])) { 
                 $message = "Course Saved Successfully";
                 include "includes/show-success.php";
            }
      ?>

      <?php
             if(isset($_GET["deleted"])) { 
                 $message = "Course Deleted Successfully";
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
                  <h2 class="text-center mt-4 mb-5">Manage Courses</h2>
                </div>
            </div>
        
         
      <div class="container mt-3">
  <div class="row fw-bold border-bottom pb-2 mb-3">
    <div class="col-6">Course Name</div>
    <div class="col-3 text-center">Edit</div>
    <div class="col-3 text-center">Delete</div>
  </div>

  
   <?php foreach($courses as $course):?>
    <form action="course.php" method="post" id = "form<?php echo $course["courseId"] ?>" class="mt-4">
  <div class="row align-items-center mb-3 border-bottom pb-2">
    <input type="hidden" name = "id" value="<?php echo $course["courseId"] ?>" >
    <input type="hidden" name = "action"  value = "edit">
    <div class="col-6"><?php echo $course["courseName"] ?></div>
    <div class="col-3 text-center">
      <i class="fa-solid fa-pen" style="color: #007bff; cursor: pointer;" onclick="submitForm(<?php echo $course["courseId"] ?>,'edit');" ></i>
    </div> 
    <div class="col-3 text-center">
      <i class="fa-solid fa-x" style="color: #dc3545; cursor: pointer;" onclick="submitForm(<?php echo $course["courseId"] ?>,'delete');"></i>
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
