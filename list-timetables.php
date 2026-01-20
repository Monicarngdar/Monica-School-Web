<?php  
     include "includes/functions.php";
     include "includes/dbh.php";
     include "includes/timetable-inc.php";
     include "includes/header.php";
    adminPage(); //Inforce admin only in this page
?>

<script>
function submitForm(Id,action){
    
    form = document.getElementById('form' + Id);
    form.action.value=action;
    document.getElementById('form' + Id).submit();
}
</script>

<div style="overflow-x: hidden;">
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
  </div>

      <script>
let formToSubmit = null; // Variable to store the form ID to be deleted

function submitForm(Id, action) {
    const form = document.getElementById('form' + Id);
    form.action.value = action;

    if (action === 'delete') {
        // Store the form ID and show the Bootstrap Modal
        formToSubmit = 'form' + Id;
        const myModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        myModal.show();
    } else {
        // For 'edit' or 'unit', submit normally
        form.submit();
    }
}


// Logic for the "Yes" button inside the modal
$(document).ready(function() {
    $('#confirmDeleteBtn').click(function() {
        if (formToSubmit) {
            document.getElementById(formToSubmit).submit();
        }
    });
});
</script>
<div class="modal fade" id="deleteModal" tabindex="-1" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this timetable? <br>
        This timetable entry will be removed for all students and lecturers.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Yes, Delete</button>
      </div>
    </div>
  </div>
</div>



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="container user-register mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8"> 
            <div class="row">
                <div class="col">
                 <h2 class="text-center mt-4 mb-5">Manage Timetables</h2>
                </div>
            </div>
        
         
    <div class="row fw-bold border-bottom pb-2 mb-3">
    <div class="col-3 text-start">Class Name</div>
    <div class="col-3  text-start">Unit</div>
    <div class="col-3  text-start">Day & Time</div>
    <div class="col-1 text-center">Edit</div>
    <div class="col-2 text-center">Delete</div>
  </div>

     <?php foreach($timetables as $timetable):?>
     <form action="timetable.php" method="post"id="form<?php echo $timetable["unitTimetableId"] ?>" class="mt-4">
  <div class="row align-items-center mb-3 border-bottom pb-2">
    <input type="hidden" name="id" value="<?php echo $timetable["unitTimetableId"] ?>">
    <input type="hidden" name="action" value="edit">

    <div class="col-3"><?php echo $timetable["className"] ?></div>
    <div class="col-3"><?php echo $timetable["unitName"] ?></div>
    <div class="col-3 ps-0"><?php echo $timetable["day"] ?> <?php echo date("H:i", strtotime($timetable["startTime"]))  ?> - <?php echo date("H:i", strtotime($timetable["endTime"]))  ?></div>


    <div class="col-1 text-center">
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