<?php 
    include "includes/header.php";
    include "includes/functions.php";
    include "includes/dbh.php";
    $courses = getCourses($conn)

?>

<?php
             if(isset($_GET["success"])) { 
                 $message = "Unit Created Successfully";
                 include "includes/show-success.php";
            }
      ?>


<div class="container user-register mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6"> 
            
            <div class="row">
                <div class="col">
                    <h2 class="text-center mb-5">Add Unit</h2>
                </div>
            </div>

      <!--Unit Name and Description-->       
            <form action="includes/unit-inc.php" method="post" class="mt-4">

                <div class="mb-3">
                    <input type="text" name="unitName" Id ="unitName"  placeholder="Unit Name"  class="form-control" >
                </div>

                <div class="mb-3">
                    <textarea name="unitDescription"  Id = "unitDescription" placeholder="Unit Description"  class="form-control"  rows="4" ></textarea>
                </div>

         <!--Course ID-->  
           <div class="mb-3">
                    <select name="courseId" id="courseId" class="form-control">
                        <option value="">Select Course</option>
                        <?php foreach($courses as $course):?>
                        <option value="<?php echo $course["courseId"]?>">
                        <?php echo $course["courseName"]?></option>

                        <?php endforeach?>
                    </select>
                </div>


        <!--Semester-->  
                <div class="mb-3">
                    <select name="semester" id="semester" class="form-control">
                        <option value="">Select Semester</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                    </select>
                </div>
                    
              <!--Buttons-->
                <div class="row">
                    <div class="col">
                        <button type="submit" name="submit" class="btn btn-primary w-100">CREATE</button>
                    </div>
                    <div class="col">
                        <button type="reset" class="btn btn-secondary w-100"> CANCEL</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

       <?php  include "includes/footer.php";?>
