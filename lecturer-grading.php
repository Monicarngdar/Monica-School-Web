<?php 
    include "includes/header.php";
    include "includes/lecturer-grading-inc.php";
    lecturerPage(); //Inforce lecturer  only in this page
?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-myskolar text-white">
                    <h4 class="mb-0 fw-bold text-center">Grade Assignment</h4>
                </div>
                <div class="card-body">

                    <form action="lecturer-grading.php" method="post" id="gradingForm" enctype="multipart/form-data" name="gradingForm">
                    <input type="hidden" name="assignmentId" value="<?php echo $assignmentId?>">
                    <input type="hidden" name="studentId" value="<?php echo $studentId?>">
                    <input type="hidden" name="lecturerId" value="<?php echo $lecturerId?>">
                        
                        <div class="row"> 

                              <div class="col-md-6 mb-3">
                                <input type="text" name="name" class="form-control" value="<?php echo $name?>" disabled>
                            </div>

                            <div class="col-md-6 mb-3">
                                <input type="text" name="surname" class="form-control"value="<?php echo $surname?>"  disabled>
                            </div>

                            <div class="col-md-6 mb-3">
                                <input type="text" name="courseName" class="form-control" value="<?php echo $courseName?>"  disabled>
                            </div>

                            <div class="col-md-6 mb-3">
                                <input type="text" name="unitName" class="form-control" value="<?php echo $unitName?>"  disabled>
                            </div>
                        </div>

                        <div class="mb-3">
                            <input type="text" name="taskTitle" class="form-control" value="<?php echo $taskTitle?>"  disabled>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input name="dueDate" class="form-control" value="<?php echo $dueDate?>"  type="text"
                                    onfocus="(this.type='date')"
                                    onblur="(this.type='text')"
                                    id="date" 
                                    disabled/>
                            </div>

                            <div class="col-md-6 mb-3">
                                <input type="number" name="maxMark" class="form-control" min="1" max="100" value="<?php echo $maxMark?>"  disabled>
                            </div>
                        </div>

                      <div class="card border-0 mb-4">
                    <div class="card-header bg-white py-1">
                        <h5 class="mb-0 fw-bold">File List</h5>
                    </div>
                    <div class="list-group list-group-flush">
                        <?php foreach($files as $file):?>
                            <a href="<?php echo $file["filePath"]?>" 
                            target="_blank" 
                            class="list-group-item list-group-item-action d-flex align-items-center py-3 border-light file-row">                                
                                <div class="flex-grow-1">
                                    <div class="text-dark fw-semibold mb-0"><?php echo $file["originalFileName"]?></div>
                                   <span class="text-muted" style="font-size: 0.6rem; display: block;">Click to View</span>
                                </div>
                            </a>
                        <?php endforeach?>
                    </div>
            </div>

                        <div class="mb-3">
                                <input type="number" name="marksEarned" placeholder = "Final Mark" class="form-control" min="1" max="100" value="">
                            </div>

                        <div class="mb-3">
                        <textarea name="lecturerComment"  placeholder = "Enter Comments..." class="form-control" value=""></textarea>
                    </div>
                   
                        

                        <div class="text-center mt-3">
                        <button type="submit" name="action" id="save" value ="save" class="btn btn-primary py-2">Grade Assignment </button>
                    </div>

                  

                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>



  <?php  include "includes/footer.php";?>