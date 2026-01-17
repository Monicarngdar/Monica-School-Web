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
                                        $monTimeSlot = getTimetableSlot($conn, $slot, $day, $classId);
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
                                        Unit<br>
                                        Lecturer<br>
                                        A111
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
                                        $tueTimeSlot = getTimetableSlot($conn, $slot, $day, $classId);
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
                                        Unit<br>
                                        Lecturer<br>
                                        A111
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
                                        $wedTimeSlot = getTimetableSlot($conn, $slot, $day, $classId);
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
                                        Unit<br>
                                        Lecturer<br>
                                        A111
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
                                        $thursTimeSlot = getTimetableSlot($conn, $slot, $day, $classId);
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
                                        Unit<br>
                                        Lecturer<br>
                                        A111
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
                                        $friTimeSlot = getTimetableSlot($conn, $slot, $day, $classId);
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
                                        Unit<br>
                                        Lecturer<br>
                                        A111
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