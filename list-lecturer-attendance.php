<?php 
    include "includes/functions.php";
      lecturerPage(); 
   include "includes/attendance-inc.php";

    include "includes/header.php";
   //Inforce lecturer only in this page
    ?>

    <script>
    function submitForm(Id,action){
        
        form = document.getElementById('form' + Id);
        form.action.value=action;
        document.getElementById('form' + Id).submit();
    }
    </script>



      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="container mt-5">
          <div class="row justify-content-center">
            <div class="col-12 col-md-8">

              <h2 class="text-center mb-5">Attendance</h2>
              <h5 class="text-center mt-4 mb-5"><?php echo date('l, jS F Y');?></h5>

              
              <div class="row fw-bold border-bottom pb-2 mb-3">
                <div class="col-3">Class Name</div>
                <div class="col-3">Unit</div>
                <div class="col-3">Time</div>
                <div class="col-1 text-center">Mark</div>
              </div>

        <?php foreach($lectures as $lecture):?>
     
        <form action="lecturer-attendance.php" method="post" id="form<?php echo $lecture["unitTimetableId"] ?>" class="mt-4">
          <div class="row align-items-center mb-3 border-bottom pb-2">
            <input type="hidden" name = "id" value="<?php echo  $lecture["unitTimetableId"] ?>" >
          <input type="hidden" name = "action" id ="action" value="">

                <div class="col-3">
                  <?php echo $lecture["className"];?>
                </div>

                <div class="col-3">
                  <?php echo $lecture["unitName"];?> 
                </div>

                <div class="col-3">
                  <?php  echo date("H:i", strtotime($lecture["startTime"]))?>-<?php echo date("H:i", strtotime($lecture["endTime"]))  ?>
                </div>

          
                <div class="col-1 text-center">
                   <i class="fa-solid fa-pen" style="color: #007bff; cursor: pointer;" onclick="submitForm(<?php echo $lecture["unitTimetableId"] ?>,'edit');" ></i>
                </div>

              
              </div>
          </form>
        <?php endforeach?>
            </div>
          </div>
        </div>

      </main>

<?php include "includes/footer.php";?>