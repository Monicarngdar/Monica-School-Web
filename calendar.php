<?php 
    include "includes/header.php";
    include "includes/functions.php";
    adminPage(); //Inforce admin only in this page
    include "includes/calendar-inc.php";
?>

<?php
             if(isset($_GET["success"])) { 
                 $message = "Event Saved Successfully";
                 include "includes/show-success.php";
            }
      ?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="container my-5">
    <div class="card shadow">
       
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
<div class="calendar-col">
<?php if ($start):?>
  <span class="date-num" id = '<?php echo "$year-$month-$day"?>'><?php echo $day;$day++;?></span>
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
<div class="calendar-col">
<?php if ($start):?>
 <span class="date-num"  id = '<?php echo "$year-$month-$day"?>'><?php echo $day;$day++;?></span>
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
<div class="calendar-col">
<?php if ($start):?>
 <span class="date-num" id = '<?php echo "$year-$month-$day"?>'><?php echo $day;$day++;?></span>
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

<div class="calendar-col">
<?php if ($start):?>
 <span class="date-num" id = '<?php echo "$year-$month-$day"?>'><?php echo $day;$day++;?></span>
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
<div class="calendar-col">
<?php if ($start):?>
 <span class="date-num" id = '<?php echo "$year-$month-$day"?>'><?php echo $day;$day++;?></span>
<?php endif ?>
</div>

<!--Friday-->
<?php $dayOfWeekCount++;  ?>
<?php
if ($dayOfWeekCount == $firstDayOfWeekMonth){
  $start=true; 
}
if ($day> $lastDayOfMonth){
$start=false; 
}

?>
<div class="calendar-col">
<?php if ($start):?>
 <span class="date-num" id = '<?php echo "$year-$month-$day"?>'><?php echo $day;$day++;?></span>
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
<div class="calendar-col">
<?php if ($start):?>
 <span class="date-num" id = '<?php echo "$year-$month-$day"?>'><?php echo $day;$day++;?></span>
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
            <a href="calendar-event.php" class="btn btn-primary btn-sm"   >Schedule New Event</a>
            <a href="?date=<?php echo $today;?>" class="btn btn-secondary btn-sm">Today</a>
        </div>
    </div>
</div>
</main>


<?php  include "includes/footer.php";?>