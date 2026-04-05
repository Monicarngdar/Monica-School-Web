<?php 
    include "includes/functions.php";
    include "includes/dbh.php";
    include "includes/calendar-inc.php";
     include "includes/header.php";
?>

<?php
             if(isset($_GET["success"])) { 
                 $message = "Event Saved Successfully";
                 include "includes/show-success.php";
            }
      ?>

 <?php $event = getUserDayEvents($conn, "2026-04-03");?>
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

 <?php $events = getUserDayEvents($conn, "$year-$month-$day"); ?>
 <?php if (!empty($events)) {
        $jsEventsArray["$year-$month-$day"] = $events;
    }?>
<div class="calendar-col ">
<?php if ($start):?>
 <span class="date-num" id = '<?php echo "$year-$month-$day"?>'><?php echo $day;?></span>
 <?php $count = count($events); ?>
  <?php for ($n = 0; $n < $eventLimit && $n < $count; $n++):?>
        <?php $event = $events[$n];?>
        <?php if ($event): //show the event when there is 1?>
            <div class="small text-dark text-truncate p-1 mb-1 rounded <?php echo $event["eventType"];?>"><?php echo $event["eventDescription"]; ?></div>
    <?php endif; ?>
    <?php endfor?>
<?php if ($count > $eventLimit): ?>
    <?php $remaining = $count - $eventLimit; ?>
      <div class="text-end" style="margin-top: 2px;">
          <button type="button" class="btn btn-primary btn-sm py-0 px-1 custom-more-btn">
              +<?php echo $remaining; ?> more
          </button>
      </div>
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
$start=false; 
}
?>
 <?php $events = getUserDayEvents($conn, "$year-$month-$day"); ?>
  <?php if (!empty($events)) {
        $jsEventsArray["$year-$month-$day"] = $events;
    }?>
<div class="calendar-col ">
<?php if ($start):?>
 <span class="date-num" id = '<?php echo "$year-$month-$day"?>'><?php echo $day;?></span>
 <?php $count = count($events); ?>
  <?php for ($n = 0; $n < $eventLimit && $n < $count; $n++):?>
        <?php $event = $events[$n];?>
        <?php if ($event): //show the event when there is 1?>
            <div class="small text-dark text-truncate p-1 mb-1 rounded <?php echo $event["eventType"];?>"><?php echo $event["eventDescription"]; ?></div>
    <?php endif; ?>
    <?php endfor?>
<?php if ($count > $eventLimit): ?>
    <?php $remaining = $count - $eventLimit; ?>
      <div class="text-end" style="margin-top: 2px;">
          <button type="button" class="btn btn-primary btn-sm py-0 px-1 custom-more-btn">
              +<?php echo $remaining; ?> more
          </button>
      </div>
<?php endif; ?>
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

 <?php $events = getUserDayEvents($conn, "$year-$month-$day"); ?>
  <?php if (!empty($events)) {
        $jsEventsArray["$year-$month-$day"] = $events;
    }?>
<div class="calendar-col ">
<?php if ($start):?>
 <span class="date-num" id = '<?php echo "$year-$month-$day"?>'><?php echo $day;?></span>
 <?php $count = count($events); ?>
  <?php for ($n = 0; $n < $eventLimit && $n < $count; $n++):?>
        <?php $event = $events[$n];?>
        <?php if ($event): //show the event when there is 1?>
            <div class="small text-dark text-truncate p-1 mb-1 rounded <?php echo $event["eventType"];?>"><?php echo $event["eventDescription"]; ?></div>
    <?php endif; ?>
    <?php endfor?>
<?php if ($count > $eventLimit): ?>
    <?php $remaining = $count - $eventLimit; ?>
      <div class="text-end" style="margin-top: 2px;">
          <button type="button" class="btn btn-primary btn-sm py-0 px-1 custom-more-btn">
              +<?php echo $remaining; ?> more
          </button>
      </div>
<?php endif; ?>
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

 <?php $events = getUserDayEvents($conn, "$year-$month-$day"); ?>
  <?php if (!empty($events)) {
        $jsEventsArray["$year-$month-$day"] = $events;
    }?>
<div class="calendar-col ">
<?php if ($start):?>
 <span class="date-num" id = '<?php echo "$year-$month-$day"?>'><?php echo $day;?></span>
 <?php $count = count($events); ?>
  <?php for ($n = 0; $n < $eventLimit && $n < $count; $n++):?>
        <?php $event = $events[$n];?>
        <?php if ($event): //show the event when there is 1?>
            <div class="small text-dark text-truncate p-1 mb-1 rounded <?php echo $event["eventType"];?>"><?php echo $event["eventDescription"]; ?></div>
    <?php endif; ?>
    <?php endfor?>
<?php if ($count > $eventLimit): ?>
    <?php $remaining = $count - $eventLimit; ?>
      <div class="text-end" style="margin-top: 2px;">
          <button type="button" class="btn btn-primary btn-sm py-0 px-1 custom-more-btn">
              +<?php echo $remaining; ?> more
          </button>
      </div>
<?php endif; ?>
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

 <?php $events = getUserDayEvents($conn, "$year-$month-$day"); ?>
  <?php if (!empty($events)) {
        $jsEventsArray["$year-$month-$day"] = $events;
    }?>
<div class="calendar-col ">
<?php if ($start):?>
 <span class="date-num" id = '<?php echo "$year-$month-$day"?>'><?php echo $day;?></span>
 <?php $count = count($events); ?>
  <?php for ($n = 0; $n < $eventLimit && $n < $count; $n++):?>
        <?php $event = $events[$n];?>
        <?php if ($event): //show the event when there is 1?>
            <div class="small text-dark text-truncate p-1 mb-1 rounded <?php echo $event["eventType"];?>"><?php echo $event["eventDescription"]; ?></div>
    <?php endif; ?>
    <?php endfor?>
<?php if ($count > $eventLimit): ?>
    <?php $remaining = $count - $eventLimit; ?>
      <div class="text-end" style="margin-top: 2px;">
          <button type="button" class="btn btn-primary btn-sm py-0 px-1 custom-more-btn">
              +<?php echo $remaining; ?> more
          </button>
      </div>
<?php endif; ?>
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

 <?php $events = getUserDayEvents($conn, "$year-$month-$day"); ?>
  <?php if (!empty($events)) {
        $jsEventsArray["$year-$month-$day"] = $events;
    }?>
<div class="calendar-col ">
<?php if ($start):?>
 <span class="date-num" id = '<?php echo "$year-$month-$day"?>'><?php echo $day;?></span>
 <?php $count = count($events); ?>
  <?php for ($n = 0; $n < $eventLimit && $n < $count; $n++):?>
        <?php $event = $events[$n];?>
        <?php if ($event): //show the event when there is 1?>
            <div class="small text-dark text-truncate p-1 mb-1 rounded <?php echo $event["eventType"];?>"><?php echo $event["eventDescription"]; ?></div>
    <?php endif; ?>
    <?php endfor?>
<?php if ($count > $eventLimit): ?>
    <?php $remaining = $count - $eventLimit; ?>
      <div class="text-end" style="margin-top: 2px;">
          <button type="button" class="btn btn-primary btn-sm py-0 px-1 custom-more-btn">
              +<?php echo $remaining; ?> more
          </button>
      </div>
<?php endif; ?>
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

 <?php $events = getUserDayEvents($conn, "$year-$month-$day"); ?>
  <?php if (!empty($events)) {
        $jsEventsArray["$year-$month-$day"] = $events;
    }?>
<div class="calendar-col ">
<?php if ($start):?>
 <span class="date-num" id = '<?php echo "$year-$month-$day"?>'><?php echo $day;?></span>
 <?php $count = count($events); ?>
  <?php for ($n = 0; $n < $eventLimit && $n < $count; $n++):?>
        <?php $event = $events[$n];?>
        <?php if ($event): //show the event when there is 1?>
            <div class="small text-dark text-truncate p-1 mb-1 rounded <?php echo $event["eventType"];?>"><?php echo $event["eventDescription"]; ?></div>
    <?php endif; ?>
    <?php endfor?>
<?php if ($count > $eventLimit): ?>
    <?php $remaining = $count - $eventLimit; ?>
      <div class="text-end" style="margin-top: 2px;">
          <button type="button" class="btn btn-primary btn-sm py-0 px-1 custom-more-btn">
              +<?php echo $remaining; ?> more
          </button>
      </div>
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

              <a href="user-event-calendar.php" class="btn btn-primary btn-sm">Schedule My Event</a>
            <a href="?date=<?php echo $today;?>" class="btn btn-secondary btn-sm">Today</a>
        </div>
    </div>
</div>
</main>

<script>
    // PHP array to a  JavaScript Object
    const calendarEvents = <?php echo json_encode($jsEventsArray); ?>;

      console.log(calendarEvents); 

    // get events for a specific date
    function getEventsForDate(dateString) {
        if (calendarEvents[dateString]) {
            return calendarEvents[dateString];
        }
        return [];
    }
</script>

<?php  include "includes/footer.php";?>