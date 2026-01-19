<?php
include "includes/functions.php";
include "includes/student-assign-inc.php";
include "includes/header.php";
studentPage();//Inforce student in this page
 ?>

 <script>
function submitForm(Id,action){
    
    form = document.getElementById('form' + Id);
    form.action.value=action;
    document.getElementById('form' + Id).submit();
}


</script>


      <?php
             if(isset($_GET["deleted"])) { 
                 $message = "Assignment Deleted Successfully";
                 include "includes/show-success.php";
            }
      ?>

      <?php
             if(isset($_GET["filetype"])) { 
                 $message = "Only pdf, jpg, jpeg, png ,docx, pptx txt files are accepted";
                 include "includes/show-error.php";
            }
      ?>

       <?php
             if(isset($_GET["fileUpload"])) { 
                 $message = "Error while uploading file";
                 include "includes/show-error.php";
            }
      ?>

 <?php
             if(isset($_GET["fileSize"])) { 
                 $message = "File size should be less done 950MB";
                 include "includes/show-error.php";
            }
      ?>




<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-myskolar text-white">
                    <h4 class="mb-0 fw-bold text-center">Submit Assignment</h4>
                </div>
               <div class="card-body">

                    <form action="student-assign-deadlines.php" method="post" id="unitForm" enctype="multipart/form-data" name="unitForm">
                    <input type="hidden" name ="action" value ="<?php echo $assignmentId ?>">
                        
                        <div class="row"> <div class="col-md-6 mb-3">
                                <input type="text" name="courseName" class="form-control"  value="<?php echo $courseName?>" disabled>
                            </div>

                            <div class="col-md-6 mb-3">
                                <input type="text" name="unitName" class="form-control" value="<?php echo $unitName?>" disabled>
                            </div>
                        </div>

                        <div class="mb-3">
                            <input type="text" name="taskTitle" class="form-control" value="<?php echo $taskTitle?>" disabled>
                        </div>

                     <div class="row">
                        <div class="col-md-6 mb-3">
                            <input name ="dueDate"  class="form-control"  value ="<?php echo $dueDate?>" type="text"
                                onfocus="(this.type='date')"
                                onblur="(this.type='text')"
                                id="date" 
                                disabled/>
                        </div>

                        <div class="col-md-6 mb-3">
                            <input type="number" name="maxMark" class="form-control"  min="1" max="100"   value ="<?php echo $maxMark?>"disabled>
                        </div>
                    </div>

                    <div class="mb-3">
                        <textarea name="taskDescription" class="form-control" rows="4"  disabled ><?php echo $taskDescription?></textarea>
                    </div>
                        <?php if(!empty ($fileName)): ?>
                            <div class="mb-3">
                                <a href="<?php echo $filePath ?>" 
                                target="_blank" 
                                rel="noopener noreferrer"
                                class="list-group-item list-group-item-action d-flex align-items-center py-3 border-light">

                                    <div class="flex-grow-1">
                                        <div class="text-dark fw-semibold mb-0">
                                            Assignment Brief: <?php echo $fileName ?>
                                        </div>
                                        <span class="text-muted d-block small">
                                            Click to View
                                        </span>
                                    </div>

                                </a>
                            </div>
                        <?php endif ?>

            </form> 

          <form action="student-assign-deadlines.php" method="post" id="fileForm" enctype="multipart/form-data" name="fileForm">
         <input type="hidden" name="assignmentId" value="<?php echo $assignmentId ?>">
            <div class="mb-4">
                <div class="list-group-item border-light p-3">
                    <div class="input-group">
                        <input type="file" name="assignmentFile[]"multiple class="form-control" id="assignmentFiles">
                        <button type="submit" name="action" id="uploadFiles" value="uploadFiles" class="btn btn-primary px-4" disabled>
                            Upload
                        </button>
                    </div>
                </div>
            </div>
        </form>


            <div class="card border-0 mb-4">
                <div class="card-header bg-white py-1">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h6 class="mb-0 fw-bold" style="font-size: 1rem;">File List</h6>
                        </div>
                        <div class="col-3 text-center">
                            <span class="fw-bold" style="font-size: 1rem;">Delete</span>
                        </div>
                    </div>
                </div>
                <div class="list-group list-group-flush">

                <?php foreach($files as $file):?>
              <form action="student-assign-deadlines.php" method="post" id="form<?php echo $file ['fileId']; ?>" enctype="multipart/form-data" name="fileList">
               <input type="hidden" name ="assignmentId" value ="<?php echo $assignmentId ?>">
                <input type="hidden" name ="action" value ="">
                <input type="hidden" name ="fileName" value ="<?php echo $file["fileName"] ?>">
                <input type="hidden" name ="filePath" value ="<?php echo $file["filePath"] ?>">
                <input type="hidden" name ="fileId" value ="<?php echo $file["fileId"] ?>">
              
             <div class="d-flex align-items-center justify-content-between mb-2 p-2 border rounded">

        <!-- File link -->
        <div class="flex-grow-1 me-3">
            <a href="<?php echo $file["filePath"] ?>" target="_blank"  class="text-decoration-none d-block">
                <div class="text-dark fw-semibold mb-0">
                    <?php echo $file["originalFileName"] ?>
                </div>
                <span class="text-muted small d-block">
                    Click to View
                </span>
            </a>
        </div>

        <!-- Trash icon next to file -->
        <div class="col-3 text-center">
            <i class="fa-solid fa-trash-can text-danger" style="cursor: pointer;" onclick="submitForm(<?php echo $file['fileId']; ?>, 'delete');"></i>
             </div>
         </div>
       </form>
     <?php endforeach?> 
                

                <form action="student-assign-deadlines.php" method="post" id="submit" enctype="multipart/form-data" name ="submit">
               <input type="hidden" name ="assignmentId" value ="<?php echo $assignmentId ?>">
               <div class="text-center mt-3">
                    <button type="submit" name="action" id="submit" value="submit" class="btn btn-primary px-4">Submit Assignment</button>
                </div>
             </form>

                </div>
            </div>
        </div>
    </div>
</div>
</main>

<script>
const fileInput = document.getElementById('assignmentFiles');
    const uploadButton = document.getElementById('uploadFiles');

    fileInput.addEventListener('change', function() {
        if (this.files.length > 0) {
            uploadButton.disabled = false;
        } else {
            uploadButton.disabled = true;
        }
    });
</script>







<?php include "includes/footer.php"; ?>