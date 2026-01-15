<?php 
    include "includes/header.php";
    include "includes/course-inc.php";
     adminPage(); //Inforce admin only in this page

?>

<?php
             if(isset($_GET["success"])) { 
                 $message = "Course Created Successfully";
                 include "includes/show-success.php";
            }
      ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container user-register mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6"> 
            
            <div class="row">
                <div class="col">
                    <h2 class="text-center mt-4 mb-5"><?php echo $pageTitle?></h2>
                </div>
            </div>
        
            <form action="course.php" method="post" class="mt-4">
            <input type="hidden" name ="courseId" value ="<?php echo $courseId?>">

            <!--Course Name and Description-->
               <div class="mb-3">
        <input type="text"  name="courseName"   id="courseName" placeholder="Course Name" class="form-control" value = "<?php echo $courseName?>" >
            </div>

         <div class="mb-3">
        <textarea name="courseDescription" id="courseDescription"  placeholder="Course Description"  class="form-control"  rows="4"><?php echo $courseDescription?></textarea>
    </div>

         <!--Credits-->
    <div class="mb-3">
        <input type="number"  name="credits"  id="credits"  placeholder="Credits"  class="form-control"   step="1"  max="9"  min="0" value = "<?php echo $credits?>" >
    </div>
        
         <!--Buttons-->
               <div class="row">
        <div class="col">
            <?php if(isset($_GET["action"])&& $_GET["action"]=="add"):?>
            <button type="submit" name="submit" value = "add" class="btn btn-primary w-100"> CREATE</button>
            <?php else:  ?>
            <button type="submit" name="submit" value = "save" class="btn btn-primary w-100"> SAVE</button>
            <?php endif  ?>
        </div>
            <div class="col">
            <button type="reset" class="btn btn-secondary w-100"> CANCEL</button>
        </div>
    </div>

            </form>
        </div>
    </div>
    </div>
   </main>

       <?php  include "includes/footer.php";?>
