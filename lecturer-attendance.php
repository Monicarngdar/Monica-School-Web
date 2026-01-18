<?php  
  include "includes/functions.php";
  lecturerPage(); //Inforce lecturer only in this page
  include "includes/attendance-inc.php";
  include "includes/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-myskolar text-white">
                        <h4 class="mb-0 fw-bold text-center">Mark Attendance</h4>
                    </div>
                    <div class="card-body">

                        <form action="lecturer-attendance.php" method="post">
                        <div class="row mb-2">
                            <div class="col-6">
                                <label class="fw-bold">Student Name:</label>
                            </div>
                            <div class="col-6">
                                <label class="fw-bold">Status:</label>
                            </div>
                        </div>

                        <?php foreach($attendances as $attendance): ?>  
                            <?php $profile = getUserProfile($conn, $attendance["userAccountId"]);?>
                            
                            <div class="row align-items-center mb-3">
                                <div class="col-6">
                                    <p class="form-control-plaintext border-bottom pb-1 mb-0">
                                        <?php echo $profile["name"]?> <?php echo $profile["surname"]; ?>
                                    </p>
                                </div>

                                <div class="col-6">
                                    <select name="status[<?php echo $attendance['userAccountId']; ?>]" class="form-select">
                                        <option value="" selected disabled>Select Status</option>
                                        <option value="present">Present</option>
                                        <option value="absent">Absent</option>
                                        <option value="late">Late</option>
                                    </select>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <div class="text-end mt-4">
                            <button type="reset" class="btn btn-secondary me-2">CANCEL</button>
                            <button type="submit" name="action" id="save" value="save" class="btn btn-primary px-4">SAVE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include "includes/footer.php";?>