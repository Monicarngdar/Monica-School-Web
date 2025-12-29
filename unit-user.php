<?php
 include "includes/header.php";
 include "includes/user-inc.php"; 
 adminPage() //Inforce admin only in this page
 ?>



<div class="container user-register mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6"> 
            
            <div class="row">
                <div class="col">
                    <h2 class="text-center mb-5">Unit User</h2>
                </div>
            </div>

            <form action="unit-user.php" method="post" class="mt-4">
            <input type="hidden" name="userId" value="<?php echo $userId; ?>" >
            <input type="hidden" name="action" value="saveuserunit">

              <div class="text-center mb-4" class="form-control">
                <?php if($roleId == 1):?>
                    <h4 class="mt-3 mb-0">Student</h4>
                <?php elseif($roleId == 2):?>
                    <h4 class="mt-3 mb-0">Lecturer</h4>
                <?php elseif($roleId == 3): ?>
                    <h4 class="mt-3 mb-0">Admin</h4>
                <?php endif ?>
        </div>
                
                <div class="mb-3">
                    <input type="text" name="fullName" id="fullName" placeholder="Full Name" value ="<?php echo $name?> <?php echo $surname?>"  class="form-control" readonly>
                </div>

                      <div class="mb-3">
                    <input type="text" name="user" id="username" placeholder="Username" value ="<?php echo $username?>" class="form-control" readonly>
                </div>


                <div class="mb-3 p-3 border rounded bg-light">
                    <label class="form-label d-block mb-2"><strong>Select Units:</strong></label>
                    <?php foreach ($courseUnits as $unit):?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="unitId[]" value="<?php echo $unit["unitId"]?>" id="unitId" <?php if(in_array($unit["unitId"],$studentsUnits)){echo "checked";}?>>
                        <label class="form-check-label" for="unitName"><?php echo $unit["unitName"]?></label>
                    </div>
                    <?php endforeach ?>
                </div>
   
            
                <div class="row mt-4">
                    <div class="col">
                        <button type="submit" name="submit" class="btn btn-primary w-100">SUBMIT</button>
                    </div>
                    <div class="col">
                        <button type="reset" class="btn btn-secondary w-100">CANCEL</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>