<?php 
    include "includes/functions.php";
      studentPage();   //Inforce student only in this page
    include "includes/student-attendance-inc.php";
    include "includes/dbh.php";
    include "includes/header.php";
    ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="container flex-fill d-flex flex-column">
    <div class="card">
       
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
               
                <div class="btn-group" role="group">
                    <a href="?date=<?php echo $prevMonthDate;?>" class="btn btn-outline" title="Previous Month">&lsaquo; Prev Month</a>
                </div>

                <h2 class="mb-0 fw-bold"><?php echo "$monthName $year"; ?></h2>

                <div class="btn-group" role="group">
                    <a href="?date=<?php echo $nextMonthDate;?>" class="btn btn-outline" title="Next Month">Next Month &rsaquo;</a>
                </div>

            </div>
        </div>

        <div class="card-body p-0">
            <div class="d-flex flex-nowrap">
                <div class="calendar-col day-header">Sun</div>
                <div class="calendar-col day-header">Mon</div>
                <div class="calendar-col day-header">Tue</div>
                <div class="calendar-col day-header">Wed</div>
                <div class="calendar-col day-header">Thu</div>
                <div class="calendar-col day-header">Fri</div>
                <div class="calendar-col day-header">Sat</div>
            </div>
   <?php for ($i=$firstWeek;$i<=$lastWeek;$i++): ?>
              <div class="d-flex flex-nowrap">

<!--Sunday-->
<?php
if ($dayOfWeekCount == $firstDayOfWeekMonth){
  $start=true; 
}
if ($day> $lastDayOfMonth){
$start=false; 
}
?>
 <?php //$event = getCalendarEvent($conn, "$year-$month-$day"); ?>
<div class="calendar-col event-noschool ">
<?php if ($start):?>
 <span class="date-num" id = '<?php echo "$year-$month-$day"?>'><?php echo $day;;?></span>
   <?php if ($event): //show the event when there is 1?>
    <div class="small text-muted"><?php echo $event["eventDescription"]; ?></div>
 <?php endif; ?>
 <?php if ($assignEvent): //show assignment due date on the students calendar ?> 
    <div class="small text-muted">Task Due:<?php echo $assignEvent["taskTitle"]; ?></div>
 <?php endif; ?>
     <?php $day=$day+1;?>
  <?php endif ?>
</div>
<?php $dayOfWeekCount++;  ?>

<!--Monday-->
<?php
if ($dayOfWeekCount == $firstDayOfWeekMonth){
  $start=true; //start showing days in grid
}
if ($day> $lastDayOfMonth){
$start=false; //stop showing days in grid
}
?>

 <?php $attedance = getStudentAttendanceStatus($conn, "$year-$month-$day", $studentId); ?>
<div class="calendar-col">
<?php if ($start):?>
 <span class="date-num" id = '<?php echo "$year-$month-$day"?>'><?php echo $day;;?></span>
   <?php foreach ($attedance as $lecture):?>
    <?php $unit = getUnit($conn, $lecture["unitId"]);?>
    <div class="small attendance-<?php echo $lecture["status"]?>">
        <?php echo $unit["unitName"]; ?> - <?php echo $lecture["status"]; ?>
    </div>
 <?php endforeach ?>
     <?php $day=$day+1;?>
  <?php endif ?>
</div>
<?php $dayOfWeekCount++;  ?>

<!--Tuesday-->
<?php
if ($dayOfWeekCount == $firstDayOfWeekMonth){
  $start=true; 
}
if ($day> $lastDayOfMonth){
$start=false; 
}

?>
  <?php $attedance = getStudentAttendanceStatus($conn, "$year-$month-$day", $studentId); ?>
<div class="calendar-col">
<?php if ($start):?>
 <span class="date-num" id = '<?php echo "$year-$month-$day"?>'><?php echo $day;;?></span>
   <?php foreach ($attedance as $lecture):?>
    <?php $unit = getUnit($conn, $lecture["unitId"]);?>
    <div class="small attendance-<?php echo $lecture["status"]?>">
        <?php echo $unit["unitName"]; ?> - <?php echo $lecture["status"]; ?>
    </div>
 <?php endforeach ?>
     <?php $day=$day+1;?>
  <?php endif ?>
</div>
<?php $dayOfWeekCount++;  ?>

<!--Wednesday-->
<?php
if ($dayOfWeekCount == $firstDayOfWeekMonth){
  $start=true; 
}
if ($day> $lastDayOfMonth){
$start=false; 
}
?>

 <?php $attedance = getStudentAttendanceStatus($conn, "$year-$month-$day", $studentId); ?>
<div class="calendar-col">
<?php if ($start):?>
 <span class="date-num" id = '<?php echo "$year-$month-$day"?>'><?php echo $day;;?></span>
   <?php foreach ($attedance as $lecture):?>
    <?php $unit = getUnit($conn, $lecture["unitId"]);?>
    <div class="small attendance-<?php echo $lecture["status"]?>">
        <?php echo $unit["unitName"]; ?> - <?php echo $lecture["status"]; ?>
    </div>
 <?php endforeach ?>
     <?php $day=$day+1;?>
  <?php endif ?>
</div>
<?php $dayOfWeekCount++;  ?>

<!--Thursday-->
<?php
if ($dayOfWeekCount == $firstDayOfWeekMonth){
  $start=true;
}
if ($day> $lastDayOfMonth){
$start=false; 
}

?>
 <?php $attedance = getStudentAttendanceStatus($conn, "$year-$month-$day", $studentId); ?>
<div class="calendar-col">
<?php if ($start):?>
 <span class="date-num" id = '<?php echo "$year-$month-$day"?>'><?php echo $day;;?></span>
   <?php foreach ($attedance as $lecture):?>
    <?php $unit = getUnit($conn, $lecture["unitId"]);?>
    <div class="small attendance-<?php echo $lecture["status"]?>">
        <?php echo $unit["unitName"]; ?> - <?php echo $lecture["status"]; ?>
    </div>
 <?php endforeach ?>
     <?php $day=$day+1;?>
  <?php endif ?>
</div>
<?php $dayOfWeekCount++;  ?>

<!--Friday-->
<?php
if ($dayOfWeekCount == $firstDayOfWeekMonth){
  $start=true; 
}
if ($day> $lastDayOfMonth){
$start=false; 
}

?>
  <?php $attedance = getStudentAttendanceStatus($conn, "$year-$month-$day", $studentId); ?>
<div class="calendar-col">
<?php if ($start):?>
 <span class="date-num" id = '<?php echo "$year-$month-$day"?>'><?php echo $day;;?></span>
   <?php foreach ($attedance as $lecture):?>
    <?php $unit = getUnit($conn, $lecture["unitId"]);?>
    <div class="small attendance-<?php echo $lecture["status"]?>">
        <?php echo $unit["unitName"]; ?> - <?php echo $lecture["status"]; ?>
    </div>
 <?php endforeach ?>
     <?php $day=$day+1;?>
  <?php endif ?>
</div>
<?php $dayOfWeekCount++;  ?>

<!--Saturday-->
<?php
if ($dayOfWeekCount == $firstDayOfWeekMonth){
  $start=true; 
}
if ($day> $lastDayOfMonth){
$start=false; 
}
?>
   <?php //$event = getCalendarEvent($conn, "$year-$month-$day"); ?>
<div class="calendar-col event-noschool ">
<?php if ($start):?>
 <span class="date-num" id = '<?php echo "$year-$month-$day"?>'><?php echo $day;;?></span>
   <?php if ($event): //show the event when there is 1?>
    <div class="small text-muted"><?php echo $event["eventDescription"]; ?></div>
 <?php endif; ?>
 <?php if ($assignEvent): //show assignment due date on the students calendar ?> 
    <div class="small text-muted">Task Due:<?php echo $assignEvent["taskTitle"]; ?></div>
 <?php endif; ?>
     <?php $day=$day+1;?>
  <?php endif ?>
</div>
<?php $dayOfWeekCount++;  ?>

</div>
   <?php endfor ?>
        </div>

        <form action="calendar.php" method="post" id="calendarForm" name = "calendarForm">
        <input type="hidden" name ="action" value ="edit">
        <input type="hidden" name ="date" value ="">
      </form>
        <div class="card-footer bg-white text-center">
          <?php   if ($_SESSION['userRole']==3 ): //This button shows only for the admin user?>
            <a href="calendar-event.php" class="btn btn-primary btn-sm">Schedule New Event</a>
            <?php endif ?>
            <a href="?date=<?php echo $today;?>" class="btn btn-secondary btn-sm">Today</a>
        </div>
    </div>
</div>
</main>


<?php include "includes/footer.php";?>
