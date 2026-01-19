<?php 
    include "includes/header.php";
    include "includes/unit-inc.php";
    adminPage(); //Inforce admin only in this page
?>

<?php
             if(isset($_GET["success"])) { 
                 $message = "Unit Saved Successfully";
                 include "includes/show-success.php";
            }
      ?>

      <?php
             if(isset($_GET["deleted"])) { 
                 $message = "Unit Deleted Successfully";
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
        Are you sure you want to delete this unit? <br>
        All associated timetables, assignments and student grades will be deleted.
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
        <div class="col-12 col-md-8 col-lg-6"> 
            
            <div class="row">
                <div class="col">
                    <h2 class="text-center mt-4 mb-5">Manage Units</h2>
                </div>
            </div>
        
      <div class="container mt-3">
  <div class="row fw-bold border-bottom pb-2 mb-3">
    <div class="col-6">Unit Name</div>
    <div class="col-3 text-center">Edit</div>
    <div class="col-3 text-center">Delete</div>
  </div>

   <?php foreach($units as $unit):?>
    <form action="unit.php" method="post" id = "form<?php echo $unit["unitId"] ?>" class="mt-4">
  <div class="row align-items-center mb-3 border-bottom pb-2">
    <input type="hidden" name = "id" value="<?php echo $unit["unitId"] ?>" >
    <input type="hidden" name = "action"  value = "edit">
    <div class="col-6"><?php echo $unit["unitName"] ?></div>
    <div class="col-3 text-center">
      <i class="fa-solid fa-pen" style="color: #007bff; cursor: pointer;" onclick="submitForm(<?php echo $unit["unitId"] ?>,'edit');" ></i>
    </div> 
    <div class="col-3 text-center">
      <i class="fa-solid fa-x" style="color: #dc3545; cursor: pointer;" onclick="submitForm(<?php echo $unit["unitId"] ?>,'delete');"></i>
    </div>
  </div>
    </form>
    <?php endforeach?>
   
            </div>
        </div>
    </div>
   </main>
       <?php  include "includes/footer.php";?>
