<?php 
include "includes/functions.php";
include "includes/header.php";
include "includes/lecturer-assign-inc.php";
lecturerPage() //Inforce lecturer in this page
?>


<script>

        $(document).ready(function() {
        $('#courseId').on('change', function() {
            document.forms["courseForm"].submit();
        });
        });

</script>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-myskolar text-white">
                    <h4 class="mb-0 fw-bold text-center">Create New Assignment</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-md-6 mb-3">
                            <form action="lecturer-assign.php" method="post" id="courseForm" name = "courseForm">
                             <input type="hidden" name ="action" value ="courseFieldSelection">
                                <select name="courseId" id="courseId" class="form-select"  required>
                                    <option value=""selected disabled>Select Course</option>
                                    <?php foreach($courses as $course): ?>
                                        <option value="<?php echo $course["courseId"]; ?>" <?php if($course["courseId"] == $courseId) echo "selected"; ?>>
                                            <?php echo $course["courseName"]; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </form>
                        </div>

                        <div class="col-md-6 mb-3">
                            <form action="lecturer-assign.php" method="post" id="unitForm" name = "unitForm">
                             <input type="hidden" name ="courseId" value ="<?php echo $courseId?>">
                                <select name="unitId"id="unitId" class="form-select" required>
                                    <option value=""selected disabled>Select Unit</option>
                                  <?php foreach($courseUnits as $unit): ?>
                                        <option value="<?php echo $unit["unitId"]; ?>" <?php if($unit["unitId"] == $unitId) echo "selected"; ?>>
                                            <?php echo $unit["unitName"]; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                        </div> 

                    </div> <div class="mb-3">
                        <input type="text" name="taskTitle" class="form-control" placeholder="Task Title" required>
                    </div>

                     <div class="row">
                        <div class="col-md-6 mb-3">
                            <input name ="dueDate" placeholder="Due Date" class="form-control" type="text"
                                onfocus="(this.type='date')"
                                onblur="(this.type='text')"
                                id="date" 
                                required/>
                        </div>

                        <div class="col-md-6 mb-3">
                            <input type="number" name="maxMark" class="form-control" placeholder="Max Mark" min="1" max="100" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <textarea name="taskDescription" class="form-control" rows="4" placeholder="Enter assignment description..."></textarea>
                    </div>

                    <div class="mb-4">
                        <div class="input-group">
                            <input type="file" name="assignmentFile" class="form-control" id="assignmentFile">
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="reset" class="btn btn-secondary me-2">CANCEL</button>
                        <button type="button" class="btn btn-secondary me-2">DELETE</button>
                        <button type="submit" name="action" id="save" value ="save" class="btn btn-primary px-4">SAVE</button>
                    </div>

                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>