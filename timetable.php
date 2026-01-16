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
          <h2 class="text-center mt-4 mb-5"><?php echo $pageTitle?></h2>
        </div>
      </div>

      <form action="timetable.php" method="post" class="mt-4">
        <input type="hidden" name = "id" value="<?php echo $unitTimetableId?>" >

        <!-- Class Name & Unit Name -->
                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                    <select name="classId" id="classId" class="form-control"  required>
                        <option value="" selected disabled>Select Class</option>
                        <?php foreach($classes as $class):?>
                        <option value="<?php echo $class["classId"]?>"
                        <?php if($class["classId"]== $classId) echo "selected = selected" ?>>
                        <?php echo $class["className"]?></option>
                      <?php endforeach?>
                    </select>
                </div>
     
              
                  <div class="col-md-6">
                  <select name="unitId" id="unitId" class="form-control"  required>
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
               <select name="lecturerId" id="lecturerId" class="form-control" required >
                  <option value="" selected disabled>Select Lecturer</option>
                    <?php foreach($lecturers as $lecturer):?>
                     <option value="<?php echo $lecturer["userId"]?>"
                        <?php if($lecturer["userId"]== $lecturerId) echo "selected = selected" ?>>
                    <?php echo $lecturer['name']?> <?php echo $lecturer['surname']?>
                      <?php endforeach?>
                    </select>
                </div>
     

          <div class="col-md-6">
            <select class="form-select" name="room"  required>
              <option selected disabled>Room</option>
              <option <?php if($room == "A111") echo "selected = selected" ?>>A111</option>
              <option <?php if($room == "A112") echo "selected = selected" ?>>A112</option>
              <option <?php if($room == "A113") echo "selected = selected" ?>>A113</option>
              <option <?php if($room == "A114") echo "selected = selected" ?>>A114</option>
              <option <?php if($room == "A115") echo "selected = selected" ?>>A115</option>
              <option <?php if($room == "B116") echo "selected = selected" ?>>B116</option>
              <option <?php if($room == "B117") echo "selected = selected" ?>>B117</option>
              <option <?php if($room == "B118") echo "selected = selected" ?>>B118</option>  
              <option <?php if($room == "C201") echo "selected = selected" ?>>C201</option>
              <option <?php if($room == "C202") echo "selected = selected" ?>>C202</option> 
              <option <?php if($room == "D003") echo "selected = selected" ?>>D003</option>
              <option <?php if($room == "D004") echo "selected = selected" ?>>D004</option>
              <option <?php if($room == "D005") echo "selected = selected" ?>>D005</option>
              <option <?php if($room == "D006") echo "selected = selected" ?>>D006</option>
            </select>
          </div>
        </div>

        <!-- Day -->
        <div class="mb-3">
          <select class="form-select" name="day"  required>
            <option selected disabled>Day</option>
            <option <?php if($day == "Monday") echo "selected = selected" ?>>Monday</option>
            <option <?php if($day == "Tuesday") echo "selected = selected" ?>>Tuesday</option>
            <option <?php if($day == "Wednesday") echo "selected = selected" ?>>Wednesday</option>
            <option <?php if($day == "Thursday") echo "selected = selected" ?>>Thursday</option>
            <option <?php if($day == "Friday") echo "selected = selected" ?>>Friday</option>
          </select>
        </div>

        <!-- Start Time & End Time -->
       <div class="row mb-4">
  <div class="col-md-6 mb-3 mb-md-0">
    <select class="form-select" placeholder = "Start Time" name="startTime" required>
   <option <?php if($startTime == "08:00") echo "selected='selected'" ?> value="08:00">08:00 AM</option>
    <option <?php if($startTime == "08:30") echo "selected='selected'" ?> value="08:30">08:30 AM</option>
    <option <?php if($startTime == "09:00") echo "selected='selected'" ?> value="09:00">09:00 AM</option>
    <option <?php if($startTime == "09:30") echo "selected='selected'" ?> value="09:30">09:30 AM</option>
    <option <?php if($startTime == "10:00") echo "selected='selected'" ?> value="10:00">10:00 AM</option>
    <option <?php if($startTime == "10:30") echo "selected='selected'" ?> value="10:30">10:30 AM</option>
    <option <?php if($startTime == "11:00") echo "selected='selected'" ?> value="11:00">11:00 AM</option>
    <option <?php if($startTime == "11:30") echo "selected='selected'" ?> value="11:30">11:30 AM</option>
    <option <?php if($startTime == "12:00") echo "selected='selected'" ?> value="12:00">12:00 PM</option>
    <option <?php if($startTime == "12:30") echo "selected='selected'" ?> value="12:30">12:30 PM</option>
    <option <?php if($startTime == "13:00") echo "selected='selected'" ?> value="13:00">01:00 PM</option>
    <option <?php if($startTime == "13:30") echo "selected='selected'" ?> value="13:30">01:30 PM</option>
    <option <?php if($startTime == "14:00") echo "selected='selected'" ?> value="14:00">02:00 PM</option>
    <option <?php if($startTime == "14:30") echo "selected='selected'" ?> value="14:30">02:30 PM</option>
    <option <?php if($startTime == "15:00") echo "selected='selected'" ?> value="15:00">03:00 PM</option>
    <option <?php if($startTime == "15:30") echo "selected='selected'" ?> value="15:30">03:30 PM</option>
    <option <?php if($startTime == "16:00") echo "selected='selected'" ?> value="16:00">04:00 PM</option>
    <option <?php if($startTime == "16:30") echo "selected='selected'" ?> value="16:30">04:30 PM</option>
    <option <?php if($startTime == "17:00") echo "selected='selected'" ?> value="17:00">05:00 PM</option>
    <option <?php if($startTime == "17:30") echo "selected='selected'" ?> value="17:30">05:30 PM</option>
    <option <?php if($startTime == "18:00") echo "selected='selected'" ?> value="18:00">06:00 PM</option>
    <option <?php if($startTime == "18:30") echo "selected='selected'" ?> value="18:30">06:30 PM</option>
    <option <?php if($startTime == "19:00") echo "selected='selected'" ?> value="19:00">07:00 PM</option>
    </select>
  </div>

    <div class="col-md-6">
    <select class="form-select" placeholder = "End Time"  name="endTime" required>
    <option <?php if($endTime == "08:00") echo "selected='selected'" ?> value="08:00">08:00 AM</option>
    <option <?php if($endTime == "08:30") echo "selected='selected'" ?> value="08:30">08:30 AM</option>
    <option <?php if($endTime == "09:00") echo "selected='selected'" ?> value="09:00">09:00 AM</option>
    <option <?php if($endTime == "09:30") echo "selected='selected'" ?> value="09:30">09:30 AM</option>
    <option <?php if($endTime == "10:00") echo "selected='selected'" ?> value="10:00">10:00 AM</option>
    <option <?php if($endTime == "10:30") echo "selected='selected'" ?> value="10:30">10:30 AM</option>
    <option <?php if($endTime == "11:00") echo "selected='selected'" ?> value="11:00">11:00 AM</option>
    <option <?php if($endTime == "11:30") echo "selected='selected'" ?> value="11:30">11:30 AM</option>
    <option <?php if($endTime == "12:00") echo "selected='selected'" ?> value="12:00">12:00 PM</option>
    <option <?php if($endTime == "12:30") echo "selected='selected'" ?> value="12:30">12:30 PM</option>
    <option <?php if($endTime == "13:00") echo "selected='selected'" ?> value="13:00">01:00 PM</option>
    <option <?php if($endTime == "13:30") echo "selected='selected'" ?> value="13:30">01:30 PM</option>
    <option <?php if($endTime == "14:00") echo "selected='selected'" ?> value="14:00">02:00 PM</option>
    <option <?php if($endTime == "14:30") echo "selected='selected'" ?> value="14:30">02:30 PM</option>
    <option <?php if($endTime == "15:00") echo "selected='selected'" ?> value="15:00">03:00 PM</option>
    <option <?php if($endTime == "15:30") echo "selected='selected'" ?> value="15:30">03:30 PM</option>
    <option <?php if($endTime == "16:00") echo "selected='selected'" ?> value="16:00">04:00 PM</option>
    <option <?php if($endTime == "16:30") echo "selected='selected'" ?> value="16:30">04:30 PM</option>
    <option <?php if($endTime == "17:00") echo "selected='selected'" ?> value="17:00">05:00 PM</option>
    <option <?php if($endTime == "17:30") echo "selected='selected'" ?> value="17:30">05:30 PM</option>
    <option <?php if($endTime == "18:00") echo "selected='selected'" ?> value="18:00">06:00 PM</option>
    <option <?php if($endTime == "18:30") echo "selected='selected'" ?> value="18:30">06:30 PM</option>
    <option <?php if($endTime == "19:00") echo "selected='selected'" ?> value="19:00">07:00 PM</option>
    </select>
  </div>
</div>

        <!-- Buttons -->
               <div class="row">
        <div class="col">
            <?php if(isset($_GET["action"])&& $_GET["action"]=="add"):?>
            <button type="submit" name="submit" value = "add" class="btn btn-primary w-100"> CREATE</button>
            <?php else:  ?>
            <button type="submit" name="submit" value = "save" class="btn btn-primary w-100"> SAVE</button>
            <?php endif  ?>
        </div>
            <div class="col">
            <button type="reset" class="btn btn-secondary w-100"> CANCEL</button>
        </div>
    </div>

      </form>
    </div>
  </div>
</div>
</main>


<?php  include "includes/footer.php";?>