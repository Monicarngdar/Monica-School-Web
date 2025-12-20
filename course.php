<?php 
    include "includes/header.php";
     include "includes/functions.php";
    include "includes/dbh.php";
    $units = getUnits($conn)

?>

<?php
             if(isset($_GET["success"])) { 
                 $message = "Course Created Successfully";
                 include "includes/show-success.php";
            }
      ?>




<div class="container user-register mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6"> 
            
            <div class="row">
                <div class="col">
                    <h2 class="text-center mb-5">Add Course</h2>
                </div>
            </div>
        
            <form action="includes/course-inc.php" method="post" class="mt-4">

            <!--Course Name and Description-->
               <div class="mb-3">
        <input type="text"  name="courseName"   id="courseName" placeholder="Course Name" class="form-control"  >
            </div>

         <div class="mb-3">
        <textarea name="courseDescription" id="courseDescription"  placeholder="Course Description"  class="form-control"  rows="4"></textarea>
    </div>

         <!--Credits-->
    <div class="mb-3">
        <input type="number"  name="credits"  id="credits"  placeholder="Credits"  class="form-control"   step="1"  max="9"  min="0" >
    </div>
        
         <!--Buttons-->
               <div class="row">
        <div class="col">
            <button type="submit" name="submit" class="btn btn-primary w-100"> CREATE</button>
        </div>
        <div class="col">
            <button type="reset" class="btn btn-secondary w-100"> CANCEL</button>
        </div>
    </div>

            </form>
        </div>
    </div>

       <?php  include "includes/footer.php";?>
