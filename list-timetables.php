<?php  
     include "includes/header.php";
     include "includes/functions.php";
     include "includes/dbh.php";
     include "includes/timetable-inc.php";
    adminPage(); //Inforce admin only in this page
?>

<script>
function submitForm(Id,action){
    
    form = document.getElementById('form' + Id);
    form.action.value=action;
    document.getElementById('form' + Id).submit();
}
</script>

<?php
             if(isset($_GET["success"])) { 
                 $message = "Timetable Saved Successfully";
                 include "includes/show-success.php";
            }
      ?>

      <?php
             if(isset($_GET["deleted"])) { 
                 $message = "Timetable Deleted Successfully";
                 include "includes/show-success.php";
            }
      ?>



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="container user-register mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8"> 
            <div class="row">
                <div class="col">
                 <h2 class="text-center mt-4 mb-5">Manage Timetables</h2>
                </div>
            </div>
        
         
    <div class="row fw-bold border-bottom pb-2 mb-3 text-center">
    <div class="col-2 text-start">Class Name</div>
    <div class="col-2  text-start">Unit</div>
    <div class="col-4  text-start">Day & Time</div>
    <div class="col-2">Edit</div>
    <div class="col-2">Delete</div>
  </div>

     <?php foreach($timetables as $timetable):?>
     <form action="timetable.php" method="post"id="form<?php echo $timetable["unitTimetableId"] ?>" class="mt-4">
  <div class="row align-items-center mb-3 border-bottom pb-2">
    <input type="hidden" name="id" value="<?php echo $timetable["unitTimetableId"] ?>">
    <input type="hidden" name="action" value="edit">

    <div class="col-2"><?php echo $timetable["className"] ?></div>
    <div class="col-2"><?php echo $timetable["unitName"] ?></div>
    <div class="col-4"><?php echo $timetable["day"] ?> <?php echo date("H:i", strtotime($timetable["startTime"]))  ?> - <?php echo date("H:i", strtotime($timetable["endTime"]))  ?></div>


    <div class="col-2 text-center">
   <i class="fa-solid fa-pen" style="color: #007bff; cursor: pointer;" onclick="submitForm(<?php echo $timetable["unitTimetableId"] ?>,'edit');" ></i>
    </div>

    <div class="col-2 text-center"> 
      <i class="fa-solid fa-x" style="color: #dc3545; cursor: pointer;" onclick="submitForm(<?php echo $timetable["unitTimetableId"] ?>,'delete');"></i>
    </div>
  </div>
</form>
 <?php endforeach?>

      </div>
   </div>
</div>
</main>

<?php  include "includes/footer.php";?>