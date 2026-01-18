<?php  
  include "includes/functions.php";
  include "includes/header.php";
  include "includes/user-timetable-inc.php";
?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="container user-register mt-5">
<div class="row justify-content-center">
<div class="col-12">
<div class="table-responsive">
                    <table class="table table-bordered table-striped text-center align-middle full-page-table">
                        <thead class="table-primary">
                            <tr>

                            
                                <th scope="col" style="width: 15%;">Time</th>

                                    <th scope="col" >Monday </th>
                                    <th scope="col">Tuesday</th>
                                    <th scope="col">Wednesday</th>
                                    <th scope="col">Thursday</th>
                                   <th scope="col">Friday</th> 
                            </tr>
                        </thead>
                        <tbody>
                            

                    <?php  foreach ($slots as $slot): ?>
                            <tr>
                                <th scope="row">
                                <?php echo $slot; ?>
                                 </th>
                                 <?php //   ****** MONDAY *******
                                        // Variables should be per day or they will reset each other during the forwach loop and it will not work
                                        $day = "Monday";
                                        if ($userRole == 1){
                                            $monTimeSlot = getTimetableSlot($conn, $slot, $day, $classId);
                                        } else {
                                            $monTimeSlot = getTimetableLecturerSlot($conn, $slot,  $day, $userId); // query for lecturer timetable is different from student
                                        }
                                        ?>
                                        <?php   if ($monTimeSlot): ?>

                                  <?php
                                        // First to convert timestamps, so that we can calculate
                                        $monSlotNumber = 1;
                                        $monStartTime = strtotime($monTimeSlot["startTime"]);
                                        $monEndTime = strtotime($monTimeSlot["endTime"]);

                                        // Calculate difference in seconds
                                        $monDiffSeconds = $monEndTime - $monStartTime;

                                        // Divide by 1800 (30 minutes * 60 seconds) and we should get the number of half hours (slots)
                                        $monHalfHours = $monDiffSeconds / 1800;
                                ?>
                                <th scope="row" class="timetable-highlight" rowspan = "<?php echo $monHalfHours?>">
                                        <?php echo $monTimeSlot ["unitName"]?><br>
                                        <?php  if ($userRole == 1): ?>
                                         <?php echo $monTimeSlot ["name"] ?> <?php echo $monTimeSlot['surname'] ?><br>
                                         <?php else: ?>
                                        <?php echo $monTimeSlot ["className"] ?>
                                        <?php endif ?>
                                         <?php echo $monTimeSlot ["room"] ?>
                        </th>
                        <?php else: ?>
                            <?php if ($monSlotNumber<$monHalfHours):?>
                            <?php $monSlotNumber++ ?>
                            <?php else:?>
                            <td></td>
                       <?php endif ?>
                       <?php endif ?>

                              <?php //   ****** TUESDAY  *******
                                        // Variables should be per day or they will reset each other during the forwach loop and it will not work
                                        $day = "Tuesday";
                                       if ($userRole == 1){
                                            $tueTimeSlot = getTimetableSlot($conn, $slot, $day, $classId);
                                        } else {
                                            $tueTimeSlot = getTimetableLecturerSlot($conn, $slot,  $day, $userId); // query for lecturer timetable is different from student
                                        }
                                        ?>
                                        <?php   if ($tueTimeSlot): ?>

                                  <?php
                                        // First to convert timestamps, so that we can calculate
                                        $tueSlotNumber = 1;
                                        $tueStartTime = strtotime($tueTimeSlot["startTime"]);
                                        $tueEndTime = strtotime($tueTimeSlot["endTime"]);

                                        // Calculate difference in seconds
                                        $tueDiffSeconds = $tueEndTime - $tueStartTime;

                                        // Divide by 1800 (30 minutes * 60 seconds) and we should get the number of half hours (slots)
                                        $tueHalfHours = $tueDiffSeconds / 1800;
                                ?>
                                <th scope="row"  class="timetable-highlight" rowspan = "<?php echo $tueHalfHours?>">
                                          <?php echo $tueTimeSlot ["unitName"]?><br>
                                        <?php  if ($userRole == 1): ?>
                                         <?php echo $tueTimeSlot ["name"] ?> <?php echo $tueTimeSlot['surname'] ?><br>
                                         <?php else: ?>
                                        <?php echo $tueTimeSlot ["className"] ?>
                                        <?php endif ?>
                                         <?php echo $tueTimeSlot ["room"] ?>
                        </th>
                        <?php else: ?>
                            <?php if ($tueSlotNumber<$tueHalfHours):?>
                            <?php $tueSlotNumber++ ?>
                            <?php else:?>
                            <td></td>
                       <?php endif ?>
                       <?php endif ?>

                        <?php //   ****** WEDNESDAY  *******
                                        // Variables should be per day or they will reset each other during the forwach loop and it will not work
                                        $day = "Wednesday";
                                         if ($userRole == 1){
                                            $wedTimeSlot = getTimetableSlot($conn, $slot, $day, $classId);
                                        } else {
                                            $wedTimeSlot = getTimetableLecturerSlot($conn, $slot,  $day, $userId); // query for lecturer timetable is different from student
                                        }
                                        
                                        ?>
                                        <?php   if ($wedTimeSlot): ?>

                                  <?php
                                        // First to convert timestamps, so that we can calculate
                                        $wedSlotNumber = 1;
                                        $wedStartTime = strtotime($wedTimeSlot["startTime"]);
                                        $wedEndTime = strtotime($wedTimeSlot["endTime"]);

                                        // Calculate difference in seconds
                                        $wedDiffSeconds = $wedEndTime - $wedStartTime;

                                        // Divide by 1800 (30 minutes * 60 seconds) and we should get the number of half hours (slots)
                                        $wedHalfHours = $wedDiffSeconds / 1800;
                                ?>
                                <th scope="row"  class="timetable-highlight" rowspan = "<?php echo $wedHalfHours?>">
                                         <?php echo $wedTimeSlot ["unitName"]?><br>
                                        <?php  if ($userRole == 1): ?>
                                         <?php echo $wedTimeSlot ["name"] ?> <?php echo $wedTimeSlot['surname'] ?><br>
                                         <?php else: ?>
                                        <?php echo $wedTimeSlot ["className"] ?>
                                        <?php endif ?>
                                         <?php echo $wedTimeSlot ["room"] ?>>
                        </th>
                        <?php else: ?>
                            <?php if ($wedSlotNumber<$wedHalfHours):?>
                            <?php $wedSlotNumber++ ?>
                            <?php else:?>
                            <td></td>
                       <?php endif ?>
                       <?php endif ?>

                        <?php //   ****** THURSDAY  *******
                                        // Variables should be per day or they will reset each other during the forwach loop and it will not work
                                        $day = "Thursday";
                                        if ($userRole == 1){
                                            $thursTimeSlot = getTimetableSlot($conn, $slot, $day, $classId);
                                        } else {
                                            $thursTimeSlot = getTimetableLecturerSlot($conn, $slot,  $day, $userId); // query for lecturer timetable is different from student
                                        }
                                        ?>
                                        <?php   if ($thursTimeSlot): ?>

                                  <?php
                                        // First to convert timestamps, so that we can calculate
                                        $thursSlotNumber = 1;
                                        $thursStartTime = strtotime($thursTimeSlot["startTime"]);
                                        $thursEndTime = strtotime($thursTimeSlot["endTime"]);

                                        // Calculate difference in seconds
                                        $thursDiffSeconds = $thursEndTime - $thursStartTime;

                                        // Divide by 1800 (30 minutes * 60 seconds) and we should get the number of half hours (slots)
                                        $thursHalfHours = $thursDiffSeconds / 1800;
                                ?>
                                <th scope="row"  class="timetable-highlight" rowspan = "<?php echo $thursHalfHours?>">
                                       <?php echo $thursTimeSlot ["unitName"]?><br>
                                        <?php  if ($userRole == 1): ?>
                                         <?php echo $thursTimeSlot ["name"] ?> <?php echo $thursTimeSlot['surname'] ?><br>
                                         <?php else: ?>
                                        <?php echo $thursTimeSlot ["className"] ?>
                                        <?php endif ?>
                                         <?php echo $thursTimeSlot ["room"] ?>
                        </th>
                        <?php else: ?>
                            <?php if ($thursSlotNumber<$thursHalfHours):?>
                            <?php $thursSlotNumber++ ?>
                            <?php else:?>
                            <td></td>
                       <?php endif ?>
                       <?php endif ?>

                        <?php //   ****** FRIDAY  *******
                                        // Variables should be per day or they will reset each other during the forwach loop and it will not work
                                        $day = "Friday";
                                         if ($userRole == 1){
                                            $friTimeSlot = getTimetableSlot($conn, $slot, $day, $classId);
                                        } else {
                                            $friTimeSlot = getTimetableLecturerSlot($conn, $slot,  $day, $userId); // query for lecturer timetable is different from student
                                        }
                                        ?>
                                        <?php   if ($friTimeSlot): ?>

                                  <?php
                                        // First to convert timestamps, so that we can calculate
                                        $friSlotNumber = 1;
                                        $friStartTime = strtotime($friTimeSlot["startTime"]);
                                        $friEndTime = strtotime($friTimeSlot["endTime"]);

                                        // Calculate difference in seconds
                                        $friDiffSeconds = $friEndTime - $friStartTime;

                                        // Divide by 1800 (30 minutes * 60 seconds) and we should get the number of half hours (slots)
                                        $friHalfHours = $friDiffSeconds / 1800;
                                ?>
                                <th scope="row"  class="timetable-highlight" rowspan = "<?php echo $friHalfHours?>">
                                         <?php echo $friTimeSlot ["unitName"]?><br>
                                        <?php  if ($userRole == 1): ?>
                                         <?php echo $friTimeSlot ["name"] ?> <?php echo $friTimeSlot['surname'] ?><br>
                                         <?php else: ?>
                                        <?php echo $friTimeSlot ["className"] ?>
                                        <?php endif ?>
                                         <?php echo $friTimeSlot ["room"] ?>
                        </th>
                        <?php else: ?>
                            <?php if ($friSlotNumber<$friHalfHours):?>
                            <?php $friSlotNumber++ ?>
                            <?php else:?>
                            <td></td>
                       <?php endif ?>
                       <?php endif ?>
                       
                       
                             <!--                                   <td></td>
                                <td></td>
                                <td></td> -->
                               
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>




<?php  include "includes/footer.php";?>