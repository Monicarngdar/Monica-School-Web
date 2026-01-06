<?php 
    include "includes/header.php";
    include "includes/lecturer-grading-inc.php";
    lecturerPage() //Inforce lecturer  only in this page
?>





<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-myskolar text-white">
                    <h4 class="mb-0 fw-bold text-center">Grade Assignment</h4>
                </div>
                <div class="card-body">

                    <form action="lecturer-grading.php" method="post" id="gradingForm" enctype="multipart/form-data" name="gradingForm">
                    <input type="hidden" name ="action" value ="gradingFieldSelection">
                    <input type="hidden" name="action" value="">
                        
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

                        <div class="col-9 col-md-9 fw-bold">File List</div>
                        <?php foreach($files as $file):?>
                         <div class="row mb-2 align-items-center">

                    <div class="col-9 col-md-9">
                        <ul style="list-style-type: disc; list-style-position: inside; margin: 0; padding: 0;">
                            <li id="fileName" name="fileName" value = "" style="display: list-item;"><a href = "<?php echo $file["filePath"]?>" target="_blank" ><?php echo $file["originalFileName"]?></a></li>
                        </ul>
                    </div>            
            </div>
                <?php endforeach?> 
                        

                        <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary py-2">Grade Assignment </button>
                    </div>

                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



  <?php  include "includes/footer.php";?>