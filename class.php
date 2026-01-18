<?php 
    include "includes/functions.php";
    include "includes/class-inc.php";
    include "includes/header.php";
     adminPage(); //Inforce admin only in this page
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

      <form action="class.php" method="post" class="mt-4">
        <input type="hidden" name ="classId" value ="<?php echo $classId?>">

          <div class="mb-4">
        <input type="text"  name="className"   id="className" placeholder="Class Name" class="form-control" value = "<?php echo $className ?>" >
            </div>

          <div class="mb-4">
                    <select name="courseId" id="courseId" class="form-control" >
                        <option value="">Select Course</option>
                        <?php foreach($courses as $course):?>
                        <option value="<?php echo $course["courseId"]?>"
                        <?php if($course["courseId"]== $courseId) echo "selected = selected" ?>>
                        <?php echo $course["courseName"]?></option>

                        <?php endforeach?>
                    </select>
                </div>
     
        <div class="mb-4">
          <textarea name="classDescription" id="classDescription" placeholder="Class description" class="form-control"  rows="4"><?php echo $classDescription ?></textarea>
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