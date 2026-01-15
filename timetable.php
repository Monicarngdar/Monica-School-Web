<?php  
  include "includes/functions.php";
  include "includes/timetable-inc.php";
  include "includes/header.php";
  adminPage(); //Inforce admin only in this page
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="container user-register mt-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">

      <div class="row">
        <div class="col">
          <h2 class="text-center mt-4 mb-5">Add Timetable</h2>
        </div>
      </div>

      <form action="timetable.php" method="post" class="mt-4">

        <!-- Course Name & Unit Name -->
                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                    <select name="courseId" id="courseId" class="form-control" >
                        <option value="">Select Course</option>
                        <?php foreach($courses as $course):?>
                        <option value="<?php echo $course["courseId"]?>"
                        <?php if($course["courseId"]== $courseId) echo "selected = selected" ?>>
                        <?php echo $course["courseName"]?></option>
                      <?php endforeach?>
                    </select>
                </div>
     
              
                  <div class="col-md-6">
                  <select name="unitId" id="unitId" class="form-control">
                      <option value="" selected disabled>Select Unit</option>

                      <?php foreach ($courseUnits as $unit): ?>
                          <option value="<?php echo $unit['unitId']; ?>"
                              <?php if ($unit['unitId'] == $unitId) echo 'selected'; ?>>
                              <?php echo $unit['unitName']; ?>
                          </option>
                      <?php endforeach; ?>
                  </select>
              </div>
     
            </div>

        <!-- Lecturer Name & Room -->
            <div class="row mb-3">
        <div class="col-md-6 mb-3 mb-md-0">
               <select name="lecturerId" id="lecturerId" class="form-control" >
                  <option value="">Select Lecturer</option>
                    <?php foreach($lecturers as $lecturer):?>
                     <option value="<?php echo $lecturer["userId"]?>"
                        <?php if($lecturer["userId"]== $lecturerId) echo "selected = selected" ?>>
                    <?php echo $lecturer['name']?> <?php echo $lecturer['surname']?>
                      <?php endforeach?>
                    </select>
                </div>
     

          <div class="col-md-6">
            <select class="form-select" name="room">
              <option selected disabled>Room</option>
              <option>A111</option>
              <option>A112</option>
              <option>A113</option>
              <option>A114</option>
              <option>A115</option>
              <option>B116</option>
              <option>B117</option>
              <option>B118</option>  
              <option>C201</option>
              <option>C202</option> 
              <option>D003</option>
              <option>D004</option>
              <option>D005</option>
              <option>D006</option>
            </select>
          </div>
        </div>

        <!-- Day -->
        <div class="mb-3">
          <select class="form-select" name="day">
            <option selected disabled>Day</option>
            <option>Monday</option>
            <option>Tuesday</option>
            <option>Wednesday</option>
            <option>Thursday</option>
            <option>Friday</option>
          </select>
        </div>

        <!-- Start Time & End Time -->
       <div class="row mb-4">
  <div class="col-md-6 mb-3 mb-md-0">
    <select class="form-select" placeholder = "Start Time" name="startTime">
      <option value="08:00">08:00 AM</option>
      <option value="08:30">08:30 AM</option>
      <option value="09:00">09:00 AM</option>
      <option value="09:30">09:30 AM</option>
      <option value="10:00">10:00 AM</option>
      <option value="10:30">10:30 AM</option>
      <option value="11:00">11:00 AM</option>
      <option value="11:30">11:30 AM</option>
      <option value="12:00">12:00 PM</option>
      <option value="12:30">12:30 PM</option>
      <option value="13:00">01:00 PM</option>
      <option value="13:30">01:30 PM</option>
      <option value="14:00">02:00 PM</option>
      <option value="14:30">02:30 PM</option>
      <option value="15:00">03:00 PM</option>
      <option value="15:30">03:30 PM</option>
      <option value="16:00">04:00 PM</option>
      <option value="16:30">04:30 PM</option>
      <option value="17:00">05:00 PM</option>
      <option value="17:30">05:30 PM</option>
      <option value="18:00">06:00 PM</option>
      <option value="18:30">06:30 PM</option>
      <option value="19:00">07:00 PM</option>
    </select>
  </div>

    <div class="col-md-6">
    <select class="form-select" placeholder = "End Time"  name="endTime">
      <option value="08:00">08:00 AM</option>
      <option value="08:30">08:30 AM</option>
      <option value="09:00">09:00 AM</option>
      <option value="09:30">09:30 AM</option>
      <option value="10:00">10:00 AM</option>
      <option value="10:30">10:30 AM</option>
      <option value="11:00">11:00 AM</option>
      <option value="11:30">11:30 AM</option>
      <option value="12:00">12:00 PM</option>
      <option value="12:30">12:30 PM</option>
      <option value="13:00">01:00 PM</option>
      <option value="13:30">01:30 PM</option>
      <option value="14:00">02:00 PM</option>
      <option value="14:30">02:30 PM</option>
      <option value="15:00">03:00 PM</option>
      <option value="15:30">03:30 PM</option>
      <option value="16:00">04:00 PM</option>
      <option value="16:30">04:30 PM</option>
      <option value="17:00">05:00 PM</option>
      <option value="17:30">05:30 PM</option>
      <option value="18:00">06:00 PM</option>
      <option value="18:30">06:30 PM</option>
      <option value="19:00">07:00 PM</option>
    </select>
  </div>
</div>

        <!-- Buttons -->
        <div class="row">
          <div class="col">
            <button type="submit" class="btn btn-primary w-100">CREATE</button>
          </div>
          <div class="col">
            <button type="reset" class="btn btn-secondary w-100">CANCEL</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
</main>


<?php  include "includes/footer.php";?>