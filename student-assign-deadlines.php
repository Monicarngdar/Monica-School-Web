<?php
include "includes/functions.php";
include "includes/header.php";
include "includes/student-assign-inc.php";
studentPage()//Inforce student in this page
 ?>

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
            </form> 

            <form action="student-assign-deadlines.php" method="post" id="fileForm" enctype="multipart/form-data" name="fileForm">
                <input type="hidden" name ="assignmentId" value ="<?php echo $assignmentId ?>">
                    <div class="mb-4">
                        <div class="input-group">
                            <input type="file" name="assignmentFile[]" multiple  class="form-control" id="assignmentFile" >
                             <button type="submit" name="action" id="uploadFiles" value ="uploadFiles" class="btn btn-primary px-4">UPLOAD</button>
                        </div>
                    </div>
            </form>      

                   <div class="row mb-2" style="border-bottom: 2px solid #dee2e6;">
                    <div class="col-9 col-md-9 fw-bold">File List</div>
                    <div class="col-3 col-md-3 fw-bold text-center">Delete</div>
                </div>
              <form action="student-assign-deadlines.php" method="post" id="fileList<?php echo $file ['fileId']; ?>" enctype="multipart/form-data" name="fileList">
               <input type="hidden" name ="assignmentId" value ="<?php echo $assignmentId ?>">
               <?php foreach($files as $file):?>
                <div class="row mb-2 align-items-center">
                    <div class="col-9 col-md-9">
                        <ul style="list-style-type: disc; list-style-position: inside; margin: 0; padding: 0;">
                            <li id="fileName" name="fileName" value = "" style="display: list-item;"><?php echo $file["fileName"]?></li>
                        </ul>
                    </div>            
                <div class="col-3 col-md-3 text-center">
                    <i class="fa-solid fa-trash-can" style="color: #dc3545; cursor: pointer;" onclick="submitForm(<?php echo $file ['fileId']; ?>, 'delete');"></i>
                </div>
            </div>
       </form>
                <?php endforeach?>

                </div>
            </div>
        </div>
    </div>
</div>









<?php include "includes/footer.php"; ?>