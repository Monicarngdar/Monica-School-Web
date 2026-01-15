<?php 
    include "includes/header.php";
    include "includes/unit-inc.php";
    adminPage() //Inforce admin only in this page


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

      <!--Unit Name and Description-->       
            <form action="unit.php" method="post" class="mt-4">
            <input type="hidden" name ="unitId" value ="<?php echo $unitId?>">
            <input type="hidden" name ="action" value ="<?php echo $action?>">
            
                <div class="mb-3">
                    <input type="text" name="unitName" Id ="unitName"  placeholder="Unit Name"  class="form-control" value = "<?php echo $unitName?>">
                </div>

                <div class="mb-3">
                    <textarea name="unitDescription"  Id = "unitDescription" placeholder="Unit Description"  class="form-control"  rows="4" ><?php echo $unitDescription?>
                    </textarea>
                </div>

         <!--Course ID-->  
           <div class="mb-3">
                    <select name="courseId" id="courseId" class="form-control" >
                        <option value="">Select Course</option>
                        <?php foreach($courses as $course):?>
                        <option value="<?php echo $course["courseId"]?>"
                        <?php if($course["courseId"]== $courseId) echo "selected = selected" ?>>
                        <?php echo $course["courseName"]?></option>

                        <?php endforeach?>
                    </select>
                </div>


        <!--Semester-->  
                <div class="mb-3">
                    <select name="semester" id="semester" class="form-control" >
                        <option value="">Select Semester</option>
                        <option value="1" <?php  if($semester == 1) echo "selected = selected" ?>>Semester 1</option>
                        <option value="2" <?php  if($semester == 2) echo "selected = selected" ?>>Semester 2</option>
                    </select>
                </div>
                    
              <!--Buttons-->
                <div class="row">
                    <div class="col">
                        <button type="submit" name="submit" class="btn btn-primary w-100"><?php if(isset($_GET["action"])&& $_GET["action"]=="add") {echo "CREATE";} else {echo "SAVE"; }?></button>
                    </div>
                    <div class="col">
                        <button type="reset" class="btn btn-secondary w-100"> CANCEL</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</main>
       <?php  include "includes/footer.php";?>
